
@extends('guru.layouts.app')

@section('page-title', 'Dashboard Guru')
@section('page-sub', 'Dashboard')

@section('content')

<div class="mb-6">

    <h1 class="text-2xl font-bold text-gray-900">
        Selamat Datang, {{ session('username') }}
    </h1>

    <p class="text-gray-500 mt-1">
        Kelola absensi dan nilai siswa melalui dashboard guru.
    </p>

</div>

{{-- STATISTIK --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    {{-- TOTAL SISWA --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Total Siswa
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $totalSiswa }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                <i class="ti ti-users text-2xl text-blue-600"></i>
            </div>

        </div>

    </div>

    {{-- ABSENSI --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Absensi Hari Ini
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $absensiHariIni }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                <i class="ti ti-checkup-list text-2xl text-green-600"></i>
            </div>

        </div>

    </div>

    {{-- NILAI --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Nilai Diinput
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $nilaiDiinput }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center">
                <i class="ti ti-chart-bar text-2xl text-amber-600"></i>
            </div>

        </div>

    </div>

    {{-- MAPEL --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Mata Pelajaran
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $totalMapel }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center">
                <i class="ti ti-book text-2xl text-indigo-600"></i>
            </div>

        </div>

    </div>

</div>

{{-- INFORMASI --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">

    {{-- INFO GURU --}}
    <div class="xl:col-span-2 bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

        <div class="flex items-center gap-2 mb-5">

            <i class="ti ti-user-circle text-xl text-indigo-600"></i>

            <h2 class="text-lg font-semibold text-gray-900">
                Informasi Guru
            </h2>

        </div>

        <div class="space-y-4">

            <div class="flex justify-between border-b border-gray-100 pb-3">

                <span class="text-gray-500">
                    Nama Pengguna
                </span>

                <span class="font-semibold text-gray-900">
                    {{ session('username') }}
                </span>

            </div>

            <div class="flex justify-between border-b border-gray-100 pb-3">

                <span class="text-gray-500">
                    Role
                </span>

                <span class="font-semibold text-gray-900">
                    Guru
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-500">
                    Status
                </span>

                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                    Aktif
                </span>

            </div>

        </div>

    </div>

    {{-- AKSES CEPAT --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

        <div class="flex items-center gap-2 mb-5">

            <i class="ti ti-bolt text-xl text-amber-500"></i>

            <h2 class="text-lg font-semibold text-gray-900">
                Akses Cepat
            </h2>

        </div>

        <div class="space-y-3">

            <a href="{{ route('guru.absensi.index') }}"
               class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center">
                        <i class="ti ti-checkup-list text-green-600"></i>
                    </div>

                    <span class="font-medium text-gray-700">
                        Kelola Absensi
                    </span>

                </div>

                <i class="ti ti-chevron-right text-gray-400"></i>

            </a>

            <a href="{{ route('guru.nilai.index') }}"
               class="flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center">
                        <i class="ti ti-chart-bar text-indigo-600"></i>
                    </div>

                    <span class="font-medium text-gray-700">
                        Kelola Nilai
                    </span>

                </div>

                <i class="ti ti-chevron-right text-gray-400"></i>

            </a>

        </div>

    </div>

</div>

@endsection