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

class InformationController extends Controller
{
		public function index()
		{
			$inf_tahanan = Visitor::with(['user','criminal'])
															->whereHas('criminal', function ($query) {
																	$query->where('tipe', "tahanan");
															})
															->where('tanggal_kunjungan', '>', now())
															->orderBy('created_at', 'DESC')
															->get()
															->groupBy(function ($val) {
																return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
															});
															// ->orderBy('tanggal_kunjungan', 'desc');
			$inf_pidana = Visitor::with(['user','criminal'])
															->whereHas('criminal', function ($query) {
																	$query->where('tipe', "pidana");
															})
															->where('tanggal_kunjungan', '>', now())
															->orderBy('created_at', 'DESC')
															->get()
															->groupBy(function ($val) {
																return Carbon::parse($val->tanggal_kunjungan)->format('Y-m-d');
															});
			return view('user.dashboard', compact('inf_tahanan','inf_pidana'));
		}

}
