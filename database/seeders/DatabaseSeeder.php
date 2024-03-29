<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
			$this->call([
				PetugasSeeder::class,
				PengunjungSeeder::class,
				JenisWargaSeeder::class,
				WargaSeeder::class,
				DetailKeluargaSeeder::class,
				JenisSyaratSeeder::class,
				DetailSyaratSeeder::class,
				JadwalKunjunganSeeder::class
			]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
