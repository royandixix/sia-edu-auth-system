@extends('guru.layouts.app')

@section('page-title', 'Detail Nilai')
@section('page-sub', 'Manajemen Nilai')

@section('content')

@php
$rata = round(
(
$nilai->nilai_tugas +
$nilai->nilai_uts +
$nilai->nilai_uas
) / 3,
2
);
@endphp

<div class="max-w-4xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-6 py-8">

            <div class="flex items-center gap-4">

                <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-white">

                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4
                        1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8
                        1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>

                </div>

                <div>

                    <h2 class="text-2xl font-bold text-white">
                        {{ $nilai->siswa->nama_siswa ?? '-' }}
                    </h2>

                    <p class="text-indigo-100">
                        {{ $nilai->mapel->nama_mapel ?? '-' }}
                    </p>

                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="p-6">

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Nama --}}
                <div>
                    <p class="text-xs text-gray-400 mb-1">
                        Nama Siswa
                    </p>

                    <p class="font-semibold text-gray-900">
                        {{ $nilai->siswa->nama_siswa ?? '-' }}
                    </p>
                </div>

                {{-- Mapel --}}
                <div>
                    <p class="text-xs text-gray-400 mb-1">
                        Mata Pelajaran
                    </p>

                    <p class="font-semibold text-gray-900">
                        {{ $nilai->mapel->nama_mapel ?? '-' }}
                    </p>
                </div>

            </div>

            {{-- CARD NILAI --}}
            <div class="grid md:grid-cols-4 gap-4 mt-8">

                <div class="border rounded-2xl p-4 bg-blue-50 border-blue-100">
                    <p class="text-xs text-blue-500 mb-1">
                        Nilai Tugas
                    </p>

                    <h3 class="text-2xl font-bold text-blue-700">
                        {{ $nilai->nilai_tugas }}
                    </h3>
                </div>

                <div class="border rounded-2xl p-4 bg-yellow-50 border-yellow-100">
                    <p class="text-xs text-yellow-500 mb-1">
                        Nilai UTS
                    </p>

                    <h3 class="text-2xl font-bold text-yellow-700">
                        {{ $nilai->nilai_uts }}
                    </h3>
                </div>

                <div class="border rounded-2xl p-4 bg-purple-50 border-purple-100">
                    <p class="text-xs text-purple-500 mb-1">
                        Nilai UAS
                    </p>

                    <h3 class="text-2xl font-bold text-purple-700">
                        {{ $nilai->nilai_uas }}
                    </h3>
                </div>

                <div class="border rounded-2xl p-4 bg-green-50 border-green-100">
                    <p class="text-xs text-green-500 mb-1">
                        Rata-rata
                    </p>

                    <h3 class="text-2xl font-bold text-green-700">
                        {{ $rata }}
                    </h3>
                </div>

            </div>

            {{-- STATUS NILAI --}}
            <div class="mt-8">

                <p class="text-xs text-gray-400 mb-2">
                    Predikat
                </p>

                @if($rata >= 90)

                    <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                        Sangat Baik
                    </span>

                @elseif($rata >= 80)

                    <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                        Baik
                    </span>

                @elseif($rata >= 70)

                    <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                        Cukup
                    </span>

                @else

                    <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-semibold">
                        Perlu Perbaikan
                    </span>

                @endif

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-6 mt-6 border-t border-gray-100">

                <a href="{{ route('guru.nilai.index') }}"
                   class="px-4 py-2 rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600">
                    Kembali
                </a>

                <a href="{{ route('guru.nilai.edit', $nilai->id) }}"
                   class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white">
                    Edit Nilai
                </a>

            </div>

        </div>

    </div>

</div>

@endsection