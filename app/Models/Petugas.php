<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

		protected $table = 'petugas';

		protected $fillable = [
			'name', 'jabatan',
		];

		public function kunjungan()
    {
			return $this->hasMany(Kunjungan::class, 'petugas_id', 'id');
    }

		public function jadwal_jaga()
    {
			return $this->hasMany(JadwalJaga::class, 'petugas_id', 'id');
    }
}
