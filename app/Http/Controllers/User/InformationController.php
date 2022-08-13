<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Carbon\Carbon;

class InformationController extends Controller
{
		public function index()
		{
			$inf_tahanan = Kunjungan::with(['detail_kunjungan'])
															->where('tanggal_kunjungan', '>', now())
															->get()
															->groupBy(function ($val) {
																return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
															});
			return view('user.dashboard', compact('inf_tahanan'));
		}

}
