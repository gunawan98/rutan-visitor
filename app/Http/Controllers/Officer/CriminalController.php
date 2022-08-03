<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WargaRutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CriminalController extends Controller
{
    public function index()
    {
			$data_criminal = WargaRutan::orderBy('id', 'DESC')->get();
      return view('officer.criminal.index', compact('data_criminal'));
    }

    public function create()
    {
			$data_user = User::select('id','name','no_telepon')->get();
      return view('officer.criminal.create', compact('data_user'));
    }

    public function store(Request $request)
    {
			$request->validate([
				'user_id' => ['required', 'integer'],
				'name' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'tipe' => ['required', 'in:pidana,tahanan'],
				'kasus' => 'required',
				'no_nik' => ['required', 'numeric', 'digits:16', 'unique:warga_rutan'],
				'hubungan' => 'required',
			]);

			$fileNameKTP = '';
			if ($request->hasFile('file_ktp')) {
				$file = request()->file('file_ktp');
				$extension = $file->getClientOriginalExtension();
				$fileNameKTP = time(). "." .$extension;
				$file->move(public_path().'/uploads/file_ktp/', $fileNameKTP);    
			}

			$fileNameFoto = '';
			if ($request->hasFile('file_foto')) {
				$file = request()->file('file_foto');
				$extension = $file->getClientOriginalExtension();
				$fileNameFoto = time(). "." .$extension;
				$file->move(public_path().'/uploads/file_foto/', $fileNameFoto);    
			}

			$criminal = new WargaRutan();
			$criminal->user_id = $request->user_id;
			$criminal->name = $request->name;
			$criminal->tipe = $request->tipe;
			$criminal->kasus = $request->kasus;
			$criminal->no_nik = $request->no_nik;
			$criminal->hubungan = $request->hubungan;
			$criminal->file_ktp = $fileNameKTP;
			$criminal->file_foto = $fileNameFoto;
			$criminal->save();

			return redirect()->route('officer.criminal.create')->with('status','Data berhasil di simpan... ');
    }

    public function show($id)
    {
			$data_criminal = WargaRutan::with('user')->get()->find($id);
			$data_user = User::select('id','name','no_telepon')->get();

      return view('officer.criminal.show', compact('data_criminal','data_user'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
				'user_id' => ['required', 'integer'],
				'name' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'tipe' => ['required', 'in:pidana,tahanan'],
				'kasus' => 'required',
				'no_nik' => 'required|numeric|digits:16|unique:warga_rutan,no_nik,'.$id,
				'hubungan' => 'required'
			]);

			$cek_data = WargaRutan::where('id', $id)->first();

			if ($cek_data === null) {
				return redirect()->back()->with(['warning' => 'Data tidak ditemukan.']);
			} else {
				$data = WargaRutan::find($id);
				$data->user_id = $request->user_id;
				$data->name = $request->name;
				$data->tipe = $request->tipe;
				$data->kasus = $request->kasus;
				$data->no_nik = $request->no_nik;
				$data->hubungan = $request->hubungan;

				if ($request->hasFile('file_ktp')) {
					File::delete('uploads/file_ktp/'.$data->file_ktp);
					
					$file = $request->file('file_ktp');
					$extension = $file->getClientOriginalExtension();
					$fileNameKTP = time(). "." .$extension;
					$file->move(public_path().'/uploads/file_ktp/', $fileNameKTP); 
							
					$data->file_ktp = $fileNameKTP;
				}

				if ($request->hasFile('file_foto')) {
					File::delete('uploads/file_foto/'.$data->file_foto);
					
					$file = $request->file('file_foto');
					$extension = $file->getClientOriginalExtension();
					$fileNameFoto = time(). "." .$extension;
					$file->move(public_path().'/uploads/file_foto/', $fileNameFoto); 
							
					$data->file_foto = $fileNameFoto;
				}
				
				$data->save();

				return redirect()->back()->with(['success' => 'Data kriminal berhasil diupdate.']);
			}
    }

    public function destroy(Request $request, $id)
    {
			if ($request->ajax()){

				$criminal = WargaRutan::findOrFail($id);

				if ($criminal){
					File::delete('uploads/file_ktp/'.$criminal->file_ktp);
					$criminal->delete();

					return response()->json(array('success' => true));
				}

			}
    }
}
