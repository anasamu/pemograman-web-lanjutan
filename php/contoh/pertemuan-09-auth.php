<?php
session_start();
$title = 'Pertemuan 09 · Login Session';
$meeting = 9;
$slideFile = '09-authentication-session.html';
$latihanSlug = 'auth';
$note = 'Demo login sederhana dengan session (user: admin / pass: 123).';

ob_start();
$validUser = "admin";
$validPass = "123";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    if ($username === $validUser && $password === $validPass) {
        $_SESSION["user"] = $username;
        echo "Login berhasil. Selamat datang, " . htmlspecialchars($username);
    } else {
        echo "Login gagal.";
    }
    echo "<br><br>";
}
if (!empty($_SESSION["user"])) {
    echo "Session aktif: " . htmlspecialchars($_SESSION["user"]) . "<br><br>";
}
?>
<form method="post">
  <input name="username" placeholder="Username" required>
  <input name="password" type="password" placeholder="Password" required>
  <button class="btn btn-primary" type="submit">Login</button>
</form>
<?php
$output = ob_get_clean();
$source = <<<'CODE'
session_start();

$validUser = "admin";
$validPass = "123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === $validUser && $password === $validPass) {
        $_SESSION["user"] = $username;
        echo "Login berhasil. Selamat datang, $username";
    } else {
        echo "Login gagal.";
    }
}
?>
<form method="post">
  <input name="username" placeholder="Username">
  <input name="password" type="password" placeholder="Password">
  <button type="submit">Login</button>
</form>
<?php
CODE;

require __DIR__ . "/_layout.php";
