<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f7fb;
      margin: 0;
      padding: 0;
    }

    .container {
      position: absolute;
      top: 20px;
      left: 20px;
      text-align: left;
    }

    h2 {
      margin: 0 0 5px 0;
      color: #333;
    }

    p {
      margin: 0;
      color: #555;
      font-size: 14px;
    }

    button {
      margin-top: 10px;
      background-color: #ffffff;
      color: #333;
      border: 1px solid #ccc;
      padding: 6px 12px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #f0f0f0;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Selamat datang, admin!</h2>
    <p>Role: Dosen</p>
    <button onclick="logout()">Logout</button>
  </div>

  <script>
    function logout() {
      alert("Anda telah logout!");
      // contoh redirect ke halaman login
      window.location.href = "index.php";
    }
  </script>
</body>
</html>