<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')
            ->where('user_id', auth()->id())
            ->first();

        $absensi = $siswa
            ? Absensi::where('siswa_id', $siswa->id)->get()
            : collect();

        return view('siswa.absensi.index', compact('siswa', 'absensi'));
    }
}