<?php
$title = 'Routing & Controller';
$meeting = 6;
$slideFile = '06-routing-dan-controller.html';
$contohFile = 'pertemuan-06-routing-controller.php';
$hint = "Di Laravel: Route::get('/mahasiswa', [MahasiswaController::class, 'index']);";
$tasks = [
    'Buat contoh route untuk <code>/mahasiswa</code>.',
    'Buat <code>MahasiswaController</code> dengan method <code>index()</code>.',
    'Jelaskan bagaimana route memanggil controller.',
];
$starterCode = <<<'CODE'
<?php
// Route::get("/mahasiswa", [MahasiswaController::class, "index"]);

class MahasiswaController {
    public function index() {
        return "Daftar Mahasiswa";
    }
}
?>
CODE;

ob_start();
$route = '/mahasiswa';
$controller = 'MahasiswaController';
$method = 'index';
echo '<p>Route: <code>' . htmlspecialchars($route) . '</code></p>';
echo '<p>Controller: <code>' . htmlspecialchars($controller . '@' . $method) . '</code></p>';
echo '<p>Hasil: <strong>Daftar Mahasiswa</strong></p>';
echo '<p class="muted">TODO: tambahkan route /mahasiswa/{id} di komentar file.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
