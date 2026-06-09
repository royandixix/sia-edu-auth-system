<div class="flex flex-col h-full bg-gray-950 text-white">

    {{-- LOGO --}}
    <div class="px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center">
                <span class="font-bold">S</span>
            </div>

            <div>
                <div class="font-bold text-sm">SIAKAD SISWA</div>
                <div class="text-[11px] text-gray-400">Student Panel</div>
            </div>

        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 overflow-y-auto py-5 px-3 space-y-6">

        <div>
            <p class="text-[10px] text-gray-500 px-3 mb-2 uppercase">Utama</p>

            {{-- DASHBOARD --}}
            <a href="{{ route('siswa.dashboard') }}"
               class="flex px-3 py-2.5 rounded-xl text-sm
               {{ request()->routeIs('siswa.dashboard') ? 'bg-indigo-500 text-white' : 'text-gray-400 hover:bg-white/10' }}">
                Dashboard
            </a>

            {{-- NILAI --}}
            <a href="{{ route('siswa.nilai.index') }}"
               class="flex px-3 py-2.5 rounded-xl text-sm
               {{ request()->routeIs('siswa.nilai.*') ? 'bg-indigo-500 text-white' : 'text-gray-400 hover:bg-white/10' }}">
                Nilai Saya
            </a>

            {{-- ABSENSI --}}
            <a href="{{ route('siswa.absensi.index') }}"
               class="flex px-3 py-2.5 rounded-xl text-sm
               {{ request()->routeIs('siswa.absensi.*') ? 'bg-indigo-500 text-white' : 'text-gray-400 hover:bg-white/10' }}">
                Absensi
            </a>

            {{-- JADWAL --}}
            <a href="{{ route('siswa.jadwal.index') }}"
               class="flex px-3 py-2.5 rounded-xl text-sm
               {{ request()->routeIs('siswa.jadwal.*') ? 'bg-indigo-500 text-white' : 'text-gray-400 hover:bg-white/10' }}">
                Jadwal
            </a>

            {{-- PENGUMUMAN --}}
            <a href="{{ route('siswa.pengumuman.index') }}"
               class="flex px-3 py-2.5 rounded-xl text-sm
               {{ request()->routeIs('siswa.pengumuman.*') ? 'bg-indigo-500 text-white' : 'text-gray-400 hover:bg-white/10' }}">
                Pengumuman
            </a>

        </div>

    </nav>

    {{-- FOOTER --}}
    <div class="p-4 border-t border-white/10">
        <div class="text-sm">
            {{ session('username','Siswa') }}
        </div>
    </div>

</div>