<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use App\Models\Absensi;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/login');
        }

        $orangTua = OrangTua::with('siswa.kelas')
            ->where('user_id', $user->id)
            ->first();

        $anak = $orangTua?->siswa;

        return view('orangtua.dashboard.index', [
            'nilaiAnak' => $anak ? $anak->nilai()->count() : 0,
            'absensiAnak' => $anak ? Absensi::where('siswa_id', $anak->id)->count() : 0,
            'jadwalPelajaran' => $anak && $anak->kelas_id
                ? Jadwal::where('kelas_id', $anak->kelas_id)->count()
                : 0,

            'namaAnak' => $anak?->nama_siswa ?? '-',
            'kelasAnak' => $anak?->kelas?->nama_kelas ?? '-',
        ]);
    }
}