<!DOCTYPE html>
<html>

<head>
    <title>Admin PPDB</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/admin_style.css">
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #f4f4f4;
        }

        .header {
            background: rgb(104, 6, 6);
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
            background-color: rgb(104, 6, 6);
            padding-top: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
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
            background: rgb(194, 190, 190);
        }

        .content {
            margin-left: 240px;
            padding: 100px 40px 40px;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <div class="header">🎓 Admin PPDB</div>

    <div class="sidebar">
        <h3>📁 MENU</h3>
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="data_pendaftar.php">📄 Data Pendaftar</a>
        <a href="uploadan_berkas.php">📤 Uploadan Berkas</a>
        <a href="verifikasi.php">✅ Verifikasi</a>
        <a href="../logout.php">🚪 Logout</a>
    </div>

    <div class="content">