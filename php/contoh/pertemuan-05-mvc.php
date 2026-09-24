<?php
$title = 'Pertemuan 05 · Konsep MVC';
$meeting = 5;
$slideFile = '05-pengantar-laravel-mvc.html';
$latihanSlug = 'laravel';
$note = 'Simulasi alur MVC sederhana tanpa framework penuh.';

$source = <<<'CODE'
// Model (data)
$dataMahasiswa = [
    ["nama" => "Andi", "nim" => "2023001"],
    ["nama" => "Budi", "nim" => "2023002"],
];

// Controller (logika)
function index($data) {
    echo "<h2>Daftar Mahasiswa</h2>";
    foreach ($data as $m) {
        echo $m["nama"] . " - " . $m["nim"] . "<br>";
    }
}

// View dipanggil lewat controller
index($dataMahasiswa);
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
