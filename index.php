<?php
session_start();
$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Data login statis
    $user_valid = "admin";
    $pass_valid = "123";

    if ($username == $user_valid && $password == $pass_valid) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | POLGAN MART</title>
<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background-color: #f3f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-container {
        background: #fff;
        padding: 35px 40px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        width: 330px;
        text-align: left;
    }
    h2 {
        color: #0056d2;
        text-align: center;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }
    label {
        font-weight: 600;
        font-size: 14px;
        margin-top: 10px;
        display: block;
        color: #333;
    }
    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
        font-size: 15px;
    }
    input:focus {
        border-color: #007bff;
    }
    button {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
    }
    .btn-login {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }
    .btn-cancel {
        background-color: #f1f1f1;
        color: #333;
        font-weight: bold;
    }
    .btn-login:hover {
        background-color: #005dc0;
    }
    .btn-cancel:hover {
        background-color: #e0e0e0;
    }
    .error {
        background-color: #ffe2e2;
        color: #c00;
        padding: 8px;
        border-radius: 5px;
        margin-bottom: 10px;
        text-align: center;
        font-size: 14px;
    }
    .footer {
        margin-top: 20px;
        text-align: center;
        font-size: 13px;
        color: gray;
    }
</style>
</head>
<body>

<div class="login-container">
    <h2>POLGAN MART</h2>

    <?php if($error): ?>
        <div class="error"><?= $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" name="login" class="btn-login">Login</button>
        <button type="reset" class="btn-cancel">Batal</button>
    </form>

    <div class="footer">© 2025 POLGAN MART</div>
</div>

</body>
</html>