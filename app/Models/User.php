<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'status_login',
        'verification_token',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'status_login' => 'boolean'
    ];

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isGuru()
    {
        return $this->role === 'guru';
    }

    public function isSiswa()
    {
        return $this->role === 'siswa';
    }

    public function isOrangTua()
    {
        return $this->role === 'orang_tua';
    }

    public function isKepsek()
    {
        return $this->role === 'kepala_sekolah';
    }


    public function isVerified()
    {
        return $this->status_login === true;
    }
}