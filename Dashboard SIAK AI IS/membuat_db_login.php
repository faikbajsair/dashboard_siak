<!-- membuat tabel users di database mysql localhost port 8080 
 cara menjalankannnya adalah dengan membuka terminal dan mengetikkan php membuat_db_login.php -->
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
// sql to create table
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
    )";
if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
exit();
?>

<!-- cara membuat db di xampp di folder htdocs dan di port 8080 -->
<!-- 1. buka xampp control panel, lalu klik tombol admin pada apache,
// 2. buka browser, lalu ketikkan localhost:8080/phpmyadmin, 
// 3. di halaman phpmyadmin, klik tombol "databases", lalu klik tombol "create database", 
// 4. masukkan nama database "latihan_db_login", lalu klik tombol "create" -->  

<!-- 5. setelah itu klik tombol "latihan_db_login", lalu klik tombol "sql",
// 6. masukkan kode sql berikut ini, lalu klik tombol "go" -->
<!-- CREATE TABLE users ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL ) -->
<!-- 7. setelah itu klik tombol "latihan_db_login", lalu klik tombol "users",
// 8. lalu klik tombol "insert", masukkan data username dan password, dengan menjalankan kode sql berikut ini, lalu klik tombol "go" -->
<!-- INSERT INTO users (username, password) VALUES ('admin', 'admin') -->
<!-- 9. setelah itu klik tombol "latihan_db_login", lalu klik tombol "users",
// 10. lalu klik tombol "browse", maka akan muncul data yang sudah dimasukkan ke dalam tabel users -->




