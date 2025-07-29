<?php include("inc_header.php"); ?>

<?php
$jenjang = isset($_GET['jenjang']) ? $_GET['jenjang'] : 'sd';
$tabel = ($jenjang === 'smp') ? 'daftar_smp' : 'daftar_sd';
$alias = 'ds';
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
<h1>Data Laporan Sarpras Sekolah</h1>

<div class="filter-section">
    <form method="get" class="row g-3">
        <div class="col-md-3">
            <div class="filter-group">
                <label class="filter-label">Jenjang</label>
                <select name="jenjang" class="form-control" onchange="this.form.submit()">
                    <option value="sd" <?php echo ($jenjang == 'sd') ? 'selected' : ''; ?>>SD</option>
                    <option value="smp" <?php echo ($jenjang == 'smp') ? 'selected' : ''; ?>>SMP</option>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="filter-group">
                <label class="filter-label">Kecamatan</label>
                <select name="kecamatan" class="form-control">
                    <option value="">Semua Kecamatan</option>
                    <?php
                    $kecamatan_query = "SELECT DISTINCT Kecamatan FROM $tabel ORDER BY Kecamatan";
                    $kecamatan_result = mysqli_query($koneksi, $kecamatan_query);
                    while ($kec = mysqli_fetch_array($kecamatan_result)) {
                        $selected = (isset($_GET['kecamatan']) && $_GET['kecamatan'] == $kec['Kecamatan']) ? 'selected' : '';
                        echo "<option value='{$kec['Kecamatan']}' $selected>{$kec['Kecamatan']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="filter-group">
                <label class="filter-label">Status Sekolah</label>
                <select name="status" class="form-control">
                    <option value="">Semua Status</option>
                    <option value="Negeri" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Negeri') ? 'selected' : ''; ?>>Negeri</option>
                    <option value="Swasta" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Swasta') ? 'selected' : ''; ?>>Swasta</option>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="filter-group">
                <label class="filter-label">Status Laporan</label>
                <select name="laporan" class="form-control">
                    <option value="">Semua</option>
                    <option value="1" <?php echo (isset($_GET['laporan']) && $_GET['laporan'] == '1') ? 'selected' : ''; ?>>Sudah Melapor</option>
                    <option value="0" <?php echo (isset($_GET['laporan']) && $_GET['laporan'] == '0') ? 'selected' : ''; ?>>Belum Melapor</option>
                </select>
            </div>
        </div>

        <div class="col-md-9">
            <div class="filter-group">
                <label class="filter-label">Cari Sekolah</label>
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Masukkan NPSN atau Nama Sekolah" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="filter-group" style="padding-top: 28px;">
                <a href="data_laporan.php" class="btn btn-secondary">
                    <i class="fas fa-sync-alt"></i> Reset Filter
                </a>
            </div>
        </div>
    </form>
</div>

<div class="table-container">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NPSN</th>
                    <th>Nama Sekolah</th>
                    <th>Kecamatan</th>
                    <th>Status</th>
                    <th>Laporan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT 
                            $alias.NPSN, $alias.Nama_Sekolah, $alias.Kecamatan, $alias.Status,
                            CASE 
                                WHEN EXISTS (
                                    SELECT 1 FROM laporan_prasarana lp WHERE lp.npsn = $alias.NPSN
                                ) THEN '✅' ELSE '❌' 
                            END AS sudah_lapor
                        FROM $tabel $alias
                        WHERE 1=1";

                $params = [];

                if (isset($_GET['kecamatan']) && $_GET['kecamatan'] != '') {
                    $sql .= " AND $alias.Kecamatan = ?";
                    $params[] = $_GET['kecamatan'];
                }

                if (isset($_GET['status']) && $_GET['status'] != '') {
                    $sql .= " AND LOWER($alias.Status) = LOWER(?)";
                    $params[] = $_GET['status'];
                }

                if (isset($_GET['laporan']) && $_GET['laporan'] != '') {
                    if ($_GET['laporan'] == '1') {
                        $sql .= " AND EXISTS (SELECT 1 FROM laporan_prasarana lp WHERE lp.npsn = $alias.NPSN)";
                    } else {
                        $sql .= " AND NOT EXISTS (SELECT 1 FROM laporan_prasarana lp WHERE lp.npsn = $alias.NPSN)";
                    }
                }

                if (isset($_GET['search']) && $_GET['search'] != '') {
                    $search = "%" . $_GET['search'] . "%";
                    $sql .= " AND ($alias.NPSN LIKE ? OR $alias.Nama_Sekolah LIKE ?)";
                    $params[] = $search;
                    $params[] = $search;
                }

                $sql .= " ORDER BY $alias.Nama_Sekolah ASC";

                $stmt = mysqli_prepare($koneksi, $sql);

                if (!empty($params)) {
                    $types = str_repeat('s', count($params));
                    mysqli_stmt_bind_param($stmt, $types, ...$params);
                }

                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $no = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$row['NPSN']}</td>";
                    echo "<td>{$row['Nama_Sekolah']}</td>";
                    echo "<td>{$row['Kecamatan']}</td>";
                    echo "<td>{$row['Status']}</td>";
                    echo "<td class='status-icon'>{$row['sudah_lapor']}</td>";
                    echo "<td>";
                    if ($row['sudah_lapor'] == '✅') {
                        echo "<a href='detail_laporan.php?npsn={$row['NPSN']}' class='btn btn-sm btn-info'><i class='fas fa-eye'></i> Detail</a>";
                    } else {
                        echo "<span class='text-muted'>-</span>";
                    }
                    echo "</td>";
                    echo "</tr>";
                    $no++;
                }

                if ($no == 1) {
                    echo "<tr><td colspan='7' class='text-center text-muted'>Tidak ada data ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("inc_footer.php"); ?>
