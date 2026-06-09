@extends('admin.layouts.app')

@section('page-title', 'Detail Jadwal')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Detail Jadwal</h1>
            <p class="text-sm text-gray-500">Informasi jadwal pelajaran</p>
        </div>

        <a href="{{ route('admin.jadwal.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 space-y-4">

        <div>
            <p class="text-xs text-gray-400">Kelas</p>
            <p class="font-semibold text-gray-900">
                {{ $jadwal->kelas->nama_kelas ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-400">Mata Pelajaran</p>
            <p class="text-gray-700">
                {{ $jadwal->mapel->nama_mapel ?? '-' }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-400">Hari</p>
            <p class="text-gray-700">{{ $jadwal->hari }}</p>
        </div>

        <div>
            <p class="text-xs text-gray-400">Jam</p>
            <p class="text-gray-700">
                {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
            </p>
        </div>

    </div>

</div>

@endsection