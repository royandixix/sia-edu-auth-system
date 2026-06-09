<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        $siswa = Siswa::with('kelas')
            ->where('user_id', $userId)
            ->first();

        if (!$siswa) {
            return view('siswa.dashboard.index', [
                'siswa' => null,
                'nilai' => collect(),
                'absensi' => collect(),
                'jadwal' => collect(),
                'pengumuman' => collect(),
            ]);
        }

        return view('siswa.dashboard.index', [
            'siswa' => $siswa,
            'nilai' => Nilai::where('siswa_id', $siswa->id)->get(),
            'absensi' => Absensi::where('siswa_id', $siswa->id)->get(),
            'jadwal' => Jadwal::with(['mapel','guru'])
                ->where('kelas_id', $siswa->kelas_id)
                ->get(),
            'pengumuman' => Pengumuman::latest()->get(),
        ]);
    }
}