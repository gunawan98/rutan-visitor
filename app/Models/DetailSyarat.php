<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSyarat extends Model
{
    use HasFactory;

		protected $table = 'detail_syarat';
		protected $primaryKey = 'id_detail_syarat';

		protected $fillable = [
			'id_petugas', 'id_pengunjung', 'id_jenis_syarat', 'tanggal_verifikasi', 'file_syarat'
		];

		public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

		public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'id_pengunjung');
    }

		public function jenis_syarat()
    {
        return $this->belongsTo(JenisSyarat::class, 'id_jenis_syarat');
    }
}
