<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Criminal;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
			$total_users = User::count();
			$oldest_users = User::orderBy('created_at', 'desc')->first();
			
			$total_tahanan = Criminal::where('tipe', 'tahanan')->count();
			$oldest_tahanan = Criminal::where('tipe', 'tahanan')->orderBy('created_at', 'desc')->first();
			
			$total_pidana = Criminal::where('tipe', 'pidana')->count();
			$oldest_pidana = Criminal::where('tipe', 'pidana')->orderBy('created_at', 'desc')->first();

			$visitor_month = Visitor::select(DB::raw("(COUNT(*)) as count"), DB::raw("MONTHNAME(tanggal_kunjungan) as monthname"))
            ->whereYear('tanggal_kunjungan', date('Y'))
            ->groupBy('monthname')
            ->get();
			$visitor_chart = $visitor_month->toArray();

			$total_visitor = Visitor::count();
			$total_visitor_new = Visitor::where('tanggal_kunjungan', '>', now())->count();

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
}
