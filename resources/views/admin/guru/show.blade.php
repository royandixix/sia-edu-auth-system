@extends('admin.layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 border rounded-xl">

    <h2 class="text-xl font-bold mb-4">Detail Guru</h2>

    <p><b>Nama:</b> {{ $guru->nama_guru }}</p>
    <p><b>NIP:</b> {{ $guru->nip }}</p>
    <p><b>Mapel:</b> {{ $guru->mapel }}</p>
    <p><b>JK:</b> {{ $guru->jk }}</p>
    <p><b>Alamat:</b> {{ $guru->alamat }}</p>

    <a href="{{ route('admin.guru.index') }}" class="text-blue-600 mt-4 inline-block">
        Kembali
    </a>

</div>

@endsection