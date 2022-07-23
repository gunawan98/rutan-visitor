<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class VisitorController extends Controller
{
    public function index()
    {
			$data_kunjungan = Visitor::with(['user','criminal'])->orderBy('id', 'DESC')->get();
      return view('officer.visitor.index', compact('data_kunjungan'));
    }

}
