@extends('admin.layouts.app')

@section('page-title', 'Detail Pengumuman')
@section('page-sub', 'Manajemen Informasi')

@section('content')

<div class="max-w-4xl mx-auto">
<div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

    <div class="p-6">

        <div class="flex items-center justify-between mb-6">

            <div>

                <h2 class="text-2xl font-bold text-gray-900">
                    {{ $pengumuman->judul }}
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d F Y') }}
                </p>

            </div>

            <a href="{{ route('admin.pengumuman.index') }}"
               class="px-4 py-2 bg-gray-100 rounded-xl hover:bg-gray-200">
                Kembali
            </a>

        </div>

        <div class="border-t pt-6">

            <div class="prose max-w-none text-gray-700 whitespace-pre-line">
                {{ $pengumuman->isi }}
            </div>

        </div>

    </div>

</div>

</div>

@endsection
