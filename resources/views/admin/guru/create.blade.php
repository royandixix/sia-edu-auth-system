@extends('admin.layouts.app')

@section('page-title', 'Tambah Guru')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Tambah Data Guru</h1>
            <p class="text-sm text-gray-500">Isi data guru dengan lengkap dan benar</p>
        </div>

        <a href="{{ route('admin.guru.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium transition">
            ← Kembali
        </a>

    </div>

    {{-- CARD FORM --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Guru</h2>
            <p class="text-sm text-gray-400">Pastikan data diisi dengan benar</p>
        </div>

        <form action="{{ route('admin.guru.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- NIP --}}
                <div>
                    <label class="text-sm text-gray-600">NIP</label>
                    <input type="text" name="nip"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        placeholder="Masukkan NIP">
                </div>

                {{-- NAMA --}}
                <div>
                    <label class="text-sm text-gray-600">Nama Guru</label>
                    <input type="text" name="nama_guru"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        placeholder="Masukkan nama guru">
                </div>

                {{-- JK --}}
                <div>
                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                    <select name="jk"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        <option value="">Pilih</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                {{-- MAPEL --}}
                <div>
                    <label class="text-sm text-gray-600">Mata Pelajaran</label>
                    <input type="text" name="mapel"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        placeholder="Contoh: Matematika">
                </div>

                {{-- ALAMAT --}}
                <div class="md:col-span-2">
                    <label class="text-sm text-gray-600">Alamat</label>
                    <input type="text" name="alamat"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        placeholder="Alamat lengkap">
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <a href="{{ route('admin.guru.index') }}"
                   class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium transition">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow transition">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>

@endsection