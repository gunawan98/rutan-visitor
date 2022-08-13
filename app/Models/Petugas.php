<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Petugas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

		protected $guard = 'petugas';
		protected $primaryKey = 'id_petugas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_petugas',
        'alamat',
        'no_telepon',
        'username',
        'password',
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

		public function jadwal_kunjungan()
    {
			return $this->hasMany(JadwalKunjungan::class, 'id_petugas', 'id_petugas');
    }
		
		public function detail_syarat()
    {
			return $this->hasMany(DetailSyarat::class, 'id_petugas', 'id_petugas');
    }

}
