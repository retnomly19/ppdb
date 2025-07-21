<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$data = $conn->query("SELECT * FROM biodata");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pendaftar</title>
    <link rel="stylesheet" href="../assets/style.css">
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
            min-height: 100vh; /* pastikan konten selalu penuh */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        table th, table td {
            padding: 15px;
            border: 1px solid #ccc;
            text-align: left;
        }
        table th {
            background: rgb(0, 79, 128);
            color: white;
        }
        .btn {
            padding: 5px 12px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 12px;
        }
        .btn-edit {
            background: #0066cc;
            color: white;
        }
        .btn-delete {
            background: #cc0000;
            color: white;
        }
        .btn-add {
            background: #009933;
            color: white;
            display: inline-block;
            margin-bottom: 20px;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
        }

    </style>
</head>
<body>

<div class="header">🎓 Admin PPDB - Data Pendaftar</div>

<div class="sidebar">
    <h3>📁 MENU</h3>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="data_pendaftar.php">📄 Data Pendaftar</a>
    <a href="upload_berkas.php">📤 Upload Berkas</a>
    <a href="verifikasi.php">✅ Verifikasi</a>
    <a href="../logout.php">🚪 Logout</a>
</div>

<div class="content">
        <!-- Tombol Tambah Pendaftar -->
        <a href="create_pendaftar.php" class="btn-add">+ Tambah Pendaftar</a>

        <!-- Tabel Daftar Pendaftar -->
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Alamat</th>
                <th>TTL</th>
                <th>Agama</th>
                <th>Asal Sekolah</th>
                <th>Jurusan</th>
                <th>Tahun Ajaran</th>
                <th>Jalur</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($row = $data->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['NISN']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['ttl']}</td>
                        <td>{$row['agama']}</td>
                        <td>{$row['asal_sekolah']}</td>
                        <td>{$row['jurusan']}</td>
                        <td>{$row['tahun_ajaran']}</td>
                        <td>{$row['jalur_pendaftaran']}</td>
                        <td>
                            <a href='edit_pendaftar.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                            <a href='hapus_pendaftar.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
