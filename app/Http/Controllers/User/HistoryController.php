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

class HistoryController extends Controller
{
		public function index()
		{
			$historys = Visitor::with('criminal')->where('user_id', Auth::id())->get();
			return view('user.history', compact('historys'));
		}

		public function get_kriminal($id)
		{
			$criminal  = Criminal::find($id);

			return response()->json($criminal);
		}

}
