<?php
$title = 'Pertemuan 10 · Upload File';
$meeting = 10;
$slideFile = '10-upload-file.html';
$latihanSlug = 'upload';
$note = 'Mengunggah file ke folder uploads/ dengan validasi ekstensi dasar.';

ob_start();
$uploadDir = __DIR__ . "/uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["berkas"])) {
    $file = $_FILES["berkas"];
    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "pdf", "txt"];
    if (!in_array($ext, $allowed, true)) {
        echo "Tipe file tidak diizinkan.";
    } elseif ($file["error"] === UPLOAD_ERR_OK) {
        $target = $uploadDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target)) {
            echo "Upload berhasil: " . htmlspecialchars($file["name"]);
        } else {
            echo "Gagal menyimpan file.";
        }
    } else {
        echo "Terjadi kesalahan upload.";
    }
    echo "<br><br>";
}
?>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="berkas" required>
  <button class="btn btn-primary" type="submit">Upload</button>
</form>
<?php
$output = ob_get_clean();
$source = <<<'CODE'
$uploadDir = __DIR__ . "/uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["berkas"])) {
    $file = $_FILES["berkas"];
    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "pdf", "txt"];

    if (!in_array($ext, $allowed, true)) {
        echo "Tipe file tidak diizinkan.";
    } elseif ($file["error"] === UPLOAD_ERR_OK) {
        $target = $uploadDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $target)) {
            echo "Upload berhasil: " . htmlspecialchars($file["name"]);
        } else {
            echo "Gagal menyimpan file.";
        }
    }
}
?>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="berkas" required>
  <button type="submit">Upload</button>
</form>
<?php
CODE;

require __DIR__ . "/_layout.php";
