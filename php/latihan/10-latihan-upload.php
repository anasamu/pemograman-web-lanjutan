<?php
$title = 'Upload File';
$meeting = 10;
$slideFile = '10-upload-file.html';
$contohFile = 'pertemuan-10-upload.php';
$hint = 'Gunakan move_uploaded_file() dan cek $_FILES[\'berkas\'][\'error\'].';
$tasks = [
    'Buat form upload dengan <code>enctype="multipart/form-data"</code>.',
    'Validasi ekstensi file (jpg, png, pdf, txt).',
    'Simpan file ke folder <code>uploads/</code>.',
];
$starterCode = <<<'CODE'
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["berkas"])) {
    // TODO: validasi & simpan file
}
?>
CODE;

ob_start();
$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_FILES['berkas'])) {
    $file = $_FILES['berkas'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'pdf', 'txt'];
    if (!in_array($ext, $allowed, true)) {
        echo '<p>Ekstensi tidak diizinkan.</p>';
    } elseif ($file['error'] === UPLOAD_ERR_OK) {
        $target = $uploadDir . basename($file['name']);
        echo move_uploaded_file($file['tmp_name'], $target)
            ? '<p>Upload berhasil: ' . htmlspecialchars($file['name']) . '</p>'
            : '<p>Gagal menyimpan file.</p>';
    }
}
?>
<form method="post" enctype="multipart/form-data" style="display:grid;gap:10px;max-width:420px;">
  <input type="file" name="berkas" required>
  <button class="btn btn-primary" type="submit">Upload</button>
</form>
<?php
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
