<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Guru;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'wali_kelas'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }

    public function wali()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas');
    }
}