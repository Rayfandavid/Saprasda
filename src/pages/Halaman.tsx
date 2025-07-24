import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import { supabase } from '../lib/supabase';
import { Halaman as HalamanType } from '../types';

export function Halaman() {
  const { id } = useParams<{ id: string }>();
  const [halaman, setHalaman] = useState<HalamanType | null>(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    if (id) {
      fetchHalaman();
    }
  }, [id]);

  const fetchHalaman = async () => {
    try {
      const { data, error } = await supabase
        .from('halaman')
        .select('*')
        .eq('id', id)
        .single();

      if (error) throw error;
      setHalaman(data);
    } catch (error) {
      console.error('Error fetching halaman:', error);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return (
      <div className="min-h-screen flex items-center justify-center">
        <div className="animate-spin rounded-full h-32 w-32 border-b-2 border-blue-600"></div>
      </div>
    );
  }

  if (!halaman) {
    return (
      <div className="min-h-screen flex items-center justify-center">
        <div className="text-center">
          <h1 className="text-2xl font-bold text-gray-900 mb-4">Halaman Tidak Ditemukan</h1>
          <p className="text-gray-600">Maaf data yang kamu maksud tidak ditemukan :(</p>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gray-50 py-12">
      <div className="max-w-4xl mx-auto px-4">
        <div className="bg-white rounded-xl shadow-lg p-8">
          <p className="text-blue-600 font-bold text-lg font-mono mb-4">{halaman.kutipan}</p>
          <h1 className="text-4xl font-bold text-blue-900 mb-8 leading-tight">{halaman.judul}</h1>
          <div 
            className="prose prose-lg max-w-none text-gray-700 leading-relaxed"
            dangerouslySetInnerHTML={{ __html: halaman.isi }}
          />
        </div>
      </div>
    </div>
  );
}