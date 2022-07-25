<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VisitorController extends Controller
{
    public function index()
    {
			$tes = Visitor::where('tanggal_kunjungan', date('Y-m-d', strtotime("26/07/2022")))->get();
			$data_kunjungan = Visitor::with(['user','criminal'])->orderBy('id', 'DESC')->get();
      return view('officer.visitor.index', compact('data_kunjungan'));
    }

		public function getVisitors(Request $request)
		{
			if ($request->ajax()) {
				$data = Visitor::with(['user','criminal'])->get();
				return DataTables::of($data)
						->addIndexColumn()
						->addColumn('user', function ($item) {
							return $item->user->name;
						})
						->addColumn('criminal', function ($item) {
							return $item->criminal->name;
						})
							->make(true);
			}
		}

}
