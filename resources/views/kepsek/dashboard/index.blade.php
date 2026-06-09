@extends('kepsek.layouts.app')

@section('page-title', 'Dashboard Kepsek')
@section('page-sub', 'Dashboard')

@section('content')

{{-- HEADER --}}
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">
        Selamat Datang, {{ auth()->user()->username ?? 'Kepala Sekolah' }}
    </h1>

    <p class="text-gray-500 mt-1">
        Dashboard monitoring seluruh aktivitas akademik sekolah.
    </p>
</div>

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-3xl font-bold text-gray-900 mt-2">
            {{ $totalSiswa }}
        </h2>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total Guru</p>
        <h2 class="text-3xl font-bold text-gray-900 mt-2">
            {{ $totalGuru }}
        </h2>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total Kelas</p>
        <h2 class="text-3xl font-bold text-gray-900 mt-2">
            {{ $totalKelas }}
        </h2>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Rata-rata Nilai</p>
        <h2 class="text-3xl font-bold text-indigo-600 mt-2">
            {{ $rataNilai ?? 0 }}
        </h2>
    </div>

</div>

{{-- INFO + QUICK ACCESS --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">

    {{-- INFO SEKOLAH --}}
    <div class="xl:col-span-2 bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

        <div class="flex items-center justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-900">
                Informasi Sekolah
            </h2>
        </div>

        <div class="space-y-4">

            <div class="flex justify-between border-b border-gray-100 pb-3">
                <span class="text-gray-500">Tahun Ajaran</span>
                <span class="font-semibold text-gray-900">
                    2025/2026
                </span>
            </div>

            <div class="flex justify-between border-b border-gray-100 pb-3">
                <span class="text-gray-500">Mode</span>
                <span class="font-semibold text-gray-900">
                    Monitoring Akademik
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Status Sistem</span>
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                    Aktif
                </span>
            </div>

        </div>

    </div>

    {{-- QUICK ACCESS --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900 mb-5">
            Akses Cepat
        </h2>

        <div class="space-y-3">

            <a href="{{ route('kepsek.laporan.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition">

                <span class="font-medium text-gray-700">Lihat Laporan Akademik</span>
            </a>

            <a href="{{ route('kepsek.laporan.cetak') }}"
               class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition">

                <span class="font-medium text-gray-700">Cetak Laporan</span>
            </a>

        </div>

    </div>

</div>

@endsection