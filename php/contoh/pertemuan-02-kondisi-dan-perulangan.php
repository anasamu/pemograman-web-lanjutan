<?php
$title = 'Pertemuan 02 · Kondisi & Perulangan';
$meeting = 2;
$slideFile = '02-logika-kontrol-dan-perulangan.html';
$latihanSlug = 'logika';
$note = 'Bandingkan hasil if-else dengan output perulangan for.';

$source = <<<'CODE'
$nilai = 85;

echo "<h2>Hasil Nilai</h2>";
if ($nilai >= 85) {
    echo "Sangat Baik";
} elseif ($nilai >= 70) {
    echo "Baik";
} elseif ($nilai >= 60) {
    echo "Cukup";
} else {
    echo "Perlu Remedial";
}

echo "<br><br>Daftar angka 1 sampai 5:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
