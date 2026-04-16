<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top py-3" style="border-bottom: 1px solid #f0f0f0; backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.8) !important;">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="/" style="letter-spacing: -1px; font-size: 1.4rem;">
            Siakad<span class="text-primary">.</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                @if(session('user'))
                    <li class="nav-item">
                        <a href="/logout" class="btn btn-danger px-4 py-2"
                           style="border-radius: 10px; font-size: 0.9rem; font-weight: 500;">
                            Logout
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-secondary small me-lg-3" href="/register">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="btn btn-dark px-4 py-2"
                           style="border-radius: 10px; font-size: 0.9rem; font-weight: 500;">
                            Masuk
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
<style>
    /* Tambahan agar konsisten dengan gaya form yang tadi */
    .btn-interactive {
        transition: transform 0.2s ease, background-color 0.2s ease;
    }
    .btn-interactive:active {
        transform: scale(0.95);
    }
    .nav-link {
        transition: color 0.2s ease;
    }
    .nav-link:hover {
        color: #000 !important;
    }
</style>