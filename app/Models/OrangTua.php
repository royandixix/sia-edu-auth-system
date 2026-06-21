<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Siswa;

class OrangTua extends Model
{
    protected $table = 'orang_tua';

    protected $fillable = [
        'nama',
        'no_hp',
        'siswa_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔥 FIX PENTING: pakai foreign key jelas
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}