<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaRutan extends Model
{
    use HasFactory;

		protected $table = 'warga_rutan';

		protected $fillable = [
			'user_id', 'name', 'tipe', 'kasus', 'no_nik', 'hubungan', 'file_ktp', 'file_foto'
		];

		public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

		public function kunjungan()
    {
			return $this->hasMany(Kunjungan::class, 'warga_rutan_id', 'id');
    }
}
