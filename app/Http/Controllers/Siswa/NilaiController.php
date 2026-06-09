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
        $userId = session('user_id'); // masih boleh, tapi lebih aman Auth

        $siswa = Siswa::with('kelas')
            ->where('user_id', $userId)
            ->first();

        $nilai = collect();

        if ($siswa) {
            $nilai = Nilai::with('mapel')
                ->where('siswa_id', $siswa->id)
                ->get();
        }

        return view('siswa.nilai.index', compact('siswa', 'nilai'));
    }
}