<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Siswa;

class JadwalController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', session('user_id'))->first();

        $jadwal = collect();

        if ($siswa) {
            $jadwal = Jadwal::with(['mapel','guru'])
                ->where('kelas_id', $siswa->kelas_id)
                ->get();
        }

        return view('siswa.jadwal.index', compact('siswa','jadwal'));
    }
}