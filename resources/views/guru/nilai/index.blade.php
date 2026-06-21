@extends('guru.layouts.app')
@section('page-title','Data Nilai')
@section('page-sub','Manajemen Nilai')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">Data Nilai Siswa</h1>
            <p class="text-sm text-gray-500">Kelola nilai tugas, UTS dan UAS siswa</p>
        </div>

        <a href="{{ route('guru.nilai.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold shadow-sm">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>

            Tambah Nilai
        </a>

    </div>

    {{-- TABLE --}}
    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase">
                        <th class="px-6 py-4 text-left">Siswa</th>
                        <th class="px-6 py-4 text-left">Mapel</th>
                        <th class="px-6 py-4 text-center">Tugas</th>
                        <th class="px-6 py-4 text-center">UTS</th>
                        <th class="px-6 py-4 text-center">UAS</th>
                        <th class="px-6 py-4 text-center">Rata-rata</th>
                        <th class="px-6 py-4 text-center">Grade</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                @forelse($nilai as $n)

                @php
                    $rata = round(($n->nilai_tugas + $n->nilai_uts + $n->nilai_uas) / 3, 2);

                    if($rata >= 90){$grade='A';$color='bg-green-100 text-green-700';}
                    elseif($rata >= 85){$grade='A-';$color='bg-green-50 text-green-600';}
                    elseif($rata >= 80){$grade='B+';$color='bg-blue-100 text-blue-700';}
                    elseif($rata >= 75){$grade='B';$color='bg-blue-50 text-blue-600';}
                    elseif($rata >= 70){$grade='C';$color='bg-yellow-100 text-yellow-700';}
                    elseif($rata >= 60){$grade='D';$color='bg-orange-100 text-orange-700';}
                    else{$grade='E';$color='bg-red-100 text-red-700';}
                @endphp

                <tr class="hover:bg-gray-50">

                    <td class="px-6 py-4 font-semibold text-gray-900">
                        {{ $n->siswa->nama_siswa ?? '-' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $n->mapel->nama_mapel ?? '-' }}
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded bg-blue-50 text-blue-600 text-xs font-semibold">
                            {{ $n->nilai_tugas }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded bg-yellow-50 text-yellow-600 text-xs font-semibold">
                            {{ $n->nilai_uts }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded bg-purple-50 text-purple-600 text-xs font-semibold">
                            {{ $n->nilai_uas }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded bg-indigo-50 text-indigo-700 text-xs font-bold">
                            {{ $rata }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded text-xs font-bold {{ $color }}">
                            {{ $grade }}
                        </span>
                    </td>

                    {{-- ACTION ICON BUTTON --}}
                    <td class="px-6 py-4">

                        <div class="flex justify-end gap-2">

                            {{-- DETAIL --}}
                            <a href="{{ route('guru.nilai.show',$n->id) }}"
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-gray-200">

                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>

                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('guru.nilai.edit',$n->id) }}"
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-yellow-100 hover:bg-yellow-200">

                               <i class="ti ti-edit text-yellow-600"></i>

                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('guru.nilai.destroy',$n->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="button"
                                        onclick="confirmDelete(this.form)"
                                        class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-100 hover:bg-red-200">

                                   <i class="ti ti-trash text-red-600"></i>

                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="8" class="text-center py-12 text-gray-400">
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

<script>
function confirmDelete(form){
    Swal.fire({
        title:'Hapus Data?',
        text:'Data tidak bisa dikembalikan',
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#dc2626',
        cancelButtonColor:'#6b7280',
        confirmButtonText:'Hapus'
    }).then((r)=>{
        if(r.isConfirmed) form.submit();
    });
}
</script>

@endsection