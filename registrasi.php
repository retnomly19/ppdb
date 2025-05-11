<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Cek apakah username sudah ada
    $cekUsername = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($cekUsername->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
    } else {
        // Simpan data pengguna ke dalam tabel users dengan role 'user'
        $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')");
        
        // Ambil ID user yang baru dibuat
        $userId = $conn->insert_id;
        
        // Simpan data login ke session untuk auto-login
        $_SESSION['user'] = [
            'id' => $userId,
            'username' => $username,
            'role' => 'user', // Role 'user'
        ];

        echo "<script>alert('Registrasi berhasil! Anda sekarang login.'); window.location.href = 'dashboard.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="login-background">
    <div class="card">
        <img src="assets/logo.png" alt="Logo">
        <h2>Form Registrasi</h2>
        <form method="POST">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</div>
</body>
</html>
