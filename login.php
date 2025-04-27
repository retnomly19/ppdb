<?php
include 'config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $cek->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Login gagal. Cek kembali email dan password.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - PPDB Online</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="form-container">
    <h2>Login Akun</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar</a></p>
</div>

</body>
</html>
