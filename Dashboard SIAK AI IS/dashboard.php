<!-- membuat halaman dashboard -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php"); // buat halaman login.php
}
?>

<!-- membuat halaman dashboard dengan bootstrap dan Offcanvas dark navbar menu dikiri dengan menu : Dashboard, Profile, Laporan, Pengaturan,  -->
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- panggil style.css -->
</head>
<body>                    
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <!--col-md- adalah ukuran kolom  -->
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">SIAK AI IS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav"> 
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
            <div class="col-md-9">
                <br><h1>Assalamu'alaikum</h1>
                <!-- selamat datang username -->
                <p>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                <!-- menu : Rapor Akademik, Rapor Al-Qur'an, Rapor Diniyah dan Rapor Ekskul per username, saat diklik masuk ke file pdf -->
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><a href="rapor_akademik_pdf.php">Rapor Akademik</a></td> <!--buat file upload_rapor.php -->
                            <td><a href="upload_rapor.php">Upload Rapor</a></td>
                        </tr>
                        <tr>
                            <td><a href="rapor_alquran.php">Rapor Al-Qur'an</a></td>
                            <td><a href="#">Upload Rapor</a></td>
                        </tr>
                        <tr>
                            <td><a href="rapor_diniyah.php">Rapor Diniyah</a></td> <!--buat file rapor_diniyah.php -->
                           <td><a href="#">Upload Rapor</a></td>
                        </tr>
                        <tr>
                            <td><a href="rapor_ekskul.php">Rapor Ekskul</a></td> <!--buat file rapor_ekskul.php -->
                            <td><a href="#">Upload Rapor</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


