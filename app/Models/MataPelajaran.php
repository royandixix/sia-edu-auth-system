<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Guru; // ✅ INI YANG KURANG

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
        return $this->belongsTo(Guru::class);
    }
}