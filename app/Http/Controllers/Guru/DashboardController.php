<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\Nilai;
use App\Models\MataPelajaran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $absensiHariIni = Absensi::whereDate('tanggal', today())->count();
        $nilaiDiinput = Nilai::count();
        $totalMapel = MataPelajaran::count();

        return view('guru.dashboard.index', compact(
            'totalSiswa',
            'absensiHariIni',
            'nilaiDiinput',
            'totalMapel'
        ));
    }
}