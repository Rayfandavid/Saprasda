<?php include("inc_header.php"); ?>
<h1>Data Laporan Sarpras Sekolah</h1>

<table class="table table-striped">
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
       $sql = "
    SELECT 
        ds.NPSN, ds.Nama_Sekolah, ds.Kecamatan, ds.Status,
        CASE 
            WHEN EXISTS (
                SELECT 1 FROM laporan_prasarana lp WHERE lp.npsn = ds.NPSN
            ) THEN '✅' ELSE '❌' 
        END AS sudah_lapor
    FROM daftar_sd ds
    ORDER BY ds.Nama_Sekolah ASC
";

        $q = mysqli_query($koneksi, $sql);
        $no = 1;
        while ($r = mysqli_fetch_array($q)) {
            echo "<tr>";
            echo "<td>{$no}</td>";
            echo "<td>{$r['NPSN']}</td>";
            echo "<td>{$r['Nama_Sekolah']}</td>";
            echo "<td>{$r['Kecamatan']}</td>";
            echo "<td>{$r['Status']}</td>";
            echo "<td>{$r['sudah_lapor']}</td>";
            echo "<td>";
            if ($r['sudah_lapor'] == '✅') {
                echo "<a href='detail_laporan.php?npsn={$r['NPSN']}' class='btn btn-sm btn-info'>Lihat Detail</a>";
            } else {
                echo "-";
            }
            echo "</td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </tbody>
</table>
<?php include("inc_footer.php"); ?>
