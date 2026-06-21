@extends('admin.layouts.app')

@section('page-title', 'Tambah Jadwal')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Tambah Jadwal</h1>
            <p class="text-sm text-gray-500">Isi jadwal pelajaran</p>
        </div>

        <a href="{{ route('admin.jadwal.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    {{-- FORM --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Jadwal</h2>
        </div>

        <form action="{{ route('admin.jadwal.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- KELAS --}}
                <div>
                    <label class="text-sm text-gray-600">Kelas</label>
                    <select name="kelas_id"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">

                        <option value="">Pilih Kelas</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                        @endforeach

                    </select>
                </div>

                {{-- MAPEL --}}
                <div>
                    <label class="text-sm text-gray-600">Mata Pelajaran</label>
                    <select name="mapel_id"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">

                        <option value="">Pilih Mapel</option>
                        @foreach($mapel as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                        @endforeach

                    </select>
                </div>

                {{-- HARI --}}
                <div>
                    <label class="text-sm text-gray-600">Hari</label>
                    <select name="hari"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">

                        <option value="">Pilih Hari</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>

                    </select>
                </div>

                {{-- JAM MULAI --}}
                <div>
                    <label class="text-sm text-gray-600">Jam Mulai</label>
                    <input type="time" name="jam_mulai"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
                </div>

                {{-- JAM SELESAI --}}
                <div class="md:col-span-2">
                    <label class="text-sm text-gray-600">Jam Selesai</label>
                    <input type="time" name="jam_selesai"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <a href="{{ route('admin.jadwal.index') }}"
                   class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow">
                    Simpan Jadwal
                </button>

            </div>

        </form>

    </div>

</div>

@endsection