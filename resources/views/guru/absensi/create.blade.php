@extends('guru.layouts.app')

@section('page-title', 'Tambah Absensi')
@section('page-sub', 'Manajemen Absensi')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm">

        <div class="px-6 py-4 border-b">
            <h2 class="font-semibold text-lg">
                Tambah Absensi
            </h2>
        </div>

        <form action="{{ route('guru.absensi.store') }}" method="POST" class="p-6 space-y-5">

            @csrf

            <div>

                <label class="text-sm text-gray-600">
                    Siswa
                </label>

                <select name="siswa_id"
                    class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">

                    <option value="">Pilih Siswa</option>

                    @foreach($siswa as $s)
                        <option value="{{ $s->id }}">
                            {{ $s->nama_siswa }}
                        </option>
                    @endforeach

                </select>

            </div>

            <div>

                <label class="text-sm text-gray-600">
                    Tanggal
                </label>

                <input type="date"
                       name="tanggal"
                       class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">

            </div>

            <div>

                <label class="text-sm text-gray-600">
                    Keterangan
                </label>

                <select name="keterangan"
                    class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">

                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>

                </select>

            </div>

            <div class="flex justify-end gap-3 border-t pt-4">

                <a href="{{ route('guru.absensi.index') }}"
                   class="px-4 py-2 border rounded-xl">
                    Batal
                </a>

                <button class="px-5 py-2 bg-indigo-600 text-white rounded-xl">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection