<?php
session_start();
include_once("inc/inc_koneksi.php");

// Pastikan hanya admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== '') {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $tanggal_selesai = date('Y-m-d H:i:s');

    $sql = "UPDATE riwayat_laporan 
            SET status = 'Selesai', tanggal_selesai = ? 
            WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "si", $tanggal_selesai, $id);
    mysqli_stmt_execute($stmt);
}

header("Location: detail_laporan.php");
exit;
?>
