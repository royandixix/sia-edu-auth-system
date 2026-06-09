<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['siswa', 'mapel'])->latest()->paginate(10);
        return view('admin.nilai.index', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();
        return view('admin.nilai.create', compact('siswa', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'nilai_tugas' => 'required|integer',
            'nilai_uts' => 'required|integer',
            'nilai_uas' => 'required|integer',
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
        ]);

        return redirect()->route('admin.nilai.index')
            ->with('success', 'Data nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $nilai = Nilai::with(['siswa', 'mapel'])->findOrFail($id);
        return view('admin.nilai.show', compact('nilai'));
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();
        return view('admin.nilai.edit', compact('nilai', 'siswa', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'nilai_tugas' => 'required|integer',
            'nilai_uts' => 'required|integer',
            'nilai_uas' => 'required|integer',
        ]);

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
        ]);

        return redirect()->route('admin.nilai.index')
            ->with('success', 'Data nilai berhasil diupdate');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('admin.nilai.index')
            ->with('success', 'Data nilai berhasil dihapus');
    }
}