<div class="flex flex-col h-full bg-gray-950 text-white">

    {{-- LOGO --}}
    <div class="px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center shrink-0 shadow-lg shadow-indigo-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 17l10 5 10-5"/>
                </svg>
            </div>

            <div>
                <div class="font-bold text-white text-sm tracking-wide">
                    SIAKAD
                </div>
                <div class="text-[11px] text-gray-400">
                    Sistem Akademik
                </div>
            </div>

            <button
                @click="sidebarOpen = false"
                class="ml-auto p-1.5 rounded-lg hover:bg-white/10 lg:hidden text-gray-400 hover:text-white transition-colors"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 overflow-y-auto py-5 px-3 space-y-6">

        {{-- DASHBOARD --}}
        <div>
            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Utama
            </p>

            <a
                href="{{ route('admin.dashboard') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                    : 'text-gray-400 hover:bg-white/8 hover:text-white' }}"
            >
                Dashboard
            </a>
        </div>

        {{-- MASTER DATA --}}
        <div>
            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Master Data
            </p>

            @php
            $menu = [
                ['route'=>'admin.siswa.index', 'label'=>'Data Siswa'],
                ['route'=>'admin.guru.index', 'label'=>'Data Guru'],
                ['route'=>'admin.kelas.index', 'label'=>'Data Kelas'],
                ['route'=>'admin.mapel.index', 'label'=>'Mata Pelajaran'],
                ['route'=>'admin.orangtua.index', 'label'=>'Data Orang Tua'],
            ];
            @endphp

            @foreach($menu as $m)
            @php
                $active = request()->routeIs(str_replace('.index', '.*', $m['route']));
            @endphp

            <a
                href="{{ route($m['route']) }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                {{ $active
                    ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                    : 'text-gray-400 hover:bg-white/8 hover:text-white' }}"
            >
                {{ $m['label'] }}
            </a>
            @endforeach
        </div>

        {{-- AKADEMIK --}}
        <div>
            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Akademik
            </p>

            @php
            $akademik = [
                ['route'=>'admin.jadwal.index', 'label'=>'Jadwal'],
                ['route'=>'admin.nilai.index', 'label'=>'Nilai'],
                ['route'=>'admin.absensi.index', 'label'=>'Absensi'],
                ['route'=>'admin.pengumuman.index', 'label'=>'Pengumuman'],
            ];
            @endphp

            @foreach($akademik as $a)
            @php
                $active = request()->routeIs(str_replace('.index', '.*', $a['route']));
            @endphp

            <a
                href="{{ route($a['route']) }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                {{ $active
                    ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                    : 'text-gray-400 hover:bg-white/8 hover:text-white' }}"
            >
                {{ $a['label'] }}
            </a>
            @endforeach
        </div>

    </nav>

    <div class="h-px bg-white/10 mx-3"></div>

    {{-- FOOTER --}}
    <div class="p-4">
        <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-white/8 transition-colors cursor-pointer">

            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center text-white font-bold text-xs shrink-0">
                {{ strtoupper(substr(session('username','AD'),0,2)) }}
            </div>

            <div class="flex-1 min-w-0">
                <div class="text-sm font-semibold text-white truncate">
                    {{ session('username') ?? 'Admin' }}
                </div>

                <div class="text-xs text-gray-500">
                    Super Admin
                </div>
            </div>

        </div>
    </div>

</div>