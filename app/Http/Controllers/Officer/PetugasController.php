<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
			$petugas = Petugas::get();
      return view('officer.petugas.index', compact('petugas'));
    }

    public function create()
    {
      return view('officer.petugas.create');
    }

    public function store(Request $request)
    {
			// $request->validate([
			// 	'user_id' => ['required', 'integer'],
			// 	'name' => ['required', 'regex:/^[a-zA-Z ]+$/'],
			// 	'tipe' => ['required', 'in:pidana,tahanan'],
			// 	'kasus' => 'required',
			// 	'no_nik' => ['required', 'numeric', 'digits:16', 'unique:warga_rutan'],
			// 	'hubungan' => 'required',
			// ]);

			$petugas = new Petugas();
			$petugas->nama_petugas = $request->nama_petugas;
			$petugas->alamat = $request->alamat;
			$petugas->no_telepon = $request->no_telepon;
			$petugas->username = $request->username;
			$petugas->password = Hash::make($request->password);
			$petugas->save();

			return redirect()->route('officer.petugas.create')->with('status','Data berhasil di simpan... ');
    }

    public function edit($id)
    {
			$data = Petugas::find($id);

      return view('officer.petugas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
      // $request->validate([
			// 	'user_id' => ['required', 'integer'],
			// 	'name' => ['required', 'regex:/^[a-zA-Z ]+$/'],
			// 	'tipe' => ['required', 'in:pidana,tahanan'],
			// 	'kasus' => 'required',
			// 	'no_nik' => 'required|numeric|digits:16|unique:warga_rutan,no_nik,'.$id,
			// 	'hubungan' => 'required'
			// ]);

			$cek_data = Petugas::where('id_petugas', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$data = Petugas::find($id);
				$data->nama_petugas = $request->nama_petugas;
				$data->alamat = $request->alamat;
				$data->no_telepon = $request->no_telepon;
				$data->username = $request->username;

				if ($request->password) {
					$data->password = Hash::make($request->password);
				}
				
				$data->save();

				return redirect()->back()->with(['success' => 'Data petugas berhasil diupdate.']);
			}
    }

    public function destroy(Request $request, $id)
    {
			if ($request->ajax()){

				$petugas = Petugas::findOrFail($id);

				if ($petugas){
					$petugas->delete();

					return response()->json(array('success' => true));
				}

			}
    }
}
