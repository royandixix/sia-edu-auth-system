@extends('siswa.layouts.app')

@section('page-title', 'Nilai')
@section('page-sub', 'Siswa')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold">Nilai Siswa</h1>
    <p class="text-gray-500">Daftar nilai mata pelajaran kamu</p>
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

{{-- TABLE NILAI --}}
<div class="bg-white p-5 border rounded-xl">

    <h2 class="font-bold mb-4">Daftar Nilai</h2>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Mapel</th>
                    <th class="p-2 border">Tugas</th>
                    <th class="p-2 border">UTS</th>
                    <th class="p-2 border">UAS</th>
                    <th class="p-2 border">Rata-rata</th>
                    <th class="p-2 border">Grade</th>
                    <th class="p-2 border">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($nilai as $i => $n)
                    <tr>
                        <td class="p-2 border">{{ $i + 1 }}</td>
                        <td class="p-2 border">
                            {{ $n->mapel->nama_mapel ?? '-' }}
                        </td>
                        <td class="p-2 border">{{ $n->nilai_tugas }}</td>
                        <td class="p-2 border">{{ $n->nilai_uts }}</td>
                        <td class="p-2 border">{{ $n->nilai_uas }}</td>

                        <td class="p-2 border font-semibold">
                            {{ $n->rata_rata }}
                        </td>

                        <td class="p-2 border">
                            {{ $n->grade }}
                        </td>

                        <td class="p-2 border">
                            @if($n->status == 'Tuntas')
                                <span class="text-green-600 font-semibold">
                                    {{ $n->status }}
                                </span>
                            @else
                                <span class="text-red-600 font-semibold">
                                    {{ $n->status }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-gray-500">
                            Belum ada data nilai
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection