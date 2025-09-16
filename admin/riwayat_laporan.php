<?php
// File: admin/view_riwayat_laporan.php

include("inc_header.php");

// Tangani perubahan status jika ada permintaan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $laporan_id = $_POST['laporan_id'];
    $new_status = $_POST['status'];
    
    // Update status di database
    $update_query = "UPDATE riwayat_laporan SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $update_query);
    mysqli_stmt_bind_param($stmt, "si", $new_status, $laporan_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Status berhasil diubah!";
    } else {
        $error_message = "Gagal mengubah status: " . mysqli_error($koneksi);
    }
}

// Query view riwayat laporan
$query = "SELECT * FROM riwayat_laporan";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Laporan - Admin</title>  
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Segoe UI', sans-serif;
            margin-top: 1.5rem;
            margin-right: 12px;
            font-size: 0.875rem;
            color: #374151;
            background-color: #f8fafc;
            border-radius: 0.375rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }

        thead {
            background-color: #4f46e5;
            color: #ffffff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f5ff;
        }

        h1 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            margin-left: 12px;
            margin-top: 17px;
        }
        
        .status-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .status-select {
            padding: 6px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        
        .update-btn {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .update-btn:hover {
            background-color: #4338ca;
        }
        
        .alert {
            padding: 12px;
            margin: 12px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
            
            .status-form {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <h1>Riwayat Laporan Sekolah</h1>
    
    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?php echo $success_message; ?></div>
    <?php endif; ?>
    
    <?php if (isset($error_message)): ?>
        <div class="alert alert-error"><?php echo $error_message; ?></div>
    <?php endif; ?>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Email Pengirim</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Biaya Estimasi</th>
                <th>Waktu Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $no = 1; ?>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['npsn']) ?></td>
                    <td><?= htmlspecialchars($row['nama_sekolah']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_laporan']) ?></td>
                    <td>
                        <form method="post" class="status-form">
                            <input type="hidden" name="laporan_id" value="<?= $row['id'] ?>">
                            <select name="status" class="status-select">
                                <option value="Menunggu" <?= $row['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                <option value="Diproses" <?= $row['status'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                                <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                <option value="Ditolak" <?= $row['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                            </select>
                            <button type="submit" name="update_status" class="update-btn">Update</button>
                        </form>
                    </td>
                    <td>Rp <?= number_format($row['biaya_estimasi'], 0, ',', '.') ?></td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                    <td><?php
                        echo "<a href='detail_laporan.php?npsn={$row['npsn']}' class='btn btn-sm btn-info'><i class='fas fa-eye'></i> Detail</a> ";
                        echo "<a href='hapus_laporan.php?npsn={$row['npsn']}' onclick=\"return confirm('Yakin ingin menghapus semua laporan untuk NPSN ini?')\" class='btn btn-sm btn-danger'><i class='fas fa-trash'></i> Hapus</a>";
                        ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>