<?php
header('Content-Type: application/json');

// Koneksi ke database
$servername = "127.0.0.1";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "sarpras";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil parameter dari request
$dataType = isset($_POST['data_type']) ? $_POST['data_type'] : 'prasarana';
$sekolah = isset($_POST['sekolah']) ? $_POST['sekolah'] : '';
$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : date('Y');

// Response array
$response = [];

try {
    if ($dataType === 'prasarana') {
        // Query untuk data prasarana
        $whereConditions = [];
        $params = [];
        $types = '';
        
        if (!empty($sekolah)) {
            $whereConditions[] = "npsn = ?";
            $params[] = $sekolah;
            $types .= 'i';
        }
        
        if (!empty($jenis)) {
            $whereConditions[] = "jenis = ?";
            $params[] = $jenis;
            $types .= 's';
        }
        
        // Filter berdasarkan tahun
        $whereConditions[] = "YEAR(tanggal_lapor) = ?";
        $params[] = $tahun;
        $types .= 's';
        
        $whereClause = '';
        if (!empty($whereConditions)) {
            $whereClause = "WHERE " . implode(" AND ", $whereConditions);
        }
        
        // Query untuk data total
        $sqlTotal = "SELECT 
            SUM(kondisi_baik) as kondisi_baik,
            SUM(kondisi_ringan) as kondisi_ringan,
            SUM(kondisi_sedang) as kondisi_sedang,
            SUM(kondisi_berat) as kondisi_berat,
            SUM(kondisi_baik + kondisi_ringan + kondisi_sedang + kondisi_berat) as total
        FROM laporan_prasarana $whereClause";
        
        // Query untuk data per jenis
        $sqlByJenis = "SELECT 
            jenis,
            SUM(kondisi_baik) as kondisi_baik,
            SUM(kondisi_ringan) as kondisi_ringan,
            SUM(kondisi_sedang) as kondisi_sedang,
            SUM(kondisi_berat) as kondisi_berat
        FROM laporan_prasarana $whereClause
        GROUP BY jenis
        ORDER BY jenis";
        
        // Query untuk daftar sekolah
        $sqlSekolah = "SELECT DISTINCT npsn, nama_sekolah FROM laporan_prasarana ORDER BY nama_sekolah";
        
        // Eksekusi query total
        $stmt = $conn->prepare($sqlTotal);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $resultTotal = $stmt->get_result();
        $response['total'] = $resultTotal->fetch_assoc();
        
        // Eksekusi query per jenis
        $stmt = $conn->prepare($sqlByJenis);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $resultByJenis = $stmt->get_result();
        $response['byJenis'] = [];
        while ($row = $resultByJenis->fetch_assoc()) {
            $response['byJenis'][] = $row;
        }
        
        // Eksekusi query sekolah
        $resultSekolah = $conn->query($sqlSekolah);
        $response['sekolahList'] = [];
        while ($row = $resultSekolah->fetch_assoc()) {
            $response['sekolahList'][] = $row;
        }
        
    } elseif ($dataType === 'sarana') {
        // Query untuk data sarana
        $whereConditions = [];
        $params = [];
        $types = '';
        
        if (!empty($sekolah)) {
            $whereConditions[] = "npsn = ?";
            $params[] = $sekolah;
            $types .= 'i';
        }
        
        if (!empty($jenis)) {
            $whereConditions[] = "jenis = ?";
            $params[] = $jenis;
            $types .= 's';
        }
        
        // Filter berdasarkan tahun
        $whereConditions[] = "YEAR(tanggal_lapor) = ?";
        $params[] = $tahun;
        $types .= 's';
        
        $whereClause = '';
        if (!empty($whereConditions)) {
            $whereClause = "WHERE " . implode(" AND ", $whereConditions);
        }
        
        // Query untuk data total kondisi
        $sqlTotal = "SELECT 
            SUM(CASE WHEN kondisi = 'Baik' THEN 1 ELSE 0 END) as baik,
            SUM(CASE WHEN kondisi = 'Rusak Ringan' THEN 1 ELSE 0 END) as rusak_ringan,
            SUM(CASE WHEN kondisi = 'Rusak Sedang' THEN 1 ELSE 0 END) as rusak_sedang,
            SUM(CASE WHEN kondisi = 'Rusak Berat' THEN 1 ELSE 0 END) as rusak_berat,
            COUNT(*) as total
        FROM laporan_sarana 
        $whereClause AND kondisi IS NOT NULL AND kondisi != ''";
        
        // Query untuk data per jenis sarana
        $sqlByJenis = "SELECT 
            jenis,
            SUM(CASE WHEN kondisi = 'Baik' THEN 1 ELSE 0 END) as baik,
            SUM(CASE WHEN kondisi = 'Rusak Ringan' THEN 1 ELSE 0 END) as rusak_ringan,
            SUM(CASE WHEN kondisi = 'Rusak Sedang' THEN 1 ELSE 0 END) as rusak_sedang,
            SUM(CASE WHEN kondisi = 'Rusak Berat' THEN 1 ELSE 0 END) as rusak_berat,
            COUNT(*) as total
        FROM laporan_sarana 
        $whereClause AND kondisi IS NOT NULL AND kondisi != ''
        GROUP BY jenis
        ORDER BY jenis";
        
        // Query untuk daftar sekolah
        $sqlSekolah = "SELECT DISTINCT npsn, nama_sekolah FROM laporan_sarana ORDER BY nama_sekolah";
        
        // Eksekusi query total
        $stmt = $conn->prepare($sqlTotal);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $resultTotal = $stmt->get_result();
        $response['total'] = $resultTotal->fetch_assoc();
        
        // Eksekusi query per jenis
        $stmt = $conn->prepare($sqlByJenis);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $resultByJenis = $stmt->get_result();
        $response['byJenis'] = [];
        while ($row = $resultByJenis->fetch_assoc()) {
            $response['byJenis'][] = $row;
        }
        
        // Eksekusi query sekolah
        $resultSekolah = $conn->query($sqlSekolah);
        $response['sekolahList'] = [];
        while ($row = $resultSekolah->fetch_assoc()) {
            $response['sekolahList'][] = $row;
        }
    }
    
    // Tutup koneksi
    $conn->close();
    
    echo json_encode($response);
    
} catch (Exception $e) {
    // Tangani error
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>