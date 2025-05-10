<?php
session_start();
include 'config.php';
include 'partials/header.php';
include 'partials/sidebar.php';

$uid = $_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses upload berkas
    $targetDir = "uploads/"; // Direktori tempat menyimpan berkas

    // Nama berkas yang diupload
    $pasFoto = $_FILES['pas_foto']['name'];
    $aktaKelahiran = $_FILES['akta_kelahiran']['name'];
    $kartuKeluarga = $_FILES['kartu_keluarga']['name'];
    $ijazah = $_FILES['ijazah']['name'];
    $sertifikat = $_FILES['sertifikat']['name'];

    // Set path upload file
    $pasFotoPath = $targetDir . basename($pasFoto);
    $aktaKelahiranPath = $targetDir . basename($aktaKelahiran);
    $kartuKeluargaPath = $targetDir . basename($kartuKeluarga);
    $ijazahPath = $targetDir . basename($ijazah);
    $sertifikatPath = $targetDir . basename($sertifikat);

    // Proses upload
    if (move_uploaded_file($_FILES['pas_foto']['tmp_name'], $pasFotoPath) &&
    move_uploaded_file($_FILES['akta_kelahiran']['tmp_name'], $aktaKelahiranPath) &&
    move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], $kartuKeluargaPath) &&
    move_uploaded_file($_FILES['ijazah']['tmp_name'], $ijazahPath) &&
    move_uploaded_file($_FILES['sertifikat']['tmp_name'], $sertifikatPath)) {

    $conn->query("UPDATE biodata SET pas_foto='$pasFoto', akta_kelahiran='$aktaKelahiran', kartu_keluarga='$kartuKeluarga', ijazah='$ijazah', sertifikat='$sertifikat' WHERE user_id=$uid");
    
    echo "<script>alert('✅ Berkas berhasil di-upload!'); window.location='upload.php';</script>";
    exit;

} else {
    echo "<script>alert('❌ Terjadi kesalahan saat meng-upload berkas.'); window.location='upload.php';</script>";
    exit;
}

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
                    <label class="col-sm-4 col-form-label">Kartu Keluarga</label>
                    <div class="col-sm-8">
                        <input name="kartu_keluarga" type="file" class="form-control" required>
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
