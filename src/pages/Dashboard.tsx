import React, { useEffect, useState } from 'react';
import { Link, Navigate } from 'react-router-dom';
import { useAuth } from '../contexts/AuthContext';
import { supabase } from '../lib/supabase';
import { RiwayatLaporan } from '../types';
import { FileText, Plus, Eye, Moon, Sun } from 'lucide-react';

export function Dashboard() {
  const { user, loading: authLoading } = useAuth();
  const [riwayatLaporan, setRiwayatLaporan] = useState<RiwayatLaporan[]>([]);
  const [stats, setStats] = useState({
    total: 0,
    menunggu: 0,
    selesai: 0,
    totalBiaya: 0
  });
  const [darkMode, setDarkMode] = useState(false);

  useEffect(() => {
    if (user) {
      fetchRiwayatLaporan();
    }
  }, [user]);

  useEffect(() => {
    const isDark = localStorage.getItem('darkMode') === 'true';
    setDarkMode(isDark);
    if (isDark) {
      document.documentElement.classList.add('dark');
    }
  }, []);

  const toggleDarkMode = () => {
    const newDarkMode = !darkMode;
    setDarkMode(newDarkMode);
    localStorage.setItem('darkMode', newDarkMode.toString());
    
    if (newDarkMode) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  };

  const fetchRiwayatLaporan = async () => {
    if (!user) return;

    try {
      const { data, error } = await supabase
        .from('riwayat_laporan')
        .select('*')
        .eq('npsn', user.npsn)
        .order('created_at', { ascending: false });

      if (error) throw error;

      setRiwayatLaporan(data || []);

      // Calculate stats
      const total = data?.length || 0;
      const menunggu = data?.filter(item => item.status === 'Menunggu').length || 0;
      const selesai = data?.filter(item => item.status === 'Selesai').length || 0;
      const totalBiaya = data?.reduce((sum, item) => sum + (item.biaya_estimasi || 0), 0) || 0;

      setStats({ total, menunggu, selesai, totalBiaya });
    } catch (error) {
      console.error('Error fetching riwayat laporan:', error);
    }
  };

  if (authLoading) {
    return (
      <div className="min-h-screen flex items-center justify-center">
        <div className="animate-spin rounded-full h-32 w-32 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  if (!user) {
    return <Navigate to="/login" replace />;
  }

  return (
    <div className="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors">
      {/* Top Bar */}
      <div className="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <div className="max-w-7xl mx-auto px-4 py-4">
          <div className="flex justify-between items-center">
            <div>
              <h1 className="text-xl font-bold text-blue-600 dark:text-blue-400">
                SISARPRAS
                <span className="text-sm font-normal text-gray-600 dark:text-gray-400 ml-2">
                  Sistem Informasi Sarana Prasarana
                </span>
              </h1>
            </div>
            
            <div className="flex items-center space-x-4">
              <button
                onClick={toggleDarkMode}
                className="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
              >
                {darkMode ? <Sun size={20} /> : <Moon size={20} />}
              </button>
              
              <div className="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg font-semibold">
                {user.nama_sekolah}
              </div>
              <div className="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg font-semibold">
                {user.npsn}
              </div>
              <div className="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg font-semibold">
                {user.email}
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-4 py-8">
        {/* Header */}
        <div className="mb-8">
          <h1 className="text-3xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
          <p className="text-gray-600 dark:text-gray-400 mt-2">Kelola laporan sarana prasarana sekolah Anda</p>
        </div>

        {/* Stats Cards */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
          <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <h3 className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Laporan</h3>
            <p className="text-2xl font-bold text-gray-900 dark:text-white mt-2">{stats.total}</p>
            <p className="text-xs text-gray-500 dark:text-gray-400 mt-1">Laporan yang telah dibuat</p>
          </div>

          <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <h3 className="text-sm font-medium text-gray-600 dark:text-gray-400">Menunggu Review</h3>
            <p className="text-2xl font-bold text-yellow-600 mt-2">{stats.menunggu}</p>
            <p className="text-xs text-gray-500 dark:text-gray-400 mt-1">Sedang ditinjau admin</p>
          </div>

          <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <h3 className="text-sm font-medium text-gray-600 dark:text-gray-400">Selesai</h3>
            <p className="text-2xl font-bold text-green-600 mt-2">{stats.selesai}</p>
            <p className="text-xs text-gray-500 dark:text-gray-400 mt-1">Telah diselesaikan</p>
          </div>

          <div className="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
            <h3 className="text-sm font-medium text-gray-600 dark:text-gray-400">Total Biaya</h3>
            <p className="text-2xl font-bold text-blue-600 mt-2">
              Rp {stats.totalBiaya.toLocaleString('id-ID')}
            </p>
            <p className="text-xs text-gray-500 dark:text-gray-400 mt-1">Estimasi total biaya</p>
          </div>
        </div>

        {/* Action Bar */}
        <div className="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg flex justify-between items-center mb-8">
          <div className="flex items-center space-x-2">
            <FileText size={20} className="text-gray-600 dark:text-gray-400" />
            <span className="font-semibold text-gray-900 dark:text-white">Laporan Saya</span>
          </div>
          <Link 
            to="/buat-laporan"
            className="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors flex items-center space-x-2"
          >
            <Plus size={20} />
            <span>Buat Laporan</span>
          </Link>
        </div>

        {/* Reports List */}
        <div className="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
          <div className="mb-6">
            <h3 className="text-xl font-semibold text-gray-900 dark:text-white">Riwayat Laporan</h3>
            <p className="text-gray-600 dark:text-gray-400">Daftar semua laporan yang telah Anda buat</p>
          </div>

          {riwayatLaporan.length > 0 ? (
            <div className="space-y-4">
              {riwayatLaporan.map((laporan) => (
                <div key={laporan.id} className="border border-gray-200 dark:border-gray-700 p-4 rounded-lg flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                  <div className="flex-1">
                    <div className="flex items-center space-x-3 mb-2">
                      <span className="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-semibold">
                        {laporan.jenis_laporan}
                      </span>
                      <span className={`px-3 py-1 rounded-full text-sm font-semibold ${
                        laporan.status === 'Menunggu' 
                          ? 'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200' 
                          : 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200'
                      }`}>
                        {laporan.status}
                      </span>
                    </div>
                    <h4 className="font-semibold text-gray-900 dark:text-white mb-1">{laporan.judul_laporan}</h4>
                    <p className="text-sm text-gray-600 dark:text-gray-400">
                      {new Date(laporan.created_at).toLocaleDateString('id-ID')}
                    </p>
                  </div>
                  <Link 
                    to={`/detail-laporan/${laporan.id}`}
                    className="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors flex items-center space-x-2"
                  >
                    <Eye size={16} />
                    <span>Detail</span>
                  </Link>
                </div>
              ))}
            </div>
          ) : (
            <div className="text-center py-12">
              <FileText size={48} className="mx-auto text-gray-400 mb-4" />
              <p className="text-gray-600 dark:text-gray-400">Belum ada laporan.</p>
              <Link 
                to="/buat-laporan"
                className="inline-block mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
              >
                Buat Laporan Pertama
              </Link>
            </div>
          )}
        </div>
      </div>
    </div>
  );
}