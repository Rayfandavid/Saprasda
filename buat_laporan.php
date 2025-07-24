<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Sarana & Prasarana</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      /* Light Theme */
      --primary: #4f46e5;
      --primary-dark: #4338ca;
      --secondary: #f8fafc;
      --text: #1e293b;
      --text-light: #64748b;
      --border: #e2e8f0;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --card-bg: #ffffff;
      --header-bg: #f1f5f9;
      --shadow-color: rgba(0, 0, 0, 0.1);
      --header-gradient: linear-gradient(135deg, #4f46e5, #7c3aed);
      --input-bg: #ffffff;
      --input-text: #1e293b;
      --table-header-bg: #f1f5f9;
      --table-row-even: #f8fafc;
      --table-row-hover: #f1f5f9;
      --footer-bg: transparent;
      --footer-text: #64748b;
    }

    [data-theme="dark"] {
      /* Dark Theme */
      --primary: #6366f1;
      --primary-dark: #4f46e5;
      --secondary: #0f172a;
      --text: #f1f5f9;
      --text-light: #94a3b8;
      --border: #334155;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --card-bg: #1e293b;
      --header-bg: #1e293b;
      --shadow-color: rgba(0, 0, 0, 0.3);
      --header-gradient: linear-gradient(135deg, #4338ca, #5b21b6);
      --input-bg: #1e293b;
      --input-text: #f1f5f9;
      --table-header-bg: #1e293b;
      --table-row-even: #0f172a;
      --table-row-hover: #1e293b;
      --footer-bg: #1e293b;
      --footer-text: #94a3b8;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }
    
    body {
      font-family: 'Inter', sans-serif;
      background: var(--secondary);
      color: var(--text);
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    .container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 20px;
      width: 100%;
      flex: 1;
    }
    
    header {
      background: var(--header-gradient);
      color: white;
      padding: 25px 30px;
      border-radius: 12px;
      margin-bottom: 25px;
      box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
    }
    
    h1 {
      margin-bottom: 8px;
      font-size: 2.2rem;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
    .description {
      font-size: 1.1rem;
      max-width: 800px;
      opacity: 0.9;
    }
    
    .summary-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }
    
    .card {
      background: var(--card-bg);
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px var(--shadow-color);
      border-top: 4px solid var(--primary);
      transition: transform 0.3s;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    .card h3 {
      font-size: 1.1rem;
      color: var(--text-light);
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    .card .value {
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--primary);
    }
    
    .card .trend {
      font-size: 0.9rem;
      color: var(--success);
      margin-top: 5px;
    }
    
    .section {
      background: var(--card-bg);
      padding: 28px;
      margin-top: 24px;
      border-radius: 12px;
      box-shadow: 0 4px 12px var(--shadow-color);
    }
    
    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
    }
    
    .section h2 {
      font-size: 1.6rem;
      color: var(--text);
      position: relative;
      padding-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .section h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 40px;
      width: 50px;
      height: 4px;
      background-color: var(--primary);
      border-radius: 2px;
    }
    
    /* Table styling */
    .table-container {
      overflow-x: auto;
      border-radius: 8px;
      border: 1px solid var(--border);
      position: relative;
    }
    
    .table-scroll-hint {
      position: absolute;
      top: 10px;
      right: 10px;
      background: rgba(79, 70, 229, 0.1);
      color: var(--primary);
      font-size: 0.85rem;
      padding: 5px 10px;
      border-radius: 20px;
      display: none;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 800px;
    }
    
    th, td {
      padding: 16px 20px;
      border: 1px solid var(--border);
      text-align: left;
      vertical-align: middle;
    }
    
    th {
      background-color: var(--table-header-bg);
      font-weight: 600;
      color: var(--text);
      position: sticky;
      left: 0;
      white-space: nowrap;
    }
    
    tbody tr:nth-child(even) {
      background-color: var(--table-row-even);
    }
    
    tbody tr:hover {
      background-color: var(--table-row-hover);
    }
    
    .condition-baik {
      color: var(--success);
      font-weight: 600;
    }
    
    .condition-ringan {
      color: var(--warning);
      font-weight: 600;
    }
    
    .condition-sedang {
      color: #f97316;
      font-weight: 600;
    }
    
    .condition-berat {
      color: var(--danger);
      font-weight: 600;
    }
    
    /* Form elements */
    select,
    textarea,
    input[type="text"],
    input[type="number"] {
      padding: 14px;
      width: 100%;
      border-radius: 8px;
      border: 1px solid var(--border);
      background-color: var(--input-bg);
      font-family: 'Inter', sans-serif;
      font-size: 1rem;
      transition: all 0.2s;
      color: var(--input-text);
    }
    
    input[type="file"] {
      display: block;
      width: 100%;
      padding: 12px 16px;
      font-family: 'Inter', sans-serif;
      font-size: 0.95rem;
      color: var(--text-light);
      background-color: var(--input-bg);
      border: 1px solid var(--border);
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    input[type="file"]:hover {
      border-color: var(--primary);
      background-color: rgba(79, 70, 229, 0.1);
    }

    input[type="file"]::file-selector-button {
      background-color: var(--primary);
      color: white;
      border: none;
      padding: 8px 16px;
      margin-right: 16px;
      border-radius: 6px;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s;
      display: none;
    }

    input[type="file"]::file-selector-button:hover {
      background-color: var(--primary-dark);
    }
    
    select:focus,
    textarea:focus,
    input[type="text"]:focus,
    input[type="number"]:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
    }
    
    input[type="number"] {
      max-width: 120px;
      text-align: center;
      font-weight: 600;
    }
    
    textarea {
      resize: vertical;
      min-height: 100px;
      max-height: 200px;
      width: 100%;
    }
    
    button {
      background: linear-gradient(to right, var(--primary), var(--primary-dark));
      color: white;
      border: none;
      padding: 16px 32px;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      font-size: 1.1rem;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
    }
    
    button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
    }
    
    button:active {
      transform: translateY(0);
    }
    
    .action-bar {
      display: flex;
      justify-content: flex-end;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px dashed var(--border);
    }
    
    footer {
      text-align: center;
      padding: 25px;
      color: var(--footer-text);
      font-size: 0.9rem;
      margin-top: 40px;
      background-color: var(--footer-bg);
    }

    /* Theme Toggle Button */
    .theme-toggle-container {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 100;
    }

    .theme-toggle {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--primary);
      color: white;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    .theme-toggle:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
      .container {
        padding: 15px;
      }
      
      .section {
        padding: 22px;
      }
      
      th, td {
        padding: 14px 16px;
      }
    }
    
    @media (max-width: 768px) {
      header {
        padding: 20px;
      }
      
      h1 {
        font-size: 1.8rem;
      }
      
      .section {
        padding: 20px 16px;
      }
      
      .section h2 {
        font-size: 1.4rem;
      }
      
      .table-scroll-hint {
        display: block;
      }
      
      button {
        width: 100%;
        justify-content: center;
      }

      .theme-toggle-container {
        bottom: 20px;
        right: 20px;
      }

      .theme-toggle {
        width: 50px;
        height: 50px;
        font-size: 1.3rem;
      }
    }
    
    @media (max-width: 480px) {
      header {
        padding: 18px;
        border-radius: 10px;
      }
      
      h1 {
        font-size: 1.5rem;
      }
      
      .description {
        font-size: 0.95rem;
      }
      
      .card {
        padding: 20px;
      }
      
      .card .value {
        font-size: 1.8rem;
      }
      
      .section {
        padding: 16px 12px;
        border-radius: 10px;
      }
      
      th, td {
        padding: 12px 14px;
        font-size: 0.9rem;
      }
      
      input[type="number"] {
        max-width: 100%;
      }

      input[type="file"] {
        font-size: 0.85rem;
        padding: 10px 14px;
      }

      input[type="file"]::file-selector-button {
        padding: 6px 12px;
        font-size: 0.85rem;
      }

      .theme-toggle-container {
        bottom: 15px;
        right: 15px;
      }

      .theme-toggle {
        width: 45px;
        height: 45px;
        font-size: 1.2rem;
      }
    }
    
    .status-indicator {
      display: inline-block;
      width: 12px;
      height: 12px;
      border-radius: 50%;
      margin-right: 8px;
    }
    
    .status-baik { background: var(--success); }
    .status-ringan { background: var(--warning); }
    .status-sedang { background: #f97316; }
    .status-berat { background: var(--danger); }
    
    /* Progress bars */
    .progress-container {
      margin-top: 5px;
      height: 8px;
      background: var(--border);
      border-radius: 4px;
      overflow: hidden;
    }
    
    .progress-bar {
      height: 100%;
      border-radius: 4px;
    }
    
    .progress-baik { background: var(--success); width: 72%; }
    .progress-ringan { background: var(--warning); width: 15%; }
    .progress-sedang { background: #f97316; width: 8%; }
    .progress-berat { background: var(--danger); width: 5%; }
    
    .progress-labels {
      display: flex;
      justify-content: space-between;
      font-size: 0.8rem;
      margin-top: 5px;
      color: var(--text-light);
    }

    /*back button*/
    .back-btn {
  background: var(--text-light);
  color: var(--text);
  border: 1px solid var(--border);
  padding: 16px 32px;
  border-radius: 10px;
  font-weight: 600;
  cursor: pointer;
  font-size: 1.1rem;
  transition: all 0.3s;
  display: inline-flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
  margin-right: 15px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.back-btn:hover {
  background: var(--border);
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

[data-theme="dark"] .back-btn {
  background: #334155;
  color: #f1f5f9;
}

[data-theme="dark"] .back-btn:hover {
  background: #475569;
}

.alert-success {
  background-color: #d1fae5;
  color: #065f46;
  padding: 16px 24px;
  border-radius: 8px;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
  box-shadow: 0 4px 12px var(--shadow-color);
  animation: fadeOut 1s ease-in-out 2.5s forwards;
}

@keyframes fadeOut {
  to {
    opacity: 0;
    transform: translateY(-10px);
  }
}
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1><i class="fas fa-school"></i> Laporan Kondisi Sarana & Prasarana Sekolah</h1>
      <p class="description">Silakan isi kondisi terkini dari masing-masing fasilitas di sekolah Anda. Data ini akan digunakan untuk perbaikan dan pemeliharaan.</p>
    </header>
    <!-- Tambahkan di atas <form> -->
<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <div class="alert-success" id="alertSuccess">
    <i class="fas fa-check-circle"></i> Data berhasil disimpan. Anda akan diarahkan ke dashboard...
  </div>
<?php endif; ?>
    <form action="simpan_laporan.php" method="post" enctype="multipart/form-data">
      <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <div class="alert-success" id="alertSuccess">
    <i class="fas fa-check-circle"></i> Data berhasil disimpan. Anda akan diarahkan ke dashboard...
  </div>
<?php endif; ?>
      <!-- PERBAIKAN STYLE DAN STRUKTUR INPUT IDENTITAS SEKOLAH -->
      <div class="section">
        <div class="section-header">
          <h2><i class="fas fa-id-card"></i> Identitas Sekolah</h2>
        </div>
        <div class="table-container">
          <table>
            <tbody>
              <tr>
                <td><label for="npsn">NPSN</label></td>
                <td>
                  <input type="text" id="npsn" name="npsn" required placeholder="Masukkan NPSN">
                  <button type="button" onclick="isiOtomatis()" style="margin-top: 10px; width: auto; padding: 8px 16px;">Isi Otomatis</button>
                </td>
              </tr>
              <tr>
                <td><label for="nama_sekolah">Nama Sekolah</label></td>
                <td><input type="text" id="nama_sekolah" name="nama_sekolah" readonly required placeholder="Nama sekolah akan terisi otomatis"></td>
              </tr>
              <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" id="alamat" name="alamat" required></td>
              </tr>
              <tr>
                <td><label for="kecamatan">Kecamatan</label></td>
                <td><input type="text" id="kecamatan" name="kecamatan" required></td>
              </tr>
              <tr>
                <td><label for="kelurahan">Kelurahan</label></td>
                <td><input type="text" id="kelurahan" name="kelurahan" required></td>
              </tr>
              <tr>
                <td><label for="status">Status</label></td>
                <td><input type="text" id="status" name="status" required></td>
              </tr>
            </tbody>
          </table>
        </div>
        <h1>Catatan:</h1>
        <p>1. Silakan isi NPSN terlebih dahulu, kemudian klik tombol "Isi Otomatis" untuk mengisi data sekolah secara otomatis.</p>
        <p>2. Pastikan semua data di atas terisi dengan benar sebelum melanjutkan ke bagian berikutnya.</p>
      </div>

      <div class="section">
        <div class="section-header">
          <h2><i class="fas fa-building"></i> Data Kondisi Prasarana</h2>
          <div class="table-scroll-hint"><i class="fas fa-arrows-left-right"></i> Geser untuk melihat lebih banyak</div>
        </div>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Jenis Prasarana</th>
                <th><span class="status-indicator status-baik"></span> Baik</th>
                <th><span class="status-indicator status-ringan"></span> Rusak Ringan</th>
                <th><span class="status-indicator status-sedang"></span> Rusak Sedang</th>
                <th><span class="status-indicator status-berat"></span> Rusak Berat</th>
                <th>Detail Kondisi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ruang Kelas</td>
                <td><input type="number" name="prasarana[ruang_kelas][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_kelas][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_kelas][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_kelas][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[ruang_kelas][detail]" placeholder="Catatan kondisi ruang kelas..."></textarea></td>
              </tr>
              <tr>
                <td>Ruang Perpustakaan</td>
                <td><input type="number" name="prasarana[perpustakaan][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[perpustakaan][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[perpustakaan][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[perpustakaan][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[perpustakaan][detail]" placeholder="Catatan kondisi perpustakaan..."></textarea></td>
              </tr>
              <tr>
                <td>Lab IPA</td>
                <td><input type="number" name="prasarana[lab_ipa][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lab_ipa][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lab_ipa][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lab_ipa][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[lab_ipa][detail]" placeholder="Catatan kondisi lab IPA..."></textarea></td>
              </tr>
              <tr>
                <td>Lab Komputer</td>
                <td><input type="number" name="prasarana[lab_komputer][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lab_komputer][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lab_komputer][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lab_komputer][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[lab_komputer][detail]" placeholder="Catatan kondisi lab komputer..."></textarea></td>
              </tr>
              <tr>
                <td>Ruang Administrasi</td>
                <td><input type="number" name="prasarana[ruang_admin][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_admin][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_admin][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_admin][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[ruang_admin][detail]" placeholder="Catatan kondisi ruang administrasi..."></textarea></td>
              </tr>
              <tr>
                <td>Ruang UKS</td>
                <td><input type="number" name="prasarana[ruang_uks][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_uks][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_uks][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_uks][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[ruang_uks][detail]" placeholder="Catatan kondisi ruang UKS..."></textarea></td>
              </tr>
              <tr>
                <td>Toilet (secara keseluruhan)</td>
                <td><input type="number" name="prasarana[toilet][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[toilet][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[toilet][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[toilet][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[toilet][detail]" placeholder="Catatan kondisi toilet..."></textarea></td>
              </tr>
              <tr>
                <td>Ruang Ibadah</td>
                <td><input type="number" name="prasarana[ruang_ibadah][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_ibadah][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_ibadah][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_ibadah][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[ruang_ibadah][detail]" placeholder="Catatan kondisi ruang ibadah..."></textarea></td>
              </tr>
              <tr>
                <td>Rumah Dinas</td>
                <td><input type="number" name="prasarana[ruang_dinas][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_dinas][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_dinas][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[ruang_dinas][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[ruang_dinas][detail]" placeholder="Catatan kondisi ruang dinas..."></textarea></td>
              </tr>
              <tr>
                <td>Lapang Upacara</td>
                <td><input type="number" name="prasarana[lapangan_upacara][baik]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lapangan_upacara][ringan]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lapangan_upacara][sedang]" min="0" placeholder="0"></td>
                <td><input type="number" name="prasarana[lapangan_upacara][berat]" min="0" placeholder="0"></td>
                <td><textarea name="prasarana[lapangan_upacara][detail]" placeholder="Catatan kondisi lapangan/halaman..."></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="section">
        <div class="section-header">
          <h2><i class="fas fa-desktop"></i> Data Kondisi Sarana</h2>
        </div>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Jenis Sarana</th>
                <th>Kondisi</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Meubel</td>
                <td>
                  <select name="sarana[meubel][kondisi]" onchange="toggleTextarea(this, 'meubel_detail')">
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Sedang">Rusak Sedang</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                  </select>
                </td>
                <td>
                  <textarea name="sarana[meubel][detail]" id="meubel_detail" placeholder="Jelaskan lebih lanjut kondisi meubel..."></textarea>
                </td>
              </tr>
              <tr>
                <td>TIK</td>
                <td>
                  <select name="sarana[tik][kondisi]" onchange="toggleTextarea(this, 'tik_detail')">
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Sedang">Rusak Sedang</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                  </select>
                </td>
                <td>
                  <textarea name="sarana[tik][detail]" id="tik_detail" placeholder="Jelaskan lebih lanjut kondisi TIK..."></textarea>
                </td>
              </tr>
              <tr>
                <td>Penunjang Pembelajaran</td>
                <td>
                  <select name="sarana[penunjang][kondisi]" onchange="toggleTextarea(this, 'penunjang_detail')">
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Sedang">Rusak Sedang</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                  </select>
                </td>
                <td>
                  <textarea name="sarana[penunjang][detail]" id="penunjang_detail" placeholder="Jelaskan lebih lanjut kondisi penunjang pembelajaran..."></textarea>
                </td>
              </tr>
              <tr>
                <td>Peralatan Lab IPA</td>
                <td>
                  <select name="sarana[lab_ipa][kondisi]" onchange="toggleTextarea(this, 'lab_ipa_detail')">
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Sedang">Rusak Sedang</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                  </select>
                </td>
                <td>
                  <textarea name="sarana[lab_ipa][detail]" id="lab_ipa_detail" placeholder="Jelaskan lebih lanjut kondisi peralatan lab IPA..."></textarea>
                </td>
              </tr>
              <tr>
                <td>Peralatan PJOK</td>
                <td>
                  <select name="sarana[pjok][kondisi]" onchange="toggleTextarea(this, 'pjok_detail')">
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Sedang">Rusak Sedang</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                  </select>
                </td>
                <td>
                  <textarea name="sarana[pjok][detail]" id="pjok_detail" placeholder="Jelaskan lebih lanjut kondisi peralatan PJOK..."></textarea>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>

      <div class="section">
        <div class="section-header">
          <h2><i class="fas fa-building"></i>Data Kebutuhan Usaha (sarana & prasarana)</h2>
          <div class="table-scroll-hint"><i class="fas fa-arrows-left-right"></i> Geser untuk melihat lebih banyak</div>
        </div>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Jenis Prasarana</th>
                <th><span class=""></span> Surat Permohonan</th>
                <th><span class=""></span> Foto Kondisi</th>
                <th><span class=""></span> Denah Ruangan</th>
                <th><span class=""></span> RAB Kebutuhan</th>
                <th>Detail Kondisi</th>
              </tr>
            </thead>
            <tbody>
             <tr>
                <td>Pembangunan Sarana, Prasarana dan Utilitas</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Penyediaan Mebel Kelas</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Pengadaan Ruang Kelas Baru (RKB)</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Rehabilitasi Sedang, Berat Ruang Kelas Sekolah</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Penyedia Alat Praktik & Peraga Peserta Didik</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Pembangunan Ruang kelas Baru</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Pembangunan Ruang Guru, Kepala Sekolah, TU</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Pembangunan Ruang Unit Kesehatan Sekolah (UKS)</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Rehabilitasi Sedang Berat Ruang Unit Kesehatan Sekolah (UKS)</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
              <tr>
                <td>Rehabilitasi Sedang Berat Perpustakaan Sekolah</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
               <tr>
                <td>Pengadaan Perlengkapan Kelas</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
               <tr>
                <td>Pembangunan Laboratorium Sekolah</td>
                <td><input type="file" name="kebutuhan_usaha[0][surat_permohonan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][foto_kondisi]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][denah_ruangan]"></td>
                <td><input type="file" name="kebutuhan_usaha[0][rab_kebutuhan]"></td>
                <td><textarea name="kebutuhan_usaha[0][detail]"  placeholder="Catat Detail..."></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


      <div class="action-bar">
  <a href="dashboard.php" class="back-btn">
    <i class="fas fa-arrow-left"></i> Kembali
  </a>
  <button type="submit">
    <i class="fas fa-paper-plane"></i> Kirim Laporan
  </button>
</div>

    </form>

  </div>

       <div class="theme-toggle-container">
    <button class="theme-toggle" id="themeToggle">
      <i class="fas fa-moon" id="themeIcon"></i>
    </button>
  </div>

  <footer>
    <p>Sistem Pelaporan Sarana & Prasarana Sekolah © 2025</p>
  </footer>

  <script>

    if (window.location.search.includes('success=1')) {
  setTimeout(() => {
    window.location.href = "Dashboard.php";
  }, 3000);
}
    // Theme Toggle Functionality
    document.addEventListener('DOMContentLoaded', function() {
      const themeToggle = document.getElementById('themeToggle');
      const themeIcon = document.getElementById('themeIcon');
      const html = document.documentElement;
      
      // Check for saved theme preference or use preferred color scheme
      const savedTheme = localStorage.getItem('theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      
      // Set initial theme
      if (savedTheme) {
        html.setAttribute('data-theme', savedTheme);
      } else if (prefersDark) {
        html.setAttribute('data-theme', 'dark');
      }
      
      // Update icon based on current theme
      updateThemeIcon();
      
      // Toggle theme when button is clicked
      themeToggle.addEventListener('click', function() {
        const currentTheme = html.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        html.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
        updateThemeIcon();
      });
      
      function updateThemeIcon() {
        const currentTheme = html.getAttribute('data-theme');
        if (currentTheme === 'dark') {
          themeIcon.classList.remove('fa-moon');
          themeIcon.classList.add('fa-sun');
        } else {
          themeIcon.classList.remove('fa-sun');
          themeIcon.classList.add('fa-moon');
        }
      }

      // Initialize textareas
      document.querySelectorAll('select').forEach(select => {
        const textareaId = select.getAttribute('onchange')?.match(/'([^']+)'/)?.[1];
        if (textareaId && select.value === '') {
          document.getElementById(textareaId).style.display = 'none';
        }
      });
    });


    function isiOtomatis() {
      let npsn = document.getElementById("npsn").value;

      if (npsn.length > 0) {
          fetch("cari_npsn.php?npsn=" + encodeURIComponent(npsn))
              .then(response => response.json())
              .then(data => {
                  if (Object.keys(data).length > 0) {
                      document.getElementById("nama_sekolah").value = data.Nama_Sekolah || "";
                      document.getElementById("alamat").value = data.Alamat || "";
                      document.getElementById("kecamatan").value = data.Kecamatan || "";
                      document.getElementById("kelurahan").value = data.Kelurahan || "";
                      document.getElementById("status").value = data.Status || "";
                  } else {
                      alert("Data NPSN tidak ditemukan.");
                  }
              })
              .catch(error => {
                  console.error("Error:", error);
                  alert("Gagal mengambil data.");
              });
      } else {
          alert("Harap isi NPSN terlebih dahulu.");
      }
    }

    function toggleTextarea(selectElement, textareaId) {
      const textarea = document.getElementById(textareaId);
      if (selectElement.value !== '') {
        textarea.style.display = 'block';
      } else {
        textarea.style.display = 'none';
        textarea.value = '';
      }
    }

    document.querySelector('.back-btn').addEventListener('click', function(e) {
  if(confirm('Apakah Anda yakin ingin kembali? Data yang sudah diisi mungkin tidak akan tersimpan.')) {
    return true;
  } else {
    e.preventDefault();
  }
});
    


  </script>
</body>
</html>