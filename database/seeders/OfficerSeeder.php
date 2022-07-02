<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('officers')->insert([
					'name' => 'Melany Ningrum',
					'email' => 'melany@gmail.com',
					'password' => Hash::make('melany'),
			]);
    }
}
