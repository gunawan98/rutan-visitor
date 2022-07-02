<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criminal extends Model
{
    use HasFactory;

		protected $fillable = [
			'user_id', 'name', 'tipe', 'kasus', 'no_nik', 'hubungan', 'file_ktp'
		];

		public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

		public function visitor()
    {
			return $this->hasMany(Visitor::class, 'criminal_id', 'id');
    }
}
