<?php

namespace Database\Seeders;

use App\Models\JenisWargaRutan;
use Illuminate\Database\Seeder;

class JenisWargaSeeder extends Seeder
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
					'nama_jenis' => 'tahanan',
					'status' => 'y',
				],[
					'nama_jenis' => 'pidana',
					'status' => 'y',
				],[
					'nama_jenis' => 'test',
					'status' => 't',
				],
			];

			JenisWargaRutan::insert($data);
    }
}
