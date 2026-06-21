<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user')->latest()->paginate(10);
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
        'alamat' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    // ✔ CREATE USER (WAJIB ADA "name")
    $user = User::create([
        'name' => $request->nama_guru, // 🔥 INI WAJIB (FIX ERROR KAMU)
        'username' => $request->nip,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'guru',
        'status_login' => true,
    ]);

    // ✔ CREATE GURU
    Guru::create([
        'nip' => $request->nip,
        'nama_guru' => $request->nama_guru,
        'jk' => $request->jk,
        'alamat' => $request->alamat,
        'user_id' => $user->id,
    ]);

    return redirect()->route('admin.guru.index')
        ->with('success', 'Guru + akun login berhasil dibuat');
}

    public function show($id)
    {
        $guru = Guru::with('user')->findOrFail($id);
        return view('admin.guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::with('user')->findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::with('user')->findOrFail($id);

        $request->validate([
            'nip' => 'required|unique:guru,nip,' . $id,
            'nama_guru' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email,' . $guru->user_id,
        ]);

        $guru->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);

        if ($guru->user) {
            $guru->user->update([
                'email' => $request->email,
            ]);

            if ($request->password) {
                $guru->user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
        }

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::with('user')->findOrFail($id);

        if ($guru->user) {
            $guru->user->delete();
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}