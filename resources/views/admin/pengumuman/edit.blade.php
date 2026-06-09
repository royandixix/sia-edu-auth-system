@extends('admin.layouts.app')

@section('page-title', 'Edit Pengumuman')
@section('page-sub', 'Manajemen Informasi')

@section('content')

<div class="max-w-4xl mx-auto">
<div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

    <div class="px-6 py-4 border-b border-gray-100">

        <h2 class="text-lg font-semibold">
            Edit Pengumuman
        </h2>

        <p class="text-sm text-gray-400">
            Perbarui data pengumuman
        </p>

    </div>

    <form action="{{ route('admin.pengumuman.update',$pengumuman->id) }}" method="POST" class="p-6 space-y-5">

        @csrf
        @method('PUT')

        <div>
            <label class="text-sm text-gray-600">Judul</label>

            <input type="text"
                   name="judul"
                   value="{{ $pengumuman->judul }}"
                   class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
        </div>

        <div>
            <label class="text-sm text-gray-600">Tanggal</label>

            <input type="date"
                   name="tanggal"
                   value="{{ $pengumuman->tanggal }}"
                   class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
        </div>

        <div>
            <label class="text-sm text-gray-600">Isi Pengumuman</label>

            <textarea
                name="isi"
                rows="8"
                class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-3">{{ $pengumuman->isi }}</textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="{{ route('admin.pengumuman.index') }}"
               class="px-4 py-2 border rounded-xl text-gray-600">
                Batal
            </a>

            <button class="px-5 py-2 bg-indigo-600 text-white rounded-xl">
                Update Pengumuman
            </button>

        </div>

    </form>

</div>

</div>

@endsection
