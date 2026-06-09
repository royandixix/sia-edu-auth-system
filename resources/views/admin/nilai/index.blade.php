@extends('admin.layouts.app')

@section('page-title', 'Data Nilai')
@section('page-sub', 'Master Data')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Data Nilai</h1>
            <p class="text-sm text-gray-500">Kelola nilai siswa</p>
        </div>

        <a href="{{ route('admin.nilai.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Tambah Nilai
        </a>

    </div>

    {{-- TABLE --}}
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-4 text-left">Siswa</th>
                        <th class="px-6 py-4 text-left">Mapel</th>
                        <th class="px-6 py-4 text-center">Tugas</th>
                        <th class="px-6 py-4 text-center">UTS</th>
                        <th class="px-6 py-4 text-center">UAS</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($nilai as $n)
                    <tr class="hover:bg-indigo-50/40 transition">

                        {{-- SISWA --}}
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $n->siswa->nama_siswa ?? '-' }}
                        </td>

                        {{-- MAPEL --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $n->mapel->nama_mapel ?? '-' }}
                        </td>

                        {{-- NILAI --}}
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 rounded-lg bg-gray-100 text-gray-700">
                                {{ $n->nilai_tugas }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 rounded-lg bg-yellow-50 text-yellow-700">
                                {{ $n->nilai_uts }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 rounded-lg bg-green-50 text-green-700">
                                {{ $n->nilai_uas }}
                            </span>
                        </td>

                        {{-- AKSI --}}
                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.nilai.show', $n->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs font-medium">
                                    Detail
                                </a>

                                <a href="{{ route('admin.nilai.edit', $n->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-amber-100 hover:bg-amber-200 text-amber-700 text-xs font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('admin.nilai.destroy', $n->id) }}" method="POST"
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
                        <td colspan="6" class="text-center py-10 text-gray-400">
                            Tidak ada data nilai
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div>
        {{ $nilai->links() }}
    </div>

</div>

@endsection