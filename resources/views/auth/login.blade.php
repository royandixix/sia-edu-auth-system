@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center px-3" style="min-height: 80vh;">
    
    <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-3">

        <!-- Logo -->
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-circle"
                style="background-color: #0d0d0d; width: 60px; height: 60px;">
                <span class="fw-bold text-white fs-4">S.</span>
            </div>
            <h4 class="mt-3 fw-bold">Siakad</h4>
        </div>

        <!-- Heading -->
        <div class="text-center mb-4">
            <h5 class="fw-bold">Selamat Datang Kembali</h5>
            <p class="text-muted small">Login untuk mengelola akun Akademik Anda.</p>
        </div>

        <x-alert />

        <form method="POST" action="/login" id="loginForm">
            @csrf
            
            <!-- Username -->
            <div class="mb-3">
                <input type="text" name="username" id="username"
                    class="form-control rounded-3 py-3"
                    placeholder="Username / Email" required>
            </div>

            <!-- Password -->
            <div class="mb-3 position-relative">
                <input type="password" name="password" id="password"
                    class="form-control rounded-3 py-3"
                    placeholder="Password" required>

                <!-- Toggle Password -->
                <span onclick="togglePassword()" 
                    style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;">
                    👁️
                </span>
            </div>

            <!-- Loading Button -->
            <button type="submit" id="loginBtn"
                class="btn btn-dark w-100 py-3 rounded-3">
                Sign In
            </button>

            <div class="text-center mt-3">
                <p class="small text-muted mb-1">
                    Lupa password? <a href="#" class="fw-semibold">Klik di sini</a>
                </p>
                <p class="small text-muted">
                    Belum punya akun? <a href="/register" class="fw-bold text-primary">Daftar</a>
                </p>
            </div>
        </form>
    </div>
</div>

<!-- JS Interaktif -->
<script>
    // Toggle password
    function togglePassword() {
        let pass = document.getElementById("password");
        pass.type = pass.type === "password" ? "text" : "password";
    }

    // Loading saat submit
    document.getElementById("loginForm").addEventListener("submit", function () {
        let btn = document.getElementById("loginBtn");
        btn.innerHTML = "Loading...";
        btn.disabled = true;
    });

    // Fokus otomatis ke username
    window.onload = function() {
        document.getElementById("username").focus();
    }
</script>
@endsection