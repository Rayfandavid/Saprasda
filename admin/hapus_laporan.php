<?php
include_once("../inc/inc_koneksi.php"); // path diperbaiki

if (isset($_GET['npsn'])) {
    $npsn = mysqli_real_escape_string($koneksi, $_GET['npsn']);

    // Daftar tabel yang akan dihapus datanya
    $tables = ['laporan_prasarana', 'laporan_sarana', 'kebutuhan_usaha', 'riwayat_laporan'];

    foreach ($tables as $table) {
        mysqli_query($koneksi, "DELETE FROM $table WHERE npsn = '$npsn'");
    }

    header("Location: data_laporan.php?hapus=berhasil");
    exit;
} else {
    echo "NPSN tidak ditemukan.";
}

// Ambil email sekolah dari database
$sql_email = "SELECT email FROM riwayat_laporan WHERE npsn = '$npsn' ORDER BY created_at DESC LIMIT 1";
$result_email = mysqli_query($koneksi, $sql_email);
$email = "-";

if ($result_email && mysqli_num_rows($result_email) > 0) {
    $row = mysqli_fetch_assoc($result_email);
    $email = $row['email'];
}

// Kirim email jika ditemukan
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $to = $email;
    $subject = "Pemberitahuan Penghapusan Laporan";
    $message = "Yth. Bapak/Ibu,\n\nKami informasikan bahwa laporan data sekolah Anda dengan NPSN $npsn telah dihapus oleh administrator.\n\nJika ini tidak sesuai, mohon hubungi pihak terkait.\n\nTerima kasih.";
    $headers = "From: no-reply@sisarpras.com";

    mail($to, $subject, $message, $headers);
}
