@extends('orangtua.layouts.app')

@section('page-title', 'Dashboard Orang Tua')
@section('page-sub', 'Ringkasan Anak')

@section('content')

{{-- HEADER --}}
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">
        Dashboard Orang Tua
    </h1>

    <p class="text-gray-500 mt-1">
        Ringkasan perkembangan anak secara akademik
    </p>
</div>

{{-- STATS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- NILAI --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Nilai Anak</p>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $nilaiAnak ?? '-' }}
                </h2>
            </div>
        </div>
    </div>

    {{-- ABSENSI --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Absensi Anak</p>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $absensiAnak ?? '-' }}
                </h2>
            </div>
        </div>
    </div>

    {{-- JADWAL --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Jadwal Pelajaran</p>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">
                    {{ $jadwalPelajaran ?? '-' }}
                </h2>
            </div>
        </div>
    </div>

</div>

{{-- INFO SECTION --}}
<div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- INFO ANAK --}}
    <div class="lg:col-span-2 bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900 mb-5">
            Informasi Anak
        </h2>

        <div class="space-y-4 text-sm">

            <div class="flex justify-between border-b border-gray-100 pb-3">
                <span class="text-gray-500">Nama Anak</span>
                <span class="font-semibold text-gray-900">
                    {{ $namaAnak ?? '-' }}
                </span>
            </div>

            <div class="flex justify-between border-b border-gray-100 pb-3">
                <span class="text-gray-500">Kelas</span>
                <span class="font-semibold text-gray-900">
                    {{ $kelasAnak ?? '-' }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Status</span>
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                    Aktif
                </span>
            </div>

        </div>

    </div>

    {{-- QUICK INFO --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900 mb-5">
            Akses Cepat
        </h2>

        <div class="space-y-3">

            <a href="#"
               class="block p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition text-sm font-medium text-gray-700">
                Lihat Nilai Lengkap
            </a>

            <a href="#"
               class="block p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition text-sm font-medium text-gray-700">
                Lihat Absensi Detail
            </a>

            <a href="#"
               class="block p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition text-sm font-medium text-gray-700">
                Lihat Jadwal
            </a>

        </div>

    </div>

</div>

@endsection