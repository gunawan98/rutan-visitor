<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\DetailKeluarga;
use App\Models\DetailSyarat;
use App\Models\Pengunjung;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      return view('officer.pengunjung.create');
    }

    public function store(Request $request)
    {
			$request->validate([
				'nik' => ['required', 'numeric', 'digits:16', 'unique:pengunjung'],
				'nama' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
				'no_telepon' => 'required|numeric|min:10',
				'alamat' => 'required',
				'username' => ['required', 'unique:pengunjung'],
				'password' => 'required'
			]);

			$pengunjung = new Pengunjung();
			$pengunjung->nik = $request->nik;
			$pengunjung->nama_pengunjung = $request->nama;
			$pengunjung->jenis_kelamin = $request->jenis_kelamin;
			$pengunjung->no_telepon = $request->no_telepon;
			$pengunjung->alamat = $request->alamat;
			$pengunjung->username = $request->username;
			$pengunjung->password = Hash::make($request->password);
			$pengunjung->status = 'y';
			$pengunjung->save();

			return redirect()->route('officer.pengunjung.create')->with('status','Data berhasil di simpan... ');
    }

    public function edit($id)
    {
			$data = Pengunjung::with('detail_syarat')->get()->find($id);
			$detail_keluarga = DetailKeluarga::with('warga_rutan')->where('id_pengunjung', $id)->first();
			// dd($data);

      return view('officer.pengunjung.edit', compact('data','detail_keluarga'));
    }

    public function update(Request $request, $id)
    {
			// dd($id);
			$request->validate([
				// 'nik' => 'required|numeric|digits:16|unique:pengunjung,nik,{$this->pengunjung->id}',
				'nama' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
				// 'no_telepon' => 'required|numeric|min:10|unique:pengunjung,no_telepon,{$this->pengunjung->id}',
				'alamat' => 'required',
				// 'username' => 'required|unique:pengunjung,username,{$this->pengunjung->id}'
			]);

			$cek_data = Pengunjung::where('id_pengunjung', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$data = Pengunjung::find($id);
				$data->nik = $request->nik;
				$data->nama_pengunjung = $request->nama;
				$data->jenis_kelamin = $request->jenis_kelamin;
				$data->no_telepon = $request->no_telepon;
				$data->alamat = $request->alamat;
				$data->username = $request->username;

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

		public function verify(Request $request)
		{
			$pengunjung = Pengunjung::find($request->id_pengunjung);
			$pengunjung->status = 'y';
			$pengunjung->save();

			$detail_syarat = DetailSyarat::find($request->id_detail_syarat);
			$detail_syarat->id_petugas = Auth::id();
			$detail_syarat->tanggal_verifikasi = Carbon::now()->toDateTimeString();
			$detail_syarat->save();

			return redirect()->back()->with(['success' => 'Data Pengunjung berhasil di verifikasi.']);
		}
}
