<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Siswa;

class AbsensiController extends Controller
{
    public function __construct()
    {
        // 🔒 hanya guru yang bisa akses
        $this->middleware('role:guru');
    }

    public function index()
    {
        // kalau nanti mau filter per guru bisa dikembangkan
        $absensi = Absensi::with('siswa')
            ->latest()
            ->paginate(10);

        return view('guru.absensi.index', compact('absensi'));
    }

    public function create()
    {
        // 🔥 AMBIL SISWA SAJA (lebih aman pakai filter kelas nanti)
        $siswa = Siswa::orderBy('nama_siswa')->get();

        return view('guru.absensi.create', compact('siswa'));
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
            ->route('guru.absensi.index')
            ->with('success', 'Data absensi berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $absensi = Absensi::with('siswa')
            ->findOrFail($id);

        return view('guru.absensi.show', compact('absensi'));
    }

    public function edit(string $id)
    {
        $absensi = Absensi::findOrFail($id);

        $siswa = Siswa::orderBy('nama_siswa')->get();

        return view('guru.absensi.edit', compact('absensi', 'siswa'));
    }

    public function update(Request $request, string $id)
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
            ->route('guru.absensi.index')
            ->with('success', 'Data absensi berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->delete();

        return redirect()
            ->route('guru.absensi.index')
            ->with('success', 'Data absensi berhasil dihapus');
    }
}