    <?php
    include_once("inc/inc_koneksi.php");

    session_start();

    // Escape input
    $npsn       = mysqli_real_escape_string($koneksi, $_POST['npsn']);
    $nama       = mysqli_real_escape_string($koneksi, $_POST['nama_sekolah']);
    $alamat     = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $kecamatan  = mysqli_real_escape_string($koneksi, $_POST['kecamatan']);
    $kelurahan  = mysqli_real_escape_string($koneksi, $_POST['kelurahan']);
    $status     = mysqli_real_escape_string($koneksi, $_POST['status']);

    // Cek apakah NPSN sudah ada di daftar_sd
$sql_cek_sd = "SELECT 1 FROM daftar_sd WHERE NPSN = '$npsn'";
$result_sd = mysqli_query($koneksi, $sql_cek_sd);

// Jika tidak ada, cek ke daftar_smp
if (mysqli_num_rows($result_sd) == 0) {
    $sql_cek_smp = "SELECT * FROM daftar_smp WHERE NPSN = '$npsn'";
    $result_smp = mysqli_query($koneksi, $sql_cek_smp);
    if (mysqli_num_rows($result_smp) > 0) {
        $data_smp = mysqli_fetch_assoc($result_smp);

        // Masukkan data dari SMP ke SD agar bisa lolos foreign key
        $sql_insert_sd = "INSERT INTO daftar_sd (NPSN, Nama_Sekolah, Alamat, Kecamatan, Kelurahan, Status) VALUES (
            '{$data_smp['NPSN']}', 
            '".mysqli_real_escape_string($koneksi, $data_smp['Nama_Sekolah'])."', 
            '".mysqli_real_escape_string($koneksi, $data_smp['Alamat'])."', 
            '".mysqli_real_escape_string($koneksi, $data_smp['Kecamatan'])."', 
            '".mysqli_real_escape_string($koneksi, $data_smp['Kelurahan'])."', 
            '{$data_smp['Status']}'
        )";
        mysqli_query($koneksi, $sql_insert_sd);
    }
}




function uploadFileArray($fileArray, $index) {
    if (isset($fileArray['name'][$index]) && $fileArray['error'][$index] == 0) {
        $targetDir = "uploads/";
        // Pastikan folder uploads ada dan writable
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $filename = time() . "_" . basename($fileArray['name'][$index]);
        $targetFile = $targetDir . $filename;
        if (move_uploaded_file($fileArray['tmp_name'][$index], $targetFile)) {
            return $targetFile;
        } else {
            error_log("Gagal upload file: " . $fileArray['tmp_name'][$index]);
            return ""; // Kembalikan string kosong jika gagal
        }
    }
    return "";
}

    // Simpan ke riwayat_laporan
    $sql_riwayat = "INSERT INTO riwayat_laporan (
        npsn, nama_sekolah, email, jenis_laporan, judul_laporan, tanggal_laporan, status, biaya_estimasi, keterangan
    ) VALUES (
        '$npsn', '$nama', '$email', 'Kerusakan Fasilitas', 
        'Kerusakan atap ruang kelas 3A akibat hujan', 
        NOW(), 'Menunggu', 15000000, 'Ruang Kelas 3A'
    )";
    mysqli_query($koneksi, $sql_riwayat);


    // ======================
    // Simpan Laporan Prasarana
    // ======================
    if (isset($_POST['prasarana'])) {
        foreach ($_POST['prasarana'] as $jenis => $data) {
            if (isset($data['baik']) || isset($data['ringan']) || isset($data['sedang']) || isset($data['berat'])) {
                $baik   = (int)($data['baik'] ?? 0);
                $ringan = (int)($data['ringan'] ?? 0);
                $sedang = (int)($data['sedang'] ?? 0);
                $berat  = (int)($data['berat'] ?? 0);
                $detail = mysqli_real_escape_string($koneksi, $data['detail'] ?? '');

                $sql = "INSERT INTO laporan_prasarana 
                        (npsn, nama_sekolah, jenis, kondisi_baik, kondisi_ringan, kondisi_sedang, kondisi_berat, detail) 
                        VALUES ('$npsn', '$nama', '$jenis', $baik, $ringan, $sedang, $berat, '$detail')";
                if (!mysqli_query($koneksi, $sql)) {
                    echo "❌ Gagal simpan `$jenis`: " . mysqli_error($koneksi) . "<br>";
                } else {
                    echo "✅ Data `$jenis` berhasil disimpan.<br>";
                }
            }
        }
    }

    // ======================
    // Simpan Laporan Sarana
    // ======================
  if (isset($_POST['sarana'])) {
    foreach ($_POST['sarana'] as $jenis => $data) {
        $kondisi = mysqli_real_escape_string($koneksi, $data['kondisi'] ?? '');
        $detail = mysqli_real_escape_string($koneksi, $data['detail'] ?? '');

        $sql = "INSERT INTO laporan_sarana 
                (npsn, nama_sekolah, jenis, kondisi, detail) 
                VALUES ('$npsn', '$nama', '$jenis', '$kondisi', '$detail')";
        mysqli_query($koneksi, $sql);
    }
}


    // ======================
    // Simpan Kebutuhan Usaha (file upload)
    // ======================
  $jenis_kebutuhan_list = [
    "Pembangunan Sarana, Prasarana dan Utilitas",
    "Penyediaan Mebel Kelas",
    "Pengadaan Ruang Kelas Baru (RKB)",
    "Rehabilitasi Sedang, Berat Ruang Kelas Sekolah",
    "Penyedia Alat Praktik & Peraga Peserta Didik",
    "Pembangunan Ruang kelas Baru",
    "Pembangunan Ruang Guru, Kepala Sekolah, TU",
    "Pembangunan Ruang Unit Kesehatan Sekolah (UKS)",
    "Rehabilitasi Sedang Berat Ruang Unit Kesehatan Sekolah (UKS)",
    "Rehabilitasi Sedang Berat Perpustakaan Sekolah",
    "Pengadaan Perlengkapan Kelas",
    "Pembangunan Laboratorium Sekolah"
];

foreach ($jenis_kebutuhan_list as $index => $jenis) {
    $surat_permohonan = uploadFileArray($_FILES['file_surat_permohonan'], $index);
    $foto_kondisi     = uploadFileArray($_FILES['file_foto_kondisi'], $index);
    $denah_ruangan    = uploadFileArray($_FILES['file_denah_ruangan'], $index);
    $rab_kebutuhan    = uploadFileArray($_FILES['file_rab_kebutuhan'], $index);
    $detail           = mysqli_real_escape_string($koneksi, $_POST['kebutuhan_usaha'][$index]['detail'] ?? '');

    $sql = "INSERT INTO kebutuhan_usaha 
        (npsn, nama_sekolah, jenis_kebutuhan, file_surat_permohonan, file_foto_kondisi, file_denah_ruangan, file_rab_kebutuhan, detail)
        VALUES ('$npsn', '$nama', '$jenis', '$surat_permohonan', '$foto_kondisi', '$denah_ruangan', '$rab_kebutuhan', '$detail')";
    mysqli_query($koneksi, $sql);
}

    ?>


    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
    <div class="success-msg">✅ Data berhasil dikirim!</div>
<?php endif; ?>

    <script>
        // Redirect ke halaman dashboard setelah 3 detik
        setTimeout(() => {
            window.location.href = "Dashboard.php";
        }, 3000);
    </script>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
  <div class="loading-screen" id="loadingScreen">
    <div class="container"><div class="line"></div></div>
    <p>Mengalihkan ke Dashboard...</p>
  </div>
<?php endif; ?>

<style>
.loading-screen {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background-color: rgba(255, 255, 255, 0.9);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  font-family: sans-serif;
}
.container {
  --uib-size: 28;
  --uib-color: black;
  --uib-speed: 3.5s;
  --uib-stroke: 4;
  --uib-mult: calc(var(--uib-size) / var(--uib-stroke));
  --uib-stroke-px: calc(var(--uib-stroke) * 1px);
  --uib-size-px: calc(var(--uib-size) * 1px);
  position: relative;
  height: var(--uib-size-px);
  width: var(--uib-size-px);
  margin-bottom: 16px;
}
.line {
  position: absolute;
  top: calc(50% - var(--uib-stroke-px) / 2);
  left: calc(50% - var(--uib-stroke-px) / 2);
  width: var(--uib-stroke-px);
  height: var(--uib-stroke-px);
  background-color: var(--uib-color);
  animation: center-line var(--uib-speed) ease infinite;
  transition: background-color 0.3s ease;
}
.container::before,
.container::after {
  content: '';
  position: absolute;
  width: var(--uib-stroke-px);
  height: var(--uib-stroke-px);
  background-color: var(--uib-color);
  animation: explore var(--uib-speed) ease infinite;
  transition: background-color 0.3s ease;
}
.container::after {
  animation-delay: calc(var(--uib-speed) * -0.5);
}
@keyframes center-line {
  0%, 25%, 50%, 75%, 100% {
    transform: scaleX(1) scaleY(1);
  }
  12.5%, 62.5% {
    transform: scaleX(var(--uib-mult)) scaleY(1);
  }
  37.5%, 87.5% {
    transform: scaleX(1) scaleY(var(--uib-mult));
  }
}
@keyframes explore {
  0%, 100% {
    transform: scaleX(1) scaleY(1) translate(0%, 0%);
    transform-origin: top left;
    top: 0;
    left: 0;
  }
  12.5% {
    transform: scaleX(var(--uib-mult)) scaleY(1) translate(0%, 0%);
    transform-origin: top left;
    top: 0;
    left: 0;
  }
  12.50001% {
    transform: scaleX(var(--uib-mult)) scaleY(1) translate(0%, 0%);
    transform-origin: top right;
    top: 0;
    left: initial;
    right: 0;
  }
  25% {
    transform: scaleX(1) scaleY(1) translate(0%, 0%);
    transform-origin: top right;
    top: 0;
    left: initial;
    right: 0;
  }
  37.5% {
    transform: scaleX(1) scaleY(var(--uib-mult)) translate(0%, 0%);
    transform-origin: top right;
    top: 0;
    left: initial;
    right: 0;
  }
  37.5001% {
    transform: scaleX(1) scaleY(var(--uib-mult)) translate(0%, 0%);
    transform-origin: bottom right;
    top: initial;
    bottom: 0;
    left: initial;
    right: 0;
  }
  50% {
    transform: scaleX(1) scaleY(1) translate(0%, 0%);
    transform-origin: bottom right;
    top: initial;
    bottom: 0;
    left: initial;
    right: 0;
  }
  62.5% {
    transform: scaleX(var(--uib-mult)) scaleY(1) translate(0%, 0%);
    transform-origin: bottom right;
    top: initial;
    bottom: 0;
    left: initial;
    right: 0;
  }
  62.5001% {
    transform: scaleX(var(--uib-mult)) scaleY(1) translate(0%, 0%);
    transform-origin: bottom left;
    top: initial;
    bottom: 0;
    left: 0;
  }
  75% {
    transform: scaleX(1) scaleY(1) translate(0%, 0%);
    transform-origin: bottom left;
    top: initial;
    bottom: 0;
    left: 0;
  }
  87.5% {
    transform: scaleX(1) scaleY(var(--uib-mult)) translate(0%, 0%);
    transform-origin: bottom left;
    top: initial;
    bottom: 0;
    left: 0;
  }
  87.5001% {
    transform: scaleX(1) scaleY(var(--uib-mult)) translate(0%, 0%);
    transform-origin: top left;
    top: 0;
    left: 0;
  }
}
</style>


