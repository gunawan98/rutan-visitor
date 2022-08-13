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
					'nama_pengunjung' => 'Tono Sudiro',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085222333444',
					'alamat' => 'Gang Buntu - Desa Penari',
					'username' => 'tono',
					'password' => Hash::make('qwerty'),
					'status' => 'y',
				],[
					'nik' => Str::random(16),
					'nama_pengunjung' => 'Winny Poo',
					'jenis_kelamin' => 'perempuan',
					'no_telepon' => '085222333555',
					'alamat' => 'Jl. Mulu No.00 - Desa Gir Sereng',
					'username' => 'winny',
					'password' => Hash::make('qwerty'),
					'status' => 't',
				],
			];

			Pengunjung::insert($data);
    }
}
