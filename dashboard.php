<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Contoh data barang
$kode_barang = ['K001', 'K002', 'K003', 'K004', 'K005'];
$nama_barang = ['Teh Pucuk', 'Sukro', 'Sprite', 'Coca Cola', 'Chitose'];
$harga_barang = [3000, 2500, 5000, 6000, 4000];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container1 {
            color: black;
            text-align: center;
        }
        .container2 {
            background-color: #f4f4f4;
            color: black;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }
        h2 {
            margin: 5px 0;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #f4f4f4;
            color: black;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background-color: #003f7f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
            color: black;
        }
    </style>
</head>
<body>
    <header>
        <div class="container1">
            <h1>--Polgan Mart--</h1>
            <p>Sistem penjualan sederhana</p>
        </div>
        <div class="container2">
            <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Role: <?php echo isset($_SESSION['role']) ? htmlspecialchars($_SESSION['role']) : 'Dosen'; ?></p>
            <a href="logout.php">Logout</a>
        </div>
    </header>

   <h2 style="text-align: center;">Daftar Pembelian</h2>
<p style="text-align: center;">Daftar pembelian dibuat secara acak tiap kali halaman dimuat</p>

    <table>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga (Rp)</th>
        </tr>
        <?php
        for ($i = 0; $i < count($kode_barang); $i++) {
            echo "<tr>";
            echo "<td>{$kode_barang[$i]}</td>";
            echo "<td>{$nama_barang[$i]}</td>";
            echo "<td>" . number_format($harga_barang[$i], 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>