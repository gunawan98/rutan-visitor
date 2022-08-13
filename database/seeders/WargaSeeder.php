<?php

namespace Database\Seeders;

use App\Models\WargaRutan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WargaSeeder extends Seeder
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
					'id_jenis_warga_rutan' => 1,
					'nik' => '1516001119998',
					'nama_warga_rutan' => 'Badrool',
					'alamat' => 'Sumber Anyar',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085111222333',
					'kasus' => 'Mencuri data',
					'status' => 'y'
				],[
					'id_jenis_warga_rutan' => 2,
					'nik' => '1516001119996',
					'nama_warga_rutan' => 'Juminte',
					'alamat' => 'Alas Purwo',
					'jenis_kelamin' => 'perempuan',
					'no_telepon' => '085111222339',
					'kasus' => 'Mencuri data',
					'status' => 'y'
				],[
					'id_jenis_warga_rutan' => 1,
					'nik' => '1516001119997',
					'nama_warga_rutan' => 'Bonge',
					'alamat' => 'Krajan',
					'jenis_kelamin' => 'laki-laki',
					'no_telepon' => '085111222335',
					'kasus' => 'Aksi Tawuran antar pelajar',
					'status' => 'y'
				],
			];

			WargaRutan::insert($data);
    }
}
