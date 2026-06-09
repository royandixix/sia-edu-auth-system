<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;

class NilaiController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        // ambil orang tua + siswa + nilai + mapel sekaligus
        $orangTua = OrangTua::with(['siswa.nilai.mapel'])
            ->where('user_id', $userId)
            ->first();

        $siswaAktif = $orangTua?->siswa;

        $nilai = $siswaAktif
            ? $siswaAktif->nilai
            : collect();

        return view('orangtua.nilai.index', compact(
            'orangTua',
            'siswaAktif',
            'nilai'
        ));
    }
}