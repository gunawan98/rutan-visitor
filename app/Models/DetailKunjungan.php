<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKunjungan extends Model
{
    use HasFactory;

		protected $table = 'detail_kunjungan';

		protected $fillable = [
			'pengunjung_id', 'kunjungan_id',
		];

		public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
    }

		public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id');
    }
}
