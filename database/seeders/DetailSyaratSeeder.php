<?php

namespace Database\Seeders;

use App\Models\DetailSyarat;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DetailSyaratSeeder extends Seeder
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
					'id_petugas' => 1,
					'id_pengunjung' => 1,
					'id_jenis_syarat' => 1,
					'tanggal_verifikasi' => Carbon::now()->toDateTimeString(),
					'file_syarat' => '1660284814.pdf'
				],[
					'id_petugas' => 1,
					'id_pengunjung' => 2,
					'id_jenis_syarat' => 1,
					'tanggal_verifikasi' => null,
					'file_syarat' => '1660284814.pdf'
				]
			];

			DetailSyarat::insert($data);
    }
}
