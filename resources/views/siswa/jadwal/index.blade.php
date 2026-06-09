@extends('siswa.layouts.app')

@section('page-title', 'Jadwal')
@section('page-sub', 'Siswa')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold">Jadwal Pelajaran</h1>
    <p class="text-gray-500">Jadwal berdasarkan kelas kamu</p>
</div>

<div class="bg-white border rounded-xl p-5">

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b text-left">
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
                    <td colspan="4" class="text-center py-4 text-gray-500">
                        Tidak ada jadwal
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection