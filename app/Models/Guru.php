<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nip',
        'nama_guru',
        'jk',
        'mapel',
        'alamat',
        'user_id'
    ];

    /**
     * Relasi ke user (admin yang input data)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ❌ Dihapus sementara karena bentrok dengan kolom "mapel"
    // public function mapel()
    // {
    //     return $this->hasMany(MataPelajaran::class);
    // }
}