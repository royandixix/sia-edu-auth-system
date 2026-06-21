
<div class="flex flex-col h-full bg-gray-950 text-white">

    {{-- LOGO --}}
    <div class="px-5 py-5 border-b border-white/10">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center shrink-0 shadow-lg shadow-indigo-500/30">
                <i class="ti ti-school text-xl text-white"></i>
            </div>

            <div>
                <div class="font-bold text-white text-sm tracking-wide">
                    SIAKAD
                </div>

                <div class="text-[11px] text-gray-400">
                    Panel Guru
                </div>
            </div>

            <button
                @click="sidebarOpen = false"
                class="ml-auto p-1.5 rounded-lg hover:bg-white/10 lg:hidden text-gray-400 hover:text-white transition-colors">

                <i class="ti ti-x text-lg"></i>

            </button>

        </div>

    </div>

    {{-- MENU --}}
    <nav class="flex-1 overflow-y-auto py-5 px-3 space-y-6">

        {{-- UTAMA --}}
        <div>

            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Utama
            </p>

            <a
                href="{{ route('guru.dashboard') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('guru.dashboard')
                    ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                    : 'text-gray-400 hover:bg-white/10 hover:text-white' }}"
            >

                <i class="ti ti-layout-dashboard text-lg"></i>

                <span>Dashboard</span>

            </a>

        </div>

        {{-- AKADEMIK --}}
        <div>

            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Akademik
            </p>

            {{-- ABSENSI --}}
            <a
                href="{{ route('guru.absensi.index') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('guru.absensi.*')
                    ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                    : 'text-gray-400 hover:bg-white/10 hover:text-white' }}"
            >

                <i class="ti ti-checkup-list text-lg"></i>

                <span>Absensi</span>

            </a>

            {{-- NILAI --}}
            <a
                href="{{ route('guru.nilai.index') }}"
                @click="sidebarOpen = false"
                class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
                {{ request()->routeIs('guru.nilai.*')
                    ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                    : 'text-gray-400 hover:bg-white/10 hover:text-white' }}"
            >

                <i class="ti ti-chart-bar text-lg"></i>

                <span>Nilai</span>

            </a>

        </div>

    </nav>

    {{-- DIVIDER --}}
    <div class="h-px bg-white/10 mx-3"></div>

    {{-- USER --}}
    <div class="p-4">

        <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-white/10 transition-colors cursor-pointer">

            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center text-white font-bold text-xs shrink-0">
                {{ strtoupper(substr(session('username','GR'),0,2)) }}
            </div>

            <div class="flex-1 min-w-0">

                <div class="text-sm font-semibold text-white truncate">
                    {{ session('username') ?? 'Guru' }}
                </div>

                <div class="text-xs text-gray-500">
                    Guru
                </div>

            </div>

            <i class="ti ti-user-circle text-gray-500 text-lg"></i>

        </div>

    </div>

</div>
