<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$data_users = User::orderBy('id', 'DESC')->get();
      return view('officer.user.index', compact('data_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('officer.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
			$request->validate([
				'no_kk' => ['required', 'numeric', 'digits:16', 'unique:users'],
				'no_nik' => ['required', 'numeric', 'digits:16', 'unique:users'],
				'name' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
				'no_telepon' => ['required', 'numeric', 'unique:users'],
				'alamat' => 'required',
				'file_kk' => 'required',
				'file_ktp' => 'required',
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'confirmed', Rules\Password::defaults()],
			]);

			$file = request()->file('file_kk');
			$extension = $file->getClientOriginalExtension();
			$fileName = time(). "." .$extension;
			$file->move(public_path().'/uploads/file_kk/', $fileName);   
			 
			$file_ktp = request()->file('file_ktp');
			$extensionKtp = $file_ktp->getClientOriginalExtension();
			$fileNameKtp = time(). "." .$extensionKtp;
			$file_ktp->move(public_path().'/uploads/file_ktp_user/', $fileNameKtp);    

			$user = new User();
			$user->no_kk = $request->no_kk;
			$user->no_nik = $request->no_nik;
			$user->name = $request->name;
			$user->jenis_kelamin = $request->jenis_kelamin;
			$user->no_telepon = $request->no_telepon;
			$user->alamat = $request->alamat;
			$user->file_kk = $fileName;
			$user->file_ktp = $fileNameKtp;
			$user->email = $request->email;
			$user->password = Hash::make($request->password);
			$user->save();

			return redirect()->route('officer.user.create')->with('status','Akun berhasil di simpan... ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$data_user = User::findOrFail($id);
			$count_kunjungan = Kunjungan::where('user_id', $id)->count();
      return view('officer.user.show', compact('data_user','count_kunjungan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
				'no_kk' => 'required|numeric|digits:16|unique:users,no_kk,'.$id,
				'no_nik' => 'required|numeric|digits:16|unique:users,no_nik,'.$id,
				'name' => ['required', 'regex:/^[a-zA-Z ]+$/'],
				'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
				'no_telepon' => 'required|numeric|unique:users,no_telepon,'.$id,
				'alamat' => 'required',
				'email' => 'required|string|email|max:255|unique:users,email,'.$id
			]);

			$cek_data = User::where('id', $id)->first();

			if ($cek_data === null) {
				// dd('no');
				return redirect()->back()->with(['warning' => 'User tidak ditemukan.']);
			} else {
				// dd('yes');
					$data = User::find($id);
					$data->no_kk = $request->no_kk;
					$data->name = $request->name;
					$data->jenis_kelamin = $request->jenis_kelamin;
					$data->no_telepon = $request->no_telepon;
					$data->alamat = $request->alamat;
					$data->email = $request->email;

					if ($request->hasFile('file_kk')) {
						File::delete('uploads/file_kk/'.$data->file_kk);
            
            $file = $request->file('file_kk');
            $extension = $file->getClientOriginalExtension();
            $fileName = time(). "." .$extension;
						$file->move(public_path().'/uploads/file_kk/', $fileName); 
               
            $data->file_kk = $fileName;
					}

					if ($request->hasFile('file_ktp')) {
						File::delete('uploads/file_ktp_user/'.$data->file_ktp);
            
            $file = $request->file('file_ktp');
            $extension = $file->getClientOriginalExtension();
            $fileName = time(). "." .$extension;
						$file->move(public_path().'/uploads/file_ktp_user/', $fileName); 
            
            $data->file_ktp = $fileName;
					}
					
					$data->save();

					return redirect()->back()->with(['success' => 'Data pengguna berhasil diupdate.']);
			}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
			if ($request->ajax()){

				$user = User::findOrFail($id);

				if ($user){
					File::delete('uploads/file_kk/'.$user->file_kk);
					File::delete('uploads/file_ktp_user/'.$user->file_ktp);
					$user->delete();

					return response()->json(array('success' => true));
				}

			}
    }
}
