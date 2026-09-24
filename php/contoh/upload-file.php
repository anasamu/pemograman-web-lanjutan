<?php
$title = 'Upload File';
$meeting = 10;
$slideFile = '10-upload-file.html';
$latihanSlug = 'upload';
$note = 'Upload ke folder contoh/uploads dengan validasi ekstensi.';

$source = <<<'CODE'
$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['berkas'])) {
    $file = $_FILES['berkas'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'pdf', 'txt'];
    if (in_array($ext, $allowed, true) && $file['error'] === UPLOAD_ERR_OK) {
        move_uploaded_file($file['tmp_name'], $uploadDir . basename($file['name']));
        echo 'Upload berhasil';
    } else {
        echo 'Upload gagal / tipe tidak diizinkan';
    }
}
?>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="berkas" required>
  <button type="submit">Upload</button>
</form>
<?php
CODE;

ob_start();
$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['berkas'])) {
    $file = $_FILES['berkas'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'pdf', 'txt'];
    if (!in_array($ext, $allowed, true)) {
        echo 'Tipe file tidak diizinkan.';
    } elseif ($file['error'] === UPLOAD_ERR_OK) {
        $target = $uploadDir . basename($file['name']);
        echo move_uploaded_file($file['tmp_name'], $target)
            ? 'Upload berhasil: ' . htmlspecialchars($file['name'])
            : 'Gagal menyimpan file.';
    }
    echo '<br><br>';
}
?>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="berkas" required>
  <button class="btn btn-primary" type="submit">Upload</button>
</form>
<?php
$output = ob_get_clean();

require __DIR__ . '/_layout.php';
