<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #f4f4f4;
        }
        .header {
            background: #0066cc;
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
            background-color: #3399ff;
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
            background: #005bb5;
        }
        .content {
            margin-left: 240px;
            padding: 100px 40px 40px;
        }
        .welcome-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .welcome-box h2 {
            margin: 0;
            font-size: 26px;
            color: #0066cc;
        }
    </style>
</head>
<body>

<div class="header">🎓 Dashboard PPDB</div>

<div class="sidebar">
    <h3>📁 MENU</h3>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="biodata.php">📝 Isi Biodata</a>
    <a href="upload.php">📂 Upload Berkas</a>
    <a href="submit.php">📤 Submit Pendaftaran</a>
    <a href="status.php">📋 Status</a>
    <a href="logout.php" class="text-danger">🚪 Logout</a>
</div>

<div class="content">
    <div class="welcome-box">
        <img src="assets/logo.png" alt="Logo" width="150" style="margin-bottom: 20px;">
        <h2>Selamat datang di PPDB Online 2025 SMA GenZ!</h2>
        <p>Silakan gunakan menu di sebelah kiri untuk melakukan pendaftaran atau melihat status.</p>
    </div>
</div>

</body>
</html>
