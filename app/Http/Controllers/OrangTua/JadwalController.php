<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        // ambil orang tua + siswa
        $orangTua = OrangTua::with('siswa.kelas')
            ->where('user_id', $userId)
            ->first();

        $siswa = $orangTua?->siswa;

        $jadwal = collect();

        if ($siswa) {
            $jadwal = Jadwal::with(['mapel', 'guru', 'kelas'])
                ->where('kelas_id', $siswa->kelas_id)
                ->get();
        }

        return view('orangtua.jadwal.index', compact(
            'orangTua',
            'siswa',
            'jadwal'
        ));
    }
}