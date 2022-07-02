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
				'hubungan' => 'LDR',
				'file_ktp' => 'crimKtp.pdf'
			],[
				'user_id' => 2,
				'tipe' => 'pidana',
				'name' => 'Mbah Toing',
				'kasus' => 'Sering gosipin tetangga',
				'no_nik' => Str::random(16),
				'hubungan' => 'Kai nah caen',
				'file_ktp' => 'crimKtp.pdf'
			]];

			Criminal::insert($data);
    }
}
