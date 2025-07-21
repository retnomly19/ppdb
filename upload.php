<?php
session_start();
include 'config.php';
include 'partials/header.php';
include 'partials/sidebar.php';

$uid = $_SESSION['user']['id'];

// Ambil nama siswa dari tabel biodata
$result = $conn->query("SELECT nama FROM biodata WHERE user_id = $uid");
$data = $result->fetch_assoc();
$namaSiswa = $data['nama'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "uploads/";

    $files = [
        'pas_foto' => $_FILES['pas_foto']['name'],
        'akta_kelahiran' => $_FILES['akta_kelahiran']['name'],
        'transkrip_nilai' => $_FILES['transkrip_nilai']['name'],
        'ijazah' => $_FILES['ijazah']['name'],
    ];

    if (!empty($_FILES['sertifikat']['name'])) {
        $files['sertifikat'] = $_FILES['sertifikat']['name'];
    }

    $success = true;
    foreach ($files as $jenis => $filename) {
        $targetPath = $targetDir . basename($filename);
        $tmpName = $_FILES[$jenis]['tmp_name'];

        if (move_uploaded_file($tmpName, $targetPath)) {
            // REPLACE berdasarkan user + jenis (buat jaga2)
            $stmt = $conn->prepare("REPLACE INTO berkas (user, jenis, file) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $namaSiswa, $jenis, $filename);
            $stmt->execute();
        } else {
            $success = false;
            break;
        }
    }

    if ($success) {
        echo "<script>alert('✅ Berkas berhasil di-upload!'); window.location='upload.php';</script>";
    } else {
        echo "<script>alert('❌ Gagal meng-upload salah satu berkas.'); window.location='upload.php';</script>";
    }
    exit;
}
?>


<div class="content">
    <div class="container" style="max-width: 600px; margin-top: 50px;">
        <div class="card p-4">
            <h2 class="text-center">Upload Berkas</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Pas Foto</label>
                    <div class="col-sm-8">
                        <input name="pas_foto" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Akta Kelahiran</label>
                    <div class="col-sm-8">
                        <input name="akta_kelahiran" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Transkrip Nilai</label>
                    <div class="col-sm-8">
                        <input name="transkrip_nilai" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Ijazah / SKL</label>
                    <div class="col-sm-8">
                        <input name="ijazah" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Sertifikat (jika ada)</label>
                    <div class="col-sm-8">
                        <input name="sertifikat" type="file" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Upload Berkas</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
