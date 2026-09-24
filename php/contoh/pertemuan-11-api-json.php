<?php
$data = [
    ["nama" => "Andi", "nim" => "2023001"],
    ["nama" => "Budi", "nim" => "2023002"],
    ["nama" => "Citra", "nim" => "2023003"],
];

if (isset($_GET["format"]) && $_GET["format"] === "json") {
    header("Content-Type: application/json");
    echo json_encode($data);
    exit;
}

$title = 'Pertemuan 11 · API JSON';
$meeting = 11;
$slideFile = '11-api-dan-json.html';
$latihanSlug = 'api';
$note = 'Halaman ini dapat mengembalikan JSON murni jika dipanggil dengan ?format=json.';

ob_start();
echo "<h2>Preview Data API</h2>";
echo "<pre>" . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) . "</pre>";
echo '<p><a href="?format=json">Lihat respons JSON murni</a></p>';
$output = ob_get_clean();

$source = <<<'CODE'
$data = [
    ["nama" => "Andi", "nim" => "2023001"],
    ["nama" => "Budi", "nim" => "2023002"],
    ["nama" => "Citra", "nim" => "2023003"],
];

if (isset($_GET["format"]) && $_GET["format"] === "json") {
    header("Content-Type: application/json");
    echo json_encode($data);
    exit;
}

echo "<h2>Preview Data API</h2>";
echo "<pre>" . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT)) . "</pre>";
echo '<p><a href="?format=json">Lihat respons JSON murni</a></p>';
CODE;

require __DIR__ . "/_layout.php";
