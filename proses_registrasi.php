<?php
session_start();
include("inc/inc_koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email         = $_POST['email'];
    $nama_sekolah  = $_POST['nama_sekolah'];
    $npsn          = $_POST['npsn'];

    // Simpan ke database (pastikan table `members` memiliki kolom ini)
    $sql = "INSERT INTO members (email, nama_sekolah, npsn) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $email, $nama_sekolah, $npsn);
    mysqli_stmt_execute($stmt);

    // Simpan ke session
    $_SESSION['email'] = $email;
    $_SESSION['nama_sekolah'] = $nama_sekolah;
    $_SESSION['npsn'] = $npsn;

    // Redirect ke halaman form laporan
    header("Location: form_input_sarpras.php");
    exit;
}
?>
