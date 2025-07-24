<?php
$koneksi = new mysqli("localhost", "root", "", "dinaspendidikan");

if (!$koneksi) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$npsn = $_GET['npsn'];

// Query sesuai nama kolom "NPSN" (huruf kapital)
$sql = "SELECT * FROM daftar_sd WHERE NPSN = '$npsn'";
$result = $koneksi->query($sql);

if ($result->num_rows == 0) {
    $sql = "SELECT * FROM daftar_smp WHERE NPSN = '$npsn'";
    $result = $koneksi->query($sql);
}

$data = [];

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

