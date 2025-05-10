<?php
session_start();
include 'config.php';
include 'partials/header.php';
include 'partials/sidebar.php';

$uid = $_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $NISN = $_POST['NISN'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $agama = $_POST['agama'];
    $asal = $_POST['asal'];
    $jurusan = $_POST['jurusan'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $jalur = $_POST['jalur'];

    $cek = $conn->query("SELECT * FROM biodata WHERE user_id=$uid");
    
    if ($cek->num_rows > 0) {
        $conn->query("UPDATE biodata SET 
            nama='$nama', NISN='$NISN', alamat='$alamat', ttl='$ttl', agama='$agama',
            asal_sekolah='$asal', jurusan='$jurusan', tahun_ajaran='$tahun_ajaran', jalur_pendaftaran='$jalur' 
            WHERE user_id=$uid");
    } else {
        $conn->query("INSERT INTO biodata 
            (user_id, nama, NISN, alamat, ttl, agama, asal_sekolah, jurusan, tahun_ajaran, jalur_pendaftaran) 
            VALUES 
            ($uid, '$nama', '$NISN', '$alamat', '$ttl', '$agama', '$asal', '$jurusan', '$tahun_ajaran', '$jalur')");
    }

    echo "<script>alert('Biodata disimpan!');</script>";
}
?>

<div class="content">
    <div class="container" style="max-width: 600px; margin-top: 50px;">
        <div class="card p-4">
            <h2 class="text-center">Form Pendaftaran Siswa</h2>
            <form method="POST">
                <input name="nama" class="form-control mb-3" placeholder="Nama" required>
                <input name="NISN" class="form-control mb-3" placeholder="NISN" required>
                <input name="alamat" class="form-control mb-3" placeholder="Alamat" required>
                <input name="ttl" class="form-control mb-3" placeholder="Tempat, Tanggal Lahir" required>
                <input name="agama" class="form-control mb-3" placeholder="Agama" required>
                <input name="asal" class="form-control mb-3" placeholder="Asal Sekolah" required>
                <input name="jurusan" class="form-control mb-3" placeholder="Pilihan Jurusan" required>
                <input name="tahun_ajaran" class="form-control mb-3" placeholder="Tahun Ajaran (contoh: 2024/2025)" required>
                <select name="jalur" class="form-control mb-3" required>
                    <option value="">-- Pilih Jalur Pendaftaran --</option>
                    <option value="Reguler">Reguler</option>
                    <option value="Prestasi">Prestasi</option>
                </select>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
