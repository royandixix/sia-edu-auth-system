<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\OrangTua;

class JadwalController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $orangTua = OrangTua::with('siswa.kelas')
        ->where('user_id', $user->id)
        ->first();

    $siswa = $orangTua?->siswa;

    $jadwal = collect();

    if ($siswa && $siswa->kelas_id) {
        $jadwal = \App\Models\Jadwal::with(['mapel','guru','kelas'])
            ->where('kelas_id', $siswa->kelas_id)
            ->get();
    }

    return view('orangtua.jadwal.index', compact('orangTua','siswa','jadwal'));
}
}