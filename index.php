<!DOCTYPE html>
<html>
<head>
    <title>PPDB Online SMA GENZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #9face6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            background: rgba(255, 255, 255, 0.95);
            max-width: 500px;
            width: 100%;
        }
        .btn {
            width: 120px;
            margin: 0 10px;
        }
        footer {
            color: white;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

    </style>
</head>
<body>
<img src="assets/banner.jpg" class="img-fluid mb-4 rounded shadow" style="max-height: 250px; object-fit: cover; width: 100%;">
<div class="card text-center">
    <h1 class="mb-3">PPDB Online</h1>
    <h4 class="mb-4">SMA GENZ Tahun Ajaran <?= date('Y') . "/" . (date('Y')+1) ?></h4>
    <p class="mb-4">Silakan login atau daftar untuk mengikuti proses penerimaan peserta didik baru.</p>
    <div>
        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="register.php" class="btn btn-success">Daftar</a>
    </div>
</div>
<footer class="text-center mt-5 text-white">
    <p>&copy; <?= date('Y') ?> SMA GENZ. All rights reserved.</p>
</footer>

</body>
</html>
