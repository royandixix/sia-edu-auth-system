@extends('admin.layouts.app')

@section('page-title', 'Tambah Siswa')
@section('page-sub', 'Master Data')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">Tambah Data Siswa</h2>
                <p class="text-sm text-gray-400">Isi data siswa dengan lengkap dan benar</p>
            </div>

            <a href="{{ route('admin.siswa.index') }}"
               class="px-3 py-2 text-sm rounded-xl border border-gray-200 hover:bg-gray-50 text-gray-600">
                Kembali
            </a>
        </div>

        <form action="{{ route('admin.siswa.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="text-sm text-gray-600">NIS</label>
                    <input type="text" name="nis"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5"
                        placeholder="Masukkan NIS">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Nama Lengkap</label>
                    <input type="text" name="nama_siswa"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5"
                        placeholder="Masukkan nama lengkap">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                    <select name="jk"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
                        <option value="">Pilih</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600">Kelas</label>
                    <select name="kelas_id"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
                        <option value="">Pilih Kelas</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="text-sm text-gray-600">Alamat</label>
                    <input type="text" name="alamat"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5"
                        placeholder="Alamat lengkap">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Status</label>
                    <select name="status"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                {{-- 🔥 LOGIN SISWA --}}
                <div>
                    <label class="text-sm text-gray-600">Email Login</label>
                    <input type="email" name="email"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5"
                        placeholder="Email untuk login">
                </div>

                <div class="md:col-span-2">
                    <label class="text-sm text-gray-600">Password Default</label>
                    <input type="text" name="password"
                        value="12345678"
                        class="mt-1 w-full rounded-xl border border-gray-200 px-4 py-2.5">
                    <small class="text-gray-400">Password default untuk login siswa</small>
                </div>

            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">

                <a href="{{ route('admin.siswa.index') }}"
                   class="px-4 py-2 border rounded-xl text-gray-600">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white rounded-xl">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>

@endsection