<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

		protected $fillable = [
			'officer_id', 'user_id', 'criminal_id', 'jmh_pengikut_laki', 'jmh_pengikut_perempuan', 'jmh_pengikut_anak', 'no_antrian', 'tanggal_kunjungan', 'jam_kunjungan'
		];

		public function officer()
    {
        return $this->belongsTo(Officer::class, 'officer_id');
    }

		public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

		public function criminal()
    {
        return $this->belongsTo(Criminal::class, 'criminal_id');
    }
}
