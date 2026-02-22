@extends('layouts.master')

@section('title', 'Destinasi Wisata - Eksplor Balikpapan')

@section('content')
<style>
    /* ── PAGE HEADER ── */
    .page-header-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(59,130,246,0.1);
        border: 1px solid rgba(59,130,246,0.2);
        border-radius: 100px;
        padding: 5px 14px;
        font-size: 0.78rem;
        font-weight: 600;
        color: #2563EB;
        margin-bottom: 1rem;
    }

    /* ── DESTINATION CARDS ── */
    .dest-card {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.12);
        border-radius: 1.4rem;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.34,1.2,0.64,1);
        display: flex;
        flex-direction: column;
    }
    .dest-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 24px 48px rgba(59,130,246,0.14);
        border-color: rgba(59,130,246,0.28);
    }
    .dest-card-img {
        width: 100%; height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .dest-card:hover .dest-card-img { transform: scale(1.04); }
    .dest-card-img-wrap { overflow: hidden; position: relative; }
    .dest-card-img-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(15,30,70,0.4) 0%, transparent 50%);
    }

    .dest-card-body { padding: 1.4rem; flex: 1; display: flex; flex-direction: column; }
    .dest-card-title {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 1.05rem;
        color: #1E3A5F;
        margin-bottom: 0.6rem;
    }
    .dest-card-desc { font-size: 0.84rem; color: #64748B; line-height: 1.65; flex: 1; }
    .dest-card-footer {
        display: flex; align-items: center; justify-content: space-between;
        margin-top: 1rem;
        padding-top: 0.8rem;
        border-top: 1px solid rgba(59,130,246,0.08);
    }
    .rating-badge {
        display: inline-flex; align-items: center; gap: 4px;
        background: #FFFBEB; border: 1px solid #FDE68A;
        color: #92400E; font-size: 0.75rem; font-weight: 600;
        padding: 3px 10px; border-radius: 100px;
    }
    .loc-badge {
        display: inline-flex; align-items: center; gap: 4px;
        background: #EFF6FF; border: 1px solid #BFDBFE;
        color: #1D4ED8; font-size: 0.75rem; font-weight: 600;
        padding: 3px 10px; border-radius: 100px;
    }

    /* ── TIPS CARD ── */
    .tips-card {
        background: rgba(255,255,255,0.75);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.15);
        border-radius: 1.5rem;
        padding: 2rem;
    }
    .tip-item {
        display: flex; align-items: center; gap: 12px;
        background: rgba(59,130,246,0.05);
        border: 1px solid rgba(59,130,246,0.1);
        border-radius: 0.875rem;
        padding: 0.875rem 1rem;
        font-size: 0.85rem;
        color: #334155;
        font-weight: 450;
    }
    .tip-icon {
        width: 36px; height: 36px;
        background: rgba(59,130,246,0.12);
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    /* ── CTA ── */
    .cta-card {
        background: linear-gradient(135deg, #0F2460 0%, #1D4ED8 50%, #0EA5E9 100%);
        border-radius: 1.5rem;
        padding: 2.5rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(96,165,250,0.25);
    }
    .cta-card::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 60% 60% at 85% 5%, rgba(34,211,238,0.2) 0%, transparent 60%);
        pointer-events: none;
    }
    .cta-btn-white {
        background: rgba(255,255,255,0.95); color: #1D4ED8;
        padding: 11px 24px; border-radius: 100px;
        font-weight: 700; font-size: 0.88rem;
        text-decoration: none; display: inline-block;
        transition: all 0.2s;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }
    .cta-btn-white:hover { background:#fff; transform:translateY(-2px); }
    .cta-btn-ghost {
        background: rgba(255,255,255,0.12); color: #fff;
        border: 1px solid rgba(255,255,255,0.25);
        padding: 11px 24px; border-radius: 100px;
        font-weight: 600; font-size: 0.88rem;
        text-decoration: none; display: inline-block;
        backdrop-filter: blur(6px);
        transition: all 0.2s;
    }
    .cta-btn-ghost:hover { background:rgba(255,255,255,0.2); transform:translateY(-2px); }
</style>

<div class="space-y-8">

    <!-- PAGE HEADER -->
    <div class="text-center mb-10">
        <div class="page-header-badge">🗺️ Jelajahi Balikpapan</div>
        <h2 class="text-4xl font-bold text-gray-800 mb-3" style="font-family:'Syne',sans-serif;">Destinasi Wisata Balikpapan</h2>
        <p class="text-gray-500 max-w-xl mx-auto leading-relaxed">Jelajahi tempat-tempat menakjubkan di Kota Minyak dengan pesona alam yang memukau</p>
    </div>

    <!-- CARDS GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

        <div class="dest-card">
            <div class="dest-card-img-wrap">
                <img src="{{ asset('images/destinasi/penangkaran-buaya.jpg') }}" alt="Penangkaran Buaya Teritip" class="dest-card-img">
                <div class="dest-card-img-overlay"></div>
            </div>
            <div class="dest-card-body">
                <div class="dest-card-title">🐊 Penangkaran Buaya Teritip</div>
                <p class="dest-card-desc">Satu-satunya penangkaran buaya resmi di Balikpapan yang menjadi rumah bagi puluhan buaya muara (Crocodylus porosus). Pengunjung dapat melihat dari dekat berbagai ukuran buaya mulai dari anakan hingga buaya raksasa berusia puluhan tahun.</p>
                <div class="dest-card-footer">
                    <span class="rating-badge">⭐ 4.3/5</span>
                    <span class="loc-badge">📍 Teritip</span>
                </div>
            </div>
        </div>

        <div class="dest-card">
            <div class="dest-card-img-wrap">
                <img src="{{ asset('images/destinasi/mangrove.jpg') }}" alt="Hutan Mangrove Margomulyo" class="dest-card-img">
                <div class="dest-card-img-overlay"></div>
            </div>
            <div class="dest-card-body">
                <div class="dest-card-title">🌿 Hutan Mangrove Margomulyo</div>
                <p class="dest-card-desc">Kawasan konservasi mangrove seluas 24 hektar dengan jembatan kayu sepanjang 1,2 km. Spot edukasi flora fauna dan pelestarian lingkungan.</p>
                <div class="dest-card-footer">
                    <span class="rating-badge">⭐ 4.7/5</span>
                    <span class="loc-badge">📍 Margomulyo</span>
                </div>
            </div>
        </div>

        <div class="dest-card">
            <div class="dest-card-img-wrap">
                <img src="{{ asset('images/destinasi/bangkirai.jpg') }}" alt="Bukit Bangkirai" class="dest-card-img">
                <div class="dest-card-img-overlay"></div>
            </div>
            <div class="dest-card-body">
                <div class="dest-card-title">🌳 Bukit Bangkirai</div>
                <p class="dest-card-desc">Taman wisata alam dengan canopy bridge setinggi 30 meter di antara pohon Bangkirai berusia ratusan tahun. Panorama hutan hujan tropis Kalimantan.</p>
                <div class="dest-card-footer">
                    <span class="rating-badge">⭐ 4.8/5</span>
                    <span class="loc-badge" style="background:#F5F3FF;border-color:#DDD6FE;color:#5B21B6;">📍 Samboja</span>
                </div>
            </div>
        </div>

        <div class="dest-card">
            <div class="dest-card-img-wrap">
                <img src="{{ asset('images/destinasi/pantai-melawai.jpg') }}" alt="Pantai Melawai" class="dest-card-img">
                <div class="dest-card-img-overlay"></div>
            </div>
            <div class="dest-card-body">
                <div class="dest-card-title">🌊 Pantai Melawai</div>
                <p class="dest-card-desc">Pantai dengan pasir putih bersih dan ombak tenang, cocok untuk berenang keluarga. Deretan kafe seafood dan spot jogging dengan pemandangan laut.</p>
                <div class="dest-card-footer">
                    <span class="rating-badge">⭐ 4.3/5</span>
                    <span class="loc-badge">📍 Melawai</span>
                </div>
            </div>
        </div>

        <div class="dest-card">
            <div class="dest-card-img-wrap">
                <img src="{{ asset('images/destinasi/ikn.jpg') }}" alt="IKN Nusantara" class="dest-card-img">
                <div class="dest-card-img-overlay"></div>
            </div>
            <div class="dest-card-body">
                <div class="dest-card-title">🏛️ Ibu Kota Nusantara (IKN)</div>
                <p class="dest-card-desc">Proyek strategis nasional Ibu Kota Negara baru Indonesia di Penajam Paser Utara. Menjadi destinasi menarik untuk menyaksikan sejarah bangsa Indonesia yang sedang ditulis — futuristik dan bersejarah sekaligus.</p>
                <div class="dest-card-footer">
                    <span class="rating-badge">⭐ 4.7/5</span>
                    <span class="loc-badge">📍 Penajam Paser Utara</span>
                </div>
            </div>
        </div>

        <div class="dest-card">
            <div class="dest-card-img-wrap">
                <img src="{{ asset('images/destinasi/kebun-raya.jpg') }}" alt="Kebun Raya Balikpapan" class="dest-card-img">
                <div class="dest-card-img-overlay"></div>
            </div>
            <div class="dest-card-body">
                <div class="dest-card-title">🌺 Kebun Raya Balikpapan</div>
                <p class="dest-card-desc">Kebun raya pertama di Kalimantan dengan koleksi ribuan spesies tumbuhan khas. Pusat penelitian, konservasi, dan edukasi flora tropika.</p>
                <div class="dest-card-footer">
                    <span class="rating-badge">⭐ 4.4/5</span>
                    <span class="loc-badge" style="background:#F0FDF4;border-color:#A7F3D0;color:#065F46;">📍 Karang Joang</span>
                </div>
            </div>
        </div>

    </div>

    <!-- TIPS -->
    <div class="tips-card">
        <div class="flex items-center gap-3 mb-5">
            <div style="width:40px;height:40px;background:linear-gradient(135deg,#DBEAFE,#BFDBFE);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;">💡</div>
            <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Tips Berkunjung</h3>
        </div>
        <div class="grid md:grid-cols-2 gap-3">
            <div class="tip-item"><div class="tip-icon">⏰</div><span>Waktu terbaik: Pagi hari atau sore menjelang sunset</span></div>
            <div class="tip-item"><div class="tip-icon">☀️</div><span>Siapkan sunscreen dan topi untuk cuaca tropis</span></div>
            <div class="tip-item"><div class="tip-icon">📸</div><span>Bawa kamera untuk mengabadikan momen indah</span></div>
            <div class="tip-item"><div class="tip-icon">🌱</div><span>Jaga kebersihan dan kelestarian alam sekitar</span></div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-card">
        <h3 class="text-2xl font-bold text-white mb-3 relative z-10" style="font-family:'Syne',sans-serif;">Siap Menjelajahi Balikpapan?</h3>
        <p class="text-blue-100 mb-6 relative z-10" style="font-weight:300;">Temukan lebih banyak pengalaman seru di kota ini</p>
        <div class="flex flex-wrap gap-3 justify-center relative z-10">
            <a href="{{ route('kuliner') }}" class="cta-btn-white">🍜 Lihat Kuliner Khas</a>
            <a href="{{ route('galeri') }}" class="cta-btn-ghost">📸 Jelajahi Galeri</a>
        </div>
    </div>

</div>
@endsection