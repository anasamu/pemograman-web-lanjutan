<?php
$title = 'Pertemuan 01 · PHP Dasar';
$meeting = 1;
$slideFile = '01-pengantar-web-dinamis-php.html';
$latihanSlug = 'php-dasar';
$note = 'Contoh menampilkan variabel PHP sederhana.';

$source = <<<'CODE'
$nama = "Mahasiswa Web";
$nim = "2023001";
$jurusan = "Informatika";

echo "<h2>Data Mahasiswa</h2>";
echo "Nama: $nama <br>";
echo "NIM: $nim <br>";
echo "Jurusan: $jurusan <br>";
echo "Selamat datang di Praktikum Pemrograman Web Lanjutan";
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
