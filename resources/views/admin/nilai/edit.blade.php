@extends('admin.layouts.app')

@section('page-title', 'Edit Nilai')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-xl font-bold text-gray-900">Edit Nilai</h1>
            <p class="text-sm text-gray-500">Perbarui nilai siswa</p>
        </div>

        <a href="{{ route('admin.nilai.index') }}"
           class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">
            ← Kembali
        </a>

    </div>

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Form Edit Nilai</h2>
        </div>

        <form action="{{ route('admin.nilai.update', $nilai->id) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- SISWA --}}
                <div>
                    <label class="text-sm text-gray-600">Siswa</label>
                    <select name="siswa_id" class="mt-1 w-full rounded-xl border px-4 py-2.5">

                        @foreach($siswa as $s)
                            <option value="{{ $s->id }}"
                                {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_siswa }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- MAPEL --}}
                <div>
                    <label class="text-sm text-gray-600">Mapel</label>
                    <select name="mapel_id" class="mt-1 w-full rounded-xl border px-4 py-2.5">

                        @foreach($mapel as $m)
                            <option value="{{ $m->id }}"
                                {{ $nilai->mapel_id == $m->id ? 'selected' : '' }}>
                                {{ $m->nama_mapel }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- NILAI --}}
                <div>
                    <label class="text-sm text-gray-600">Nilai Tugas</label>
                    <input type="number" name="nilai_tugas"
                        value="{{ $nilai->nilai_tugas }}"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Nilai UTS</label>
                    <input type="number" name="nilai_uts"
                        value="{{ $nilai->nilai_uts }}"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5">
                </div>

                <div class="md:col-span-2">
                    <label class="text-sm text-gray-600">Nilai UAS</label>
                    <input type="number" name="nilai_uas"
                        value="{{ $nilai->nilai_uas }}"
                        class="mt-1 w-full rounded-xl border px-4 py-2.5">
                </div>

            </div>

            <div class="flex justify-end gap-3 pt-5 border-t border-gray-100">

                <a href="{{ route('admin.nilai.index') }}"
                   class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow">
                    Update Nilai
                </button>

            </div>

        </form>

    </div>

</div>

@endsection