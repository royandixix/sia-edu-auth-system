<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIAKAD KEPSEK — @yield('page-title', 'Dashboard')</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 antialiased">

<div x-data="{ sidebarOpen: false }" class="flex min-h-screen overflow-x-hidden">

    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        style="display: none;"
    ></div>

    <aside
        class="fixed lg:static z-50 inset-y-0 left-0 w-64 bg-gray-900 text-white
               transform transition-transform duration-300 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >
        @include('kepsek.partials.sidebar')
    </aside>

    <div class="flex-1 flex flex-col min-w-0 w-full h-screen overflow-y-auto">

        <header class="sticky top-0 z-30 w-full">
            @include('kepsek.partials.navbar')
        </header>

        <main class="flex-1 p-4 md:p-6">
            @yield('content')
        </main>

        <footer class="w-full mt-auto">
            @include('kepsek.partials.footer')
        </footer>

    </div>

</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>