@extends('guru.layouts.app')

@section('page-title', 'Edit Nilai')
@section('page-sub', 'Manajemen Nilai')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-6">

            <h1 class="text-xl font-bold text-white">
                Edit Nilai Siswa
            </h1>

            <p class="text-indigo-100 text-sm mt-1">
                Perbarui data nilai akademik siswa
            </p>

        </div>

        {{-- ERROR --}}
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
        <form action="{{ route('guru.nilai.update', $nilai->id) }}"
              method="POST"
              class="p-6 space-y-6">

            @csrf
            @method('PUT')

            {{-- INFO CARD --}}
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
                            {{ $nilai->siswa->nama_siswa ?? '-' }}
                        </h3>

                        <p class="text-sm text-gray-500">
                            Data nilai yang sedang diedit
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
                    <label class="text-sm font-medium text-gray-700">
                        Mata Pelajaran
                    </label>

                    <select
                        name="mapel_id"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                        @foreach($mapel as $m)

                        <option value="{{ $m->id }}"
                            {{ $nilai->mapel_id == $m->id ? 'selected' : '' }}>

                            {{ $m->nama_mapel }}

                        </option>

                        @endforeach

                    </select>
                </div>

                {{-- TUGAS --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Nilai Tugas
                    </label>

                    <input
                        type="number"
                        min="0"
                        max="100"
                        name="nilai_tugas"
                        value="{{ old('nilai_tugas', $nilai->nilai_tugas) }}"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                {{-- UTS --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Nilai UTS
                    </label>

                    <input
                        type="number"
                        min="0"
                        max="100"
                        name="nilai_uts"
                        value="{{ old('nilai_uts', $nilai->nilai_uts) }}"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                {{-- UAS --}}
                <div class="md:col-span-2">
                    <label class="text-sm font-medium text-gray-700">
                        Nilai UAS
                    </label>

                    <input
                        type="number"
                        min="0"
                        max="100"
                        name="nilai_uas"
                        value="{{ old('nilai_uas', $nilai->nilai_uas) }}"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500">
                </div>

            </div>

            {{-- PREVIEW NILAI --}}
            <div class="grid md:grid-cols-3 gap-4">

                <div class="bg-blue-50 rounded-2xl p-4 border border-blue-100">
                    <p class="text-xs text-blue-500 uppercase">Tugas</p>
                    <h3 class="text-2xl font-bold text-blue-700">
                        {{ $nilai->nilai_tugas }}
                    </h3>
                </div>

                <div class="bg-yellow-50 rounded-2xl p-4 border border-yellow-100">
                    <p class="text-xs text-yellow-500 uppercase">UTS</p>
                    <h3 class="text-2xl font-bold text-yellow-700">
                        {{ $nilai->nilai_uts }}
                    </h3>
                </div>

                <div class="bg-green-50 rounded-2xl p-4 border border-green-100">
                    <p class="text-xs text-green-500 uppercase">UAS</p>
                    <h3 class="text-2xl font-bold text-green-700">
                        {{ $nilai->nilai_uas }}
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

                    Update Nilai

                </button>

            </div>

        </form>

    </div>

</div>

@endsection