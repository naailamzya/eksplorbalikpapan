@extends('layouts.master')

@section('title', 'Home - Eksplor Balikpapan')

@section('content')
<style>
    /* ── HOME STYLES ── */
    .hero-card {
        background: linear-gradient(135deg, #0F2460 0%, #1D4ED8 45%, #0EA5E9 100%);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(96,165,250,0.3);
        border-radius: 1.5rem;
    }
    .hero-card::before {
        content: '';
        position: absolute; inset: 0;
        background:
            radial-gradient(ellipse 60% 60% at 90% 10%, rgba(34,211,238,0.25) 0%, transparent 60%),
            radial-gradient(ellipse 40% 50% at 10% 90%, rgba(167,139,250,0.2) 0%, transparent 60%);
        pointer-events: none;
    }
    .hero-card::after {
        content: '';
        position: absolute;
        width: 320px; height: 320px;
        background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
        top: -80px; right: -80px;
        border-radius: 50%;
    }
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.2);
        backdrop-filter: blur(8px);
        border-radius: 100px;
        padding: 5px 14px;
        font-size: 0.78rem;
        font-weight: 500;
        color: rgba(255,255,255,0.9);
        margin-bottom: 1.25rem;
    }
    .hero-btn-primary {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(255,255,255,0.95);
        color: #1D4ED8;
        padding: 11px 24px;
        border-radius: 100px;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.25s ease;
        text-decoration: none;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }
    .hero-btn-primary:hover {
        background: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(0,0,0,0.25);
    }
    .hero-btn-secondary {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.28);
        color: #fff;
        padding: 11px 24px;
        border-radius: 100px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.25s ease;
        text-decoration: none;
        backdrop-filter: blur(6px);
    }
    .hero-btn-secondary:hover {
        background: rgba(255,255,255,0.2);
        transform: translateY(-2px);
    }

    /* ── FEATURE CARDS ── */
    .feature-card {
        background: rgba(255,255,255,0.75);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.15);
        border-radius: 1.25rem;
        padding: 1.75rem;
        transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
        position: relative;
        overflow: hidden;
    }
    .feature-card::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0;
        transition: opacity 0.3s;
        border-radius: 1.25rem;
    }
    .feature-card.blue::before  { background: linear-gradient(135deg, rgba(59,130,246,0.06), rgba(34,211,238,0.04)); }
    .feature-card.green::before { background: linear-gradient(135deg, rgba(16,185,129,0.06), rgba(5,150,105,0.04)); }
    .feature-card.purple::before{ background: linear-gradient(135deg, rgba(139,92,246,0.06), rgba(167,139,250,0.04)); }
    .feature-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(59,130,246,0.12); }
    .feature-card:hover::before { opacity: 1; }

    .feature-icon {
        width: 52px; height: 52px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        flex-shrink: 0;
    }
    .feature-icon.blue   { background: linear-gradient(135deg, #DBEAFE, #BFDBFE); }
    .feature-icon.green  { background: linear-gradient(135deg, #D1FAE5, #A7F3D0); }
    .feature-icon.purple { background: linear-gradient(135deg, #EDE9FE, #DDD6FE); }

    .feature-btn {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 8px 18px;
        border-radius: 100px;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        margin-top: 1rem;
    }
    .feature-btn.blue   { background: #EFF6FF; color: #2563EB; }
    .feature-btn.blue:hover   { background: #DBEAFE; transform: translateX(3px); }
    .feature-btn.green  { background: #F0FDF4; color: #059669; }
    .feature-btn.green:hover  { background: #D1FAE5; transform: translateX(3px); }
    .feature-btn.purple { background: #F5F3FF; color: #7C3AED; }
    .feature-btn.purple:hover { background: #EDE9FE; transform: translateX(3px); }

    /* ── ABOUT CARD ── */
    .about-card {
        background: rgba(255,255,255,0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.12);
        border-radius: 1.5rem;
        padding: 2.5rem;
    }
    .about-fact-box {
        background: linear-gradient(135deg, #EFF6FF 0%, #F0FDF4 100%);
        border: 1px solid rgba(59,130,246,0.15);
        border-radius: 1.25rem;
        padding: 2rem;
        text-align: center;
    }

    /* ── STAT CARDS ── */
    .stat-card {
        border-radius: 1.25rem;
        padding: 1.5rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.3);
    }
    .stat-card::after {
        content: '';
        position: absolute;
        width: 80px; height: 80px;
        border-radius: 50%;
        background: rgba(255,255,255,0.1);
        bottom: -20px; right: -20px;
    }
    .stat-card.s1 { background: linear-gradient(135deg, #1D4ED8, #3B82F6); box-shadow: 0 8px 24px rgba(59,130,246,0.35); }
    .stat-card.s2 { background: linear-gradient(135deg, #047857, #10B981); box-shadow: 0 8px 24px rgba(16,185,129,0.35); }
    .stat-card.s3 { background: linear-gradient(135deg, #B45309, #F59E0B); box-shadow: 0 8px 24px rgba(245,158,11,0.35); }
    .stat-card.s4 { background: linear-gradient(135deg, #B91C1C, #EF4444); box-shadow: 0 8px 24px rgba(239,68,68,0.35); }
    .stat-val { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 4px; }
    .stat-lbl { font-size: 0.75rem; color: rgba(255,255,255,0.75); font-weight: 500; letter-spacing: 0.03em; }
</style>

<div class="space-y-8">

    <!-- HERO -->
    <div class="hero-card shadow-2xl p-8 md:p-14 text-center relative z-10">
        <div class="hero-badge">
            <div class="live-dot" style="width:6px;height:6px;"></div>
            Kota Beriman · Kalimantan Timur
        </div>
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight" style="font-family:'Syne',sans-serif;">
            Selamat Datang<br>di Balikpapan! 🌿
        </h2>
        <p class="text-lg text-blue-100 mb-3" style="font-weight:300;">Kota Minyak yang Penuh Pesona Alam</p>
        <p class="text-base leading-relaxed max-w-2xl mx-auto text-blue-100 mb-8" style="font-weight:300;">
            Balikpapan adalah kota terbesar di Kalimantan Timur yang dikenal sebagai "Kota Minyak" dan "Kota Beriman". 
            Terletak di pesisir timur Pulau Kalimantan, menawarkan perpaduan unik antara kehidupan urban modern 
            dan keindahan alam tropis yang memukau.
        </p>
        <div class="flex flex-wrap gap-3 justify-center relative z-10">
            <a href="{{ route('destinasi') }}" class="hero-btn-primary">🗺️ Jelajahi Destinasi</a>
            <a href="{{ route('galeri') }}" class="hero-btn-secondary">📸 Lihat Galeri</a>
        </div>
    </div>

    <!-- FEATURE CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="feature-card blue">
            <div class="feature-icon blue">🏖️</div>
            <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-family:'Syne',sans-serif;">Destinasi Wisata</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Jelajahi pantai-pantai indah, hutan mangrove, dan spot sunset terbaik di Balikpapan.</p>
            <a href="{{ route('destinasi') }}" class="feature-btn blue">Lihat Destinasi →</a>
        </div>
        <div class="feature-card green">
            <div class="feature-icon green">🍜</div>
            <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-family:'Syne',sans-serif;">Kuliner Khas</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Nikmati kelezatan makanan khas Balikpapan yang menggugah selera dan kaya rempah.</p>
            <a href="{{ route('kuliner') }}" class="feature-btn green">Cicipi Kuliner →</a>
        </div>
        <div class="feature-card purple">
            <div class="feature-icon purple">📸</div>
            <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-family:'Syne',sans-serif;">Galeri Foto</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Lihat koleksi foto-foto menakjubkan dari berbagai sudut kota Balikpapan.</p>
            <a href="{{ route('galeri') }}" class="feature-btn purple">Buka Galeri →</a>
        </div>
    </div>

    <!-- ABOUT -->
    <div class="about-card">
        <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center" style="font-family:'Syne',sans-serif;">🌴 Mengenal Balikpapan</h3>
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div class="space-y-4 text-gray-600 leading-relaxed text-[15px]">
                <p>Balikpapan memiliki sejarah panjang sebagai pusat perdagangan dan industri. Nama "Balikpapan" berasal dari legenda lokal tentang 10 papan yang kembali ke pantai setelah terpisah dari kapal.</p>
                <p>Saat ini, Balikpapan telah berkembang menjadi kota modern dengan infrastruktur yang baik dan berbagai fasilitas wisata menarik. Kota ini juga menjadi gerbang menuju Ibu Kota Negara (IKN) Nusantara yang baru.</p>
                <p>Dengan julukan "Kota Beriman", Balikpapan menawarkan keramahan masyarakatnya serta pesona alam yang masih alami.</p>
            </div>
            <div class="about-fact-box">
                <div class="text-5xl mb-4">🏙️</div>
                <h4 class="text-xl font-bold text-gray-800 mb-2" style="font-family:'Syne',sans-serif;">Fakta Cepat</h4>
                <p class="text-gray-500 text-sm">Kota metropolitan dengan hati hijau — gateway menuju IKN Nusantara</p>
                <div class="mt-4 flex gap-2 justify-center flex-wrap">
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">#KotaMinyak</span>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">#KotaBeriman</span>
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">#GatewayIKN</span>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="stat-card s1">
            <div class="stat-val">688.3</div>
            <div style="font-size:0.6rem;color:rgba(255,255,255,0.6);margin-bottom:2px;">km²</div>
            <div class="stat-lbl">Luas Wilayah</div>
        </div>
        <div class="stat-card s2">
            <div class="stat-val">700K+</div>
            <div class="stat-lbl">Penduduk</div>
        </div>
        <div class="stat-card s3">
            <div class="stat-val">6</div>
            <div class="stat-lbl">Kecamatan</div>
        </div>
        <div class="stat-card s4">
            <div class="stat-val">27°C</div>
            <div class="stat-lbl">Suhu Rata-rata</div>
        </div>
    </div>

</div>
@endsection