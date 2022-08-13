<?php

namespace Database\Seeders;

use App\Models\JenisSyarat;
use Illuminate\Database\Seeder;

class JenisSyaratSeeder extends Seeder
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
					'nama_syarat' => 'Syarat Verifikasi Akun',
					'status' => 'y',
				]
			];

			JenisSyarat::insert($data);
    }
}
