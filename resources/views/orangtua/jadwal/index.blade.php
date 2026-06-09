@extends('orangtua.layouts.app')

@section('page-title', 'Jadwal Pelajaran')
@section('page-sub', 'Jadwal Kelas Anak')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">
        Jadwal Pelajaran Anak
    </h1>
    <p class="text-gray-500 mt-1">
        Informasi jadwal berdasarkan kelas siswa
    </p>
</div>

{{-- INFO SISWA --}}
<div class="bg-white border border-gray-100 rounded-2xl p-5 mb-6">
    <p class="text-sm text-gray-500">Nama Siswa</p>
    <h2 class="text-xl font-bold text-gray-900">
        {{ $siswa->nama_siswa ?? '-' }}
    </h2>

    <p class="text-sm text-gray-500 mt-1">
        Kelas: {{ $siswa->kelas->nama_kelas ?? '-' }}
    </p>
</div>

{{-- TABLE JADWAL --}}
<div class="bg-white border border-gray-100 rounded-2xl p-5">

    <table class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th class="py-2">Hari</th>
                <th>Jam</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
            </tr>
        </thead>

        <tbody>
            @forelse($jadwal as $j)
                <tr class="border-b">
                    <td class="py-2">{{ $j->hari ?? '-' }}</td>
                    <td>{{ $j->jam_mulai ?? '-' }} - {{ $j->jam_selesai ?? '-' }}</td>
                    <td>{{ $j->mapel->nama_mapel ?? '-' }}</td>
                    <td>{{ $j->guru->nama_guru ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">
                        Belum ada jadwal pelajaran
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection