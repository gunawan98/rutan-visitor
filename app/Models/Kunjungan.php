<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

		protected $table = 'kunjungan';

		protected $fillable = [
			'jadwal_id', 'tanggal_kunjungan',
		];

		public function detail_kunjungan()
    {
			return $this->hasMany(DetailKunjungan::class, 'kunjungan_id', 'id');
    }

		public function jadwal_kunjungan()
    {
      return $this->belongsTo(JadwalKunjungan::class, 'jadwal_id');
    }
}
