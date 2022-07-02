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
				'file_kk' => 'mykk.pdf',
				'email' => 'tono@gmail.com',
				'password' => Hash::make('qwerty'),
			],[
				'no_kk' => Str::random(16),
				'name' => 'Winny Poo',
				'jenis_kelamin' => 'perempuan',
				'no_telepon' => '085222333555',
				'alamat' => 'Jl. Mulu No.00 - Desa Gir Sereng',
				'file_kk' => 'mykk.pdf',
				'email' => 'winny@gmail.com',
				'password' => Hash::make('qwerty'),
			]];

			User::insert($data);
    }
}
