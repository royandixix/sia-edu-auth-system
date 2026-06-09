<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->paginate(10);
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:guru,nip',
            'nama_guru' => 'required',
            'jk' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
        ]);

        // 🔥 CEK LOGIN SESSION
        if (!session()->has('user_id')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $userId = session('user_id');

        // 🔥 SIMPAN DATA GURU
        Guru::create([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'mapel' => $request->mapel,
            'alamat' => $request->alamat,
            'user_id' => $userId,
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:guru,nip,' . $id,
            'nama_guru' => 'required',
            'jk' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
        ]);

        $guru->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'mapel' => $request->mapel,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}