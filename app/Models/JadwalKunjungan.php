<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKunjungan extends Model
{
    use HasFactory;

		protected $table = 'jadwal_kunjungan';
		protected $primaryKey = 'id_jadwal_kunjungan';

		protected $fillable = [
			'id_petugas', 'hari', 'jam_mulai', 'jam_selesai', 'kapasitas', 'status'
		];

		public function kunjungan()
    {
			return $this->hasMany(Kunjungan::class, 'id_jadwal_kunjungan', 'id_jadwal_kunjungan');
    }

		public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
