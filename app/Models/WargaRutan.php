<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaRutan extends Model
{
    use HasFactory;

		protected $table = 'warga_rutan';

		protected $fillable = [
			'jenis_warga_rutan_id', 'nik', 'nama', 'alamat', 'jenis_kelamin', 'no_telepon', 'kasus', 'status'
		];

		public function jenis_warga_rutan()
    {
        return $this->belongsTo(JenisWargaRutan::class, 'jenis_warga_rutan_id');
    }

		public function detail_keluarga()
    {
			return $this->hasMany(DetailKeluarga::class, 'warga_rutan_id', 'id');
    }
}
