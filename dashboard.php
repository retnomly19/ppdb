<?php
include 'config.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Siswa - PPDB Online</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include 'partials/sidebar.php'; ?>
<?php include 'partials/header.php'; ?>

<div class="content">
    <h1>Dashboard Siswa</h1>
    <p>Halo, <b><?php echo $_SESSION['user']['nama']; ?></b>!</p>
    <ul>
        <li><a href="biodata.php">Isi Biodata</a></li>
        <li><a href="upload.php">Upload Berkas</a></li>
        <li><a href="submit.php">Submit Pendaftaran</a></li>
        <li><a href="status.php">Cek Status</a></li>
    </ul>
</div>

</body>
</html>
