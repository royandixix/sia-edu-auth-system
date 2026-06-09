@extends('admin.layouts.app')

@section('page-title', 'Data Siswa')
@section('page-sub', 'Master Data')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Data Siswa</h1>
            <p class="text-sm text-gray-500">Kelola data seluruh siswa</p>
        </div>

        <a href="{{ route('admin.siswa.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Tambah Siswa
        </a>

    </div>

    {{-- FILTER (TIDAK DIUBAH) --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-4 flex flex-col md:flex-row gap-3 md:items-center">

        <div class="flex-1">
            <input type="text"
                   placeholder="Cari nama siswa..."
                   class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <select class="px-4 py-2.5 rounded-xl border border-gray-200 text-sm">
            <option>Semua Kelas</option>
            <option>X IPA</option>
            <option>X IPS</option>
            <option>XI IPA</option>
        </select>

        <button class="px-4 py-2.5 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            Filter
        </button>

    </div>

    {{-- TABLE --}}
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="text-left px-6 py-4">Nama</th>
                        <th class="text-left px-6 py-4">NIS</th>
                        <th class="text-left px-6 py-4">Kelas</th>
                        <th class="text-left px-6 py-4">Jenis Kelamin</th>
                        <th class="text-left px-6 py-4">Status</th>
                        <th class="text-right px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($siswa as $s)
                    <tr class="hover:bg-gray-50 transition">

                        {{-- NAMA (FIX: nama_siswa) --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 
                                        1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 
                                        1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                </div>

                                <div>
                                    <div class="font-semibold text-gray-900">
                                        {{ $s->nama_siswa }}
                                    </div>
                                </div>

                            </div>
                        </td>

                        {{-- NIS --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $s->nis }}
                        </td>

                        {{-- KELAS (FIX: nama_kelas) --}}
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600">
                                {{ $s->kelas->nama_kelas ?? '-' }}
                            </span>
                        </td>

                        {{-- JK (FIX: jk) --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $s->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>

                        {{-- STATUS --}}
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $s->status == 'aktif'
                                    ? 'bg-green-50 text-green-600'
                                    : 'bg-red-50 text-red-600' }}">
                                {{ $s->status }}
                            </span>
                        </td>

                        {{-- AKSI --}}
                        <td class="px-6 py-4 text-right">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.siswa.show', $s->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs font-medium">
                                    Detail
                                </a>

                                <a href="{{ route('admin.siswa.edit', $s->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST"
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
                        <td colspan="5" class="text-center py-10 text-gray-400">
                            Tidak ada data siswa
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION (TIDAK DIUBAH) --}}
    <div>
        {{ $siswa->links() }}
    </div>

</div>

@endsection