@extends('admin.layouts.app')

@section('page-title', 'Data Absensi')
@section('page-sub', 'Master Data')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Data Absensi</h1>
            <p class="text-sm text-gray-500">
                Kelola data kehadiran siswa
            </p>
        </div>

        <a href="{{ route('admin.absensi.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>

            Tambah Absensi
        </a>

    </div>

    {{-- TABLE --}}
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase">

                    <tr>
                        <th class="px-6 py-4 text-left">Siswa</th>
                        <th class="px-6 py-4 text-left">Tanggal</th>
                        <th class="px-6 py-4 text-left">Keterangan</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($absensi ?? [] as $a)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600">

                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12a4 4 0 100-8 4 4 0 000 8zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>

                                </div>

                                <span class="font-medium">
                                    {{ $a->siswa->nama_siswa ?? '-' }}
                                </span>

                            </div>

                        </td>

                        <td class="px-6 py-4">
                            {{ $a->tanggal }}
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-3 py-1 rounded-full text-xs font-semibold

                                @if($a->keterangan=='Hadir')
                                    bg-green-50 text-green-600
                                @elseif($a->keterangan=='Izin')
                                    bg-yellow-50 text-yellow-600
                                @elseif($a->keterangan=='Sakit')
                                    bg-blue-50 text-blue-600
                                @else
                                    bg-red-50 text-red-600
                                @endif">

                                {{ $a->keterangan }}

                            </span>

                        </td>

                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.absensi.show',$a->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs">
                                    Detail
                                </a>

                                <a href="{{ route('admin.absensi.edit',$a->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs">
                                    Edit
                                </a>

                                <form action="{{ route('admin.absensi.destroy',$a->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus data?')"
                                        class="px-3 py-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-600 text-xs">

                                        Hapus

                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-400">
                            Belum ada data absensi
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection