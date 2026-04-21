<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // ✔ gunakan properti biasa (lebih umum & aman)
    protected $fillable = [
        'username',
        'email',
        'password',
        'status_login',
        'verification_token',
        'role'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'status_login' => 'boolean',
    ];

    // RELASI
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
}