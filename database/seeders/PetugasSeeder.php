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
					'nama' => 'Hartono S.H',
					'alamat' => 'Paiton',
					'no_telepon' => '089334556781',
					'email' => '089334556781',
					'password' => Hash::make('qwerty'),
				],[
					'nama' => 'Sugiman S.H',
					'alamat' => 'Kraksaan',
					'no_telepon' => '089334556782',
					'email' => '089334556782',
					'password' => Hash::make('qwerty'),
				],[
					'nama' => 'Wayan Kartono ',
					'alamat' => 'Besuk',
					'no_telepon' => '089334556783',
					'email' => '089334556783',
					'password' => Hash::make('qwerty'),
				],[
					'nama' => 'Jumari',
					'alamat' => 'Paiton',
					'no_telepon' => '089334556784',
					'email' => '089334556784',
					'password' => Hash::make('qwerty'),
				],[
					'nama' => 'Suden',
					'alamat' => 'Kraksaan',
					'no_telepon' => '089334556785',
					'email' => '089334556785',
					'password' => Hash::make('qwerty'),
				]
			];

			Petugas::insert($data);
    }
}
