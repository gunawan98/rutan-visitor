<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\JenisSyarat;
use App\Models\JenisWargaRutan;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function jenisSyarat()
    {
			$jenis_syarat = JenisSyarat::get();
			return view('officer.jenis_syarat.index', compact('jenis_syarat'));
		}

    public function jenisSyaratCreate()
    {
			return view('officer.jenis_syarat.create');
		}

    public function jenisSyaratStore(Request $request)
    {
			$request->validate([
				'nama_syarat' => ['required', 'regex:/^[a-zA-Z ]+$/'],
			]);

			$jenis_syarat = new JenisSyarat();
			$jenis_syarat->nama_syarat = $request->nama_syarat;
			$jenis_syarat->status = 'y';
			$jenis_syarat->save();

			return redirect()->route('officer.jenis_syarat.create')->with('status','Data berhasil di simpan... ');
		}

    public function jenisSyaratEdit($id)
    {

			$data = JenisSyarat::find($id);

      return view('officer.jenis_syarat.edit', compact('data'));
		}

    public function jenisSyaratUpdate(Request $request, $id)
    {
			$request->validate([
				'nama_syarat' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'status' => ['required'],
			]);

			$cek_data = JenisSyarat::where('id_jenis_syarat', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$jenis_syarat = JenisSyarat::find($id);
				$jenis_syarat->nama_syarat = $request->nama_syarat;
				$jenis_syarat->status = $request->status;
				$jenis_syarat->save();

				return redirect()->back()->with(['success' => 'Data berhasil diupdate.']);
			}
		}

		// For WARGA RUTAN ////////////////

    public function jenisWarga()
    {
			$jenis_warga_rutan = JenisWargaRutan::get();
			return view('officer.jenis_warga_rutan.index', compact('jenis_warga_rutan'));
		}

    public function jenisWargaCreate()
    {
			return view('officer.jenis_warga_rutan.create');
		}

    public function jenisWargaStore(Request $request)
    {
			$request->validate([
				'nama_jenis' => ['required', 'regex:/^[a-zA-Z ]+$/'],
			]);

			$jenis_warga_rutan = new JenisWargaRutan();
			$jenis_warga_rutan->nama_jenis = $request->nama_jenis;
			$jenis_warga_rutan->status = 'y';
			$jenis_warga_rutan->save();

			return redirect()->route('officer.jenis_warga_rutan.create')->with('status','Data berhasil di simpan... ');
		}

    public function jenisWargaEdit($id)
    {

			$data = JenisWargaRutan::find($id);

      return view('officer.jenis_warga_rutan.edit', compact('data'));
		}

    public function jenisWargaUpdate(Request $request, $id)
    {
			$request->validate([
				'nama_jenis' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'status' => ['required'],
			]);

			$cek_data = JenisWargaRutan::where('id_jenis_warga_rutan', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$warga = JenisWargaRutan::find($id);
				$warga->nama_jenis = $request->nama_jenis;
				$warga->status = $request->status;
				$warga->save();

				return redirect()->back()->with(['success' => 'Data berhasil diupdate.']);
			}
		}


}
