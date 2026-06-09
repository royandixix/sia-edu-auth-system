<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->latest()->paginate(10);
        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama_siswa' => 'required',
            'jk' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        // 🔥 AMBIL USER ID DARI SESSION
        $userId = session('user_id');

        // 🔥 JIKA TIDAK ADA, FALLBACK KE ADMIN (id=1)
        if (!$userId) {
            $userId = 1;
        }

        $insert = Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'user_id' => $userId,
        ]);

        if (!$insert) {
            return back()->with('error', 'Data gagal disimpan');
        }

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function show($id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama_siswa' => 'required',
            'jk' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}