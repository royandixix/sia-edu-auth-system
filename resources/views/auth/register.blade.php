@extends('layouts.app')
@section('title', 'Daftar Akun')

@section('content')
<div class="full-page-split row g-0">

    <div class="col-lg-6 d-none d-lg-block position-relative h-100">
        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1400"
             class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">

        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.85), rgba(30, 41, 59, 0.7));">

            <div class="h-100 d-flex flex-column justify-content-between text-white p-5">

                <div>
                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 px-3 py-2 rounded-3 mb-4">
                        <span class="fw-bold me-2 text-warning">★</span>
                        <span class="small fw-semibold text-uppercase text-white-50">Portal Academic</span>
                    </div>
                </div>

                <div>
                    <h1 class="fw-black display-5 mb-3 text-white">
                        Sistem Informasi<br><span class="text-warning">Akademik</span>
                    </h1>
                    <p class="fs-5 text-white-50 mb-5">
                        Kelola data siswa, guru, nilai, absensi dan administrasi sekolah secara modern.
                    </p>
                </div>

            </div>

        </div>
    </div>

    <div class="col-lg-6 bg-white h-100 overflow-y-auto">

        <div class="d-flex justify-content-center align-items-center px-4 h-100 min-vh-100">

            <div style="width:100%;max-width:420px;padding:40px 0;">

                <div class="text-center mb-4">

                    <div class="mb-4">
                        <img src="{{ asset('images/logo/WhatsApp Image 2026-06-18 at 23.31.30.jpeg') }}"
                             style="height:60px;width:auto;">
                    </div>

                    <h2 class="fw-bold">Daftar Akun Baru</h2>
                    <p class="text-secondary">Lengkapi data berikut</p>

                </div>

                <x-alert />

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <div class="mb-3">
                        <label class="small text-secondary">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control py-3" required>
                    </div>

                    <div class="mb-3">
                        <label class="small text-secondary">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control py-3" required>
                    </div>

                    <div class="mb-3">
                        <label class="small text-secondary">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control py-3" required>
                    </div>

                    <div class="mb-3">
                        <label class="small text-secondary">Role</label>
                        <select name="role" id="role" class="form-control py-3" required>
                            <option value="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="kepala_sekolah">Kepala Sekolah</option>
                        </select>
                    </div>

                    <div class="mb-3 d-none" id="nikContainer">
                        <label class="small text-secondary">NIK Guru</label>
                        <input type="text" name="nik" id="nik" class="form-control py-3">
                    </div>

                    <div class="mb-3 d-none" id="nisnContainer">
                        <label class="small text-secondary">NISN Siswa</label>
                        <input type="text" name="nisn" id="nisn" class="form-control py-3">
                    </div>

                    <div class="mb-3">
                        <label class="small text-secondary">Password</label>
                        <input type="password" name="password" class="form-control py-3" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-3" id="registerBtn">
                        Daftar
                    </button>

                    <div class="text-center mt-4">
                        <p class="small text-secondary">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-none">
                                Login
                            </a>
                        </p>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<style>
body{background:#fff;margin:0;font-family:Inter,system-ui,sans-serif;}
.full-page-split{position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;}
.fw-black{font-weight:900;}
.form-control{border:1px solid #e2e8f0;background:#f8fafc;}
.form-control:focus{border-color:#0f172a;box-shadow:0 0 0 4px rgba(15,23,42,.06);}
.btn-dark{background:#0f172a;border:none;}
.btn-dark:hover{background:#1e293b;}
@media (max-width:991px){
.full-page-split{position:relative;height:auto;min-height:100vh;}
}
</style>

<script>
function handleRoleChange(){
    let role = document.getElementById('role').value;

    document.getElementById('nikContainer').classList.add('d-none');
    document.getElementById('nisnContainer').classList.add('d-none');

    if(role === 'guru'){
        document.getElementById('nikContainer').classList.remove('d-none');
    }

    if(role === 'siswa'){
        document.getElementById('nisnContainer').classList.remove('d-none');
    }
}

document.getElementById('role').addEventListener('change', handleRoleChange);
document.addEventListener('DOMContentLoaded', handleRoleChange);

document.getElementById('registerForm').addEventListener('submit', function(){
    document.getElementById('registerBtn').innerHTML = 'Memproses...';
});
</script>

@endsection