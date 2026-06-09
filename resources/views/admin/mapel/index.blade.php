@extends('admin.layouts.app')

@section('page-title', 'Mata Pelajaran')
@section('page-sub', 'Master Data')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Mata Pelajaran</h1>
            <p class="text-sm text-gray-500">Kelola data mata pelajaran</p>
        </div>

        <a href="{{ route('admin.mapel.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Tambah Mapel
        </a>

    </div>

    {{-- TABLE --}}
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-4 text-left">Nama Mapel</th>
                        <th class="px-6 py-4 text-left">Guru Pengajar</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($mapel as $m)
                    <tr class="hover:bg-indigo-50/40 transition">

                        {{-- MAPEL --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7z"/>
                                    </svg>
                                </div>

                                <div class="font-semibold text-gray-900">
                                    {{ $m->nama_mapel }}
                                </div>

                            </div>
                        </td>

                        {{-- GURU --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $m->guru->nama_guru ?? '-' }}
                        </td>

                        {{-- AKSI --}}
                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.mapel.show', $m->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs font-medium">
                                    Detail
                                </a>

                                <a href="{{ route('admin.mapel.edit', $m->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-amber-100 hover:bg-amber-200 text-amber-700 text-xs font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('admin.mapel.destroy', $m->id) }}" method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Hapus data ini?')">
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
                        <td colspan="3" class="text-center py-10 text-gray-400">
                            Tidak ada data mata pelajaran
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection