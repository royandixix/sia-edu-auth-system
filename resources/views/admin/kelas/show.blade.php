@extends('admin.layouts.app')

@section('page-title', 'Detail Kelas')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Detail Kelas</h1>
            <p class="text-sm text-gray-500">Informasi lengkap data kelas</p>
        </div>

        <a href="{{ route('admin.kelas.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    {{-- CARD INFO --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Informasi Kelas</h2>
            <p class="text-sm text-gray-400">Detail data kelas & siswa</p>
        </div>

        <div class="p-6 space-y-6">

            {{-- NAMA KELAS --}}
            <div>
                <p class="text-xs text-gray-400">Nama Kelas</p>
                <p class="text-lg font-semibold text-gray-900">
                    {{ $kelas->nama_kelas }}
                </p>
            </div>

            {{-- WALI KELAS --}}
            <div>
                <p class="text-xs text-gray-400">Wali Kelas</p>
                <p class="text-gray-700">
                    {{ $kelas->wali->nama_guru ?? '-' }}
                </p>
            </div>

            {{-- JUMLAH SISWA --}}
            <div>
                <p class="text-xs text-gray-400">Jumlah Siswa</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-600">
                    {{ $kelas->siswa->count() }} siswa
                </span>
            </div>

        </div>

    </div>

    {{-- CARD SISWA LIST --}}
    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Daftar Siswa</h2>
            <p class="text-sm text-gray-400">Siswa yang terdaftar di kelas ini</p>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-4 text-left">Nama</th>
                        <th class="px-6 py-4 text-left">NIS</th>
                        <th class="px-6 py-4 text-left">Jenis Kelamin</th>
                        <th class="px-6 py-4 text-left">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($kelas->siswa as $s)
                        <tr class="hover:bg-gray-50 transition">

                            {{-- NAMA --}}
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $s->nama_siswa }}
                            </td>

                            {{-- NIS --}}
                            <td class="px-6 py-4 text-gray-600">
                                {{ $s->nis }}
                            </td>

                            {{-- JK --}}
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

                        </tr>
                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-10 text-gray-400">
                                Tidak ada siswa di kelas ini
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection