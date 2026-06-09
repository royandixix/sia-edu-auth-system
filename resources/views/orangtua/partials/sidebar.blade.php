<div class="flex flex-col h-full bg-gray-950 text-white">

    {{-- LOGO --}}
    <div class="px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-gray-800 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 2L2 7l10 5 10-5-10-5z"/>
                </svg>
            </div>

            <div>
                <div class="font-bold text-sm">SIAKAD ORANG TUA</div>
                <div class="text-[11px] text-gray-400">Parent Panel</div>
            </div>

        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 overflow-y-auto py-5 px-3 space-y-6">

        {{-- DASHBOARD --}}
        <div>
            <p class="text-[10px] text-gray-500 px-3 mb-2 uppercase">Utama</p>

            <a href="{{ route('orangtua.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition
               {{ request()->routeIs('orangtua.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-white/10' }}">

                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 10h18M3 6h18M3 14h18M3 18h18"/>
                </svg>

                Dashboard
            </a>
        </div>

        {{-- DATA ANAK --}}
        <div>
            <p class="text-[10px] text-gray-500 px-3 mb-2 uppercase">Data Anak</p>

            <a href="{{ route('orangtua.nilai.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-gray-400 hover:bg-white/10
               {{ request()->routeIs('orangtua.nilai.*') ? 'bg-gray-800 text-white' : '' }}">

                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 17v-6h6v6M4 21h16"/>
                </svg>

                Nilai Anak
            </a>

            <a href="{{ route('orangtua.absensi.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-gray-400 hover:bg-white/10
               {{ request()->routeIs('orangtua.absensi.*') ? 'bg-gray-800 text-white' : '' }}">

                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3M5 11h14M5 19h14"/>
                </svg>

                Absensi Anak
            </a>

            <a href="{{ route('orangtua.jadwal.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-gray-400 hover:bg-white/10
               {{ request()->routeIs('orangtua.jadwal.*') ? 'bg-gray-800 text-white' : '' }}">

                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3M5 11h14M5 19h14"/>
                </svg>

                Jadwal Pelajaran
            </a>
        </div>

        {{-- INFORMASI --}}
        <div>
            <p class="text-[10px] text-gray-500 px-3 mb-2 uppercase">Informasi</p>

            <a href="{{ route('orangtua.pengumuman.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-gray-400 hover:bg-white/10
               {{ request()->routeIs('orangtua.pengumuman.*') ? 'bg-gray-800 text-white' : '' }}">

                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M12 20h9"/>
                </svg>

                Pengumuman
            </a>

        </div>

    </nav>

    {{-- FOOTER --}}
    <div class="p-4 border-t border-white/10">
        <div class="text-sm font-medium">
            {{ session('username','Orang Tua') }}
        </div>
        <div class="text-xs text-gray-500">
            Parent Account
        </div>
    </div>

</div>