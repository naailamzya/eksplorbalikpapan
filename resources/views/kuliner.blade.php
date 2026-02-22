@extends('layouts.master')

@section('title', 'Kuliner Khas - Eksplor Balikpapan')

@section('content')
<style>
    .page-header-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(245,158,11,0.1);
        border: 1px solid rgba(245,158,11,0.25);
        border-radius: 100px; padding: 5px 14px;
        font-size: 0.78rem; font-weight: 600; color: #B45309;
        margin-bottom: 1rem;
    }

    /* ── KULINER CARD ── */
    .kuliner-card {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.1);
        border-radius: 1.4rem;
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.34,1.2,0.64,1);
        display: flex; flex-direction: column;
    }
    .kuliner-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 24px 48px rgba(245,158,11,0.12);
        border-color: rgba(245,158,11,0.2);
    }
    .kuliner-card-img-wrap { overflow: hidden; position: relative; }
    .kuliner-card-img-wrap img {
        width: 100%; height: 200px; object-fit: cover;
        transition: transform 0.55s ease; display: block;
    }
    .kuliner-card:hover .kuliner-card-img-wrap img { transform: scale(1.05); }
    .kuliner-card-img-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(30,10,0,0.35) 0%, transparent 50%);
    }

    .kuliner-card-body { padding: 1.4rem; flex: 1; display: flex; flex-direction: column; }
    .kuliner-card-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem; color: #1E3A5F; margin-bottom: 0.6rem; }
    .kuliner-card-desc { font-size: 0.84rem; color: #64748B; line-height: 1.65; flex: 1; }
    .kuliner-card-footer {
        display: flex; align-items: center; justify-content: space-between;
        margin-top: 1rem; padding-top: 0.8rem;
        border-top: 1px solid rgba(245,158,11,0.1);
    }
    .rating-badge {
        display: inline-flex; align-items: center; gap: 4px;
        background: #FFFBEB; border: 1px solid #FDE68A;
        color: #92400E; font-size: 0.75rem; font-weight: 600;
        padding: 3px 10px; border-radius: 100px;
    }
    .price-badge {
        display: inline-flex; align-items: center; gap: 4px;
        background: #F0FDF4; border: 1px solid #A7F3D0;
        color: #065F46; font-size: 0.75rem; font-weight: 600;
        padding: 3px 10px; border-radius: 100px;
    }
    .price-badge.red  { background:#FFF1F2; border-color:#FECDD3; color:#9F1239; }
    .price-badge.blue { background:#EFF6FF; border-color:#BFDBFE; color:#1D4ED8; }
    .price-badge.purple { background:#F5F3FF; border-color:#DDD6FE; color:#5B21B6; }
    .price-badge.orange { background:#FFF7ED; border-color:#FED7AA; color:#9A3412; }

    /* ── TEMPAT MAKAN ── */
    .tempat-section {
        background: rgba(255,255,255,0.78);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(245,158,11,0.15);
        border-radius: 1.5rem; padding: 2rem;
    }
    .tempat-card {
        background: #FFFBEB;
        border: 1px solid rgba(245,158,11,0.18);
        border-radius: 1rem; padding: 1.25rem;
        transition: all 0.25s ease;
    }
    .tempat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(245,158,11,0.12);
        border-color: rgba(245,158,11,0.3);
    }
    .tempat-card-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 0.95rem; color: #1E3A5F; margin-bottom: 6px; }
    .tempat-card-desc  { font-size: 0.82rem; color: #64748B; line-height: 1.55; }
    .tempat-card-meta  { display: flex; align-items: center; gap: 8px; margin-top: 8px; font-size: 0.75rem; color: #B45309; font-weight: 600; }

    /* ── HARGA TABLE ── */
    .harga-section {
        background: rgba(255,255,255,0.78);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(16,185,129,0.15);
        border-radius: 1.5rem; padding: 2rem;
    }
    .harga-item {
        display: flex; align-items: center; justify-content: space-between;
        background: linear-gradient(135deg, #F0FDF4, #ECFDF5);
        border: 1px solid rgba(16,185,129,0.15);
        border-radius: 0.875rem; padding: 0.875rem 1.1rem;
        transition: all 0.2s;
    }
    .harga-item:hover { transform: translateX(4px); border-color: rgba(16,185,129,0.3); }
    .harga-name { font-size: 0.85rem; font-weight: 600; color: #1E3A5F; }
    .harga-price { font-size: 0.82rem; font-weight: 700; color: #065F46; font-family:'Syne',sans-serif; }

    /* ── CTA ── */
    .cta-kuliner {
        background: linear-gradient(135deg, #78350F 0%, #B45309 45%, #D97706 100%);
        border-radius: 1.5rem; padding: 2.5rem; text-align: center;
        position: relative; overflow: hidden;
        border: 1px solid rgba(245,158,11,0.3);
    }
    .cta-kuliner::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 55% 55% at 85% 5%, rgba(255,200,50,0.18) 0%, transparent 60%);
        pointer-events: none;
    }
    .cta-btn-white {
        background: rgba(255,255,255,0.95); color: #B45309;
        padding: 11px 24px; border-radius: 100px;
        font-weight: 700; font-size: 0.88rem;
        text-decoration: none; display: inline-block;
        transition: all 0.2s; box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    }
    .cta-btn-white:hover { background: #fff; transform: translateY(-2px); }
    .cta-btn-ghost {
        background: rgba(255,255,255,0.12); color: #fff;
        border: 1px solid rgba(255,255,255,0.25);
        padding: 11px 24px; border-radius: 100px;
        font-weight: 600; font-size: 0.88rem;
        text-decoration: none; display: inline-block;
        backdrop-filter: blur(6px); transition: all 0.2s;
    }
    .cta-btn-ghost:hover { background: rgba(255,255,255,0.2); transform: translateY(-2px); }
</style>

<div class="space-y-8">

    <!-- HEADER -->
    <div class="text-center mb-10">
        <div class="page-header-badge">🍜 Cita Rasa Autentik</div>
        <h2 class="text-4xl font-bold text-gray-800 mb-3" style="font-family:'Syne',sans-serif;">Kuliner Khas Balikpapan</h2>
        <p class="text-gray-500 max-w-xl mx-auto leading-relaxed">Nikmati cita rasa autentik Kota Minyak yang menggugah selera</p>
    </div>

    <!-- KULINER CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

        <div class="kuliner-card">
            <div class="kuliner-card-img-wrap">
                <img src="{{ asset('images/kuliner/soto-banjar.jpg') }}" alt="Soto Banjar">
                <div class="kuliner-card-img-overlay"></div>
            </div>
            <div class="kuliner-card-body">
                <div class="kuliner-card-title">🍲 Soto Banjar</div>
                <p class="kuliner-card-desc">Soto khas Kalimantan Selatan yang populer di Balikpapan dengan kuah bening gurih beraroma kayu manis dan kapulaga. Disajikan dengan ayam kampung empuk, perkedel, telur rebus, dan ketupat.</p>
                <div class="kuliner-card-footer">
                    <span class="rating-badge">⭐ 4.6/5</span>
                    <span class="price-badge">💰 Rp 15–25K</span>
                </div>
            </div>
        </div>

        <div class="kuliner-card">
            <div class="kuliner-card-img-wrap">
                <img src="{{ asset('images/kuliner/kepiting-soka.jpg') }}" alt="Kepiting Soka">
                <div class="kuliner-card-img-overlay"></div>
            </div>
            <div class="kuliner-card-body">
                <div class="kuliner-card-title">🦀 Kepiting Soka</div>
                <p class="kuliner-card-desc">Kepiting rajungan dengan kulit lunak yang bisa dimakan seluruhnya. Digoreng garing dengan bumbu tepung atau saus padang pedas gurih. Sensasi renyah di luar lembut di dalam.</p>
                <div class="kuliner-card-footer">
                    <span class="rating-badge">⭐ 4.8/5</span>
                    <span class="price-badge red">💰 Rp 80–150K</span>
                </div>
            </div>
        </div>

        <div class="kuliner-card">
            <div class="kuliner-card-img-wrap">
                <img src="{{ asset('images/kuliner/nasi-kuning.jpg') }}" alt="Nasi Kuning">
                <div class="kuliner-card-img-overlay"></div>
            </div>
            <div class="kuliner-card-body">
                <div class="kuliner-card-title">🍚 Nasi Kuning Khas</div>
                <p class="kuliner-card-desc">Nasi kuning dimasak dengan santan kental, kunyit, dan rempah pilihan. Dilengkapi ayam goreng kuning, telur balado, serundeng, perkedel, dan kerupuk dalam porsi besar.</p>
                <div class="kuliner-card-footer">
                    <span class="rating-badge">⭐ 4.5/5</span>
                    <span class="price-badge blue">💰 Rp 20–35K</span>
                </div>
            </div>
        </div>

        <div class="kuliner-card">
            <div class="kuliner-card-img-wrap">
                <img src="{{ asset('images/kuliner/amplang.jpg') }}" alt="Amplang">
                <div class="kuliner-card-img-overlay"></div>
            </div>
            <div class="kuliner-card-body">
                <div class="kuliner-card-title">🐟 Amplang</div>
                <p class="kuliner-card-desc">Kerupuk khas dari ikan tenggiri dengan tekstur krispi dan rasa gurih. Oleh-oleh wajib Balikpapan yang tersedia dalam berbagai ukuran dan bentuk.</p>
                <div class="kuliner-card-footer">
                    <span class="rating-badge">⭐ 4.7/5</span>
                    <span class="price-badge purple">💰 Rp 25–60K</span>
                </div>
            </div>
        </div>

        <div class="kuliner-card">
            <div class="kuliner-card-img-wrap">
                <img src="{{ asset('images/kuliner/lawa-ayam.jpg') }}" alt="Lawa Ayam">
                <div class="kuliner-card-img-overlay"></div>
            </div>
            <div class="kuliner-card-body">
                <div class="kuliner-card-title">🍗 Lawa Ayam</div>
                <p class="kuliner-card-desc">Gulai tradisional Dayak dengan darah ayam sebagai pengental kuah. Rasa gurih pedas khas dengan rempah lengkuas, serai, dan daun jeruk.</p>
                <div class="kuliner-card-footer">
                    <span class="rating-badge">⭐ 4.4/5</span>
                    <span class="price-badge orange">💰 Rp 25–40K</span>
                </div>
            </div>
        </div>

        <div class="kuliner-card">
            <div class="kuliner-card-img-wrap">
                <img src="{{ asset('images/kuliner/gangan-patin.jpg') }}" alt="Gangan Ikan Patin">
                <div class="kuliner-card-img-overlay"></div>
            </div>
            <div class="kuliner-card-body">
                <div class="kuliner-card-title">🐠 Gangan Ikan Patin</div>
                <p class="kuliner-card-desc">Sup ikan patin dengan kuah kuning asam pedas menyegarkan. Dimasak dengan belimbing wuluh, kunyit, lengkuas, dan daun kemangi.</p>
                <div class="kuliner-card-footer">
                    <span class="rating-badge">⭐ 4.6/5</span>
                    <span class="price-badge">💰 Rp 35–60K</span>
                </div>
            </div>
        </div>

    </div>

    <!-- TEMPAT MAKAN -->
    <div class="tempat-section">
        <div class="flex items-center gap-3 mb-5">
            <div style="width:38px;height:38px;background:linear-gradient(135deg,#FEF3C7,#FDE68A);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;">🍽️</div>
            <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Rekomendasi Tempat Makan</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="tempat-card">
                <div class="tempat-card-title">🏪 Pasar Inpres Kebun Sayur</div>
                <p class="tempat-card-desc">Pusat kuliner tradisional dengan berbagai pilihan makanan khas Kalimantan.</p>
                <div class="tempat-card-meta"><span>⭐ 4.3</span><span>·</span><span>💰 Murah</span></div>
            </div>
            <div class="tempat-card">
                <div class="tempat-card-title">🏬 Sepinggan Food Court</div>
                <p class="tempat-card-desc">Food court modern dengan berbagai pilihan kuliner seafood segar.</p>
                <div class="tempat-card-meta"><span>⭐ 4.5</span><span>·</span><span>💰 Sedang</span></div>
            </div>
            <div class="tempat-card">
                <div class="tempat-card-title">🍲 Warung Soto Banjar H. Amat</div>
                <p class="tempat-card-desc">Legendaris! Soto Banjar paling enak sejak tahun 1980-an.</p>
                <div class="tempat-card-meta"><span>⭐ 4.8</span><span>·</span><span>💰 Murah</span></div>
            </div>
            <div class="tempat-card">
                <div class="tempat-card-title">🌊 Pantai Melawai</div>
                <p class="tempat-card-desc">Deretan restoran seafood dengan pemandangan laut yang indah.</p>
                <div class="tempat-card-meta"><span>⭐ 4.4</span><span>·</span><span>💰 Mahal</span></div>
            </div>
        </div>
    </div>

    <!-- HARGA -->
    <div class="harga-section">
        <div class="flex items-center gap-3 mb-5">
            <div style="width:38px;height:38px;background:linear-gradient(135deg,#D1FAE5,#A7F3D0);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;">💰</div>
            <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Kisaran Harga Kuliner</h3>
        </div>
        <div class="grid md:grid-cols-2 gap-3">
            <div class="harga-item"><span class="harga-name">🍲 Soto Banjar</span><span class="harga-price">Rp 15.000–25.000</span></div>
            <div class="harga-item"><span class="harga-name">🦀 Kepiting Soka</span><span class="harga-price">Rp 80.000–150.000</span></div>
            <div class="harga-item"><span class="harga-name">🍚 Nasi Kuning</span><span class="harga-price">Rp 20.000–35.000</span></div>
            <div class="harga-item"><span class="harga-name">🐟 Amplang</span><span class="harga-price">Rp 25.000–60.000</span></div>
            <div class="harga-item"><span class="harga-name">🍗 Lawa Ayam</span><span class="harga-price">Rp 25.000–40.000</span></div>
            <div class="harga-item"><span class="harga-name">🐠 Gangan Ikan Patin</span><span class="harga-price">Rp 35.000–60.000</span></div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-kuliner">
        <h3 class="text-2xl font-bold text-white mb-3 relative z-10" style="font-family:'Syne',sans-serif;">Lapar Melihat Kuliner Balikpapan?</h3>
        <p class="mb-6 relative z-10" style="color:rgba(253,230,138,0.85);font-weight:300;">Jelajahi lebih banyak keindahan kota ini</p>
        <div class="flex flex-wrap gap-3 justify-center relative z-10">
            <a href="{{ route('destinasi') }}" class="cta-btn-white">🗺️ Lihat Destinasi Wisata</a>
            <a href="{{ route('galeri') }}" class="cta-btn-ghost">📸 Jelajahi Galeri</a>
        </div>
    </div>

</div>
@endsection