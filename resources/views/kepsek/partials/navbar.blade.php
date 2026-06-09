<header class="h-16 bg-white border-b border-gray-100 flex items-center justify-between px-4 md:px-6 sticky top-0 z-20">

    {{-- LEFT --}}
    <div class="flex items-center gap-3 min-w-0">

        <button @click="sidebarOpen = true"
                class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-colors lg:hidden shrink-0">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <div class="min-w-0">
            <div class="flex items-center gap-1.5 text-xs text-gray-400 mb-0.5">
                <span>SIAKAD</span>
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-600">@yield('page-sub', 'Kepala Sekolah')</span>
            </div>
            <div class="text-base font-semibold text-gray-900 truncate leading-tight">
                @yield('page-title', 'Dashboard Kepala Sekolah')
            </div>
        </div>

    </div>

    {{-- RIGHT --}}
    <div class="flex items-center gap-2">

        <div class="hidden md:flex items-center gap-1.5 text-xs bg-gray-50 border border-gray-200 text-gray-600 px-3 py-1.5 rounded-xl font-medium">
            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2"/>
                <path stroke-linecap="round" stroke-width="2" d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
            {{ now()->translatedFormat('d M Y') }}
        </div>

        <button class="relative w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-colors">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
        </button>

        <div class="w-px h-6 bg-gray-200 hidden sm:block"></div>

        <div class="hidden sm:flex items-center gap-2 pl-1">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center text-white font-bold text-xs">
                {{ strtoupper(substr(session('username','KP'),0,2)) }}
            </div>
            <div class="hidden md:block">
                <div class="text-xs font-semibold text-gray-800 leading-tight">
                    {{ session('username') ?? 'Kepala Sekolah' }}
                </div>
                <div class="text-[10px] text-gray-400 leading-tight">
                    Kepala Sekolah
                </div>
            </div>
        </div>

        <a href="{{ route('logout') }}"
           class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 hover:bg-red-50 hover:border-red-200 transition-colors group">
            <svg class="w-4 h-4 text-gray-400 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
        </a>

    </div>
</header>