<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;

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
					'name' => 'Hartono S.H',
					'jabatan' => 'Petugas Jaga',
				],[
					'name' => 'Sugiman S.H',
					'jabatan' => 'Petugas Jaga',
				],[
					'name' => 'Wayan Kartono ',
					'jabatan' => 'Petugas Jaga',
				],[
					'name' => 'Jumari',
					'jabatan' => 'Petugas Jaga',
				],[
					'name' => 'Suden',
					'jabatan' => 'Petugas Jaga',
				]
			];

			Petugas::insert($data);
    }
}
