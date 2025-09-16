<?php
include "inc/inc_koneksi.php";
$npsn = $_GET['npsn'] ?? '';

// Ambil daftar tanggal unik dari riwayat_laporan
$tanggal_query = mysqli_query($koneksi, "
    SELECT DISTINCT DATE(created_at) AS tanggal
    FROM riwayat_laporan
    WHERE npsn='$npsn'
    ORDER BY tanggal DESC
");
?>
<h2>Daftar Laporan</h2>
<ul>
<?php
if ($tanggal_query && mysqli_num_rows($tanggal_query) > 0) {
    while ($row = mysqli_fetch_assoc($tanggal_query)) {
        $tanggal = $row['tanggal'];
        echo "<li>
                <a href='detail_laporan.php?npsn=$npsn&tanggal=$tanggal'>
                    Laporan tanggal $tanggal
                </a>
              </li>";
    }
} else {
    echo "<p>Tidak ada laporan</p>";
}
?>
</ul>
