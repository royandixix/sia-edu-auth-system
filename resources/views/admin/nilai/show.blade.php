@extends('admin.layouts.app')

@section('page-title', 'Detail Nilai')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Detail Nilai</h1>
            <p class="text-sm text-gray-500">Informasi nilai siswa</p>
        </div>

        <a href="{{ route('admin.nilai.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 space-y-4">

        <div>
            <p class="text-xs text-gray-400">Siswa</p>
            <p class="font-semibold text-gray-900">
                {{ $nilai->siswa->nama_siswa ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-400">Mapel</p>
            <p class="text-gray-700">
                {{ $nilai->mapel->nama_mapel ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-400">Nilai Tugas</p>
            <p class="text-gray-700">{{ $nilai->nilai_tugas }}</p>
        </div>

        <div>
            <p class="text-xs text-gray-400">Nilai UTS</p>
            <p class="text-gray-700">{{ $nilai->nilai_uts }}</p>
        </div>

        <div>
            <p class="text-xs text-gray-400">Nilai UAS</p>
            <p class="text-gray-700">{{ $nilai->nilai_uas }}</p>
        </div>

    </div>

</div>

@endsection