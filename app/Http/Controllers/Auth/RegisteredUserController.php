<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DetailKeluarga;
use App\Models\DetailSyarat;
use App\Models\JenisSyarat;
use App\Models\Pengunjung;
use App\Models\User;
use App\Models\WargaRutan;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
				$warga_rutan = WargaRutan::where('status', 'y')->get();
        return view('auth.register', compact('warga_rutan'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
					'nik' => ['required', 'numeric', 'digits:16', 'unique:pengunjung'],
					'username' => ['required', 'string', 'max:255', 'unique:pengunjung'],
					'password' => ['required'],
					'nama_pengunjung' => ['required', 'regex:/^[a-zA-Z ]+$/'],
					'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
					'no_telepon' => 'required|numeric|min:10',
					'alamat' => 'required',
					'id_warga_rutan' => 'required|numeric',
					'file_syarat' => 'required|max:10000|mimes:pdf'
        ]);

				$pengunjung = new Pengunjung();
				$pengunjung->nik = $request->nik;
				$pengunjung->nama_pengunjung = $request->nama_pengunjung;
				$pengunjung->jenis_kelamin = $request->jenis_kelamin;
				$pengunjung->no_telepon = $request->no_telepon;
				$pengunjung->alamat = $request->alamat;
				$pengunjung->username = $request->username;
				$pengunjung->password = Hash::make($request->password);
				$pengunjung->status = 't';
				$saved = $pengunjung->save();

				$get_jenis_syarat = JenisSyarat::where('status', 'y')->orderBy('id_jenis_syarat', 'desc')->first();

				if ($saved) {
					$detail_keluarga = new DetailKeluarga();
					$detail_keluarga->id_pengunjung = $pengunjung->id_pengunjung;
					$detail_keluarga->id_warga_rutan = $request->id_warga_rutan;
					$detail_keluarga->status_keluarga = 'y';
					$detail_keluarga->save();

					$fileNameSyarat = '';
					$file = request()->file('file_syarat');
					$extension = $file->getClientOriginalExtension();
					$fileNameSyarat = time(). "." .$extension;
					$file->move(public_path().'/uploads/file_syarat/', $fileNameSyarat); 

					$detail_syarat = new DetailSyarat();
					$detail_syarat->id_pengunjung = $pengunjung->id_pengunjung;
					$detail_syarat->id_jenis_syarat = $get_jenis_syarat->id_jenis_syarat;
					$detail_syarat->file_syarat = $fileNameSyarat;
					$detail_syarat->save();
				}

				return back();
				

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
