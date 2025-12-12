<?php
// Konfigurasi koneksi database
$host       = "localhost";     // Nama host (biasanya localhost)
$username   = "root";          // Username MySQL
$password   = "";              // Password MySQL (kosong jika XAMPP)
$dbname     = "db_penjualan_barang"; // Ganti dengan nama databasenya

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika berhasil
echo "Koneksi berhasil!";
?>
