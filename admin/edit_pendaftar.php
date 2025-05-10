<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM biodata WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $agama = $_POST['agama'];
    $asal = $_POST['asal_sekolah'];
    $jurusan = $_POST['jurusan'];
    $tahun = $_POST['tahun_ajaran'];
    $jalur = $_POST['jalur_pendaftaran'];

    $conn->query("UPDATE biodata SET 
        nama='$nama', NISN='$nisn', alamat='$alamat', ttl='$ttl', 
        agama='$agama', asal_sekolah='$asal', jurusan='$jurusan',
        tahun_ajaran='$tahun', jalur_pendaftaran='$jalur'
        WHERE id = $id");

    header("Location: data_pendaftar.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Pendaftar</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        <?php include '../assets/admin_style.css'; ?>
        .content {
            padding: 100px 20px 40px;
            display: flex;
            justify-content: center;
            margin-left: 250px;
            /* sesuaikan dengan lebar sidebar kamu */
        }

        .card {
            background: white;
            padding: 20px 10px;
            border-radius: 10px;
            border: 2px solid black;
            /* ganti dari merah/biru ke hitam */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            max-width: 1100px;
            width: 0%;
        }

        .card h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #444;
            text-align: center;
        }

        form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
            text-align: left;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group-full {
            grid-column: span 3;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #e60000;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background-color: #cc0000;
        }
    </style>

</head>

<body>
    <?php include 'layout_admin.php'; ?>

    <div class="content">
        <div class="card">
            <h2>Edit Data Pendaftar</h2>
            <form method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" name="nisn" value="<?= $data['NISN'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Tempat, Tanggal Lahir</label>
                    <input type="text" name="ttl" value="<?= $data['ttl'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <input type="text" name="agama" value="<?= $data['agama'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" value="<?= $data['asal_sekolah'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select name="jurusan" required>
                        <option <?= $data['jurusan'] == 'IPA' ? 'selected' : '' ?>>IPA</option>
                        <option <?= $data['jurusan'] == 'IPS' ? 'selected' : '' ?>>IPS</option>
                        <option <?= $data['jurusan'] == 'BAHASA' ? 'selected' : '' ?>>BAHASA</option>
                        <option <?= $data['jurusan'] == 'AGAMA' ? 'selected' : '' ?>>AGAMA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" value="<?= $data['tahun_ajaran'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Jalur Pendaftaran</label>
                    <select name="jalur_pendaftaran" required>
                        <option <?= $data['jalur_pendaftaran'] == 'Reguler' ? 'selected' : '' ?>>Reguler</option>
                        <option <?= $data['jalur_pendaftaran'] == 'Prestasi' ? 'selected' : '' ?>>Prestasi</option>
                    </select>
                </div>
                <div class="form-group form-group-full">
                    <button type="submit">Update</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>