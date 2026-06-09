<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        // ambil orang tua + siswa
        $orangTua = OrangTua::with('siswa')
            ->where('user_id', $userId)
            ->first();

        $siswa = $orangTua?->siswa;

        $absensi = collect();

        if ($siswa) {
            $absensi = Absensi::where('siswa_id', $siswa->id)
                ->latest()
                ->get();
        }

        return view('orangtua.absensi.index', [
            'orangTua' => $orangTua,
            'siswa' => $siswa,
            'absensi' => $absensi,
        ]);
    }
}