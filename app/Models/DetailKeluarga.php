<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeluarga extends Model
{
    use HasFactory;

		protected $table = 'detail_keluarga';

		protected $fillable = [
			'pengunjung_id', 'warga_rutan_id', 'status_keluarga',
		];

		public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
    }

		public function warga_rutan()
    {
        return $this->belongsTo(WargaRutan::class, 'warga_rutan_id');
    }
}
