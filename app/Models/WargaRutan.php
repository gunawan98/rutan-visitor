<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaRutan extends Model
{
    use HasFactory;

		protected $table = 'warga_rutan';
		protected $primaryKey = 'id_warga_rutan';

		protected $fillable = [
			'id_jenis_warga_rutan', 'nik', 'nama_warga_rutan', 'alamat', 'jenis_kelamin', 'no_telepon', 'kasus', 'status'
		];

		public function jenis_warga_rutan()
    {
        return $this->belongsTo(JenisWargaRutan::class, 'id_jenis_warga_rutan');
    }

		public function detail_keluarga()
    {
			return $this->hasMany(DetailKeluarga::class, 'id_warga_rutan', 'id_warga_rutan');
    }
}
