<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengunjungController extends Controller
{
    public function index()
    {
			$pengunjung = Pengunjung::get();
      return view('officer.pengunjung.index', compact('pengunjung'));
    }

    public function create()
    {
			// $data_user = User::select('id','name','no_telepon')->get();
      return view('officer.pengunjung.create');
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

			$pengunjung = new Pengunjung();
			$pengunjung->nik = $request->nik;
			$pengunjung->nama = $request->nama;
			$pengunjung->jenis_kelamin = $request->jenis_kelamin;
			$pengunjung->no_telepon = $request->no_telepon;
			$pengunjung->alamat = $request->alamat;
			$pengunjung->email = $request->email;
			$pengunjung->password = Hash::make($request->password);
			$pengunjung->status = 'y';
			$pengunjung->save();

			return redirect()->route('officer.pengunjung.create')->with('status','Data berhasil di simpan... ');
    }

    public function edit($id)
    {
			$data = Pengunjung::find($id);
			// $data_user = User::select('id','name','no_telepon')->get();

      return view('officer.pengunjung.edit', compact('data'));
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

			$cek_data = Pengunjung::where('id', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$data = Pengunjung::find($id);
				$data->nik = $request->nik;
				$data->nama = $request->nama;
				$data->jenis_kelamin = $request->jenis_kelamin;
				$data->no_telepon = $request->no_telepon;
				$data->alamat = $request->alamat;
				$data->email = $request->email;

				if ($request->password) {
					$data->password = Hash::make($request->password);
				}

				if ($request->status) {
					$data->status = $request->status;
				}
				
				$data->save();

				return redirect()->back()->with(['success' => 'Data kriminal berhasil diupdate.']);
			}
    }

    public function destroy(Request $request, $id)
    {
			if ($request->ajax()){

				$pengunjung = Pengunjung::findOrFail($id);

				if ($pengunjung){
					$pengunjung->delete();

					return response()->json(array('success' => true));
				}

			}
    }
}
