<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')
            ->where('user_id', auth()->id())
            ->first();

        return view('siswa.dashboard.index', [
            'siswa' => $siswa,
            'nilai' => $siswa ? Nilai::where('siswa_id', $siswa->id)->get() : collect(),
            'absensi' => $siswa ? Absensi::where('siswa_id', $siswa->id)->get() : collect(),
            'jadwal' => $siswa
                ? Jadwal::with(['mapel','guru'])
                    ->where('kelas_id', $siswa->kelas_id)
                    ->get()
                : collect(),
            'pengumuman' => Pengumuman::latest()->get(),
        ]);
    }
}