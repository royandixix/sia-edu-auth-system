<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orangTua = OrangTua::with('siswa')
            ->where('user_id', $user->id)
            ->first();

        $siswa = $orangTua?->siswa;

        $absensi = $siswa
            ? \App\Models\Absensi::where('siswa_id', $siswa->id)->latest()->get()
            : collect();

        return view('orangtua.absensi.index', compact('orangTua', 'siswa', 'absensi'));
    }
}
