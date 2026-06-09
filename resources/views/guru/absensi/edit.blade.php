@extends('guru.layouts.app')

@section('page-title', 'Edit Absensi')
@section('page-sub', 'Manajemen Absensi')

@section('content')

<div class="max-w-4xl mx-auto">

```
<div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

    {{-- HEADER --}}
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">

        <div>
            <h2 class="text-lg font-semibold text-gray-900">
                Edit Data Absensi
            </h2>

            <p class="text-sm text-gray-400">
                Perbarui data absensi siswa
            </p>
        </div>

        <a href="{{ route('guru.absensi.index') }}"
           class="px-3 py-2 text-sm rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600">
            Kembali
        </a>

    </div>

    {{-- FORM --}}
    <form action="{{ route('guru.absensi.update', $absensi->id) }}"
          method="POST"
          class="p-6 space-y-5">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            {{-- SISWA --}}
            <div class="md:col-span-2">

                <label class="text-sm text-gray-600">
                    Nama Siswa
                </label>

                <select name="siswa_id"
                    class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">

                    @foreach($siswa as $s)

                        <option value="{{ $s->id }}"
                            {{ $absensi->siswa_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nama_siswa }}
                        </option>

                    @endforeach

                </select>

            </div>

            {{-- TANGGAL --}}
            <div>

                <label class="text-sm text-gray-600">
                    Tanggal Absensi
                </label>

                <input type="date"
                       name="tanggal"
                       value="{{ $absensi->tanggal }}"
                       class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">

            </div>

            {{-- STATUS --}}
            <div>

                <label class="text-sm text-gray-600">
                    Keterangan
                </label>

                <select name="keterangan"
                    class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">

                    <option value="Hadir"
                        {{ $absensi->keterangan == 'Hadir' ? 'selected' : '' }}>
                        Hadir
                    </option>

                    <option value="Izin"
                        {{ $absensi->keterangan == 'Izin' ? 'selected' : '' }}>
                        Izin
                    </option>

                    <option value="Sakit"
                        {{ $absensi->keterangan == 'Sakit' ? 'selected' : '' }}>
                        Sakit
                    </option>

                    <option value="Alpa"
                        {{ $absensi->keterangan == 'Alpa' ? 'selected' : '' }}>
                        Alpa
                    </option>

                </select>

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">

            <a href="{{ route('guru.absensi.index') }}"
               class="px-4 py-2 border rounded-xl text-gray-600 hover:bg-gray-50">
                Batal
            </a>

            <button type="submit"
                class="px-5 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                Update Data
            </button>

        </div>

    </form>

</div>
```

</div>

@endsection
