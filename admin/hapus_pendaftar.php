<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement
    $stmt = $conn->prepare("DELETE FROM biodata WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" untuk integer

    if ($stmt->execute()) {
        header("Location: data_pendaftar.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
}
?>