# dashboard_siak
Dashboard SIAK dengan PHP Native

Halaman Register :
1. Admin yang dapat membuat akun baru masuk ke register.php
2. permission admin adalah admin
3. permission siswa adalah user
4. sudah ada 3 akun admin (pass : admin), faik (pass : admin) dan salsabil (pass : salsabil)

Halaman Login dan logout aman
1. login sesuai username dan password
2. password belum dikasih hash atau MD5 dan salt

Halaman Dashboard 
Sudah :
1. selamat datang sesuai username
2. Menu "Upload Rapor sudah berhasil dibuat"

Halaman Upload Rapor (Rapor Akademik)
1. Permission hanya untuk admin bukan untuk user
2. cara penggunaannya, pilih dulu usernya, lalu pilih filenya dan klik tombol upload
3. Halaman Rapor lainnya belum sempat dikerjakan tunggu ada waktu luang

file koneksi.php
1. database diletakan di mysqli dengan nama latihan_db_login
2. tabel/entitas baru 1 yang dibuat yaitu users didalamnya sudah ada beberapa atribut yaitu :
id
username
password
rapor_akademik
rapor_alquran
rapor_diniyah
rapor_ekskul
role (admin, user)

ABAIKAN file membuat_db_login.php (coret-coretan saat bikin query dan koneksi)

===================

Pengembanagan :
1. Bikin semua halaman unduh rapor
2. Bikin semua halaman upload rapor
3. file edit dan hapus user
4. dll.
