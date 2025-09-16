<?php
$koneksi = new mysqli("localhost", "root", "", "sarpras", "3307");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$npsn = $_GET['npsn'];

// Cek di daftar_sd
$sql = "SELECT * FROM daftar_sd WHERE NPSN = '$npsn'";
$result = $koneksi->query($sql);

// Kalau tidak ada di daftar_sd, cek di daftar_smp
if ($result->num_rows == 0) {
    $sql = "SELECT * FROM daftar_smp WHERE NPSN = '$npsn'";
    $result = $koneksi->query($sql);
}

// Kalau tidak ada juga di daftar_smp, cek di daftar_tk
if ($result->num_rows == 0) {
    $sql = "SELECT * FROM daftar_tk WHERE NPSN = '$npsn'";
    $result = $koneksi->query($sql);
}

$data = [];

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);
?>