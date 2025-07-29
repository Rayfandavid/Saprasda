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
<?php
// Ambil semua tanggal laporan yang unik
$tanggal_query = mysqli_query($koneksi, "SELECT DISTINCT tanggal_lapor FROM laporan_prasarana WHERE npsn='$npsn' ORDER BY tanggal_lapor DESC");

if ($tanggal_query && mysqli_num_rows($tanggal_query) > 0) {
    while ($row_tanggal = mysqli_fetch_assoc($tanggal_query)) {
        $tanggal = $row_tanggal['tanggal_lapor'];

        echo "<h4 style='margin-top:24px; margin-bottom:8px; color:#0f172a;'>Tanggal Lapor: " . htmlspecialchars($tanggal) . "</h4>";
        echo "<table>
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
                <tbody>";

        // Ambil data prasarana untuk tanggal tersebut
        $laporan_query = mysqli_query($koneksi, "SELECT * FROM laporan_prasarana WHERE npsn='$npsn' AND tanggal_lapor='$tanggal'");
        if ($laporan_query && mysqli_num_rows($laporan_query) > 0) {
            while ($r = mysqli_fetch_assoc($laporan_query)) {
                echo "<tr>
                        <td>" . htmlspecialchars($r['jenis']) . "</td>
                        <td>" . htmlspecialchars($r['kondisi_baik']) . "</td>
                        <td>" . htmlspecialchars($r['kondisi_ringan']) . "</td>
                        <td>" . htmlspecialchars($r['kondisi_sedang']) . "</td>
                        <td>" . htmlspecialchars($r['kondisi_berat']) . "</td>
                        <td>" . htmlspecialchars($r['detail']) . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data pada tanggal ini</td></tr>";
        }

        echo "</tbody></table>";
    }
} else {
    echo "<p style='text-align:center;'>Tidak ada data prasarana</p>";
}
?>


   <!-- Laporan Sarana -->
<h3>Laporan Sarana</h3>
<?php
$tanggal_query = mysqli_query($koneksi, "SELECT DISTINCT tanggal_lapor FROM laporan_sarana WHERE npsn='$npsn' ORDER BY tanggal_lapor DESC");

if ($tanggal_query && mysqli_num_rows($tanggal_query) > 0) {
    while ($row_tanggal = mysqli_fetch_assoc($tanggal_query)) {
        $tanggal = $row_tanggal['tanggal_lapor'];

        echo "<h4 style='margin-top:24px; margin-bottom:8px; color:#0f172a;'>Tanggal Lapor: " . htmlspecialchars($tanggal) . "</h4>";
        echo "<table>
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Kondisi</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>";

        $q = mysqli_query($koneksi, "SELECT * FROM laporan_sarana WHERE npsn='$npsn' AND tanggal_lapor='$tanggal'");
        if ($q && mysqli_num_rows($q) > 0) {
            while ($r = mysqli_fetch_assoc($q)) {
                echo "<tr>
                        <td>" . htmlspecialchars($r['jenis'] ?? '') . "</td>
                        <td>" . htmlspecialchars($r['kondisi'] ?? '') . "</td>
                        <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3' style='text-align:center;'>Tidak ada data</td></tr>";
        }

        echo "</tbody></table>";
    }
} else {
    echo "<p style='text-align:center;'>Tidak ada data sarana</p>";
}
?>

<!-- Kebutuhan Usaha -->
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
            $file_surat = htmlspecialchars($r['file_surat_permohonan']);
            $file_foto  = htmlspecialchars($r['file_foto_kondisi']);
            $file_denah = htmlspecialchars($r['file_denah_ruangan']);
            $file_rab   = htmlspecialchars($r['file_rab_kebutuhan']);
            
            // Ambil hanya nama file
            $surat_name = basename($file_surat);
            $foto_name  = basename($file_foto);
            $denah_name = basename($file_denah);
            $rab_name   = basename($file_rab);

            echo "<tr>
                <td>" . htmlspecialchars($r['jenis_kebutuhan'] ?? '') . "</td>
                <td>" . (!empty($file_surat) ? "<a class='link' href='download.php?file=$surat_name'>Download</a>" : "-") . "</td>
                <td>" . (!empty($file_foto) ? "<a class='link' href='download.php?file=$foto_name'>Download</a>" : "-") . "</td>
                <td>" . (!empty($file_denah) ? "<a class='link' href='download.php?file=$denah_name'>Download</a>" : "-") . "</td>
                <td>" . (!empty($file_rab) ? "<a class='link' href='download.php?file=$rab_name'>Download</a>" : "-") . "</td>
                <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data kebutuhan usaha</td></tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>
