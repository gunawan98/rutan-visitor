<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PengunjungSeeder extends Seeder
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
					'nik' => Str::random(16),
					'nama' => 'Tono Sudiro',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085222333444',
					'alamat' => 'Gang Buntu - Desa Penari',
					'email' => 'tono@test.com',
					'password' => Hash::make('qwerty'),
					'status' => 'y',
				],[
					'nik' => Str::random(16),
					'nama' => 'Winny Poo',
					'jenis_kelamin' => 'perempuan',
					'no_telepon' => '085222333555',
					'alamat' => 'Jl. Mulu No.00 - Desa Gir Sereng',
					'email' => 'winny@test.com',
					'password' => Hash::make('qwerty'),
					'status' => 'y',
				],[
					'nik' => Str::random(16),
					'nama' => 'Tja Purno',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085222333556',
					'alamat' => 'Jl. Sudirman No.02 - Citayem',
					'email' => 'tja@test.com',
					'password' => Hash::make('qwerty'),
					'status' => 'y',
				],
			];

			Pengunjung::insert($data);
    }
}
