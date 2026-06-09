<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIAKAD SISWA — @yield('page-title', 'Dashboard')</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 antialiased">

<div x-data="{ sidebarOpen: false }" class="flex min-h-screen overflow-x-hidden">

    {{-- Overlay --}}
    <div
        x-show="sidebarOpen"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        style="display:none;"
    ></div>

    {{-- SIDEBAR --}}
    <aside
        class="fixed lg:static z-50 inset-y-0 left-0 w-64 bg-gray-900 text-white
        transform transition-transform duration-300"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >
        @include('siswa.partials.sidebar')
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col min-w-0 w-full h-screen overflow-y-auto">

        <header class="sticky top-0 z-30 w-full">
            @include('siswa.partials.navbar')
        </header>

        <main class="flex-1 p-4 md:p-6">
            @yield('content')
        </main>

        <footer>
            @include('siswa.partials.footer')
        </footer>

    </div>

</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>