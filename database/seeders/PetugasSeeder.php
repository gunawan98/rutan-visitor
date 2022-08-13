<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
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
					'nama_petugas' => 'Hartono S.H',
					'alamat' => 'Paiton',
					'no_telepon' => '089334556781',
					'username' => 'hartono',
					'password' => Hash::make('qwerty'),
				],[
					'nama_petugas' => 'Sugiman S.H',
					'alamat' => 'Kraksaan',
					'no_telepon' => '089334556782',
					'username' => 'sugiman',
					'password' => Hash::make('qwerty'),
				],[
					'nama_petugas' => 'Wayan Kartono ',
					'alamat' => 'Besuk',
					'no_telepon' => '089334556783',
					'username' => 'wayan',
					'password' => Hash::make('qwerty'),
				],[
					'nama_petugas' => 'Jumari',
					'alamat' => 'Paiton',
					'no_telepon' => '089334556784',
					'username' => 'jumari',
					'password' => Hash::make('qwerty'),
				],[
					'nama_petugas' => 'Suden',
					'alamat' => 'Kraksaan',
					'no_telepon' => '089334556785',
					'username' => 'suden',
					'password' => Hash::make('qwerty'),
				]
			];

			Petugas::insert($data);
    }
}
