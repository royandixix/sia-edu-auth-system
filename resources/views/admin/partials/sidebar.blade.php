<div class="sidebar">

    {{-- LOGO --}}
    <div class="logo-area">
        <div class="logo-pill">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
            </div>
            <div>
                <div class="logo-text">SIAKAD</div>
                <div class="logo-sub">Admin Panel</div>
            </div>
        </div>
    </div>

    {{-- NAVIGASI --}}
    <div class="nav-section">
        <div class="nav-label">Menu Utama</div>

        <a href="{{ route('dashboard') }}"
           class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <div class="ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
            </div>
            Dashboard
        </a>

        <a href="#"
           class="nav-item {{ request()->is('siswa*') ? 'active' : '' }}">
            <div class="ico">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            Data Siswa
        </a>

        <a href="#"
           class="nav-item {{ request()->is('guru*') ? 'active' : '' }}">
            <div class="ico">
                <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            Data Guru
        </a>

        <a href="#"
           class="nav-item {{ request()->is('jadwal*') ? 'active' : '' }}">
            <div class="ico">
                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            Jadwal
        </a>

        <a href="#"
           class="nav-item {{ request()->is('nilai*') ? 'active' : '' }}">
            <div class="ico">
                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            Nilai
        </a>

        <a href="#"
           class="nav-item {{ request()->is('absensi*') ? 'active' : '' }}">
            <div class="ico">
                <svg viewBox="0 0 24 24"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            </div>
            Absensi
        </a>

        <div class="nav-label" style="margin-top: 16px">Pengaturan</div>

        <a href="#"
           class="nav-item {{ request()->is('settings*') ? 'active' : '' }}">
            <div class="ico">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
            </div>
            Pengaturan
        </a>
    </div>

    {{-- USER --}}
    <div class="sidebar-footer">
        <div class="user-card">
            <div class="avatar">{{ strtoupper(substr(session('username', 'AD'), 0, 2)) }}</div>
            <div>
                <div class="user-name">{{ session('username') ?? 'Administrator' }}</div>
                <div class="user-role">Super Admin</div>
            </div>
        </div>
    </div>
</div>