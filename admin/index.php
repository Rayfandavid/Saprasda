<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>

<?php include("inc_header.php")?>
<style>
    /* Main Content Styles */
    .main-content {
        padding: 2rem;
        background-color: #fff;
        border-radius: 0.35rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        margin-bottom: 2rem;
    }
    
    /* Page Header */
    h1 {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 1.5rem;
        font-size: 1.75rem;
        margin-left: 12px;
        margin-top: 17px;
    }

    p {
        margin-left: 12px;
        font-size: 1.2rem;
    }
    </style>
<h1>Halo <b><?php echo $_SESSION['admin_username']?></b></h1>
<p>
    Selamat datang di halaman Administrasi. Anda dapat mengelola berbagai aspek situs web Anda melalui menu-menu di navigasi bar di atas.
</p>

<?php include("inc_footer.php")?>
</body>
</html>