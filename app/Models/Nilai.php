<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\MataPelajaran;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'guru_id',
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

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // rata-rata nilai
    public function getRataRataAttribute()
    {
        return round(
            ($this->nilai_tugas + $this->nilai_uts + $this->nilai_uas) / 3,
            2
        );
    }

    // grade otomatis
    public function getGradeAttribute()
    {
        return match (true) {
            $this->rata_rata >= 90 => 'A',
            $this->rata_rata >= 85 => 'A-',
            $this->rata_rata >= 80 => 'B+',
            $this->rata_rata >= 75 => 'B',
            $this->rata_rata >= 70 => 'C',
            $this->rata_rata >= 60 => 'D',
            default => 'E'
        };
    }
}