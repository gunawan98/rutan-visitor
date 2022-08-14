<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

		protected $table = 'kunjungan';
		protected $primaryKey = 'id_kunjungan';

		protected $fillable = [
			'id_jadwal_kunjungan', 'tanggal_kunjungan', 'no_antri'
		];

		public function detail_kunjungan()
    {
			return $this->hasMany(DetailKunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }

		public function jadwal_kunjungan()
    {
      return $this->belongsTo(JadwalKunjungan::class, 'id_jadwal_kunjungan');
    }
}
