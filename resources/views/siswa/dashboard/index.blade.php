@extends('siswa.layouts.app')

@section('page-title', 'Dashboard')
@section('page-sub', 'Siswa')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold">Dashboard Siswa</h1>
    <p class="text-gray-500">Ringkasan data akademik kamu</p>
</div>

{{-- INFO SISWA --}}
<div class="bg-white p-5 rounded-xl border mb-6">
    <p class="text-sm text-gray-500">Nama Siswa</p>
    <h2 class="text-xl font-bold">
        {{ $siswa->nama_siswa ?? '-' }}
    </h2>

    <p class="text-sm text-gray-500 mt-1">
        Kelas: {{ $siswa->kelas->nama_kelas ?? '-' }}
    </p>
</div>

{{-- CARD --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

    <div class="bg-white p-5 border rounded-xl">
        <p class="text-gray-500 text-sm">Nilai</p>
        <h3 class="text-2xl font-bold">{{ $nilai->count() }}</h3>
    </div>

    <div class="bg-white p-5 border rounded-xl">
        <p class="text-gray-500 text-sm">Absensi</p>
        <h3 class="text-2xl font-bold">{{ $absensi->count() }}</h3>
    </div>

    <div class="bg-white p-5 border rounded-xl">
        <p class="text-gray-500 text-sm">Jadwal</p>
        <h3 class="text-2xl font-bold">{{ $jadwal->count() }}</h3>
    </div>

</div>

{{-- JADWAL --}}
<div class="bg-white p-5 border rounded-xl mb-6">
    <h2 class="font-bold mb-3">Jadwal Hari Ini</h2>

    <table class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th>Hari</th>
                <th>Jam</th>
                <th>Mapel</th>
                <th>Guru</th>
            </tr>
        </thead>

        <tbody>
            @forelse($jadwal as $j)
                <tr class="border-b">
                    <td>{{ $j->hari }}</td>
                    <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                    <td>{{ $j->mapel->nama_mapel ?? '-' }}</td>
                    <td>{{ $j->guru->nama_guru ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-3 text-gray-500">
                        Tidak ada jadwal
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- PENGUMUMAN --}}
<div class="bg-white p-5 border rounded-xl">
    <h2 class="font-bold mb-3">Pengumuman</h2>

    @forelse($pengumuman as $p)
        <div class="border-b py-2">
            <div class="font-semibold">{{ $p->judul }}</div>
            <div class="text-xs text-gray-500">{{ $p->tanggal }}</div>
        </div>
    @empty
        <p class="text-gray-500">Tidak ada pengumuman</p>
    @endforelse
</div>

@endsection