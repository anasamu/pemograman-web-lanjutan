<?php
$title = 'CRUD Sederhana';
$meeting = 8;
$slideFile = '08-crud-database.html';
$latihanSlug = 'crud';
$note = 'Versi ringkas Create + Read untuk tabel mahasiswa.';

$source = <<<'CODE'
$conn = new mysqli('db', 'webuser', 'webpass', 'web_lanjutan');
$conn->query("INSERT IGNORE INTO mahasiswa (nama, nim, jurusan)
              VALUES ('Fajar', '2023006', 'Informatika')");
$result = $conn->query('SELECT id, nama, nim FROM mahasiswa ORDER BY id');
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . ' | ' . $row['nama'] . ' | ' . $row['nim'] . "<br>";
}
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
    $conn->query("INSERT IGNORE INTO mahasiswa (nama, nim, jurusan) VALUES ('Fajar', '2023006', 'Informatika')");
    $result = $conn->query('SELECT id, nama, nim FROM mahasiswa ORDER BY id');
    echo '<h2>Data Mahasiswa</h2>';
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo htmlspecialchars($row['id'] . ' | ' . $row['nama'] . ' | ' . $row['nim']) . '<br>';
        }
    }
    $conn->close();
} catch (Throwable $e) {
    echo 'Koneksi database belum tersedia: ' . htmlspecialchars($e->getMessage());
}
$output = ob_get_clean();

require __DIR__ . '/_layout.php';
