<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSyarat extends Model
{
    use HasFactory;

		protected $table = 'detail_syarat';

		protected $fillable = [
			'petugas_id', 'pengunjung_id', 'jenis_syarat_id', 'tanggal_verifikasi', 'file_syarat'
		];

		public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

		public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
    }

		public function jenis_syarat()
    {
        return $this->belongsTo(JenisSyarat::class, 'jenis_syarat_id');
    }
}
