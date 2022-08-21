<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\JenisWargaRutan;
use App\Models\Petugas;
use App\Models\WargaRutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WargaRutanController extends Controller
{
    public function index()
    {
			$warga = WargaRutan::get();
      return view('officer.warga_rutan.index', compact('warga'));
    }

    public function create()
    {
			$jenis_warga_rutan = JenisWargaRutan::where('status', 'y')->get();
      return view('officer.warga_rutan.create', compact('jenis_warga_rutan'));
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

			$warga_rutan = new WargaRutan();
			$warga_rutan->id_jenis_warga_rutan = $request->id_jenis_warga_rutan;
			$warga_rutan->nik = $request->nik;
			$warga_rutan->nama_warga_rutan = $request->nama_warga_rutan;
			$warga_rutan->alamat = $request->alamat;
			$warga_rutan->jenis_kelamin = $request->jenis_kelamin;
			$warga_rutan->no_telepon = $request->no_telepon;
			$warga_rutan->kasus = $request->kasus;
			$warga_rutan->status = 'y';
			$warga_rutan->save();

			return redirect()->route('officer.warga_rutan.create')->with('status','Data berhasil di simpan... ');
    }

    public function edit($id)
    {
			$data = WargaRutan::find($id);
			$jenis_warga_rutan = JenisWargaRutan::where('status', 'y')->get();

      return view('officer.warga_rutan.edit', compact('data', 'jenis_warga_rutan'));
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

			$cek_data = WargaRutan::where('id_warga_rutan', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$data = WargaRutan::find($id);
				$data->id_jenis_warga_rutan = $request->id_jenis_warga_rutan;
				$data->nik = $request->nik;
				$data->nama_warga_rutan = $request->nama_warga_rutan;
				$data->alamat = $request->alamat;
				$data->jenis_kelamin = $request->jenis_kelamin;
				$data->no_telepon = $request->no_telepon;
				$data->kasus = $request->kasus;
				$data->status = $request->status;
				
				$data->save();

				return redirect()->back()->with(['success' => 'Data kriminal berhasil diupdate.']);
			}
    }

    public function destroy(Request $request, $id)
    {
			if ($request->ajax()){

				$warga_rutan = WargaRutan::findOrFail($id);

				if ($warga_rutan){
					$warga_rutan->delete();

					return response()->json(array('success' => true));
				}

			}
    }
}
