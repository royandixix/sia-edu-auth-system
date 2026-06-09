<div class="flex flex-col h-full bg-gray-950 text-white">

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
                    Panel Guru
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

    <nav class="flex-1 overflow-y-auto py-5 px-3 space-y-6">

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
                    : 'text-gray-400 hover:bg-white/8 hover:text-white' }}"
            >
                Dashboard
            </a>
        </div>

        <div>
            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Akademik
            </p>

            @php
            $menu = [
                ['route'=>'guru.absensi.index', 'label'=>'Absensi'],
                ['route'=>'guru.nilai.index', 'label'=>'Nilai'],
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

    </nav>

    <div class="h-px bg-white/10 mx-3"></div>

    <div class="p-4">
        <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-white/8 transition-colors cursor-pointer">

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

        </div>
    </div>

</div>