<?php
$title = 'Form Handling — Login Mahasiswa';
$meeting = 4;
$slideFile = '04-form-handling-php.html';
$contohFile = 'pertemuan-04-form.php';
$hint = 'Gunakan htmlspecialchars() saat menampilkan input. Coba: admin / 12345';
$tasks = [
    'Ambil <code>username</code> dan <code>password</code> dari <code>$_POST</code>.',
    'Jika kosong, tampilkan pesan error.',
    'Jika username = <code>admin</code> dan password = <code>12345</code>, tampilkan Login berhasil.',
    'Selain itu tampilkan Login gagal.',
];
$starterCode = <<<'CODE'
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    // TODO: validasi & cek login
}
?>
CODE;

ob_start();
$msg = '';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($username === '' || $password === '') {
        $msg = 'Username dan password wajib diisi.';
    } elseif ($username === 'admin' && $password === '12345') {
        $msg = 'Login berhasil. Selamat datang, admin.';
    } else {
        $msg = 'Login gagal.';
    }
}
if ($msg !== '') {
    echo '<p><strong>' . htmlspecialchars($msg) . '</strong></p>';
}
?>
<form method="post" style="display:grid;gap:10px;max-width:360px;">
  <label>Username<br><input type="text" name="username" required></label>
  <label>Password<br><input type="password" name="password" required></label>
  <button class="btn btn-primary" type="submit">Login</button>
</form>
<p class="muted" style="margin-top:12px;">Coba: admin / 12345</p>
<?php
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
