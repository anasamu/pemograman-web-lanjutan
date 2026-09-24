<?php
$title = 'Pertemuan 03 · Fungsi & Array';
$meeting = 3;
$slideFile = '03-fungsi-dan-array.html';
$latihanSlug = 'fungsi-array';
$note = 'Fungsi hitungLuas() dipanggil sekali, array ditampilkan dengan foreach.';

$source = <<<'CODE'
function hitungLuas($panjang, $lebar) {
    return $panjang * $lebar;
}

$mahasiswa = ["Andi", "Budi", "Citra"];
$siswa = ["nama" => "Dina", "nim" => "2023004"];

echo "<h2>Fungsi dan Array</h2>";
echo "Luas persegi panjang = " . hitungLuas(10, 5) . "<br>";
echo "Daftar mahasiswa:<br>";
foreach ($mahasiswa as $nama) {
    echo "- " . $nama . "<br>";
}
echo "Data siswa: " . $siswa["nama"] . " - " . $siswa["nim"];
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
