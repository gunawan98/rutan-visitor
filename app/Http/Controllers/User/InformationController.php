<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Carbon\Carbon;

class InformationController extends Controller
{
		public function index()
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
															// ->orderBy('tanggal_kunjungan', 'desc');
			$inf_pidana = Kunjungan::with(['user','warga_rutan'])
															->whereHas('warga_rutan', function ($query) {
																	$query->where('tipe', "pidana");
															})
															->where('tanggal_kunjungan', '>', now())
															->get()
															->groupBy(function ($val) {
																return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
															});
			return view('user.dashboard', compact('inf_tahanan','inf_pidana'));
		}

}
