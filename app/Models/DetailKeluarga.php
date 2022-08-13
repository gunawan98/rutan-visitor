<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeluarga extends Model
{
    use HasFactory;

		protected $table = 'detail_keluarga';

		protected $fillable = [
			'id_pengunjung', 'id_warga_rutan', 'status_keluarga',
		];

		public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'id_pengunjung');
    }

		public function warga_rutan()
    {
        return $this->belongsTo(WargaRutan::class, 'id_warga_rutan');
    }
}
