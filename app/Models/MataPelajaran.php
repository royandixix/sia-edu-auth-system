<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\Nilai;
use App\Models\Jadwal;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';

    public $timestamps = false;

    protected $fillable = [
        'nama_mapel',
        'guru_id'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'mapel_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'mapel_id');
    }
}