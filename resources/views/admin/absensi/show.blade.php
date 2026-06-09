@extends('admin.layouts.app')

@section('page-title', 'Detail Absensi')
@section('page-sub', 'Master Data')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="bg-white border border-gray-100 rounded-2xl p-6 space-y-5">

            <div>

                <p class="text-xs text-gray-400">
                    Nama Siswa
                </p>

                <p class="font-semibold text-gray-900">
                    {{ $absensi->siswa->nama_siswa }}
                </p>

            </div>

            <div>

                <p class="text-xs text-gray-400">
                    Tanggal
                </p>

                <p>
                    {{ $absensi->tanggal }}
                </p>

            </div>

            <div>

                <p class="text-xs text-gray-400">
                    Keterangan
                </p>

                <span
                    class="px-3 py-1 rounded-full text-xs font-semibold

@if ($absensi->keterangan == 'Hadir') bg-green-50 text-green-600
@elseif($absensi->keterangan == 'Izin')
bg-yellow-50 text-yellow-600
@elseif($absensi->keterangan == 'Sakit')
bg-blue-50 text-blue-600
@else
bg-red-50 text-red-600 @endif">

                    {{ $absensi->keterangan }}

                </span>

            </div>

            <div class="pt-4 border-t">

                <a href="{{ route('admin.absensi.index') }}" class="px-4 py-2 bg-gray-100 rounded-xl">
                    Kembali
                </a>

            </div>

        </div>

    </div>

@endsection
