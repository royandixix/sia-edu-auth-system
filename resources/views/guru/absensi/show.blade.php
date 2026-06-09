@extends('guru.layouts.app')

@section('page-title', 'Detail Absensi')
@section('page-sub', 'Manajemen Absensi')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6">

        <div class="flex justify-between items-center mb-6">

            <div>

                <h2 class="text-xl font-bold text-gray-900">
                    Detail Absensi
                </h2>

                <p class="text-sm text-gray-500">
                    Informasi lengkap absensi siswa
                </p>

            </div>

            <a href="{{ route('guru.absensi.index') }}"
               class="px-4 py-2 bg-gray-100 rounded-xl hover:bg-gray-200">
                Kembali
            </a>

        </div>

        <div class="space-y-5">

            <div>
                <p class="text-xs text-gray-400">Nama Siswa</p>
                <p class="font-semibold">
                    {{ $absensi->siswa->nama_siswa }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-400">Tanggal</p>
                <p>{{ $absensi->tanggal }}</p>
            </div>

            <div>
                <p class="text-xs text-gray-400">Keterangan</p>

                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600">
                    {{ $absensi->keterangan }}
                </span>

            </div>

        </div>

    </div>

</div>

@endsection