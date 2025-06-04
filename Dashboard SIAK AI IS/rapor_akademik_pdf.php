<!-- buatlah program admin dapat menempatkan file pdf pada masing-masing rapor akademik, rapor al-qur'an, rapor diniyah dan rapor ekskul per username,
sehingga saat user login, user dapat mengunduh file pdf tersebut sesuai dengan username masing-masing -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_db_login";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan username dari session
$username = $_SESSION['username'];

// Ambil data file PDF rapor dari database
$sql = "SELECT rapor_akademik, rapor_alquran, rapor_diniyah, rapor_ekskul FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($rapor_akademik, $rapor_alquran, $rapor_diniyah, $rapor_ekskul);
$stmt->fetch();
$stmt->close();
$conn->close();
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
                <h2>Unduh Rapor PDF</h2>
                <ul>
                    <li>
                        <?php if ($rapor_akademik): ?>
                            <a href="uploads/<?php echo htmlspecialchars($rapor_akademik); ?>" download>Unduh Rapor Akademik</a>
                        <?php else: ?>
                            Rapor Akademik belum diunggah.
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if ($rapor_alquran): ?>
                            <a href="uploads/<?php echo htmlspecialchars($rapor_alquran); ?>" download>Unduh Rapor Al-Qur'an</a>
                        <?php else: ?>
                            Rapor Al-Qur'an belum diunggah.
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if ($rapor_diniyah): ?>
                            <a href="uploads/<?php echo htmlspecialchars($rapor_diniyah); ?>" download>Unduh Rapor Diniyah</a>
                        <?php else: ?>
                            Rapor Diniyah belum diunggah.
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if ($rapor_ekskul): ?>
                            <a href="uploads/<?php echo htmlspecialchars($rapor_ekskul); ?>" download>Unduh Rapor Ekskul</a>
                        <?php else: ?>
                            Rapor Ekskul belum diunggah.
                        <?php endif; ?>
                    </li>
                </ul>
                <br>
                <p><a href="dashboard.php">Kembali ke Dashboard</a></p> <!--kembali ke halaman dashboard-->
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