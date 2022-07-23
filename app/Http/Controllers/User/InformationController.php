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
															->get()
															->groupBy('tanggal_kunjungan');
			$inf_pidana = Visitor::with(['user','criminal'])
															->whereHas('criminal', function ($query) {
																	$query->where('tipe', "pidana");
															})
															->where('tanggal_kunjungan', '>', now())
															->get()
															->groupBy('tanggal_kunjungan');
															// dd($inf_tahanan);
			return view('user.dashboard', compact('inf_tahanan','inf_pidana'));
		}

}
