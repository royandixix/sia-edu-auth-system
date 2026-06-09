@extends('admin.layouts.app')

@section('page-title', 'Edit Siswa')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        {{-- HEADER --}}
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">Edit Data Siswa</h2>
                <p class="text-sm text-gray-400">Perbarui data siswa dengan benar</p>
            </div>

            <a href="{{ route('admin.siswa.index') }}"
               class="px-3 py-2 text-sm rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600">
                Kembali
            </a>
        </div>

        {{-- FORM --}}
        <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- NIS --}}
                <div>
                    <label class="text-sm text-gray-600">NIS</label>
                    <input type="text" name="nis"
                        value="{{ $siswa->nis }}"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none"
                        placeholder="Masukkan NIS">
                </div>

                {{-- Nama --}}
                <div>
                    <label class="text-sm text-gray-600">Nama Lengkap</label>
                    <input type="text" name="nama_siswa"
                        value="{{ $siswa->nama_siswa }}"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-indigo-500 outline-none"
                        placeholder="Masukkan nama lengkap">
                </div>

                {{-- JK --}}
                <div>
                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                    <select name="jk"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">

                        <option value="L" {{ $siswa->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $siswa->jk == 'P' ? 'selected' : '' }}>Perempuan</option>

                    </select>
                </div>

                {{-- Kelas --}}
                <div>
                    <label class="text-sm text-gray-600">Kelas</label>
                    <select name="kelas_id"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">

                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}"
                                {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Alamat --}}
                <div class="md:col-span-2">
                    <label class="text-sm text-gray-600">Alamat</label>
                    <input type="text" name="alamat"
                        value="{{ $siswa->alamat }}"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5"
                        placeholder="Alamat lengkap">
                </div>

                {{-- Status --}}
                <div>
                    <label class="text-sm text-gray-600">Status</label>
                    <select name="status"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">

                        <option value="aktif" {{ $siswa->status == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="nonaktif" {{ $siswa->status == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">

                <a href="{{ route('admin.siswa.index') }}"
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

</div>

@endsection