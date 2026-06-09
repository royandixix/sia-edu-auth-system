@extends('admin.layouts.app')

@section('page-title', 'Tambah Nilai')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Tambah Nilai</h1>
            <p class="text-sm text-gray-500">Input nilai siswa</p>
        </div>

        <a href="{{ route('admin.nilai.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Nilai</h2>
        </div>

        <form action="{{ route('admin.nilai.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- SISWA --}}
                <div>
                    <label class="text-sm text-gray-600">Siswa</label>
                    <select name="siswa_id"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5">

                        <option value="">Pilih Siswa</option>
                        @foreach($siswa as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                        @endforeach

                    </select>
                </div>

                {{-- MAPEL --}}
                <div>
                    <label class="text-sm text-gray-600">Mata Pelajaran</label>
                    <select name="mapel_id"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5">

                        <option value="">Pilih Mapel</option>
                        @foreach($mapel as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                        @endforeach

                    </select>
                </div>

                {{-- TUGAS --}}
                <div>
                    <label class="text-sm text-gray-600">Nilai Tugas</label>
                    <input type="number" name="nilai_tugas"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5"
                        placeholder="0 - 100">
                </div>

                {{-- UTS --}}
                <div>
                    <label class="text-sm text-gray-600">Nilai UTS</label>
                    <input type="number" name="nilai_uts"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5"
                        placeholder="0 - 100">
                </div>

                {{-- UAS --}}
                <div class="md:col-span-2">
                    <label class="text-sm text-gray-600">Nilai UAS</label>
                    <input type="number" name="nilai_uas"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5"
                        placeholder="0 - 100">
                </div>

            </div>

            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <a href="{{ route('admin.nilai.index') }}"
                   class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow">
                    Simpan Nilai
                </button>

            </div>

        </form>

    </div>

</div>

@endsection