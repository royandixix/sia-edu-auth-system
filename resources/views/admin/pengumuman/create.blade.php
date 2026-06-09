@extends('admin.layouts.app')

@section('page-title', 'Tambah Pengumuman')
@section('page-sub', 'Manajemen Informasi')

@section('content')

<div class="max-w-4xl mx-auto">
<div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

    <div class="px-6 py-4 border-b border-gray-100">

        <h2 class="text-lg font-semibold">
            Tambah Pengumuman
        </h2>

        <p class="text-sm text-gray-400">
            Buat pengumuman baru
        </p>

    </div>

    <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="p-6 space-y-5">

        @csrf

        <div>
            <label class="text-sm text-gray-600">Judul</label>

            <input type="text"
                   name="judul"
                   class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5"
                   placeholder="Masukkan judul pengumuman">
        </div>

        <div>
            <label class="text-sm text-gray-600">Tanggal</label>

            <input type="date"
                   name="tanggal"
                   class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
        </div>

        <div>
            <label class="text-sm text-gray-600">Isi Pengumuman</label>

            <textarea
                name="isi"
                rows="8"
                class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-3"
                placeholder="Tulis isi pengumuman..."></textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="{{ route('admin.pengumuman.index') }}"
               class="px-4 py-2 border rounded-xl text-gray-600">
                Batal
            </a>

            <button class="px-5 py-2 bg-indigo-600 text-white rounded-xl">
                Simpan Pengumuman
            </button>

        </div>

    </form>

</div>

</div>

@endsection
