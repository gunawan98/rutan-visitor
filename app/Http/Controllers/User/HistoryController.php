<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailKeluarga;
use App\Models\DetailKunjungan;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
		public function index()
		{
			$historys = DetailKunjungan::with(['pengunjung.detail_keluarga.warga_rutan','kunjungan.jadwal_kunjungan.petugas'])->where('id_pengunjung', Auth::id())->get();
			$criminal = DetailKeluarga::with('warga_rutan.jenis_warga_rutan')->where('id_pengunjung', Auth::id())->first();
			return view('user.history', compact('historys', 'criminal'));
		}
}
