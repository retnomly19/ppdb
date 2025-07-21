<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #f4f4f4;
        }
        .header {
            background:rgb(104, 6, 6);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 220px;
            height: calc(100% - 70px);
            background-color:rgb(104, 6, 6);
            padding-top: 20px;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
        }
        .sidebar h3 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .sidebar a:hover {
            background:rgb(174, 168, 168);
        }
        .content {
            margin-left: 240px;
            padding: 100px 40px 40px;
        }
        .welcome-box {
            background: rgba(198, 192, 192, 0.85);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .welcome-box h2 {
            margin: 0;
            font-size: 26px;
            color: #b30000;
        }
    </style>
</head>
<body>

<div class="header">📊 Dashboard Admin</div>

<div class="sidebar">
    <h3>📁 MENU</h3>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="data_pendaftar.php">🧾 Data Pendaftar</a>
    <a href="upload_berkas.php">📂 Upload Berkas</a>
    <a href="verifikasi.php">✔️ Verifikasi</a>
    <a href="../logout.php">🚪 Logout</a>
</div>

<div class="content">
    <div class="welcome-box">
        <h2>Selamat datang, <strong><?php echo $_SESSION['user']['username']; ?></strong>!</h2>
        <p>Ini adalah halaman utama dashboard admin. Silakan pilih menu di sebelah kiri.</p>
    </div>
</div>

</body>
</html>
