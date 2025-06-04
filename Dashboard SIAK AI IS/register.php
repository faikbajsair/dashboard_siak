<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">  <!--buat file style.css -->
</head>
<body>                    
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="POST"> <!--buat file register.php -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>

<!-- membuat halaman register -->   
<?php
session_start(); // memulai session
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Simpan data ke database
    // Kode untuk menyimpan data ke database bisa ditambahkan di sini
    // Misalnya menggunakan mysql localhost portnya 8080
    $conn = new mysqli("localhost", "root", "", "latihan_db_login"); //jika menggunakan xampp, localhost:8080
    // Koneksi ke database MySQL 
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("location: login.php"); // buat halaman login.php
}
else {
    echo "Username atau password kosong.";
}
exit();

// Tambahkan ini untuk memastikan tidak ada error terkait waktu eksekusi
ini_set('max_execution_time', 120); // Set waktu eksekusi maksimum menjadi 120 detik

// Kode di atas adalah contoh sederhana untuk membuat halaman register. 
// Anda dapat mengembangkan lebih lanjut dengan menambahkan validasi, 
// penyimpanan ke database, dan fitur lainnya sesuai kebutuhan.
// Pastikan untuk menjaga keamanan data pengguna, seperti menggunakan hashing untuk password.
// 
?>

<!-- membuat koneksi ke mysql localhost port 8080, 
apakah ini perlu membuat file baru? tidak perlu, karena dihalaman register.php sudah ada koneksi ke mysql
apakah perlu membuat 2 db name? tidak perlu, cukup satu db name saja yaitu latihan_db_login 
lalu untuk dbname register apakah perlu dibuat file baru? -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_db_login";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

<!-- dihalaman register.php sudah ada koneksi ke mysql, apakah dihalaman login.php juga harus ada koneksi ke mysql?
// Ya, di halaman login.php juga perlu ada koneksi ke database MySQL untuk memverifikasi username dan password yang dimasukkan oleh pengguna. -->