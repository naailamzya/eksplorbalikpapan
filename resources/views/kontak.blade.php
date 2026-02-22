@extends('layouts.master')

@section('title', 'Kontak - Eksplor Balikpapan')

@section('content')
<style>
    .page-header-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(59,130,246,0.1);
        border: 1px solid rgba(59,130,246,0.2);
        border-radius: 100px; padding: 5px 14px;
        font-size: 0.78rem; font-weight: 600; color: #2563EB;
        margin-bottom: 1rem;
    }

    /* ── FORM CARD ── */
    .form-card {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.12);
        border-radius: 1.5rem; padding: 2rem;
    }
    .form-label { display: block; font-size: 0.83rem; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-input {
        width: 100%;
        padding: 11px 16px;
        background: #F8FAFF;
        border: 1.5px solid rgba(59,130,246,0.18);
        border-radius: 0.875rem;
        font-size: 0.87rem; color: #1E293B;
        font-family: 'DM Sans', sans-serif;
        transition: all 0.2s;
        outline: none;
    }
    .form-input:focus {
        border-color: #3B82F6;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
    }
    .form-input::placeholder { color: #94A3B8; }

    .submit-btn {
        width: 100%;
        background: linear-gradient(135deg, #2563EB, #3B82F6, #0EA5E9);
        color: #fff;
        padding: 13px 24px;
        border-radius: 100px;
        font-weight: 700; font-size: 0.9rem;
        border: none; cursor: pointer;
        font-family: 'Syne', sans-serif;
        transition: all 0.25s ease;
        box-shadow: 0 4px 20px rgba(59,130,246,0.35);
    }
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(59,130,246,0.45);
    }

    /* ── INFO CARDS ── */
    .info-card {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.1);
        border-radius: 1.5rem; padding: 1.75rem;
    }

    .contact-item {
        display: flex; align-items: flex-start; gap: 14px;
        padding: 1rem;
        border-radius: 1rem;
        transition: all 0.2s;
        border: 1px solid transparent;
    }
    .contact-item:hover { background: rgba(59,130,246,0.04); border-color: rgba(59,130,246,0.1); }

    .contact-icon {
        width: 42px; height: 42px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem; flex-shrink: 0;
    }
    .contact-icon.blue   { background: linear-gradient(135deg,#DBEAFE,#BFDBFE); }
    .contact-icon.green  { background: linear-gradient(135deg,#D1FAE5,#A7F3D0); }
    .contact-icon.red    { background: linear-gradient(135deg,#FFE4E6,#FECDD3); }
    .contact-icon.purple { background: linear-gradient(135deg,#EDE9FE,#DDD6FE); }

    .contact-label { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1E3A5F; margin-bottom: 3px; }
    .contact-value { font-size: 0.82rem; color: #64748B; line-height: 1.6; }

    /* ── SOCIAL ── */
    .social-card {
        background: linear-gradient(135deg, #0F2460 0%, #1D4ED8 50%, #0EA5E9 100%);
        border-radius: 1.5rem; padding: 1.75rem;
        border: 1px solid rgba(96,165,250,0.25);
        position: relative; overflow: hidden;
    }
    .social-card::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 55% 55% at 90% 5%, rgba(34,211,238,0.2) 0%, transparent 60%);
        pointer-events: none;
    }
    .social-btn {
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.2);
        backdrop-filter: blur(6px);
        border-radius: 0.875rem; padding: 0.875rem;
        text-align: center; text-decoration: none;
        color: #fff; transition: all 0.25s ease;
        display: block;
    }
    .social-btn:hover {
        background: rgba(255,255,255,0.22);
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    }
    .social-btn-icon { font-size: 1.2rem; margin-bottom: 4px; }
    .social-btn-label { font-size: 0.75rem; font-weight: 600; }

    /* ── MAP PLACEHOLDER ── */
    .map-card {
        background: rgba(255,255,255,0.82);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.1);
        border-radius: 1.5rem; padding: 1.75rem;
    }
    .map-placeholder {
        background: linear-gradient(135deg, #EFF6FF, #F0FDF4);
        border: 2px dashed rgba(59,130,246,0.25);
        border-radius: 1.1rem; height: 200px;
        display: flex; align-items: center; justify-content: center;
        flex-direction: column; gap: 8px;
        transition: all 0.2s;
    }
    .map-placeholder:hover { border-color: rgba(59,130,246,0.4); background: linear-gradient(135deg, #DBEAFE, #D1FAE5); }
    .map-btn {
        background: #3B82F6; color: #fff;
        padding: 8px 18px; border-radius: 100px;
        font-size: 0.8rem; font-weight: 600;
        border: none; cursor: pointer; font-family: 'DM Sans', sans-serif;
        transition: all 0.2s;
    }
    .map-btn:hover { background: #2563EB; transform: translateY(-1px); }

    /* ── FAQ ── */
    .faq-section {
        background: rgba(255,255,255,0.78);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(59,130,246,0.1);
        border-radius: 1.5rem; padding: 2rem;
    }
    .faq-item {
        background: #F8FAFF;
        border: 1px solid rgba(59,130,246,0.1);
        border-radius: 1rem; padding: 1.25rem;
        transition: all 0.25s;
    }
    .faq-item:hover {
        border-color: rgba(59,130,246,0.25);
        box-shadow: 0 4px 12px rgba(59,130,246,0.07);
        transform: translateY(-2px);
    }
    .faq-q { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 0.9rem; color: #1E3A5F; margin-bottom: 8px; }
    .faq-a { font-size: 0.82rem; color: #64748B; line-height: 1.6; }

    /* ── CTA ── */
    .cta-card {
        background: linear-gradient(135deg, #1D4ED8, #3B82F6, #0EA5E9);
        border-radius: 1.5rem; padding: 2.5rem; text-align: center;
        position: relative; overflow: hidden;
        border: 1px solid rgba(96,165,250,0.25);
    }
    .cta-card::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 55% 55% at 80% 5%, rgba(34,211,238,0.2) 0%, transparent 60%);
        pointer-events: none;
    }
    .cta-btn-white {
        background: rgba(255,255,255,0.95); color: #1D4ED8;
        padding: 11px 22px; border-radius: 100px;
        font-weight: 700; font-size: 0.85rem;
        text-decoration: none; display: inline-block;
        transition: all 0.2s; box-shadow: 0 4px 14px rgba(0,0,0,0.18);
    }
    .cta-btn-white:hover { background: #fff; transform: translateY(-2px); }
    .cta-btn-ghost {
        background: rgba(255,255,255,0.12); color: #fff;
        border: 1px solid rgba(255,255,255,0.25);
        padding: 11px 22px; border-radius: 100px;
        font-weight: 600; font-size: 0.85rem;
        text-decoration: none; display: inline-block;
        backdrop-filter: blur(6px); transition: all 0.2s;
    }
    .cta-btn-ghost:hover { background: rgba(255,255,255,0.2); transform: translateY(-2px); }
</style>

<div class="space-y-8">

    <!-- HEADER -->
    <div class="text-center mb-10">
        <div class="page-header-badge">📞 Get in Touch</div>
        <h2 class="text-4xl font-bold text-gray-800 mb-3" style="font-family:'Syne',sans-serif;">Hubungi Kami</h2>
        <p class="text-gray-500 max-w-xl mx-auto leading-relaxed">Ada pertanyaan tentang Balikpapan? Kami siap membantu Anda!</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">

        <!-- FORM -->
        <div class="form-card">
            <div class="flex items-center gap-3 mb-6">
                <div style="width:38px;height:38px;background:linear-gradient(135deg,#DBEAFE,#BFDBFE);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;">✉️</div>
                <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Kirim Pesan</h3>
            </div>
            <form class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-input" placeholder="Masukkan nama Anda">
                    </div>
                    <div>
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" id="telepon" name="telepon" class="form-input" placeholder="08xxxxxxxxxx">
                    </div>
                </div>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="contoh@email.com">
                </div>
                <div>
                    <label for="subjek" class="form-label">Subjek</label>
                    <select id="subjek" name="subjek" class="form-input">
                        <option value="">Pilih Subjek Pesan</option>
                        <option value="info-wisata">🗺️ Informasi Wisata</option>
                        <option value="booking">🏨 Booking &amp; Reservasi</option>
                        <option value="kerjasama">🤝 Kerjasama</option>
                        <option value="kritik-saran">💡 Kritik &amp; Saran</option>
                        <option value="lainnya">📋 Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="5" class="form-input" style="resize:vertical;" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="submit-btn">📤 Kirim Pesan</button>
            </form>
        </div>

        <!-- RIGHT SIDE -->
        <div class="space-y-5">

            <!-- CONTACT INFO -->
            <div class="info-card">
                <div class="flex items-center gap-3 mb-4">
                    <div style="width:38px;height:38px;background:linear-gradient(135deg,#DBEAFE,#BFDBFE);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;">📍</div>
                    <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Informasi Kontak</h3>
                </div>
                <div class="divide-y divide-slate-50">
                    <div class="contact-item">
                        <div class="contact-icon blue">🏢</div>
                        <div>
                            <div class="contact-label">Alamat Kantor</div>
                            <div class="contact-value">Jl. Jenderal Sudirman No. 1<br>Balikpapan, Kalimantan Timur 76114</div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon green">📞</div>
                        <div>
                            <div class="contact-label">Telepon &amp; WhatsApp</div>
                            <div class="contact-value">(0542) 123-4567<br>+62 812-3456-7890</div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon red">📧</div>
                        <div>
                            <div class="contact-label">Email</div>
                            <div class="contact-value">info@eksplorbalikpapan.com<br>wisata@balikpapan.go.id</div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon purple">🕒</div>
                        <div>
                            <div class="contact-label">Jam Operasional</div>
                            <div class="contact-value">Senin – Jumat: 08:00 – 17:00 WITA<br>Sabtu: 08:00 – 14:00 WITA<br>Minggu &amp; Libur: Tutup</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SOCIAL MEDIA -->
            <div class="social-card">
                <h3 class="text-lg font-bold text-white mb-2 relative z-10" style="font-family:'Syne',sans-serif;">🌐 Follow Kami</h3>
                <p class="text-sm mb-4 relative z-10" style="color:rgba(191,219,254,0.8);font-weight:300;">Update terbaru seputar wisata Balikpapan!</p>
                <div class="grid grid-cols-4 gap-2 relative z-10">
                    <a href="#" class="social-btn"><div class="social-btn-icon">📘</div><div class="social-btn-label">Facebook</div></a>
                    <a href="#" class="social-btn"><div class="social-btn-icon">📷</div><div class="social-btn-label">Instagram</div></a>
                    <a href="#" class="social-btn"><div class="social-btn-icon">🐦</div><div class="social-btn-label">Twitter</div></a>
                    <a href="#" class="social-btn"><div class="social-btn-icon">▶️</div><div class="social-btn-label">YouTube</div></a>
                </div>
            </div>

            <!-- MAP -->
            <div class="map-card">
                <div class="flex items-center gap-3 mb-4">
                    <div style="width:38px;height:38px;background:linear-gradient(135deg,#DBEAFE,#BFDBFE);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;">🗺️</div>
                    <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Lokasi Kami</h3>
                </div>
                <div class="map-placeholder">
                    <div style="font-size:2.2rem;">📍</div>
                    <div style="font-family:'Syne',sans-serif;font-weight:700;color:#1E3A5F;font-size:0.95rem;">Peta Lokasi Balikpapan</div>
                    <div style="font-size:0.78rem;color:#64748B;">Kalimantan Timur, Indonesia</div>
                    <button class="map-btn">Buka di Google Maps</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="faq-section">
        <div class="flex items-center gap-3 mb-5">
            <div style="width:38px;height:38px;background:linear-gradient(135deg,#EDE9FE,#DDD6FE);border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;">❓</div>
            <h3 class="text-xl font-bold text-gray-800" style="font-family:'Syne',sans-serif;">Pertanyaan yang Sering Diajukan</h3>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="faq-item">
                <div class="faq-q">🚗 Bagaimana cara menuju Balikpapan?</div>
                <p class="faq-a">Balikpapan dapat diakses melalui Bandara Internasional Sultan Aji Muhammad Sulaiman Sepinggan dengan penerbangan dari berbagai kota besar di Indonesia.</p>
            </div>
            <div class="faq-item">
                <div class="faq-q">🌤️ Kapan waktu terbaik mengunjungi?</div>
                <p class="faq-a">April hingga Oktober adalah periode dengan curah hujan lebih rendah, cocok untuk aktivitas outdoor dan eksplorasi wisata alam.</p>
            </div>
            <div class="faq-item">
                <div class="faq-q">👨‍💼 Apakah tersedia pemandu wisata?</div>
                <p class="faq-a">Ya, tersedia layanan pemandu wisata profesional yang dapat membantu Anda menjelajahi Balikpapan. Hubungi kami untuk informasi lebih lanjut.</p>
            </div>
            <div class="faq-item">
                <div class="faq-q">💰 Berapa budget yang diperlukan?</div>
                <p class="faq-a">Backpacker: Rp 300–500K/hari, Mid-range: Rp 700K–1.5Jt/hari, Luxury: di atas Rp 2Jt/hari — termasuk akomodasi &amp; transportasi.</p>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-card">
        <h3 class="text-2xl font-bold text-white mb-3 relative z-10" style="font-family:'Syne',sans-serif;">Siap Menjelajahi Balikpapan?</h3>
        <p class="mb-6 relative z-10" style="color:rgba(191,219,254,0.85);font-weight:300;">Mulai petualangan Anda di kota minyak yang penuh pesona</p>
        <div class="flex flex-wrap gap-3 justify-center relative z-10">
            <a href="{{ route('destinasi') }}" class="cta-btn-white">🗺️ Lihat Destinasi</a>
            <a href="{{ route('kuliner') }}" class="cta-btn-ghost">🍜 Coba Kuliner</a>
            <a href="{{ route('galeri') }}" class="cta-btn-white">📸 Jelajahi Galeri</a>
        </div>
    </div>

</div>
@endsection