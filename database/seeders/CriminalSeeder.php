<?php

namespace Database\Seeders;

use App\Models\WargaRutan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CriminalSeeder extends Seeder
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
					'user_id' => 1,
					'tipe' => 'tahanan',
					'name' => 'Grandong',
					'kasus' => 'Mencuri Timun',
					'no_nik' => 1111000099998881,
					'hubungan' => 'Saudara Sepupu',
					'file_ktp' => '1.jpg',
					'file_foto' => '1.jpg'
				],[
					'user_id' => 2,
					'tipe' => 'tahanan',
					'name' => 'Mbah Toing',
					'kasus' => 'Sering gosipin tetangga',
					'no_nik' => 1111000099998882,
					'hubungan' => 'Kai nah caen',
					'file_ktp' => '2.jpg',
					'file_foto' => '2.jpg'
				],[
					'user_id' => 3,
					'tipe' => 'tahanan',
					'name' => 'Bonge',
					'kasus' => 'Aksi Tawuran antar pelajar',
					'no_nik' => 1111000099998883,
					'hubungan' => 'Adik laki-laki',
					'file_ktp' => '3.jpg',
					'file_foto' => '3.jpg'
				],[
					'user_id' => 4,
					'tipe' => 'pidana',
					'name' => 'Bogel Bandi',
					'kasus' => 'Transaksi mirasantika',
					'no_nik' => 1111000099998884,
					'hubungan' => 'Saudara kandung',
					'file_ktp' => '4.jpg',
					'file_foto' => '4.jpg'
				],[
					'user_id' => 5,
					'tipe' => 'pidana',
					'name' => 'Wagiman',
					'kasus' => 'Jambret',
					'no_nik' => 1111000099998885,
					'hubungan' => 'Kakak ipar',
					'file_ktp' => '5.jpg',
					'file_foto' => '5.jpg'
				]
			];

			WargaRutan::insert($data);
    }
}
