<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}   