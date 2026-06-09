@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center px-3" style="min-height: 80vh;">

    <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-3">

        {{-- LOGO --}}
        <div class="text-center mb-4">
            <div
                class="d-inline-flex align-items-center justify-content-center p-3 rounded-circle"
                style="background-color:#0d0d0d; width:60px; height:60px;">

                <span class="fw-bold text-white fs-4">S.</span>

            </div>

            <h4 class="mt-3 fw-bold">SIAKAD</h4>
        </div>

        {{-- JUDUL --}}
        <div class="text-center mb-4">
            <h5 class="fw-bold">Buat Akun Baru</h5>

            <p class="text-muted small">
                Lengkapi data untuk membuat akun.
            </p>
        </div>

        {{-- ALERT SUCCESS / ERROR --}}
        <x-alert />

        {{-- VALIDATION ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        {{-- FORM REGISTER --}}
        <form method="POST" action="{{ url('/register') }}" id="registerForm">

            @csrf

            {{-- USERNAME --}}
            <div class="mb-3">

                <input
                    type="text"
                    name="username"
                    id="username"
                    class="form-control rounded-3 py-3"
                    placeholder="Username"
                    value="{{ old('username') }}"
                    required>

            </div>

            {{-- EMAIL --}}
            <div class="mb-3">

                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control rounded-3 py-3"
                    placeholder="Email Address"
                    value="{{ old('email') }}"
                    required>

            </div>

            {{-- ROLE --}}
            <div class="mb-3">

                <select
                    name="role"
                    class="form-select rounded-3 py-3"
                    required>

                    <option value="">
                        -- Pilih Role --
                    </option>

                    <option value="admin"
                        {{ old('role') == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="guru"
                        {{ old('role') == 'guru' ? 'selected' : '' }}>
                        Guru
                    </option>

                    <option value="siswa"
                        {{ old('role') == 'siswa' ? 'selected' : '' }}>
                        Siswa
                    </option>

                    <option value="orang_tua"
                        {{ old('role') == 'orang_tua' ? 'selected' : '' }}>
                        Orang Tua
                    </option>

                    <option value="kepala_sekolah"
                        {{ old('role') == 'kepala_sekolah' ? 'selected' : '' }}>
                        Kepala Sekolah
                    </option>

                </select>

            </div>

            {{-- PASSWORD --}}
            <div class="mb-3 position-relative">

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control rounded-3 py-3"
                    placeholder="Minimal 8 karakter"
                    required>

                <span
                    onclick="togglePassword()"
                    style="
                        position:absolute;
                        right:15px;
                        top:50%;
                        transform:translateY(-50%);
                        cursor:pointer;
                    ">
                    👁️
                </span>

            </div>

            {{-- KONFIRMASI PASSWORD --}}
            <div class="mb-4">

                <input
                    type="password"
                    id="confirmPassword"
                    class="form-control rounded-3 py-3"
                    placeholder="Ulangi Password"
                    required>

                <small
                    id="passAlert"
                    class="text-danger d-none">

                    Password tidak sama

                </small>

            </div>

            {{-- BUTTON REGISTER --}}
            <button
                type="submit"
                id="registerBtn"
                class="btn btn-dark w-100 py-3 rounded-3">

                Daftar

            </button>

            {{-- LINK LOGIN --}}
            <div class="text-center mt-3">

                <p class="small text-muted">

                    Sudah punya akun?

                    <a href="{{ url('/login') }}"
                        class="fw-bold text-primary">

                        Login

                    </a>

                </p>

            </div>

        </form>

    </div>

</div>

<script>

    /*
    |--------------------------------------------------------------------------
    | Toggle Password
    |--------------------------------------------------------------------------
    */
    function togglePassword()
    {
        let password = document.getElementById('password');

        password.type =
            password.type === 'password'
                ? 'text'
                : 'password';
    }

    /*
    |--------------------------------------------------------------------------
    | Validasi Password
    |--------------------------------------------------------------------------
    */
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const passAlert = document.getElementById('passAlert');

    confirmPassword.addEventListener('keyup', function () {

        if (password.value !== confirmPassword.value) {

            passAlert.classList.remove('d-none');

        } else {

            passAlert.classList.add('d-none');

        }

    });

    /*
    |--------------------------------------------------------------------------
    | Loading Button
    |--------------------------------------------------------------------------
    */
    document
        .getElementById('registerForm')
        .addEventListener('submit', function (e) {

            if (password.value !== confirmPassword.value) {

                e.preventDefault();

                passAlert.classList.remove('d-none');

                return;
            }

            let btn = document.getElementById('registerBtn');

            btn.innerHTML = 'Loading...';

            btn.disabled = true;
        });

    /*
    |--------------------------------------------------------------------------
    | Auto Focus
    |--------------------------------------------------------------------------
    */
    window.onload = function ()
    {
        document.getElementById('username').focus();
    }

</script>

@endsection