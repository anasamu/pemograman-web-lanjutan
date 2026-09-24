<?php
$title = 'Laravel & MVC';
$meeting = 5;
$slideFile = '05-pengantar-laravel-mvc.html';
$contohFile = 'pertemuan-05-mvc.php';
$hint = 'Bandingkan alur di bawah dengan demo Laravel di localhost:8000.';
$extraNav = '<a href="http://localhost:8000" target="_blank" rel="noopener">Laravel :8000</a>';
$tasks = [
    'Jelaskan peran <strong>Model</strong>, <strong>View</strong>, dan <strong>Controller</strong>.',
    'Tuliskan contoh route GET untuk halaman home (gaya Laravel).',
    'Buat method <code>index()</code> yang mengembalikan daftar data.',
    'Buka demo Laravel di <a href="http://localhost:8000" target="_blank" rel="noopener">localhost:8000</a>.',
];
$starterCode = <<<'CODE'
<?php
// routes/web.php
// Route::get("/", [HomeController::class, "index"]);

// HomeController.php
// public function index() {
//     $data = Mahasiswa::all();
//     return view("home", compact("data"));
// }
?>
CODE;

$data = [
    ['nama' => 'Andi', 'nim' => '2023001'],
    ['nama' => 'Budi', 'nim' => '2023002'],
];

ob_start();
echo '<p><strong>Controller@index</strong> menampilkan data Model:</p><ul>';
foreach ($data as $m) {
    echo '<li>' . htmlspecialchars($m['nama']) . ' — ' . htmlspecialchars($m['nim']) . '</li>';
}
echo '</ul><p class="muted">Ini simulasi View. TODO: tulis penjelasan MVC Anda di komentar file ini.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
