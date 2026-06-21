<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    private function guruId()
    {
        return auth()->user()->guru->id ?? null;
    }

    private function checkGuru()
    {
        if (!$this->guruId()) {
            abort(403, 'Guru belum terhubung dengan akun login');
        }
    }

    public function index()
    {
        $this->checkGuru();

        $nilai = Nilai::with(['siswa','mapel'])
            ->where('guru_id', $this->guruId())
            ->latest()
            ->paginate(10);

        return view('guru.nilai.index', compact('nilai'));
    }

    public function create()
    {
        $this->checkGuru();

        $guruId = $this->guruId();

        // 🔥 FIX UTAMA: mapel hanya milik guru login
        $mapel = MataPelajaran::where('guru_id', $guruId)
            ->orderBy('nama_mapel', 'asc')
            ->get();

        // siswa aktif saja (lebih aman)
        $siswa = Siswa::where('status', 'aktif')
            ->orderBy('nama_siswa', 'asc')
            ->get();

        return view('guru.nilai.create', compact('siswa','mapel'));
    }

    public function store(Request $request)
    {
        $this->checkGuru();

        $guruId = $this->guruId();

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mata_pelajaran,id',
            'nilai_tugas' => 'required|integer|min:0|max:100',
            'nilai_uts' => 'required|integer|min:0|max:100',
            'nilai_uas' => 'required|integer|min:0|max:100'
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $guruId,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas
        ]);

        return redirect()->route('guru.nilai.index')
            ->with('success','Nilai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->checkGuru();

        $guruId = $this->guruId();

        $nilai = Nilai::where('guru_id', $guruId)
            ->findOrFail($id);

        $mapel = MataPelajaran::where('guru_id', $guruId)
            ->orderBy('nama_mapel', 'asc')
            ->get();

        $siswa = Siswa::where('status','aktif')
            ->orderBy('nama_siswa','asc')
            ->get();

        return view('guru.nilai.edit', compact('nilai','mapel','siswa'));
    }

    public function update(Request $request, $id)
    {
        $this->checkGuru();

        $guruId = $this->guruId();

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mata_pelajaran,id',
            'nilai_tugas' => 'required|integer|min:0|max:100',
            'nilai_uts' => 'required|integer|min:0|max:100',
            'nilai_uas' => 'required|integer|min:0|max:100'
        ]);

        $nilai = Nilai::where('guru_id', $guruId)
            ->findOrFail($id);

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $guruId,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas
        ]);

        return redirect()->route('guru.nilai.index')
            ->with('success','Nilai berhasil diupdate');
    }

    public function destroy($id)
    {
        $this->checkGuru();

        $nilai = Nilai::where('guru_id', $this->guruId())
            ->findOrFail($id);

        $nilai->delete();

        return redirect()->route('guru.nilai.index')
            ->with('success','Nilai berhasil dihapus');
    }
}