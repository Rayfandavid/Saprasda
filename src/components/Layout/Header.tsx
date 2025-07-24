import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { useAuth } from '../../contexts/AuthContext';
import { LogOut, User } from 'lucide-react';

export function Header() {
  const { user, signOut } = useAuth();
  const location = useLocation();

  const isActive = (path: string) => location.pathname === path;

  return (
    <nav className="bg-blue-600 text-white shadow-lg sticky top-0 z-50">
      <div className="max-w-7xl mx-auto px-4">
        <div className="flex justify-between items-center h-20">
          <div className="flex items-center space-x-4">
            <img 
              src="https://images.pexels.com/photos/207692/pexels-photo-207692.jpeg?auto=compress&cs=tinysrgb&w=50&h=50&fit=crop" 
              alt="Logo" 
              className="w-12 h-12 rounded-full object-cover"
            />
            <Link to="/" className="text-xl font-bold">
              Sistem Informasi Sarana Prasarana (SISARPRAS)
            </Link>
          </div>
          
          <div className="hidden md:flex items-center space-x-6">
            <Link 
              to="/" 
              className={`hover:text-blue-200 transition-colors ${isActive('/') ? 'text-blue-200' : ''}`}
            >
              Home
            </Link>
            <Link 
              to="/courses" 
              className={`hover:text-blue-200 transition-colors ${isActive('/courses') ? 'text-blue-200' : ''}`}
            >
              Courses
            </Link>
            <Link 
              to="/tutors" 
              className={`hover:text-blue-200 transition-colors ${isActive('/tutors') ? 'text-blue-200' : ''}`}
            >
              Tutors
            </Link>
            <Link 
              to="/partners" 
              className={`hover:text-blue-200 transition-colors ${isActive('/partners') ? 'text-blue-200' : ''}`}
            >
              Partners
            </Link>
            <Link 
              to="/contact" 
              className={`hover:text-blue-200 transition-colors ${isActive('/contact') ? 'text-blue-200' : ''}`}
            >
              Contact
            </Link>
            
            {user ? (
              <div className="flex items-center space-x-4">
                <Link 
                  to="/dashboard" 
                  className="flex items-center space-x-2 bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors"
                >
                  <User size={16} />
                  <span>{user.nama_lengkap}</span>
                </Link>
                <button 
                  onClick={signOut}
                  className="flex items-center space-x-2 bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition-colors"
                >
                  <LogOut size={16} />
                  <span>Logout</span>
                </button>
              </div>
            ) : (
              <Link 
                to="/register" 
                className="bg-pink-600 px-6 py-2 rounded-full hover:bg-pink-700 transition-colors font-semibold"
              >
                Sign Up
              </Link>
            )}
          </div>
        </div>
      </div>
    </nav>
  );
}