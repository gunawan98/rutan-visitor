<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalJaga extends Model
{
    use HasFactory;

		protected $table = 'jadwal_jaga';

		protected $fillable = [
			'petugas_id', 'hari',
		];

		public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
