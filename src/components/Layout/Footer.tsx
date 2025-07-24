import React, { useEffect, useState } from 'react';
import { supabase } from '../../lib/supabase';
import { Info } from '../../types';

export function Footer() {
  const [footerInfo, setFooterInfo] = useState<Info[]>([]);

  useEffect(() => {
    fetchFooterInfo();
  }, []);

  const fetchFooterInfo = async () => {
    try {
      const { data, error } = await supabase
        .from('info')
        .select('*')
        .in('id', ['1', '2', '3', '4'])
        .order('id');

      if (error) throw error;
      setFooterInfo(data || []);
    } catch (error) {
      console.error('Error fetching footer info:', error);
    }
  };

  return (
    <footer className="bg-gray-100 py-12">
      <div className="max-w-7xl mx-auto px-4">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          {footerInfo.map((info) => (
            <div key={info.id} className="space-y-4">
              <h3 className="text-xl font-bold text-blue-900">{info.judul}</h3>
              <div 
                className="text-gray-600 prose prose-sm"
                dangerouslySetInnerHTML={{ __html: info.isi }}
              />
            </div>
          ))}
        </div>
        
        <div className="border-t border-gray-300 mt-12 pt-8 text-center text-gray-600">
          <p>&copy; 2025. <strong>Dinas Pendidikan Sumedang.</strong> All Rights Reserved.</p>
        </div>
      </div>
    </footer>
  );
}