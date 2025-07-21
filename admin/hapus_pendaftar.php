<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM biodata WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: data_pendaftar.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
