<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'jk',
        'alamat',
        'kelas_id',
        'user_id',
        'status'
    ];

    // kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }

    // orang tua (optional reverse)
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class, 'siswa_id');
    }
}