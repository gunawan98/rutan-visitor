<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\JadwalKunjungan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JadwalKunjunganController extends Controller
{
    public function index()
    {
			$jadwal_kunjungan = JadwalKunjungan::with('petugas')->get();
      return view('officer.jadwal_kunjungan.index', compact('jadwal_kunjungan'));
    }

    public function create()
    {
			$petugas = Petugas::all();
      return view('officer.jadwal_kunjungan.create', compact('petugas'));
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

			$rm_mulai = preg_replace('/\s*:\s*/', ':', $request->jam_mulai);
			$rm_selesai = preg_replace('/\s*:\s*/', ':', $request->jam_selesai);

			$jadwal = new JadwalKunjungan();
			$jadwal->petugas_id = $request->petugas_id;
			$jadwal->hari = $request->hari;
			$jadwal->jam_mulai = date("H:i", strtotime($rm_mulai));
			$jadwal->jam_selesai = date("H:i", strtotime($rm_selesai));
			$jadwal->kapasitas = $request->kapasitas;
			$jadwal->status = 'y';
			$jadwal->save();

			return redirect()->route('officer.jadwal_kunjungan.create')->with('status','Data berhasil di simpan... ');
    }

    public function edit($id)
    {
			$data = JadwalKunjungan::find($id);
			$petugas = Petugas::all();

      return view('officer.jadwal_kunjungan.edit', compact('data','petugas'));
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

			$cek_data = JadwalKunjungan::where('id', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$rm_mulai = preg_replace('/\s*:\s*/', ':', $request->jam_mulai);
				$rm_selesai = preg_replace('/\s*:\s*/', ':', $request->jam_selesai);

				$jadwal = JadwalKunjungan::find($id);
				$jadwal->petugas_id = $request->petugas_id;
				$jadwal->hari = $request->hari;
				$jadwal->jam_mulai = date("H:i", strtotime($rm_mulai));
				$jadwal->jam_selesai = date("H:i", strtotime($rm_selesai));
				$jadwal->kapasitas = $request->kapasitas;
				$jadwal->status = $request->status;
				$jadwal->save();

				return redirect()->back()->with(['success' => 'Data berhasil diupdate.']);
			}
    }

    public function destroy(Request $request, $id)
    {
			if ($request->ajax()){

				$jadwal_kunjungan = JadwalKunjungan::findOrFail($id);

				if ($jadwal_kunjungan){
					$jadwal_kunjungan->delete();

					return response()->json(array('success' => true));
				}

			}
    }
}
