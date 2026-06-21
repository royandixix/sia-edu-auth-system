@extends('admin.layouts.app')

@section('page-title', 'Data Guru')
@section('page-sub', 'Master Data')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Data Guru</h1>
            <p class="text-sm text-gray-500">Kelola data seluruh guru</p>
        </div>

        <a href="{{ route('admin.guru.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Tambah Guru
        </a>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="text-left px-6 py-4">Nama</th>
                        <th class="text-left px-6 py-4">NIP</th>
                        {{-- <th class="text-left px-6 py-4">Mapel</th> --}}
                        <th class="text-left px-6 py-4">Jenis Kelamin</th>
                        <th class="text-right px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($guru as $g)
                    <tr class="hover:bg-indigo-50/40 transition">

                        {{-- NAMA + AVATAR --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 
                                        1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 
                                        1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                </div>

                                <div class="font-semibold text-gray-900">
                                    {{ $g->nama_guru }}
                                </div>

                            </div>
                        </td>

                        {{-- NIP --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $g->nip }}
                        </td>

                        {{-- MAPEL --}}
                        {{-- <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600">
                                {{ $g->mapel }}
                            </span>
                        </td> --}}

                        {{-- JK --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $g->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>

                        {{-- AKSI --}}
                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.guru.show', $g->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs font-medium transition">
                                    Detail
                                </a>

                                <a href="{{ route('admin.guru.edit', $g->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-amber-100 hover:bg-amber-200 text-amber-700 text-xs font-medium transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-600 text-xs font-medium transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>
                    @empty

                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-400">
                            Tidak ada data guru
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection