<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisWargaRutan extends Model
{
    use HasFactory;

		protected $table = 'jenis_warga_rutan';

		protected $fillable = [
			'nama_jenis', 'status'
		];

		public function warga_rutan()
    {
			return $this->hasMany(WargaRutan::class, 'jenis_warga_rutan_id', 'id');
    }
}
