<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>

<?php include("inc_header.php") ?>
<?php
$err        = "";
$sukses     = "";

if (isset($_POST['simpan'])) {


    $password_lama          = $_POST['password_lama'];
    $password               = $_POST['password'];
    $konfirmasi_password    = $_POST['konfirmasi_password'];

    $sql1 = "select * from admin where username = '" . $_SESSION['admin_username'] . "'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    if (md5($password_lama) != $r1['password']) {
        $err .= "<li>Password yang kamu tuliskan tidak sesuai dengan password sebelumnya</li>";
    }

    if ($password_lama == '' or $konfirmasi_password == '' or $password == '') {
        $err .= "<li>Silakan masukkan password lama, password baru serta konfirmasi password</li>";
    }

    if ($password != $konfirmasi_password) {
        $err .= "<li>Silakan masukkan password dan konfirmasi password yang sama</li>";
    }

    if (strlen($password) < 6) {
        $err .= "<li>Panjang karakter yang diizininkan untuk password adalah 6 karakter, minimal.</li>";
    }

    if(empty($err)){
        $sql1   = "update admin set password = md5($password) where username = '".$_SESSION['admin_username']."'";
        mysqli_query($koneksi,$sql1);
        $sukses = "Berhasil mengganti Password";
    }
}
?>
<h1>Ganti Password Akun</h1>
<?php
if($sukses){
    ?>
    <div class="alert alert-primary">
        <?php echo $sukses?>
    </div>
    <?php
}
?>
<?php
if($err){
    ?>
    <div class="alert alert-danger">
        <ul><?php echo $err?></ul>
    </div>
    <?php
}
?>
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
        justify-content: center;
    }
    
    /* Action Button */
    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        padding: 0.5rem 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        transition: all 0.3s;
        margin-left: 12px;
    }
    
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
        transform: translateY(-1px);
    }
    
    /* Search Form */
    .g-3 {
        margin-bottom: 1.5rem;
        margin-left: 4px;
    }
    
    .form-control {
        border: 1px solid #d1d3e2;
        border-radius: 0.35rem;
        padding: 0.5rem 0.75rem;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .btn-secondary {
        background-color: #858796;
        border-color: #858796;
        padding: 0.5rem 1.25rem;
        font-weight: 600;
    }
    
    /* Table Styles */
    .table {
        width: 100%;
        margin-bottom: 1.5rem;
        background-color: transparent;
        padding: 0.75rem;
        border-radius: 12px;
        margin-left: 2px
        
    }
    
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.02);
    }
    
    .table_th {
        background-color: #f8f9fc;
        color: var(--dark-color);
        font-weight: 700;
        padding: 1rem;
        border-bottom: -100px #e3e6f0;
        justify-content: center;
        border-top: 1000px;
        text-align: center;
    }
    
    .table td {
        padding: 0.75rem 1rem;
        vertical-align: middle;
        border-top: 1px solid #e3e6f0;
        color: #5a5c69;
    }
    
    /* Badge Actions */
    .badge {
        padding: 0.5em 0.75em;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 0.75rem;
        border-radius: 0.35rem;
        transition: all 0.3s;
    }
    
    .bg-warning {
        background-color: var(--warning-color) !important;
    }
    
    .bg-danger {
        background-color: var(--danger-color) !important;
    }
    
    .badge:hover {
        transform: translateY(-1px);
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    /* Pagination */
    .pagination {
        display: flex;
        justify-content: left;
        margin-top: 2rem;
        margin-left: 12px;
    }
    
    .page-item:first-child .page-link {
        border-top-left-radius: 0.35rem;
        border-bottom-left-radius: 0.35rem;
    }
    
    .page-item:last-child .page-link {
        border-top-right-radius: 0.35rem;
        border-bottom-right-radius: 0.35rem;
    }
    
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: var(--primary-color);
        background-color: #fff;
        border: 1px solid #dddfeb;
    }
    
    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    
    .page-link:hover {
        z-index: 2;
        color: #224abe;
        text-decoration: none;
        background-color: #eaecf4;
        border-color: #dddfeb;
    }
    
    /* Alert Notification */
    .alert-primary {
        color: #384c74;
        background-color: #e0e6ff;
        border-color: #cdd9ff;
        border-radius: 0.35rem;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .main-content {
            padding: 1rem;
        }
        
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .table {
            font-size: 0.875rem;
        }
        
        .badge {
            display: block;
            margin-bottom: 0.5rem;
        }
    }
    </style>
<form action="" method="POST">
    <div class="table">
        <label for="password_lama" class="table_th">Password Lama</label>
        <div class="g-3">
            <input type="password" class="g-3" id="password_lama" name="password_lama" />
</div>
        <label for="password" class="table_th">Password Baru</label>
        <div class="g-3">
            <input type="password" class="g-3" id="password" name="password" />
</div>
        <label for="konfirmasi_password" class="table_th">Konfirmasi Password Baru</label>
        <div class="g-3">
            <input type="password" class="g-3" id="konfirmasi_password" name="konfirmasi_password" />
</div>
        </div>
    </div>
        <div class="col-sm-9">
            <input type="submit" class="btn-primary" name="simpan" value="Ganti Password Baru" />
        </div>
    </div>
</form>

<?php include("inc_footer.php") ?>
    
</body>
</html>