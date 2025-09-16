<?php
session_start();
include_once("../inc/inc_koneksi.php");

// Pastikan hanya admin yang bisa ubah status
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = ($_GET['status'] === 'Selesai') ? 'Selesai' : 'Menunggu'; 
    $tanggal_update = date('Y-m-d H:i:s');

    $sql = "UPDATE riwayat_laporan 
            SET status = ?, tanggal_update = ? 
            WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $status, $tanggal_update, $id);
    mysqli_stmt_execute($stmt);
}

// Balik ke halaman admin detail laporan
header("Location: detail_laporan.php?id=" . $id);
exit;
?>
