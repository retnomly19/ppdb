<?php
include '../config.php';
$id = $_GET['id'];
$hasil = $_GET['hasil'];
$conn->query("UPDATE users SET hasil='$hasil' WHERE id=$id");

header('Location: dashboard.php');
