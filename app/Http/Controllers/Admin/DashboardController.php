<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Absensi;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $totalMapel = MataPelajaran::count();

        $totalAbsensi = Absensi::count();
        $hadir = Absensi::where('keterangan', 'Hadir')->count();
        $persentaseKehadiran = $totalAbsensi > 0
            ? round(($hadir / $totalAbsensi) * 100, 1)
            : 0;

        $rataNilai = Nilai::select(
            DB::raw('AVG((nilai_tugas + nilai_uts + nilai_uas) / 3) as aggregate')
        )->first()->aggregate ?? 0;

        $rataNilaiPersen = round($rataNilai);

        $penyelesaianTugas = Nilai::count() > 0 
            ? round(Nilai::where('nilai_tugas', '>', 0)->count() / Nilai::count() * 100, 1)
            : 0;

        $activities = collect();

        $siswaTerbaru = Siswa::latest()->take(2)->get();
        foreach ($siswaTerbaru as $siswa) {
            $activities->push([
                'title' => 'Pendaftaran Siswa Baru Berhasil',
                'sub' => $siswa->nama . ' dimasukkan ke dalam basis data sistem',
                'time' => $siswa->created_at?->diffForHumans() ?? 'Baru saja',
                'bg' => 'bg-indigo-500/10 text-indigo-600',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>',
            ]);
        }

        $nilaiTerbaru = Nilai::with(['siswa', 'mapel'])->latest()->take(1)->get();
        foreach ($nilaiTerbaru as $nilai) {
            $activities->push([
                'title' => 'Rekapitulasi Nilai Selesai Diunggah',
                'sub' => 'Entri nilai ' . ($nilai->mapel->nama ?? 'Mapel') . ' untuk ' . ($nilai->siswa->nama ?? 'Siswa'),
                'time' => $nilai->created_at?->diffForHumans() ?? 'Baru saja',
                'bg' => 'bg-amber-500/10 text-amber-600',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>',
            ]);
        }

        if ($activities->isEmpty()) {
            $activities->push([
                'title' => 'Sinkronisasi Jurnal Absensi Kelas',
                'sub' => 'Sistem absensi berjalan normal dan divalidasi oleh cloud',
                'time' => 'Baru saja',
                'bg' => 'bg-emerald-500/10 text-emerald-600',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
            ]);
        } else {
            $activities = $activities->sortByDesc('time')->values()->take(3);
        }

        return view('admin.dashboard.index', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalMapel',
            'persentaseKehadiran',
            'rataNilai',
            'rataNilaiPersen',
            'penyelesaianTugas',
            'activities'
        ));
    }
}