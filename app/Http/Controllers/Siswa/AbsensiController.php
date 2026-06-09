<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $userId = session('user_id');

        $siswa = Siswa::with('kelas')
            ->where('user_id', $userId)
            ->first();

        $absensi = collect();

        if ($siswa) {
            $absensi = Absensi::where('siswa_id', $siswa->id)->get();
        }

        return view('siswa.absensi.index', compact('siswa','absensi'));
    }
}