<?php
$title = 'PHP Dasar — Identitas Mahasiswa';
$meeting = 1;
$slideFile = '01-pengantar-web-dinamis-php.html';
$contohFile = 'pertemuan-01-php-dasar.php';
$hint = 'Gunakan echo dan interpolasi string. Ganti nilai variabel dengan data Anda.';
$tasks = [
    'Buat variabel <code>$nama</code>, <code>$nim</code>, dan <code>$jurusan</code>.',
    'Tampilkan sapaan: <em>Halo, {nama}!</em>',
    'Tampilkan NIM, jurusan, dan hari ini (<code>date(\'l\')</code>).',
];
$starterCode = <<<'CODE'
<?php
$nama = "Nama Mahasiswa";
$nim = "2023001";
$jurusan = "Informatika";
$hari = date("l");

// TODO: tampilkan output identitas
?>
CODE;

$nama = 'Nama Mahasiswa';
$nim = '2023001';
$jurusan = 'Informatika';
$hari = date('l');

ob_start();
echo '<p><strong>Halo, ' . htmlspecialchars($nama) . '!</strong></p>';
echo '<p>NIM: ' . htmlspecialchars($nim) . '<br>Jurusan: ' . htmlspecialchars($jurusan) . '<br>Hari: ' . htmlspecialchars($hari) . '</p>';
echo '<p class="muted">TODO: ganti data di atas dengan identitas Anda sendiri.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
