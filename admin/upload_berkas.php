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
    <title>Upload Berkas</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            background-image: url('../assets/background.jpg');
            background-size: cover;
            background-position: center;
        }

        .header {
            background: #0c6;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }

        .sidebar {
            width: 200px;
            background: rgba(255, 255, 255, 0.9);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 60px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            padding: 15px 20px;
            font-size: 16px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar a:hover {
            background: #0c6;
            color: white;
        }

        .content {
            margin-left: 220px;
            padding: 40px;
        }
    </style>
</head>

<body>

    <div class="header">📁 Upload Berkas</div>

    <div class="sidebar">
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="data_pendaftar.php">📄 Data Pendaftaran</a>
        <a href="upload_berkas.php">📁 Upload Berkas</a>
        <a href="../logout.php">🚪 Logout</a>
    </div>

    <div class="content">
        <h3>Form upload berkas akan dibuat di sini.</h3>
        <!-- Form upload bisa ditambahkan di sini -->
    </div>

</body>

</html>