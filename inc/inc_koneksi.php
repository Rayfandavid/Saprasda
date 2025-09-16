<?php 
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "sarpras";
$port      = "3307"; 

$koneksi    = mysqli_connect($host,$user,$pass,$db,$port);
if(!$koneksi){
    die("Gagal terkoneksi");
}