<?php
session_start();
session_destroy(); // Menghapus semua session

// Redirect ke halaman login atau halaman utama setelah logout
header("Location: index.php"); 
exit;
?>
