<?php
session_start();
include_once("inc/inc_koneksi.php");

// Redirect jika sudah login
if (isset($_SESSION['npsn']) && isset($_SESSION['nama_sekolah']) && isset($_SESSION['email'])) {
    header("Location: Dashboard.php");
    exit;
}

$error = "";
$sukses = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email         = trim($_POST['email']);
    $nama_lengkap  = trim($_POST['nama_lengkap']);
    $npsn          = trim($_POST['npsn']);
    $nama_sekolah  = trim($_POST['nama_sekolah']);
    $alamat        = trim($_POST['alamat']);
    $kecamatan     = trim($_POST['kecamatan']);
    $kelurahan     = trim($_POST['kelurahan']);
    $status        = trim($_POST['status']);
    $password      = trim($_POST['password']);

    // Validasi email unik
    $sql_check = "SELECT email FROM members WHERE email = ?";
    $stmt_check = mysqli_prepare($koneksi, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);
    
    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $error = "Email sudah terdaftar. Silakan gunakan email lain atau login.";
    } else {
        // Hash password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Simpan ke database
        $sql = "INSERT INTO members (email, nama_lengkap, npsn, nama_sekolah, alamat, kecamatan, kelurahan, status, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssss", $email, $nama_lengkap, $npsn, $nama_sekolah, $alamat, $kecamatan, $kelurahan, $status, $password_hash);

        if (mysqli_stmt_execute($stmt)) {
            // Simpan ke session
            $_SESSION['email'] = $email;
            $_SESSION['nama_lengkap'] = $nama_lengkap;
            $_SESSION['npsn'] = $npsn;
            $_SESSION['nama_sekolah'] = $nama_sekolah;

            header("Location: Dashboard.php");
            exit;
        } else {
            $error = "Gagal menyimpan ke database: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Sekolah</title>
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
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px 8px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }
        input[type="submit"], button {
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
        input[type="submit"]:hover, button:hover { background: #0056b3; }
        .error { color: #dc3545; margin-top: 10px; }
        .login-link { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Registrasi Sekolah</h2>
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="post" action="">
        <label for="email">Email*</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password*</label>
        <input type="password" id="password" name="password" required>

        <label for="nama_lengkap">Nama Lengkap*</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required>

        <label for="npsn">NPSN*</label>
        <input type="text" id="npsn" name="npsn" required>

        <button type="button" onclick="isiOtomatis()">Isi Otomatis</button>

        <label for="nama_sekolah">Nama Sekolah*</label>
        <input type="text" id="nama_sekolah" name="nama_sekolah" readonly required>

        <label for="alamat">Alamat*</label>
        <input type="text" id="alamat" name="alamat" required>

        <label for="kecamatan">Kecamatan*</label>
        <input type="text" id="kecamatan" name="kecamatan" required>

        <label for="kelurahan">Kelurahan*</label>
        <input type="text" id="kelurahan" name="kelurahan" required>

        <label for="status">Status*</label>
        <input type="text" id="status" name="status" required>

        <input type="submit" value="Daftar">
    </form>
    
    <div class="login-link">
        Sudah punya akun? <a href="login.php">Login disini</a>
    </div>
</div>

<script>
function isiOtomatis() {
    let npsn = document.getElementById("npsn").value;

    if (npsn.length > 0) {
        fetch("cari_npsn.php?npsn=" + encodeURIComponent(npsn))
            .then(response => response.json())
            .then(data => {
                if (Object.keys(data).length > 0) {
                    document.getElementById("nama_sekolah").value = data.Nama_Sekolah || "";
                    document.getElementById("alamat").value = data.Alamat || "";
                    document.getElementById("kecamatan").value = data.Kecamatan || "";
                    document.getElementById("kelurahan").value = data.Kelurahan || "";
                    document.getElementById("status").value = data.Status || "";
                } else {
                    alert("Data NPSN tidak ditemukan.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Gagal mengambil data.");
            });
    } else {
        alert("Harap isi NPSN terlebih dahulu.");
    }
}
</script>
</body>
</html>