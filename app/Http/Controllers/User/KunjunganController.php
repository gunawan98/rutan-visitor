<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Criminal;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KunjunganController extends Controller
{
		public function index()
		{
			$data_user = User::find(Auth::id());
			$data_criminal = Criminal::where('user_id', Auth::id())->get();
			return view('user.daftar_kunjungan', compact('data_user','data_criminal'));
		}

		public function get_kriminal($id)
		{
			$criminal  = Criminal::find($id);

			return response()->json($criminal);
		}

		public function daftar_kunjungan(Request $request)
		{
			$date_now = date("m/d/Y");

			$criminal = Criminal::find($request->criminal_id);

			if ($date_now < $request->tanggal_kunjungan) {
				$date = $request->tanggal_kunjungan;
				$get_day = date('D', strtotime($date));

				if ($criminal->tipe == 'tahanan') {
					if ($get_day == 'Mon' || $get_day == 'Wed') {
						$input_date = date('Y-m-d', strtotime($date));
						$cek_first_data = Visitor::whereDate('tanggal_kunjungan', $input_date)->get(); //Cek pendaftar pertama
						$cek_duplicate_data = Visitor::where('user_id', Auth::id())->whereDate('tanggal_kunjungan', $input_date)->get(); //Cek pendaftar jika lebih sekali dalam mendaftar
						$cek_kapasitas = Visitor::with('criminal')
																			->whereHas('criminal', function ($query) {
																					$query->where('tipe', "tahanan");
																			})
																			->whereDate('tanggal_kunjungan', $input_date)
																			->count(); //Batasi pengunjung
						
						if ($cek_kapasitas == 36) {
							return redirect()->route('kunjungan.index')->with('error','Kapasitas pengunjung pada tanggal tesebut sudah penuh. Mohon untuk mengganti tanggal kunjungan anda. ');
						} else {
							if ($cek_duplicate_data->isEmpty()) {
								if ($cek_first_data->isEmpty()) {
	
									$visitor = new Visitor();
									$visitor->officer_id = 1;
									$visitor->user_id = Auth::id();
									$visitor->criminal_id = $request->criminal_id;
									$visitor->jmh_pengikut_laki = $request->jmh_pengikut_laki;
									$visitor->jmh_pengikut_perempuan = $request->jmh_pengikut_perempuan;
									$visitor->jmh_pengikut_anak = $request->jmh_pengikut_anak;
									$visitor->no_antrian = 1;
									$visitor->tanggal_kunjungan = date("Y-m-d 09:00:00", strtotime($date));
									$visitor->save();
	
									return redirect()->route('history.index')->with('visitor_success','Data berhasil di simpan... ');
	
								} else {
									$last_visitor = Visitor::with('criminal')
																					->whereHas('criminal', function ($query) {
																							$query->where('tipe', "tahanan");
																					})
																					->whereDate('tanggal_kunjungan', $input_date)
																					->orderBy('tanggal_kunjungan', 'desc')
																					->first();
									$no_antri = $last_visitor->no_antrian + 1;
									
									$visitor = new Visitor();
									$visitor->officer_id = 1;
									$visitor->user_id = Auth::id();
									$visitor->criminal_id = $request->criminal_id;
									$visitor->jmh_pengikut_laki = $request->jmh_pengikut_laki;
									$visitor->jmh_pengikut_perempuan = $request->jmh_pengikut_perempuan;
									$visitor->jmh_pengikut_anak = $request->jmh_pengikut_anak;
									$visitor->no_antrian = $no_antri;
									$visitor->tanggal_kunjungan = date('Y-m-d H:i:s', strtotime($last_visitor->tanggal_kunjungan.'+ 5 minute'));
									$visitor->save();
	
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

				if ($criminal->tipe == 'pidana') {
					if ($get_day == 'Tue' || $get_day == 'Thu') {
						$input_date = date('Y-m-d', strtotime($date));
						$cek_first_data = Visitor::whereDate('tanggal_kunjungan', $input_date)->get(); //Cek pendaftar pertama
						$cek_duplicate_data = Visitor::where('user_id', Auth::id())->whereDate('tanggal_kunjungan', $input_date)->get(); //Cek pendaftar pertama
						$cek_kapasitas = Visitor::with('criminal')
																			->whereHas('criminal', function ($query) {
																					$query->where('tipe', "pidana");
																			})
																			->whereDate('tanggal_kunjungan', $input_date)
																			->count(); //Batasi pengunjung
						if ($cek_kapasitas == 36) {
							return redirect()->route('kunjungan.index')->with('error','Kapasitas pengunjung pada tanggal tesebut sudah penuh. Mohon untuk mengganti tanggal kunjungan anda. ');
						} else {
							if ($cek_duplicate_data->isEmpty()) {
								if ($cek_first_data->isEmpty()) {
	
									$visitor = new Visitor();
									$visitor->officer_id = 1;
									$visitor->user_id = Auth::id();
									$visitor->criminal_id = $request->criminal_id;
									$visitor->jmh_pengikut_laki = $request->jmh_pengikut_laki;
									$visitor->jmh_pengikut_perempuan = $request->jmh_pengikut_perempuan;
									$visitor->jmh_pengikut_anak = $request->jmh_pengikut_anak;
									$visitor->no_antrian = 1;
									$visitor->tanggal_kunjungan = date("Y-m-d 09:00:00", strtotime($date));
									$visitor->save();
	
									return redirect()->route('history.index')->with('visitor_success','Data berhasil di simpan... ');
	
								} else {
									$last_visitor = Visitor::with('criminal')
																					->whereHas('criminal', function ($query) {
																							$query->where('tipe', "pidana");
																					})
																					->whereDate('tanggal_kunjungan', $input_date)
																					->orderBy('tanggal_kunjungan', 'desc')
																					->first();
									$no_antri = $last_visitor->no_antrian + 1;
									
									$visitor = new Visitor();
									$visitor->officer_id = 1;
									$visitor->user_id = Auth::id();
									$visitor->criminal_id = $request->criminal_id;
									$visitor->jmh_pengikut_laki = $request->jmh_pengikut_laki;
									$visitor->jmh_pengikut_perempuan = $request->jmh_pengikut_perempuan;
									$visitor->jmh_pengikut_anak = $request->jmh_pengikut_anak;
									$visitor->no_antrian = $no_antri;
									$visitor->tanggal_kunjungan = date('Y-m-d H:i:s', strtotime($last_visitor->tanggal_kunjungan.'+ 5 minute'));
									$visitor->save();
	
									return redirect()->route('history.index')->with('visitor_success','Data berhasil di simpan... ');
	
								}
							} else {
								return redirect()->route('kunjungan.index')->with('error','User tidak boleh medaftar kunjungan lebih dari sekali dalam sehari. ');
							}
						}						

					}else{
						return redirect()->route('kunjungan.index')->with('error','Pendaftaran kunjungan bagi status PIDANA hanya terjadwal pada hari Selasa dan Kamis.');
					}
				}

			}else{
				return redirect()->route('kunjungan.index')->with('error','Tanggal kunjungan yang anda inputkan telah usai. Mohon mendaftar pada hari berikutnya.');
			}

		}
}