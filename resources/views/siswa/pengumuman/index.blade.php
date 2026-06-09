@extends('siswa.layouts.app')

@section('page-title', 'Pengumuman')
@section('page-sub', 'Siswa')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold">Pengumuman</h1>
    <p class="text-gray-500">Informasi dari sekolah</p>
</div>

<div class="bg-white border rounded-xl p-5">

    @forelse($pengumuman as $p)
        <div class="border-b py-4">

            <div class="flex justify-between items-center">
                <h2 class="font-bold text-lg">
                    {{ $p->judul }}
                </h2>

                <span class="text-xs text-gray-500">
                    {{ $p->tanggal }}
                </span>
            </div>

            <p class="text-gray-600 mt-2 whitespace-pre-line">
                {{ $p->isi }}
            </p>

        </div>
    @empty
        <p class="text-center text-gray-500 py-4">
            Tidak ada pengumuman
        </p>
    @endforelse

</div>

@endsection