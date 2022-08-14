<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\DetailKunjungan;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function kunjungan(Request $request)
    {
			if ($request->filter) {
				$data_kunjungan = Kunjungan::with(['detail_kunjungan.pengunjung'])
																		->whereDate('tanggal_kunjungan', date("Y-m-d", strtotime($request->filter)))
																		->orderBy('tanggal_kunjungan', 'DESC')
																		->get();
			} else {
				$data_kunjungan = Kunjungan::with('detail_kunjungan.pengunjung')
																		->orderBy('tanggal_kunjungan', 'DESC')
																		->get();
			}
			// dd();

      return view('officer.visitor.kunjungan', compact('data_kunjungan'));
    }

		public function detail_kunjungan($id)
		{
			$kunjungan = Kunjungan::with('jadwal_kunjungan.petugas')->find($id);
			$detail_kunjungan = DetailKunjungan::with('pengunjung.detail_keluarga.warga_rutan')->where('id_kunjungan', $id)->first();
			// dd($detail_kunjungan);
			return view('officer.visitor.detail_kunjungan', compact('kunjungan','detail_kunjungan'));
		}

}
