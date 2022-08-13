<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailKeluarga;
use App\Models\DetailKunjungan;
use App\Models\DetailSyarat;
use App\Models\JadwalJaga;
use App\Models\JadwalKunjungan;
use App\Models\Kunjungan;
use App\Models\Pengunjung;
use App\Models\WargaRutan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KunjunganController extends Controller
{
		public function index()
		{
			$data_user = Pengunjung::find(Auth::id());
			$data_criminal = DetailKeluarga::with('warga_rutan')->where('id_pengunjung', Auth::id())->get();
			$cek_verify = DetailSyarat::where('id_pengunjung', Auth::id())->first();
			return view('user.daftar_kunjungan', compact('data_user','data_criminal', 'cek_verify'));
		}

		public function get_kriminal($id)
		{
			$criminal  = WargaRutan::with('jenis_warga_rutan')->get()->find($id);

			return response()->json($criminal);
		}

		public function daftar_kunjungan(Request $request)
		{
			$request->validate([
				'tanggal_kunjungan' => ['required', 'date'],
				'criminal_id' => ['required', 'integer'],
			]);

			$date_now = date("m/d/Y");

			$criminal = WargaRutan::with('jenis_warga_rutan')->find($request->criminal_id);

			if ($date_now < $request->tanggal_kunjungan) {
				$date = $request->tanggal_kunjungan;
				$get_day = date('D', strtotime($date));

				if ($criminal->jenis_warga_rutan->nama_jenis == 'tahanan') {
					if ($get_day == 'Mon' || $get_day == 'Wed') {
						$input_date = date('Y-m-d', strtotime($date));
						$cek_first_data = Kunjungan::whereDate('tanggal_kunjungan', $input_date)->get(); //Cek pendaftar pertama
						$cek_duplicate_data = DetailKunjungan::where('id_pengunjung', Auth::id())																									
																									->whereHas('kunjungan', function ($query) use ($input_date) {
																										$query->whereDate('tanggal_kunjungan', $input_date);
																									})
																									->get();//Cek pendaftar jika lebih sekali dalam mendaftar
						$cek_kapasitas = Kunjungan::whereDate('tanggal_kunjungan', $input_date)->count(); //Batasi pengunjung
						$jadwalDB = JadwalKunjungan::where('hari', date('D', strtotime($date)))->where('status', 'y')->first(); //get jadwal dari DB
						
						if ($cek_kapasitas == $jadwalDB->kapasitas) {
							return redirect()->route('kunjungan.index')->with('error','Kapasitas pengunjung pada tanggal tesebut sudah penuh. Mohon untuk mengganti tanggal kunjungan anda. ');
						} else {
							if ($cek_duplicate_data->isEmpty()) {
								
								if ($cek_first_data->isEmpty()) {
	
									$kunjungan = new Kunjungan();
									$kunjungan->id_jadwal_kunjungan = $jadwalDB->id_jadwal_kunjungan;
									$kunjungan->tanggal_kunjungan = date('Y-m-d H:i:s', strtotime("$date $jadwalDB->jam_mulai"));
									$saved = $kunjungan->save();

									if ($saved) {
										$detail_kunjungan = new DetailKunjungan();
										$detail_kunjungan->id_pengunjung = Auth::id();
										$detail_kunjungan->id_kunjungan = $kunjungan->id_kunjungan;
										$detail_kunjungan->save();
									}

									return redirect()->route('history.index')->with('visitor_success','Data berhasil di simpan... ');
	
								} else {
									$last_visitor = Kunjungan::whereDate('tanggal_kunjungan', $input_date)
																					->orderBy('tanggal_kunjungan', 'desc')
																					->first();
									
									$kunjungan = new Kunjungan();
									$kunjungan->id_jadwal_kunjungan = $jadwalDB->id_jadwal_kunjungan;
									$kunjungan->tanggal_kunjungan = date('Y-m-d H:i:s', strtotime($last_visitor->tanggal_kunjungan.'+ 5 minute'));
									$saved = $kunjungan->save();

									if ($saved) {
										$detail_kunjungan = new DetailKunjungan();
										$detail_kunjungan->id_pengunjung = Auth::id();
										$detail_kunjungan->id_kunjungan = $kunjungan->id_kunjungan;
										$detail_kunjungan->save();
									}
	
									return redirect()->route('history.index')->with('visitor_success','Data berhasil di simpan... ');
	
								}

							} else {
								return redirect()->route('kunjungan.index')->with('error','User tidak boleh medaftar kunjungan lebih dari sekali dalam sehari. ');
							}
						}

					}else{
						return redirect()->route('kunjungan.index')->with('error','Pendaftaran kunjungan bagi status TAHANAN hanya terjadwal pada hari Senin dan Rabu.');
					}
				}

				if ($criminal->jenis_warga_rutan->nama_jenis == 'pidana') {
					if ($get_day == 'Tue' || $get_day == 'Thu') {
						$input_date = date('Y-m-d', strtotime($date));
						$cek_first_data = Kunjungan::whereDate('tanggal_kunjungan', $input_date)->get(); //Cek pendaftar pertama
						$cek_duplicate_data = DetailKunjungan::where('id_pengunjung', Auth::id())																									
																									->whereHas('kunjungan', function ($query) use ($input_date) {
																										$query->whereDate('tanggal_kunjungan', $input_date);
																									})
																									->get();//Cek pendaftar jika lebih sekali dalam mendaftar
						$cek_kapasitas = Kunjungan::whereDate('tanggal_kunjungan', $input_date)->count(); //Batasi pengunjung
						$jadwalDB = JadwalKunjungan::where('hari', date('D', strtotime($date)))->where('status', 'y')->first(); //get jadwal dari DB
						
						if ($cek_kapasitas == $jadwalDB->kapasitas) {
							return redirect()->route('kunjungan.index')->with('error','Kapasitas pengunjung pada tanggal tesebut sudah penuh. Mohon untuk mengganti tanggal kunjungan anda. ');
						} else {
							if ($cek_duplicate_data->isEmpty()) {
								
								if ($cek_first_data->isEmpty()) {
	
									$kunjungan = new Kunjungan();
									$kunjungan->id_jadwal_kunjungan = $jadwalDB->id_jadwal_kunjungan;
									$kunjungan->tanggal_kunjungan = date('Y-m-d H:i:s', strtotime("$date $jadwalDB->jam_mulai"));
									$saved = $kunjungan->save();

									if ($saved) {
										$detail_kunjungan = new DetailKunjungan();
										$detail_kunjungan->id_pengunjung = Auth::id();
										$detail_kunjungan->id_kunjungan = $kunjungan->id_kunjungan;
										$detail_kunjungan->save();
									}

									return redirect()->route('history.index')->with('visitor_success','Data berhasil di simpan... ');
	
								} else {
									$last_visitor = Kunjungan::whereDate('tanggal_kunjungan', $input_date)
																					->orderBy('tanggal_kunjungan', 'desc')
																					->first();
									
									$kunjungan = new Kunjungan();
									$kunjungan->id_jadwal_kunjungan = $jadwalDB->id_jadwal_kunjungan;
									$kunjungan->tanggal_kunjungan = date('Y-m-d H:i:s', strtotime($last_visitor->tanggal_kunjungan.'+ 5 minute'));
									$saved = $kunjungan->save();

									if ($saved) {
										$detail_kunjungan = new DetailKunjungan();
										$detail_kunjungan->id_pengunjung = Auth::id();
										$detail_kunjungan->id_kunjungan = $kunjungan->id_kunjungan;
										$detail_kunjungan->save();
									}
	
									return redirect()->route('history.index')->with('visitor_success','Data berhasil di simpan... ');
	
								}

							} else {
								return redirect()->route('kunjungan.index')->with('error','User tidak boleh medaftar kunjungan lebih dari sekali dalam sehari. ');
							}
						}

					}else{
						return redirect()->route('kunjungan.index')->with('error','Pendaftaran kunjungan bagi status TAHANAN hanya terjadwal pada hari Senin dan Rabu.');
					}
				}

			}else{
				return redirect()->route('kunjungan.index')->with('error','Tanggal kunjungan yang anda inputkan telah usai. Mohon mendaftar pada hari berikutnya.');
			}

		}
}
