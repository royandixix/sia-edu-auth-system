<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        // AMBIL DATA DARI DATABASE
        $pengumuman = Pengumuman::latest()->get();

        return view('orangtua.pengumuman.index', compact('pengumuman'));
    }
}