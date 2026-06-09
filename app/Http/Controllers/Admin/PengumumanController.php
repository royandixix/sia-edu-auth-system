<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('tanggal', 'desc')
            ->paginate(10);

        return view(
            'admin.pengumuman.index',
            compact('pengumuman')
        );
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|max:255',
            'isi'     => 'required',
            'tanggal' => 'required|date',
        ]);

        Pengumuman::create([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil ditambahkan'
            );
    }

    public function show(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view(
            'admin.pengumuman.show',
            compact('pengumuman')
        );
    }

    public function edit(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view(
            'admin.pengumuman.edit',
            compact('pengumuman')
        );
    }

    public function update(Request $request, string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul'   => 'required|max:255',
            'isi'     => 'required',
            'tanggal' => 'required|date',
        ]);

        $pengumuman->update([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil diupdate'
            );
    }

    public function destroy(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil dihapus'
            );
    }
}
