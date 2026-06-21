@extends('admin.layouts.app')

@section('page-title', 'Edit Kelas')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Edit Kelas</h1>
            <p class="text-sm text-gray-500">Perbarui data kelas</p>
        </div>

        <a href="{{ route('admin.kelas.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    {{-- FORM --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Edit Kelas</h2>
            <p class="text-sm text-gray-400">Update data kelas</p>
        </div>

        <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- NAMA KELAS --}}
                <div>
                    <label class="text-sm text-gray-600">Nama Kelas</label>
                    <input type="text" name="nama_kelas"
                        value="{{ $kelas->nama_kelas }}"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                </div>

                {{-- WALI KELAS --}}
                <div>
                    <label class="text-sm text-gray-600">Wali Kelas</label>
                    <select name="wali_kelas"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">

                        <option value="">Pilih Wali Kelas</option>

                        @foreach($guru as $g)
                            <option value="{{ $g->id }}"
                                {{ $kelas->wali_kelas == $g->id ? 'selected' : '' }}>
                                {{ $g->nama_guru }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <a href="{{ route('admin.kelas.index') }}"
                   class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow">
                    Update Data
                </button>

            </div>

        </form>

    </div>

</div>

@endsection