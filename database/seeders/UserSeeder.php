<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$data = [
				[
					'no_kk' => Str::random(16),
					'name' => 'Tono Sudiro',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085222333444',
					'alamat' => 'Gang Buntu - Desa Penari',
					'file_kk' => '1.jpg',
					'email' => 'tono@test.com',
					'password' => Hash::make('qwerty'),
				],[
					'no_kk' => Str::random(16),
					'name' => 'Winny Poo',
					'jenis_kelamin' => 'perempuan',
					'no_telepon' => '085222333555',
					'alamat' => 'Jl. Mulu No.00 - Desa Gir Sereng',
					'file_kk' => '2.jpg',
					'email' => 'winny@test.com',
					'password' => Hash::make('qwerty'),
				],[
					'no_kk' => Str::random(16),
					'name' => 'Tja Purno',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085222333556',
					'alamat' => 'Jl. Sudirman No.02 - Citayem',
					'file_kk' => '3.jpg',
					'email' => 'tja@test.com',
					'password' => Hash::make('qwerty'),
				],[
					'no_kk' => Str::random(16),
					'name' => 'Wiro Kurniawan',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085222333557',
					'alamat' => 'Jl. Sudirman No.02 - Cilandak',
					'file_kk' => '4.jpg',
					'email' => 'wiro@test.com',
					'password' => Hash::make('qwerty'),
				],[
					'no_kk' => Str::random(16),
					'name' => 'Maryani',
					'jenis_kelamin' => 'perempuan',
					'no_telepon' => '085222333558',
					'alamat' => 'Jl. Sudirman No.02 - Pasar Senen',
					'file_kk' => '5.jpg',
					'email' => 'maryani@test.com',
					'password' => Hash::make('qwerty'),
				]
			];

			User::insert($data);
    }
}
