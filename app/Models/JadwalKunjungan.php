<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKunjungan extends Model
{
    use HasFactory;

		protected $table = 'jadwal_kunjungan';

		protected $fillable = [
			'petugas_id', 'hari', 'jam_mulai', 'jam_selesai', 'kapasitas', 'status'
		];

		public function kunjungan()
    {
			return $this->hasMany(Kunjungan::class, 'jadwal_id', 'id');
    }

		public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
