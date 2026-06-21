<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Absensi;
use App\Models\Nilai;

class LaporanController extends Controller
{
    private function data()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $totalMapel = MataPelajaran::count();
        $totalAbsensi = Absensi::count();
        $totalNilai = Nilai::count();

        if ($totalNilai > 0) {
            $rataNilaiPersen = round(
                (
                    Nilai::sum('nilai_tugas') +
                    Nilai::sum('nilai_uts') +
                    Nilai::sum('nilai_uas')
                ) / ($totalNilai * 3),
            2);
        } else {
            $rataNilaiPersen = 0;
        }

        $persentaseKehadiran = $totalAbsensi > 0 ? 100 : 0;

        return compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalMapel',
            'totalAbsensi',
            'totalNilai',
            'rataNilaiPersen',
            'persentaseKehadiran'
        );
    }

    public function index()
    {
        return view('kepsek.laporan.index', $this->data());
    }

    public function cetak()
    {
        return view('kepsek.laporan.cetak', $this->data());
    }
}