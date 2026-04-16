@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center px-3" style="min-height: 80vh;">

        <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-3">

            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-circle"
                    style="background-color: #0d0d0d; width: 60px; height: 60px;">
                    <span class="fw-bold text-white fs-4">S.</span>
                </div>
                <h4 class="mt-3 fw-bold">Siakad</h4>
            </div>

            <div class="text-center mb-4">
                <h5 class="fw-bold">Buat Akun Baru</h5>
                <p class="text-muted small">Lengkapi data untuk mendaftar.</p>
            </div>

            <x-alert />

            <form method="POST" action="/register" id="registerForm">
                @csrf

                <div class="mb-3">
                    <input type="text" name="username" id="username" class="form-control rounded-3 py-3"
                        placeholder="Username" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" id="email" class="form-control rounded-3 py-3"
                        placeholder="Email Address" required>
                </div>

                <div class="mb-3 position-relative">
                    <input type="password" name="password" id="password" class="form-control rounded-3 py-3"
                        placeholder="Minimal 8 karakter" required>

                    <span onclick="togglePassword()"
                        style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;">
                        👁️
                    </span>
                </div>

                <div class="mb-4">
                    <input type="password" id="confirmPassword" class="form-control rounded-3 py-3"
                        placeholder="Ulangi Password" required>
                    <small id="passAlert" class="text-danger d-none">Password tidak sama</small>
                </div>

                <button type="submit" id="registerBtn" class="btn btn-dark w-100 py-3 rounded-3">
                    Daftar
                </button>

                <div class="text-center mt-3">
                    <p class="small text-muted">
                        Sudah punya akun?
                        <a href="/login" class="fw-bold text-primary">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            let pass = document.getElementById("password");
            pass.type = pass.type === "password" ? "text" : "password";
        }

        const pass = document.getElementById("password");
        const confirmPass = document.getElementById("confirmPassword");
        const alertText = document.getElementById("passAlert");

        confirmPass.addEventListener("keyup", function() {
            if (pass.value !== confirmPass.value) {
                alertText.classList.remove("d-none");
            } else {
                alertText.classList.add("d-none");
            }
        });

        document.getElementById("registerForm").addEventListener("submit", function(e) {
            if (pass.value !== confirmPass.value) {
                e.preventDefault();
                alertText.classList.remove("d-none");
                return;
            }
            let btn = document.getElementById("registerBtn");
            btn.innerHTML = "Loading...";
            btn.disabled = true;
        });

        window.onload = function() {
            document.getElementById("username").focus();
        }
    </script>
@endsection
