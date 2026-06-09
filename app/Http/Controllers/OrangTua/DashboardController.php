<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        // ambil orang tua + siswa
        $orangTua = OrangTua::with('siswa')
            ->where('user_id', $userId)
            ->first();

        $anak = $orangTua?->siswa;

        return view('orangtua.dashboard.index', [
            'nilaiAnak' => $anak ? $anak->nilai()->count() : 0,
            'absensiAnak' => $anak ? Absensi::where('siswa_id', $anak->id)->count() : 0,
            'jadwalPelajaran' => Jadwal::count(),

            'namaAnak' => $anak->nama_siswa ?? '-',
            'kelasAnak' => $anak->kelas->nama_kelas ?? '-',
        ]);
    }
}