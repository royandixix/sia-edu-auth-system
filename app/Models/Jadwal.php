<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'kelas_id',
        'mapel_id',
        'guru_id',   // 🔥 TAMBAH INI
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    // 🔥 TAMBAH RELASI INI
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}