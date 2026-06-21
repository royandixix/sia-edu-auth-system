<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['kelas', 'user'])
            ->latest()
            ->paginate(10);

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
            'nama_siswa' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'required',
            'status' => 'required|in:aktif,nonaktif',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // 🔥 CREATE USER (FIX: wajib isi name)
        $user = User::create([
            'name' => $request->nama_siswa,
            'username' => $request->nis,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'status_login' => true,
        ]);

        // CREATE SISWA
        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'user_id' => $user->id,
        ]);

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Siswa + akun login berhasil dibuat');
    }

    public function show(string $id)
    {
        $siswa = Siswa::with(['kelas', 'user'])->findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    public function edit(string $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);
        $kelas = Kelas::all();

        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $siswa->id,
            'nama_siswa' => 'required|string|max:255',
            'jk' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'required',
            'status' => 'required|in:aktif,nonaktif',
            'email' => 'required|email|unique:users,email,' . ($siswa->user->id ?? 'NULL'),
            'password' => 'nullable|min:6',
        ]);

        // UPDATE SISWA
        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        // UPDATE USER
        if ($siswa->user) {
            $siswa->user->update([
                'name' => $request->nama_siswa,
                'email' => $request->email,
                'password' => $request->password
                    ? Hash::make($request->password)
                    : $siswa->user->password,
            ]);
        }

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa + akun login berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        // hapus user juga (biar tidak orphan)
        if ($siswa->user) {
            $siswa->user->delete();
        }

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}