@extends('orangtua.layouts.app')

@section('page-title', 'Pengumuman')
@section('page-sub', 'Informasi Sekolah')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold">Pengumuman</h1>
    <p class="text-gray-500">Informasi terbaru dari sekolah</p>
</div>

<div class="bg-white p-5 rounded-xl border">

   @forelse($pengumuman as $p)
    <div class="border-b py-3">
        
        <h3 class="font-bold text-gray-900">
            {{ $p->judul }}
        </h3>

        <p class="text-sm text-gray-600 mt-1 whitespace-pre-line">
            {{ $p->isi }}
        </p>

        <small class="text-gray-400">
            {{ $p->tanggal }}
        </small>

    </div>
@empty
    <p class="text-gray-500">Belum ada pengumuman</p>
@endforelse

</div>

@endsection