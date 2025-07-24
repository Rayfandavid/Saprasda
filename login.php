<?php
session_start();
include_once("inc/inc_koneksi.php");

// Redirect jika sudah login
if (isset($_SESSION['npsn']) && isset($_SESSION['nama_sekolah']) && isset($_SESSION['email'])) {
    header("Location: Dashboard.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Cek email dan password
    $sql = "SELECT * FROM members WHERE email = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            // Login sukses
            $_SESSION['email'] = $row['email'];
            $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
            $_SESSION['npsn'] = $row['npsn'];
            $_SESSION['nama_sekolah'] = $row['nama_sekolah'];
            
            header("Location: Dashboard.php");
            exit;
        } else {
            $error = "Password salah";
        }
    } else {
        $error = "Email tidak terdaftar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 400px;
            margin: 60px auto;
            padding: 30px 40px 40px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; color: #333; }
        label { display: block; margin-top: 18px; color: #555; }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px 8px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }
        input[type="submit"] {
            width: 100%;
            background: #007bff;
            color: #fff;
            border: none;
            padding: 12px;
            margin-top: 16px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }
        input[type="submit"]:hover { background: #0056b3; }
        .error { color: #dc3545; margin-top: 10px; }
        .register-link { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Login Sekolah</h2>
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="post" action="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
    
    <div class="register-link">
        Belum punya akun? <a href="register.php">Daftar disini</a>
    </div>
</div>
</body>
</html>