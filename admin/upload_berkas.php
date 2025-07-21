<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// Ambil semua siswa dari tabel biodata
$siswa = $conn->query("SELECT user_id, nama, nisn FROM biodata");

// Ambil semua berkas dari tabel berkas, lalu simpan dalam array associative
$berkasData = [];
$berkas = $conn->query("SELECT * FROM berkas");
while ($row = $berkas->fetch_assoc()) {
    $berkasData[$row['user']][$row['jenis']] = $row['file'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Berkas</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .content { margin-left: 220px; padding: 40px; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #e60000; color: white; }
        .file-link { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>

<?php include 'layout_admin.php'; ?>

<div class="content">
    <h2>📁 Daftar Berkas yang Di-upload</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID (NISN)</th>
                <th>Nama</th>
                <th>Pas Foto</th>
                <th>Akta Kelahiran</th>
                <th>Transkrip Nilai</th>
                <th>Ijazah</th>
                <th>Sertifikat</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($row = $siswa->fetch_assoc()):
            $nama = $row['nama']; // key di tabel berkas: 'user' (berisi nama)
            $files = isset($berkasData[$nama]) ? $berkasData[$nama] : [];

            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['nisn']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";

            $jenis_list = ['pas_foto', 'akta_kelahiran', 'transkrip_nilai', 'ijazah', 'sertifikat'];
            foreach ($jenis_list as $jenis) {
                echo "<td>";
                if (!empty($files[$jenis]) && file_exists("../uploads/" . $files[$jenis])) {
                    echo "<a class='file-link' href='/ppdbo/uploads/" . htmlspecialchars($files[$jenis]) . "' target='_blank'>Lihat</a> | ";
                    echo "<a class='file-link' href='/ppdbo/uploads/" . htmlspecialchars($files[$jenis]) . "' download>Download</a>";
                } else {
                    echo "<span style='color: red;'>Tidak Ada</span>";
                }
                echo "</td>";
            }

            echo "</tr>";
        endwhile;
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
