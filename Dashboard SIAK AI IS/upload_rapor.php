<?php
// Koneksi ke database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "latihan_db_login";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Batasi Akses di Setiap File
session_start();
require_once 'koneksi.php';
if (!is_admin()) {
    echo "Akses hanya untuk admin.";
    exit();
}

// Proses upload
if (isset($_POST['upload'])) {
    $username = $_POST['username'];
    if (isset($_FILES['rapor_akademik']) && $_FILES['rapor_akademik']['error'] == 0) {
        $file_name = uniqid() . '_' . basename($_FILES['rapor_akademik']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($file_type == "pdf") {
            if (move_uploaded_file($_FILES['rapor_akademik']['tmp_name'], $target_file)) {
                // Update nama file di database
                $stmt = $conn->prepare("UPDATE users SET rapor_akademik=? WHERE username=?");
                $stmt->bind_param("ss", $file_name, $username);
                $stmt->execute();
                $stmt->close();
                echo "Upload berhasil!";
            } else {
                echo "Gagal upload file.";
            }
        } else {
            echo "Hanya file PDF yang diperbolehkan.";
        }
    } else {
        echo "Pilih file PDF untuk diupload.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Rapor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- panggil style.css -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">SIAK AI IS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pengaturan.php">Pengaturan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a> <!-- buat file logout.php -->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-md-12">
                <br>
                <h2>Upload Rapor Akademik</h2>
                <p>Silakan pilih username dan upload file rapor akademik dalam format PDF.</p>
            </div>
            <div class="col-md-12">
            </div>
            <div class="col-md-9">
                <form method="POST" enctype="multipart/form-data">
                    <select name="username" style="width: 200px;">
                        <?php
                        // Loop username dari tabel users
                        $result = $conn->query("SELECT username FROM users");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row['username']) . "'>" . htmlspecialchars($row['username']) . "</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <input type="file" name="rapor_akademik" accept="application/pdf">
                    <br>
                    <button type="submit" name="upload">Upload Rapor Akademik</button>
                    <br>
                    <p><a href="dashboard.php">Kembali ke Dashboard</a></p> <!--kembali ke halaman dashboard-->
                </form>
            </div>
        </div>
    </div>
            
        </div>
            
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>







<?php
$conn->close();
?>