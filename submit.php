<?php
session_start();
include 'config.php';
$uid = $_SESSION['user']['id'];
$conn->query("UPDATE users SET status='submitted' WHERE id=$uid");
echo "<script>alert('Pendaftaran disubmit!');location='dashboard.php';</script>";
