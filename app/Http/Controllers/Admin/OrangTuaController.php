<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrangTua;
use App\Models\Siswa;

class OrangTuaController extends Controller
{
    public function index()
    {
        $orangtua = OrangTua::with('siswa')->latest()->paginate(10);
        return view('admin.orangtua.index', compact('orangtua'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('admin.orangtua.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'siswa_id' => 'required',
        ]);

        $userId = session('user_id');

        if (!$userId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        OrangTua::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'siswa_id' => $request->siswa_id,
            'user_id' => $userId,
        ]);

        return redirect()->route('admin.orangtua.index')
            ->with('success', 'Data orang tua berhasil ditambahkan');
    }

    public function show($id)
    {
        $orangtua = OrangTua::with('siswa')->findOrFail($id);
        return view('admin.orangtua.show', compact('orangtua'));
    }

    public function edit($id)
    {
        $orangtua = OrangTua::findOrFail($id);
        $siswa = Siswa::all();

        return view('admin.orangtua.edit', compact('orangtua', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $orangtua = OrangTua::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'siswa_id' => 'required',
        ]);

        $orangtua->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'siswa_id' => $request->siswa_id,
        ]);

        return redirect()->route('admin.orangtua.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $orangtua = OrangTua::findOrFail($id);
        $orangtua->delete();

        return redirect()->route('admin.orangtua.index')
            ->with('success', 'Data berhasil dihapus');
    }
}