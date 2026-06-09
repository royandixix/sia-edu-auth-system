@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('page-sub', 'Dashboard')

@section('content')
<div class="space-y-6 max-w-[1600px] mx-auto p-1 animate-fade-in select-none">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 relative overflow-hidden rounded-xl bg-gradient-to-br from-gray-950 via-slate-900 to-gray-950 p-6 md:p-8 text-white shadow-xl border border-white/[0.04] transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-950/20">
            <div class="absolute -right-10 -bottom-10 w-44 h-44 rounded-full bg-indigo-500/10 blur-2xl pointer-events-none"></div>
            <div class="absolute left-1/3 top-0 w-px h-full bg-gradient-to-b from-white/[0.05] via-transparent to-transparent pointer-events-none"></div>
            
            <div class="space-y-3 relative z-10">
                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-md bg-white/[0.04] border border-white/[0.06] backdrop-blur-md">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-[10px] text-slate-300 uppercase tracking-widest font-bold">Sistem Aktif</span>
                </div>
                <h2 class="text-xl md:text-3xl font-black tracking-tight text-white leading-tight">
                    Selamat datang kembali, <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-indigo-300">{{ auth()->user()->username ?? 'Admin' }}</span>
                </h2>
                <p class="text-sm text-slate-400 max-w-md font-normal leading-relaxed">
                    Seluruh modul akademik berjalan optimal. Periksa pembaruan data dan aktivitas log masuk hari ini.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-white/[0.06] mt-6 relative z-10">
                <div class="flex items-center gap-2 text-xs font-bold text-indigo-300 bg-indigo-500/10 px-2.5 py-1 rounded">
                    TA 2025/2026
                </div>
                <span class="text-white/20 text-xs hidden sm:inline">|</span>
                <div class="text-xs font-semibold text-slate-400 tracking-wide">
                    Pusat Kendali Administrasi Sekolah
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-100 p-6 shadow-sm flex flex-col justify-between transition-all duration-300 hover:shadow-md">
            <div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xs font-bold text-slate-400 tracking-wider uppercase">Indeks Akademik</h3>
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                </div>
                <p class="text-[11px] text-slate-400 font-medium">Akumulasi nilai ujian & tugas keseluruhan</p>
                
                <div class="flex items-baseline gap-2 mt-4 mb-1">
                    <div class="text-4xl font-black text-slate-900 tracking-tight transition-transform duration-300 group-hover:scale-105">{{ $rataNilaiPersen }}%</div>
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md inline-flex items-center gap-0.5">
                        <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7 7 7"/></svg>
                        Efisien
                    </span>
                </div>
                <p class="text-xs font-bold text-slate-500">Rata-rata Nilai Gabungan</p>
            </div>

            <div class="space-y-2 pt-4 border-t border-slate-50 mt-4">
                <div class="flex items-center justify-between text-xs font-bold">
                    <span class="text-slate-400 font-medium">Batas Ketuntasan</span>
                    <span class="text-slate-800">Kapasitas {{ min($rataNilaiPersen, 100) }}%</span>
                </div>
                <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-slate-900 rounded-full transition-all duration-700 ease-out shadow-[0_0_8px_rgba(15,23,42,0.2)]" style="width: {{ min($rataNilaiPersen, 100) }}%"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @php
        $cards = [
            [
                'label' => 'Total Siswa',
                'value' => $totalSiswa,
                'sub' => 'Siswa terregistrasi',
                'bg_ico' => 'bg-slate-950 text-white shadow-md shadow-slate-950/10',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>',
            ],
            [
                'label' => 'Total Guru',
                'value' => $totalGuru,
                'sub' => 'Tenaga pendidik aktif',
                'bg_ico' => 'bg-indigo-600 text-white shadow-md shadow-indigo-600/10',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3L1 9l11 6 11-6-11-6z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12v5c0 1.1 3.1 2 7 2s7-.9 7-2v-5"/>',
            ],
            [
                'label' => 'Total Kelas',
                'value' => $totalKelas,
                'sub' => 'Manajemen ruangan',
                'bg_ico' => 'bg-emerald-600 text-white shadow-md shadow-emerald-600/10',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>',
            ],
            [
                'label' => 'Mata Pelajaran',
                'value' => $totalMapel,
                'sub' => 'Kurikulum tersedia',
                'bg_ico' => 'bg-violet-600 text-white shadow-md shadow-violet-600/10',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 19.5A2.5 2.5 0 016.5 17H20V5H6.5A2.5 2.5 0 004 7.5v12z"/>',
            ],
        ];
        @endphp

        @foreach($cards as $c)
        <div class="group bg-white rounded-xl border border-slate-100 p-5 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex items-center justify-between">
            <div class="space-y-1 min-w-0">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $c['label'] }}</p>
                <div class="text-3xl font-black text-slate-900 tracking-tight group-hover:text-indigo-600 transition-colors">{{ $c['value'] }}</div>
                <p class="text-[11px] text-slate-400 font-medium truncate">{{ $c['sub'] }}</p>
            </div>
            <div class="w-11 h-11 rounded-lg {{ $c['bg_ico'] }} flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    {!! $c['icon'] !!}
                </svg>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-100 p-6 shadow-sm flex flex-col justify-between transition-all duration-300 hover:shadow-md">
            <div>
                <div class="flex items-center justify-between border-b border-slate-50 pb-4 mb-4">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 tracking-tight uppercase">Log Aktivitas Terbaru</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Sinkronisasi data real-time entri akademis</p>
                    </div>
                </div>

                <div class="divide-y divide-slate-50">
                    @forelse($activities as $a)
                    <div class="flex items-start gap-4 py-3.5 first:pt-1 last:pb-1 group transition-all duration-200 hover:bg-slate-50/50 -mx-2 px-2 rounded-md">
                        <div class="w-9 h-9 rounded-lg {{ $a['bg'] ?? 'bg-slate-100 text-slate-700' }} flex items-center justify-center shrink-0 shadow-inner">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $a['icon'] !!}</svg>
                        </div>
                        <div class="flex-1 min-w-0 space-y-0.5">
                            <div class="flex items-center justify-between gap-4">
                                <div class="text-xs font-bold text-slate-800 truncate group-hover:text-indigo-600 transition-colors tracking-wide">{{ $a['title'] }}</div>
                                <span class="text-[9px] font-bold text-slate-400 whitespace-nowrap bg-slate-100 px-2 py-0.5 rounded">{{ $a['time'] }}</span>
                            </div>
                            <div class="text-[11px] text-slate-500 truncate font-normal">{{ $a['sub'] }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-10 text-xs font-bold text-slate-400 tracking-wide">Belum ada pembaruan log masuk terdeteksi.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-100 p-6 shadow-sm flex flex-col gap-6 justify-between transition-all duration-300 hover:shadow-md">
            <div>
                <div class="mb-5">
                    <h3 class="text-sm font-bold text-slate-900 tracking-tight uppercase">Akses Pintasan</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Navigasi instan menuju entri form operasional</p>
                </div>
                
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.siswa.index') }}"
                       class="group flex flex-col items-center justify-center p-4 rounded-lg bg-slate-50 hover:bg-slate-900 text-center transition-all duration-300 shadow-sm border border-slate-100/50">
                        <div class="w-10 h-10 rounded-md bg-white text-slate-900 flex items-center justify-center group-hover:scale-90 group-hover:bg-white/10 group-hover:text-white transition-all mb-2 shadow-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-700 group-hover:text-white transition-colors">Siswa Baru</span>
                    </a>

                    <a href="{{ route('admin.absensi.index') }}"
                       class="group flex flex-col items-center justify-center p-4 rounded-lg bg-slate-50 hover:bg-indigo-600 text-center transition-all duration-300 shadow-sm border border-slate-100/50">
                        <div class="w-10 h-10 rounded-md bg-white text-indigo-600 flex items-center justify-center group-hover:scale-90 group-hover:bg-white/10 group-hover:text-white transition-all mb-2 shadow-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-700 group-hover:text-white transition-colors">Isi Presensi</span>
                    </a>

                    <a href="{{ route('admin.nilai.index') }}"
                       class="group flex flex-col items-center justify-center p-4 rounded-lg bg-slate-50 hover:bg-emerald-600 text-center transition-all duration-300 shadow-sm border border-slate-100/50">
                        <div class="w-10 h-10 rounded-md bg-white text-emerald-600 flex items-center justify-center group-hover:scale-90 group-hover:bg-white/10 group-hover:text-white transition-all mb-2 shadow-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-700 group-hover:text-white transition-colors">Input Nilai</span>
                    </a>

                    <a href="{{ route('admin.jadwal.index') }}"
                       class="group flex flex-col items-center justify-center p-4 rounded-lg bg-slate-50 hover:bg-violet-600 text-center transition-all duration-300 shadow-sm border border-slate-100/50">
                        <div class="w-10 h-10 rounded-md bg-white text-violet-600 flex items-center justify-center group-hover:scale-90 group-hover:bg-white/10 group-hover:text-white transition-all mb-2 shadow-sm">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2"/>
                                <path stroke-linecap="round" stroke-width="2" d="M16 2v4M8 2v4M3 10h18"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-slate-700 group-hover:text-white transition-colors">Atur Jadwal</span>
                    </a>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-4 mt-2">
                <h4 class="text-[10px] font-black text-slate-400 mb-3 tracking-widest uppercase">Statistik Kehadiran Harian</h4>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-xs mb-1.5 font-bold">
                            <span class="text-slate-400 font-medium">Rasio Presensi</span>
                            <span class="text-slate-900">{{ $persentaseKehadiran }}%</span>
                        </div>
                        <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-900 rounded-full transition-all duration-500" style="width: {{ $persentaseKehadiran }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(4px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>
@endsection