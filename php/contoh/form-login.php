<?php
session_start();
$title = 'Form Login';
$meeting = 9;
$slideFile = '09-authentication-session.html';
$latihanSlug = 'auth';
$note = 'Demo login session. Username: admin · Password: 123';

$source = <<<'CODE'
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    if ($user === 'admin' && $pass === '123') {
        $_SESSION['user'] = $user;
        echo 'Login berhasil';
    } else {
        echo 'Login gagal';
    }
}
?>
<form method="post">
  <input name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <button type="submit">Login</button>
</form>
<?php
CODE;

ob_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    if ($user === 'admin' && $pass === '123') {
        $_SESSION['user'] = $user;
        echo 'Login berhasil. Selamat datang, ' . htmlspecialchars($user);
    } else {
        echo 'Login gagal.';
    }
    echo '<br><br>';
}
if (!empty($_SESSION['user'])) {
    echo 'Session aktif: ' . htmlspecialchars($_SESSION['user']) . '<br><br>';
}
?>
<form method="post">
  <input name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>
  <button class="btn btn-primary" type="submit">Login</button>
</form>
<?php
$output = ob_get_clean();

require __DIR__ . '/_layout.php';
