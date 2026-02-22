@extends('layouts.master')

@section('title', 'Galeri Foto - Eksplor Balikpapan')

@section('content')
<style>
    .page-header-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(139,92,246,0.1);
        border: 1px solid rgba(139,92,246,0.2);
        border-radius: 100px; padding: 5px 14px;
        font-size: 0.78rem; font-weight: 600; color: #6D28D9;
        margin-bottom: 1rem;
    }

    /* ── GALLERY GRID ── */
    .gallery-card {
        position: relative; overflow: hidden;
        border-radius: 1.25rem;
        border: 1px solid rgba(59,130,246,0.1);
        background: #fff;
        transition: all 0.35s cubic-bezier(0.34,1.2,0.64,1);
        cursor: pointer;
    }
    .gallery-card:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 24px 48px rgba(59,130,246,0.15);
        border-color: rgba(59,130,246,0.3);
    }
    .gallery-card img {
        width: 100%; height: 240px; object-fit: cover;
        transition: transform 0.55s ease;
        display: block;
    }
    .gallery-card:hover img { transform: scale(1.06); }

    .gallery-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(8,16,50,0.88) 0%, rgba(8,16,50,0.1) 55%, transparent 100%);
        transition: opacity 0.3s;
    }
    .gallery-content {
        position: absolute; bottom: 0; left: 0; right: 0;
        padding: 1.1rem;
        transform: translateY(6px);
        transition: transform 0.3s ease;
    }
    .gallery-card:hover .gallery-content { transform: translateY(0); }

    .cat-badge {
        display: inline-flex; align-items: center; gap: 4px;
        background: rgba(59,130,246,0.75);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(96,165,250,0.4);
        color: #fff; font-size: 0.72rem; font-weight: 600;
        padding: 3px 10px; border-radius: 100px;
        margin-bottom: 6px;
    }
    .gallery-title {
        font-family: 'Syne', sans-serif;
        font-weight: 700; color: #fff; font-size: 0.95rem;
        margin-bottom: 3px; line-height: 1.3;
    }
    .gallery-desc { color: rgba(203,213,225,0.85); font-size: 0.78rem; line-height: 1.4; }

    /* ── CATEGORY SECTION ── */
    .cat-section {
        background: rgba(255,255,255,0.75);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(139,92,246,0.15);
        border-radius: 1.5rem;
        padding: 2rem;
    }
    .cat-chip {
        background: rgba(255,255,255,0.9);
        border: 1px solid rgba(139,92,246,0.15);
        border-radius: 1rem;
        padding: 1rem;
        text-align: center;
        transition: all 0.25s ease;
        cursor: pointer;
    }
    .cat-chip:hover {
        background: rgba(139,92,246,0.06);
        border-color: rgba(139,92,246,0.3);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(139,92,246,0.1);
    }
    .cat-chip-icon { font-size: 1.5rem; margin-bottom: 5px; }
    .cat-chip-name { font-size: 0.82rem; font-weight: 600; color: #374151; }
    .cat-chip-count { font-size: 0.72rem; color: #7C3AED; margin-top: 2px; font-weight: 600; }

    /* ── CTA ── */
    .cta-galeri {
        background: linear-gradient(135deg, #3730A3 0%, #4F46E5 40%, #2563EB 100%);
        border-radius: 1.5rem; padding: 2.5rem; text-align: center;
        position: relative; overflow: hidden;
        border: 1px solid rgba(139,92,246,0.3);
    }
    .cta-galeri::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 55% 55% at 85% 5%, rgba(34,211,238,0.18) 0%, transparent 60%);
        pointer-events: none;
    }

    .hashtag {
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.25);
        color: #fff; padding: 6px 14px; border-radius: 100px;
        font-size: 0.8rem; font-weight: 600;
        backdrop-filter: blur(6px);
        transition: all 0.2s;
        cursor: pointer;
    }
    .hashtag:hover { background: rgba(255,255,255,0.25); transform: translateY(-2px); }

    .cta-btn-white {
        background: rgba(255,255,255,0.95); color: #4F46E5;
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
        <div class="page-header-badge">📸 Koleksi Visual</div>
        <h2 class="text-4xl font-bold text-gray-800 mb-3" style="font-family:'Syne',sans-serif;">Galeri Foto Balikpapan</h2>
        <p class="text-gray-500 max-w-xl mx-auto leading-relaxed">Keindahan Kota Minyak dalam Setiap Bingkai</p>
    </div>

    <!-- GALLERY GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach([
            ['image'=>'balikpapan-skyline.jpg','title'=>'Skyline Balikpapan','desc'=>'Pemandangan kota modern dari ketinggian','category'=>'🏙️ Cityscape'],
            ['image'=>'sunset-teluk.jpg','title'=>'Sunset Teluk Balikpapan','desc'=>'Matahari terbenam yang memukau','category'=>'🌅 Alam'],
            ['image'=>'jembatan-mangrove.jpg','title'=>'Jembatan Kayu Mangrove','desc'=>'Susur jalan di tengah hutan bakau','category'=>'🌿 Konservasi'],
            ['image'=>'masjid-agung.jpg','title'=>'Masjid Agung At-Taqwa','desc'=>'Landmark religi megah di pusat kota','category'=>'🕌 Landmark'],
            ['image'=>'pantai-kemala-malam.jpg','title'=>'Pantai Kemala di Malam Hari','desc'=>'Gemerlap lampu kota dari tepi pantai','category'=>'🌃 Nightscape'],
            ['image'=>'monumen-perjuangan.jpg','title'=>'Monumen Perjuangan Rakyat','desc'=>'Simbol sejarah perjuangan kota','category'=>'🏛️ Sejarah'],
            ['image'=>'bekantan.jpg','title'=>'Bekantan Khas Kalimantan','desc'=>'Primata endemik di habitat aslinya','category'=>'🐒 Satwa'],
            ['image'=>'jembatan-mahakam.jpg','title'=>'Jembatan Mahakam Ulu','desc'=>'Infrastruktur modern penghubung kota','category'=>'🌉 Infrastruktur'],
            ['image'=>'plaza-balikpapan.jpg','title'=>'Plaza Balikpapan','desc'=>'Pusat perbelanjaan dan hiburan','category'=>'🏬 Modern'],
            ['image'=>'budaya-dayak.jpg','title'=>'Tarian Budaya Dayak','desc'=>'Kekayaan seni dan budaya lokal','category'=>'🎭 Budaya'],
            ['image'=>'pelabuhan.jpg','title'=>'Pelabuhan Semayang','desc'=>'Gerbang maritim Kalimantan Timur','category'=>'⚓ Maritim'],
            ['image'=>'hutan-lindung.jpg','title'=>'Hutan Lindung Sungai Wain','desc'=>'Paru-paru hijau kota Balikpapan','category'=>'🌳 Konservasi'],
        ] as $photo)
        <div class="gallery-card">
            <img src="{{ asset('images/galeri/' . $photo['image']) }}" alt="{{ $photo['title'] }}" loading="lazy">
            <div class="gallery-overlay"></div>
            <div class="gallery-content">
                <div class="cat-badge">{{ $photo['category'] }}</div>
                <div class="gallery-title">{{ $photo['title'] }}</div>
                <div class="gallery-desc">{{ $photo['desc'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- CATEGORIES -->
    <div class="cat-section">
        <div class="flex items-center gap-3 mb-5">
            <div style="width:38px;height:38px;background:linear-gradient(135deg,#EDE9FE,#DDD6FE);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;">📷</div>
            <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Kategori Foto</h3>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            @foreach([
                ['icon'=>'🏙️','name'=>'Cityscape','count'=>'3 foto'],
                ['icon'=>'🌅','name'=>'Alam','count'=>'4 foto'],
                ['icon'=>'🏛️','name'=>'Landmark','count'=>'2 foto'],
                ['icon'=>'🎭','name'=>'Budaya','count'=>'1 foto'],
                ['icon'=>'🌿','name'=>'Konservasi','count'=>'2 foto'],
                ['icon'=>'🌉','name'=>'Infrastruktur','count'=>'2 foto'],
                ['icon'=>'🐒','name'=>'Satwa','count'=>'1 foto'],
                ['icon'=>'⚓','name'=>'Maritim','count'=>'1 foto'],
            ] as $cat)
            <div class="cat-chip">
                <div class="cat-chip-icon">{{ $cat['icon'] }}</div>
                <div class="cat-chip-name">{{ $cat['name'] }}</div>
                <div class="cat-chip-count">{{ $cat['count'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-galeri">
        <h3 class="text-2xl font-bold text-white mb-3 relative z-10" style="font-family:'Syne',sans-serif;">Punya Foto Menarik dari Balikpapan?</h3>
        <p class="mb-5 relative z-10" style="color:rgba(199,210,254,0.85);font-weight:300;">Bagikan momen indah Anda dan jadilah bagian dari komunitas pecinta Balikpapan</p>
        <div class="flex flex-wrap gap-2 justify-center mb-6 relative z-10">
            <span class="hashtag">#EksplorBalikpapan</span>
            <span class="hashtag">#KotaMinyak</span>
            <span class="hashtag">#WisataKaltim</span>
            <span class="hashtag">#BalikpapanIndah</span>
        </div>
        <div class="flex flex-wrap gap-3 justify-center relative z-10">
            <a href="{{ route('destinasi') }}" class="cta-btn-white">🗺️ Jelajahi Destinasi</a>
            <a href="{{ route('kuliner') }}" class="cta-btn-ghost">🍜 Coba Kuliner</a>
        </div>
    </div>

</div>
@endsection