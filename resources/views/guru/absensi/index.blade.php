@extends('guru.layouts.app')
@section('page-title','Data Absensi')
@section('page-sub','Manajemen Absensi')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Data Absensi</h1>
            <p class="text-sm text-gray-500">Kelola absensi siswa</p>
        </div>

        <a href="{{ route('guru.absensi.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">
            <i class="ti ti-plus text-lg"></i>
            Tambah Absensi
        </a>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                    <tr>
                        <th class="text-left px-6 py-4">Siswa</th>
                        <th class="text-left px-6 py-4">Tanggal</th>
                        <th class="text-left px-6 py-4">Status</th>
                        <th class="text-right px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($absensi as $a)
                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600">
                                    <i class="ti ti-user text-lg"></i>
                                </div>
                                <div class="font-semibold">
                                    {{ $a->siswa->nama_siswa }}
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <i class="ti ti-calendar text-gray-400"></i>
                                {{ $a->tanggal }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                            @if($a->keterangan=='Hadir') bg-green-50 text-green-600
                            @elseif($a->keterangan=='Izin') bg-yellow-50 text-yellow-600
                            @elseif($a->keterangan=='Sakit') bg-blue-50 text-blue-600
                            @else bg-red-50 text-red-600
                            @endif">
                                {{ $a->keterangan }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">

                                {{-- DETAIL --}}
                                <a href="{{ route('guru.absensi.show',$a->id) }}"
                                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-gray-200">
                                    <i class="ti ti-eye text-gray-600"></i>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('guru.absensi.edit',$a->id) }}"
                                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-yellow-100 hover:bg-yellow-200">
                                    <i class="ti ti-edit text-yellow-600"></i>
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('guru.absensi.destroy',$a->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button"
                                            onclick="confirmDelete(this.closest('form'))"
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-100 hover:bg-red-200">

                                        <i class="ti ti-trash text-red-600"></i>

                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-400">
                            <i class="ti ti-inbox text-2xl block mb-1"></i>
                            Belum ada data absensi
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>

    <div>
        {{ $absensi->links() }}
    </div>

</div>
@endsection