<?php
$title = 'Pertemuan 16 · Outline Presentasi';
$meeting = 16;
$slideFile = '16-presentasi-evaluasi.html';
$latihanSlug = 'presentasi';
$note = 'Susunan poin presentasi yang dapat dipakai mahasiswa.';

$source = <<<'CODE'
$judul = "Sistem Informasi Mahasiswa";
$fitur = ["Login", "CRUD Mahasiswa", "Upload Berkas", "API JSON"];

echo "<h2>$judul</h2>";
echo "Fitur utama:<br>";
foreach ($fitur as $item) {
    echo "- $item <br>";
}
echo "<p>Kesimpulan: Aplikasi dapat digunakan untuk mengelola data mahasiswa secara terstruktur.</p>";
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
