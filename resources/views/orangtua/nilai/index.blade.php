@extends('orangtua.layouts.app')

@section('page-title', 'Nilai Anak')
@section('page-sub', 'Data Nilai Siswa')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">
        Nilai Anak
    </h1>
    <p class="text-gray-500 mt-1">
        Daftar nilai mata pelajaran anak
    </p>
</div>

{{-- INFO SISWA --}}
<div class="bg-white border border-gray-100 rounded-2xl p-5 mb-6">
    <p class="text-sm text-gray-500">Nama Siswa</p>

    <h2 class="text-xl font-bold text-gray-900">
        {{ $siswa->nama_siswa ?? '-' }}
    </h2>
</div>

{{-- TABLE NILAI --}}
<div class="bg-white border border-gray-100 rounded-2xl p-5">

    <table class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th>Mata Pelajaran</th>
                <th>UTS</th>
                <th>Tugas</th>
                <th>UAS</th>
                <th>Rata-rata</th>
            </tr>
        </thead>

        <tbody>
            @forelse($nilai as $n)
                <tr class="border-b">
                    <td>{{ $n->mapel->nama_mapel ?? '-' }}</td>
                    <td>{{ $n->nilai_uts }}</td>
                    <td>{{ $n->nilai_tugas }}</td>
                    <td>{{ $n->nilai_uas }}</td>
                    <td class="font-bold text-indigo-600">
                        {{ round(($n->nilai_tugas + $n->nilai_uts + $n->nilai_uas) / 3, 2) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        Belum ada data nilai
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection