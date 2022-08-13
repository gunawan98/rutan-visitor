<?php

namespace Database\Seeders;

use App\Models\DetailKeluarga;
use Illuminate\Database\Seeder;

class DetailKeluargaSeeder extends Seeder
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
					'id_pengunjung' => 1,
					'id_warga_rutan' => 1,
					'status_keluarga' => 'y'
				],[
					'id_pengunjung' => 2,
					'id_warga_rutan' => 2,
					'status_keluarga' => 'y'
				]
			];

			DetailKeluarga::insert($data);
    }
}
