<!-- membuat form login dan register -->
<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location: dashboard.php"); // buat halaman dashboard.php
    exit(); // Penting untuk menghentikan eksekusi setelah redirect
}

// Tambahkan ini untuk memastikan tidak ada error terkait waktu eksekusi
ini_set('max_execution_time', 120); // Set waktu eksekusi maksimum menjadi 120 detik
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">  <!--buat file style.css -->
</head>
<body>                    
    <div class="container">
        <h1>Login</h1>
        <form action="proses_login.php" method="POST"> <!--buat file proses_login.php -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar disini</a></p> <!--buat file register.php -->
    </div>
</body>
</html>

<!-- bagaimana agar tidak terjadi error ini Fatal error: Maximum execution time of 120 seconds exceeded in C:\xampp\htdocs\Belajar PHP Dasar\membuat login register dan dashboard per akun\login.php on line 4
untuk mengatasi error tersebut, kita bisa menambah waktu eksekusi maksimum pada file php.ini dengan cara:
// 1. Buka file php.ini yang ada di folder xampp/php/php.ini
// 2. Cari baris yang berisi max_execution_time = 30 dan ganti angkanya menjadi 120 --> 

<!-- jika sudah menambah waktu eksekusi maksimum pada file php.ini namun masih terjadi error yang sama, 
// silahkan cek apakah file php.ini sudah sesuai dengan kebutuhan dan apakah file php.ini sudah terinstall di komputer -->