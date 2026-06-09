<header class="h-16 bg-white border-b flex items-center justify-between px-4 md:px-6">

    <div class="flex items-center gap-3">

        <button @click="sidebarOpen = true" class="lg:hidden">
            ☰
        </button>

        <div>
            <div class="text-xs text-gray-400">
                SIAKAD → {{ strtoupper(session('role','SISWA')) }}
            </div>
            <div class="font-semibold">
                @yield('page-title', 'Dashboard')
            </div>
        </div>

    </div>

    <div class="flex items-center gap-3">

        <div class="text-xs text-gray-500">
            {{ now()->format('d M Y') }}
        </div>

        <div class="text-sm font-semibold">
            {{ session('username') }}
        </div>

        <a href="{{ route('logout') }}" class="text-red-500 text-sm">
            Logout
        </a>

    </div>

</header>