<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIAKAD — Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-w: 240px;
            --font: 'Plus Jakarta Sans', sans-serif;
            --bg: #F7F8FA;
            --white: #FFFFFF;
            --primary: #6366F1;
            --primary-light: #EEF0FF;
            --text: #1A1D2E;
            --muted: #7B7F95;
            --border: #E8EAF0;
            --radius: 14px;
            --radius-sm: 10px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text);
            margin: 0;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: var(--sidebar-w);
            position: fixed;
            top: 0; left: 0;
            height: 100vh;
            background: var(--white);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            overflow: hidden;
        }
        .sidebar::before {
            content: '';
            position: absolute;
            top: -40px; right: -60px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, rgba(99,102,241,.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .logo-area {
            padding: 22px 20px 16px;
            border-bottom: 1px solid var(--border);
        }
        .logo-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary-light);
            padding: 8px 14px;
            border-radius: 10px;
        }
        .logo-icon {
            width: 30px; height: 30px;
            background: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo-icon svg { width: 16px; height: 16px; fill: none; stroke: #fff; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .logo-text { font-weight: 700; font-size: 14px; color: var(--primary); }
        .logo-sub  { font-size: 10px; color: var(--muted); margin-top: 1px; }

        .nav-section { padding: 16px 12px 0; flex: 1; overflow-y: auto; }
        .nav-label {
            font-size: 10px; font-weight: 600; color: var(--muted);
            letter-spacing: .8px; text-transform: uppercase;
            padding: 0 8px; margin-bottom: 6px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 12px; border-radius: var(--radius-sm);
            color: var(--muted); font-size: 13px; font-weight: 500;
            text-decoration: none; transition: all .18s; margin-bottom: 2px;
        }
        .nav-item:hover { background: #F3F4F8; color: var(--text); }
        .nav-item.active { background: var(--primary-light); color: var(--primary); }
        .nav-item .ico {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            transition: background .18s; flex-shrink: 0;
        }
        .nav-item.active .ico { background: var(--primary); }
        .nav-item:hover:not(.active) .ico { background: #E8EAF0; }
        .nav-item .ico svg {
            width: 15px; height: 15px; fill: none;
            stroke: var(--muted); stroke-width: 1.8;
            stroke-linecap: round; stroke-linejoin: round; transition: stroke .18s;
        }
        .nav-item.active .ico svg { stroke: #fff; }

        .sidebar-footer {
            padding: 14px 12px;
            border-top: 1px solid var(--border);
        }
        .user-card {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 10px; border-radius: var(--radius-sm);
            cursor: pointer; transition: background .18s;
        }
        .user-card:hover { background: var(--bg); }
        .avatar {
            width: 34px; height: 34px; border-radius: 9px;
            background: linear-gradient(135deg, #818CF8, #6366F1);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: 12px; flex-shrink: 0;
        }
        .user-name { font-size: 12px; font-weight: 600; color: var(--text); }
        .user-role { font-size: 10px; color: var(--muted); }

        /* ── MAIN ── */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── TOPBAR ── */
        .topbar {
            height: 60px; background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center;
            justify-content: space-between;
            padding: 0 28px; position: sticky; top: 0; z-index: 100;
        }
        .page-title { font-size: 15px; font-weight: 700; }
        .topbar-btn {
            width: 36px; height: 36px; border-radius: 9px;
            border: 1px solid var(--border); background: var(--white);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: background .15s; position: relative;
        }
        .topbar-btn:hover { background: var(--bg); }
        .topbar-btn svg { width: 16px; height: 16px; fill: none; stroke: var(--muted); stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
        .notif-dot {
            position: absolute; top: 7px; right: 7px;
            width: 6px; height: 6px; background: #EF4444;
            border-radius: 50%; border: 1.5px solid #fff;
        }
        .date-chip {
            background: var(--primary-light); color: var(--primary);
            font-size: 11px; font-weight: 600;
            padding: 5px 12px; border-radius: 20px;
        }

        /* ── CONTENT AREA ── */
        .content-area {
            flex: 1;
            padding: 24px 28px;
        }
    </style>

    @stack('styles')
</head>

<body>

{{-- SIDEBAR --}}
@include('admin.partials.sidebar')

<div class="main-wrapper">
    {{-- NAVBAR --}}
    @include('admin.partials.navbar')

    {{-- KONTEN HALAMAN --}}
    <div class="content-area">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('admin.partials.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>