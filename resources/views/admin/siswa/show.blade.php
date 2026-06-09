@extends('admin.layouts.app')

@section('page-title', 'Detail Siswa')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Siswa</h1>
            <p class="text-sm text-gray-500">Informasi lengkap data siswa</p>
        </div>

        <a href="{{ route('admin.siswa.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium transition">
            ← Kembali
        </a>

    </div>

    {{-- PROFILE CARD --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

        {{-- HEADER PROFILE --}}
        <div class="flex items-center gap-4 mb-6">

            <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 
                    1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 
                    1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>

            <div>
                <h2 class="text-lg font-bold text-gray-900">
                    {{ $siswa->nama_siswa }}
                </h2>
                <p class="text-sm text-gray-500">
                    NIS: {{ $siswa->nis }}
                </p>
            </div>

        </div>

        {{-- GRID DETAIL --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            {{-- JK --}}
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-400">Jenis Kelamin</p>
                <p class="font-medium text-gray-800">
                    {{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </p>
            </div>

            {{-- KELAS --}}
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-400">Kelas</p>
                <p class="font-medium text-gray-800">
                    {{ $siswa->kelas->nama_kelas ?? '-' }}
                </p>
            </div>

            {{-- ALAMAT (FULL WIDTH) --}}
            <div class="md:col-span-2 bg-gray-50 rounded-xl p-4">
                <p class="text-xs text-gray-400">Alamat</p>
                <p class="font-medium text-gray-800 leading-relaxed">
                    {{ $siswa->alamat }}
                </p>
            </div>

            {{-- STATUS --}}
            <div class="md:col-span-2 bg-gray-50 rounded-xl p-4 flex items-center justify-between">

                <p class="text-xs text-gray-400">Status</p>

                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    {{ $siswa->status == 'aktif'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-red-100 text-red-700' }}">
                    {{ ucfirst($siswa->status) }}
                </span>

            </div>

        </div>

    </div>

</div>

@endsection