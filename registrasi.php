<?php
include 'config.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($cek->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar'); window.location='register.php';</script>";
    } else {
        $conn->query("INSERT INTO users (nama, nisn, email, nohp, password) VALUES ('$nama','$nisn','$email','$nohp','$password')");
        echo "<script>alert('Registrasi berhasil! Silahkan login.'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - PPDB Online</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="form-container">
    <h2>Registrasi Akun</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
        <input type="text" name="nisn" placeholder="NISN" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="nohp" placeholder="No HP" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="register">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login</a></p>
</div>

</body>
</html>
