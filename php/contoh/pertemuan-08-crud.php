<?php
$title = 'Pertemuan 08 · CRUD Mahasiswa';
$meeting = 8;
$slideFile = '08-crud-database.html';
$latihanSlug = 'crud';
$note = 'Contoh alur Create + Read pada tabel mahasiswa.';

ob_start();
$host = getenv("MYSQL_HOST") ?: "db";
$user = getenv("MYSQL_USER") ?: "webuser";
$pass = getenv("MYSQL_PASSWORD") ?: "webpass";
$dbname = getenv("MYSQL_DATABASE") ?: "web_lanjutan";

try {
    $conn = @new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
    $conn->query("INSERT IGNORE INTO mahasiswa (nama, nim, jurusan) VALUES ('Eka', '2023005', 'Teknik Informatika')");
    $result = $conn->query("SELECT * FROM mahasiswa ORDER BY id");
    echo "<h2>CRUD Mahasiswa</h2>";
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo htmlspecialchars($row["id"] . " | " . $row["nama"] . " | " . $row["nim"]) . "<br>";
        }
    }
    $conn->close();
} catch (Throwable $e) {
    echo "<p>Koneksi database belum tersedia: " . htmlspecialchars($e->getMessage()) . "</p>";
}
$output = ob_get_clean();

$source = <<<'CODE'
$conn = new mysqli("db", "webuser", "webpass", "web_lanjutan");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// CREATE (abaikan jika sudah ada)
$conn->query("INSERT IGNORE INTO mahasiswa (nama, nim, jurusan)
              VALUES ('Eka', '2023005', 'Teknik Informatika')");

// READ
$result = $conn->query("SELECT * FROM mahasiswa ORDER BY id");
echo "<h2>CRUD Mahasiswa</h2>";
while ($row = $result->fetch_assoc()) {
    echo $row["id"] . " | " . $row["nama"] . " | " . $row["nim"] . "<br>";
}
$conn->close();
CODE;

require __DIR__ . "/_layout.php";
