@extends('admin.layouts.app')

@section('page-title', 'Tambah Mata Pelajaran')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Tambah Mapel</h1>
            <p class="text-sm text-gray-500">Isi data mata pelajaran</p>
        </div>

        <a href="{{ route('admin.mapel.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    {{-- CARD --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Mapel</h2>
        </div>

        <form action="{{ route('admin.mapel.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- NAMA MAPEL --}}
                <div>
                    <label class="text-sm text-gray-600">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="Contoh: Matematika">
                </div>

                {{-- GURU --}}
                <div>
                    <label class="text-sm text-gray-600">Guru Pengajar</label>
                    <select name="guru_id"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">

                        <option value="">Pilih Guru</option>

                        @foreach($guru as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                        @endforeach

                    </select>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <a href="{{ route('admin.mapel.index') }}"
                   class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>

@endsection