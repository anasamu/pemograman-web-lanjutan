<?php
/**
 * Mini Laravel Practice — MVC demo yang langsung jalan di localhost:8000
 * Diganti dengan Laravel penuh kapan saja via: composer create-project laravel/laravel .
 */

declare(strict_types=1);

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$uri = rtrim($uri, '/') ?: '/';

$mahasiswa = [
    ['id' => 1, 'nama' => 'Andi Pratama', 'nim' => '2023001', 'jurusan' => 'Informatika'],
    ['id' => 2, 'nama' => 'Budi Santoso', 'nim' => '2023002', 'jurusan' => 'Sistem Informasi'],
    ['id' => 3, 'nama' => 'Citra Lestari', 'nim' => '2023003', 'jurusan' => 'Informatika'],
];

function layout(string $title, string $body): void
{
    echo <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{$title} · Laravel Praktikum</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg:#f3f6f9; --ink:#0f1c2e; --muted:#5b6b7c; --accent:#0f766e; --accent2:#c2410c;
      --line:rgba(15,28,46,.12); --panel:rgba(255,255,255,.88);
    }
    *{box-sizing:border-box} body{margin:0;font-family:"Plus Jakarta Sans",system-ui,sans-serif;color:var(--ink);
      background:radial-gradient(ellipse 70% 45% at 0% 0%,rgba(15,118,110,.16),transparent 55%),linear-gradient(160deg,#f3f6f9,#e8eef4);min-height:100vh}
    .wrap{max-width:960px;margin:0 auto;padding:28px 18px 60px}
    .nav{display:flex;gap:14px;flex-wrap:wrap;margin-bottom:22px}
    a{color:var(--accent);font-weight:700;text-decoration:none} a:hover{text-decoration:underline}
    .panel{background:var(--panel);border:1px solid var(--line);border-radius:22px;padding:28px;box-shadow:0 24px 50px rgba(15,28,46,.1)}
    h1,h2{font-family:"Space Grotesk",system-ui,sans-serif;letter-spacing:-.03em;margin-top:0}
    h1{font-size:clamp(1.8rem,3vw,2.6rem)} .muted{color:var(--muted);line-height:1.7}
    .badge{display:inline-block;padding:6px 12px;border-radius:999px;background:rgba(15,118,110,.12);color:var(--accent);font-size:.78rem;font-weight:800;letter-spacing:.04em;text-transform:uppercase}
    table{width:100%;border-collapse:collapse;margin-top:14px} th,td{text-align:left;padding:10px 8px;border-bottom:1px solid var(--line)}
    code{background:rgba(15,118,110,.1);padding:2px 7px;border-radius:7px;font-size:.9em}
    pre{background:#0f1c2e;color:#e8eef4;padding:16px;border-radius:14px;overflow:auto;line-height:1.6}
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px;margin-top:16px}
    .card{background:#fff;border:1px solid var(--line);border-radius:14px;padding:16px}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="nav">
      <a href="/">Home</a>
      <a href="/mahasiswa">Mahasiswa</a>
      <a href="/about">About MVC</a>
    </div>
    <div class="panel">{$body}</div>
  </div>
</body>
</html>
HTML;
}

if ($uri === '/') {
    $body = <<<HTML
      <div class="badge">Laravel Practice · Port 8000</div>
      <h1>Selamat datang di latihan Laravel &amp; MVC</h1>
      <p class="muted">Aplikasi mini ini langsung jalan tanpa menunggu <code>composer create-project</code>.
      Gunakan untuk memahami alur <strong>Route → Controller → View</strong> sebelum beralih ke Laravel penuh.</p>
      <div class="grid">
        <div class="card"><strong>Route</strong><br><span class="muted">URL dipetakan ke aksi</span></div>
        <div class="card"><strong>Controller</strong><br><span class="muted">Logika request</span></div>
        <div class="card"><strong>View</strong><br><span class="muted">Tampilan HTML</span></div>
      </div>
      <p style="margin-top:18px"><a href="/mahasiswa">Lihat daftar mahasiswa →</a></p>
    HTML;
    layout('Home', $body);
    exit;
}

if ($uri === '/mahasiswa') {
    $rows = '';
    foreach ($mahasiswa as $m) {
        $rows .= '<tr><td>' . $m['id'] . '</td><td>' . htmlspecialchars($m['nama']) . '</td><td>' .
            htmlspecialchars($m['nim']) . '</td><td>' . htmlspecialchars($m['jurusan']) . '</td></tr>';
    }
    $body = <<<HTML
      <div class="badge">Controller · MahasiswaController@index</div>
      <h1>Daftar Mahasiswa</h1>
      <p class="muted">Data ini berperan sebagai <strong>Model</strong>. Tabel di bawah adalah <strong>View</strong>.</p>
      <table>
        <thead><tr><th>ID</th><th>Nama</th><th>NIM</th><th>Jurusan</th></tr></thead>
        <tbody>{$rows}</tbody>
      </table>
    HTML;
    layout('Mahasiswa', $body);
    exit;
}

if ($uri === '/about') {
    $body = <<<'HTML'
<div class="badge">Konsep</div>
<h1>Bagaimana MVC bekerja di sini</h1>
<p class="muted">Pada Laravel penuh, rute biasanya ditulis di <code>routes/web.php</code>:</p>
<pre>Route::get('/', [HomeController::class, 'index']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);</pre>
<p class="muted">Untuk mengganti demo ini dengan Laravel resmi:</p>
<pre>docker compose exec laravel bash
composer create-project laravel/laravel .
php artisan serve --host=0.0.0.0 --port=8000</pre>
HTML;
    layout('About', $body);
    exit;
}

http_response_code(404);
layout('404', '<h1>404</h1><p class="muted">Halaman tidak ditemukan. <a href="/">Kembali ke home</a></p>');
