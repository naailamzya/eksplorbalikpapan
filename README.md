# Eksplor Balikpapan

> Website pariwisata modern untuk menjelajahi Kota Minyak, Kalimantan Timur.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)


**Eksplor Balikpapan** adalah website pariwisata berbasis Laravel yang menampilkan destinasi wisata, kuliner khas, dan galeri foto Kota Balikpapan — kota terbesar di Kalimantan Timur yang juga menjadi gateway menuju Ibu Kota Negara (IKN) Nusantara.

## 🖼️ Preview Halaman

| Halaman | Deskripsi |
|---|---|
| Home | Hero section, feature cards, fakta kota |
| Destinasi | Grid kartu destinasi wisata dengan rating |
| Kuliner | Menu kuliner khas dengan harga dan rekomendasi tempat makan |
| Galeri | Grid foto dengan kategori dan overlay efek |
| Kontak | Form kontak, info, FAQ, dan social media |

---

## 🗂️ Struktur File

```

resources/
└── views/
    ├── layouts/
    │   └── master.blade.php        # Layout utama (header, nav, footer)
    ├── components/
    │   ├── card.blade.php          # Reusable card component
    │   └── nav-link.blade.php     # Navigation pill component
    ├── home.blade.php
    ├── destinasi.blade.php
    ├── kuliner.blade.php
    ├── galeri.blade.php
    └── kontak.blade.php

public/
└── images/
    ├── destinasi/                  # Foto destinasi wisata
    ├── kuliner/                    # Foto kuliner
    └── galeri/                     # Foto galeri
```

---

## Cara Instalasi

### Prasyarat
- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL / SQLite

### Langkah-langkah

**1. Clone repository**
```bash
git clone https://github.com/naailamzya/eksplor-balikpapan.git
cd eksplor-balikpapan
```

**2. Install dependencies**
```bash
composer install
npm install
```

**3. Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Konfigurasi database** di `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eksplor_balikpapan
DB_USERNAME=root
DB_PASSWORD=
```

**5. Build assets**
```bash
npm run build
```

**6. Jalankan server**
```bash
php artisan serve
```

Buka browser di **http://localhost:8000**
