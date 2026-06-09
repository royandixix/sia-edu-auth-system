@extends('admin.layouts.app')

@section('page-title', 'Pengumuman')
@section('page-sub', 'Manajemen Informasi')

@section('content')

<div class="space-y-6">
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

    <div>
        <h1 class="text-xl font-bold text-gray-900">Data Pengumuman</h1>
        <p class="text-sm text-gray-500">
            Kelola seluruh pengumuman sekolah
        </p>
    </div>

    <a href="{{ route('admin.pengumuman.create') }}"
       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow">

        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M12 5v14M5 12h14"/>
        </svg>

        Tambah Pengumuman

    </a>

</div>

<div class="grid gap-4">

    @forelse($pengumuman as $item)

    <div class="bg-white border border-gray-100 rounded-2xl p-5 hover:shadow-md transition">

        <div class="flex justify-between items-start">

            <div>

                <h3 class="font-semibold text-lg text-gray-900">
                    {{ $item->judul }}
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    {{ \Illuminate\Support\Str::limit($item->isi, 150) }}
                </p>

            </div>

            <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-medium">
                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
            </span>

        </div>

        <div class="flex justify-end gap-2 mt-5">

            <a href="{{ route('admin.pengumuman.show',$item->id) }}"
               class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs">
                Detail
            </a>

            <a href="{{ route('admin.pengumuman.edit',$item->id) }}"
               class="px-3 py-1.5 rounded-lg bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs">
                Edit
            </a>

            <form action="{{ route('admin.pengumuman.destroy',$item->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Hapus pengumuman ini?')"
                    class="px-3 py-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-600 text-xs">

                    Hapus

                </button>

            </form>

        </div>

    </div>

    @empty

    <div class="bg-white rounded-2xl p-10 text-center text-gray-400">
        Belum ada pengumuman
    </div>

    @endforelse

</div>

<div>
    {{ $pengumuman->links() }}
</div>

</div>

@endsection
