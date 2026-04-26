<div class="topbar">
    <div class="d-flex align-items-center gap-2">
        <span class="page-title">@yield('page-title', 'Dashboard')</span>
        <span style="color:#CBD0E0; margin: 0 4px">/</span>
        <span style="font-size:12px; color:var(--muted)">@yield('page-sub', 'Ringkasan')</span>
    </div>

    <div class="d-flex align-items-center gap-2">
        <div class="date-chip">{{ now()->translatedFormat('l, d M Y') }}</div>

        <div class="topbar-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
            <span class="notif-dot"></span>
        </div>

        <a href="{{ route('logout') }}" class="topbar-btn" title="Logout">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
        </a>
    </div>
</div>