<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Contoh data barang
$barang = [
["K001", "Teh pucuk" , 3000],
["K002", "sukrok" , 2500],
["K003", "sprait" , 5000],
["K004", "coca cola " , 6000],
["K004", "chitose " , 4000],

];

$jumlah = count($barang) - 1;
$beli = 0;
$total = 0;
$grandtotal = 0; // ← harus pakai titik koma di akhir baris
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
            color: white;
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
        .total-row {
            font-weight: bold;
            background-color: #e9e9e9;
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
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>

        <?php
        for ($i = 0; $i < rand(1, $jumlah); $i++) {
            $beli = rand(1, 10);
            $id_barang = rand(0, $jumlah);

            $kode_barang = $barang[$id_barang][0];
            $nama_barang = $barang[$id_barang][1];
            $harga_barang = $barang[$id_barang][2];
            $total = $harga_barang * $beli;
            $grandtotal += $total;

            echo "<tr>";
            echo "<td>" . $kode_barang . "</td>";
            echo "<td>" . $nama_barang . "</td>";
            // tambahkan "Rp " sebelum number_format
            echo "<td style='text-align:right;'>Rp " . number_format($harga_barang, 0, ',', '.') . "</td>";
            echo "<td style='text-align:center;'>" . $beli . "</td>";
            echo "<td style='text-align:right;'>Rp " . number_format($total, 0, ',', '.') . "</td>";
            echo "</tr>";
        }
echo "<tr class='total-row'>
                <td colspan='4' style='text-align:right;'>Total Belanja:</td>
                <td style='text-align:right;'>Rp " . number_format($grandtotal, 0, ',', '.') . "</td>
              </tr>";
        ?>
    </table>
</body>
</html>
