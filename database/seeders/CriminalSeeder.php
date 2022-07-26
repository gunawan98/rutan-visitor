<?php

namespace Database\Seeders;

use App\Models\Criminal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
					'no_nik' => Str::random(16),
					'hubungan' => 'Saudara Sepupu',
					'file_ktp' => '1.jpg'
				],[
					'user_id' => 2,
					'tipe' => 'tahanan',
					'name' => 'Mbah Toing',
					'kasus' => 'Sering gosipin tetangga',
					'no_nik' => Str::random(16),
					'hubungan' => 'Kai nah caen',
					'file_ktp' => '2.jpg'
				],[
					'user_id' => 3,
					'tipe' => 'tahanan',
					'name' => 'Bonge',
					'kasus' => 'Aksi Tawuran antar pelajar',
					'no_nik' => Str::random(16),
					'hubungan' => 'Adik laki-laki',
					'file_ktp' => '3.jpg'
				],[
					'user_id' => 4,
					'tipe' => 'pidana',
					'name' => 'Bogel Bandi',
					'kasus' => 'Transaksi mirasantika',
					'no_nik' => Str::random(16),
					'hubungan' => 'Saudara kandung',
					'file_ktp' => '4.jpg'
				],[
					'user_id' => 5,
					'tipe' => 'pidana',
					'name' => 'Wagiman',
					'kasus' => 'Jambret',
					'no_nik' => Str::random(16),
					'hubungan' => 'Kakak ipar',
					'file_ktp' => '5.jpg'
				]
			];

			Criminal::insert($data);
    }
}
