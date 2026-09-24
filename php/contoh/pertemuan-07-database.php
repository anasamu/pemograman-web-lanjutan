<?php
$title = 'Pertemuan 07 · Koneksi Database';
$meeting = 7;
$slideFile = '07-database-mysql.html';
$latihanSlug = 'database';
$note = 'Membaca tabel mahasiswa dari MySQL container.';

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
    $result = $conn->query("SELECT * FROM mahasiswa");
    echo "<h2>Data Mahasiswa</h2>";
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo htmlspecialchars($row["id"] . " - " . $row["nama"] . " - " . $row["nim"]) . "<br>";
        }
    } else {
        echo "Tidak ada data.";
    }
    $conn->close();
} catch (Throwable $e) {
    echo "<p>Koneksi database belum tersedia: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p class=\"muted\">Jalankan Docker Compose agar service <code>db</code> aktif.</p>";
}
$output = ob_get_clean();

$source = <<<'CODE'
$host = "db";
$user = "webuser";
$pass = "webpass";
$dbname = "web_lanjutan";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM mahasiswa");
echo "<h2>Data Mahasiswa</h2>";
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["id"] . " - " . $row["nama"] . " - " . $row["nim"] . "<br>";
    }
} else {
    echo "Tidak ada data.";
}
$conn->close();
CODE;

require __DIR__ . "/_layout.php";
