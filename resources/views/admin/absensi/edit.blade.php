@extends('admin.layouts.app')

@section('page-title', 'Edit Absensi')
@section('page-sub', 'Master Data')

@section('content')

    <div class="max-w-4xl mx-auto">

        <div class="bg-white border rounded-2xl p-6">

            <form action="{{ route('admin.absensi.update', $absensi->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="space-y-5">

                    <div>
                        <label>Siswa</label>

                        <select name="siswa_id" class="w-full mt-1 rounded-xl border px-4 py-2.5">

                            @foreach ($siswa as $s)
                                <option value="{{ $s->id }}" {{ $absensi->siswa_id == $s->id ? 'selected' : '' }}>

                                    {{ $s->nama_siswa }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div>
                        <label>Tanggal</label>

                        <input type="date" name="tanggal" value="{{ $absensi->tanggal }}"
                            class="w-full mt-1 rounded-xl border px-4 py-2.5">
                    </div>

                    <div>

                        <label>Keterangan</label>

                        <select name="keterangan" class="w-full mt-1 rounded-xl border px-4 py-2.5">

                            <option {{ $absensi->keterangan == 'Hadir' ? 'selected' : '' }}>
                                Hadir
                            </option>

                            <option {{ $absensi->keterangan == 'Izin' ? 'selected' : '' }}>
                                Izin
                            </option>

                            <option {{ $absensi->keterangan == 'Sakit' ? 'selected' : '' }}>
                                Sakit
                            </option>

                            <option {{ $absensi->keterangan == 'Alpa' ? 'selected' : '' }}>
                                Alpa
                            </option>

                        </select>

                    </div>

                    <div class="flex justify-end">

                        <button class="px-5 py-2 bg-indigo-600 text-white rounded-xl">
                            Update Data
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection
