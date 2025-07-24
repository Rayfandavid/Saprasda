import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { supabase } from '../lib/supabase';
import { Halaman, Tutor, Partner } from '../types';

export function Home() {
  const [homeData, setHomeData] = useState<Halaman | null>(null);
  const [coursesData, setCoursesData] = useState<Halaman | null>(null);
  const [pengajuanData, setPengajuanData] = useState<Halaman | null>(null);
  const [tutors, setTutors] = useState<Tutor[]>([]);
  const [partners, setPartners] = useState<Partner[]>([]);

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async () => {
    try {
      // Fetch halaman data
      const { data: halamanData } = await supabase
        .from('halaman')
        .select('*')
        .in('id', ['8', '9', '11']);

      if (halamanData) {
        setHomeData(halamanData.find(h => h.id === '8') || null);
        setCoursesData(halamanData.find(h => h.id === '9') || null);
        setPengajuanData(halamanData.find(h => h.id === '11') || null);
      }

      // Fetch tutors
      const { data: tutorsData } = await supabase
        .from('tutors')
        .select('*')
        .order('id');

      if (tutorsData) setTutors(tutorsData);

      // Fetch partners
      const { data: partnersData } = await supabase
        .from('partners')
        .select('*')
        .order('id');

      if (partnersData) setPartners(partnersData);
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  };

  const extractImageFromContent = (content: string) => {
    const imgMatch = content.match(/<img[^>]*src\s*=\s*["']([^"']*)/i);
    return imgMatch ? imgMatch[1] : 'https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=600';
  };

  const stripHtml = (html: string) => {
    const tmp = document.createElement('div');
    tmp.innerHTML = html;
    return tmp.textContent || tmp.innerText || '';
  };

  const limitWords = (text: string, limit: number) => {
    const words = text.split(' ');
    return words.slice(0, limit).join(' ') + (words.length > limit ? '...' : '');
  };

  return (
    <div className="min-h-screen">
      {/* Home Section */}
      {homeData && (
        <section className="py-16 px-4">
          <div className="max-w-7xl mx-auto">
            <div className="flex flex-col lg:flex-row items-center gap-12">
              <div className="lg:w-1/2">
                <img 
                  src={extractImageFromContent(homeData.isi)} 
                  alt={homeData.judul}
                  className="w-full h-96 object-cover rounded-lg shadow-lg"
                />
              </div>
              <div className="lg:w-1/2 space-y-6">
                <p className="text-blue-600 font-bold text-lg font-mono">{homeData.kutipan}</p>
                <h2 className="text-4xl font-bold text-blue-900 leading-tight">{homeData.judul}</h2>
                <p className="text-gray-600 text-lg leading-relaxed">
                  {limitWords(stripHtml(homeData.isi), 30)}
                </p>
                <Link 
                  to={`/halaman/${homeData.id}`}
                  className="inline-block bg-pink-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-pink-700 transition-colors"
                >
                  Pelajari Lebih Lanjut
                </Link>
              </div>
            </div>
          </div>
        </section>
      )}

      {/* Courses Section */}
      {coursesData && (
        <section className="py-16 px-4 bg-gray-50">
          <div className="max-w-7xl mx-auto">
            <div className="flex flex-col lg:flex-row-reverse items-center gap-12">
              <div className="lg:w-1/2">
                <img 
                  src={extractImageFromContent(coursesData.isi)} 
                  alt={coursesData.judul}
                  className="w-full h-96 object-cover rounded-lg shadow-lg"
                />
              </div>
              <div className="lg:w-1/2 space-y-6">
                <p className="text-blue-600 font-bold text-lg font-mono">{coursesData.kutipan}</p>
                <h2 className="text-4xl font-bold text-blue-900 leading-tight">{coursesData.judul}</h2>
                <p className="text-gray-600 text-lg leading-relaxed">
                  {limitWords(stripHtml(coursesData.isi), 30)}
                </p>
                <Link 
                  to={`/halaman/${coursesData.id}`}
                  className="inline-block bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-colors"
                >
                  Pelajari Lebih Lanjut
                </Link>
              </div>
            </div>
          </div>
        </section>
      )}

      {/* Pengajuan Section */}
      {pengajuanData && (
        <section className="py-16 px-4">
          <div className="max-w-7xl mx-auto">
            <div className="flex flex-col lg:flex-row items-center gap-12">
              <div className="lg:w-1/2 space-y-6">
                <p className="text-blue-600 font-bold text-lg font-mono">{pengajuanData.kutipan}</p>
                <h2 className="text-4xl font-bold text-blue-900 leading-tight">{pengajuanData.judul}</h2>
                <p className="text-gray-600 text-lg leading-relaxed">
                  {limitWords(stripHtml(pengajuanData.isi), 30)}
                </p>
                <Link 
                  to="/register"
                  className="inline-block bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-colors"
                >
                  Pengajuan Proposal
                </Link>
              </div>
              <div className="lg:w-1/2">
                <img 
                  src={extractImageFromContent(pengajuanData.isi)} 
                  alt={pengajuanData.judul}
                  className="w-full h-96 object-cover rounded-lg shadow-lg"
                />
              </div>
            </div>
          </div>
        </section>
      )}

      {/* Tutors Section */}
      <section className="py-16 px-4 bg-gray-50">
        <div className="max-w-7xl mx-auto text-center">
          <div className="space-y-4 mb-12">
            <p className="text-blue-600 font-bold text-lg">Our Top Tutors</p>
            <h2 className="text-4xl font-bold text-blue-900">Tutors</h2>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!
            </p>
          </div>
          
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">
            {tutors.map((tutor) => (
              <Link 
                key={tutor.id} 
                to={`/tutors/${tutor.id}`}
                className="group"
              >
                <div className="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                  <img 
                    src={tutor.foto ? `https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=200&h=200&fit=crop` : 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=200&h=200&fit=crop'}
                    alt={tutor.nama}
                    className="w-24 h-24 rounded-full mx-auto mb-4 object-cover group-hover:scale-105 transition-transform"
                  />
                  <p className="font-bold text-xl text-blue-900 font-comic">{tutor.nama}</p>
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Partners Section */}
      <section className="py-16 px-4">
        <div className="max-w-7xl mx-auto text-center">
          <div className="space-y-4 mb-12">
            <p className="text-blue-600 font-bold text-lg">Our Top Partners</p>
            <h2 className="text-4xl font-bold text-blue-900">Partners</h2>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.
            </p>
          </div>
          
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            {partners.map((partner) => (
              <Link 
                key={partner.id} 
                to={`/partners/${partner.id}`}
                className="group"
              >
                <div className="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                  <img 
                    src={partner.foto ? `https://images.pexels.com/photos/267350/pexels-photo-267350.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop` : 'https://images.pexels.com/photos/267350/pexels-photo-267350.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop'}
                    alt={partner.nama}
                    className="w-32 h-32 rounded-full mx-auto object-cover group-hover:scale-105 transition-transform"
                  />
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
}