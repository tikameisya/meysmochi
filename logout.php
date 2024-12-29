<?php
// Mulai sesi
session_start();

// Hapus semua sesi yang aktif
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: ../home.php");
exit();
?>
