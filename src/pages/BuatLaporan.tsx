import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import { supabase } from '../lib/supabase';
import { School, Building, Desktop, ArrowLeft, Send, CheckCircle } from 'lucide-react';

interface PrasaranaData {
  [key: string]: {
    baik: number;
    ringan: number;
    sedang: number;
    berat: number;
    detail: string;
  };
}

interface SaranaData {
  [key: string]: {
    kondisi: string;
    detail: string;
  };
}

export function BuatLaporan() {
  const { user } = useAuth();
  const navigate = useNavigate();
  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  
  const [identitasSekolah, setIdentitasSekolah] = useState({
    npsn: user?.npsn || '',
    nama_sekolah: user?.nama_sekolah || '',
    alamat: user?.alamat || '',
    kecamatan: user?.kecamatan || '',
    kelurahan: user?.kelurahan || '',
    status: user?.status || ''
  });

  const [prasaranaData, setPrasaranaData] = useState<PrasaranaData>({
    ruang_kelas: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    perpustakaan: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    lab_ipa: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    lab_komputer: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    ruang_admin: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    ruang_uks: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    toilet: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    ruang_ibadah: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    ruang_dinas: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' },
    lapangan_upacara: { baik: 0, ringan: 0, sedang: 0, berat: 0, detail: '' }
  });

  const [saranaData, setSaranaData] = useState<SaranaData>({
    meubel: { kondisi: '', detail: '' },
    tik: { kondisi: '', detail: '' },
    penunjang: { kondisi: '', detail: '' },
    lab_ipa: { kondisi: '', detail: '' },
    pjok: { kondisi: '', detail: '' }
  });

  const handlePrasaranaChange = (jenis: string, field: string, value: string | number) => {
    setPrasaranaData(prev => ({
      ...prev,
      [jenis]: {
        ...prev[jenis],
        [field]: value
      }
    }));
  };

  const handleSaranaChange = (jenis: string, field: string, value: string) => {
    setSaranaData(prev => ({
      ...prev,
      [jenis]: {
        ...prev[jenis],
        [field]: value
      }
    }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!user) return;

    setLoading(true);

    try {
      // Save prasarana data
      for (const [jenis, data] of Object.entries(prasaranaData)) {
        if (data.baik || data.ringan || data.sedang || data.berat) {
          await supabase.from('laporan_prasarana').insert({
            npsn: identitasSekolah.npsn,
            nama_sekolah: identitasSekolah.nama_sekolah,
            jenis,
            kondisi_baik: data.baik,
            kondisi_ringan: data.ringan,
            kondisi_sedang: data.sedang,
            kondisi_berat: data.berat,
            detail: data.detail
          });
        }
      }

      // Save sarana data
      for (const [jenis, data] of Object.entries(saranaData)) {
        if (data.kondisi) {
          await supabase.from('laporan_sarana').insert({
            npsn: identitasSekolah.npsn,
            nama_sekolah: identitasSekolah.nama_sekolah,
            jenis,
            kondisi: data.kondisi,
            detail: data.detail
          });
        }
      }

      // Add to riwayat laporan
      await supabase.from('riwayat_laporan').insert({
        npsn: identitasSekolah.npsn,
        nama_sekolah: identitasSekolah.nama_sekolah,
        email: user.email,
        jenis_laporan: 'Laporan Sarana Prasarana',
        judul_laporan: `Laporan Sarana Prasarana ${identitasSekolah.nama_sekolah}`,
        tanggal_laporan: new Date().toISOString(),
        status: 'Menunggu',
        biaya_estimasi: 0,
        keterangan: 'Laporan sarana prasarana sekolah'
      });

      setSuccess(true);
      setTimeout(() => {
        navigate('/dashboard');
      }, 3000);
    } catch (error) {
      console.error('Error saving laporan:', error);
      alert('Gagal menyimpan laporan. Silakan coba lagi.');
    } finally {
      setLoading(false);
    }
  };

  if (success) {
    return (
      <div className="min-h-screen bg-gray-50 flex items-center justify-center">
        <div className="bg-white p-8 rounded-xl shadow-lg text-center max-w-md">
          <CheckCircle className="mx-auto text-green-500 mb-4" size={64} />
          <h2 className="text-2xl font-bold text-gray-900 mb-4">Laporan Berhasil Dikirim!</h2>
          <p className="text-gray-600 mb-6">
            Data berhasil disimpan. Anda akan diarahkan ke dashboard...
          </p>
          <div className="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto"></div>
        </div>
      </div>
    );
  }

  const prasaranaLabels = {
    ruang_kelas: 'Ruang Kelas',
    perpustakaan: 'Ruang Perpustakaan',
    lab_ipa: 'Lab IPA',
    lab_komputer: 'Lab Komputer',
    ruang_admin: 'Ruang Administrasi',
    ruang_uks: 'Ruang UKS',
    toilet: 'Toilet (secara keseluruhan)',
    ruang_ibadah: 'Ruang Ibadah',
    ruang_dinas: 'Rumah Dinas',
    lapangan_upacara: 'Lapang Upacara'
  };

  const saranaLabels = {
    meubel: 'Meubel',
    tik: 'TIK',
    penunjang: 'Penunjang Pembelajaran',
    lab_ipa: 'Peralatan Lab IPA',
    pjok: 'Peralatan PJOK'
  };

  return (
    <div className="min-h-screen bg-gray-50 py-8">
      <div className="max-w-6xl mx-auto px-4">
        {/* Header */}
        <div className="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-8 rounded-xl mb-8">
          <div className="flex items-center space-x-3 mb-4">
            <School size={32} />
            <h1 className="text-3xl font-bold">Laporan Kondisi Sarana & Prasarana Sekolah</h1>
          </div>
          <p className="text-blue-100 text-lg max-w-4xl">
            Silakan isi kondisi terkini dari masing-masing fasilitas di sekolah Anda. Data ini akan digunakan untuk perbaikan dan pemeliharaan.
          </p>
        </div>

        <form onSubmit={handleSubmit} className="space-y-8">
          {/* Identitas Sekolah */}
          <div className="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
            <div className="flex items-center space-x-3 mb-6">
              <School className="text-blue-600" size={24} />
              <h2 className="text-2xl font-semibold text-gray-900">Identitas Sekolah</h2>
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">NPSN</label>
                <input
                  type="text"
                  value={identitasSekolah.npsn}
                  onChange={(e) => setIdentitasSekolah(prev => ({ ...prev, npsn: e.target.value }))}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Nama Sekolah</label>
                <input
                  type="text"
                  value={identitasSekolah.nama_sekolah}
                  onChange={(e) => setIdentitasSekolah(prev => ({ ...prev, nama_sekolah: e.target.value }))}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                <input
                  type="text"
                  value={identitasSekolah.alamat}
                  onChange={(e) => setIdentitasSekolah(prev => ({ ...prev, alamat: e.target.value }))}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                <input
                  type="text"
                  value={identitasSekolah.kecamatan}
                  onChange={(e) => setIdentitasSekolah(prev => ({ ...prev, kecamatan: e.target.value }))}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                <input
                  type="text"
                  value={identitasSekolah.kelurahan}
                  onChange={(e) => setIdentitasSekolah(prev => ({ ...prev, kelurahan: e.target.value }))}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <input
                  type="text"
                  value={identitasSekolah.status}
                  onChange={(e) => setIdentitasSekolah(prev => ({ ...prev, status: e.target.value }))}
                  className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
            </div>
          </div>

          {/* Data Kondisi Prasarana */}
          <div className="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
            <div className="flex items-center space-x-3 mb-6">
              <Building className="text-blue-600" size={24} />
              <h2 className="text-2xl font-semibold text-gray-900">Data Kondisi Prasarana</h2>
            </div>
            
            <div className="overflow-x-auto">
              <table className="w-full border-collapse border border-gray-300">
                <thead>
                  <tr className="bg-gray-50">
                    <th className="border border-gray-300 px-4 py-3 text-left font-semibold">Jenis Prasarana</th>
                    <th className="border border-gray-300 px-4 py-3 text-center font-semibold">Baik</th>
                    <th className="border border-gray-300 px-4 py-3 text-center font-semibold">Rusak Ringan</th>
                    <th className="border border-gray-300 px-4 py-3 text-center font-semibold">Rusak Sedang</th>
                    <th className="border border-gray-300 px-4 py-3 text-center font-semibold">Rusak Berat</th>
                    <th className="border border-gray-300 px-4 py-3 text-left font-semibold">Detail Kondisi</th>
                  </tr>
                </thead>
                <tbody>
                  {Object.entries(prasaranaLabels).map(([key, label]) => (
                    <tr key={key} className="hover:bg-gray-50">
                      <td className="border border-gray-300 px-4 py-3 font-medium">{label}</td>
                      <td className="border border-gray-300 px-4 py-3">
                        <input
                          type="number"
                          min="0"
                          value={prasaranaData[key].baik}
                          onChange={(e) => handlePrasaranaChange(key, 'baik', parseInt(e.target.value) || 0)}
                          className="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                        />
                      </td>
                      <td className="border border-gray-300 px-4 py-3">
                        <input
                          type="number"
                          min="0"
                          value={prasaranaData[key].ringan}
                          onChange={(e) => handlePrasaranaChange(key, 'ringan', parseInt(e.target.value) || 0)}
                          className="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                        />
                      </td>
                      <td className="border border-gray-300 px-4 py-3">
                        <input
                          type="number"
                          min="0"
                          value={prasaranaData[key].sedang}
                          onChange={(e) => handlePrasaranaChange(key, 'sedang', parseInt(e.target.value) || 0)}
                          className="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                        />
                      </td>
                      <td className="border border-gray-300 px-4 py-3">
                        <input
                          type="number"
                          min="0"
                          value={prasaranaData[key].berat}
                          onChange={(e) => handlePrasaranaChange(key, 'berat', parseInt(e.target.value) || 0)}
                          className="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                        />
                      </td>
                      <td className="border border-gray-300 px-4 py-3">
                        <textarea
                          value={prasaranaData[key].detail}
                          onChange={(e) => handlePrasaranaChange(key, 'detail', e.target.value)}
                          className="w-full px-3 py-2 border border-gray-300 rounded resize-none"
                          rows={2}
                          placeholder={`Catatan kondisi ${label.toLowerCase()}...`}
                        />
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>

          {/* Data Kondisi Sarana */}
          <div className="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
            <div className="flex items-center space-x-3 mb-6">
              <Desktop className="text-blue-600" size={24} />
              <h2 className="text-2xl font-semibold text-gray-900">Data Kondisi Sarana</h2>
            </div>
            
            <div className="overflow-x-auto">
              <table className="w-full border-collapse border border-gray-300">
                <thead>
                  <tr className="bg-gray-50">
                    <th className="border border-gray-300 px-4 py-3 text-left font-semibold">Jenis Sarana</th>
                    <th className="border border-gray-300 px-4 py-3 text-left font-semibold">Kondisi</th>
                    <th className="border border-gray-300 px-4 py-3 text-left font-semibold">Detail</th>
                  </tr>
                </thead>
                <tbody>
                  {Object.entries(saranaLabels).map(([key, label]) => (
                    <tr key={key} className="hover:bg-gray-50">
                      <td className="border border-gray-300 px-4 py-3 font-medium">{label}</td>
                      <td className="border border-gray-300 px-4 py-3">
                        <select
                          value={saranaData[key].kondisi}
                          onChange={(e) => handleSaranaChange(key, 'kondisi', e.target.value)}
                          className="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                          <option value="">Pilih Kondisi</option>
                          <option value="Baik">Baik</option>
                          <option value="Rusak Ringan">Rusak Ringan</option>
                          <option value="Rusak Sedang">Rusak Sedang</option>
                          <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                      </td>
                      <td className="border border-gray-300 px-4 py-3">
                        <textarea
                          value={saranaData[key].detail}
                          onChange={(e) => handleSaranaChange(key, 'detail', e.target.value)}
                          className="w-full px-3 py-2 border border-gray-300 rounded resize-none"
                          rows={2}
                          placeholder={`Jelaskan lebih lanjut kondisi ${label.toLowerCase()}...`}
                        />
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>

          {/* Action Buttons */}
          <div className="flex justify-between items-center pt-6 border-t border-gray-200">
            <Link 
              to="/dashboard"
              className="flex items-center space-x-2 bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-colors"
            >
              <ArrowLeft size={20} />
              <span>Kembali</span>
            </Link>
            
            <button
              type="submit"
              disabled={loading}
              className="flex items-center space-x-2 bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <Send size={20} />
              <span>{loading ? 'Menyimpan...' : 'Kirim Laporan'}</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  );
}