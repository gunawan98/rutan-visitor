<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
		public function index()
		{
			$historys = Kunjungan::with('warga_rutan')->where('user_id', Auth::id())->get();
			return view('user.history', compact('historys'));
		}
}
