export interface User {
  id: string;
  email: string;
  nama_lengkap: string;
  npsn: string;
  nama_sekolah: string;
  alamat?: string;
  kecamatan?: string;
  kelurahan?: string;
  status?: string;
  created_at: string;
}

export interface Admin {
  id: string;
  username: string;
  created_at: string;
}

export interface Halaman {
  id: string;
  judul: string;
  kutipan: string;
  isi: string;
  gambar?: string;
  tgl_isi: string;
}

export interface Tutor {
  id: string;
  nama: string;
  isi: string;
  foto?: string;
  tgl_isi: string;
}

export interface Partner {
  id: string;
  nama: string;
  isi: string;
  foto?: string;
  tgl_isi: string;
}

export interface Info {
  id: string;
  judul: string;
  isi: string;
  tgl_isi: string;
}

export interface LaporanPrasarana {
  id: string;
  npsn: string;
  nama_sekolah: string;
  jenis: string;
  kondisi_baik: number;
  kondisi_ringan: number;
  kondisi_sedang: number;
  kondisi_berat: number;
  detail: string;
  created_at: string;
}

export interface LaporanSarana {
  id: string;
  npsn: string;
  nama_sekolah: string;
  jenis: string;
  kondisi: string;
  detail: string;
  created_at: string;
}

export interface KebutuhanUsaha {
  id: string;
  npsn: string;
  nama_sekolah: string;
  jenis_kebutuhan: string;
  file_surat_permohonan?: string;
  file_foto_kondisi?: string;
  file_denah_ruangan?: string;
  file_rab_kebutuhan?: string;
  detail: string;
  created_at: string;
}

export interface RiwayatLaporan {
  id: string;
  npsn: string;
  nama_sekolah: string;
  email: string;
  jenis_laporan: string;
  judul_laporan: string;
  tanggal_laporan: string;
  status: 'Menunggu' | 'Selesai';
  biaya_estimasi: number;
  keterangan: string;
  created_at: string;
}

export interface DaftarSekolah {
  NPSN: string;
  Nama_Sekolah: string;
  Alamat: string;
  Kecamatan: string;
  Kelurahan: string;
  Status: string;
}