<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orang_tua';

    protected $fillable = [
        'nama',
        'no_hp',
        'siswa_id',
        'user_id'
    ];

    // login parent
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 orang tua = 1 siswa (sesuai DB kamu)
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}