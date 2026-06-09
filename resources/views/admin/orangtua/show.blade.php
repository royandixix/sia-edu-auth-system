@extends('admin.layouts.app')

@section('page-title', 'Detail Orang Tua')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Detail Orang Tua</h1>
            <p class="text-sm text-gray-500">Informasi lengkap data orang tua</p>
        </div>

        <a href="{{ route('admin.orangtua.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Detail Orang Tua</h2>
        </div>

        <div class="p-6 space-y-5">

            <div>
                <p class="text-xs text-gray-400">Nama</p>
                <p class="text-lg font-semibold text-gray-900">
                    {{ $orangtua->nama }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-400">No HP</p>
                <p class="text-gray-700">
                    {{ $orangtua->no_hp }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-400">Anak (Siswa)</p>
                <p class="text-gray-700">
                    {{ $orangtua->siswa->nama_siswa ?? '-' }}
                </p>
            </div>

        </div>

    </div>

</div>

@endsection