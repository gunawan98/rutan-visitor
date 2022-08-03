<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\JadwalJaga;
use App\Models\Kunjungan;
use App\Models\Petugas;
use App\Models\User;
use App\Models\WargaRutan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
			$total_users = User::count();
			$oldest_users = User::orderBy('created_at', 'desc')->first();
			
			$total_tahanan = WargaRutan::where('tipe', 'tahanan')->count();
			$oldest_tahanan = WargaRutan::where('tipe', 'tahanan')->orderBy('created_at', 'desc')->first();
			
			$total_pidana = WargaRutan::where('tipe', 'pidana')->count();
			$oldest_pidana = WargaRutan::where('tipe', 'pidana')->orderBy('created_at', 'desc')->first();

			$visitor_month = Kunjungan::select(DB::raw("(COUNT(*)) as count"), DB::raw("MONTHNAME(tanggal_kunjungan) as monthname"))
            ->whereYear('tanggal_kunjungan', date('Y'))
            ->groupBy('monthname')
            ->get();
			$visitor_chart = $visitor_month->toArray();

			$total_visitor = Kunjungan::count();
			$total_visitor_new = Kunjungan::where('tanggal_kunjungan', '>', now())->count();

      return view('officer.dashboard', compact(
				'total_users',
				'oldest_users',
				'total_tahanan',
				'oldest_tahanan',
				'total_pidana',
				'oldest_pidana',
				'visitor_chart',
				'total_visitor',
				'total_visitor_new'
			));
    }

		public function jadwal_jaga()
		{
			$data_petugas = Petugas::all();
			$data_mon = JadwalJaga::with('petugas')->where('hari', 'Mon')->get();
			$data_tue = JadwalJaga::with('petugas')->where('hari', 'Tue')->get();
			$data_wed = JadwalJaga::with('petugas')->where('hari', 'Wed')->get();
			$data_thu = JadwalJaga::with('petugas')->where('hari', 'Thu')->get();
			return view('officer.additional.jadwal_jaga', compact('data_petugas', 'data_mon', 'data_tue', 'data_wed', 'data_thu'));
		}

		public function create_jadwal(Request $request)
		{
			$request->validate([
				'Mon' => ['required', 'numeric'],
				'Tue' => ['required', 'numeric'],
				'Wed' => ['required', 'numeric'],
				'Thu' => ['required', 'numeric']
			]);

			if (JadwalJaga::where('hari', 'Mon')->exists()) {
				JadwalJaga::where('hari', 'Mon')->update(['petugas_id' => $request->Mon]);
			} else {
				$jadwal = new JadwalJaga();
				$jadwal->petugas_id = $request->Mon;
				$jadwal->hari = 'Mon';
				$jadwal->save();
			}

			if (JadwalJaga::where('hari', 'Tue')->exists()) {
				JadwalJaga::where('hari', 'Tue')->update(['petugas_id' => $request->Tue]);
			} else {
				$jadwal = new JadwalJaga();
				$jadwal->petugas_id = $request->Tue;
				$jadwal->hari = 'Tue';
				$jadwal->save();
			}

			if (JadwalJaga::where('hari', 'Wed')->exists()) {
				JadwalJaga::where('hari', 'Wed')->update(['petugas_id' => $request->Wed]);
			} else {
				$jadwal = new JadwalJaga();
				$jadwal->petugas_id = $request->Wed;
				$jadwal->hari = 'Wed';
				$jadwal->save();
			}

			if (JadwalJaga::where('hari', 'Thu')->exists()) {
				JadwalJaga::where('hari', 'Thu')->update(['petugas_id' => $request->Thu]);
			} else {
				$jadwal = new JadwalJaga();
				$jadwal->petugas_id = $request->Thu;
				$jadwal->hari = 'Thu';
				$jadwal->save();
			}
			
			return back()->with('petugas_create','Jadwal petugas berhasil di simpan... ');
		}

		public function create_petugas(Request $request)
		{
			$request->validate([
				'name' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'jabatan' => ['required']
			]);

			$petugas = new Petugas();
			$petugas->name = $request->name;
			$petugas->jabatan = $request->jabatan;
			$petugas->save();
			return back()->with('petugas_create','Data berhasil di simpan... ');
		}

		public function delete_petugas(Request $request, $id)
		{
			$petugas = Petugas::find($id);
			$petugas->delete();
			return back()->with('petugas_create','Data berhasil di hapus... ');
		}

		public function laporan()
		{
			$inf_tahanan = Kunjungan::with(['user','warga_rutan'])
															->whereHas('warga_rutan', function ($query) {
																	$query->where('tipe', "tahanan");
															})
															->where('tanggal_kunjungan', '>', now())
															->get()
															->groupBy(function ($val) {
																return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
															});
			
			$inf_pidana = Kunjungan::with(['user','warga_rutan'])
															->whereHas('warga_rutan', function ($query) {
																	$query->where('tipe', "pidana");
															})
															->where('tanggal_kunjungan', '>', now())
															->get()
															->groupBy(function ($val) {
																return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
															});
			return view('officer.additional.laporan', compact('inf_tahanan','inf_pidana'));
		}

		public function tahananPdf(Request $request)
    {
				if ($request->tanggal) {
					$data_kunjungan = Kunjungan::with(['user','warga_rutan'])
																		->whereHas('warga_rutan', function ($query) {
																				$query->where('tipe', "tahanan");
																		})
																		->whereDate('tanggal_kunjungan', $request->tanggal)
																		->orderBy('no_antrian', 'asc')
																		->get();
				} else {
					$data_kunjungan = Kunjungan::with(['user','warga_rutan'])
																			->whereHas('warga_rutan', function ($query) {
																					$query->where('tipe', "tahanan");
																			})
																			->orderBy('tanggal_kunjungan', 'DESC')
																			->get();
				}
				
        $data = [
					'title' => 'Data Kunjungan Tahanan',
					'date' => $request->tanggal,
					'total' => $request->total,
					'data_kunjungan' => $data_kunjungan
        ];
        
        $pdf = Pdf::loadView('tahananPDF', $data);  

        return $pdf->download('tahanan.pdf');

    }

		public function pidanaPdf(Request $request)
    {
				if ($request->tanggal) {
					$data_kunjungan = Kunjungan::with(['user','warga_rutan'])
																		->whereHas('warga_rutan', function ($query) {
																				$query->where('tipe', "pidana");
																		})
																		->whereDate('tanggal_kunjungan', $request->tanggal)
																		->orderBy('no_antrian', 'asc')
																		->get();
				} else {
					$data_kunjungan = Kunjungan::with(['user','warga_rutan'])
																			->whereHas('warga_rutan', function ($query) {
																					$query->where('tipe', "pidana");
																			})
																			->orderBy('tanggal_kunjungan', 'DESC')
																			->get();
				}
				
        $data = [
					'title' => 'Data Kunjungan Narapidana',
					'date' => $request->tanggal,
					'total' => $request->total,
					'data_kunjungan' => $data_kunjungan
        ];
        
        $pdf = Pdf::loadView('pidanaPDF', $data);  

        return $pdf->download('pidana.pdf');

    }

}
