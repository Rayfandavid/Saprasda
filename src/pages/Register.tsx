import React, { useState } from 'react';
import { Link, Navigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import { Mail, Lock, User, School, MapPin, AlertCircle, CheckCircle } from 'lucide-react';

export function Register() {
  const { user, signUp } = useAuth();
  const [formData, setFormData] = useState({
    email: '',
    password: '',
    nama_lengkap: '',
    npsn: '',
    nama_sekolah: '',
    alamat: '',
    kecamatan: '',
    kelurahan: '',
    status: ''
  });
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);

  if (user) {
    return <Navigate to="/dashboard" replace />;
  }

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setFormData(prev => ({
      ...prev,
      [e.target.name]: e.target.value
    }));
  };

  const handleAutoFill = async () => {
    if (!formData.npsn) {
      alert('Harap isi NPSN terlebih dahulu.');
      return;
    }

    try {
      // Simulate NPSN lookup - in real app, this would call an API
      const mockData = {
        '12345678': {
          Nama_Sekolah: 'SDN 1 Sumedang',
          Alamat: 'Jl. Raya Sumedang No. 123',
          Kecamatan: 'Sumedang Utara',
          Kelurahan: 'Kotakaler',
          Status: 'Negeri'
        },
        '87654321': {
          Nama_Sekolah: 'SMPN 2 Sumedang',
          Alamat: 'Jl. Pendidikan No. 456',
          Kecamatan: 'Sumedang Selatan',
          Kelurahan: 'Situ',
          Status: 'Negeri'
        }
      };

      const data = mockData[formData.npsn as keyof typeof mockData];
      
      if (data) {
        setFormData(prev => ({
          ...prev,
          nama_sekolah: data.Nama_Sekolah,
          alamat: data.Alamat,
          kecamatan: data.Kecamatan,
          kelurahan: data.Kelurahan,
          status: data.Status
        }));
      } else {
        alert('Data NPSN tidak ditemukan.');
      }
    } catch (error) {
      alert('Gagal mengambil data.');
    }
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    const result = await signUp(formData);
    
    if (result.error) {
      setError(result.error);
    } else {
      setSuccess(true);
    }
    
    setLoading(false);
  };

  if (success) {
    return (
      <div className="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4">
        <div className="max-w-md w-full bg-white rounded-lg shadow-lg p-8 text-center">
          <CheckCircle className="mx-auto text-green-500 mb-4" size={64} />
          <h2 className="text-2xl font-bold text-gray-900 mb-4">Registrasi Berhasil!</h2>
          <p className="text-gray-600 mb-6">
            Akun Anda telah berhasil dibuat. Silakan login untuk melanjutkan.
          </p>
          <Link 
            to="/login"
            className="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
          >
            Login Sekarang
          </Link>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gray-100 py-12 px-4">
      <div className="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <div className="text-center mb-8">
          <h2 className="text-3xl font-bold text-gray-900">Registrasi Sekolah</h2>
          <p className="text-gray-600 mt-2">Daftarkan sekolah Anda untuk menggunakan SISARPRAS</p>
        </div>

        {error && (
          <div className="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-center space-x-2 text-red-700">
            <AlertCircle size={20} />
            <span>{error}</span>
          </div>
        )}

        <form onSubmit={handleSubmit} className="space-y-6">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label htmlFor="email" className="block text-sm font-medium text-gray-700 mb-2">
                Email *
              </label>
              <div className="relative">
                <Mail className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
                <input
                  type="email"
                  id="email"
                  name="email"
                  value={formData.email}
                  onChange={handleChange}
                  className="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
            </div>

            <div>
              <label htmlFor="password" className="block text-sm font-medium text-gray-700 mb-2">
                Password *
              </label>
              <div className="relative">
                <Lock className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
                <input
                  type="password"
                  id="password"
                  name="password"
                  value={formData.password}
                  onChange={handleChange}
                  className="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
            </div>
          </div>

          <div>
            <label htmlFor="nama_lengkap" className="block text-sm font-medium text-gray-700 mb-2">
              Nama Lengkap *
            </label>
            <div className="relative">
              <User className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
              <input
                type="text"
                id="nama_lengkap"
                name="nama_lengkap"
                value={formData.nama_lengkap}
                onChange={handleChange}
                className="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
              />
            </div>
          </div>

          <div>
            <label htmlFor="npsn" className="block text-sm font-medium text-gray-700 mb-2">
              NPSN *
            </label>
            <div className="flex space-x-2">
              <input
                type="text"
                id="npsn"
                name="npsn"
                value={formData.npsn}
                onChange={handleChange}
                className="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
              />
              <button
                type="button"
                onClick={handleAutoFill}
                className="bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition-colors"
              >
                Isi Otomatis
              </button>
            </div>
          </div>

          <div>
            <label htmlFor="nama_sekolah" className="block text-sm font-medium text-gray-700 mb-2">
              Nama Sekolah *
            </label>
            <div className="relative">
              <School className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
              <input
                type="text"
                id="nama_sekolah"
                name="nama_sekolah"
                value={formData.nama_sekolah}
                onChange={handleChange}
                className="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                readOnly
                required
              />
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label htmlFor="alamat" className="block text-sm font-medium text-gray-700 mb-2">
                Alamat *
              </label>
              <div className="relative">
                <MapPin className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
                <input
                  type="text"
                  id="alamat"
                  name="alamat"
                  value={formData.alamat}
                  onChange={handleChange}
                  className="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
            </div>

            <div>
              <label htmlFor="kecamatan" className="block text-sm font-medium text-gray-700 mb-2">
                Kecamatan *
              </label>
              <input
                type="text"
                id="kecamatan"
                name="kecamatan"
                value={formData.kecamatan}
                onChange={handleChange}
                className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
              />
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label htmlFor="kelurahan" className="block text-sm font-medium text-gray-700 mb-2">
                Kelurahan *
              </label>
              <input
                type="text"
                id="kelurahan"
                name="kelurahan"
                value={formData.kelurahan}
                onChange={handleChange}
                className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
              />
            </div>

            <div>
              <label htmlFor="status" className="block text-sm font-medium text-gray-700 mb-2">
                Status *
              </label>
              <input
                type="text"
                id="status"
                name="status"
                value={formData.status}
                onChange={handleChange}
                className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
              />
            </div>
          </div>

          <button
            type="submit"
            disabled={loading}
            className="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
          >
            {loading ? 'Memproses...' : 'Daftar'}
          </button>
        </form>

        <div className="mt-6 text-center">
          <p className="text-gray-600">
            Sudah punya akun?{' '}
            <Link to="/login" className="text-blue-600 hover:text-blue-700 font-semibold">
              Login disini
            </Link>
          </p>
        </div>
      </div>
    </div>
  );
}