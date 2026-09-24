<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Form</title>
</head>
<body>
    <h2>Form Login Mahasiswa</h2>

    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username"><br><br>

        <label>Password:</label>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>

    <?php
    // LATIHAN 4 - FORM HANDLING
    // TODO:
    // 1. Ambil data username dan password dari $_POST
    // 2. Jika username dan password kosong, tampilkan pesan error
    // 3. Jika username = admin dan password = 12345, tampilkan 'Login berhasil'
    // 4. Jika tidak, tampilkan 'Login gagal'
    ?>
</body>
</html>
