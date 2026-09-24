# Praktikum Pemrograman Web Lanjutan

Repository ini dibuat untuk mendukung pembelajaran mata kuliah Pemrograman Web Lanjutan sesuai RPS. Setiap pertemuan mencakup materi, slide, contoh kode, serta latihan yang bisa langsung dipelajari dan dijalankan mahasiswa.

Project ini dapat diakses di GitHub:

- https://github.com/anasamu/pemograman-web-lanjutan

## Tujuan pembelajaran

- Memahami konsep web dinamis dan arsitektur aplikasi berbasis server.
- Menguasai dasar PHP, logika kontrol, fungsi, array, dan form handling.
- Menyusun aplikasi web dengan pendekatan MVC dan Laravel.
- Mengintegrasikan aplikasi dengan database MySQL.
- Membangun fitur CRUD, autentikasi, upload file, API JSON, AJAX, dan OOP.
- Menyelesaikan proyek akhir serta mempresentasikan hasil kerja.

## Struktur folder

```text
PRAKTIKUM/
├── README.md
├── docker-compose.yml
├── .env.example
├── php/
│   ├── index.php
│   ├── slides/
│   │   ├── 01-pengantar-web-dinamis-php.html
│   │   ├── ...
│   │   └── 16-presentasi-evaluasi.html
│   ├── contoh/
│   │   ├── pertemuan-01-php-dasar.php
│   │   ├── ...
│   │   └── pertemuan-16-presentasi.php
│   ├── latihan/
│   └── praktikum/
├── mysql/
│   ├── init/
│   │   └── 01-init.sql
│   └── data/
├── laravel-praktikum/
├── .gitignore
└── .env
```

## Persiapan dan eksekusi

1. Clone repository:

```bash
git clone https://github.com/anasamu/pemograman-web-lanjutan.git
cd pemograman-web-lanjutan/PRAKTIKUM
```

2. Salin file `.env.example` jika dibutuhkan:

```bash
cp .env.example .env
```

3. Jalankan Docker Compose:

```bash
docker compose up -d --build
```

4. Akses aplikasi:

- PHP/Praktikum: http://localhost:8080
- phpMyAdmin: http://localhost:8081
- Laravel Practice: http://localhost:8000

## Volume host yang bisa diedit langsung

Konfigurasi Docker memakai **bind mount** sehingga file diedit dari host (Cursor/VS Code/Finder) dan langsung terbaca container:

```yaml
volumes:
  - ./php:/var/www/html:rw
  - ./mysql/data:/var/lib/mysql:rw
  - ./mysql/init:/docker-entrypoint-initdb.d:ro
  - ./laravel-praktikum:/app:rw
```

| Folder host | Mount di container | Bisa diedit di host? |
|---|---|---|
| `php/` | `/var/www/html` | Ya |
| `mysql/data/` | `/var/lib/mysql` | Ya (data DB) |
| `mysql/init/` | init SQL | Ya |
| `laravel-praktikum/` | `/app` | Ya |

Service Laravel dijalankan sebagai user host (`HOST_UID` / `HOST_GID` di `.env`) supaya file baru yang dibuat di container tetap bisa diubah dari Mac/host.

```bash
# isi otomatis UID/GID Anda
cp .env.example .env
# atau set manual:
# HOST_UID=$(id -u)
# HOST_GID=$(id -g)
```

Edit kode Laravel practice langsung di:

- `laravel-praktikum/public/index.php`
- `laravel-praktikum/artisan`
- atau project Laravel penuh setelah `composer create-project`

## Latihan Laravel

Folder `laravel-praktikum/` berisi **demo MVC yang langsung jalan** di http://localhost:8000 setelah Docker Compose naik.

Route demo:
- `/` — home
- `/mahasiswa` — daftar mahasiswa
- `/about` — penjelasan konsep Route/Controller

Menjalankan ulang service Laravel saja:

```bash
docker compose up -d laravel
```

Atau lokal tanpa Docker:

```bash
cd laravel-praktikum
php artisan serve --host=0.0.0.0 --port=8000
```

Untuk mengganti demo dengan Laravel resmi:

```bash
docker compose exec laravel bash
# backup dulu jika perlu, lalu:
composer create-project laravel/laravel .
```

## Pemetaan RPS

| Pertemuan | Topik | CPMK |
|---|---|---|
| 1 | Pengantar web dinamis, web server, dasar PHP | CPMK-1 |
| 2 | Logika kontrol dan perulangan PHP | CPMK-1 |
| 3 | Fungsi dan array PHP | CPMK-1 |
| 4 | Form handling GET/POST | CPMK-1 |
| 5 | Laravel & MVC | CPMK-2, CPMK-3 |
| 6 | Routing & Controller | CPMK-3 |
| 7 | Database MySQL dan koneksi PHP | CPMK-4 |
| 8 | CRUD database | CPMK-4 |
| 9 | Autentikasi dan session | CPMK-5 |
| 10 | Upload file dan validasi input | CPMK-5 |
| 11 | API dasar dan JSON | CPMK-5 |
| 12 | AJAX dan interaksi dinamis | CPMK-5 |
| 13 | OOP PHP dan class | CPMK-1, CPMK-4 |
| 14 | Eloquent ORM dan relasi database | CPMK-4 |
| 15 | Proyek akhir dan integrasi fitur | CPMK-5 |
| 16 | Presentasi, evaluasi, dan deploy | CPMK-5 |

## Folder materi dan contoh

- Slide: `php/slides/`
- Contoh kode: `php/contoh/`
- Latihan: `php/latihan/`
- Praktikum: `php/praktikum/`

## Catatan

Materi praktikum dan slide dapat dipakai untuk:
- pembelajaran di kelas,
- panduan tugas mahasiswa,
- persiapan presentasi,
- evaluasi dan pengulangan materi.

---

Dibuat untuk mendukung pembelajaran Pemrograman Web Lanjutan sesuai RPS, dengan pendekatan praktikum berbasis PHP, MySQL, dan Laravel.
