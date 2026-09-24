<?php
$title = 'Presentasi & Evaluasi';
$meeting = 16;
$slideFile = '16-presentasi-evaluasi.html';
$contohFile = 'pertemuan-16-presentasi.php';
$hint = 'Sajikan dalam 5–7 menit: masalah → solusi → demo → kesimpulan.';
$tasks = [
    'Susun outline presentasi proyek akhir.',
    'Jelaskan fitur utama aplikasi.',
    'Siapkan demo singkat / screenshot.',
    'Tulis kesimpulan dan saran pengembangan.',
];
$starterCode = <<<'CODE'
<?php
$judul = "Sistem Informasi Mahasiswa";
$fitur = ["Login", "CRUD", "Upload", "API"];
// TODO: kesimpulan & saran
?>
CODE;

$judul = 'Sistem Informasi Mahasiswa';
$fitur = ['Login & Session', 'CRUD Mahasiswa', 'Upload Berkas', 'API JSON'];

ob_start();
echo '<h3>' . htmlspecialchars($judul) . '</h3>';
echo '<p>Fitur utama:</p><ul>';
foreach ($fitur as $f) {
    echo '<li>' . htmlspecialchars($f) . '</li>';
}
echo '</ul>';
echo '<p><strong>Kesimpulan:</strong> Aplikasi membantu pengelolaan data mahasiswa secara terstruktur.</p>';
echo '<p><strong>Saran:</strong> Tambahkan role admin/mahasiswa dan export laporan.</p>';
echo '<p class="muted">TODO: sesuaikan judul, fitur, dan kesimpulan dengan proyek Anda.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
