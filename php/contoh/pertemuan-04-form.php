<?php
$title = 'Pertemuan 04 · Form Handling';
$meeting = 4;
$slideFile = '04-form-handling-php.html';
$latihanSlug = 'form';
$note = 'Kirim nama dan NIM lewat method POST, lalu tampilkan hasilnya.';

ob_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = htmlspecialchars($_POST["nama"] ?? "");
    $nim = htmlspecialchars($_POST["nim"] ?? "");
    if ($nama !== "" && $nim !== "") {
        echo "Nama: $nama <br>";
        echo "NIM: $nim";
    } else {
        echo "Mohon isi semua data!";
    }
    echo "<br><br>";
}
?>
<form method="post">
  <label>Nama <input type="text" name="nama" required></label><br><br>
  <label>NIM <input type="text" name="nim" required></label><br><br>
  <button class="btn btn-primary" type="submit">Kirim</button>
</form>
<?php
$output = ob_get_clean();
$source = <<<'CODE'
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = htmlspecialchars($_POST["nama"] ?? "");
    $nim = htmlspecialchars($_POST["nim"] ?? "");

    if ($nama !== "" && $nim !== "") {
        echo "Nama: $nama <br>";
        echo "NIM: $nim";
    } else {
        echo "Mohon isi semua data!";
    }
}
?>
<form method="post">
  <label>Nama <input type="text" name="nama"></label><br><br>
  <label>NIM <input type="text" name="nim"></label><br><br>
  <button type="submit">Kirim</button>
</form>
<?php
CODE;

require __DIR__ . "/_layout.php";
