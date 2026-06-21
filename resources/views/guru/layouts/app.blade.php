<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        SIAKAD — @yield('page-title', 'Dashboard')
    </title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- TABLER ICONS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

    <style>
        body{
            font-family:'Plus Jakarta Sans',sans-serif;
        }

        .ti{
            font-size:18px;
            line-height:1;
        }
    </style>

</head>

<body class="bg-gray-50 antialiased">

<div
    x-data="{ sidebarOpen:false }"
    class="flex min-h-screen overflow-x-hidden"
>

    {{-- OVERLAY MOBILE --}}
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen=false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        style="display:none;"
    ></div>

    {{-- SIDEBAR --}}
    <aside
        class="fixed lg:static z-50 inset-y-0 left-0 w-64 bg-gray-950 text-white
        transform transition-transform duration-300 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >
        @include('guru.partials.sidebar')
    </aside>

    {{-- CONTENT --}}
    <div class="flex-1 flex flex-col min-w-0 w-full h-screen overflow-y-auto">

        {{-- NAVBAR --}}
        <header class="sticky top-0 z-30 w-full">
            @include('guru.partials.navbar')
        </header>

        {{-- MAIN --}}
        <main class="flex-1 p-4 md:p-6">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        <footer class="w-full mt-auto">
            @include('guru.partials.footer')
        </footer>

    </div>

</div>

{{-- ALPINE --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- SWEET ALERT 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- SUCCESS --}}
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    confirmButtonColor: '#4f46e5',
    confirmButtonText: 'OK'
});
</script>
@endif

{{-- ERROR --}}
@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Terjadi Kesalahan',
    text: '{{ session('error') }}',
    confirmButtonColor: '#dc2626',
    confirmButtonText: 'Tutup'
});
</script>
@endif

{{-- WARNING --}}
@if(session('warning'))
<script>
Swal.fire({
    icon: 'warning',
    title: 'Peringatan',
    text: '{{ session('warning') }}',
    confirmButtonColor: '#d97706',
    confirmButtonText: 'OK'
});
</script>
@endif

{{-- VALIDATION ERROR --}}
@if ($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Validasi Gagal',
    html: `
        <div style="text-align:left">
            <ul style="padding-left:20px">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    `,
    confirmButtonColor: '#dc2626',
    confirmButtonText: 'Tutup'
});
</script>
@endif

{{-- GLOBAL DELETE CONFIRM --}}
<script>
function confirmDelete(form)
{
    Swal.fire({
        title: 'Hapus Data?',
        text: 'Data yang sudah dihapus tidak dapat dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if(result.isConfirmed){
            form.submit();
        }
    });
}
</script>

</body>
</html>
