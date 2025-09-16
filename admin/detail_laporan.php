<?php
include("../inc/inc_koneksi.php");
include("../inc/inc_fungsi.php");
session_start();
// cek npsn
if (!isset($_GET['npsn'])) {
    echo "NPSN tidak ditemukan.";
    exit;
}
$npsn = mysqli_real_escape_string($koneksi, $_GET['npsn']);

// Ambil data sekolah (union SD + SMP + TK)
$sql_identitas = "
    SELECT * FROM daftar_sd WHERE NPSN='$npsn'
    UNION 
    SELECT * FROM daftar_smp WHERE NPSN='$npsn'
    UNION
    SELECT * FROM daftar_tk WHERE NPSN='$npsn'
";
$result_identitas = mysqli_query($koneksi, $sql_identitas);
if (!$result_identitas || mysqli_num_rows($result_identitas) == 0) {
    echo "Data sekolah tidak ditemukan untuk NPSN: " . htmlspecialchars($npsn);
    exit;
}
$data_sekolah = mysqli_fetch_assoc($result_identitas);

// Ambil semua riwayat laporan untuk npsn ini
$riwayat_q = mysqli_query($koneksi, "SELECT * FROM riwayat_laporan WHERE npsn='$npsn' ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Detail Laporan Sekolah</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }
    body {
        background-color: #f5f7fa;
        color: #333;
        line-height: 1.6;
        padding: 20px;
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }
    h2 {
        color: #2c3e50;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #3498db;
    }
    .date-group {
        margin-bottom: 2rem;
        border-bottom: 2px solid #ddd;
        padding-bottom: 1rem;
    }
    .date-header {
        color: #2c3e50;
        margin: 1.5rem 0 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .time-badge {
        background: #3498db;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.9rem;
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }
    .section-title {
        font-weight: bold;
        margin: 1.5rem 0 1rem;
        color: #34495e;
        padding-left: 8px;
        border-left: 4px solid #3498db;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }
    .table th, .table td {
        border: 1px solid #ddd;
        padding: 0.75rem;
        text-align: left;
    }
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .table tr:hover {
        background-color: #f1f7fd;
    }
    .small {
        font-size: 0.9rem;
        color: #6c757d;
    }
    .link {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
        padding: 8px 16px;
        background: #e8f4ff;
        border-radius: 4px;
        display: inline-block;
        transition: background 0.2s;
    }
    .link:hover {
        text-decoration: none;
        background: #d1e9ff;
    }
    .no-data {
        padding: 10px;
        background: #f8f9fa;
        border-radius: 4px;
        text-align: center;
        color: #6c757d;
        margin: 10px 0;
    }
    .summary {
        display: flex;
        gap: 15px;
        margin: 10px 0;
        flex-wrap: wrap;
    }
    .summary-item {
        padding: 8px 12px;
        background: #f0f7ff;
        border-radius: 4px;
        font-size: 0.9rem;
    }
    .debug-info {
        background: #fff3cd;
        border: 1px solid #ffeaa7;
        border-radius: 5px;
        padding: 15px;
        margin: 15px 0;
        font-size: 14px;
    }
    .error-info {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        padding: 15px;
        margin: 15px 0;
        color: #721c24;
        font-size: 14px;
    }
    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            gap: 15px;
        }
        .table {
            font-size: 0.85rem;
        }
        .table th, .table td {
            padding: 0.5rem;
        }
    }
</style>
</head>
<body>
<div class="container">
  <h2>Detail Laporan: <?= htmlspecialchars($data_sekolah['Nama_Sekolah']); ?> (<?= htmlspecialchars($npsn); ?>)</h2>
  <div class="card">
    <p><strong>NPSN:</strong> <?= htmlspecialchars($npsn); ?></p>
    <p><strong>Alamat:</strong> <?= htmlspecialchars($data_sekolah['Alamat'] ?? '-'); ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($data_sekolah['Status'] ?? '-'); ?></p>
  </div>

  <?php
$sql = "
    SELECT 
        npsn,
        timestamp(created_at) AS tanggal,
        SUM(biaya_estimasi) AS biaya_estimasi
    FROM riwayat_laporan
    GROUP BY npsn, DATE(created_at)
    ORDER BY DATE(created_at) DESC
";

$res = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($res);
$total_estimasi = $row['biaya_estimasi'] ?? 0;



  if ($riwayat_q && mysqli_num_rows($riwayat_q) > 0) {
      $current_date = null;
      $report_count = mysqli_num_rows($riwayat_q);
      
      // Debug info
      echo "<div class='debug-info'>";
      echo "<strong>Info Debug:</strong> Ditemukan $report_count laporan untuk NPSN $npsn";
      echo "</div>";
      
      while ($row = mysqli_fetch_assoc($riwayat_q)) {
          $rid = (int)$row['id'];
          $created_at = $row['created_at'] ?: $row['tanggal_laporan'];
          $pengirim = $row['email'] ?? '-';
          $biaya = $row['biaya_estimasi'] ?? 0;
          
          // Format tanggal dan jam untuk tampilan
          $date_time = date('Y-m-d H:i:s', strtotime($created_at));
          $date_only = date('Y-m-d', strtotime($created_at));
          $time_only = date('H:i:s', strtotime($created_at));
          
          // Jika tanggal berbeda dari sebelumnya, tampilkan header tanggal
          if ($date_only !== $current_date) {
              if ($current_date !== null) {
                  echo "</div>"; // Tutup grup tanggal sebelumnya
              }
              
              // Hitung jumlah laporan untuk tanggal ini
              $count_query = mysqli_query($koneksi, "SELECT COUNT(*) as count FROM riwayat_laporan WHERE npsn='$npsn' AND DATE(created_at) = '$date_only'");
              $count_data = mysqli_fetch_assoc($count_query);
              $date_count = $count_data['count'];
              
              echo "<div class='date-group'>";
              echo "<h3 class='date-header'>Laporan Tanggal: " . date('d F Y', strtotime($date_only)) . " <span class='time-badge'>$date_count laporan</span></h3>";
              $current_date = $date_only;
          }
          
          
          echo "<div class='card'>";

           
          echo "<div class='header'><div>
                  <strong>ID Laporan:</strong> {$rid} 
                  <span class='small'>| {$date_time}</span><br>
                  <span class='small'>Pengirim: " . htmlspecialchars($pengirim) . "</span><br>
                  <span style='font-weight:bold; color:#fb00ff;'>Rp " . number_format($biaya, 0, ',', '.') . "</span>
                </div>
                </div>";

          // PRASARANA - Gunakan ID laporan sebagai referensi jika kolomnya ada
          // Cek struktur tabel untuk menentukan cara filter yang tepat
          $check_prasarana = mysqli_query($koneksi, "SHOW COLUMNS FROM laporan_prasarana LIKE 'laporan_id'");
          if (mysqli_num_rows($check_prasarana) > 0) {
              // Jika ada kolom laporan_id, gunakan itu
              $q_prasarana = mysqli_query($koneksi, "
                SELECT * FROM laporan_prasarana 
                WHERE laporan_id = '$rid'
                ORDER BY id ASC
              ");
          } else {
              // Jika tidak ada kolom laporan_id, gunakan created_at yang sama
               $q_prasarana = mysqli_query($koneksi, "
            SELECT * FROM laporan_prasarana 
            WHERE npsn='$npsn' 
            AND DATE(tanggal_lapor) = '$date_only'
            ORDER BY id ASC
          ");
          }
          
          // Cek jika query berhasil
          if ($q_prasarana === false) {
              echo "<div class='error-info'>Error dalam query prasarana: " . mysqli_error($koneksi) . "</div>";
          } else {
              echo "<div class='section-title'>Prasarana</div>";
              if (mysqli_num_rows($q_prasarana) > 0) {
                  echo "<table class='table'><thead><tr><th>Jenis</th><th>Baik</th><th>Ringan</th><th>Sedang</th><th>Berat</th><th>Catatan</th></tr></thead><tbody>";
                  while ($r = mysqli_fetch_assoc($q_prasarana)) {
                      echo "<tr>
                          <td>" . htmlspecialchars($r['jenis'] ?? '') . "</td>
                          <td>" . htmlspecialchars($r['kondisi_baik'] ?? '') . "</td>
                          <td>" . htmlspecialchars($r['kondisi_ringan'] ?? '') . "</td>
                          <td>" . htmlspecialchars($r['kondisi_sedang'] ?? '') . "</td>
                          <td>" . htmlspecialchars($r['kondisi_berat'] ?? '') . "</td>
                          <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
                      </tr>";
                  }
                  echo "</tbody></table>";
              } else {
                  echo "<p class='no-data'>Tidak ada data prasarana untuk laporan ini.</p>";
              }
          }

          // SARANA - Gunakan ID laporan sebagai referensi jika kolomnya ada
          $check_sarana = mysqli_query($koneksi, "SHOW COLUMNS FROM laporan_sarana LIKE 'laporan_id'");
          if (mysqli_num_rows($check_sarana) > 0) {
              // Jika ada kolom laporan_id, gunakan itu
              $q_sarana = mysqli_query($koneksi, "
                SELECT * FROM laporan_sarana 
                WHERE laporan_id = '$rid'
                ORDER BY id ASC
              ");
          } else {
              // Jika tidak ada kolom laporan_id, gunakan created_at yang sama
              $q_sarana = mysqli_query($koneksi, "
            SELECT * FROM laporan_sarana 
            WHERE npsn='$npsn' 
            AND DATE(tanggal_lapor) = '$date_only'
            ORDER BY id ASC
          ");
          }

          // Cek jika query berhasil
          if ($q_sarana === false) {
              echo "<div class='error-info'>Error dalam query sarana: " . mysqli_error($koneksi) . "</div>";
          } else {
              echo "<div class='section-title'>Sarana</div>";
              if (mysqli_num_rows($q_sarana) > 0) {
                  echo "<table class='table'><thead><tr><th>Jenis</th><th>Kondisi</th><th>Catatan</th></tr></thead><tbody>";
                  while ($r = mysqli_fetch_assoc($q_sarana)) {
                      echo "<tr>
                          <td>" . htmlspecialchars($r['jenis'] ?? '') . "</td>
                          <td>" . htmlspecialchars($r['kondisi'] ?? '') . "</td>
                          <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
                      </tr>";
                  }
                  echo "</tbody></table>";
              } else {
                  echo "<p class='no-data'>Tidak ada data sarana untuk laporan ini.</p>";
              }
          }

          // =====================
// KEBUTUHAN USAHA
// =====================
$check_kebutuhan = mysqli_query($koneksi, "SHOW COLUMNS FROM kebutuhan_usaha LIKE 'laporan_id'");
if (mysqli_num_rows($check_kebutuhan) > 0) {
    // Jika ada kolom laporan_id, gunakan itu
    $q_kebutuhan = mysqli_query($koneksi, "
        SELECT * FROM kebutuhan_usaha 
        WHERE laporan_id = '$rid'
        ORDER BY id ASC
    ");
} else {
    // Jika tidak ada kolom laporan_id, gunakan created_at yang sama
    $q_kebutuhan = mysqli_query($koneksi, "
        SELECT * FROM kebutuhan_usaha 
        WHERE npsn='$npsn' 
        AND DATE(tanggal_upload) = '$date_only'
        ORDER BY id ASC
    ");
}

// Cek jika query berhasil
if ($q_kebutuhan === false) {
    echo "<div class='error-info'>Error dalam query kebutuhan: " . mysqli_error($koneksi) . "</div>";
} else {
    echo "<div class='section-title'>Kebutuhan Usaha</div>";
    if (mysqli_num_rows($q_kebutuhan) > 0) {
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Surat</th>
                        <th>Foto</th>
                        <th>Denah</th>
                        <th>RAB</th>
                        <th>Detail</th>
                        <th>Estimasi Biaya</th>
                    </tr>
                </thead>
                <tbody>";
        
        $total_estimasi = 0;
        while ($r = mysqli_fetch_assoc($q_kebutuhan)) {
            $surat = $r['file_surat_permohonan'] ? "<a class='link' href='download.php?file=".basename($r['file_surat_permohonan'])."'>Download</a>" : "-";
            $foto  = $r['file_foto_kondisi'] ? "<a class='link' href='download.php?file=".basename($r['file_foto_kondisi'])."'>Download</a>" : "-";
            $denah = $r['file_denah_ruangan'] ? "<a class='link' href='download.php?file=".basename($r['file_denah_ruangan'])."'>Download</a>" : "-";
            $rab   = $r['file_rab_kebutuhan'] ? "<a class='link' href='download.php?file=".basename($r['file_rab_kebutuhan'])."'>Download</a>" : "-";

            $estimasi = isset($r['biaya_estimasi']) ? (int)$r['biaya_estimasi'] : 0;
            $total_estimasi += $estimasi;

            echo "<tr>
                <td>" . htmlspecialchars($r['jenis_kebutuhan'] ?? '') . "</td>
                <td>$surat</td>
                <td>$foto</td>
                <td>$denah</td>
                <td>$rab</td>
                <td>" . htmlspecialchars($r['detail'] ?? '') . "</td>
                <td>Rp " . number_format($estimasi, 0, ',', '.') . "</td>
            </tr>";
        }

        // Tampilkan total biaya
        echo "<tr>
                <td colspan='6' style='text-align:right; font-weight:bold; color:#fb00ff;'>Total Estimasi Biaya</td>
                <td style='font-weight:bold; color:#fb00ff;'>Rp " . number_format($total_estimasi, 0, ',', '.') . "</td>
              </tr>";

        echo "</tbody></table>";
    } else {
        echo "<p class='no-data'>Tidak ada data kebutuhan usaha untuk laporan ini.</p>";
    }
}


          echo "</div>"; // end card
      }
      
      if ($current_date !== null) {
          echo "</div>"; // Tutup grup tanggal terakhir
      }
  } else {
      echo "<p class='no-data'>Tidak ada riwayat laporan untuk sekolah ini.</p>";
  }
  ?>
</div>
</body>
</html>