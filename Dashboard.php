<?php
session_start();
include_once("inc/inc_koneksi.php");

// Redirect jika belum login
if (!isset($_SESSION['npsn']) || !isset($_SESSION['nama_sekolah']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// fungsi dark and light mode
if (isset($_POST['theme'])) {
    $theme = $_POST['theme'];
    $_SESSION['theme'] = $theme;
    
    // Simpan ke database jika diperlukan
    $sql = "UPDATE members SET theme_preference = ? WHERE email = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $theme, $_SESSION['email']);
    mysqli_stmt_execute($stmt);
}

// Ambil theme preference dari session atau database
$currentTheme = $_SESSION['theme'] ?? 'light';

// Ambil data dari session
$npsn = $_SESSION['npsn'];
$nama_sekolah = $_SESSION['nama_sekolah'];
$email = $_SESSION['email'];
$nama_lengkap = $_SESSION['nama_lengkap'] ?? '';

// Statistik
$total = 0;
$menunggu = 0;
$selesai = 0;
$total_biaya = 0;

// Gunakan prepared statement untuk mencegah SQL injection
$sql_stat = "SELECT status, COUNT(*) AS jumlah, SUM(biaya_estimasi) AS total_biaya 
             FROM riwayat_laporan 
             WHERE npsn = ? 
             GROUP BY status";
$stmt_stat = mysqli_prepare($koneksi, $sql_stat);
mysqli_stmt_bind_param($stmt_stat, "s", $npsn);
mysqli_stmt_execute($stmt_stat);
$result_stat = mysqli_stmt_get_result($stmt_stat);

while ($row = mysqli_fetch_assoc($result_stat)) {
    $total += $row['jumlah'];
    $total_biaya += $row['total_biaya'] ?? 0;
    if ($row['status'] == "Menunggu") $menunggu = $row['jumlah'];
    if ($row['status'] == "Selesai") $selesai = $row['jumlah'];
}

// Query untuk riwayat laporan dengan prepared statement
$sql_riwayat = "SELECT * FROM riwayat_laporan WHERE npsn = ? ORDER BY created_at DESC";
$stmt_riwayat = mysqli_prepare($koneksi, $sql_riwayat);
mysqli_stmt_bind_param($stmt_riwayat, "s", $npsn);
mysqli_stmt_execute($stmt_riwayat);
$q = mysqli_stmt_get_result($stmt_riwayat);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Sekolah - SISARPRAS</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
    body { background-color: #f8fafc; color: #1e293b; }
    .topbar {
      background: #fff;
      padding: 16px 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #e2e8f0;
    }
    .topbar .title {
      font-size: 18px;
      font-weight: 700;
      color: #4f46e5;
    }
    .topbar .user-box {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
.user-info {
  /* Gradient definition with mirrored start/end colors */
  background: linear-gradient(
    90deg,
    #4f46e5,
    #6366f1,
    #58A0C8,
    #60a5fa,
    #4f46e5,  /* Midpoint - same as start */
    #6366f1,
    #58A0C8,
    #60a5fa
  );
  
  /* Double width for seamless transition */
  background-size: 200% 100%;
  
  /* Visual styling */
  padding: 8px 16px;
  border-radius: 10px;
  color: white;
  font-weight: 600;
  
  /* Animation properties */
  animation: seamlessFlow 12s linear infinite;
  will-change: background-position; /* Optimize performance */
}

@keyframes seamlessFlow {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}

    .container {
      padding: 40px;
    }
    .header h1 { font-size: 28px; font-weight: 700; }
    .header p { margin-top: 8px; color: #64748b; }
    .stats {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      margin: 32px 0;
    }
    .card {
      flex: 1;
      min-width: 200px;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .card h3 { font-size: 14px; color: #475569; }
    .card h2 { font-size: 22px; margin-top: 8px; }
    .card small { display: block; color: #94a3b8; margin-top: 4px; }
    .tabs {
      background: #f1f5f9;
      padding: 12px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 8px;
    }
    .tabs span {
      font-weight: 600;
    }
    .tabs button {
      background: #4f46e5;
      color: white;
      padding: 8px 14px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
    }
    .riwayat {
      margin-top: 32px;
      background: white;
      padding: 24px;
      border-radius: 12px;
    }
    .riwayat h3 {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 8px;
    }
    .laporan-item {
      border: 1px solid #e2e8f0;
      padding: 16px;
      border-radius: 8px;
      margin-top: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .laporan-info {
      max-width: 80%;
    }
    .laporan-info h4 {
      margin-bottom: 6px;
      font-size: 16px;
    }
    .badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 9999px;
      font-size: 12px;
      font-weight: 600;
      margin-right: 6px;
    }
    .badge.fasilitas { background: #e0f2fe; color: #0284c7; }
    .badge.status { background: #facc15; color: #92400e; }
    .btn-detail {
      background: #f1f5f9;
      border: 1px solid #cbd5e1;
      padding: 6px 12px;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
    }
    .logout-btn {
      background: #dc3545;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }

/* Theme Variables */
:root {
  /* Light Theme */
  --bg-color: #f8fafc;
  --text-color: #1e293b;
  --card-bg: #ffffff;
  --border-color: #e2e8f0;
  --secondary-text: #64748b;
  --tabs-bg: #f1f5f9;
  --tabs-text: #1e293b;
  --btn-primary: #4f46e5;
  --btn-primary-hover: #4338ca;
  --btn-danger: #dc3545;
  --btn-danger-hover: #bb2d3b;
  --badge-fasilitas-bg: rgba(2, 132, 199, 0.1);
  --badge-fasilitas-text: #0284c7;
  --badge-status-bg: rgba(250, 204, 21, 0.1);
  --badge-status-text: #92400e;
  --shadow-color: rgba(0, 0, 0, 0.05);
}

[data-theme="dark"] {
  /* Dark Theme */
  --bg-color: #0f172a;
  --text-color: #f1f5f9;
  --card-bg: #1e293b;
  --border-color: #334155;
  --secondary-text: #94a3b8;
  --tabs-bg: #1e293b;
  --tabs-text: #f8fafc;
  --btn-primary: #6366f1;
  --btn-primary-hover: #4f46e5;
  --btn-danger: #ef4444;
  --btn-danger-hover: #dc2626;
  --badge-fasilitas-bg: rgba(2, 132, 199, 0.2);
  --badge-fasilitas-text: #38bdf8;
  --badge-status-bg: rgba(250, 204, 21, 0.2);
  --badge-status-text: #facc15;
  --shadow-color: rgba(0, 0, 0, 0.2);
}

/* Base Styles */
body {
  background-color: var(--bg-color);
  color: var(--text-color);
  transition: background-color 0.3s ease, color 0.3s ease;
}

/* Topbar */
.topbar {
  background: var(--card-bg);
  border-bottom: 1px solid var(--border-color);
  transition: all 0.3s ease;
}

.topbar .title {
  color: var(--btn-primary);
}

/* Cards */
.card {
  background: var(--card-bg);
  box-shadow: 0 4px 6px var(--shadow-color);
  transition: all 0.3s ease;
}

.card h3 {
  color: var(--secondary-text);
}

.card small {
  color: var(--secondary-text);
}

/* Tabs */
.tabs {
  background: var(--tabs-bg);
  color: var(--tabs-text);
  transition: all 0.3s ease;
}

.tabs button {
  background: var(--btn-primary);
  color: white;
  transition: all 0.2s ease;
}

.tabs button:hover {
  background: var(--btn-primary-hover);
  transform: translateY(-1px);
}

/* Buttons */
.btn-detail {
  background: var(--tabs-bg);
  color: var(--text-color);
  border: 1px solid var(--border-color);
  transition: all 0.2s ease;
}

.btn-detail:hover {
  background: var(--border-color);
}

.logout-btn {
  background: var(--btn-danger);
  color: white;
  transition: all 0.2s ease;
}

.logout-btn:hover {
  background: var(--btn-danger-hover);
  transform: translateY(-1px);
}

/* Badges */
.badge {
  transition: all 0.3s ease;
}

.badge.fasilitas {
  background: var(--badge-fasilitas-bg);
  color: var(--badge-fasilitas-text);
}

.badge.status {
  background: var(--badge-status-bg);
  color: var(--badge-status-text);
}

/* Riwayat Section */
.riwayat {
  background: var(--card-bg);
  transition: all 0.3s ease;
}

.laporan-item {
  border: 1px solid var(--border-color);
  transition: all 0.3s ease;
}

/* Theme Toggle Button */
.theme-toggle {
  background: var(--btn-primary);
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  margin-left: 10px;
  transition: all 0.2s ease;
  display: flex;
  align-items: center;
  gap: 8px;
}

.theme-toggle:hover {
  background: var(--btn-primary-hover);
  transform: translateY(-1px);
}

.theme-toggle .icon {
  font-size: 1.1em;
}

/* Base Card Styles */
.card {
  flex: 1;
  min-width: 200px;
  background: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  position: relative;
  overflow: hidden;
  border: 1px solid rgba(0,0,0,0.05);
}

/* Common Hover Effects */
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 4px;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s ease;
}

.card:hover::before {
  transform: scaleX(1);
}

/* Card Specific Styles */
/* Total Laporan */
.card:nth-child(1) {
  border-left: 4px solid #4f46e5;
}

.card:nth-child(1)::before {
  background: linear-gradient(90deg, #4f46e5, #6366f1);
}

.card:nth-child(1):hover {
  border-color: rgba(79, 70, 229, 0.3);
}

.card:nth-child(1):hover h2 {
  color: #4f46e5;
}

/* Menunggu Review */
.card:nth-child(2) {
  border-left: 4px solid #facc15;
}

.card:nth-child(2)::before {
  background: linear-gradient(90deg, #facc15, #fde047);
}

.card:nth-child(2):hover {
  border-color: rgba(250, 204, 21, 0.3);
}

.card:nth-child(2):hover h2 {
  color: #d97706;
}

/* Selesai */
.card:nth-child(3) {
  border-left: 4px solid #22c55e;
}

.card:nth-child(3)::before {
  background: linear-gradient(90deg, #22c55e, #4ade80);
}

.card:nth-child(3):hover {
  border-color: rgba(34, 197, 94, 0.3);
}

.card:nth-child(3):hover h2 {
  color: #15803d;
}

/* Total Biaya */
.card:nth-child(4) {
  border-left: 4px solid #4338ca;
}

.card:nth-child(4)::before {
  background: linear-gradient(90deg, #4338ca, #4f46e5);
}

.card:nth-child(4):hover {
  border-color: rgba(67, 56, 202, 0.3);
}

.card:nth-child(4):hover h2 {
  color: #4338ca;
}

/* Dark Mode Adjustments */
[data-theme="dark"] .card {
  background: var(--card-bg);
  border-color: rgba(255,255,255,0.05);
}

[data-theme="dark"] .card:nth-child(1):hover {
  border-color: rgba(99, 102, 241, 0.3);
}

[data-theme="dark"] .card:nth-child(2):hover {
  border-color: rgba(234, 179, 8, 0.3);
}

[data-theme="dark"] .card:nth-child(3):hover {
  border-color: rgba(74, 222, 128, 0.3);
}

[data-theme="dark"] .card:nth-child(4):hover {
  border-color: rgba(79, 70, 229, 0.3);
}

    .theme-toggle {
      background: var(--btn-primary);
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      margin-left: 10px;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .theme-toggle:hover {
      background: var(--btn-primary-hover);
      transform: translateY(-1px);
    }

    .theme-toggle .icon {
      font-size: 1.1em;
    }

    
  </style>
</head>
<body>
  <div class="topbar">
    <div class="title">SISARPRAS <span style="font-weight: 400; font-size: 14px; color: #64748b;">Sistem Informasi Sarana Prasarana</span></div>
    <div class="user-box">
      <button class="theme-toggle" id="themeToggle">
      <span id="themeIcon">🌙</span>
     </button>
      <div class="user-info"><?php echo htmlspecialchars($nama_sekolah); ?></div>
      <div class="user-info"><?php echo htmlspecialchars($npsn); ?></div>
      <div class="user-info"><?php echo htmlspecialchars($email); ?></div>
      <a href="logout.php" class="logout-btn">Log Out</a>
    </div>
  </div>

  <div class="container">
    <div class="header">
      <h1>Dashboard <span style="color: #4f46e5"></span></h1>
      <p>Kelola laporan sarana prasarana sekolah Anda</p>
    </div>

   <div class="stats">
  <div class="card card-total">
    <h3>Total Laporan</h3>
    <h2><?php echo htmlspecialchars($total); ?></h2>
    <small>Laporan yang telah dibuat</small>
  </div>
  <div class="card card-pending">
    <h3>Menunggu Review</h3>
    <h2 style="color: #facc15"><?php echo htmlspecialchars($menunggu); ?></h2>
    <small>Sedang ditinjau admin</small>
  </div>
  <div class="card card-completed">
    <h3>Selesai</h3>
    <h2 style="color: #78C841"><?php echo htmlspecialchars($selesai); ?></h2>
    <small>Telah diselesaikan</small>
  </div>
  <div class="card card-cost">
    <h3>Total Biaya</h3>
    <h2 style="color: #4f46e5">Rp <?php echo number_format($total_biaya, 0, ',', '.'); ?></h2>
    <small>Estimasi total biaya</small>
  </div>
</div>

    <div class="tabs">
      <span>📄 Laporan Saya</span>
      <a href="buat_laporan.php"><button>＋ Buat Laporan</button></a>
    </div>

    <div class="riwayat">
      <h3>Riwayat Laporan</h3>
      <p>Daftar semua laporan yang telah Anda buat</p>
      <?php if (mysqli_num_rows($q) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($q)): ?>
          <div class="laporan-item">
            <div class="laporan-info">
              <span class="badge fasilitas"><?php echo htmlspecialchars($row['jenis'] ?? '-'); ?></span>
              <span class="badge status"><?php echo htmlspecialchars($row['status'] ?? 'Menunggu'); ?></span>
              <h4><?php echo htmlspecialchars($row['detail'] ?? '-'); ?></h4>
              <small><?php echo htmlspecialchars($row['created_at'] ?? ''); ?></small>
            </div>
            <a href="detail_laporan.php?id=<?php echo htmlspecialchars($row['id'] ?? ''); ?>"><button class="btn-detail">Detail</button></a>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Belum ada laporan.</p>
      <?php endif; ?>
    </div>
  </div>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  const themeToggle = document.getElementById('themeToggle');
  const themeIcon = document.getElementById('themeIcon');
  const html = document.documentElement;
  
  // Cek preferensi theme dari localStorage
  const currentTheme = localStorage.getItem('theme') || 'light';
  html.setAttribute('data-theme', currentTheme);
  
  // Update icon berdasarkan theme
  if (currentTheme === 'dark') {
    themeIcon.textContent = '☀️';
  } else {
    themeIcon.textContent = '🌙';
  }
  
  // Toggle theme saat tombol diklik
  themeToggle.addEventListener('click', function() {
    const currentTheme = html.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    
    if (newTheme === 'dark') {
      themeIcon.textContent = '☀️';
    } else {
      themeIcon.textContent = '🌙';
    }
  });
  
  // Deteksi preferensi sistem
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');
  if (prefersDark.matches && !localStorage.getItem('theme')) {
    html.setAttribute('data-theme', 'dark');
    themeIcon.textContent = '☀️';
  }
});

document.addEventListener('DOMContentLoaded', function() {
  // ... your existing theme toggle code ...

  // Add card hover effects
  const cards = document.querySelectorAll('.card');
  
  cards.forEach(card => {
    // Add event listeners for each card
    card.addEventListener('mouseenter', () => {
      card.style.zIndex = '10'; // Bring to front during hover
    });
    
    card.addEventListener('mouseleave', () => {
      card.style.zIndex = ''; // Reset z-index
    });
  });
});

</script>
</body>
</html>