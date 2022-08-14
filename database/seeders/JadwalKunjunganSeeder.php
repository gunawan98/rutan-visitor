<?php

namespace Database\Seeders;

use App\Models\JadwalKunjungan;
use Illuminate\Database\Seeder;

class JadwalKunjunganSeeder extends Seeder
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
					'hari' => 'Mon',
					'jam_mulai' => date("H:i", strtotime('09:00:00')),
					'jam_selesai' => date("H:i", strtotime('12:00:00')),
					'kapasitas' => 36,
					'status' => 'y'
				],
				[
					'id_petugas' => 2,
					'hari' => 'Tue',
					'jam_mulai' => date("H:i", strtotime('09:00:00')),
					'jam_selesai' => date("H:i", strtotime('12:00:00')),
					'kapasitas' => 36,
					'status' => 'y'
				],
				[
					'id_petugas' => 3,
					'hari' => 'Wed',
					'jam_mulai' => date("H:i", strtotime('09:00:00')),
					'jam_selesai' => date("H:i", strtotime('12:00:00')),
					'kapasitas' => 36,
					'status' => 'y'
				],
				[
					'id_petugas' => 4,
					'hari' => 'Thu',
					'jam_mulai' => date("H:i", strtotime('09:00:00')),
					'jam_selesai' => date("H:i", strtotime('12:00:00')),
					'kapasitas' => 36,
					'status' => 'y'
				],
			];

			JadwalKunjungan::insert($data);
    }
}
