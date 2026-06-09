<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataPelajaran;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['kelas', 'mapel'])->latest()->paginate(10);
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $mapel = MataPelajaran::all();
        return view('admin.jadwal.create', compact('kelas', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Jadwal::create([
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Data jadwal berhasil ditambahkan');
    }

    public function show($id)
    {
        $jadwal = Jadwal::with(['kelas', 'mapel'])->findOrFail($id);
        return view('admin.jadwal.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::all();
        $mapel = MataPelajaran::all();
        return view('admin.jadwal.edit', compact('jadwal', 'kelas', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->update([
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Data jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Data jadwal berhasil dihapus');
    }
}