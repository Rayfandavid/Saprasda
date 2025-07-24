import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import { supabase } from '../lib/supabase';
import { Partner } from '../types';

export function PartnerDetail() {
  const { id } = useParams<{ id: string }>();
  const [partner, setPartner] = useState<Partner | null>(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    if (id) {
      fetchPartner();
    }
  }, [id]);

  const fetchPartner = async () => {
    try {
      const { data, error } = await supabase
        .from('partners')
        .select('*')
        .eq('id', id)
        .single();

      if (error) throw error;
      setPartner(data);
    } catch (error) {
      console.error('Error fetching partner:', error);
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

  if (!partner) {
    return (
      <div className="min-h-screen flex items-center justify-center">
        <div className="text-center">
          <h1 className="text-2xl font-bold text-gray-900 mb-4">Partner Tidak Ditemukan</h1>
          <p className="text-gray-600">Maaf data yang kamu maksud tidak ditemukan :(</p>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gray-50 py-12">
      <div className="max-w-4xl mx-auto px-4">
        <div className="bg-white rounded-xl shadow-lg p-8">
          <div className="flex flex-col md:flex-row gap-8">
            <div className="md:w-1/4">
              <img 
                src={partner.foto ? `https://images.pexels.com/photos/267350/pexels-photo-267350.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop` : 'https://images.pexels.com/photos/267350/pexels-photo-267350.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&fit=crop'}
                alt={partner.nama}
                className="w-full rounded-full object-cover shadow-lg"
              />
            </div>
            <div className="md:w-3/4">
              <h1 className="text-3xl font-bold text-gray-900 mb-6">{partner.nama}</h1>
              <div 
                className="prose prose-lg max-w-none text-gray-700 leading-relaxed"
                dangerouslySetInnerHTML={{ __html: partner.isi }}
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}