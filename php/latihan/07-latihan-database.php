<?php
$title = 'Database MySQL — Baca Tabel Mahasiswa';
$meeting = 7;
$slideFile = '07-database-mysql.html';
$contohFile = 'pertemuan-07-database.php';
$hint = 'User: webuser · Password: webpass · Host Docker: db';
$tasks = [
    'Buat koneksi ke database <code>web_lanjutan</code> (host <code>db</code>).',
    'Query semua data dari tabel <code>mahasiswa</code>.',
    'Tampilkan nama, NIM, dan jurusan.',
];
$starterCode = <<<'CODE'
<?php
$conn = new mysqli("db", "webuser", "webpass", "web_lanjutan");
$result = $conn->query("SELECT * FROM mahasiswa");
// TODO: tampilkan baris hasil
?>
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
    $result = $conn->query('SELECT nama, nim, jurusan FROM mahasiswa');
    if ($result && $result->num_rows > 0) {
        echo '<table style="width:100%;border-collapse:collapse"><tr><th align="left">Nama</th><th align="left">NIM</th><th align="left">Jurusan</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td>' . htmlspecialchars($row['nama']) . '</td><td>' . htmlspecialchars($row['nim']) . '</td><td>' . htmlspecialchars($row['jurusan'] ?? '-') . '</td></tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Tidak ada data. Pastikan tabel mahasiswa sudah terisi.</p>';
    }
    $conn->close();
} catch (Throwable $e) {
    echo '<p>Koneksi belum tersedia: ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p class="muted">Jalankan Docker Compose agar service <code>db</code> aktif.</p>';
}
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
