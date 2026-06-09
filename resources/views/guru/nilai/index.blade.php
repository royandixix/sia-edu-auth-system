@extends('guru.layouts.app')

@section('page-title', 'Data Nilai')
@section('page-sub', 'Manajemen Nilai')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Data Nilai Siswa
            </h1>

            <p class="text-sm text-gray-500">
                Kelola nilai tugas, UTS dan UAS siswa
            </p>
        </div>

        <a href="{{ route('guru.nilai.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold shadow-sm transition">

            <svg class="w-4 h-4"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>

            Tambah Nilai

        </a>

    </div>

    {{-- TABLE --}}
    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-gray-50 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500">

                        <th class="px-6 py-4 text-left">
                            Siswa
                        </th>

                        <th class="px-6 py-4 text-left">
                            Mata Pelajaran
                        </th>

                        <th class="px-6 py-4 text-center">
                            Tugas
                        </th>

                        <th class="px-6 py-4 text-center">
                            UTS
                        </th>

                        <th class="px-6 py-4 text-center">
                            UAS
                        </th>

                        <th class="px-6 py-4 text-center">
                            Rata-rata
                        </th>

                        <th class="px-6 py-4 text-center">
                            Grade
                        </th>

                        <th class="px-6 py-4 text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($nilai as $n)

                    @php

                        $rata = round(
                            (
                                $n->nilai_tugas +
                                $n->nilai_uts +
                                $n->nilai_uas
                            ) / 3,
                            2
                        );

                        if($rata >= 90){
                            $grade='A';
                            $gradeColor='bg-green-100 text-green-700';
                        }
                        elseif($rata >= 85){
                            $grade='A-';
                            $gradeColor='bg-green-50 text-green-600';
                        }
                        elseif($rata >= 80){
                            $grade='B+';
                            $gradeColor='bg-blue-100 text-blue-700';
                        }
                        elseif($rata >= 75){
                            $grade='B';
                            $gradeColor='bg-blue-50 text-blue-600';
                        }
                        elseif($rata >= 70){
                            $grade='C';
                            $gradeColor='bg-yellow-100 text-yellow-700';
                        }
                        elseif($rata >= 60){
                            $grade='D';
                            $gradeColor='bg-orange-100 text-orange-700';
                        }
                        else{
                            $grade='E';
                            $gradeColor='bg-red-100 text-red-700';
                        }

                    @endphp

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center">

                                    <svg class="w-5 h-5 text-indigo-600"
                                         fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>

                                </div>

                                <div>

                                    <div class="font-semibold text-gray-900">
                                        {{ $n->siswa->nama_siswa ?? '-' }}
                                    </div>

                                    <div class="text-xs text-gray-400">
                                        NIS :
                                        {{ $n->siswa->nis ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-4">

                            <span class="font-medium text-gray-700">
                                {{ $n->mapel->nama_mapel ?? '-' }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="px-3 py-1 rounded-lg bg-blue-50 text-blue-600 font-semibold text-xs">
                                {{ $n->nilai_tugas }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="px-3 py-1 rounded-lg bg-yellow-50 text-yellow-600 font-semibold text-xs">
                                {{ $n->nilai_uts }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="px-3 py-1 rounded-lg bg-purple-50 text-purple-600 font-semibold text-xs">
                                {{ $n->nilai_uas }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="px-3 py-1 rounded-lg bg-indigo-50 text-indigo-700 font-bold text-xs">
                                {{ $rata }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="px-3 py-1 rounded-lg font-bold text-xs {{ $gradeColor }}">
                                {{ $grade }}
                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('guru.nilai.show', $n->id) }}"
                                   class="px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs font-medium">
                                    Detail
                                </a>

                                <a href="{{ route('guru.nilai.edit', $n->id) }}"
                                   class="px-3 py-2 rounded-lg bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('guru.nilai.destroy', $n->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="button"
                                        onclick="confirmDelete(this.form)"
                                        class="px-3 py-2 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8"
                            class="py-16 text-center text-gray-400">

                            Belum ada data nilai

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div>
        {{ $nilai->links() }}
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'{{ session('success') }}',
    confirmButtonColor:'#4f46e5'
});
</script>
@endif

<script>

function confirmDelete(form)
{
    Swal.fire({
        title:'Hapus Data?',
        text:'Data yang dihapus tidak dapat dikembalikan.',
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#dc2626',
        cancelButtonColor:'#6b7280',
        confirmButtonText:'Ya, Hapus',
        cancelButtonText:'Batal'
    }).then((result)=>{

        if(result.isConfirmed)
        {
            form.submit();
        }

    });
}

</script>

@endsection