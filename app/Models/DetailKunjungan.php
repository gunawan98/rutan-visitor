<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKunjungan extends Model
{
    use HasFactory;

		protected $table = 'detail_kunjungan';
		protected $primaryKey = 'id_detail_kunjungan';

		protected $fillable = [
			'id_pengunjung', 'id_kunjungan',
		];

		public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'id_pengunjung');
    }

		public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan');
    }
}
