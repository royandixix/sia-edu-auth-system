@extends('admin.layouts.app')

@section('page-title', 'Edit Guru')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Edit Data Guru</h1>
            <p class="text-sm text-gray-500">Perbarui data guru dengan benar</p>
        </div>

        <a href="{{ route('admin.guru.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium transition">
            ← Kembali
        </a>

    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Edit Guru</h2>
        </div>

        <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="text-sm text-gray-600">NIP</label>
                    <input type="text" name="nip"
                        value="{{ $guru->nip }}"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Nama Guru</label>
                    <input type="text" name="nama_guru"
                        value="{{ $guru->nama_guru }}"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                    <select name="jk"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>

                        <option value="L" {{ $guru->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $guru->jk == 'P' ? 'selected' : '' }}>Perempuan</option>

                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Alamat</label>
                    <input type="text" name="alamat"
                        value="{{ $guru->alamat }}"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Email Login</label>
                    <input type="email" name="email"
                        value="{{ $guru->user->email ?? '' }}"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Password Baru (opsional)</label>
                    <input type="text" name="password"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3"
                        placeholder="Kosongkan jika tidak ingin ubah password">
                </div>

            </div>

            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <a href="{{ route('admin.guru.index') }}"
                   class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium transition">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl">
                    Update Guru
                </button>

            </div>

        </form>

    </div>

</div>

@endsection