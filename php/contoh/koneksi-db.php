<?php
$title = 'Koneksi Database';
$meeting = 7;
$slideFile = '07-database-mysql.html';
$latihanSlug = 'database';
$note = 'Menguji koneksi mysqli ke service database Docker (host: db).';

$source = <<<'CODE'
$host = getenv('MYSQL_HOST') ?: 'db';
$user = getenv('MYSQL_USER') ?: 'webuser';
$pass = getenv('MYSQL_PASSWORD') ?: 'webpass';
$dbname = getenv('MYSQL_DATABASE') ?: 'web_lanjutan';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die('Koneksi database gagal: ' . $conn->connect_error);
}
echo 'Koneksi database berhasil!';
$conn->close();
CODE;

ob_start();
$host = getenv('MYSQL_HOST') ?: 'db';
$user = getenv('MYSQL_USER') ?: 'webuser';
$pass = getenv('MYSQL_PASSWORD') ?: 'webpass';
$dbname = getenv('MYSQL_DATABASE') ?: 'web_lanjutan';
try {
    $conn = @new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
    echo 'Koneksi database berhasil!';
    $conn->close();
} catch (Throwable $e) {
    echo 'Koneksi database belum tersedia: ' . htmlspecialchars($e->getMessage());
}
$output = ob_get_clean();

require __DIR__ . '/_layout.php';
