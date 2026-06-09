<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Absensi;
use App\Models\Nilai;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $totalMapel = MataPelajaran::count();

        $totalAbsensi = Absensi::count();
        $totalNilai = Nilai::count();

        // =========================
        // RATA-RATA NILAI (FIXED)
        // =========================
        $rataNilaiPersen = Nilai::count()
            ? round(
                (
                    Nilai::sum('nilai_tugas') +
                    Nilai::sum('nilai_uts') +
                    Nilai::sum('nilai_uas')
                ) / (Nilai::count() * 3),
            2)
            : 0;

        // =========================
        // KEHADIRAN (SIMPLE VERSION)
        // =========================
        $persentaseKehadiran = Absensi::count()
            ? 100
            : 0;

        return view('kepsek.dashboard.index', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalMapel',
            'totalAbsensi',
            'totalNilai',
            'rataNilaiPersen',
            'persentaseKehadiran'
        ));
    }
}