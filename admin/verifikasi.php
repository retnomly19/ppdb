<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// Ambil data user yang sudah daftar
$data = $conn->query("SELECT users.id, users.username, biodata.nama, biodata.nisn, biodata.jurusan, users.hasil 
                      FROM users 
                      JOIN biodata ON users.id = biodata.user_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Pendaftar</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .content { margin-left: 220px; padding: 40px; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #e60000; color: white; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 5px; color: white; }
        .btn-accept { background-color: green; }
        .btn-reject { background-color: red; }
        .status-hijau { color: green; font-weight: bold; }
        .status-merah { color: red; font-weight: bold; }
        .status-abu { color: gray; font-style: italic; }
    </style>
</head>
<body>

<?php include 'layout_admin.php'; ?>

<div class="content">
    <h2>✅ Verifikasi Pendaftar</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID (NISN)</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nisn']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td>
                    <?php if ($row['hasil'] == 'Diterima'): ?>
                        <span class="status-hijau">✔️ Diterima</span>
                    <?php elseif ($row['hasil'] == 'Ditolak'): ?>
                        <span class="status-merah">❌ Ditolak</span>
                    <?php else: ?>
                        <span class="status-abu">Belum Diverifikasi</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="verifikasi_aksi.php?id=<?= $row['id'] ?>&hasil=Diterima" class="btn btn-accept">✔️ Terima</a>
                    <a href="verifikasi_aksi.php?id=<?= $row['id'] ?>&hasil=Ditolak" class="btn btn-reject">❌ Tolak</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
