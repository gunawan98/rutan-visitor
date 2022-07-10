<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class VisitorController extends Controller
{
    public function index()
    {
			// $data_users = User::orderBy('id', 'DESC')->get();
      return view('officer.user.index', compact('data_users'));
    }

}
