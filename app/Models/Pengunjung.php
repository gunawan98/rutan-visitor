<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengunjung extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

		protected $table = 'pengunjung';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'nama',
				'jenis_kelamin',
				'no_telepon',
				'alamat',
        'email',
        'password',
				'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

		public function detail_keluarga()
    {
			return $this->hasMany(DetailKeluarga::class, 'pengunjung_id', 'id');
    }
		
		public function detail_kunjungan()
    {
			return $this->hasMany(DetailKunjungan::class, 'pengunjung_id', 'id');
    }

}
