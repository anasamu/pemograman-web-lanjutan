<?php
$title = 'Proyek Akhir — Checklist Integrasi';
$meeting = 15;
$slideFile = '15-proyek-akhir.html';
$contohFile = 'pertemuan-15-proyek.php';
$hint = 'Centang fitur yang sudah selesai di area kerja, lalu lengkapi yang masih TODO.';
$tasks = [
    'Integrasikan login, CRUD mahasiswa, dan koneksi database.',
    'Pastikan struktur folder rapi (MVC atau terpisah jelas).',
    'Uji setiap fitur sebelum presentasi.',
];
$starterCode = <<<'CODE'
<?php
$fitur = [
    "Login/Session" => false,
    "CRUD Mahasiswa" => false,
    "Upload file" => false,
    "API JSON" => false,
];
?>
CODE;

$fitur = [
    'Login / Session' => true,
    'CRUD Mahasiswa' => true,
    'Upload file' => false,
    'API JSON' => false,
    'Validasi input' => true,
];

ob_start();
echo '<ul>';
foreach ($fitur as $nama => $ok) {
    $status = $ok ? '✓ siap' : '○ TODO';
    $color = $ok ? '#0f766e' : '#b45309';
    echo '<li><strong>' . htmlspecialchars($nama) . '</strong> — <span style="color:' . $color . '">' . $status . '</span></li>';
}
echo '</ul><p class="muted">TODO: ubah status fitur sesuai proyek Anda.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
