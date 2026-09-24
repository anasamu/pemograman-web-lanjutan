<?php
$title = 'CRUD Database — Tambah & Tampil';
$meeting = 8;
$slideFile = '08-crud-database.html';
$contohFile = 'pertemuan-08-crud.php';
$hint = 'Mulai dari CREATE + READ. UPDATE/DELETE bisa ditambahkan bertahap.';
$tasks = [
    'Buat form tambah data mahasiswa (nama, NIM, jurusan).',
    'Simpan ke database saat form dikirim.',
    'Tampilkan daftar mahasiswa.',
    'Opsional: tombol edit dan delete.',
];
$starterCode = <<<'CODE'
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // TODO: INSERT data mahasiswa
}
// TODO: SELECT dan tampilkan daftar
?>
CODE;

ob_start();
$host = getenv('MYSQL_HOST') ?: 'db';
$user = getenv('MYSQL_USER') ?: 'webuser';
$pass = getenv('MYSQL_PASSWORD') ?: 'webpass';
$dbname = getenv('MYSQL_DATABASE') ?: 'web_lanjutan';
$flash = '';
try {
    $conn = @new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        $nama = trim($_POST['nama'] ?? '');
        $nim = trim($_POST['nim'] ?? '');
        $jurusan = trim($_POST['jurusan'] ?? '');
        if ($nama !== '' && $nim !== '') {
            $stmt = $conn->prepare('INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)');
            $stmt->bind_param('sss', $nama, $nim, $jurusan);
            $stmt->execute();
            $flash = 'Data berhasil ditambahkan.';
            $stmt->close();
        } else {
            $flash = 'Nama dan NIM wajib diisi.';
        }
    }
    if ($flash !== '') {
        echo '<p><strong>' . htmlspecialchars($flash) . '</strong></p>';
    }
    ?>
<form method="post" style="display:grid;gap:10px;max-width:420px;margin-bottom:16px;">
  <label>Nama<br><input type="text" name="nama" required></label>
  <label>NIM<br><input type="text" name="nim" required></label>
  <label>Jurusan<br><input type="text" name="jurusan"></label>
  <button class="btn btn-primary" type="submit">Tambah</button>
</form>
<?php
    $result = $conn->query('SELECT id, nama, nim, jurusan FROM mahasiswa ORDER BY id DESC LIMIT 20');
    echo '<table style="width:100%;border-collapse:collapse"><tr><th align="left">ID</th><th align="left">Nama</th><th align="left">NIM</th><th align="left">Jurusan</th></tr>';
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td>' . (int) $row['id'] . '</td><td>' . htmlspecialchars($row['nama']) . '</td><td>' . htmlspecialchars($row['nim']) . '</td><td>' . htmlspecialchars($row['jurusan'] ?? '-') . '</td></tr>';
        }
    }
    echo '</table><p class="muted">TODO: tambahkan aksi edit &amp; delete.</p>';
    $conn->close();
} catch (Throwable $e) {
    echo '<p>Database belum siap: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
