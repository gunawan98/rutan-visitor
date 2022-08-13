<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengunjung extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

		protected $table = 'pengunjung';
		protected $primaryKey = 'id_pengunjung';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'nama_pengunjung',
				'jenis_kelamin',
				'no_telepon',
				'alamat',
        'username',
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
			return $this->hasMany(DetailKeluarga::class, 'id_pengunjung', 'id_pengunjung');
    }
		
		public function detail_syarat()
    {
			return $this->hasMany(DetailSyarat::class, 'id_pengunjung', 'id_pengunjung');
    }
		
		public function detail_kunjungan()
    {
			return $this->hasMany(DetailKunjungan::class, 'id_pengunjung', 'id_pengunjung');
    }

}
