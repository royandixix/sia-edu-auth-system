<div class="flex flex-col h-full bg-gray-950 text-white">

    {{-- LOGO --}}
    <div class="px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center shrink-0 shadow-lg shadow-indigo-500/30">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 2L2 7l10 5 10-5-10-5z"/>
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2 17l10 5 10-5"/>
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
                class="ml-auto p-1.5 rounded-lg hover:bg-white/10 lg:hidden text-gray-400 hover:text-white transition-colors">
                <svg class="w-4 h-4"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     viewBox="0 0 24 24">
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

            <a href="{{ route('admin.dashboard') }}"
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.dashboard')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5 shrink-0"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l9-9 9 9M5 10v10h14V10"/>
                </svg>

                <span>Dashboard</span>
            </a>
        </div>

        {{-- MASTER DATA --}}
        <div>

            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Master Data
            </p>

            <a href="{{ route('admin.siswa.index') }}"
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.siswa.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 20h5V4H2v16h5m10 0v-2a4 4 0 00-8 0v2m8 0H9m4-10a4 4 0 110-8 4 4 0 010 8z"/>
                </svg>

                <span>Data Siswa</span>
            </a>

            <a href="{{ route('admin.guru.index') }}"
               @click="sidebarOpen = false"
               class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.guru.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6-3v5c0 3-3 5-6 5s-6-2-6-5v-5l6 3z"/>
                </svg>

                <span>Data Guru</span>
            </a>

            <a href="{{ route('admin.kelas.index') }}"
               @click="sidebarOpen = false"
               class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.kelas.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

                <span>Data Kelas</span>
            </a>

            <a href="{{ route('admin.mapel.index') }}"
               @click="sidebarOpen = false"
               class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.mapel.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 6.253v13M5.5 8.25l13 7.5M5.5 15.75l13-7.5"/>
                </svg>

                <span>Mata Pelajaran</span>
            </a>

            <a href="{{ route('admin.orangtua.index') }}"
               @click="sidebarOpen = false"
               class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.orangtua.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 20h5V4H2v16h5m0 0a4 4 0 118 0"/>
                </svg>

                <span>Data Orang Tua</span>
            </a>

        </div>

        {{-- AKADEMIK --}}
        <div>

            <p class="text-[10px] font-semibold text-gray-500 px-3 mb-2 uppercase tracking-widest">
                Akademik
            </p>

            <a href="{{ route('admin.jadwal.index') }}"
               @click="sidebarOpen = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.jadwal.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>

                <span>Jadwal</span>
            </a>

            <a href="{{ route('admin.nilai.index') }}"
               @click="sidebarOpen = false"
               class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.nilai.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 17v-6m3 6V7m3 10v-4m3 4V9"/>
                </svg>

                <span>Nilai</span>
            </a>

            <a href="{{ route('admin.absensi.index') }}"
               @click="sidebarOpen = false"
               class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.absensi.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>

                <span>Absensi</span>
            </a>

            <a href="{{ route('admin.pengumuman.index') }}"
               @click="sidebarOpen = false"
               class="mt-1 flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all
               {{ request()->routeIs('admin.pengumuman.*')
                   ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/25'
                   : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"/>
                </svg>

                <span>Pengumuman</span>
            </a>

        </div>

    </nav>

    <div class="h-px bg-white/10 mx-3"></div>

    {{-- USER --}}
    <div class="p-4">
        <div class="flex items-center gap-3 px-2 py-2 rounded-xl hover:bg-white/10 transition-colors cursor-pointer">

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

