<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company informations</title>
</head>
<body>
    
<?php include("inc_header.php") ?>
<?php
$sukses = "";
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1   = "delete from info where id = '$id'";
    $q1     = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses     = "Berhasil hapus data";
    }
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
    }
    
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.02);
    }
    
    .table th {
        background-color: #f8f9fc;
        color: var(--dark-color);
        font-weight: 700;
        padding: 1rem;
        border-bottom: 1px solid #e3e6f0;
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
<h1>Info Admin</h1>
<p>
    <a href="info_input.php">
        <input type="button" class="btn btn-primary" value="Buat Info Baru" />
    </a>
</p>
<?php
if ($sukses) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>
<form class="row g-3" method="get">
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo $katakunci ?>" />
    </div>
    <div class="col-auto">
        <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary" />
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>Judul</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqltambahan = "";
        $per_info = 2;
        if ($katakunci != '') {
            $array_katakunci = explode(" ", $katakunci);
            for ($x = 0; $x < count($array_katakunci); $x++) {
                $sqlcari[] = "(judul like '%" . $array_katakunci[$x] . "%' or isi like '%" . $array_katakunci[$x] . "%')";
            }
            $sqltambahan    = " where " . implode(" or ", $sqlcari);
        }
        $sql1   = "select * from info $sqltambahan";
        $page   = isset($_GET['page'])?(int)$_GET['page']:1;
        $mulai  = ($page > 1) ? ($page * $per_info) - $per_info : 0;
        $q1     = mysqli_query($koneksi,$sql1);
        $total  = mysqli_num_rows($q1);
        $pages  = ceil($total / $per_info);
        $nomor  = $mulai + 1;
        $sql1   = $sql1." order by id desc limit $mulai,$per_info";

        $q1     = mysqli_query($koneksi, $sql1);
      
        while ($r1 = mysqli_fetch_array($q1)) {
        ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo $r1['judul'] ?></td>
                
                <td>
                    <a href="info_input.php?id=<?php echo $r1['id']?>">
                        <span class="badge bg-warning text-dark">Edit</span>
                    </a>

                    <a href="info.php?op=delete&id=<?php echo $r1['id'] ?>" onclick="return confirm('Apakah yakin mau hapus data bro?')">
                        <span class="badge bg-danger">Delete</span>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php 
        $cari = isset($_GET['cari'])? $_GET['cari'] : "";

        for($i=1; $i <= $pages; $i++){
            ?>
            <li class="page-item">
                <a class="page-link" href="info.php?katakunci=<?php echo $katakunci?>&cari=<?php echo $cari?>&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
</nav>
<?php include("inc_footer.php") ?>
</body>
</html>