<?php
session_start();

$title = 'Autentikasi & Session';
$meeting = 9;
$slideFile = '09-authentication-session.html';
$contohFile = 'pertemuan-09-auth.php';
$hint = 'Jangan lupa session_start() di awal file. Coba: admin / 12345';
$tasks = [
    'Buat form login dengan session.',
    'Simpan status login di <code>$_SESSION</code>.',
    'Tampilkan halaman berbeda saat sudah login.',
    'Tambahkan tombol logout.',
];
$starterCode = <<<'CODE'
<?php
session_start();
// TODO: proses login & logout
?>
CODE;

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header('Location: ' . strtok($_SERVER['REQUEST_URI'] ?? '', '?'));
    exit;
}

ob_start();
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = trim($_POST['password'] ?? '');
    if ($u === 'admin' && $p === '12345') {
        $_SESSION['user'] = $u;
    } else {
        echo '<p><strong>Login gagal.</strong></p>';
    }
}

if (!empty($_SESSION['user'])) {
    echo '<p>Anda login sebagai <strong>' . htmlspecialchars($_SESSION['user']) . '</strong>.</p>';
    echo '<p><a class="btn btn-secondary" href="?logout=1">Logout</a></p>';
} else {
    ?>
<form method="post" style="display:grid;gap:10px;max-width:360px;">
  <label>Username<br><input type="text" name="username" required></label>
  <label>Password<br><input type="password" name="password" required></label>
  <button class="btn btn-primary" type="submit">Login</button>
</form>
<p class="muted">Coba: admin / 12345</p>
<?php
}
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
