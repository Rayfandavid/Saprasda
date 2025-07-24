import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { AuthProvider } from './contexts/AuthContext';
import { Header } from './components/Layout/Header';
import { Footer } from './components/Layout/Footer';
import { Home } from './pages/Home';
import { Login } from './pages/Login';
import { Register } from './pages/Register';
import { Dashboard } from './pages/Dashboard';
import { BuatLaporan } from './pages/BuatLaporan';
import { Halaman } from './pages/Halaman';
import { TutorDetail } from './pages/TutorDetail';
import { PartnerDetail } from './pages/PartnerDetail';

function App() {
  return (
    <AuthProvider>
      <Router>
        <div className="min-h-screen flex flex-col">
          <Header />
          <main className="flex-1">
            <Routes>
              <Route path="/" element={<Home />} />
              <Route path="/login" element={<Login />} />
              <Route path="/register" element={<Register />} />
              <Route path="/dashboard" element={<Dashboard />} />
              <Route path="/buat-laporan" element={<BuatLaporan />} />
              <Route path="/halaman/:id" element={<Halaman />} />
              <Route path="/tutors/:id" element={<TutorDetail />} />
              <Route path="/partners/:id" element={<PartnerDetail />} />
              <Route path="/courses" element={<Home />} />
              <Route path="/tutors" element={<Home />} />
              <Route path="/partners" element={<Home />} />
              <Route path="/contact" element={<Home />} />
            </Routes>
          </main>
          <Footer />
        </div>
      </Router>
    </AuthProvider>
  );
}

export default App;