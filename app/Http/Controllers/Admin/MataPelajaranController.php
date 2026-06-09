<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\Guru;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::with('guru')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.mapel.index', compact('mapel'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('admin.mapel.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required',
            'guru_id' => 'required',
        ]);

        MataPelajaran::create([
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('admin.mapel.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $mapel = MataPelajaran::with('guru')->findOrFail($id);
        return view('admin.mapel.show', compact('mapel'));
    }

    public function edit(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $guru = Guru::all();

        return view('admin.mapel.edit', compact('mapel', 'guru'));
    }

    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'nama_mapel' => 'required',
            'guru_id' => 'required',
        ]);

        $mapel->update([
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('admin.mapel.index')
            ->with('success', 'Data mata pelajaran berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()->route('admin.mapel.index')
            ->with('success', 'Data mata pelajaran berhasil dihapus');
    }
}