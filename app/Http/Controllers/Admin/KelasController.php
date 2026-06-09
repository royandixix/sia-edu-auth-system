<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Guru;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('wali')->latest()->paginate(10);
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('admin.kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'nullable',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas' => $request->wali_kelas,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $kelas = Kelas::with('wali', 'siswa')->findOrFail($id);
        return view('admin.kelas.show', compact('kelas'));
    }

    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        return view('admin.kelas.edit', compact('kelas', 'guru'));
    }

    public function update(Request $request, string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'nullable',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas' => $request->wali_kelas,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}