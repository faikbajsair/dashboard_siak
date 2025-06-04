<!-- membuat fhalaman logout -->
<?php
session_start(); // memulai session
session_destroy(); // menghancurkan session
header("location: login.php"); // buat halaman login.php
exit();

// Tambahkan ini untuk memastikan tidak ada error terkait waktu eksekusi
ini_set('max_execution_time', 120); // Set waktu eksekusi maksimum menjadi 120 detik
?>