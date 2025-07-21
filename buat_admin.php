<?php
include 'config.php';

$username = 'admin';
$new_password = password_hash('admin', PASSWORD_DEFAULT);

// Update password admin
$conn->query("UPDATE users SET password='$new_password' WHERE username='$username'");

echo "Password admin berhasil di-reset ke 'admin'.";
?>
