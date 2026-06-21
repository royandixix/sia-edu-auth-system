@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="full-page-split row g-0">

    <div class="col-lg-6 d-none d-lg-block position-relative h-100">

        <img
            src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1400"
            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">

        <div
            class="position-absolute top-0 start-0 w-100 h-100"
            style="background:linear-gradient(135deg,rgba(15,23,42,.85),rgba(30,41,59,.7))">

            <div class="h-100 d-flex flex-column justify-content-between text-white p-5">

                <div>
                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 px-3 py-2 rounded-3 mb-4">
                        <span class="fw-bold me-2 text-warning">★</span>
                        <span class="small fw-semibold text-uppercase text-white-50">
                            Portal Academic
                        </span>
                    </div>
                </div>

                <div>
                    <h1 class="fw-black display-5 mb-3 text-white">
                        Sistem Informasi
                        <span class="text-warning">Akademik</span>
                    </h1>

                    <p class="fs-5 text-white-50 mb-5">
                        Kelola data sekolah dalam satu sistem.
                    </p>
                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-6 bg-white h-100 overflow-y-auto">

        <div class="d-flex justify-content-center align-items-center px-4 h-100 min-vh-100">

            <div style="width:100%;max-width:380px;padding:40px 0">

                <div class="text-center mb-4">

                    <div class="mb-4">
                        <img
                            src="{{ asset('images/logo/WhatsApp Image 2026-06-18 at 23.31.30.jpeg') }}"
                            alt="Logo SIAKAD"
                            style="height:60px;width:auto;">
                    </div>

                    <h2 class="fw-bold">
                        Login
                    </h2>

                    <p class="text-secondary">
                        Masuk ke sistem
                    </p>

                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach

                    </div>
                @endif

               

                <form method="POST" action="{{ route('login') }}" id="loginForm">

                    @csrf

                    <div class="mb-3">

                        <label class="small text-secondary">
                            Username / Email
                        </label>

                        <input
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            class="form-control py-3"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="small text-secondary">
                            Login Sebagai
                        </label>

                        <select
                            name="role"
                            class="form-control py-3"
                            required>

                            <option value="">
                                Pilih Role
                            </option>

                            <option value="admin">
                                Admin
                            </option>

                            <option value="guru">
                                Guru
                            </option>

                            <option value="siswa">
                                Siswa
                            </option>

                            <option value="orang_tua">
                                Orang Tua
                            </option>

                            <option value="kepala_sekolah">
                                Kepala Sekolah
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="small text-secondary">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control py-3"
                            required>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-dark w-100 py-3"
                        id="loginBtn">

                        Masuk

                    </button>

                    <div class="text-center mt-4">

                        <p class="small text-secondary mb-0">

                            Belum memiliki akun?

                            <a
                                href="{{ route('register') }}"
                                class="fw-semibold text-primary text-decoration-none">

                                Daftar Akun

                            </a>

                        </p>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<style>

body{
    background:#fff;
    margin:0;
    font-family:Inter,system-ui,sans-serif;
}

.full-page-split{
    position:fixed;
    top:0;
    left:0;
    width:100vw;
    height:100vh;
    z-index:9999;
}

.fw-black{
    font-weight:900;
}

.form-control{
    border:1px solid #e2e8f0;
    background:#f8fafc;
}

.form-control:focus{
    border-color:#0f172a;
    box-shadow:0 0 0 4px rgba(15,23,42,.06);
}

.btn-dark{
    background:#0f172a;
    border:none;
}

.btn-dark:hover{
    background:#1e293b;
}

@media (max-width:991px){

    .full-page-split{
        position:relative;
        height:auto;
        min-height:100vh;
    }

}

</style>

<script>

document
    .getElementById('loginForm')
    .addEventListener('submit', function(){

        let btn = document.getElementById('loginBtn');

        btn.innerHTML = 'Memproses...';

        btn.disabled = true;

    });

</script>

@endsection