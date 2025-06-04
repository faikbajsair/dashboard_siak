<!-- membuat proses login -->

<?php
// mengkoneksikan file login php ke database mysql localhost port 8080
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

session_start(); // memulai session 
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Query ke database untuk cek username dan password
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role']; // menyimpan username dan role ke dalam session
        header("location: dashboard.php");
        exit();
    } else {
        echo "Username atau password salah.";
    }
} else {
    echo "Username atau password kosong.";
    exit();
}

// Tambahkan ini untuk memastikan tidak ada error terkait waktu eksekusi
ini_set('max_execution_time', 120); // Set waktu eksekusi maksimum menjadi 120 detik
?>

<!-- dihalaman register.php sudah ada koneksi ke mysql, apakah dihalaman login.php juga harus ada koneksi ke mysql?
// Ya, di halaman login.php juga perlu ada koneksi ke database MySQL untuk memverifikasi username dan password yang dimasukkan oleh pengguna. -->

<!--
// Kode di atas adalah contoh sederhana untuk membuat halaman login. 
// Anda dapat mengembangkan lebih lanjut dengan menambahkan validasi, 
// penyimpanan ke database, dan fitur lainnya sesuai kebutuhan.
// Pastikan untuk menjaga keamanan data pengguna, seperti menggunakan hashing untuk password.            
-->


<!-- apa yang membuat ketika login bufferingnya lama sekali?
jika login bufferingnya lama sekali, kemungkinan ada beberapa hal yang menyebabkan hal tersebut, antara lain:
1. Koneksi ke database MySQL terputus
2. Server MySQL sedang sibuk atau overload
3. Koneksi internet yang lambat
4. Pengguna terputus dari jaringan internet -->




