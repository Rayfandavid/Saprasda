<?php
// download.php
include("../inc/inc_koneksi.php");

// Validasi parameter
if (!isset($_GET['file']) || empty($_GET['file'])) {
    die("Parameter file tidak valid");
}

$file = $_GET['file'];

// Lindungi dari path traversal
$file = basename($file);
$filepath = __DIR__ . '/../uploads/' . $file;

// Periksa apakah file ada
if (!file_exists($filepath)) {
    die("File tidak ditemukan");
}

// Tetapkan header untuk download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
header('Content-Length: ' . filesize($filepath));
header('Pragma: public');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
readfile($filepath);
exit;