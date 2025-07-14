<?php 
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Pendidikan</title>
    <link rel="stylesheet" href="<?php echo url_dasar()?>/css/style.css?v=<?=time()?>">
</head>
<body>
    <nav>
        <div class="wrapper">
        <div class="logo">
        <a href="<?php echo url_dasar()?>">
        <img src="<?php echo url_dasar()?>/gambar/dissih.png" alt="Logo" class="logo-img">
        Sistem Informasi Sarana Prasarana (SISARPRAS)
        </a>
        </div>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo url_dasar()?>#home">Home</a></li>
                    <li><a href="<?php echo url_dasar()?>#courses">Courses</a></box-lis></li>
                    <li><a href="<?php echo url_dasar()?>#tutors">Tutors</a></li>
                    <li><a href="<?php echo url_dasar()?>#partners">Partners</a></li>
                    <li><a href="<?php echo url_dasar()?>#contact">Contact</a></li>
                    <li>
                    <?php if(isset($_SESSION['members_nama_lengkap'])){
                        echo "<a href='".url_dasar()."/ganti_profile.php'>".$_SESSION['members_nama_lengkap']."</a> | <a href='".url_dasar()."/logout.php'>Logout</a>";
                    }else{?>
                        
                    <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">