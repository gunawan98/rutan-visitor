<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function tahanan(Request $request)
    {
			$date_draft = Kunjungan::with('warga_rutan')
														->whereHas('warga_rutan', function ($query) {
																$query->where('tipe', "tahanan");
														})
														->where('tanggal_kunjungan', '>', now())
														->get()
														->groupBy(function ($val) {
															return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
														});

			if ($request->filter) {
				$data_kunjungan = Kunjungan::with(['user','warga_rutan'])
																	->whereHas('warga_rutan', function ($query) {
																			$query->where('tipe', "tahanan");
																	})
																	->whereDate('tanggal_kunjungan', $request->filter)
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
			

      return view('officer.visitor.tahanan', compact('data_kunjungan','date_draft'));
    }

		public function detail_kunjungan($id)
		{
			$kunjungan = Kunjungan::with(['petugas','user','warga_rutan'])->find($id);
			return view('officer.visitor.detail_kunjungan', compact('kunjungan'));
		}

    public function pidana(Request $request)
    {
			$date_draft = Kunjungan::with('warga_rutan')
														->whereHas('warga_rutan', function ($query) {
																$query->where('tipe', "pidana");
														})
														->where('tanggal_kunjungan', '>', now())
														->get()
														->groupBy(function ($val) {
															return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
														});

			if ($request->filter) {
				$data_kunjungan = Kunjungan::with(['user','warga_rutan'])
																	->whereHas('warga_rutan', function ($query) {
																			$query->where('tipe', "pidana");
																	})
																	->whereDate('tanggal_kunjungan', $request->filter)
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
			

      return view('officer.visitor.pidana', compact('data_kunjungan','date_draft'));
    }

}
