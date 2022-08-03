<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

		protected $table = 'kunjungan';

		protected $fillable = [
			'petugas_id', 'user_id', 'warga_rutan_id', 'nama_pengunjung', 'jmh_pengikut_laki', 'jmh_pengikut_perempuan', 'jmh_pengikut_anak', 'no_antrian', 'tanggal_kunjungan'
		];

		public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

		public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

		public function warga_rutan()
    {
        return $this->belongsTo(WargaRutan::class, 'warga_rutan_id');
    }
}
