<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', auth()->id())->first();

        $jadwal = $siswa
            ? Jadwal::with(['mapel','guru'])
                ->where('kelas_id', $siswa->kelas_id)
                ->get()
            : collect();

        return view('siswa.jadwal.index', compact('siswa','jadwal'));
    }
}