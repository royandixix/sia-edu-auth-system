@extends('orangtua.layouts.app')

@section('page-title', 'Absensi Anak')
@section('page-sub', 'Data Kehadiran Siswa')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">
        Absensi Anak
    </h1>
    <p class="text-gray-500 mt-1">
        Riwayat kehadiran siswa
    </p>
</div>

{{-- INFO SISWA --}}
<div class="bg-white border border-gray-100 rounded-2xl p-5 mb-6">
    <p class="text-sm text-gray-500">Nama Siswa</p>
    <h2 class="text-xl font-bold text-gray-900">
        {{ $siswa->nama_siswa ?? '-' }}
    </h2>

    <p class="text-sm text-gray-500 mt-1">
        Orang Tua: {{ $orangTua->nama ?? '-' }}
    </p>
</div>

{{-- TABLE ABSENSI --}}
<div class="bg-white border border-gray-100 rounded-2xl p-5">

    <table class="w-full text-sm">
        <thead>
            <tr class="text-left border-b">
                <th class="py-2">Tanggal</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($absensi as $a)
                <tr class="border-b">
                    <td class="py-2">
                        {{ \Carbon\Carbon::parse($a->tanggal)->format('d M Y') }}
                    </td>

                    <td>
                        {{ $a->keterangan ?? '-' }}
                    </td>

                    <td>
                        @if($a->status == 'hadir')
                            <span class="text-green-600 font-semibold">Hadir</span>
                        @elseif($a->status == 'izin')
                            <span class="text-yellow-600 font-semibold">Izin</span>
                        @elseif($a->status == 'sakit')
                            <span class="text-blue-600 font-semibold">Sakit</span>
                        @else
                            <span class="text-red-600 font-semibold">Alpha</span>
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

@endsection