@extends('guru.layouts.app')

@section('page-title', 'Tambah Nilai')
@section('page-sub', 'Manajemen Nilai')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-6">

            <h1 class="text-xl font-bold text-white">
                Tambah Data Nilai
            </h1>

            <p class="text-indigo-100 text-sm mt-1">
                Input nilai akademik siswa berdasarkan mata pelajaran
            </p>

        </div>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
        <div class="mx-6 mt-6 bg-red-50 border border-red-200 text-red-600 rounded-xl p-4">
            <ul class="list-disc pl-5 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- FORM --}}
        <form action="{{ route('guru.nilai.store') }}"
              method="POST"
              class="p-6 space-y-6">

            @csrf

            {{-- INFO --}}
            <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-4">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600">

                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4
                            1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8
                            1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>

                    </div>

                    <div>

                        <h3 class="font-semibold text-gray-900">
                            Input Nilai Baru
                        </h3>

                        <p class="text-sm text-gray-500">
                            Lengkapi data nilai siswa dengan benar
                        </p>

                    </div>

                </div>

            </div>

            {{-- FORM GRID --}}
            <div class="grid md:grid-cols-2 gap-5">

                {{-- SISWA --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Siswa
                    </label>

                    <select
                        name="siswa_id"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                        <option value="">
                            Pilih Siswa
                        </option>

                        @foreach($siswa as $s)
                            <option value="{{ $s->id }}"
                                {{ old('siswa_id') == $s->id ? 'selected' : '' }}>

                                {{ $s->nama_siswa }}

                            </option>
                        @endforeach

                    </select>

                    @error('siswa_id')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- MAPEL --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Mata Pelajaran
                    </label>

                    <select
                        name="mapel_id"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                        <option value="">
                            Pilih Mata Pelajaran
                        </option>

                        @foreach($mapel as $m)
                            <option value="{{ $m->id }}"
                                {{ old('mapel_id') == $m->id ? 'selected' : '' }}>

                                {{ $m->nama_mapel }}

                            </option>
                        @endforeach

                    </select>

                    @error('mapel_id')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- NILAI TUGAS --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Nilai Tugas
                    </label>

                    <input
                        type="number"
                        name="nilai_tugas"
                        min="0"
                        max="100"
                        value="{{ old('nilai_tugas') }}"
                        placeholder="0 - 100"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                    @error('nilai_tugas')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- NILAI UTS --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Nilai UTS
                    </label>

                    <input
                        type="number"
                        name="nilai_uts"
                        min="0"
                        max="100"
                        value="{{ old('nilai_uts') }}"
                        placeholder="0 - 100"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                    @error('nilai_uts')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- NILAI UAS --}}
                <div class="md:col-span-2">
                    <label class="text-sm font-medium text-gray-700">
                        Nilai UAS
                    </label>

                    <input
                        type="number"
                        name="nilai_uas"
                        min="0"
                        max="100"
                        value="{{ old('nilai_uas') }}"
                        placeholder="0 - 100"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                    @error('nilai_uas')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            {{-- INFO NILAI --}}
            <div class="grid md:grid-cols-3 gap-4">

                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4">
                    <p class="text-xs uppercase text-blue-500">
                        Tugas
                    </p>
                    <h3 class="text-xl font-bold text-blue-700">
                        0 - 100
                    </h3>
                </div>

                <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-4">
                    <p class="text-xs uppercase text-yellow-500">
                        UTS
                    </p>
                    <h3 class="text-xl font-bold text-yellow-700">
                        0 - 100
                    </h3>
                </div>

                <div class="bg-green-50 border border-green-100 rounded-2xl p-4">
                    <p class="text-xs uppercase text-green-500">
                        UAS
                    </p>
                    <h3 class="text-xl font-bold text-green-700">
                        0 - 100
                    </h3>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="pt-5 border-t border-gray-100 flex justify-end gap-3">

                <a href="{{ route('guru.nilai.index') }}"
                   class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-sm">

                    Simpan Nilai

                </button>

            </div>

        </form>

    </div>

</div>

@endsection