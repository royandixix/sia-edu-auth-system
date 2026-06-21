<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;

class NilaiController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ambil orang tua login
        $orangTua = OrangTua::with('siswa.nilai.mapel')
            ->where('user_id', $user->id)
            ->first();

        // ambil siswa (1 orang tua = 1 siswa)
        $siswa = $orangTua?->siswa;

        // ambil nilai
        $nilai = $siswa?->nilai ?? collect();

        return view('orangtua.nilai.index', compact(
            'orangTua',
            'siswa',
            'nilai'
        ));
    }
}