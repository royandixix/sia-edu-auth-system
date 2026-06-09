@extends('siswa.layouts.app')

@section('page-title', 'Absensi')
@section('page-sub', 'Siswa')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold">Absensi Siswa</h1>
    <p class="text-gray-500">Riwayat kehadiran kamu</p>
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

{{-- RINGKASAN --}}
@php
    $hadir = $absensi->where('keterangan', 'Hadir')->count();
    $izin  = $absensi->where('keterangan', 'Izin')->count();
    $sakit = $absensi->where('keterangan', 'Sakit')->count();
    $alpa  = $absensi->where('keterangan', 'Alpa')->count();
@endphp

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

    <div class="bg-white p-5 border rounded-xl">
        <p class="text-gray-500 text-sm">Hadir</p>
        <h3 class="text-2xl font-bold text-green-600">{{ $hadir }}</h3>
    </div>

    <div class="bg-white p-5 border rounded-xl">
        <p class="text-gray-500 text-sm">Izin</p>
        <h3 class="text-2xl font-bold text-yellow-600">{{ $izin }}</h3>
    </div>

    <div class="bg-white p-5 border rounded-xl">
        <p class="text-gray-500 text-sm">Sakit</p>
        <h3 class="text-2xl font-bold text-blue-600">{{ $sakit }}</h3>
    </div>

    <div class="bg-white p-5 border rounded-xl">
        <p class="text-gray-500 text-sm">Alpa</p>
        <h3 class="text-2xl font-bold text-red-600">{{ $alpa }}</h3>
    </div>

</div>

{{-- TABLE --}}
<div class="bg-white p-5 border rounded-xl">

    <h2 class="font-bold mb-4">Riwayat Absensi</h2>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Tanggal</th>
                    <th class="p-2 border">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                @forelse($absensi as $i => $a)
                    <tr>
                        <td class="p-2 border">{{ $i + 1 }}</td>
                        <td class="p-2 border">
                            {{ \Carbon\Carbon::parse($a->tanggal)->format('d-m-Y') }}
                        </td>

                        <td class="p-2 border">
                            @if($a->keterangan == 'Hadir')
                                <span class="text-green-600 font-semibold">Hadir</span>
                            @elseif($a->keterangan == 'Izin')
                                <span class="text-yellow-600 font-semibold">Izin</span>
                            @elseif($a->keterangan == 'Sakit')
                                <span class="text-blue-600 font-semibold">Sakit</span>
                            @else
                                <span class="text-red-600 font-semibold">Alpa</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500">
                            Belum ada data absensi
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection