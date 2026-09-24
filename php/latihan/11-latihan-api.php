<?php
$data = [
    ['nama' => 'Andi', 'nim' => '2023001'],
    ['nama' => 'Budi', 'nim' => '2023002'],
    ['nama' => 'Citra', 'nim' => '2023003'],
];

if (isset($_GET['format']) && $_GET['format'] === 'json') {
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$title = 'API & JSON';
$meeting = 11;
$slideFile = '11-api-dan-json.html';
$contohFile = 'pertemuan-11-api-json.php';
$hint = "header('Content-Type: application/json'); lalu json_encode().";
$tasks = [
    'Buat array data mahasiswa.',
    'Jika <code>?format=json</code>, kembalikan JSON murni.',
    'Selain itu tampilkan preview di HTML.',
];
$starterCode = <<<'CODE'
<?php
$data = [/* ... */];
if (isset($_GET["format"]) && $_GET["format"] === "json") {
    header("Content-Type: application/json");
    echo json_encode($data);
    exit;
}
?>
CODE;

ob_start();
echo '<pre>' . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) . '</pre>';
echo '<p><a href="?format=json">Lihat JSON murni</a></p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
