<?php
/**
 * LATIHAN 5 — Laravel & MVC
 * Kerjakan di bawah TODO, lalu bandingkan dengan demo di localhost:8000
 */

declare(strict_types=1);

$title = 'Latihan 5 · Laravel & MVC';
$css = '../assets/praktikum.css';

// --- Model sederhana ---
$modelMahasiswa = [
    ['nama' => 'Andi', 'nim' => '2023001'],
    ['nama' => 'Budi', 'nim' => '2023002'],
];

// --- Controller ---
function latihanIndex(array $data): string
{
    $html = '<h3>Hasil Controller@index</h3><ul>';
    foreach ($data as $m) {
        $html .= '<li>' . htmlspecialchars($m['nama']) . ' — ' . htmlspecialchars($m['nim']) . '</li>';
    }
    $html .= '</ul>';
    return $html;
}

$viewOutput = latihanIndex($modelMahasiswa);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="<?= htmlspecialchars($css) ?>" />
</head>
<body>
  <div class="topbar">
    <div class="nav-wrap">
      <a href="../index.php">← Beranda</a>
      <div class="nav-group">
        <a href="../slides/05-pengantar-laravel-mvc.html">Slide</a>
        <a href="../contoh/pertemuan-05-mvc.php">Contoh</a>
        <a href="http://localhost:8000" target="_blank" rel="noopener">Buka Laravel :8000</a>
      </div>
    </div>
  </div>

  <div class="page" style="max-width:960px;margin:28px auto 48px;padding:0 18px;">
    <div class="panel">
      <div class="badge">Latihan · Pertemuan 05</div>
      <h1 style="margin-top:14px;">Laravel &amp; MVC</h1>
      <p class="muted">Latihan ini berjalan di PHP biasa. Untuk merasakan server Laravel practice, buka
        <a href="http://localhost:8000" target="_blank" rel="noopener">http://localhost:8000</a>
        (service <code>laravel</code> di Docker Compose).</p>

      <h2>Tugas</h2>
      <ol class="slide-points">
        <li>Jelaskan peran <strong>Model</strong>, <strong>View</strong>, dan <strong>Controller</strong> dengan kalimat sendiri.</li>
        <li>Tuliskan contoh route GET untuk halaman home (gaya Laravel).</li>
        <li>Buat method <code>index()</code> pada controller yang mengembalikan daftar data.</li>
        <li>Bandingkan pemisahan route di <code>web.php</code> dengan logika di controller.</li>
      </ol>

      <h2>Demo cepat di halaman ini</h2>
      <div class="demo"><?= $viewOutput ?></div>

      <h2>Contoh jawaban (referensi)</h2>
      <pre><code>// routes/web.php
Route::get('/', [HomeController::class, 'index']);

// app/Http/Controllers/HomeController.php
class HomeController {
    public function index() {
        $data = Mahasiswa::all(); // Model
        return view('home', compact('data')); // View
    }
}</code></pre>

      <p class="muted">TODO mahasiswa: edit file ini, tambahkan penjelasan, dan uji ulang di browser.</p>
    </div>
  </div>
</body>
</html>
