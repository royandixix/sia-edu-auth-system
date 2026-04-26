@extends('admin.layouts.app')

@section('page-title', 'Dashboard')
@section('page-sub', 'Ringkasan')

@section('content')

{{-- GREETING --}}
<div style="
    background: linear-gradient(135deg, #6366F1 0%, #818CF8 50%, #A5B4FC 100%);
    border-radius: var(--radius);
    padding: 24px 28px;
    color: #fff;
    margin-bottom: 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
">
    <div style="position:absolute;right:-30px;top:-30px;width:180px;height:180px;background:rgba(255,255,255,.07);border-radius:50%"></div>
    <div style="position:absolute;right:70px;bottom:-50px;width:130px;height:130px;background:rgba(255,255,255,.05);border-radius:50%"></div>
    <div>
        <h2 style="font-size:18px;font-weight:700;margin-bottom:5px">
            Selamat datang kembali, {{ session('username') ?? 'Admin' }}! 👋
        </h2>
        <p style="font-size:13px;opacity:.8;margin:0">
            Berikut ringkasan data sistem informasi akademik hari ini
        </p>
    </div>
    <div style="background:rgba(255,255,255,.2);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,.3);border-radius:12px;padding:12px 20px;text-align:center;z-index:1">
        <div style="font-size:26px;font-weight:700">96%</div>
        <div style="font-size:11px;opacity:.8;margin-top:2px">Tingkat kehadiran</div>
    </div>
</div>

{{-- KARTU STATISTIK --}}
<div class="row g-3 mb-4">
    @php
    $stats = [
        ['label' => 'Total Siswa',    'value' => $totalSiswa ?? 120,  'badge' => '↑ 4%', 'color' => '#6366F1', 'bg' => '#EEF0FF',
         'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
         'grad' => 'linear-gradient(90deg,#6366F1,#818CF8)'],
        ['label' => 'Total Guru',     'value' => $totalGuru ?? 25,    'badge' => '↑ 2%', 'color' => '#10B981', 'bg' => '#ECFDF5',
         'icon' => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
         'grad' => 'linear-gradient(90deg,#10B981,#34D399)'],
        ['label' => 'Total Kelas',    'value' => $totalKelas ?? 10,   'badge' => '→ 0%', 'color' => '#F59E0B', 'bg' => '#FFFBEB',
         'icon' => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
         'grad' => 'linear-gradient(90deg,#F59E0B,#FCD34D)'],
        ['label' => 'Mata Pelajaran', 'value' => $totalMapel ?? 15,   'badge' => '↑ 1%', 'color' => '#EF4444', 'bg' => '#FEF2F2',
         'icon' => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>',
         'grad' => 'linear-gradient(90deg,#EF4444,#F87171)'],
    ];
    @endphp

    @foreach($stats as $s)
    <div class="col-xl-3 col-md-6">
        <div style="
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform .18s, box-shadow .18s;
        " onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 24px rgba(0,0,0,.06)'"
           onmouseout="this.style.transform='';this.style.boxShadow=''">

            {{-- Garis warna bawah --}}
            <div style="position:absolute;bottom:0;left:0;right:0;height:3px;background:{{ $s['grad'] }};border-radius:0 0 var(--radius) var(--radius)"></div>

            <div class="d-flex align-items-center justify-content-between mb-3">
                <div style="width:38px;height:38px;border-radius:10px;background:{{ $s['bg'] }};display:flex;align-items:center;justify-content:center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="{{ $s['color'] }}" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        {!! $s['icon'] !!}
                    </svg>
                </div>
                <span style="font-size:10px;font-weight:600;padding:3px 9px;border-radius:20px;background:{{ $s['bg'] }};color:{{ $s['color'] }}">
                    {{ $s['badge'] }}
                </span>
            </div>

            <div style="font-size:28px;font-weight:700;color:var(--text);line-height:1">{{ $s['value'] }}</div>
            <div style="font-size:12px;color:var(--muted);margin-top:4px">{{ $s['label'] }}</div>
        </div>
    </div>
    @endforeach
</div>

{{-- AKTIVITAS & AKSES CEPAT --}}
<div class="row g-3">

    {{-- AKTIVITAS TERBARU --}}
    <div class="col-lg-7">
        <div style="background:#fff;border:1px solid var(--border);border-radius:var(--radius);padding:20px">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span style="font-size:14px;font-weight:700">Aktivitas Terbaru</span>
                <span style="font-size:11px;color:var(--primary);cursor:pointer;font-weight:500">Lihat semua →</span>
            </div>

            @php
            $activities = [
                ['ico_bg'=>'#EEF0FF','ico_color'=>'#6366F1','title'=>'Siswa baru didaftarkan','sub'=>'Ahmad Fauzi — Kelas X IPA','time'=>'5 mnt lalu',
                 'icon'=>'<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/>'],
                ['ico_bg'=>'#ECFDF5','ico_color'=>'#10B981','title'=>'Absensi diperbarui','sub'=>'Kelas XI IPS — Senin pagi','time'=>'20 mnt lalu',
                 'icon'=>'<polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>'],
                ['ico_bg'=>'#FFFBEB','ico_color'=>'#F59E0B','title'=>'Nilai UTS diinput','sub'=>'Matematika — Kelas XII','time'=>'1 jam lalu',
                 'icon'=>'<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/>'],
                ['ico_bg'=>'#FEF2F2','ico_color'=>'#EF4444','title'=>'Jadwal diperbarui','sub'=>'Semester Genap 2025/2026','time'=>'3 jam lalu',
                 'icon'=>'<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>'],
            ];
            @endphp

            @foreach($activities as $i => $act)
            <div style="display:flex;align-items:center;gap:12px;padding:10px 0;{{ $i < count($activities)-1 ? 'border-bottom:1px solid var(--border)' : '' }}">
                <div style="width:34px;height:34px;border-radius:9px;background:{{ $act['ico_bg'] }};display:flex;align-items:center;justify-content:center;flex-shrink:0">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="{{ $act['ico_color'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        {!! $act['icon'] !!}
                    </svg>
                </div>
                <div style="flex:1">
                    <div style="font-size:12px;font-weight:600;color:var(--text)">{{ $act['title'] }}</div>
                    <div style="font-size:11px;color:var(--muted);margin-top:2px">{{ $act['sub'] }}</div>
                </div>
                <div style="font-size:10px;color:var(--muted);flex-shrink:0">{{ $act['time'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- AKSES CEPAT --}}
    <div class="col-lg-5">
        <div style="background:#fff;border:1px solid var(--border);border-radius:var(--radius);padding:20px">
            <div style="font-size:14px;font-weight:700;margin-bottom:16px">Akses Cepat</div>
            <div class="row g-2">
                @php
                $quick = [
                    ['label'=>'Tambah Siswa',  'sub'=>'Daftarkan siswa baru', 'bg'=>'#EEF0FF','color'=>'#6366F1',
                     'icon'=>'<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/>'],
                    ['label'=>'Input Absensi', 'sub'=>'Rekam kehadiran',     'bg'=>'#ECFDF5','color'=>'#10B981',
                     'icon'=>'<polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>'],
                    ['label'=>'Input Nilai',   'sub'=>'Masukkan nilai ujian', 'bg'=>'#FFFBEB','color'=>'#F59E0B',
                     'icon'=>'<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>'],
                    ['label'=>'Atur Jadwal',   'sub'=>'Kelola jadwal kelas',  'bg'=>'#FEF2F2','color'=>'#EF4444',
                     'icon'=>'<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>'],
                ];
                @endphp

                @foreach($quick as $q)
                <div class="col-6">
                    <div style="background:#F7F8FA;border:1px solid var(--border);border-radius:var(--radius-sm);padding:14px;cursor:pointer;transition:all .15s"
                         onmouseover="this.style.background='{{ $q['bg'] }}';this.style.borderColor='rgba(0,0,0,.08)'"
                         onmouseout="this.style.background='#F7F8FA';this.style.borderColor='var(--border)'">
                        <div style="width:34px;height:34px;border-radius:8px;background:{{ $q['bg'] }};display:flex;align-items:center;justify-content:center;margin-bottom:8px">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="{{ $q['color'] }}" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                {!! $q['icon'] !!}
                            </svg>
                        </div>
                        <div style="font-size:12px;font-weight:600;color:var(--text)">{{ $q['label'] }}</div>
                        <div style="font-size:10px;color:var(--muted);margin-top:2px">{{ $q['sub'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection