<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('user_id', auth()->id())->first();

        $nilai = $siswa
            ? Nilai::with('mapel')
                ->where('siswa_id', $siswa->id)
                ->get()
            : collect();

        return view('siswa.nilai.index', compact('siswa', 'nilai'));
    }
}