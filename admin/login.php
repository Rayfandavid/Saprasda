<?php 
session_start();
if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
    header("location:index.php");
    exit();
}
include("../inc/inc_koneksi.php");

$username = "";
$password = "";
$err = "";

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' || $password == '') {
        $err = "Silakan masukkan semua isian";
    } else {
        $sql1 = "SELECT * FROM admin WHERE username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        $n1 = mysqli_num_rows($q1);

        if ($n1 < 1) {
            $err = "Username tidak ditemukan";
        } elseif ($r1['password'] != md5($password)) {
            $err = "Password yang kamu masukkan tidak sesuai";
        } else {
            $_SESSION['admin_username'] = $username;
            header("location:index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SISARPRAS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
        }

        .login-box h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 24px;
            color: #4f46e5;
        }

        .form-label {
            font-weight: 600;
            margin-top: 12px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #4f46e5;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-top: 20px;
            width: 100%;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .alert {
            margin-top: 12px;
        }

        footer {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Login Admin</h1>
        <?php if ($err): ?>
            <div class="alert alert-danger">
                <?= $err ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="username" 
                    name="username" 
                    placeholder="Masukkan Username Anda" 
                    value="<?= htmlspecialchars($username) ?>"
                />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan Password"
                />
            </div>

            <button type="submit" name="Login" class="btn btn-primary">Login</button>
        </form>
        <footer>© <?= date('Y') ?> SISARPRAS Admin</footer>
    </div>
</body>
</html>
