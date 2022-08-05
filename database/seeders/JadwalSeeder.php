<?php

namespace Database\Seeders;

use App\Models\JadwalJaga;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
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
					'petugas_id' => 4,
					'hari' => 'Mon',
				],[
					'petugas_id' => 3,
					'hari' => 'Tue',
				],[
					'petugas_id' => 2,
					'hari' => 'Wed',
				],[
					'petugas_id' => 1,
					'hari' => 'Thu',
				]
			];

			JadwalJaga::insert($data);
    }
}
