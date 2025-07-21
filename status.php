<?php
session_start();
include 'config.php';
include 'partials/header.php';
include 'partials/sidebar.php';

// Cek apakah session user ada
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$uid = $_SESSION['user']['id'];

// Ambil data siswa dari biodata
$cek = $conn->query("SELECT b.nama, b.NISN, b.jurusan, b.jalur_pendaftaran, u.hasil 
                     FROM biodata b 
                     JOIN users u ON b.user_id = u.id 
                     WHERE b.user_id = $uid");

if ($cek->num_rows > 0) {
    $data = $cek->fetch_assoc();
} else {
    $data = ['nama' => 'Tidak diketahui', 'NISN' => 'Tidak diketahui', 'jurusan' => 'Tidak diketahui', 'jalur_pendaftaran' => 'Tidak diketahui', 'hasil' => 'Belum Diverifikasi'];
}

$status = strtolower($data['hasil']);
?>

<div class="content">
    <div class="status-box">
        <div class="card" style="max-width: 600px; margin: 0 auto; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 10px;">
            <h3 style="text-align: center; font-weight: bold; margin-bottom: 30px;">Informasi Pendaftaran</h3>

            <div style="display: grid; grid-template-columns: 180px auto; row-gap: 10px;">
                <div><strong>Nama</strong></div>
                <div>: <?= htmlspecialchars($data['nama']) ?></div>

                <div><strong>NISN</strong></div>
                <div>: <?= htmlspecialchars($data['NISN']) ?></div>

                <div><strong>Jurusan</strong></div>
                <div>: <?= htmlspecialchars($data['jurusan']) ?></div>

                <div><strong>Jalur Pendaftaran</strong></div>
                <div>: <?= htmlspecialchars($data['jalur_pendaftaran']) ?></div>

                <div><strong>Status</strong></div>
                <div>:
                    <?php if ($status === 'diterima'): ?>
                        <span style="color: green; font-weight: bold;">✔️ Diterima</span>
                    <?php elseif ($status === 'ditolak'): ?>
                        <span style="color: red; font-weight: bold;">❌ Ditolak</span>
                    <?php else: ?>
                        <span style="color: gray;">Belum Diverifikasi</span>
                    <?php endif; ?>
                </div>
            </div>

            <br><hr><br>

            <?php if ($status === 'diterima'): ?>
                <p style="color: green; font-weight: bold; text-align: center;">
                    🎉 Selamat! Anda diterima di SMA GENZ. Tetap semangat dan siap menempuh perjalanan baru!
                </p>
                C
            <?php elseif ($status === 'ditolak'): ?>
                <p style="color: red; font-weight: bold; text-align: center;">
                    😞 Maaf, Anda belum diterima. Tapi jangan menyerah, tetap berusaha dan semangat untuk kesempatan berikutnya!
                </p>
                <div style="text-align: center; margin-top: 20px;">
                    <button onclick="window.print()" class="btn btn-secondary">🖨 Cetak Bukti Hasil</button>
                </div>
            <?php else: ?>
                <p style="color: gray; text-align: center;">⌛ Status Anda belum diverifikasi oleh admin.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
