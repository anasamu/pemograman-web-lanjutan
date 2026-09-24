<?php
$title = 'Pertemuan 15 · Skeleton Proyek';
$meeting = 15;
$slideFile = '15-proyek-akhir.html';
$latihanSlug = 'proyek';
$note = 'Contoh daftar data yang merepresentasikan hasil proyek mahasiswa.';

$source = <<<'CODE'
$mahasiswa = [
    ["id" => 1, "nama" => "Andi", "nim" => "2023001"],
    ["id" => 2, "nama" => "Budi", "nim" => "2023002"],
];

echo "<h2>Proyek Mahasiswa</h2>";
foreach ($mahasiswa as $mhs) {
    echo "ID: {$mhs["id"]} | Nama: {$mhs["nama"]} | NIM: {$mhs["nim"]}<br>";
}
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
