<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website pariwisata Balikpapan - destinasi, kuliner, dan galeri kota minyak Kalimantan Timur">
    <title>@yield('title', 'Eksplor Balikpapan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F0F6FF;
            background-image:
                radial-gradient(ellipse 80% 40% at 50% -20%, rgba(59,130,246,0.13) 0%, transparent 70%),
                radial-gradient(ellipse 60% 30% at 80% 110%, rgba(34,211,238,0.08) 0%, transparent 60%);
            min-height: 100vh;
        }

        h1, h2, h3, h4 { font-family: 'Syne', sans-serif; }

        /* ── HEADER ── */
        .site-header {
            background: rgba(10, 20, 50, 0.94);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(96,165,250,0.18);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo-text {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.45rem;
            background: linear-gradient(135deg, #60A5FA 0%, #22D3EE 55%, #A78BFA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.4px;
        }

        .logo-sub {
            font-size: 0.68rem;
            color: rgba(148,163,184,0.75);
            font-weight: 300;
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }

        /* ── LIVE DOT ── */
        .live-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: #22D3EE;
            box-shadow: 0 0 0 0 rgba(34,211,238,0.6);
            animation: pulse-dot 2s ease-in-out infinite;
            flex-shrink: 0;
        }
        @keyframes pulse-dot {
            0%,100% { box-shadow: 0 0 0 0 rgba(34,211,238,0.5); }
            50%      { box-shadow: 0 0 0 5px rgba(34,211,238,0); }
        }

        /* ── NAV PILLS ── */
        .nav-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 100px;
            font-size: 0.84rem;
            font-weight: 500;
            color: rgba(191,219,254,0.72);
            transition: all 0.25s cubic-bezier(0.34,1.56,0.64,1);
            border: 1px solid transparent;
            text-decoration: none;
            white-space: nowrap;
        }
        .nav-pill:hover {
            color: #fff;
            background: rgba(59,130,246,0.18);
            border-color: rgba(96,165,250,0.32);
            transform: translateY(-2px) scale(1.03);
        }
        .nav-pill.active {
            color: #fff;
            background: linear-gradient(135deg, rgba(59,130,246,0.48) 0%, rgba(34,211,238,0.28) 100%);
            border-color: rgba(96,165,250,0.48);
            box-shadow: 0 0 16px rgba(59,130,246,0.32), inset 0 0 12px rgba(34,211,238,0.08);
        }

        /* ── MAIN FADE IN ── */
        main { animation: fadeUp 0.45s ease both; }
        @keyframes fadeUp {
            from { opacity:0; transform:translateY(16px); }
            to   { opacity:1; transform:translateY(0); }
        }

        /* ── FOOTER ── */
        .site-footer {
            background: rgba(8,16,40,0.97);
            border-top: 1px solid rgba(59,130,246,0.13);
        }
        .footer-logo {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            background: linear-gradient(135deg,#60A5FA,#22D3EE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0A1428; }
        ::-webkit-scrollbar-thumb { background: #3B82F6; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #60A5FA; }

        /* ── MOBILE NAV ── */
        @media (max-width: 640px) {
            #nav-menu { display: none; flex-direction: column; padding: 6px 0; }
            #nav-menu.open { display: flex; }
            .hamburger { display: flex; }
        }
        .hamburger {
            display: none; flex-direction: column; gap: 4px;
            cursor: pointer; padding: 6px; background: none; border: none;
        }
        .hamburger span {
            display: block; width: 22px; height: 2px;
            background: rgba(191,219,254,0.8); border-radius: 2px; transition: 0.3s;
        }

        /* ── NOISE TEXTURE ── */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            background-size: 150px; pointer-events: none; z-index: 0; opacity: 0.35;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="site-header">
        <div class="container mx-auto px-5 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="relative">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center text-lg shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                            🌿
                        </div>
                        <div class="live-dot absolute -top-0.5 -right-0.5"></div>
                    </div>
                    <div>
                        <div class="logo-text">Eksplor Balikpapan</div>
                        <div class="logo-sub">Kota Minyak · Kalimantan Timur</div>
                    </div>
                </a>
                <!-- Hamburger -->
                <button class="hamburger" onclick="document.getElementById('nav-menu').classList.toggle('open')" aria-label="Toggle menu">
                    <span></span><span></span><span></span>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="mt-3" aria-label="Main navigation">
                <ul id="nav-menu" class="flex flex-wrap gap-1.5 justify-center sm:justify-start">
                    <li><a href="{{ route('home') }}" class="nav-pill {{ request()->routeIs('home') ? 'active' : '' }}">🏠 Home</a></li>
                    <li><a href="{{ route('destinasi') }}" class="nav-pill {{ request()->routeIs('destinasi') ? 'active' : '' }}">🗺️ Destinasi</a></li>
                    <li><a href="{{ route('kuliner') }}" class="nav-pill {{ request()->routeIs('kuliner') ? 'active' : '' }}">🍛 Kuliner</a></li>
                    <li><a href="{{ route('galeri') }}" class="nav-pill {{ request()->routeIs('galeri') ? 'active' : '' }}">🖼️ Galeri</a></li>
                    <li><a href="{{ route('kontak') }}" class="nav-pill {{ request()->routeIs('kontak') ? 'active' : '' }}">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-10 min-h-screen relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer py-8 mt-12 relative z-10">
        <div class="container mx-auto px-5">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-xl">🌿</span>
                    <span class="footer-logo text-lg">Eksplor Balikpapan</span>
                </div>
                <p class="text-slate-500 text-sm text-center">
                    &copy; {{ date('Y') }} Eksplor Balikpapan · Made with 💙 for Kota Minyak
                </p>
                <div class="flex gap-3">
                    <span class="w-8 h-8 rounded-full bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-sm hover:bg-blue-500/20 transition cursor-pointer">📸</span>
                    <span class="w-8 h-8 rounded-full bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-sm hover:bg-cyan-500/20 transition cursor-pointer">🐦</span>
                    <span class="w-8 h-8 rounded-full bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-sm hover:bg-indigo-500/20 transition cursor-pointer">💬</span>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-800 flex flex-wrap gap-x-6 gap-y-1 justify-center">
                <a href="{{ route('home') }}" class="text-slate-500 hover:text-blue-400 text-xs transition">Home</a>
                <a href="{{ route('destinasi') }}" class="text-slate-500 hover:text-blue-400 text-xs transition">Destinasi</a>
                <a href="{{ route('kuliner') }}" class="text-slate-500 hover:text-blue-400 text-xs transition">Kuliner</a>
                <a href="{{ route('galeri') }}" class="text-slate-500 hover:text-blue-400 text-xs transition">Galeri</a>
                <a href="{{ route('kontak') }}" class="text-slate-500 hover:text-blue-400 text-xs transition">Kontak</a>
            </div>
        </div>
    </footer>
</body>
</html>