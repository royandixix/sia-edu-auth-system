<div class="flex flex-col h-full bg-gray-950 text-white">

    {{-- LOGO --}}
    <div class="px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 2L2 7l10 5 10-5-10-5z"/>
                </svg>
            </div>

            <div>
                <div class="font-bold text-sm">SIAKAD KEPSEK</div>
                <div class="text-[11px] text-gray-400">Kepala Sekolah</div>
            </div>

        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 overflow-y-auto py-5 px-3 space-y-6">

        {{-- DASHBOARD --}}
        <div>
            <p class="text-[10px] text-gray-500 px-3 mb-2 uppercase">Utama</p>

            <a href="{{ route('kepsek.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
               {{ request()->routeIs('kepsek.dashboard') ? 'bg-indigo-500 text-white' : 'text-gray-400 hover:bg-white/10' }}">
                Dashboard
            </a>
        </div>

        {{-- LAPORAN --}}
        <div>
            <p class="text-[10px] text-gray-500 px-3 mb-2 uppercase">Laporan</p>

            <a href="{{ route('kepsek.laporan.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm
               {{ request()->routeIs('kepsek.laporan.*') ? 'bg-indigo-500 text-white' : 'text-gray-400 hover:bg-white/10' }}">
                Laporan Akademik
            </a>

        </div>

    </nav>

    {{-- FOOTER --}}
    <div class="p-4 border-t border-white/10">
        <div class="text-sm">
            {{ session('username','Kepala Sekolah') }}
        </div>
    </div>

</div>