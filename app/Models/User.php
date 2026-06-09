<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'status_login',
        'verification_token',
        'role'
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'status_login' => 'boolean',
    ];

    // RELASI
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
}