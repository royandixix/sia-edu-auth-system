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
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    // ACCESSOR
    public function getRataRataAttribute()
    {
        return round(
            ($this->nilai_tugas + $this->nilai_uts + $this->nilai_uas) / 3,
            2
        );
    }

    public function getGradeAttribute()
    {
        $nilai = $this->rata_rata;

        return match (true) {
            $nilai >= 90 => 'A',
            $nilai >= 85 => 'A-',
            $nilai >= 80 => 'B+',
            $nilai >= 75 => 'B',
            $nilai >= 70 => 'B-',
            $nilai >= 65 => 'C+',
            $nilai >= 60 => 'C',
            $nilai >= 55 => 'D',
            default => 'E'
        };
    }

    public function getStatusAttribute()
    {
        return $this->rata_rata >= 75 ? 'Tuntas' : 'Tidak Tuntas';
    }
}