<!-- buatlah koneksi ke database latihan_db_login -->
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

//Buat fungsi di koneksi.php (atau file fungsi lain) untuk cek apakah user adalah admin:
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

?>
