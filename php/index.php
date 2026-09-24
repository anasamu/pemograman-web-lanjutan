<?php
$meetings = [
    ['num' => '01', 'title' => 'Pengantar Web Dinamis & PHP', 'slide' => '01-pengantar-web-dinamis-php.html', 'contoh' => 'pertemuan-01-php-dasar.php', 'latihan' => '01-latihan-php-dasar.php', 'cpmk' => 'CPMK-1'],
    ['num' => '02', 'title' => 'Logika Kontrol & Perulangan', 'slide' => '02-logika-kontrol-dan-perulangan.html', 'contoh' => 'pertemuan-02-kondisi-dan-perulangan.php', 'latihan' => '02-latihan-logika.php', 'cpmk' => 'CPMK-1'],
    ['num' => '03', 'title' => 'Fungsi & Array', 'slide' => '03-fungsi-dan-array.html', 'contoh' => 'pertemuan-03-fungsi-dan-array.php', 'latihan' => '03-latihan-fungsi-array.php', 'cpmk' => 'CPMK-1'],
    ['num' => '04', 'title' => 'Form Handling PHP', 'slide' => '04-form-handling-php.html', 'contoh' => 'pertemuan-04-form.php', 'latihan' => '04-latihan-form.php', 'cpmk' => 'CPMK-1'],
    ['num' => '05', 'title' => 'Laravel & MVC', 'slide' => '05-pengantar-laravel-mvc.html', 'contoh' => 'pertemuan-05-mvc.php', 'latihan' => '05-latihan-laravel.php', 'cpmk' => 'CPMK-2,3'],
    ['num' => '06', 'title' => 'Routing & Controller', 'slide' => '06-routing-dan-controller.html', 'contoh' => 'pertemuan-06-routing-controller.php', 'latihan' => '06-latihan-routing-controller.php', 'cpmk' => 'CPMK-3'],
    ['num' => '07', 'title' => 'Database MySQL', 'slide' => '07-database-mysql.html', 'contoh' => 'pertemuan-07-database.php', 'latihan' => '07-latihan-database.php', 'cpmk' => 'CPMK-4'],
    ['num' => '08', 'title' => 'CRUD Database', 'slide' => '08-crud-database.html', 'contoh' => 'pertemuan-08-crud.php', 'latihan' => '08-latihan-crud.php', 'cpmk' => 'CPMK-4'],
    ['num' => '09', 'title' => 'Autentikasi & Session', 'slide' => '09-authentication-session.html', 'contoh' => 'pertemuan-09-auth.php', 'latihan' => '09-latihan-auth.php', 'cpmk' => 'CPMK-5'],
    ['num' => '10', 'title' => 'Upload File', 'slide' => '10-upload-file.html', 'contoh' => 'pertemuan-10-upload.php', 'latihan' => '10-latihan-upload.php', 'cpmk' => 'CPMK-5'],
    ['num' => '11', 'title' => 'API & JSON', 'slide' => '11-api-dan-json.html', 'contoh' => 'pertemuan-11-api-json.php', 'latihan' => '11-latihan-api.php', 'cpmk' => 'CPMK-5'],
    ['num' => '12', 'title' => 'AJAX', 'slide' => '12-ajax.html', 'contoh' => 'pertemuan-12-ajax.php', 'latihan' => '12-latihan-ajax.php', 'cpmk' => 'CPMK-5'],
    ['num' => '13', 'title' => 'OOP PHP', 'slide' => '13-oop-php.html', 'contoh' => 'pertemuan-13-oop.php', 'latihan' => '13-latihan-oop.php', 'cpmk' => 'CPMK-1,4'],
    ['num' => '14', 'title' => 'Eloquent ORM', 'slide' => '14-eloquent-orm.html', 'contoh' => 'pertemuan-14-eloquent.php', 'latihan' => '14-latihan-eloquent.php', 'cpmk' => 'CPMK-4'],
    ['num' => '15', 'title' => 'Proyek Akhir', 'slide' => '15-proyek-akhir.html', 'contoh' => 'pertemuan-15-proyek.php', 'latihan' => '15-latihan-proyek.php', 'cpmk' => 'CPMK-5'],
    ['num' => '16', 'title' => 'Presentasi & Evaluasi', 'slide' => '16-presentasi-evaluasi.html', 'contoh' => 'pertemuan-16-presentasi.php', 'latihan' => '16-latihan-presentasi.php', 'cpmk' => 'CPMK-5'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Praktikum Pemrograman Web Lanjutan</title>
  <link rel="stylesheet" href="assets/praktikum.css" />
</head>
<body>
  <div class="container">
    <section class="hero">
      <div class="panel hero-copy">
        <div class="badge">Mata kuliah · 16 pertemuan</div>
        <h1>Pemrograman Web Lanjutan</h1>
        <p class="muted">Portal praktikum: slide, contoh kode ber-syntax highlighting, latihan mahasiswa, dan demo Laravel MVC. Materi mengikuti RPS dari dasar PHP sampai proyek akhir.</p>
        <div class="pill-row">
          <span class="pill">PHP 8</span>
          <span class="pill">MySQL</span>
          <span class="pill">Laravel MVC</span>
          <span class="pill">Docker</span>
        </div>
        <p style="margin-top:20px;display:flex;flex-wrap:wrap;gap:10px;">
          <a class="btn btn-primary" href="#pertemuan">Lihat pertemuan</a>
          <a class="btn btn-secondary" href="http://localhost:8000" target="_blank" rel="noopener">Laravel :8000</a>
          <a class="btn btn-secondary" href="https://github.com/anasamu/pemograman-web-lanjutan" target="_blank" rel="noopener">GitHub</a>
        </p>
      </div>

      <aside class="panel hero-side">
        <strong style="font-family:var(--font-display);font-size:1.3rem;">Akses layanan</strong>
        <p class="muted" style="margin:8px 0 14px;">Aktif setelah <code style="color:#fff;background:rgba(255,255,255,.14);">docker compose up -d</code></p>
        <div class="access-list">
          <div class="access-item">
            <div>
              <strong>PHP Praktikum</strong>
              <span>Materi &amp; contoh kode</span>
            </div>
            <a href="http://localhost:8080" target="_blank" rel="noopener">:8080</a>
          </div>
          <div class="access-item">
            <div>
              <strong>phpMyAdmin</strong>
              <span>Kelola database</span>
            </div>
            <a href="http://localhost:8081" target="_blank" rel="noopener">:8081</a>
          </div>
          <div class="access-item">
            <div>
              <strong>Laravel Practice</strong>
              <span>Demo MVC langsung jalan</span>
            </div>
            <a href="http://localhost:8000" target="_blank" rel="noopener">:8000</a>
          </div>
        </div>
      </aside>
    </section>

    <div class="stat-strip">
      <div class="info-box">
        <span class="muted" style="font-size:0.8rem;font-weight:700;">Pertemuan</span>
        <div class="stat-value">16</div>
      </div>
      <div class="info-box">
        <span class="muted" style="font-size:0.8rem;font-weight:700;">Modul</span>
        <div class="stat-value">Slide · Kode · Latihan</div>
      </div>
      <div class="info-box">
        <span class="muted" style="font-size:0.8rem;font-weight:700;">PHP</span>
        <div class="stat-value"><?= htmlspecialchars(phpversion()) ?></div>
      </div>
      <div class="info-box">
        <span class="muted" style="font-size:0.8rem;font-weight:700;">Server</span>
        <div class="stat-value" style="font-size:1.05rem;"><?= date('d M Y') ?></div>
      </div>
    </div>

    <div class="section-title" id="pertemuan">
      <div>
        <h2 style="margin:0;">Peta pertemuan</h2>
        <p class="muted" style="margin:6px 0 0;">Setiap pertemuan punya slide, contoh kode, dan latihan.</p>
      </div>
    </div>

    <div class="meeting-list">
      <div class="meeting-list-head" aria-hidden="true">
        <span>No</span>
        <span>Materi</span>
        <span>Akses</span>
      </div>
      <?php foreach ($meetings as $m): ?>
        <div class="meeting-row">
          <div class="num"><?= htmlspecialchars($m['num']) ?></div>
          <div class="meta">
            <h3><?= htmlspecialchars($m['title']) ?></h3>
            <span class="cpmk"><?= htmlspecialchars($m['cpmk']) ?></span>
          </div>
          <div class="links">
            <a href="slides/<?= htmlspecialchars($m['slide']) ?>">Slide</a>
            <a href="contoh/<?= htmlspecialchars($m['contoh']) ?>">Contoh</a>
            <a href="latihan/<?= htmlspecialchars($m['latihan']) ?>">Latihan</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="section-title">
      <div>
        <h2 style="margin:0;">Persiapan Docker</h2>
        <p class="muted" style="margin:6px 0 0;">File di host langsung ter-mount ke container.</p>
      </div>
    </div>

    <div class="panel">
      <div class="editor">
        <div class="editor-header">
          <div class="editor-dots" aria-hidden="true"><span></span><span></span><span></span></div>
          <div class="editor-filename">terminal · setup</div>
          <div class="editor-lang">BASH</div>
        </div>
        <pre><code class="language-bash">git clone https://github.com/anasamu/pemograman-web-lanjutan.git
cd pemograman-web-lanjutan/PRAKTIKUM
cp .env.example .env
docker compose up -d --build</code></pre>
      </div>

      <div class="info-row" style="margin-top:16px;">
        <div class="info-box">
          <strong>PHP app</strong>
          <span class="muted"><code>./php</code> → <code>/var/www/html</code></span>
        </div>
        <div class="info-box">
          <strong>MySQL</strong>
          <span class="muted"><code>./mysql/data</code> + init SQL</span>
        </div>
        <div class="info-box">
          <strong>Laravel</strong>
          <span class="muted">Edit di host: <code>./laravel-praktikum</code> → <code>/app</code> · port 8000</span>
        </div>
      </div>
    </div>

    <div class="section-title">
      <div>
        <h2 style="margin:0;">Sumber tambahan</h2>
      </div>
    </div>

    <div class="grid">
      <div class="card">
        <h3>Contoh pendukung</h3>
        <ul class="list-clean">
          <li><a href="contoh/koneksi-db.php">Koneksi database</a></li>
          <li><a href="contoh/crud-sederhana.php">CRUD sederhana</a></li>
          <li><a href="contoh/form-login.php">Form login</a></li>
          <li><a href="contoh/upload-file.php">Upload file</a></li>
        </ul>
      </div>
      <div class="card">
        <h3>Dokumentasi</h3>
        <ul class="list-clean">
          <li><a href="../README.md">README utama</a></li>
          <li><a href="latihan/README.md">Panduan latihan</a></li>
          <li><a href="contoh/README.md">Panduan contoh</a></li>
          <li><a href="http://localhost:8000/about" target="_blank" rel="noopener">About MVC Laravel</a></li>
        </ul>
      </div>
      <div class="card">
        <h3>Status server</h3>
        <p class="muted" style="margin:0 0 8px;"><span class="status-dot"></span> PHP <?= htmlspecialchars(phpversion()) ?></p>
        <p class="muted" style="margin:0 0 8px;">Root: <code><?= htmlspecialchars($_SERVER['DOCUMENT_ROOT'] ?? '-') ?></code></p>
        <p class="muted" style="margin:0;"><?= date('d-m-Y H:i:s') ?></p>
      </div>
    </div>

    <p class="footer-note">Praktikum Pemrograman Web Lanjutan · PHP · MySQL · Laravel</p>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/bash.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('pre code').forEach((el) => hljs.highlightElement(el));
    });
  </script>
</body>
</html>
