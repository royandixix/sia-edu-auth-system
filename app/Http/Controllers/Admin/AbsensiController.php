<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('siswa')
            ->latest()
            ->paginate(10);

        return view('admin.absensi.index', compact('absensi'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();

        return view('admin.absensi.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'   => 'required|exists:siswa,id',
            'tanggal'    => 'required|date',
            'keterangan' => 'required|in:Hadir,Izin,Sakit,Alpa',
        ]);

        Absensi::create([
            'siswa_id'   => $request->siswa_id,
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil ditambahkan');
    }

    public function show($id)
    {
        $absensi = Absensi::with('siswa')
            ->findOrFail($id);

        return view('admin.absensi.show', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $siswa   = Siswa::orderBy('nama_siswa')->get();

        return view('admin.absensi.edit', compact('absensi', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $request->validate([
            'siswa_id'   => 'required|exists:siswa,id',
            'tanggal'    => 'required|date',
            'keterangan' => 'required|in:Hadir,Izin,Sakit,Alpa',
        ]);

        $absensi->update([
            'siswa_id'   => $request->siswa_id,
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil diupdate');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->delete();

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil dihapus');
    }
}