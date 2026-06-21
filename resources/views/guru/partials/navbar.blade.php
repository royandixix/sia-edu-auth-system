
<header class="h-16 bg-white border-b border-gray-100 flex items-center justify-between px-4 md:px-6 sticky top-0 z-20">

    {{-- LEFT --}}
    <div class="flex items-center gap-3 min-w-0">

        {{-- HAMBURGER --}}
        <button
            @click="sidebarOpen = true"
            class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-colors lg:hidden shrink-0">

            <i class="ti ti-menu-2 text-gray-500 text-lg"></i>

        </button>

        {{-- PAGE TITLE --}}
        <div class="min-w-0">

            <div class="flex items-center gap-1.5 text-xs text-gray-400 mb-0.5">

                <span>SIAKAD</span>

                <i class="ti ti-chevron-right text-[10px]"></i>

                <span class="text-gray-600">
                    @yield('page-sub', 'Dashboard Guru')
                </span>

            </div>

            <div class="text-base font-semibold text-gray-900 truncate leading-tight">
                @yield('page-title', 'Dashboard Guru')
            </div>

        </div>

    </div>

    {{-- RIGHT --}}
    <div class="flex items-center gap-2">

        {{-- DATE --}}
        <div class="hidden md:flex items-center gap-2 text-xs bg-gray-50 border border-gray-200 text-gray-600 px-3 py-1.5 rounded-xl font-medium">

            <i class="ti ti-calendar-event text-gray-400"></i>

            {{ now()->translatedFormat('d M Y') }}

        </div>

        {{-- NOTIFICATION --}}
        <button
            class="relative w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-colors">

            <i class="ti ti-bell text-gray-500"></i>

            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>

        </button>

        {{-- DIVIDER --}}
        <div class="w-px h-6 bg-gray-200 hidden sm:block"></div>

        {{-- USER --}}
        <div class="hidden sm:flex items-center gap-2 pl-1">

            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center text-white font-bold text-xs">
                {{ strtoupper(substr(session('username','GR'),0,2)) }}
            </div>

            <div class="hidden md:block">

                <div class="text-xs font-semibold text-gray-800 leading-tight">
                    {{ session('username') ?? 'Guru' }}
                </div>

                <div class="text-[10px] text-gray-400 leading-tight">
                    Guru
                </div>

            </div>

        </div>

        {{-- LOGOUT --}}
        <a href="{{ route('logout') }}"
           class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200 hover:bg-red-50 hover:border-red-200 transition-colors group">

            <i class="ti ti-logout text-gray-400 group-hover:text-red-500 transition-colors"></i>

        </a>

    </div>

</header>
