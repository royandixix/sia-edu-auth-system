<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Jadwal;
use App\Models\MataPelajaran;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nip',
        'nama_guru',
        'jk',
        'alamat',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'guru_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'guru_id');
    }

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'guru_id');
    }
}