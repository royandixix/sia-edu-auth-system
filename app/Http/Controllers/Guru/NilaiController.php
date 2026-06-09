<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * List Data Nilai
     */
    public function index()
    {
        $nilai = Nilai::with([
            'siswa',
            'mapel'
        ])
        ->latest()
        ->paginate(10);

        return view(
            'guru.nilai.index',
            compact('nilai')
        );
    }

    /**
     * Form Tambah Nilai
     */
    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa', 'asc')->get();

        $mapel = MataPelajaran::orderBy('nama_mapel', 'asc')->get();

        return view(
            'guru.nilai.create',
            compact('siswa', 'mapel')
        );
    }

    /**
     * Simpan Nilai
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'      => 'required|exists:siswa,id',
            'mapel_id'      => 'required|exists:mata_pelajaran,id',
            'nilai_tugas'   => 'required|integer|min:0|max:100',
            'nilai_uts'     => 'required|integer|min:0|max:100',
            'nilai_uas'     => 'required|integer|min:0|max:100',
        ]);

        Nilai::create([
            'siswa_id'      => $request->siswa_id,
            'mapel_id'      => $request->mapel_id,
            'nilai_tugas'   => $request->nilai_tugas,
            'nilai_uts'     => $request->nilai_uts,
            'nilai_uas'     => $request->nilai_uas,
        ]);

        return redirect()
            ->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    /**
     * Detail Nilai
     */
    public function show(string $id)
    {
        $nilai = Nilai::with([
            'siswa',
            'mapel'
        ])->findOrFail($id);

        return view(
            'guru.nilai.show',
            compact('nilai')
        );
    }

    /**
     * Form Edit Nilai
     */
    public function edit(string $id)
    {
        $nilai = Nilai::findOrFail($id);

        $siswa = Siswa::orderBy('nama_siswa')->get();

        $mapel = MataPelajaran::orderBy('nama_mapel')->get();

        return view(
            'guru.nilai.edit',
            compact(
                'nilai',
                'siswa',
                'mapel'
            )
        );
    }

    /**
     * Update Nilai
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'siswa_id'      => 'required|exists:siswa,id',
            'mapel_id'      => 'required|exists:mata_pelajaran,id',
            'nilai_tugas'   => 'required|integer|min:0|max:100',
            'nilai_uts'     => 'required|integer|min:0|max:100',
            'nilai_uas'     => 'required|integer|min:0|max:100',
        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->update([
            'siswa_id'      => $request->siswa_id,
            'mapel_id'      => $request->mapel_id,
            'nilai_tugas'   => $request->nilai_tugas,
            'nilai_uts'     => $request->nilai_uts,
            'nilai_uas'     => $request->nilai_uas,
        ]);

        return redirect()
            ->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil diperbarui');
    }

    /**
     * Hapus Nilai
     */
    public function destroy(string $id)
    {
        $nilai = Nilai::findOrFail($id);

        $nilai->delete();

        return redirect()
            ->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil dihapus');
    }
}