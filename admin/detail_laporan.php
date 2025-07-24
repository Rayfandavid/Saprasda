<?php
include("../inc/inc_koneksi.php");
include("../inc/inc_fungsi.php");

// Cek apakah NPSN tersedia
if (!isset($_GET['npsn'])) {
    echo "NPSN tidak ditemukan.";
    exit;
}

$npsn = mysqli_real_escape_string($koneksi, $_GET['npsn']);

// Ambil data identitas sekolah
$sql_identitas = "SELECT * FROM daftar_sd WHERE NPSN='$npsn' UNION SELECT * FROM daftar_smp WHERE NPSN='$npsn'";
$result_identitas = mysqli_query($koneksi, $sql_identitas);

if (!$result_identitas || mysqli_num_rows($result_identitas) == 0) {
    echo "Data sekolah tidak ditemukan untuk NPSN: " . htmlspecialchars($npsn);
    exit;
}

$data_sekolah = mysqli_fetch_assoc($result_identitas);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Laporan Sekolah</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8fafc;
        margin: 0;
        padding: 40px;
        color: #1e293b;
    }
    .container {
        max-width: 1100px;
        margin: auto;
        background: white;
        padding: 32px;
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    }
    h2 {
        font-size: 26px;
        margin-bottom: 16px;
        color: #0f172a;
        text-align: center;
    }
    h3 {
        margin-top: 32px;
        margin-bottom: 12px;
        font-size: 20px;
        color: #334155;
        border-left: 4px solid #2563eb;
        padding-left: 8px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 24px;
    }
    table thead {
        background-color: #2563eb;
        color: white;
    }
    table th, table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
        font-size: 14px;
    }
    table tr:hover {
        background-color: #f1f5f9;
    }
    a.link {
        color: #2563eb;
        text-decoration: none;
        font-weight: 600;
    }
    a.link:hover {
        text-decoration: underline;
    }
    .info-sekolah {
        background-color: #f1f5f9;
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 24px;
    }
    .info-sekolah strong {
        display: inline-block;
        width: 160px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Detail Laporan: <?= htmlspecialchars($data_sekolah['Nama_Sekolah']); ?> (<?= htmlspecialchars($npsn); ?>)</h2>

    <div class="info-sekolah">
        <p><strong>NPSN:</strong> <?= htmlspecialchars($npsn); ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($data_sekolah['Alamat'] ?? '-'); ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($data_sekolah['Status'] ?? '-'); ?></p>
    </div>

    <!-- Laporan Prasarana -->
    <h3>Laporan Prasarana</h3>
    <table>
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Baik</th>
                <th>Ringan</th>
                <th>Sedang</th>
                <th>Berat</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM laporan_prasarana WHERE npsn='$npsn'");
        if ($q && mysqli_num_rows($q) > 0) {
            while ($r = mysqli_fetch_assoc($q)) {
                echo "<tr>
                    <td>" . htmlspecialchars($r['jenis'] ?? '') . "</td>
                    <td>" . htmlspecialchars($r['kondisi_baik'] ?? '0') . "</td>
                    <td>" . htmlspecialchars($r['kondisi_ringan'] ?? '0') . "</td>
                    <td>" . htmlspecialchars($r['kondisi_sedang'] ?? '0') . "</td>
                    <td>" . htmlspecialchars($r['kondisi_berat'] ?? '0') . "</td>
                    <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data prasarana</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Laporan Sarana -->
    <h3>Laporan Sarana</h3>
    <table>
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Kondisi</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM laporan_sarana WHERE npsn='$npsn'");
        if ($q && mysqli_num_rows($q) > 0) {
            while ($r = mysqli_fetch_assoc($q)) {
                echo "<tr>
                    <td>" . htmlspecialchars($r['jenis'] ?? '') . "</td>
                    <td>" . htmlspecialchars($r['kondisi'] ?? '') . "</td>
                    <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='3' style='text-align:center;'>Tidak ada data sarana</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Kebutuhan Usaha -->
    <h3>Kebutuhan Usaha</h3>
    <table>
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Surat</th>
                <th>Foto</th>
                <th>Denah</th>
                <th>RAB</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $q = mysqli_query($koneksi, "SELECT * FROM kebutuhan_usaha WHERE npsn='$npsn'");
        if ($q && mysqli_num_rows($q) > 0) {
            while ($r = mysqli_fetch_assoc($q)) {
                echo "<tr>
                    <td>" . htmlspecialchars($r['jenis_kebutuhan'] ?? '') . "</td>
                    <td><a class='link' href='" . htmlspecialchars($r['file_surat_permohonan'] ?? '') . "' target='_blank'></a></td>
                    <td><a class='link' href='" . htmlspecialchars($r['file_foto_kondisi'] ?? '#') . "' target='_blank'></a></td>
                    <td><a class='link' href='" . htmlspecialchars($r['file_denah_ruangan'] ?? '#') . "' target='_blank'></a></td>
                    <td><a class='link' href='" . htmlspecialchars($r['file_rab_kebutuhan'] ?? '#') . "' target='_blank'></a></td>
                    <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data kebutuhan usaha</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
