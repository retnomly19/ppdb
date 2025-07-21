<?php 
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

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

    $conn->query("INSERT INTO biodata (nama, NISN, alamat, ttl, agama, asal_sekolah, jurusan, tahun_ajaran, jalur_pendaftaran) 
    VALUES ('$nama', '$nisn', '$alamat', '$ttl', '$agama', '$asal', '$jurusan', '$tahun', '$jalur')");

    header("Location: data_pendaftar.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pendaftar</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
    <?php include '../assets/admin_style.css'; ?>
    .card {
        background: white;
        padding: 20px 30px;
        border-radius: 10px;
        border: 2px solid black;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        max-width: 1100px;
        width: 100%;
        margin: 0 auto;
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
    input, select {
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
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
    }
    button:hover {
        background-color: #218838;
    }
    </style>
</head>
<body>
<?php include 'layout_admin.php'; ?>

<div class="content">
    <div class="card">
        <h2>Tambah Data Pendaftar</h2>
        <form method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>NISN</label>
                <input type="text" name="nisn" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" required>
            </div>
            <div class="form-group">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="ttl" required>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <input type="text" name="agama" required>
            </div>
            <div class="form-group">
                <label>Asal Sekolah</label>
                <input type="text" name="asal_sekolah" required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" required>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="BAHASA">BAHASA</option>
                    <option value="AGAMA">AGAMA</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" required>
            </div>
            <div class="form-group">
                <label>Jalur Pendaftaran</label>
                <select name="jalur_pendaftaran" required>
                    <option value="Reguler">Reguler</option>
                    <option value="Prestasi">Prestasi</option>
                </select>
            </div>
            <div class="form-group form-group-full">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
