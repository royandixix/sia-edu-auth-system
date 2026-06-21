@extends('admin.layouts.app')

@section('page-title', 'Tambah Guru')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">
                Tambah Data Guru + Akun Login
            </h1>
            <p class="text-sm text-gray-500">
                Guru akan otomatis memiliki akun sistem
            </p>
        </div>

        <a href="{{ route('admin.guru.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium transition">
            ← Kembali
        </a>

    </div>

    {{-- FORM --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Guru</h2>
        </div>

        <form action="{{ route('admin.guru.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- NIP --}}
                <div>
                    <label class="text-sm text-gray-600">NIP</label>
                    <input type="text" name="nip"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                {{-- NAMA --}}
                <div>
                    <label class="text-sm text-gray-600">Nama Guru</label>
                    <input type="text" name="nama_guru"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                {{-- JK --}}
                <div>
                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                    <select name="jk"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                {{-- ALAMAT --}}
                <div>
                    <label class="text-sm text-gray-600">Alamat</label>
                    <input type="text" name="alamat"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                {{-- EMAIL LOGIN --}}
                <div>
                    <label class="text-sm text-gray-600">Email Login</label>
                    <input type="email" name="email"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="text-sm text-gray-600">Password Default</label>
                    <input type="text" name="password"
                        value="12345678"
                        class="mt-1 w-full rounded-xl border border-gray-300 px-4 py-3">
                    <small class="text-gray-500">Default password: 12345678</small>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl">
                    Simpan Guru + Akun
                </button>

            </div>

        </form>

    </div>

</div>

@endsection