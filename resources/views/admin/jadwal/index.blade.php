@extends('admin.layouts.app')

@section('page-title', 'Jadwal Pelajaran')
@section('page-sub', 'Master Data')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Jadwal Pelajaran</h1>
            <p class="text-sm text-gray-500">Kelola jadwal kelas</p>
        </div>

        <a href="{{ route('admin.jadwal.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Tambah Jadwal
        </a>

    </div>

    {{-- TABLE --}}
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-4 text-left">Kelas</th>
                        <th class="px-6 py-4 text-left">Mapel</th>
                        <th class="px-6 py-4 text-left">Hari</th>
                        <th class="px-6 py-4 text-left">Jam</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($jadwal as $j)
                    <tr class="hover:bg-indigo-50/40 transition">

                        {{-- KELAS --}}
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600">
                                {{ $j->kelas->nama_kelas ?? '-' }}
                            </span>
                        </td>

                        {{-- MAPEL --}}
                        <td class="px-6 py-4 text-gray-700 font-medium">
                            {{ $j->mapel->nama_mapel ?? '-' }}
                        </td>

                        {{-- HARI --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $j->hari }}
                        </td>

                        {{-- JAM --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
                        </td>

                        {{-- AKSI --}}
                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.jadwal.show', $j->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs font-medium">
                                    Detail
                                </a>

                                <a href="{{ route('admin.jadwal.edit', $j->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-amber-100 hover:bg-amber-200 text-amber-700 text-xs font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('admin.jadwal.destroy', $j->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Hapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-600 text-xs font-medium">
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>
                    @empty

                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-400">
                            Tidak ada data jadwal
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div>
        {{ $jadwal->links() }}
    </div>

</div>

@endsection