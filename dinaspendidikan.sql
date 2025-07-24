-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 06:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinaspendidikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_sd`
--

CREATE TABLE `daftar_sd` (
  `NPSN` int(8) NOT NULL,
  `Nama_Sekolah` varchar(100) NOT NULL,
  `Alamat` varchar(300) NOT NULL,
  `Kecamatan` varchar(100) NOT NULL,
  `Kelurahan` varchar(100) NOT NULL,
  `Status` enum('swasta','negeri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_sd`
--

INSERT INTO `daftar_sd` (`NPSN`, `Nama_Sekolah`, `Alamat`, `Kecamatan`, `Kelurahan`, `Status`) VALUES
(20208238, 'SD NEGERI KETIB', 'Jl. Supian Iskandar No. 03', 'Kec. Sumedang Utara', 'Kotakaler', 'negeri'),
(20208239, 'SD NEGERI KERTAMULYA', 'Cigalumpit', 'Kec. Tanjungkerta', 'Kertamekar', 'negeri'),
(20208240, 'SD NEGERI CIPEUNDEUY', 'Dusun Cipeundeuy RT. 02/01', 'Kec. Jatinunggal', 'Cipeundeuy', 'negeri'),
(20208241, 'SD NEGERI KEBONSEUREUH', 'Jalan Kebonseureuh', 'Kec. Sumedang Selatan', 'Cipameungpeuk', 'negeri'),
(20208242, 'SD NEGERI KEBONBARU', 'Dusun Kebonbaru RT. 01/10', 'Kec. Jatinunggal', 'Sarimekar', 'negeri'),
(20208243, 'SD NEGERI KAREDOK', 'Dusun Karedok RT. 10/03', 'Kec. Jatigede', 'Karedok', 'negeri'),
(20208244, 'SD NEGERI KARAPYAK I', 'Jl. Karapyak No. 10', 'Kec. Sumedang Utara', 'Situ', 'negeri'),
(20208245, 'SD NEGERI LANGENSARI', 'Dusun Langensari RT. 02/04', 'Kec. Jatinunggal', 'Sukamanah', 'negeri'),
(20208246, 'SD NEGERI LEBAKSIUH', 'Dusun Lebaksiuh', 'Kec. Jatigede', 'Lebaksiuh', 'negeri'),
(20208247, 'SD NEGERI LEGOK I', 'Jl. Sebelas April No. 19', 'Kec. Paseh', 'Legok Kaler', 'negeri'),
(20208248, 'SD NEGERI LEGOK II', 'Jln. Sebelas April No.17', 'Kec. Paseh', 'Legok Kaler', 'negeri'),
(20208249, 'SD NEGERI LEMBANG', 'Dusun Lembang', 'Kec. Pamulihan', 'Pamulihan', 'negeri'),
(20208250, 'SD NEGERI LEMBURSITU', 'Jln. Prabu Gajah Agung, Situ', 'Kec. Sumedang Utara', 'Situ', 'negeri'),
(20208251, 'SD NEGERI LONTONG', 'Dusun Burujul RT 03/03', 'Kec. Jatigede', 'Jemah', 'negeri'),
(20208253, 'SD NEGERI MALATI', 'Dusun Kukulu', 'Kec. Sumedang Selatan', 'Cipancar', 'negeri'),
(20208254, 'SD NEGERI MANANGGA', 'Jl. Kebonkol No. 20', 'Kec. Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208255, 'SD NEGERI KARANGNANGKA II', 'Dusun Babakanjati', 'Kec. Situraja', 'Karangheuleut', 'negeri'),
(20208256, 'SD NEGERI KARANGMULYA', 'Dusun Kaduheuleut', 'Kec. Situraja', 'Kaduwulung', 'negeri'),
(20208258, 'SD NEGERI GANDAWESI', 'Dusun Gandawesi', 'Kec. Tomo', 'Bugel', 'negeri'),
(20208259, 'SD NEGERI GENTENG', 'Dusun Sukamenak RT 11/07', 'Kec. Sukasari', 'Genteng', 'negeri'),
(20208260, 'SD NEGERI GUDANGKOPI I', 'Jl. Pangeran Santri No. 37', 'Kec. Sumedang Selatan', 'Kotakulon', 'negeri'),
(20208262, 'SD NEGERI GUNUNGSARI', 'Jl. Sindang Taman', 'Kec. Sumedang Utara', 'Jatimulya', 'negeri'),
(20208263, 'SD NEGERI HAURKUNING', 'Jl. Haurkuning No.47', 'Kec. Paseh', 'Haurkuning', 'negeri'),
(20208264, 'SD NEGERI HEGARMANAH', 'Dusun Cilimus RT.10/06', 'Kec. Jatigede', 'Mekarasih', 'negeri'),
(20208265, 'SD NEGERI HEGARMANAH I', 'Dusun Hegarmanah RT. 03/13', 'Kec. Jatinangor', 'Hegarmanah', 'negeri'),
(20208266, 'SD NEGERI JATIHURIP', 'Kamp. Perumnas Jatihurip blok 6', 'Kec. Sumedang Utara', 'Jatihurip', 'negeri'),
(20208267, 'SD NEGERI JATIROKE I', 'Jl. Letda Lukito No. 56', 'Kec. Jatinangor', 'Jatimukti', 'negeri'),
(20208268, 'SD NEGERI JATISARI', 'Cijatihilir', 'Kec. Situraja', 'Jatimekar', 'negeri'),
(20208269, 'SD NEGERI KADU', 'Dusun Kadu', 'Kec. Jatigede', 'Kadu', 'negeri'),
(20208270, 'SD NEGERI KADUJAJAR II', 'Dusun Sudimampir', 'Kec. Tanjungkerta', 'Cipanas', 'negeri'),
(20208271, 'SD NEGERI KADUJAJAR III', 'Jl. Sindangtaman', 'Kec. Tanjungkerta', 'Cipanas', 'negeri'),
(20208274, 'SD NEGERI GALEMO', 'Dusun Galemo', 'Kec. Wado', 'Cilengkrang', 'negeri'),
(20208275, 'SD NEGERI MALAKA', 'Jln. Samoja Dusun Cikekes', 'Kec. Situraja', 'Malaka', 'negeri'),
(20208277, 'SD NEGERI PAKUWANGI', 'Dusun Ciloa RT 02/02', 'Kec. Rancakalong', 'Pangadegan', 'negeri'),
(20208278, 'SD NEGERI PAKUWON I', 'Jl. Rd. Dewi Sartika No. 20', 'Kec. Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208279, 'SD NEGERI PAKUWON II', 'Jl. Rd. Dewi Sartika No. 20', 'Kec. Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208282, 'SD NEGERI PAMARISEN', 'Jl. Desa Mekarjaya No. 148', 'Kec. Sumedang Utara', 'Mekarjaya', 'negeri'),
(20208283, 'SD NEGERI PAMOYANAN', 'Jl Pamoyanan - Ciawi', 'Kec. Jatigede', 'Cipicung', 'negeri'),
(20208284, 'SD NEGERI PAMULIHAN', 'Dusun Cilengsar RT 03 RW 10', 'Kec. Pamulihan', 'Cigendel', 'negeri'),
(20208285, 'SD NEGERI PANGANGINAN', 'Dusun Cilanggok RT. 01/05', 'Kec. Jatinunggal', 'Tarikolot', 'negeri'),
(20208286, 'SD NEGERI PANIIS', 'Dusun Paniis', 'Kec. Tanjungkerta', 'Mulyamekar', 'negeri'),
(20208287, 'SD NEGERI PANYINGKIRAN II', 'Jl. Panyingkiran No. 57', 'Kec. Sumedang Utara', 'Situ', 'negeri'),
(20208288, 'SD NEGERI PANYINGKIRAN III', 'Jl. Panyingkiran No. 59', 'Kec. Sumedang Utara', 'Situ', 'negeri'),
(20208289, 'SD NEGERI PARAKANKONDANG', 'Dusun Parakankondang', 'Kec. Jatigede', 'Kadujaya', 'negeri'),
(20208290, 'SD NEGERI PARI', 'Dusun Pari RT. 06/02', 'Kec. Surian', 'Wanajaya', 'negeri'),
(20208291, 'SD NEGERI PARUMASAN', 'Jl. Kantawijaya No 64', 'Kec. Paseh', 'Paseh Kaler', 'negeri'),
(20208292, 'SD NEGERI PASANGGRAHAN I', 'Jl. Pangeran Kornel No. 121 Kec. Sumedang Selatan Kab. Sumedang', 'Kec. Sumedang Selatan', 'PASANGGRAHAN BARU', 'negeri'),
(20208294, 'SD NEGERI PADASUKA III', 'Dusun Nanggewer', 'Kec. Sumedang Utara', 'Mulyasari', 'negeri'),
(20208295, 'SD NEGERI PADASUKA II', 'Dusun Cibitung', 'Kec. Sumedang Utara', 'Padasuka', 'negeri'),
(20208296, 'SD NEGERI MANGLAYANG I', 'Jl. Manglayang No.18 Sindangsari', 'Kec. Sukasari', 'Sindangsari', 'negeri'),
(20208297, 'SD NEGERI MANGLAYANG II', 'Jl. Manglayang No.18 Sindangsari', 'Sukasari', 'Sindangsari', 'negeri'),
(20208298, 'SD NEGERI MARGAMULYA', 'Dusun Antara', 'Cibugel', 'Tamansari', 'negeri'),
(20208299, 'SD NEGERI MARGAPALA', 'Dusun Margapala', 'Sumedang Selatan', 'MARGALAKSANA', 'negeri'),
(20208300, 'SD NEGERI MARGASUKA I', 'Dusun Nangorak', 'Sumedang Selatan', 'Margamekar', 'negeri'),
(20208301, 'SD NEGERI MARGASUKA II', 'Dusun Gununggadung', 'Sumedang Selatan', 'Sukajaya', 'negeri'),
(20208302, 'SD NEGERI MEKARWANGI', 'Dusun Cibungur', 'Jatinangor', 'Cinta Mulya', 'negeri'),
(20208308, 'SD NEGERI NYALINDUNG', 'Dusun Sukamaju RT 05 RW 01', 'Wado', 'Sukapura', 'negeri'),
(20208310, 'SD NEGERI PADAMULYA', 'Dusun Kadupugur', 'Sumedang Utara', 'Mulyasari', 'negeri'),
(20208311, 'SD NEGERI PADASUKA I', 'Dusun Cibenda', 'Sumedang Utara', 'Girimukti', 'negeri'),
(20208312, 'SD NEGERI PASANGGRAHAN II', 'Jl. Pangeran Kornel No. 235', 'Sumedang Selatan', 'PASANGGRAHAN BARU', 'negeri'),
(20208313, 'SD NEGERI TOLENGAS', 'Jln. Cisadane No. 64', 'Tomo', 'Tolengas', 'negeri'),
(20208314, 'SD NEGERI BENDUNGAN I', 'Dusun Pasarean', 'Sumedang Utara', 'Margamukti', 'negeri'),
(20208316, 'SD NEGERI BONGKOK', 'Dusun Bakanjati RT. 25/06', 'Paseh', 'Bongkok', 'negeri'),
(20208317, 'SD NEGERI BUAHNGARIUNG I', 'Dusun Buahngariung', 'Wado', 'Wado', 'negeri'),
(20208319, 'SD NEGERI BUDIASIH', 'Dusun Babakan Caringin', 'Tanjungkerta', 'Mulyamekar', 'negeri'),
(20208320, 'SD NEGERI BUNISARI', 'Dusun Bunisari RT. 02/02', 'Jatinunggal', 'Banjarsari', 'negeri'),
(20208322, 'SD NEGERI CIBALA', 'Dusun Cibala', 'Jatinunggal', 'Sarimekar', 'negeri'),
(20208323, 'SD NEGERI CIBEBER', 'Dusun Cibeber', 'Jatigede', 'Cintajaya', 'negeri'),
(20208324, 'SD NEGERI CIBODAS I', 'Dusun Ceuri', 'Tanjungkerta', 'Kertaharja', 'negeri'),
(20208326, 'SD NEGERI CICARIMANAH', 'Dsn Cicarimanah RT 04/02', 'Situraja', 'Cicarimanah', 'negeri'),
(20208329, 'SD NEGERI CIGENTUR', 'Dusun Sukamulya RT 02/02', 'Tanjungkerta', 'Cigentur', 'negeri'),
(20208330, 'SD NEGERI BANJARSARI', 'Dusun Margaluyu', 'Wado', 'Cimungkal', 'negeri'),
(20208331, 'SD NEGERI BANJARASIH', 'Dusun Banjarasih RT. 03/08', 'Jatinunggal', 'Sarimekar', 'negeri'),
(20208332, 'SD NEGERI BANGBAYANG', 'Dusun Sadarayna', 'Situraja', 'Bangbayang', 'negeri'),
(20208334, 'SD NEGERI TOMO', 'Jln. Raya Tomo - Sumedang KM. 34', 'Tomo', 'Tomo', 'negeri'),
(20208335, 'SD NEGERI TRIJAYA', 'Jl. Raden Ali Sadikin No. 63 RT. 01 RW. 05', 'Ujungjaya', 'Sakurjaya', 'negeri'),
(20208336, 'SD NEGERI UJUNGJAYA I', 'Jalan Raya Timur Ujungjaya', 'Ujungjaya', 'Ujungjaya', 'negeri'),
(20208337, 'SD NEGERI UJUNGJAYA III', 'Dusun Palasah', 'Ujungjaya', 'Palasari', 'negeri'),
(20208338, 'SD NEGERI UJUNGJAYA II', 'Dusun Cilega', 'Ujungjaya', 'Sakurjaya', 'negeri'),
(20208339, 'SD NEGERI WADO', 'Jl Raya Wado No 34', 'Wado', 'Wado', 'negeri'),
(20208340, 'SD NEGERI WANAJAYA', 'Dusun Tegalwangon', 'Ujungjaya', 'Palabuan', 'negeri'),
(20208341, 'SD NEGERI WANASARI I', 'Dusun Wanasari RT. 03/02', 'Surian', 'Wanasari', 'negeri'),
(20208342, 'SD NEGERI WANASARI II', 'Dusun Cisumur RT. 03/02', 'Surian', 'Pamekarsari', 'negeri'),
(20208343, 'SD NEGERI WARUNGBUNGUR', 'Dusun Warungbungur', 'Tomo', 'MEKARWANGI', 'negeri'),
(20208344, 'SD NEGERI AMBIT', 'Dusun Ambit', 'Situraja', 'Ambit', 'negeri'),
(20208346, 'SD NEGERI BABAKANHURIP', 'Jl. Pacuan Kuda', 'Sumedang Utara', 'Kotakaler', 'negeri'),
(20208347, 'SD NEGERI BABAKAN', 'Dusun Babakan Cikamuning', 'Sumedang Selatan', 'MEKARRAHAYU', 'negeri'),
(20208349, 'SD NEGERI BABAKANBUAH', 'Jl. Mayor Hadi No.35', 'Paseh', 'Legok Kidul', 'negeri'),
(20208350, 'SD NEGERI BAGINDA I', 'Jl. Pagar Betis No. 229', 'Sumedang Selatan', 'Baginda', 'negeri'),
(20208351, 'SD NEGERI CIJAMBE II', 'Jl. Arya Tinggal No. 81 Dusun Pasireungit Tonggoh RT 007/002', 'Paseh', 'Pasireungit', 'negeri'),
(20208352, 'SD NEGERI CIJATI', 'Cijati', 'Situraja', 'Cijati', 'negeri'),
(20208353, 'SD NEGERI CIJELER I', 'Jln. Yudhamanggala Cijeler', 'Situraja', 'Cijeler', 'negeri'),
(20208354, 'SD NEGERI CIMUNCANG', 'Dusun Sukaregang', 'Tanjungkerta', 'Banyuasih', 'negeri'),
(20208355, 'SD NEGERI CINARENGTA', 'Dusun Cinarengta RT 01/07', 'Tanjungkerta', 'Sukamantri', 'negeri'),
(20208356, 'SD NEGERI CIPACING II', 'Dusun Nangkod', 'Jatinangor', 'Cipacing', 'negeri'),
(20208357, 'SD NEGERI CIPAMANYOAN', 'Dusun Lamuniser', 'Wado', 'Sukapura', 'negeri'),
(20208358, 'SD NEGERI CIPAMEUNGPEUK', 'Jl. Pager Betis No. 55', 'Sumedang Selatan', 'Cipameungpeuk', 'negeri'),
(20208359, 'SD NEGERI CIPANAS', 'Dusun Babakan Caringin RT 01/06', 'Tanjungkerta', 'Cipanas', 'negeri'),
(20208360, 'SD NEGERI SIRAHCIPELANG', 'Dsn Sirahcipelang', 'Conggeang', 'Cipamekar', 'negeri'),
(20208361, 'SD NEGERI CIPEUTEUY', 'Dusun Cipeuteuy RT. 07/08', 'Jatinunggal', 'Cimanintin', 'negeri'),
(20208362, 'SD NEGERI CIRANGGEM', 'Dusun Pasirkaliki', 'Jatigede', 'Ciranggem', 'negeri'),
(20208363, 'SD NEGERI CIRENGGANIS', 'Dusun Cirengganis RT. 01/02', 'Pamulihan', 'Haurngombong', 'negeri'),
(20208364, 'SD NEGERI CISEMPUR', 'Jl. Letda Lukito No. 33', 'Jatinangor', 'Cisempur', 'negeri'),
(20208365, 'SD NEGERI CITEPOK', 'Dusun Baru RT. 03/01', 'Paseh', 'Citepok', 'negeri'),
(20208366, 'SD NEGERI CITRARESMI', 'Lingk. Cilipung RT. 04/15', 'Sumedang Selatan', 'PASANGGRAHAN BARU', 'negeri'),
(20208367, 'SD NEGERI CUPUWANGI', 'Dusun Babakandago', 'Rancakalong', 'Cibunar', 'negeri'),
(20208368, 'SD NEGERI DARANGDAN', 'Lingkungan Darangdan RT 01/08', 'Sumedang Selatan', 'Kotakulon', 'negeri'),
(20208369, 'SD NEGERI DARANGDAN TINGKAT', 'Lingkungan Darangdan 44', 'Sumedang Selatan', 'Kotakulon', 'negeri'),
(20208370, 'SD NEGERI CIMUKTI', 'Dusun Cihanyir Landeuh RT. 05/02', 'Jatigede', 'Cipicung', 'negeri'),
(20208371, 'SD NEGERI CIMIRUN', 'Dusun Cimirun', 'Wado', 'Cikareo Selatan', 'negeri'),
(20208373, 'SD NEGERI CIJELER II', 'Jln. Yudhamanggala Cijeler', 'Situraja', 'Cijeler', 'negeri'),
(20208374, 'SD NEGERI CIJELER III', 'Jl. Yudhamanggala No. 28 Cijeler', 'Situraja', 'Cijeler', 'negeri'),
(20208376, 'SD NEGERI CIKAMUNING', 'Dusun Babakan Cikamuning', 'Sumedang Selatan', 'MEKARRAHAYU', 'negeri'),
(20208377, 'SD NEGERI CIKANDANG', 'Dusun Cikandang', 'Cimanggung', 'Sindanggalih', 'negeri'),
(20208378, 'SD NEGERI CIKAREO I', 'Jl. Wado-Malangbong No. 130', 'Wado', 'Cikareo Utara', 'negeri'),
(20208379, 'SD NEGERI MARGALUYU', 'Dusun Karasak RT. 01/03', 'Sukasari', 'Sukarapih', 'negeri'),
(20208380, 'SD NEGERI CIKERUH I', 'Dusun Ciawi', 'Jatinangor', 'Cikeruh', 'negeri'),
(20208381, 'SD NEGERI CIKERUH II', 'Jln. Kolonel Achmad Syam No. 46 Dusun Ciawi RT. 01 RW. 05', 'Jatinangor', 'Cikeruh', 'negeri'),
(20208382, 'SD NEGERI CIKONDANG I', 'Jl. Suradinata No. 13 Sembir Kecamatan Sumedang Selatan Kabupaten Sumedang', 'Sumedang Selatan', 'Gunasari', 'negeri'),
(20208383, 'SD NEGERI CIKOPO I', 'Dusun Cikopo RT.02/03', 'Jatinangor', 'Cipacing', 'negeri'),
(20208384, 'SD NEGERI CILANDAK', 'Dusun Cilandak', 'Wado', 'Cikareo Selatan', 'negeri'),
(20208385, 'SD NEGERI CILELES', 'Dusun Cileles KM. 03', 'Jatinangor', 'Cileles', 'negeri'),
(20208386, 'SD NEGERI CILENGKRANG', 'Dusun Sukaluyu Jl. Raya Wado- Malangbong Km.9 No.333', 'Wado', 'Cilengkrang', 'negeri'),
(20208387, 'SD NEGERI CILEUKSA', 'Jl. Sebelas April No. 103 Dusun Cileuksa RT 02/05', 'Paseh', 'Legok Kaler', 'negeri'),
(20208388, 'SD NEGERI CILOA', 'Dusun Ciloa', 'Sumedang Selatan', 'Sukajaya', 'negeri'),
(20208389, 'SD NEGERI DARMAWANGI', 'Dusun Darmawangi RT.04 RW. 02', 'Tomo', 'Darmawangi', 'negeri'),
(20208467, 'SD NEGERI PASANGGRAHAN III', 'Jl. Pangeran Kornel No.121 A', 'Sumedang Selatan', 'PASANGGRAHAN BARU', 'negeri'),
(20208468, 'SD NEGERI SINDANGPALAY', 'Lingkungan Sindangpalay', 'Sumedang Selatan', 'PASANGGRAHAN BARU', 'negeri'),
(20208469, 'SD NEGERI SINDANGRAJA', 'Jl. Mayor Abdurahman No. 109', 'Sumedang Utara', 'Kotakaler', 'negeri'),
(20208470, 'SD NEGERI SINDANGWANGI', 'Jalan Wirakara Cikadu', 'Situraja', 'Cikadu', 'negeri'),
(20208471, 'SD NEGERI SIRAHCAI', 'Jl. Letda Lukito No. 70', 'Jatinangor', 'Cisempur', 'negeri'),
(20208472, 'SD NEGERI SIRNALUYU', 'Dusun Sukabirus RT 03/02', 'Rancakalong', 'Cibunar', 'negeri'),
(20208475, 'SD NEGERI CISAMPIH', 'Jl. Desa Cisampih RT. 17/05', 'Jatigede', 'Cisampih', 'negeri'),
(20208476, 'SD NEGERI SITURAJA', 'Jl. Alun - Alun Timur', 'Situraja', 'Situraja', 'negeri'),
(20208477, 'SD NEGERI SUKAHAYU', 'Dusun Cisugan', 'Rancakalong', 'Sukamaju', 'negeri'),
(20208478, 'SD NEGERI PAMULIHAN', 'Jln. Lapang No. 17', 'Situraja', 'Wanakerta', 'negeri'),
(20208479, 'SD NEGERI SUKAHERANG', 'Dusun Panamur RT. 03/04', 'Jatinunggal', 'Tarikolot', 'negeri'),
(20208481, 'SD NEGERI SUKAJADI', 'Jln. Rd. Umar Wirahadikusumah KM. 11 No. 35', 'Situraja', 'Sukatali', 'negeri'),
(20208482, 'SD NEGERI SUKAJAYA', 'Dusun Sukajaya RT .03/07', 'Jatinunggal', 'Pawenang', 'negeri'),
(20208483, 'SD NEGERI SUKAKERTA', 'Dusun Sukakerta', 'Sumedang Utara', 'Kebonjati', 'negeri'),
(20208484, 'SD NEGERI SINDANGJATI', 'Dusun Ciseuti', 'Paseh', 'Bongkok', 'negeri'),
(20208485, 'SD NEGERI SINDANG V', 'Dusun Giriharja', 'Sumedang Utara', 'Kebonjati', 'negeri'),
(20208486, 'SD NEGERI SINDANG IV', 'Dusun Bojong Inong RT. 01 RW. 03', 'Sumedang Utara', 'Jatimulya', 'negeri'),
(20208487, 'SD NEGERI PASAREAN', 'Jl. Pangeran Santri No.34', 'Sumedang Selatan', 'Kotakulon', 'negeri'),
(20208488, 'SD NEGERI PASEH I', 'Jalan Raya Raden Ali Sadikin No. 29', 'Paseh', 'Paseh Kidul', 'negeri'),
(20208489, 'SD NEGERI PASEH II', 'Jln. Nagrak RT 06/03', 'Paseh', 'Paseh Kaler', 'negeri'),
(20208490, 'SD NEGERI PASIRBENTENG II', 'Dusun Pasirbenteng RT 03/07', 'Rancakalong', 'Nagarawangi', 'negeri'),
(20208491, 'SD NEGERI PASIRHUNI', 'Dusun Pasirhuni', 'Cimanggung', 'Pasirnanjung', 'negeri'),
(20208492, 'SD NEGERI PASIRMASIGIT', 'Dusun Maleber', 'Wado', 'Wado', 'negeri'),
(20208493, 'SD NEGERI PASIRHUNI I', 'Jl. Militer No. 25 Sukamantri', 'Tanjungkerta', 'Sukamantri', 'negeri'),
(20208495, 'SD NEGERI PASIRKALIKI', 'Dusun Pasirkaliki RT 006/002', 'Jatigede', 'Ciranggem', 'negeri'),
(20208496, 'SD NEGERI PASIRWARENG', 'Dusun Pasirwareng RT. 01/01', 'Surian', 'Ranggasari', 'negeri'),
(20208497, 'SD NEGERI RANCAMULYA', 'Jl. KLK No. 2 Dusun Bojong', 'Sumedang Utara', 'Rancamulya', 'negeri'),
(20208498, 'SD NEGERI RANCAPURUT', 'Jl. Terusan 11 April KM. 27', 'Sumedang Utara', 'Rancamulya', 'negeri'),
(20208500, 'SD NEGERI SINDANG I', 'Dusun Bojongjati', 'Sumedang Utara', 'Kebonjati', 'negeri'),
(20208501, 'SD NEGERI SINDANG II', 'Jl.Desa Jatihurip No. 78', 'Sumedang Utara', 'Jatihurip', 'negeri'),
(20208502, 'SD NEGERI SINDANG III', 'Jatihurip', 'Sumedang Utara', 'Jatihurip', 'negeri'),
(20208503, 'SD NEGERI PAKEMITAN II', 'Dusun Sukaluyu', 'Situraja', 'Situraja Utara', 'negeri'),
(20208504, 'SD NEGERI SUKAMAJU', 'Dusun Citepus RT. 02 RW. 04', 'Jatinunggal', 'Sirnasari', 'negeri'),
(20208506, 'SD NEGERI TANJUNGKERTA', 'Jl. Kaum No. 1', 'Tanjungkerta', 'Kertamekar', 'negeri'),
(20208507, 'SD NEGERI TARIKOLOT', 'Dusun Bojongjati RT. 01/03', 'Jatinunggal', 'Tarikolot', 'negeri'),
(20208508, 'SD NEGERI TEGALKALONG', 'Jalan 11 April No. 58', 'Sumedang Utara', 'Talun', 'negeri'),
(20208512, 'SD NEGERI TENJOLAYA', 'Dusun Tenjolaya', 'Sumedang Selatan', 'Sukagalih', 'negeri'),
(20208515, 'SD NEGERI WARUNGKETAN', 'Dusun Warungketan', 'Situraja', 'Jatimekar', 'negeri'),
(20208522, 'SD NEGERI TANJUNGMULYA', 'Dusun Liunggunung', 'Tanjungkerta', 'Tanjungmulya', 'negeri'),
(20208524, 'SD NEGERI TALUN', 'Jl. Sacaprana No. 21 Legok Kidul', 'Paseh', 'Legok Kidul', 'negeri'),
(20208526, 'SD NEGERI SUKAMANAH I', 'Dusun Sukamanah RT 01/03', 'Rancakalong', 'Sukasirnarasa', 'negeri'),
(20208530, 'SD NEGERI SUKANANDUR', 'Dusun Sukanandur RT 02/02', 'Rancakalong', 'Sukahayu', 'negeri'),
(20208531, 'SD NEGERI SUKARAJA I', 'Jl. Empang No. 04', 'Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208532, 'SD NEGERI SUKARAJA II', 'Jl. Empang No. 04', 'Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208533, 'SD NEGERI SUKASARI', 'Jl. Genteng No. 60', 'Sukasari', 'Sukasari', 'negeri'),
(20208534, 'SD NEGERI SUKASIRNA', 'Jl. Buyut Lidah Suryadiningrat No. 25', 'Paseh', 'Cijambe', 'negeri'),
(20208535, 'SD NEGERI SUKASIRNA I', 'Jl. Cut Nyak Dien No. 08', 'Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208536, 'SD NEGERI SUKASIRNA II', 'Jl. Cut Nyak Dien No. 08', 'Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208539, 'SD NEGERI SUKAWENING', 'Dusun Panyirapan', 'Sumedang Utara', 'Mekarjaya', 'negeri'),
(20208540, 'SD NEGERI TALUN', 'Jl. Talun Kidul RT 03 RW 05', 'Sumedang Utara', 'Talun', 'negeri'),
(20208542, 'SD NEGERI TENJONAGARA', 'Jl. Kebon Seureuh', 'Sumedang Selatan', 'Cipameungpeuk', 'negeri'),
(20208549, 'SD NEGERI AWILEGA', 'Dusun Cihayam', 'Tanjungkerta', 'AWILEGA', 'negeri'),
(20208551, 'SD NEGERI BABAKANBANDUNG', 'Jalan Malaka No. 29', 'Situraja', 'Situraja Utara', 'negeri'),
(20208552, 'SD NEGERI BABAKAN BANDUNG', 'Jl. Maruyung No. 93.A', 'Tanjungsari', 'Kutamandiri', 'negeri'),
(20208553, 'SD NEGERI BAGINDA II', 'Jl. Pager Betis KM. 03', 'Sumedang Selatan', 'Baginda', 'negeri'),
(20208556, 'SD NEGERI BANTARGINTUNG', 'Dusun Bantargintung', 'Tomo', 'Karyamukti', 'negeri'),
(20208557, 'SD NEGERI BATULAWANG', 'Dusun Cimedang', 'Wado', 'Cilengkrang', 'negeri'),
(20208558, 'SD NEGERI BENDUNGAN II', 'Dusun Sukajadi', 'Sumedang Utara', 'Margamukti', 'negeri'),
(20208559, 'SD NEGERI BOJONGJATI', 'Dusun Bojongjati RT. 03/01', 'Jatinunggal', 'Tarikolot', 'negeri'),
(20208560, 'SD NEGERI BOJONGSALAM', 'Dusun Sukamulya', 'Jatinunggal', 'Pawenang', 'negeri'),
(20208581, 'SD NEGERI BOROS', 'Dusun Sukadana', 'Tanjungkerta', 'Boros', 'negeri'),
(20208584, 'SD NEGERI CIJERUK', 'Dusun Cijeruk RT. 02/01', 'Pamulihan', 'Cijeruk', 'negeri'),
(20208585, 'SD NEGERI CIJOLANG', 'Dusun Cijolang RT 01/09', 'Tanjungsari', 'Margaluyu', 'negeri'),
(20208586, 'SD NEGERI CIKADU', 'Dusun Cikadu', 'Situraja', 'Cikadu', 'negeri'),
(20208588, 'SD NEGERI CIKARAMAS I', 'Dusun Cikaramas', 'Tanjungmedar', 'Cikaramas', 'negeri'),
(20208589, 'SD NEGERI CIKARAMAS II', 'Dusun Cikaramas', 'Tanjungmedar', 'Cikaramas', 'negeri'),
(20208590, 'SD NEGERI CIKAREO II', 'Jalan Raya Cikareo No. 34', 'Wado', 'Cikareo Utara', 'negeri'),
(20208591, 'SD NEGERI CIKAWAO', 'Jln. Nyampay RT. 01/09', 'Pamulihan', 'Sukawangi', 'negeri'),
(20208592, 'SD NEGERI CIKAWUNG', 'Dusun Cikawung', 'Wado', 'Sukajadi', 'negeri'),
(20208593, 'SD NEGERI CIKEUSIK', 'Dusun Cikeusik', 'Rancakalong', 'Pamekaran', 'negeri'),
(20208594, 'SD NEGERI CIKOPO II', 'Dusun Cikopo RT. 02/03', 'Jatinangor', 'Cipacing', 'negeri'),
(20208595, 'SD NEGERI CIKUBANG', 'Dusun Cikubang RT 02/05', 'Pamulihan', 'Citali', 'negeri'),
(20208597, 'SD NEGERI CILEMBU', 'Jl. Desa Cilembu No. 16', 'Pamulihan', 'Cilembu', 'negeri'),
(20208599, 'SD NEGERI CILENGKRANG', 'Jl. Panyingkiran No. 101', 'Sumedang Utara', 'Kotakaler', 'negeri'),
(20208601, 'SD NEGERI CIJELAG', 'Jalan Raya Cijelag RT 03 RW 03', 'Kec. Tomo', 'Tomo', 'negeri'),
(20208602, 'SD NEGERI CIJAMBU II', 'Dusun Cijambu RT.02/03', 'Kec. Tanjungsari', 'Kadakajaya', 'negeri'),
(20208603, 'SD NEGERI BUGEL', 'Bugel', 'Kec. Tomo', 'Bugel', 'negeri'),
(20208604, 'SD NEGERI BUNIASIH', 'Dusun Buniasih RT. 02/05', 'Kec. Jatinunggal', 'Cimanintin', 'negeri'),
(20208605, 'SD NEGERI BUNTER', 'Dusun Bunter', 'Kec. Wado', 'Cikareo Selatan', 'negeri'),
(20208606, 'SD NEGERI CADASPANGERAN', 'Jl. Raya Cadaspangeran KM. 08', 'Kec. Sumedang Selatan', 'Ciherang', 'negeri'),
(20208607, 'SD NEGERI CARICANGKAS', 'Dusun Caricangkas RT 01 RW 03', 'Kec. Tomo', 'Karyamukti', 'negeri'),
(20208608, 'SD NEGERI CIAKAR', 'Dusun Ciakar RT. 07/02', 'Kec. Pamulihan', 'Cimarias', 'negeri'),
(20208609, 'SD NEGERI CIAWI', 'Dusun Ciawi RT. 03/04', 'Kec. Sumedang Selatan', 'Gunasari', 'negeri'),
(20208611, 'SD NEGERI CIBULUH', 'Dusun Cibuluh', 'Kec. Ujungjaya', 'Cibuluh', 'negeri'),
(20208612, 'SD NEGERI CIBUNAR', 'Dusun Cibunar RT 04/03', 'Kec. Rancakalong', 'Cibunar', 'negeri'),
(20208613, 'SD NEGERI CIBUNGUR', 'Dusun Babakan Bandung RT 03/05', 'Kec. Rancakalong', 'Cibungur', 'negeri'),
(20208614, 'SD NEGERI CIBURUAN', 'Dusun Ciburuan', 'Kec. Tanjungmedar', 'Jingkang', 'negeri'),
(20208615, 'SD NEGERI CIGENDEL', 'Jl. Raya Tanjungsari KM. 10', 'Kec. Pamulihan', 'Cigendel', 'negeri'),
(20208616, 'SD NEGERI CIHERANG', 'Dusun Hampang RT. 03/05', 'Kec. Pamulihan', 'Cijeruk', 'negeri'),
(20208617, 'SD NEGERI CIJAMBE I', 'Dusun Parugpug Kidul', 'Kec. Paseh', 'Cijambe', 'negeri'),
(20208618, 'SD NEGERI CIJAMBU I', 'Dusun Pasanggrahan RT 03/03', 'Kec. Tanjungsari', 'Cijambu', 'negeri'),
(20208619, 'SD NEGERI CILEUTIK', 'Jl. Cileutik 14', 'Kec. Tanjungsari', 'Raharja', 'negeri'),
(20208698, 'SD NEGERI PASIRLAJA', 'Dusun Cigobang', 'Kec. Rancakalong', 'Sukahayu', 'negeri'),
(20208699, 'SD NEGERI PAWENANG', 'Dusun Sukahening RT. 02/02', 'Kec. Jatinunggal', 'Pawenang', 'negeri'),
(20208700, 'SD NEGERI PEUSAR', 'Dusun Peusar RT 03/05', 'Kec. Sumedang Selatan', 'Baginda', 'negeri'),
(20208701, 'SD NEGERI PUNCAK', 'Jl. Genteng', 'Kec. Sukasari', 'Genteng', 'negeri'),
(20208702, 'SD NEGERI RANCAGOONG', 'Dusun Seklok', 'Kec. Tanjungmedar', 'Tanjungwangi', 'negeri'),
(20208703, 'SD NEGERI RANCAKALONG', 'Dusun Rancakalong RT 02/08', 'Kec. Rancakalong', 'Rancakalong', 'negeri'),
(20208704, 'SD NEGERI RANCAMEDALWANGI', 'Dusun Cikondang RT 01/04', 'Kec. Rancakalong', 'Pamekaran', 'negeri'),
(20208705, 'SD NEGERI SABAGI', 'Dusun Sabagi 2', 'Kec. Sumedang Selatan', 'Ciherang', 'negeri'),
(20208706, 'SD NEGERI SALADO', 'Dusun.Salado RT. 01/02', 'Kec. Jatinunggal', 'Banjarsari', 'negeri'),
(20208707, 'SD NEGERI SALAM', 'Dusun Salam', 'Kec. Tanjungmedar', 'Wargaluyu', 'negeri'),
(20208708, 'SD NEGERI SARWIRU', 'Dusun Sarwiru Kidul RT. 02/01', 'Kec. Surian', 'Suria Medal', 'negeri'),
(20208709, 'SD NEGERI SELAAWI', 'Dusun Selaawi RT 01/06', 'Kec. Rancakalong', 'Sukahayu', 'negeri'),
(20208710, 'SD NEGERI SIDARAJA', 'Dusun Sidaraja', 'Kec. Paseh', 'Padanaan', 'negeri'),
(20208711, 'SD NEGERI SINDANGASIH', 'Dusun Sindangasih RT. 01/09', 'Kec. Jatinunggal', 'Sirnasari', 'negeri'),
(20208712, 'SD NEGERI SINDANGKERTA', 'Dusun Sindang', 'Kec. Tanjungmedar', 'Tanjungwangi', 'negeri'),
(20208714, 'SD NEGERI PASIRIMPUN', 'Jln. Rd. Umar Wirahadikusumah KM. 14 No. 56', 'Kec. Situraja', 'Situraja', 'negeri'),
(20208715, 'SD NEGERI PASIRHUNI II', 'Jl. Alun-alun Sukamantri No. 01', 'Kec. Tanjungkerta', 'Sukamantri', 'negeri'),
(20208716, 'SD NEGERI PASIRBIRU', 'Jl. Raya Tanjungsari-Rancakalong Km. 10', 'Kec. Rancakalong', 'Pasir Biru', 'negeri'),
(20208718, 'SD NEGERI NYALINDUNG', 'Jln. Raya Nyalindung', 'Kec. Paseh', 'Padanaan', 'negeri'),
(20208719, 'SD NEGERI PADAMULYA', 'Dusun Baregbeg', 'Kec. Tanjungmedar', 'Tanjungmedar', 'negeri'),
(20208721, 'SD NEGERI PADASUKA IV', 'Jl. Kutamaya Dusun Cibitung RT. 01 RW. 04', 'Kec. Sumedang Utara', 'Padasuka', 'negeri'),
(20208722, 'SD NEGERI PAJAGAN', 'Dusun Pajagan RT. 04/05', 'Kec. Jatinunggal', 'Kirisik', 'negeri'),
(20208724, 'SD NEGERI PALASARI', 'Dusun Ciroyom', 'Kec. Ujungjaya', 'Palasari', 'negeri'),
(20208726, 'SD NEGERI PANDE', 'Dusun Cipinangpait', 'Kec. Ujungjaya', 'Cibuluh', 'negeri'),
(20208727, 'SD NEGERI PANGADEGAN', 'Dusun Cungakang RT/RW 04/07', 'Kec. Rancakalong', 'Pangadegan', 'negeri'),
(20208729, 'SD NEGERI PANYINGKIRAN I', 'Jl. Panyingkiran No. 55', 'Kec. Sumedang Utara', 'Situ', 'negeri'),
(20208730, 'SD NEGERI NEGLASARI', 'Jln.Cikuda No.08', 'Kec. Jatinangor', 'Hegarmanah', 'negeri'),
(20208731, 'SD NEGERI PASIR', 'Dusun Pasir RT/RW 02/05', 'Kec. Rancakalong', 'Rancakalong', 'negeri'),
(20208732, 'SD NEGERI PASIRBENTENG I', 'Dusun Sukamulya RT 01/05', 'Kec. Rancakalong', 'Nagarawangi', 'negeri'),
(20208734, 'SD NEGERI SIRNASARI', 'Dusun Cijati', 'Kec. Jatinunggal', 'Sirnasari', 'negeri'),
(20208735, 'SD NEGERI SITUBATU', 'Dusun Situbatu RT. 03/03', 'Kec. Surian', 'Pamekarsari', 'negeri'),
(20208736, 'SD NEGERI SUKASARI', 'DUSUN SUKASARI', 'Kec. Wado', 'Ganjaresik', 'negeri'),
(20208739, 'SD NEGERI SUKATALI', 'Jln. Rd. Umar Wirahadikusumah KM. 11 No. 37', 'Kec. Situraja', 'Sukatali', 'negeri'),
(20208740, 'SD NEGERI SUKATANI', 'Dusun Ciburulung', 'Kec. Tanjungmedar', 'Sukatani', 'negeri'),
(20208741, 'SD NEGERI SUKAWANGI', 'Dusun Lamajang RT 02/08', 'Kec. Pamulihan', 'Sukawangi', 'negeri'),
(20208746, 'SD NEGERI TANJUNGSARI IV', 'Jln. Raya Tanjungsari 170 A', 'Kec. Tanjungsari', 'Tanjungsari', 'negeri'),
(20208747, 'SD NEGERI TANJUNGJAYA', 'Dusun Tanjungjaya', 'Kec. Wado', 'Mulyajaya', 'negeri'),
(20208748, 'SD NEGERI TANJUNGMEKAR', 'Dusun Pondoksereh', 'Kec. Tanjungkerta', 'Tanjungmekar', 'negeri'),
(20208749, 'SD NEGERI TANJUNGSARI I', 'Jln. Raya Tanjungsari No.229', 'Kec. Tanjungsari', 'Jatisari', 'negeri'),
(20208750, 'SD NEGERI TANJUNGSARI III', 'Jalan Raya Tanjungsari 170 A', 'Kec. Tanjungsari', 'Tanjungsari', 'negeri'),
(20208751, 'SD NEGERI TEGALENDAH', 'Dusun Darmaga', 'Kec. Rancakalong', 'Pangadegan', 'negeri'),
(20208753, 'SD NEGERI SUKARATU', 'Dusun Cilengkep', 'Kec. Ujungjaya', 'Sukamulya', 'negeri'),
(20208754, 'SD NEGERI SUKARASA II', 'Dusun Bojongterong', 'Kec. Ujungjaya', 'Palabuan', 'negeri'),
(20208755, 'SD NEGERI SUGIHHARTI', 'Dusun Cilengar', 'Kec. Tomo', 'Cipeles', 'negeri'),
(20208756, 'SD NEGERI SUKADANA', 'Dusun Sukadana Rt 01/05', 'Kec. Tanjungkerta', 'Boros', 'negeri'),
(20208759, 'SD NEGERI SUKALILAH', 'Dusun Cikohkol RT. 01/05', 'Kec. Pamulihan', 'Cigendel', 'negeri'),
(20208760, 'SD NEGERI SUKAMANAH', 'Dusun Sukamanah', 'Kec. Wado', 'Cimungkal', 'negeri'),
(20208762, 'SD NEGERI SUKAMANAH II', 'Dusun Sukamanah', 'Kec. Rancakalong', 'Sukamaju', 'negeri'),
(20208763, 'SD NEGERI SUKAMANTRI', 'Jl. Rancabawang', 'Kec. Tanjungsari', 'Cinanjung', 'negeri'),
(20208767, 'SD NEGERI SUKAMULYA', 'Sukamulya', 'Kec. Ujungjaya', 'Sukamulya', 'negeri'),
(20208768, 'SD NEGERI SUKANEGLA', 'Dusun Sukanegla RT/RW 03/07 Desa Pasirbiru', 'Kec. Rancakalong', 'Pasir Biru', 'negeri'),
(20208769, 'SD NEGERI SUKANYIRU', 'Dusun Sukanyiru', 'Kec. Wado', 'Sukajadi', 'negeri'),
(20208770, 'SD NEGERI SUKARASA I', 'Dusun Kosambian', 'Kec. Ujungjaya', 'Kebon Cau', 'negeri'),
(20208771, 'SD NEGERI TEGALSARI', 'Dusun Bunut I', 'Kec. Situraja', 'Cijati', 'negeri'),
(20208772, 'SD NEGERI CILULUK I', 'Dusun Ciluluk No.55 RT 001/014', 'Kec. Tanjungsari', 'Marga Jaya', 'negeri'),
(20208773, 'SD NEGERI CIRANJANG', 'Dusun Ciranjang', 'Kec. Tanjungmedar', 'Sukamukti', 'negeri'),
(20208775, 'SD NEGERI CISAMBENG', 'Dusun Nganceng', 'Kec. Jatinunggal', 'Cipeundeuy', 'negeri'),
(20208776, 'SD NEGERI CISEMPAK', 'Dusun Pasirandu', 'Kec. Tanjungmedar', 'Wargaluyu', 'negeri'),
(20208778, 'SD NEGERI CISUGAN', 'Dusun Cungakang', 'Kec. Rancakalong', 'Pangadegan', 'negeri'),
(20208779, 'SD NEGERI CISURAT', 'Dusun Cisurat', 'Kec. Wado', 'Cisurat', 'negeri'),
(20208780, 'SD NEGERI CITALI', 'Dusun Citali', 'Kec. Pamulihan', 'Ciptasari', 'negeri'),
(20208781, 'SD NEGERI CITENGAH', 'Jl. Pager Betis No. 399 Citengah', 'Kec. Sumedang Selatan', 'Citengah', 'negeri'),
(20208782, 'SD NEGERI CITUNGKU', 'Dusun Citungku RT 01/03', 'Kec. Rancakalong', 'Nagarawangi', 'negeri'),
(20208783, 'SD NEGERI DARMAJAYA', 'Dusun Cibengkung', 'Kec. Tomo', 'Jembarwangi', 'negeri'),
(20208785, 'SD NEGERI GANJARTEMU', 'Dusun Ganjartemu', 'Kec. Wado', 'Ganjaresik', 'negeri'),
(20208786, 'SD NEGERI GIRIJAYA', 'Dusun Pasir', 'Kec. Ujungjaya', 'Kebon Cau', 'negeri'),
(20208787, 'SD NEGERI GUDANG I', 'Jl. Raya Tanjungsari No.390', 'Kec. Tanjungsari', 'Gudang', 'negeri'),
(20208788, 'SD NEGERI GUDANG II', 'Jl. Cijambu No. 56', 'Kec. Tanjungsari', 'Pasigaran', 'negeri'),
(20208790, 'SD NEGERI GUDANG KOPI II', 'Jl. Pangeran Santri No.39', 'Kec. Sumedang Selatan', 'Kotakulon', 'negeri'),
(20208791, 'SD NEGERI CIPUNAGARA', 'Dusun Cikihiang RT 01 RW 03', 'Kec. Wado', 'Cisurat', 'negeri'),
(20208792, 'SD NEGERI CIPEUNDEUY', 'Dusun Cipeundeuy', 'Kec. Darmaraja', 'Sukaratu', 'negeri'),
(20208794, 'SD NEGERI CILULUK II', 'Jalan Pagaden No. 26', 'Kec. Tanjungsari', 'Marga Jaya', 'negeri'),
(20208795, 'SD NEGERI CIMALELA', 'Dusun Cimalela', 'Kec. Wado', 'Mulyajaya', 'negeri'),
(20208796, 'SD NEGERI CIMANINGTIN', 'Dusun Cimaningtin RT. 01/01', 'Kec. Jatinunggal', 'Cimanintin', 'negeri'),
(20208797, 'SD NEGERI CIMANUK', 'Dusun Kosambian', 'Kec. Ujungjaya', 'Kebon Cau', 'negeri'),
(20208798, 'SD NEGERI CIMASUK', 'Dusun Gamlung RT. 04/06', 'Kec. Pamulihan', 'Pamulihan', 'negeri'),
(20208799, 'SD NEGERI CIMUNCANG', 'Dusun Cimuncang RT. 02/07', 'Kec. Surian', 'Surian', 'negeri'),
(20208801, 'SD NEGERI CINANGGERANG I', 'Dusun Cinanggerang RT. 03/04', 'Kec. Pamulihan', 'Cinanggerang', 'negeri'),
(20208803, 'SD NEGERI CINANGSI', 'Dusun Cinangsi', 'Kec. Tanjungmedar', 'Sukamukti', 'negeri'),
(20208804, 'SD NEGERI CIOMAS', 'Dusun Ciomas', 'Kec. Tanjungmedar', 'Kamal', 'negeri'),
(20208805, 'SD NEGERI CIPACING', 'Dusun Cipacing Jl. Desa Mekarbakti RT.15/04', 'Kec. Pamulihan', 'Mekarbakti', 'negeri'),
(20208806, 'SD NEGERI CIPANAS', 'Dusun Pande', 'Kec. Ujungjaya', 'Cibuluh', 'negeri'),
(20208807, 'SD NEGERI CIPANCAR', 'Jl. Pager Betis Dusun Cijaha RT. 01/02', 'Kec. Sumedang Selatan', 'Cipancar', 'negeri'),
(20208809, 'SD NEGERI CIPELANG', 'Dsn. Cipelang Situraja', 'Kec. Situraja', 'Sukatali', 'negeri'),
(20208810, 'SD NEGERI GUNASARI', 'Dusun Cibebera RT. 03 RW. 03', 'Kec. Sumedang Selatan', 'Gunasari', 'negeri'),
(20208811, 'SD NEGERI GUNUNGGADUNG', 'Dusun Gununggadung RT 04/10', 'Kec. Sumedang Selatan', 'Sukajaya', 'negeri'),
(20208812, 'SD NEGERI NANGGERANG', 'Dusun Nanggerang RT.01/02', 'Kec. Surian', 'NANJUNGWANGI', 'negeri'),
(20208813, 'SD NEGERI KULINYAR', 'Dusun Kulinyar', 'Kec. Ujungjaya', 'Kudangwangi', 'negeri'),
(20208817, 'SD NEGERI MARGAJAYA', 'Dusun Bojong', 'Kec. Tanjungsari', 'Marga Jaya', 'negeri'),
(20208819, 'SD NEGERI MARGAJAYA', 'Jln. Aput No. 41', 'Kec. Ujungjaya', 'Ujungjaya', 'negeri'),
(20208820, 'SD NEGERI MARGALUYU', 'Dusun Sukaasih', 'Kec. Conggeang', 'Padaasih', 'negeri'),
(20208821, 'SD NEGERI MARGAMULYA', 'Dusun Panadahan', 'Kec. Ujungjaya', 'Kudangwangi', 'negeri'),
(20208822, 'SD NEGERI MARIUK', 'Jl. Desa Margaluyu No. 36', 'Kec. Tanjungsari', 'Margaluyu', 'negeri'),
(20208823, 'SD NEGERI MARONGGE', 'Dusun Cisaar', 'Kec. Tomo', 'Marongge', 'negeri'),
(20208824, 'SD NEGERI MARUYUNG I', 'Jl. Desa Kutamandiri', 'Kec. Tanjungsari', 'Kutamandiri', 'negeri'),
(20208825, 'SD NEGERI MARUYUNG II', 'Dusun Panday', 'Kec. Tanjungsari', 'Kutamandiri', 'negeri'),
(20208826, 'SD NEGERI MEKARBAKTI', 'Dusun Cipelah RT. 24/ RW. 06', 'Kec. Pamulihan', 'Mekarbakti', 'negeri'),
(20208828, 'SD NEGERI NAGRAK', 'Dusun Nagrak RT. 03.02', 'Kec. Jatinunggal', 'Sukamanah', 'negeri'),
(20208829, 'SD NEGERI KRAMATJAYA', 'Dusun Kramat', 'Kec. Ujungjaya', 'Ujungjaya', 'negeri'),
(20208830, 'SD NEGERI KIRISIK', 'Dusun Kirisik RT. 01/01', 'Kec. Jatinunggal', 'Kirisik', 'negeri'),
(20208831, 'SD NEGERI KERTAMUKTI', 'Dusun Sindangjaya', 'Kec. Tanjungmedar', 'Kertamukti', 'negeri'),
(20208832, 'SD NEGERI HAURNGOMBONG I', 'Dusun Warungkawat RT. 01/03', 'Kec. Pamulihan', 'Haurngombong', 'negeri'),
(20208833, 'SD NEGERI HAURNGOMBONG II', 'Dusun Cipareuag RT. 02/06', 'Kec. Pamulihan', 'Haurngombong', 'negeri'),
(20208835, 'SD NEGERI HEGARMANAH', 'Dusun Margamekar RT. 01/12', 'Kec. Jatinangor', 'Hegarmanah', 'negeri'),
(20208836, 'SD NEGERI HEGARMANAH', 'Jl. Desa Raharja', 'Kec. Tanjungsari', 'Raharja', 'negeri'),
(20208837, 'SD ISLAM AL FURQON', 'Nagrog Rt 02/08', 'Kec. Rancakalong', 'Sukahayu', 'swasta'),
(20208838, 'SD IT NURUL AIMAN', 'Jalan Kenanga No. 29 -31 A', 'Kec. Tanjungsari', 'Tanjungsari', 'swasta'),
(20208839, 'SD NEGERI JAGATAPA', 'Dusun Pangkalan RT. 01/03', 'Kec. Jatinunggal', 'Kirisik', 'negeri'),
(20208840, 'SD NEGERI JAYAGIRI', 'Dusun Babakan RT 10 Rw 04', 'Kec. Tomo', 'Darmawangi', 'negeri'),
(20208841, 'SD NEGERI JAYASARI', 'Jl. Jayasari No. 06', 'Kec. Tanjungsari', 'Tanjungsari', 'negeri'),
(20208842, 'SD NEGERI KEBONHUI', 'Jl. Kenanga No.52', 'Kec. Tanjungsari', 'Tanjungsari', 'negeri'),
(20208843, 'SD NEGERI SUKASARI', 'Jalan Cikadu-Situraja No. 115', 'Kec. Situraja', 'Mekarmulya', 'negeri'),
(20208844, 'SD NEGERI KARANGLAYUNG', 'Dusun Pasirloa', 'Kec. Tanjungsari', 'Kadakajaya', 'negeri'),
(20208845, 'SD NEGERI KARANGANYAR', 'Dusun Cidarma RT. 01/08', 'Kec. Jatinunggal', 'Cipeundeuy', 'negeri'),
(20208846, 'SD NEGERI KAMAL', 'Dusun Kamal', 'Kec. Tanjungmedar', 'Kamal', 'negeri'),
(20208847, 'SD NEGERI KADUJAJAR I', 'Dusun Depok', 'Kec. Tanjungkerta', 'Tanjungmekar', 'negeri'),
(20208848, 'SD NEGERI JINGKANG', 'Dusun Jingkang', 'Kec. Tanjungmedar', 'Jingkang', 'negeri'),
(20233776, 'SD NEGERI ANCOL', 'Dusun Ancol', 'Kec. Darmaraja', 'Karang Pakuan', 'negeri'),
(20233778, 'SD NEGERI ANTARA I', 'Dusun Antara I RT 02 RW 02', 'Kec. Cibugel', 'Tamansari', 'negeri'),
(20233779, 'SD NEGERI ANTARA II', 'Dusun Antara', 'Kec. Cibugel', 'Tamansari', 'negeri'),
(20233780, 'SD NEGERI BABAKANASEM', 'Dsn. Ciputat. RT.04/04', 'Kec. Conggeang', 'Babakan Asem', 'negeri'),
(20233781, 'SD NEGERI BABAKANDESA', 'Dusun Cibugel RT 02 RW 03', 'Kec. Cibugel', 'Cibugel', 'negeri'),
(20233782, 'SD NEGERI BABAKAN CIPEUNDEUY', 'Dusun Cikaso', 'Kec. Cisitu', 'Cimarga', 'negeri'),
(20233783, 'SD NEGERI BANGKIR', 'Dusun Bangkir', 'Kec. Cimanggung', 'Sindanggalih', 'negeri'),
(20233784, 'SD NEGERI BANTARJAMBE', 'Dusun Karamat', 'Kec. Cisitu', 'Cigintung', 'negeri'),
(20233786, 'SD NEGERI BOJONGKONENG', 'Jl. Rd UMAR WIRAHADIKUSUMAH KM. 02', 'Kec. Ganeas', 'Cikoneng', 'negeri'),
(20233787, 'SD NEGERI BOJONGLOA I', 'Dusun Citaman', 'Kec. Buahdua', 'Bojongloa', 'negeri'),
(20233788, 'SD NEGERI BOJONGLOA II', 'Dusun Sumber', 'Kec. Buahdua', 'Bojongloa', 'negeri'),
(20233790, 'SD NEGERI BUAHDUA I', 'Dusun Ciranten', 'Kec. Buahdua', 'BUAHDUA', 'negeri'),
(20233791, 'SD NEGERI BUAHDUA II', 'Jalan Buahdua', 'Kec. Buahdua', 'Buahdua', 'negeri'),
(20233792, 'SD NEGERI BUNTER I', 'Dusun Cijaringao', 'Kec. Cimanggung', 'Cihanjuang', 'negeri'),
(20233793, 'SD NEGERI BUNTER II', 'Dusun Sindangnangoh', 'Kec. Cimanggung', 'Cikahuripan', 'negeri'),
(20233794, 'SD NEGERI BUNTER III', 'Dusun Cijaringao', 'Kec. Cimanggung', 'Cihanjuang', 'negeri'),
(20233795, 'SD NEGERI CACABAN', 'Jln. Sindangsono No.1', 'Kec. Conggeang', 'Cacaban', 'negeri'),
(20233797, 'SD NEGERI CAKRAWATI', 'Dusun Pasar', 'Kec. Darmaraja', 'Sukaratu', 'negeri'),
(20233799, 'SD NEGERI CIAWITALI', 'Dusun Ciawitali', 'Kec. Buahdua', 'CIAWITALI', 'negeri'),
(20233800, 'SD NEGERI CIBAPA', 'Dsn. Cibapa', 'Kec. Conggeang', 'Cibubuan', 'negeri'),
(20233801, 'SD NEGERI CIBAREUBEU', 'Dusun Cibareubeu RT. 01/08', 'Kec. Jatinunggal', 'Sukamanah', 'negeri'),
(20233802, 'SD NEGERI CIBENDA', 'Dusun Cibenda', 'Kec. Cimanggung', 'Cikahuripan', 'negeri'),
(20233803, 'SD NEGERI CIBEUREUM I', 'Jl. Raya Cibeureum No. 399', 'Kec. Cimalaka', 'Cibeureum Kulon', 'negeri'),
(20233804, 'SD NEGERI CIBEUREUM II', 'Jalan Sedar No. 07', 'Kec. Cimalaka', 'Cibeureum Kulon', 'negeri'),
(20233805, 'SD NEGERI CIBEUREUM III', 'Dusun Pasir', 'Kec. Cimalaka', 'Cibeureum Wetan', 'negeri'),
(20233806, 'SD NEGERI CIBEUREUM IV', 'Dusun Cimerega', 'Kec. Cimalaka', 'Cibeureum Kulon', 'negeri'),
(20233807, 'SD NEGERI CIBEUSI', 'Dusun Sukajadi', 'Kec. Jatinangor', 'Cibeusi', 'negeri'),
(20233808, 'SD NEGERI CIBITUNG', 'Dusun Cibitung', 'Kec. Buahdua', 'Cibitung', 'negeri'),
(20233809, 'SD NEGERI CIBOBOKO', 'Dusun Ciboboko', 'Kec. Jatigede', 'Mekarasih', 'negeri'),
(20233810, 'SD NEGERI CIBODAS II', 'Dusun Janggot', 'Kec. Tanjungkerta', 'Tanjungmulya', 'negeri'),
(20233812, 'SD NEGERI CIBOGO', 'Dusun Cibogo', 'Kec. Ganeas', 'Sukaluyu', 'negeri'),
(20233813, 'SD NEGERI CIBUBUAN I', 'Dsn. Lencang', 'Kec. Conggeang', 'Cibubuan', 'negeri'),
(20233814, 'SD NEGERI CIBUBUAN II', 'Jln. Tarumanagara No. 57', 'Kec. Conggeang', 'Karanglayung', 'negeri'),
(20233815, 'SD NEGERI CIBUGEL', 'Dusun Simpaywargi', 'Kec. Cibugel', 'Jaya Mekar', 'negeri'),
(20233817, 'SD NEGERI CICADAS', 'Dusun Cicadas RT 01 RW 02', 'Kec. Cibugel', 'Cipasang', 'negeri'),
(20233818, 'SD NEGERI CIDEMPET', 'Dsn. Cidempet RT. 09/01', 'Kec. Conggeang', 'Cibeureuyeuh', 'negeri'),
(20233819, 'SD NEGERI CIDOMAS', 'Dusun Simpaywargi', 'Kec. Cibugel', 'Jaya Mekar', 'negeri'),
(20233820, 'SD NEGERI CIDUGING', 'Dusun Ciduging RT. 03 RW. 03', 'Kec. Darmaraja', 'Tarunajaya', 'negeri'),
(20233821, 'SD NEGERI CIEUNTEUNG', 'Jl. Raya Wado Sumedang Km. 25', 'Kec. Darmaraja', 'Cieunteung', 'negeri'),
(20233822, 'SD NEGERI CIGALAGAH', 'Dusun Cigalagah', 'Kec. Buahdua', 'Nagrak', 'negeri'),
(20233823, 'SD NEGERI CIGINTUNG', 'Dusun Cigintung', 'Kec. Cisitu', 'Cigintung', 'negeri'),
(20233824, 'SD NEGERI CIGOBANG', 'Dusun Cigobang', 'Kec. Ganeas', 'Cikondang', 'negeri'),
(20233825, 'SD NEGERI CIHIDEUNG', 'Dusun Cihideung', 'Kec. Jatigede', 'Kadujaya', 'negeri'),
(20233826, 'SD NEGERI CIJAHA', 'Dusun Sinarasa Rt 05/01', 'Kec. Cibugel', 'Cibugel', 'negeri'),
(20233827, 'SD NEGERI CIJEUNGJING I', 'Dusun Cijeungjing', 'Kec. Jatigede', 'Cijeungjing', 'negeri'),
(20233828, 'SD NEGERI CIJEUNGJING II', 'Dusun Kadu', 'Kec. Jatigede', 'Kadujaya', 'negeri'),
(20233829, 'SD NEGERI CIKAHURIPAN', 'Jl. Desa Cikahuripan No. 27', 'Kec. Cimanggung', 'Cikahuripan', 'negeri'),
(20233830, 'SD NEGERI CIKANDANG', 'Jalan Cikandang', 'Kec. Jatigede', 'Ciranggem', 'negeri'),
(20233831, 'SD NEGERI CIKEUSI I', 'Dusun Andir RT 04/01', 'Kec. Darmaraja', 'Cikeusi', 'negeri'),
(20233832, 'SD NEGERI CIKEUSI II', 'Dusun Andir', 'Kec. Darmaraja', 'Cikeusi', 'negeri'),
(20233833, 'SD NEGERI CIKOLE', 'Dusun Cikole', 'Kec. Cimalaka', 'Cikole', 'negeri'),
(20233834, 'SD NEGERI CIKONDANG II', 'Dusun Cikondang', 'Kec. Ganeas', 'Cikondang', 'negeri'),
(20233835, 'SD NEGERI CIKONDANG III', 'Dusun Batugara', 'Kec. Ganeas', 'Cikondang', 'negeri'),
(20233836, 'SD NEGERI CIKONENG I', 'Jln. Raden Umar Wirahadikusumah', 'Kec. Ganeas', 'CIKONENG KULON', 'negeri'),
(20233837, 'SD NEGERI CIKUDA', 'Jl. Cikuda No. 008', 'Kec. Jatinangor', 'Hegarmanah', 'negeri'),
(20233838, 'SD NEGERI SIRNASARI', 'Dusun Sukamulya RT. 01/03', 'Kec. Pamulihan', 'Ciptasari', 'negeri'),
(20233839, 'SD NEGERI CIKURUBUK', 'Dsn Cikurubuk Buahdua', 'Kec. Buahdua', 'Cikurubuk', 'negeri'),
(20233840, 'SD NEGERI CILAKU', 'Dusun Cilaku', 'Kec. Cimanggung', 'Tegalmanggung', 'negeri'),
(20233841, 'SD NEGERI CILANGKAP I', 'Dusun Babakan', 'Kec. Buahdua', 'Sekarwangi', 'negeri'),
(20233842, 'SD NEGERI CILANGKAP II', 'Dusun Cileungsing', 'Kec. Buahdua', 'Cilangkap', 'negeri'),
(20233843, 'SD NEGERI CILEUWEUNG', 'Jl. PRABU ANGKAWIJAYA KM. 01', 'Kec. Ganeas', 'Sukawening', 'negeri'),
(20233844, 'SD NEGERI CILIMBANGAN', 'Dusun Cilimbangan', 'Kec. Cimalaka', 'Naluk', 'negeri'),
(20233845, 'SD NEGERI CILOPANG', 'Dsn. Cilopang Hilir', 'Kec. Cisitu', 'Cilopang', 'negeri'),
(20233846, 'SD NEGERI CILUMPING', 'Dusun Cilumping', 'Kec. Buahdua', 'CIKURUBUK', 'negeri'),
(20233847, 'SD NEGERI CIMALAKA I', 'Dusun Lemburgedong', 'Kec. Cimalaka', 'Cimalaka', 'negeri'),
(20233848, 'SD NEGERI CIMALAKA II', 'Dusun Licin RT. 02 RW. 03', 'Kec. Cimalaka', 'Licin', 'negeri'),
(20233849, 'SD NEGERI CIMALAKA III', 'Jl. Alun-alun Cimalaka No. 11', 'Kec. Cimalaka', 'Cimalaka', 'negeri'),
(20233850, 'SD NEGERI CIMANGGUNG I', 'Jl. Cimanggung - Sindulang KM. 2', 'Kec. Cimanggung', 'Cimanggung', 'negeri'),
(20233851, 'SD NEGERI CIMANGGUNG II', 'Dusun Bendungan RT 02/03', 'Kec. Cimanggung', 'Cimanggung', 'negeri'),
(20233852, 'SD NEGERI CIMANGGUNG III', 'Dusun Awilega RT 01 RW 07 Desa Tegalmanggung Kec. Cimanggung Kab. Sumedang', 'Kec. Cimanggung', 'Tegalmanggung', 'negeri'),
(20233853, 'SD NEGERI CIMANGGUNG IV', 'Dusun Pedes', 'Kec. Cimanggung', 'Cimanggung', 'negeri'),
(20233854, 'SD NEGERI CIMARGA', 'Dusun Cipeundeuy', 'Kec. Cisitu', 'Cimarga', 'negeri'),
(20233855, 'SD NEGERI CIMUJA', 'Dusun Pasir Kubang', 'Kec. Cimalaka', 'Cimuja', 'negeri'),
(20233857, 'SD NEGERI CIPACING I', 'Dusun Nangkod', 'Kec. Jatinangor', 'Cipacing', 'negeri'),
(20233859, 'SD NEGERI CIPAREUAG', 'Dusun Cipareuag', 'Kec. Cimanggung', 'Sukadana', 'negeri'),
(20233860, 'SD NEGERI CIPASANG', 'Dusun Cipasang RT 04 RW 05', 'Kec. Cibugel', 'Cipasang', 'negeri'),
(20233861, 'SD NEGERI CIPATAT', 'Dusun Cipatat', 'Kec. Buahdua', 'Sekarwangi', 'negeri'),
(20233863, 'SD NEGERI CIPICUNG', 'Dusun Cipicung', 'Kec. Darmaraja', 'Darmajaya', 'negeri'),
(20233864, 'SD NEGERI CIRAYUN', 'Dusun Cirayun RT. 03 RW. 03', 'Kec. Jatinunggal', 'Banjarsari', 'negeri'),
(20233865, 'SD NEGERI CISALAK I', 'Jl. Desa Cisalak', 'Kec. Cisarua', 'Cisalak', 'negeri'),
(20233866, 'SD NEGERI CISALAK II', 'Dusun Pasirsoka', 'Kec. Cisarua', 'Kebonkalapa', 'negeri'),
(20233867, 'SD NEGERI CISALAK III', 'Dusun Cibolang', 'Kec. Cisarua', 'Kebonkalapa', 'negeri'),
(20233868, 'SD NEGERI CISALAK IV', 'Jl. Perum Cisalak Permai', 'Kec. Cisarua', 'Cisalak', 'negeri'),
(20233869, 'SD NEGERI CISEMA', 'Dusun Cisema Blok Hakulah', 'Kec. Darmaraja', 'Paku Alam', 'negeri'),
(20233870, 'SD NEGERI CISITU', 'Dusun Cisitu', 'Kec. Cisitu', 'Cisitu', 'negeri'),
(20233871, 'SD NEGERI CITALEUS I', 'Dusun Ciliang', 'Kec. Buahdua', 'Mekarmukti', 'negeri'),
(20233872, 'SD NEGERI CITALEUS II', 'Dusun Citunggul', 'Kec. Buahdua', 'Mekarmukti', 'negeri'),
(20233873, 'SD NEGERI CITIMUN I', 'Dusun Citimun', 'Kec. Cimalaka', 'Citimun', 'negeri'),
(20233874, 'SD NEGERI CITIMUN II', 'Dusun Sukatani RT. 01 RW. 06', 'Kec. Cimalaka', 'Citimun', 'negeri'),
(20233875, 'SD NEGERI CIUYAH I', 'Jl. Ardimanggala no.70', 'Kec. Cisarua', 'Cisarua', 'negeri'),
(20233876, 'SD NEGERI CIUYAH II', 'Jl.Ardimanggala No.50', 'Kec. Cisarua', 'Cisarua', 'negeri'),
(20233877, 'SD NEGERI CIUYAH III', 'Dusun Cihanja', 'Kec. Cisarua', 'Ciuyah', 'negeri'),
(20233878, 'SD NEGERI CONGGEANG I', 'Jln. Raya Conggeang-Sumedang', 'Kec. Conggeang', 'Conggeang Wetan', 'negeri'),
(20233879, 'SD NEGERI CONGGEANG II', 'Jl. Cibodas No. 4', 'Kec. Conggeang', 'Conggeang Kulon', 'negeri'),
(20233880, 'SD NEGERI CONGGEANG IV', 'Jl. Conggeang-Ujungjaya', 'Kec. Conggeang', 'Conggeang Wetan', 'negeri'),
(20233881, 'SD NEGERI CORENDA', 'Dusun Corenda', 'Kec. Cisitu', 'Situmekar', 'negeri'),
(20233882, 'SD NEGERI DARMARAJA I', 'Jalan Kaum No. 06', 'Kec. Darmaraja', 'Darmaraja', 'negeri'),
(20233883, 'SD NEGERI DARMARAJA II', 'Jalan Kaum No.19', 'Kec. Darmaraja', 'Darmaraja', 'negeri'),
(20233884, 'SD NEGERI DARMARAJA III', 'Jl. Cikondang', 'Kec. Darmaraja', 'Darmajaya', 'negeri'),
(20233885, 'SD NEGERI DARMARAJA IV', 'Jl. Sirnaraga Cikiray', 'Kec. Darmaraja', 'Darmaraja', 'negeri'),
(20233886, 'SD NEGERI DARONGDONG', 'Dusun Darongdong RT 02 RW 08', 'Kec. Buahdua', 'Buahdua', 'negeri'),
(20233887, 'SD NEGERI DAYEUHLUHUR', 'Dusun Dayeuhluhur', 'Kec. Ganeas', 'Dayeuh Luhur', 'negeri'),
(20233889, 'SD NEGERI GAJAHDEPA', 'Dusun Gajahdepa', 'Kec. Cimalaka', 'Galudra', 'negeri'),
(20233891, 'SD NEGERI GALUDRA', 'Jl. Desa Galudra', 'Kec. Cimalaka', 'Galudra', 'negeri'),
(20233892, 'SD NEGERI GANEAS I', 'Jl. Rd UMAR WIRAHADIKUSUMAH KM. 03', 'Kec. Ganeas', 'Ganeas', 'negeri'),
(20233893, 'SD NEGERI GANEAS II', 'Jl. Rd UMAR WIRAHADIKUSUMAH KM. 03', 'Kec. Ganeas', 'Ganeas', 'negeri'),
(20233894, 'SD NEGERI GENDEREH', 'Dusun Burujul', 'Kec. Buahdua', 'Gendereh', 'negeri'),
(20233895, 'SD NEGERI GUNUNGDATAR', 'Dusun Gunungdatar RT 03/05', 'Kec. Tanjungkerta', 'Gunturmekar', 'negeri'),
(20233896, 'SD NEGERI GUNUNGSANGIANG', 'Dusun Cidomas RT 03/03', 'Kec. Cibugel', 'Buana Mekar', 'negeri'),
(20233897, 'SD NEGERI HARIANG', 'Dusun Hariang', 'Kec. Buahdua', 'Hariang', 'negeri'),
(20233899, 'SD NEGERI JAMBU', 'Dusun Cigagak', 'Kec. Cisarua', 'Cipandanwangi', 'negeri'),
(20233900, 'SD NEGERI JATIBUNGUR', 'Dusun Cisoka', 'Kec. Wado', 'Cisurat', 'negeri'),
(20233901, 'SD NEGERI JATINANGOR', 'Dusun Caringin', 'Kec. Jatinangor', 'Sayang', 'negeri'),
(20233902, 'SD NEGERI JATIPUTRI', 'Dusun Jatiputri', 'Kec. Cisitu', 'Cilopang', 'negeri'),
(20233903, 'SD NEGERI JATIROKE II', 'Jl. Letda Lukito No. 90', 'Kec. Jatinangor', 'Jatiroke', 'negeri'),
(20233905, 'SD NEGERI KAMENTENG', 'Dusun Kamenteng No. 62', 'Kec. Darmaraja', 'Cieunteung', 'negeri'),
(20233907, 'SD NEGERI KARANGBUNGUR', 'Karangbungur', 'Kec. Buahdua', 'Karangbungur', 'negeri'),
(20233908, 'SD NEGERI KARANGNANGKA I', 'Dusun Babakanjati', 'Kec. Situraja', 'Karangheuleut', 'negeri'),
(20233909, 'SD NEGERI KARANGPAWULANG', 'Dusun Sukamaju', 'Kec. Cimalaka', 'Trunamanggala', 'negeri'),
(20233910, 'SD NEGERI KAWUNGLUWUK', 'Jln. Desa Conggeang Kulon', 'Kec. Conggeang', 'Conggeang Kulon', 'negeri'),
(20233911, 'SD NEGERI KAWUNGLUWUK I', 'Dusun Kawungluwuk', 'Kec. Cisitu', 'Linggajaya', 'negeri'),
(20233912, 'SD NEGERI KAWUNGLUWUK II', 'Dusun Kucing', 'Kec. Cisitu', 'Linggajaya', 'negeri'),
(20233913, 'SD NEGERI KEBONBUAH', 'Dusun Kebonbuah', 'Kec. Darmaraja', 'Darmajaya', 'negeri'),
(20233914, 'SD NEGERI KEBONKOPI', 'Dusun Cilembu', 'Kec. Darmaraja', 'Paku Alam', 'negeri'),
(20233916, 'SD NEGERI KURNIA', 'Dusun Cipasang RT 03 RW 05', 'Kec. Cibugel', 'Cipasang', 'negeri'),
(20233917, 'SD NEGERI LEBAKGEDE', 'Dusun Lebakgede RT. 04/11', 'Kec. Cimanggung', 'Sindanggalih', 'negeri'),
(20233919, 'SD NEGERI LEUWIHIEUM', 'Dusun Leuwihieum', 'Kec. Jatigede', 'Lebaksiuh', 'negeri'),
(20233920, 'SD NEGERI LEUWILIANG', 'Dusun Leuwiliang', 'Kec. Cimanggung', 'Sindulang', 'negeri'),
(20233921, 'SD NEGERI LICIN', 'Jl. Panteneun', 'Kec. Cimalaka', 'Licin', 'negeri'),
(20233922, 'SD NEGERI LINGGASARI', 'Dusun Campaka Kaler RT 03 RW 04', 'Kec. Cisitu', 'Sundamekar', 'negeri'),
(20233923, 'SD NEGERI MALANGBONG', 'Dusun Malangbong', 'Kec. Cimalaka', 'Serang', 'negeri'),
(20233924, 'SD NEGERI MALINGPING', 'Dusun Malingping', 'Kec. Cisitu', 'Situmekar', 'negeri'),
(20233925, 'SD NEGERI MANDALAHERANG I', 'Dusun Gelembung', 'Kec. Cimalaka', 'Mandalaherang', 'negeri'),
(20233926, 'SD NEGERI MANDALAHERANG II', 'Dusun Cicelot', 'Kec. Cimalaka', 'Mandalaherang', 'negeri'),
(20233927, 'SD NEGERI MANDALAHERANG III', 'Jl. Bukit Nyampay', 'Kec. Cimalaka', 'Mandalaherang', 'negeri'),
(20233928, 'SD NEGERI MARGAASIH', 'Dsn. Tenjolaut', 'Kec. Conggeang', 'Padaasih', 'negeri'),
(20233930, 'SD NEGERI WARGALUYU', 'Dsn. Citendo RT. 04/01', 'Kec. Ganeas', 'Sukaluyu', 'negeri'),
(20233931, 'SD NEGERI MARGAMUKTI', 'Margamukti No.25', 'Kec. Cimalaka', 'Licin', 'negeri'),
(20233933, 'SD NEGERI MARGAMULYA', 'Dusun Ciparuang', 'Kec. Cimanggung', 'Mangunarga', 'negeri'),
(20233934, 'SD NEGERI MARGAMULYA', 'Dusun Binong RT. 04 RW.. 08', 'Kec. Sumedang Utara', 'Sirnamulya', 'negeri'),
(20233937, 'SD NEGERI MEKARJAYA', 'Dusun Bobojong', 'Kec. Conggeang', 'Narimbang', 'negeri'),
(20233938, 'SD NEGERI MEKARSARI', 'Dusun Pasirhuni RT 01/08', 'Kec. Rancakalong', 'Cibungur', 'negeri'),
(20233939, 'SD NEGERI MULYASARI', 'Dusun Mulyasari', 'Kec. Cimalaka', 'Padasari', 'negeri'),
(20233940, 'SD NEGERI MUNJUL', 'Dusun Munjul RT. 06/03', 'Kec. Darmaraja', 'Sukamenak', 'negeri'),
(20233942, 'SD NEGERI NAGRAK I', 'Dusun Nagrak', 'Kec. Buahdua', 'NAGRAK', 'negeri'),
(20233943, 'SD NEGERI NAGRAK II', 'Dusun Manyintreuk', 'Kec. Buahdua', 'Panyindangan', 'negeri'),
(20233945, 'SD NEGERI NARIMBANG I', 'Jl. Raya Conggeang-Sumedang No.16', 'Kec. Conggeang', 'Jambu', 'negeri'),
(20233946, 'SD NEGERI NARIMBANG II', 'Dsn. Bobojong', 'Kec. Conggeang', 'Narimbang', 'negeri'),
(20233949, 'SD NEGERI NYALINDUNG II', 'Dusun Babakan Pedes', 'Kec. Cimalaka', 'Trunamanggala', 'negeri'),
(20233950, 'SD NEGERI PABUARAN', 'Jln. Batu Dua Perum Relokasi Linggajaya', 'Kec. Cisitu', 'Linggajaya', 'negeri'),
(20233951, 'SD NEGERI PAGELARAN', 'Dusun Cisetra RT 05 RW 01', 'Kec. Cibugel', 'Sukaraja', 'negeri'),
(20233952, 'SD NEGERI PALASAH', 'Asrama Yonif 301/PKS', 'Kec. Cimalaka', 'Citimun', 'negeri'),
(20233953, 'SD NEGERI PAMEULAH', 'Dusun Karangsari', 'Kec. Cisarua', 'Bantarmara', 'negeri'),
(20233954, 'SD NEGERI PANGLUYU', 'Dusun Pangjeleran', 'Kec. Cisitu', 'Cigintung', 'negeri'),
(20233955, 'SD NEGERI PANGSOR', 'Jl. Cihanjuang No. 7', 'Kec. Cimanggung', 'Cihanjuang', 'negeri'),
(20233956, 'SD NEGERI PANORAMA', 'Dusun Sarmaja RT. 01 RW. 02', 'Kec. Cimalaka', 'Nyalindung', 'negeri'),
(20233957, 'SD NEGERI PARAKANMUNCANG I', 'Jl. Parakanmuncang', 'Kec. Cimanggung', 'Sindangpakuon', 'negeri'),
(20233958, 'SD NEGERI PARAKANMUNCANG II', 'Dusun Sindangkasih RT 03/08', 'Kec. Cimanggung', 'Sindangpakuon', 'negeri'),
(20233959, 'SD NEGERI PARAKANMUNCANG III', 'Dusun Taneuhbeureum', 'Kec. Cimanggung', 'Sindangpakuon', 'negeri'),
(20233960, 'SD NEGERI PARAKANPANJANG', 'Dusun Parakanpanjang RT 03 RW 07', 'Kec. Cibugel', 'Cipasang', 'negeri'),
(20233961, 'SD NEGERI PARIPURNA', 'Dusun Cibungur RT. 13/05', 'Kec. Jatinangor', 'Cinta Mulya', 'negeri'),
(20233962, 'SD NEGERI PASIRIPIS', 'Dusun Pasiripis', 'Kec. Buahdua', 'Karangbungur', 'negeri'),
(20233963, 'SD NEGERI PATARUMAN', 'Dusun Cinaglang RT. 03/02', 'Kec. Darmaraja', 'Neglasari', 'negeri'),
(20233964, 'SD NEGERI RAHARJA', 'Dusun Gendereh', 'Kec. Buahdua', 'GENDEREH', 'negeri'),
(20233965, 'SD NEGERI RANGGON', 'Dusun Kapunduhan', 'Kec. Darmaraja', 'Ranggon', 'negeri'),
(20233966, 'SD NEGERI RANJENG', 'Dusun Bakan Asem', 'Kec. Cisitu', 'Ranjeng', 'negeri'),
(20233968, 'SD NEGERI SADANGSARI', 'Ranjeng', 'Kec. Cisitu', 'Ranjeng', 'negeri'),
(20233969, 'SD NEGERI SALAMJAJAR', 'Dusun Pajagan', 'Kec. Cisitu', 'Pajagan', 'negeri'),
(20233970, 'SD NEGERI SAMPORA', 'Dusun Sampora', 'Kec. Tanjungkerta', 'AWILEGA', 'negeri'),
(20233971, 'SD NEGERI SANEPA', 'Dusun Cigalagah Girang', 'Kec. Buahdua', 'CILANGKAP', 'negeri'),
(20233972, 'SD NEGERI SANTAKA', 'Dusun Santaka', 'Kec. Cimanggung', 'Mangunarga', 'negeri'),
(20233973, 'SD NEGERI SARANG TENGAH', 'Dusun Cipeureu RT 02 RW 01', 'Kec. Cibugel', 'Buana Mekar', 'negeri'),
(20233974, 'SD NEGERI SAWAHDADAP I', 'Jl. Desa Sawahdadap', 'Kec. Cimanggung', 'Sawahdadap', 'negeri');
INSERT INTO `daftar_sd` (`NPSN`, `Nama_Sekolah`, `Alamat`, `Kecamatan`, `Kelurahan`, `Status`) VALUES
(20233975, 'SD NEGERI SAWAHDADAP II', 'Dusun Babakan Kananga', 'Kec. Cimanggung', 'Sawahdadap', 'negeri'),
(20233976, 'SD NEGERI SAWAHDADAP III', 'Dusun Pasung', 'Kec. Cimanggung', 'Sawahdadap', 'negeri'),
(20233977, 'SD NEGERI SAYANG', 'Jl. Kol. Achmad Syam No. 227', 'Kec. Jatinangor', 'Sayang', 'negeri'),
(20233978, 'SD NEGERI SINARJATI', 'Dusun Jatisari', 'Kec. Jatinangor', 'Jatiroke', 'negeri'),
(20233979, 'SD NEGERI SINDANG', 'Dusun Sindang RT. 01/03', 'Kec. Surian', 'Surian', 'negeri'),
(20233980, 'SD NEGERI SINDULANG', 'Dusun Ciseupan RT. 03/04', 'Kec. Cimanggung', 'Sindulang', 'negeri'),
(20233981, 'SD NEGERI SIRNAGALIH', 'Dusun Sirnagalih', 'Kec. Jatinangor', 'Mekargalih', 'negeri'),
(20233982, 'SD NEGERI SUDAPATI', 'Dusun Sudapati', 'Kec. Cisitu', 'Pajagan', 'negeri'),
(20233983, 'SD NEGERI SUKAHAJI', 'Dusun Cileuweung RT 03/05', 'Kec. Darmaraja', 'Tarunajaya', 'negeri'),
(20233985, 'SD NEGERI SUKALERANG I', 'Dusun Cikole', 'Kec. Cimalaka', 'Cikole', 'negeri'),
(20233986, 'SD NEGERI SUKALERANG II', 'Dusun Serang', 'Kec. Cimalaka', 'Serang', 'negeri'),
(20233987, 'SD NEGERI SUKALUYU', 'Dusun Sukaluyu', 'Kec. Sumedang Utara', 'Girimukti', 'negeri'),
(20233990, 'SD NEGERI SUKARAJA', 'Dusun Cibanen RT 04 RW 03', 'Kec. Cibugel', 'Sukaraja', 'negeri'),
(20233992, 'SD NEGERI SURIAN', 'Dusun Surian Kulon RT. 02/04', 'Kec. Surian', 'Surian', 'negeri'),
(20233993, 'SD NEGERI TALAGADATAR', 'Dusun Talagadatar', 'Kec. Jatigede', 'Cintajaya', 'negeri'),
(20233995, 'SD NEGERI TANJUNGSIANG', 'Jl. Pangsor No 03', 'Kec. Cimanggung', 'Sukadana', 'negeri'),
(20233997, 'SD NEGERI TALAGAMUKTI', 'Dusun Citalaga RT. 02/04', 'Kec. Jatinangor', 'Jatimukti', 'negeri'),
(20234001, 'SD NEGERI UNGKAL', 'Dsn. Sukaluyu RT. 02/01', 'Kec. Conggeang', 'Ungkal', 'negeri'),
(20234002, 'SD AL MASOEM FULL DAY', 'Jl. Raya Cipacing No. 22', 'Kec. Jatinangor', 'Cipacing', 'swasta'),
(20234003, 'SD FATIMAH AZ-ZAHRA', 'Perum Parakan Muncang Blko A4 No 90-91', 'Kec. Cimanggung', 'CIHANJUANG', 'swasta'),
(20234004, 'SD ISLAM TERPADU IMAM BUKHARI', 'Jl. Caringin-Jatinangor Km. 20,5 Komp.PPM Fi Zhilal Al-Quran', 'Kec. Jatinangor', 'Sayang', 'swasta'),
(20234005, 'SD PLUS SYANIA', 'Perum SBG Parakanmuncang Blok A6 No 26-28', 'Kec. Cimanggung', 'Cihanjuang', 'swasta'),
(20235367, 'SD NEGERI CIKURUBUK', 'Jalan Desa Cimara No. 47', 'Kec. Cisarua', 'Cimara', 'negeri'),
(20235384, 'SD NEGERI CINANGSI', 'Ds. Citaleus', 'Kec. Buahdua', 'Citaleus', 'negeri'),
(20235390, 'SD NEGERI CIPEUTEUY', 'Dusun Kebonjambe', 'Kec. Darmaraja', 'Cipeuteuy', 'negeri'),
(20235469, 'SD NEGERI NAGRAK', 'Dusun Kebonkopi RT 07 RW 02', 'Kec. Cibugel', 'Sukaraja', 'negeri'),
(20235472, 'SD NEGERI NANGGERANG', 'Jl. Pasirbaki RT 03/05 Banyuresmi', 'Kec. Sukasari', 'Banyuresmi', 'negeri'),
(20235475, 'SD NEGERI NEGLASARI', 'Dusun Neglasari RT. 01/06', 'Kec. Conggeang', 'Babakan Asem', 'negeri'),
(20235476, 'SD NEGERI NYALINDUNG I', 'Dusun Babakan Pedes', 'Kec. Cimalaka', 'Trunamanggala', 'negeri'),
(20235512, 'SD NEGERI SUKAJAYA', 'Dusun Cisasak', 'Kec. Cisitu', 'Pajagan', 'negeri'),
(20235516, 'SD NEGERI SUKAMANAH', 'Jl. Pagarbetis No. 229A', 'Kec. Sumedang Selatan', 'Baginda', 'negeri'),
(20235517, 'SD NEGERI SUKANAGARA', 'Dusun Cipaok RT. 04/02', 'Kec. Darmaraja', 'Tarunajaya', 'negeri'),
(20235519, 'SD NEGERI SUKARATU', 'Dusun Cipeundeuy', 'Kec. Darmaraja', 'Sukaratu', 'negeri'),
(20235522, 'SD NEGERI TANJUNGJAYA', 'Dusun Bakom', 'Kec. Cisitu', 'Linggajaya', 'negeri'),
(20246336, 'SD NEGERI BABAKAN', 'Dusun Babakan', 'Kec. Rancakalong', 'Sukasirnarasa', 'negeri'),
(20246337, 'SD NEGERI CIAWI', 'Dusun Ciawi', 'Kec. Jatigede', 'Cisampih', 'negeri'),
(20246339, 'SD NEGERI CIKANDANG', 'Jl. Cikandang', 'Kec. Tanjungsari', 'Cinanjung', 'negeri'),
(20246340, 'SD NEGERI CILANGKAP', 'Dusun Pasirhurip', 'Kec. Wado', 'Sukajadi', 'negeri'),
(20246341, 'SD NEGERI CIMUNGKAL', 'Dusun Cimungkal', 'Kec. Wado', 'Cimungkal', 'negeri'),
(20246342, 'SD NEGERI CIPELES', 'Dusun Babakan', 'Kec. Tomo', 'Cipeles', 'negeri'),
(20246344, 'SD NEGERI KARANGMULYA', 'Dusun Mulyasari', 'Kec. Sumedang Selatan', 'Ciherang', 'negeri'),
(20246346, 'SD NEGERI MARGACINTA', 'Dusun Margacinta', 'Kec. Sumedang Selatan', 'Margamekar', 'negeri'),
(20246348, 'SD NEGERI MULYASARI', 'Dusun Patenggeng RT 03/09', 'Kec. Sukasari', 'Sukasari', 'negeri'),
(20246349, 'SD NEGERI NEGLASARI', 'Dusun Nanggerang', 'Kec. Sukasari', 'Nanggerang', 'negeri'),
(20246350, 'SD NEGERI PADASUKA', 'Dusun Padasuka RT 01/06', 'Kec. Sukasari', 'Mekarsari', 'negeri'),
(20246351, 'SD NEGERI PALASARI', 'Jl. Pangeran Sugih No. 23', 'Kec. Sumedang Selatan', 'Kotakulon', 'negeri'),
(20246352, 'SD NEGERI SAMPORA', 'Dsn. Sampora', 'Kec. Buahdua', 'Ciawitali', 'negeri'),
(20246353, 'SD NEGERI SUKAMAJU', 'Dusun Cimacan', 'Kec. Rancakalong', 'Pamekaran', 'negeri'),
(20246354, 'SD NEGERI SUKAMULYA', 'Jl Sukamulya', 'Kec. Paseh', 'Paseh Kidul', 'negeri'),
(20246355, 'SD NEGERI SUKAMULYA', 'Dusun Pasirmuncang', 'Kec. Sukasari', 'Genteng', 'negeri'),
(20246356, 'SD NEGERI SUKARESMI', 'Dusun Sukaresmi', 'Kec. Tomo', 'Tolengas', 'negeri'),
(20246357, 'SD NEGERI SUKASARI', 'Jl. Lemburtengah Patrol', 'Kec. Cibugel', 'Jayamandiri', 'negeri'),
(20246358, 'SD NEGERI SUKAWANGI', 'Dusun Ciakar RT 02/07', 'Kec. Rancakalong', 'Sukamaju', 'negeri'),
(20246359, 'SD NEGERI TANJUNG', 'Dusun Songgom RT. 04/01', 'Kec. Surian', 'Tanjung', 'negeri'),
(20247262, 'SD IT AS SAMADANI', 'Jl. Prabu Geusan Ulun No. 21', 'Kec. Sumedang Selatan', 'Regol Wetan', 'swasta'),
(20251794, 'SD NEGERI CIPELANG', 'Dusun Mareleng', 'Kec. Ujungjaya', 'Cipelang', 'negeri'),
(20251838, 'SD NEGERI PALASARI', 'Dusun Palasari RT. 01/04', 'Kec. Jatinunggal', 'Cimanintin', 'negeri'),
(20251841, 'SD NEGERI KARANGANYAR', 'Dusun Karanganyar', 'Kec. Darmaraja', 'Karang Pakuan', 'negeri'),
(20251842, 'SD NEGERI MARGALUYU', 'Dusun Cipeuteuy', 'Kec. Cisitu', 'Cisitu', 'negeri'),
(20251843, 'SD NEGERI NANGGERANG', 'DUSUN NANGGERANG', 'Kec. Cisitu', 'Cinangsi', 'negeri'),
(20251844, 'SD NEGERI MARGAMULYA', 'Dsn. Cibogo RT. 03/07', 'Kec. Conggeang', 'Padaasih', 'negeri'),
(20251846, 'SD NEGERI CINANGGERANG II', 'Dusun Cinanggerang RT. 03/04', 'Kec. Pamulihan', 'Cinanggerang', 'negeri'),
(20251865, 'SD NEGERI SUKAMANAH', 'Jl. Raya Darmaraja', 'Kec. Darmaraja', 'Cieunteung', 'negeri'),
(20251867, 'SD NEGERI LEBAKGEDE', 'Dusun Cikupa RT 01/07', 'Kec. Tanjungsari', 'Gudang', 'negeri'),
(20251868, 'SD NEGERI CIAWI', 'Jl. Kolonel Achmad Syam No 46B', 'Kec. Jatinangor', 'Cikeruh', 'negeri'),
(20251869, 'SD NEGERI SUKAMULYA', 'Dusun Panyingkiran', 'Kec. Tanjungmedar', 'Cikaramas', 'negeri'),
(20251945, 'SD NEGERI SIRNAMANAH', 'Dusun Cibawang RT 03/09', 'Kec. Rancakalong', 'Sukasirnarasa', 'negeri'),
(20251946, 'SD NEGERI SUKAMULYA', 'Jl. Bojongtotor', 'Kec. Sumedang Utara', 'Sirnamulya', 'negeri'),
(20251947, 'SD NEGERI SUKAMAJU', 'Jl. Dano No. 02', 'Kec. Sumedang Utara', 'Kotakaler', 'negeri'),
(20251949, 'SD NEGERI HEGARMANAH', 'Jl. PRABU ANGKAWIJAYA KM. 02', 'Kec. Ganeas', 'Sukawening', 'negeri'),
(20251950, 'SD NEGERI CIBUNGUR', 'Dusun Cibungur', 'Kec. Ganeas', 'Tanjunghurip', 'negeri'),
(20251953, 'SD NEGERI NEGLASARI', 'Dsn Neglasari RT 04 RW 02', 'Kec. Tanjungmedar', 'Wargaluyu', 'negeri'),
(20251954, 'SD NEGERI SUKAMUKTI', 'Dusun Cilutung', 'Kec. Tanjungmedar', 'Kertamukti', 'negeri'),
(20251955, 'SD NEGERI NEGLASARI', 'Jl. Raya Tomo', 'Kec. Tomo', 'Tomo', 'negeri'),
(20251956, 'SD NEGERI KANANGA', 'Dusun Cikeruh', 'Kec. Jatinangor', 'Cikeruh', 'negeri'),
(20251957, 'SD NEGERI MEKARSARI', 'Jl. Kol. Achmad Syam No. 230', 'Kec. Jatinangor', 'Sayang', 'negeri'),
(20252991, 'SD NEGERI KARANGMULYA', 'Dusun Cipeundeuy RT. 01/02', 'Kec. Jatinangor', 'Cilayung', 'negeri'),
(20253119, 'SD NEGERI MARGAMULYA', 'Dusun Margamulya', 'Kec. Cimalaka', 'Cimalaka', 'negeri'),
(20254623, 'SD ISLAM TERPADU ASMAUL HUSNA', 'Perum Tanjungsari Blok GA 16 - 18', 'Kec. Tanjungsari', 'Raharja', 'swasta'),
(20268859, 'SD IT INSAN SEJAHTERA', 'Perum Kampung Toga Blok G No. 1', 'Kec. Sumedang Selatan', 'Sukajaya', 'swasta'),
(20270577, 'SD INTERNASIONAL GREEN SCHOOL', 'Kampung Cisagasari', 'Kec. Sumedang Utara', 'Rancamulya', 'swasta'),
(60726341, 'SD DARUL FAIZIN', 'Dusun Cikalong RT 01 RW 01', 'Kec. Tomo', 'Tomo', 'swasta'),
(69759857, 'SD NEGERI TANJUNGSARI II', 'Dusun Depok No. 09 R 05/03', 'Kec. Tanjungsari', 'Jatisari', 'negeri'),
(69759858, 'SD NEGERI TONJONG', 'Dusun Tonjong', 'Kec. Buahdua', 'Hariang', 'negeri'),
(69759859, 'SD NEGERI SUKAHURIP', 'Dusun Sukahurip', 'Kec. Pamulihan', 'Cijeruk', 'negeri'),
(69759860, 'SD NEGERI NEGLASARI', 'Dusun Cilimus', 'Kec. Situraja', 'Mekarmulya', 'negeri'),
(69888980, 'SD ISLAM TERPADU BINTANG GEMILANG', 'Jl Raya Legok Conggeang 213a Tagog', 'Kec. Conggeang', 'Cibeureuyeuh', 'swasta'),
(69913450, 'SDS Pasirgede', 'Dusun Pasirgede', 'Kec. Pamulihan', 'Cimarias', 'swasta'),
(69938255, 'SD IT IMAM SYAFI I', 'Dusun Cilembu II RT02 RW11 Pamulihan Sumedang', 'Kec. Pamulihan', 'Cilembu', 'swasta'),
(69948472, 'SD ISLAM TERPADU KHAIRA UMMAH', 'KOMPLEK GRIYA JATINANGOR II RT 06/14', 'Kec. Tanjungsari', 'Cinanjung', 'swasta'),
(69956772, 'SD INKLUSI AZADDY AL-GHOZALI', 'Perum Taman Bukit makmur Blok MC No. 1-2', 'Kec. Jatinangor', 'Cisempur', 'swasta'),
(69959455, 'SD AR RAFI BHS SUMEDANG', 'Jl. Prabu Tajimalela No 68 RT 04/13', 'Kec. Sumedang Utara', 'Kotakaler', 'swasta'),
(69960175, 'SD SEKOLAH ALAM JATINANGOR', 'Kompleks Al Assakir Islamic Center Jl. Kol. Achmad Syam No. 62', 'Kec. Jatinangor', 'Cikeruh', 'swasta'),
(69981207, 'SD Islam Terpadu Hubbul Qur an', 'Dusun Jambu Tegal', 'Kec. Conggeang', 'Jambu', 'swasta'),
(69989422, 'SD IT DAARUL HUDA', 'Jl. Daya Taruna No. 24', 'Kec. Tanjungsari', 'Jatisari', 'swasta'),
(70005988, 'SD PLUS AHMAD DAHLAN', 'Jln Dano No. 88 Dusun Babakan Hurip RT 03 RW 13', 'Kec. Sumedang Utara', 'Kotakaler', 'swasta'),
(70009724, 'SD PUSDAI SUMEDANG', 'Jl. Kutamaya No. 25 Komp Islamic center', 'Kec. Sumedang Selatan', 'Kotakulon', 'swasta'),
(70011933, 'SD IT KAYYATAL JIHAAZ', 'Dusun Mariuk RT 3 RW 1', 'Kec. Tanjungsari', 'Margaluyu', 'swasta');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_smp`
--

CREATE TABLE `daftar_smp` (
  `NPSN` int(11) NOT NULL,
  `Nama_Sekolah` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kecamatan` varchar(100) NOT NULL,
  `Kelurahan` varchar(100) NOT NULL,
  `Status` enum('swasta','negeri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_smp`
--

INSERT INTO `daftar_smp` (`NPSN`, `Nama_Sekolah`, `Alamat`, `Kecamatan`, `Kelurahan`, `Status`) VALUES
(20208405, 'SMP NEGERI 1 PAMULIHAN', 'Jalan Simpang', 'Kec. Pamulihan', 'Haurngombong', 'negeri'),
(20208406, 'SMP NEGERI 1 RANCAKALONG', 'Jl. Rancakalong - Sumedang', 'Kec. Rancakalong', 'Nagarawangi', 'negeri'),
(20208412, 'SMP NEGERI 1 SURIAN', 'Jl. Surianata No.134', 'Kec. Surian', 'Suria Medal', 'negeri'),
(20208413, 'SMP NEGERI 1 JATINUNGGAL', 'Jalan Desa Cipeundeuy Dusun Cipeundeuy Kidul Kec. Jatinunggal', 'Kec. Jatinunggal', 'Cipeundeuy', 'negeri'),
(20208415, 'SMP PGRI 1 Jatinangor', 'Jl. Bandung-sumedang Km.22', 'Kec. Jatinangor', 'Hegarmanah', 'swasta'),
(20208416, 'SMP NEGERI 1 SITURAJA', 'Jl. Alun-alun Situraja', 'Kec. Situraja', 'Situraja', 'negeri'),
(20208417, 'SMP NEGERI 2 SUMEDANG', 'Jln. Parigi Lama Karapyak By. Pass', 'Kec. Sumedang Utara', 'Situ', 'negeri'),
(20208427, 'SMP NEGERI 1 SUKASARI', 'Jl. Genteng Km 3 Sukasari', 'Kec. Sukasari', 'Sukasari', 'negeri'),
(20208428, 'SMP NEGERI 1 SUMEDANG', 'Jl. Kebonkol No.18', 'Kec. Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208429, 'SMP NEGERI 6 SUMEDANG', 'Jalan Panunjang', 'Kec. Sumedang Utara', 'Padasuka', 'negeri'),
(20208430, 'SMP NEGERI 7 SUMEDANG', 'Jl. Pangeran Kornel Km.3,6', 'Kec. Sumedang Selatan', 'PASANGGRAHAN BARU', 'negeri'),
(20208431, 'SMP NEGERI 8 SUMEDANG', 'Jl. By Pass Mekarsari Sumedang', 'Kec. Sumedang Utara', 'Mekarjaya', 'negeri'),
(20208432, 'SMP PLUS AL AQSHA', 'Jl. Raya Cibeusi No.2', 'Kec. Jatinangor', 'Cibeusi', 'swasta'),
(20208433, 'SMP AL MASOEM', 'Jl Raya Cipacing No.22', 'Kec. Jatinangor', 'Cipacing', 'swasta'),
(20208434, 'SMP DARUL FATWA', 'Jl. Jatiroke No.85', 'Kec. Jatinangor', 'Jatiroke', 'swasta'),
(20208435, 'SMP NEGERI 1 JATINANGOR', 'Jl. Raya Bandung - Sumedang Km.22 No. 241', 'Kec. Jatinangor', 'Hegarmanah', 'negeri'),
(20208436, 'SMP NEGERI 1 PASEH', 'Jl. Pajajaran No. 148', 'Kec. Paseh', 'Legok Kidul', 'negeri'),
(20208437, 'SMP NEGERI 1 UJUNGJAYA', 'Jalan Jaladustan No. 29', 'Kec. Ujungjaya', 'Ujungjaya', 'negeri'),
(20208438, 'SMP NEGERI 2 PASEH', 'Jalan Sukamulya, Paseh Kidul', 'Kec. Paseh', 'Paseh Kidul', 'negeri'),
(20208439, 'SMP NEGERI 2 UJUNGJAYA', 'Jl. Raya Cijelag - Cikamurang Km.18', 'Kec. Ujungjaya', 'Cibuluh', 'negeri'),
(20208440, 'SMP MUHAMMADIYAH TANJUNGSARI', 'Jl. Raya Tanjungsari No. 189', 'Kec. Tanjungsari', 'Jatisari', 'swasta'),
(20208441, 'SMP NU SUMEDANG', 'Jalan Prabu Geusan Ulun 21', 'Kec. Sumedang Selatan', 'Regol Wetan', 'swasta'),
(20208442, 'SMP PASUNDAN TANJUNGSARI', 'Jl.raya Tanjungsari No.402', 'Kec. Tanjungsari', 'Gudang', 'swasta'),
(20208445, 'SMP KARSA MADYA-YKM', 'Jl.raya Tanjungsari No.398', 'Kec. Tanjungsari', 'Gudang', 'swasta'),
(20208446, 'SMP NEGERI 3 WADO', 'Jl. Desa Ganjaresik - Wado - Sumedang', 'Kec. Wado', 'Ganjaresik', 'negeri'),
(20208447, 'SMP NEGERI 5 SUMEDANG', 'Jl. Angkrek No.35', 'Kec. Sumedang Utara', 'Situ', 'negeri'),
(20208448, 'SMP NEGERI 4 SUMEDANG', 'Jl. Pangeran Suriaatmaja 12', 'Kec. Sumedang Selatan', 'Kota Kulon', 'negeri'),
(20208449, 'SMP NEGERI 1 TANJUNGMEDAR', 'Jl. Sindangsari No. 10', 'Kec. Tanjungmedar', 'Jingkang', 'negeri'),
(20208450, 'SMP NEGERI 1 TANJUNGKERTA', 'Jl. Kaum No. 2 Tanjungkerta', 'Kec. Tanjungkerta', 'Kertamekar', 'negeri'),
(20208451, 'SMP NEGERI 1 TANJUNGSARI', 'Jl Raya Tanjungsari No 349', 'Kec. Tanjungsari', 'Gudang', 'negeri'),
(20208452, 'SMP NEGERI 1 TOMO', 'Jl. Raya Tomo Km.32,3 Sumedang', 'Kec. Tomo', 'Tolengas', 'negeri'),
(20208453, 'SMP NEGERI 1 WADO', 'Jl. Raya Wado - Malangbong KM 01', 'Kec. Wado', 'Wado', 'negeri'),
(20208454, 'SMP NEGERI 2 JATINANGOR', 'Jl. Letda Lukito Cisempur - Jatinangor', 'Kec. Jatinangor', 'Cisempur', 'negeri'),
(20208455, 'SMP NEGERI 2 RANCAKALONG', 'Jalan Cimanglid', 'Kec. Rancakalong', 'Pasir Biru', 'negeri'),
(20208457, 'SMP NEGERI 2 TANJUNGKERTA', 'Jl. Sukamantri', 'Kec. Tanjungkerta', 'Tanjungmekar', 'negeri'),
(20208458, 'SMP NEGERI 2 TANJUNGSARI', 'Pacuan Kuda Tanjungsari', 'Kec. Tanjungsari', 'Jatisari', 'negeri'),
(20208459, 'SMP NEGERI 2 TOMO', 'Jalan Desa Darmawangi', 'Kec. Tomo', 'Darmawangi', 'negeri'),
(20208460, 'SMP NEGERI 3 JATINANGOR', 'Jl. Bumi Perkemahan Kiarapayung', 'Kec. Jatinangor', 'Cilayung', 'negeri'),
(20208461, 'SMP NEGERI 2 SITURAJA', 'Jl. Situraja - Cikadu No.31', 'Kec. Situraja', 'Mekarmulya', 'negeri'),
(20208462, 'SMP NEGERI 3 SUMEDANG', 'Jalan Dr Saleh 08 Sumedang', 'Kec. Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20208463, 'SMP NEGERI 3 TANJUNGSARI', 'Jalan Desa Kadakajaya Km.06 Tanjungsari', 'Kec. Tanjungsari', 'Kadakajaya', 'negeri'),
(20208464, 'SMP NEGERI 2 WADO', 'Jl. Raya Wado - Malangbong', 'Kec. Wado', 'Cilengkrang', 'negeri'),
(20208465, 'SMP NEGERI 4 SITURAJA', 'Jalan Cijeler', 'Kec. Situraja', 'Cijeler', 'negeri'),
(20208466, 'SMP NEGERI 1 GANEAS', 'Jl. Dayeuhluhur Km.1 Ganeas', 'Kec. Ganeas', 'Sukawening', 'negeri'),
(20234044, 'SMP 11 APRIL SUMEDANG', 'Pagerbetis KM 03', 'Kec. Sumedang Selatan', 'Baginda', 'swasta'),
(20234050, 'SMP NEGERI 1 CIBUGEL', 'Jl. Cibugel - Cipasang', 'Kec. Cibugel', 'Cibugel', 'negeri'),
(20234053, 'SMP NEGERI 1 CISARUA', 'Jl. Ardimanggala - Cisarua', 'Kec. Cisarua', 'Cisarua', 'negeri'),
(20234054, 'SMP NEGERI 1 CISITU', 'Jalan Rd. Umar Wirahadikusumah Km 18', 'Kec. Cisitu', 'Situmekar', 'negeri'),
(20234055, 'SMP NEGERI 1 CONGGEANG', 'Jl. Rumah Sakit 01 Conggeang', 'Kec. Conggeang', 'Conggeang Wetan', 'negeri'),
(20234056, 'SMP NEGERI 1 DARMARAJA', 'Jl. Raya Darmaraja Km.25 Sumedang', 'Kec. Darmaraja', 'Tarunajaya', 'negeri'),
(20234057, 'SMP NEGERI 1 JATIGEDE', 'Jl. PLN - Cijeungjing', 'Kec. Jatigede', 'Cijeungjing', 'negeri'),
(20234059, 'SMP NEGERI 2 CIMALAKA', 'Jalan Raya Tanjungkerta - Cimalaka - Sumedang', 'Kec. Cimalaka', 'Citimun', 'negeri'),
(20234060, 'SMP NEGERI 2 CIMANGGUNG', 'Kp. Jamuju Leuwiliang', 'Kec. Cimanggung', 'Sindulang', 'negeri'),
(20234061, 'SMP NEGERI 2 CISITU', 'Jln. Cisasak', 'Kec. Cisitu', 'Pajagan', 'negeri'),
(20234063, 'SMP NEGERI 2 DARMARAJA', 'Jl. Pataruman', 'Kec. Darmaraja', 'Neglasari', 'negeri'),
(20234066, 'SMP NEGERI 2 JATINUNGGAL', 'Jl. Raya Tarikolot No. 34', 'Kec. Jatinunggal', 'Tarikolot', 'negeri'),
(20234068, 'SMP NEGERI 3 CISITU', 'Jl. Raya Barat Darmaraja - Sumedang', 'Kec. Cisitu', 'Cinangsi', 'negeri'),
(20234069, 'SMP NEGERI 3 JATIGEDE', 'Jl. Sukatani - Kadu Jatigede Sumedang', 'Kec. Jatigede', 'Kadu', 'negeri'),
(20234074, 'SMP NU SUKAMANTRI', 'Jl. Mesjid No. 07', 'Kec. Tanjungkerta', 'Sukamantri', 'swasta'),
(20234075, 'SMP PGRI 314 PARAKANMUNCANG', 'Jalan Raya Parakanmuncang Km.23', 'Kec. Cimanggung', 'SINDANGPAKUON', 'swasta'),
(20234076, 'SMP PLUS AL AMAH', 'Jl. Cimanggung-sindulang', 'Kec. Cimanggung', 'Cimanggung', 'swasta'),
(20234079, 'SMP YUDHISTIRA', 'Jalan Parakanmuncang Km2', 'Kec. Cimanggung', 'Sindanggalih', 'swasta'),
(20235579, 'SMP NEGERI 10 SUMEDANG', 'Jl. Desa Sukajaya', 'Kec. Sumedang Selatan', 'Sukajaya', 'negeri'),
(20235582, 'SMP NEGERI 3 JATINUNGGAL', 'Jatinunggal', 'Kec. Jatinunggal', 'Cimanintin', 'negeri'),
(20235584, 'SMP NEGERI 4 WADO', 'Desa Cimungkal', 'Kec. Wado', 'Cimungkal', 'negeri'),
(20235585, 'SMP NEGERI 1 BUAHDUA', 'Jl. Raya Buahdua - Sumedang No. 464', 'Kec. Buahdua', 'Nagrak', 'negeri'),
(20235587, 'SMP NEGERI 1 CIMALAKA', 'Jalan Balai Desa Cimalaka', 'Kec. Cimalaka', 'Cimalaka', 'negeri'),
(20235588, 'SMP NEGERI 1 CIMANGGUNG', 'Jl. Raya Parakanmuncang KM. 22', 'Kec. Cimanggung', 'Sindanggalih', 'negeri'),
(20235594, 'SMP NEGERI 2 BUAHDUA', 'Jl. Raya Hariang - Sumedang', 'Kec. Buahdua', 'Hariang', 'negeri'),
(20235598, 'SMP NEGERI 2 CONGGEANG', 'Jalan Tarumanagara', 'Kec. Conggeang', 'Karanglayung', 'negeri'),
(20235600, 'SMP NEGERI 2 GANEAS', 'Jalan Desa Tanjunghurip RT 02 RW 02', 'Kec. Ganeas', 'Tanjunghurip', 'negeri'),
(20235601, 'SMP NEGERI 2 JATIGEDE', 'Jl. Pasirkaliki', 'Kec. Jatigede', 'Ciranggem', 'negeri'),
(20235603, 'SMP NEGERI 3 CIMALAKA', 'Jl. Trunamanggala', 'Kec. Cimalaka', 'Trunamanggala', 'negeri'),
(20235606, 'SMP NEGERI 3 RANCAKALONG', 'Cibungur', 'Kec. Rancakalong', 'Cibungur', 'negeri'),
(20235607, 'SMP NEGERI 3 SITURAJA', 'Jl. Tanjung Manunggal V', 'Kec. Situraja', 'Sukatali', 'negeri'),
(20235608, 'SMP NEGERI 9 SUMEDANG', 'Jl. Prabu Geusan Ulun No. 104', 'Kec. Sumedang Selatan', 'Regol Wetan', 'negeri'),
(20235609, 'SMP ISLAM PLUS ASSALAM', 'Jl. Nagrak', 'Kec. Buahdua', 'Nagrak', 'swasta'),
(20235614, 'SMP PLUS GANESHA', 'Jalan Raya Parakanmuncang Gg. Sukawargi RT.03 RW.01', 'Kec. Cimanggung', 'Sindangpakuon', 'swasta'),
(20251870, 'SMP NEGERI SATU ATAP SUKANYIRU', 'Jl. Sukajadi - Lemah Sugih', 'Kec. Wado', 'Sukajadi', 'negeri'),
(20251871, 'SMP NEGERI 2 CIBUGEL', 'Jl. Raya Cibugel Limbangan', 'Kec. Cibugel', 'Buana Mekar', 'negeri'),
(20251872, 'SMP NEGERI SATU ATAP TAMANSARI', 'Dusun Antara', 'Kec. Cibugel', 'Tamansari', 'negeri'),
(20251873, 'SMP NEGERI 2 PAMULIHAN', 'Jln. Cikohkol', 'Kec. Pamulihan', 'Cigendel', 'negeri'),
(20251874, 'SMP NEGERI 3 PAMULIHAN', 'Cilembu', 'Kec. Pamulihan', 'Cilembu', 'negeri'),
(20251875, 'SMP NEGERI 4 PAMULIHAN', 'Dusun Cinanggerang', 'Kec. Pamulihan', 'CINANGGERANG', 'negeri'),
(20251876, 'SMP NEGERI SATU ATAP CIKAWAO', 'Dusun Nyampay RT 01 RW 09', 'Kec. Pamulihan', 'Sukawangi', 'negeri'),
(20251877, 'SMP SUKAPURA WADO', 'Jalan Sukapura-Cibugel N0. 27 KM 04', 'Kec. Wado', 'SUKAPURA', 'swasta'),
(20251878, 'SMP IT IMAM BUKHARI', 'Jalan Caringin Km 205', 'Kec. Jatinangor', 'Sayang', 'swasta'),
(20251879, 'SMP PLUS BANJARSARI', 'Jl. Raya Wado-Kirisik KM. 08', 'Kec. Jatinunggal', 'Banjarsari', 'swasta'),
(20251915, 'SMP PLUS PERSATUAN ISLAM TANJUNGSARI', 'Jl. Simpang Km 2.2 Dusun Genteng RT 01 RW 09', 'Kec. Tanjungsari', 'Gunungmanik', 'swasta'),
(20252182, 'SMP NEGERI SATU ATAP CIMANGGUNG', 'Dusun Awilega', 'Kec. Cimanggung', 'Tegalmanggung', 'negeri'),
(20253144, 'SMP PLUS AL MAMUN', 'Dsn. Gunungdatar, RT 01 RW 04', 'Kec. Tanjungkerta', 'Gunturmekar', 'swasta'),
(20253928, 'SMP PLUS GUNA CIPTA', 'Jl. Parakanmuncang KM. 01 RT 04 RW 02', 'Kec. Cimanggung', 'Sindang Galih', 'swasta'),
(20253987, 'SMP IT ASMAUL HUSNA', 'Jl Dahlia GA 17 Perum Tanjungsari Permai', 'Kec. Tanjungsari', 'Raharja', 'swasta'),
(20270788, 'SMP MUHAMMADIYAH JATINANGOR', 'Jl. Cibeusi 1 Rt 01 Rw 08', 'Kec. Jatinangor', 'Cibeusi', 'swasta'),
(20271299, 'SMP YADIKA TANJUNGSARI', 'Jl. Raya Tajungsari No.394 A', 'Kec. Tanjungsari', 'Gudang', 'swasta'),
(20271370, 'SMP PLUS YPSA SUMEDANG', 'Jl. Ciherang K.M 3-4', 'Kec. Sumedang Selatan', 'Ciherang', 'swasta'),
(69889084, 'SMP ISLAM AL-FURQON', 'Dsn Nagrog RT 02 RW 08', 'Kec. Rancakalong', 'Sukahayu', 'swasta'),
(69902978, 'SMP Plus Assyariatul Uluum', 'Dsn. Babakan RT 05/ 07', 'Kec. Rancakalong', 'Pangadegan', 'swasta'),
(69906954, 'SMP Plus Bani Yasin', 'Jl. Letda Lukito RT 01/04', 'Kec. Jatinangor', 'Cisempur', 'swasta'),
(69930519, 'SMP AL ISLAM SUMEDANG', 'Jl. Situwangi RT 04/03', 'Kec. Cimalaka', 'Cikole', 'swasta'),
(69945508, 'SMP IT PUI MADANI TANJUNGSARI', 'Jl. Jatimandiri No. 9', 'Kec. Tanjungsari', 'Kutamandiri', 'swasta'),
(69948571, 'SMP IT IMAM SYAFII', 'Dsn Cilembu II RT02 RW 11 Pamulihan Sumedang', 'Kec. Pamulihan', 'Cilembu', 'swasta'),
(69955308, 'SMP IT INSAN SEJAHTERA', 'Perum Kampung Toga Blok G No. 1', 'Kec. Sumedang Selatan', 'Sukajaya', 'swasta'),
(69957089, 'SMP MAZAYA ISLAMIC BOARDING SCHOOL', 'JL RAYA BARAT CICALENGKA KM. 28', 'Kec. Cimanggung', 'Sindangpakuon', 'swasta'),
(69961639, 'SMP IT PADJADJARAN JATINANGOR', 'Caringin Regency 2', 'Kec. Jatinangor', 'Sayang', 'swasta'),
(69970192, 'SMP BINA INSAN HARAPAN', 'JLN. PAGADEN AWISURAT', 'Kec. Tanjungsari', 'Cinanjung', 'swasta'),
(69970240, 'SMP NEGERI 4 JATINANGOR', 'JALAN LETNAN UDJU', 'Kec. Jatinangor', 'Jatimukti', 'negeri'),
(69971939, 'SMP PLUS ULUMUL QURAN AL MUSTOFA', 'Lebak Cara Indah', 'Kec. Pamulihan', 'Citali', 'swasta'),
(69978766, 'SMP Bina Harapan Jatigede', 'Dusun Cihegar RT. 019/005', 'Kec. Jatigede', 'Mekarasih', 'swasta'),
(69979244, 'SMP ISLAM SUNAN AMPEL', 'Dusun Babakan Pasirhuni RT 02/05', 'Kec. Cimanggung', 'Pasirnanjung', 'swasta'),
(69979720, 'SMP IT MIFTAHUL HASANAH', 'Jl. Genteng KM. 01 Dusun Sukaluyu RT 01/05', 'Kec. Sukasari', 'Sukarapih', 'swasta'),
(69981202, 'SMP Mitra Tanjungsari', 'Jl. Raya Simpang Parakanmuncang Kp. Sadang RT. 05/05', 'Kec. Tanjungsari', 'Raharja', 'swasta'),
(69984297, 'SMP IT GENERASI UNGGUL', 'Jl. Kaum Kidul RT 02/05', 'Kec. Darmaraja', 'Darmaraja', 'swasta'),
(69985078, 'SMP PLUS AL BAATS', 'Jl. Citali Rancakalong Dusun Cimasuk II', 'Kec. Pamulihan', 'Pamulihan', 'swasta'),
(69985826, 'SMP IT DAARUL AGUNG', 'Dusun Cibogo III Rt.03/07', 'Kec. Sukasari', 'Sukasari', 'swasta'),
(69987238, 'SMP PEMBAHARU MUDA', 'Kampung Cisagasari', 'Kec. Sumedang Utara', 'Rancamulya', 'swasta'),
(69988771, 'SMP MUTIARA UMMAH ISLAMIC BOARDING SCHOOL', 'Jl. Letda Lukito Kp. Jatisari RT/RW 06/01 Desa Jatiroke Kecamatan Jatinangor', 'Kec. Jatinangor', 'Jatiroke', 'swasta'),
(69988778, 'SMP IT NURUL AZMI', 'Jl. Kenanga No. 37 Lanjung', 'Kec. Tanjungsari', 'Tanjungsari', 'swasta'),
(69988813, 'SMP IT ULUL ALBAAB', 'Jl. Sebelas April Dusun Buganggeureung RT 04/04', 'Kec. Buahdua', 'Sekarwangi', 'swasta'),
(69990326, 'SMP IT DARWATISHSHOLAH', 'Dusun Jengkolcondong Rt.05 Rw.05', 'Kec. Cimanggung', 'Tegalmanggung', 'swasta'),
(69990979, 'SMP PLUS AL HIKMAH', 'Dusun Pasirkuya RT.03/Rw.16', 'Kec. Jatinangor', 'Cipacing', 'swasta'),
(69996250, 'SMP IT BINTANG GEMILANG', 'Jl. Raya Conggeang Dusun Tagog RT 03/01', 'Kec. Conggeang', 'Cibeureuyeuh', 'swasta'),
(70003425, 'SMP IT Baabul Kamil', 'Jl. Cikuda No. 08', 'Kec. Jatinangor', 'Hegarmanah', 'swasta'),
(70013954, 'SMP PLUS AL-MUNAWWARAH', 'Dsn. Gunungmanik RT/RW 001/017', 'Kec. Tanjungsari', 'Gunungmanik', 'swasta');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kutipan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `kutipan`, `isi`, `tgl_isi`) VALUES
(6, 'Judul 1', 'Kutipan 1', '<p>Isi 3sfbfsbsfbsfbsfcbxb</p>', '2025-07-10 03:13:09'),
(8, 'Dinas Pendidikan Sumedang💕', 'Tetap Sehat dan Semangat!👍😁👍', '<p><span style=\"font-family: Helvetica;\">﻿</span><img src=\"../gambar/2b24d495052a8ce66358eb576b8912c8.jpg\" data-filename=\"2b24d495052a8ce66358eb576b8912c8.jpg\" class=\"note-float-left\" style=\"float: left;\">Belajar dari rumah telah menjadi bagian dari new normal warga Indonesia dalam menjalani kehidupan di tengah pandemi virus corona. Namun kendala infrastruktur dan teknologi membuat adanya kesenjangan pendidikan antar daerah.</p><p>Sherly Lewerissa, warga di Ambon sudah hampir tiga bulan punya tanggung jawab tambahan di rumah.</p><p>Selain harus mengajar dengan metode online sebagai dosen di Universitas Pattimura, ia juga harus mendampingi kedua anaknya belajar dari rumah.</p><p>Putera sulungnya, Hillary de Queoljoe sekarang duduk di kelas 7 SMP Negeri 6, sementara adik Hillary, Marchella de Qoeljoe adalah murid kelas 1 Sekolah Citra Kasih, di Ambon, Maluku.</p><p>Sherly mengaku ada perbedaan besar dalam aktivitas keduanya saat berlajar di rumah karena mereka berada di sekolah yang berbeda.</p><p>\"Sekolah negeri tidak sama dengan sekolah swasta. Sekolah yang swasta lebih terorganisasi dan rapi,\" kata Sherly kepada Hellena Souisa dari ABC News.</p><p>\"Adik setiap hari ada tugas, nanti hasilnya dikirim melalui Gmail. Tapi Kakak tugasnya [dari sekolah] tidak menentu, dalam satu minggu mungkin hanya ada 2 atau 3 tugas,\" tambahnya.</p><p>Sekitar 4.000 kilometer dari kota Ambon, Vincent, seorang murid kelas 5 Sekolah Dasar di Desa Semudun, Kabupaten Mempawah, Provinsi Kalimantan Barat mengaku lebih suka belajar di sekolah.</p><p>\"Saya lebih suka belajar [di sekolah] seperti biasa karena di rumah bosan tidak ada teman,\" ujarnya kepada Natasya Salim.</p><p>Sejak akhir Maret lalu, Vincent dan adiknya, Wilson, yang duduk di kelas 3, belajar di rumah dengan menyaksikan tayangan TVRI, sesuai instruksi dari sekolah mereka yaitu SD Negeri 19 Semudun.</p>', '2025-07-10 01:52:01'),
(9, 'Online Courses', 'You Will Need This', '<p style=\"margin: 10px 0px; padding: 10px 0px; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><img src=\"../gambar/84d9ee44e457ddef7f2c4f25dc8fa865.jpg\" style=\"width: 626px; float: left;\" class=\"note-float-left\"></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Pagi ini, Moreyna, 6 tahun, bangun pada pukul 7 pagi seperti biasanya. Setelah mandi dan sarapan, ia mengenakan seragam sekolahnya dan meminta ibunya untuk mengantarkannya ke sekolah dengan harapan semuanya sudah kembali normal.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Akan tetapi, Moreyna langsung kecewa begitu mengetahui bahwa sekolahnya masih ditutup karena pandemi.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Moreyna adalah murid di PAUD Kuncup Mekar di Jayapura. Sejak Pemerintah Papua memutuskan untuk menutup semua sekolah di provinsi ini pada bulan Maret 2020, ia belajar dari rumah bersama ibunya, Maria Morin.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">Lebih dari 60 juta murid di Indonesia untuk sementara waktu tidak masuk sekolah karena COVID-19. Hal ini menimbulkan dampak yang belum pernah terjadi sebelumnya terhadap keberlangsungan pendidikan mereka.</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><font color=\"#000000\">\"Berdasarkan survei dari orang tua dan murid, hambatan terbesar yang dihadapi murid saat belajar dari rumah adalah kurangnya akses internet dan perangkat elektronik yang mendukung,\" kata Spesialis Pendidikan UNICEF Nugroho Warman. “Orang tua juga harus fokus pada kewajiban lain untuk menghidupi keluarga mereka, yang akhirnya membuat mereka kurang memiliki waktu untuk membantu anak-anak mereka.\"</font></p><p style=\"margin: 10px 0px; padding: 10px 0px;\" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" medium;\"=\"\"><span style=\"color: rgb(0, 0, 0); font-family: var(--bs-font-sans-serif); font-size: 1rem;\">Untuk mengatasi hal ini, Pemerintah Indonesia menyiarkan program TV edukasi “Belajar dari Rumah” lewat TVRI untuk membantu anak-anak belajar dari rumah. Program tersebut, yang diselenggarakan oleh Kementerian Pendidikan dan Kebudayaan, menyiarkan acara dari Senin hingga Jumat untuk anak-anak usia sekolah dari prasekolah hingga Sekolah Menengah Atas yang mencakup berbagai bidang, termasuk program pengasuhan anak.</span></p>', '2025-07-10 04:55:42'),
(11, 'Pemasukan Data Ruang Kelas', 'Masukan Data Laporan Sarana Pransana Sekolah Disini', '<p>Lorem ipsum<img src=\"../gambar/bf8229696f7a3bb4700cfddef19fa23f.jpg\" style=\"width: 736px;\"></p>', '2025-07-13 08:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `judul`, `isi`, `tgl_isi`) VALUES
(1, 'Disdiksum', '<p>lorem ipsum dolor sit amet</p>', '2025-07-09 08:50:03'),
(2, 'About', 'Kami Dinas Pendidikan Sumedang Indonesia&nbsp;', '2025-07-09 08:49:42'),
(3, 'Contact', '<p>Silakan kontak kami di nomor :&nbsp;</p>', '2021-04-04 23:08:39'),
(4, 'Social', '<p><b>Youtube : contohbablabal</b></p><p><b>IG : BLABLABLA</b></p>', '2025-07-09 08:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `token_ganti_password` text DEFAULT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `nama_lengkap`, `password`, `status`, `token_ganti_password`, `tgl_isi`) VALUES
(2, 'dirumahrafif@gmail.com', 'Di Rumahrafif', 'c33367701511b4f6020ec61ded352059', '1', '', '2021-04-09 00:00:58'),
(3, 'rayfandavid1@gmail.com', 'Rayfan David', '25f9e794323b453885f5181f1b624d0b', '2a9d121cd9c3a1832bb6d2cc6bd7a8a7', NULL, '2025-07-09 06:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `nama`, `foto`, `isi`, `tgl_isi`) VALUES
(1, 'UIN Sunan Kalijaga', 'partners_1617496652_uin.jpg', '<p>UIN Sunan Kalijaga<br></p>', '2021-04-04 00:37:32'),
(2, 'UGM', 'partners_1617496676_ugm.jpg', '<p>UGM</p>', '2021-04-04 00:37:56'),
(3, 'UMY', 'partners_1617496689_umy.png', '<p>UMY</p>', '2021-04-04 00:38:09'),
(4, 'UNY', 'partners_1617496703_uny.png', '<p>UNY</p>', '2021-04-04 00:38:23'),
(5, 'UAD', 'partners_1617496716_uad.png', '<p>UAD</p>', '2021-04-04 00:38:36'),
(7, 'UPN', 'partners_1617496766_upn.png', '<p>UPN</p>', '2021-04-04 00:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `nama`, `foto`, `isi`, `tgl_isi`) VALUES
(2, 'Budi rahardjo', 'tutors_1617208710_Budi Rahardjo.jpg', '<p>Budi Raharjo[1] berprofesi sebagai Dosen, praktisi IT dan ahli keamanan informasi. Technopreneur, penulis, peneliti, pembicara, konsultan information security, blogger, rocker, itulah beberapa profesi yang dilakoni oleh Ir. Budi Rahardjo, MSc, PhD. Dengan gayanya yang khas, dosen Teknik Elektro ITB ini turut memberikan kontribusi untuk perkembangan dan kemajuan teknologi informasi di Indonesia.<br></p>', '2021-04-02 22:21:41'),
(3, 'Romi Satrio Wahono', 'tutors_1617209015_Romi Satrio Wahono.jpg', '<p>Romi Satria Wahono. Lahir di Madiun, 2 Oktober 1974. Menyelesaikan pendidikan dasar dan menengah di SD Negeri Sompok 4 dan SMP Negeri 8 Semarang. Menamatkan SMA di SMA Taruna Nusantara, Magelang pada tahun 1993. Menempuh pendidikan S1 (B.Eng), S2 (M.Eng), dan S3 (Dr.Eng) (on-leave) di bidang Software Engineering di Department of Computer Science di Saitama University, Jepang pada tahun 1999, 2001, dan 2004. Juga menyelesaikan PhD di bidang Software Engineering dan Machine Learning di&nbsp; Faculty of Information and Computer Technology di Universiti Teknikal Malaysia Melaka pada tahun 2014. Mantan PNS dan peneliti Lembaga Ilmu Pengetahuan Indonesia (LIPI). Cisco certified instructor lulusan Nanyang Technological University (NTU), Singapore. Bidang minat penelitian adalah Software Engineering dan Machine Learning. Professional member dari asosiasi ilmiah IEEE Computer Society (90598687), ACM (6680333) dan PMI (2822015). Pendiri dan CEO dari PT Brainmatics Cipta Informatika, dan PT IlmuKomputerCom Braindevs Sistema, perusahaan yang bergerak di bidang pengembangan software, enterprise architecture, professional training dan certification center.</p><p>Memiliki pengalaman sebagai pengembang enterprise architecture dan IT blueprint di berbagai instansi pemerintah dan swasta, seperti Komisi Pemberantasan Korupsi, Kementrian Keuangan, Universitas Sriwijaya, dsb. Pemegang sertifikasi industri dan certified trainer berhubungan dengan bidang enterprise architecture (TOGAF), business process modeling (BPMN), systems analysis and design (OMG UML), IT service management (ITIL), data mining (RapidMiner) dan software development (IEEE, Oracle).</p><p>Aktif sebagai peneliti dan dosen, dimana ratusan publikasi penelitian dalam bentuk scientific paper, artikel, dan tutorial telah diterbitkan dalam berbagai proceedings conference, jurnal ilmiah, majalah, koran dan portal, bertaraf nasional maupun internasional. Selain menulis tetap di beberapa kolom majalah IT, juga menyempatkan diri untuk menulis bebas di situs blog pribadi di RomiSatriaWahono.Net. Terjun di dunia industri IT semenjak masa kuliah. Memulai karir sebagai software tester, programmer dan system analyst di beberapa software house dan game developer company di Jepang. Memiliki pengalaman sebagai engineer, konsultan, lecturer dan pembicara seminar, workshop, serta conference baik di Indonesia maupun Jepang.</p><p>Saat ini sebagai reviewer di beberapa journal terindeks SCOPUS yang diterbitkan oleh Elsevier, ACTAPress dan NASA. Di Indonesia, reviewer dari journal Telkomnika dan journal lokal lain yang terakreditasi oleh Dikti. Selain itu memiliki pengalaman sebagai reviewer untuk program hibah penelitian yang diselenggarakan oleh Universitas Indonesia dan beberapa universitas lain, dan juga reviewer untuk kegiatan tender pengembangan software di beberapa kementerian di Indonesia. Technical Assistance program hibah kompetisi dari kementrian pendidikan nasional untuk beberapa universitas di Jakarta, Padang, Lampung, Surabaya dan Yogyakarta. Editor-in-Chief dan reviewer dari journal ilmiah Journal of Software Engineering dan Journal of Intelligent Systems.</p><p>Menjadi juri pada berbagai event lomba dan kompetisi bertaraf nasional maupun internasional, diantaranya adalah: Lomba Pembuatan Multimedia Pembelajaran (LPMP) yang diselenggarakan oleh Kemdiknas, National Innovative Teacher Competition yang diselenggarakan oleh Microsoft, eLearning Award yang diselenggarakan oleh Pustekkom, INAICTA (Indonesia ICT Award) yang diselenggarakan oleh Kominfo dan Aspiluki, Kompetisi Smart Campus yang diselenggarakan oleh Telkom, Imagine Cup yang diselenggarakan oleh Microsoft, dan kompetisi pengembangan aplikasi dan situs web yang diadakan oleh kementrian keuangan, dan berbagai universitas lain di Indoneia.</p><p>Selain tema diatas juga memiliki minat dan aktif menulis dalam tema yang berhubungan dengan manajemen, leadership, self improvement, motivation dan keorganisasian. Aktifis organisasi kampus dan kemahasiswaan semasa menjadi mahasiswa di Saitama University. Menjadi Ketua Umum PPI Jepang (Perhimpunan Pelajar Indonesia di Jepang) periode tahun 2001-2003, dan Ketua Umum IECI Japan (asosiasi ilmiah di bidang elektronika dan informatika) periode tahun 2001-2002.</p><p>Mendapat penghargaan dari PBB pada pertemuan puncak WSIS (World Summit on Information Society) pada tahun 2003 di Jenewa, Swiss, dengan penghargaan the Continental Best Practice Examples in the Category eLearning (IlmuKomputer.Com).</p>', '2021-04-02 22:22:41'),
(4, 'Onno W Purbo', 'tutors_1617209038_onno w purbo.jpg', '<p>Onno Widodo Purbo (lahir di Bandung, Jawa Barat, 17 Agustus 1962; umur 58 tahun) adalah seorang tokoh dan pakar di bidang teknologi informasi asal Indonesia.[1] Selain pakar, Onno juga dikenal sebagai penulis, pendidik, dan pembicara seminar.[1] Sebagai aktivis Onno dikenal dalam upayanya memperjuangkan Linux. Karya inovatifnya diantaranya adalah Wajanbolic, sebagai upaya koneksi internet murah tanpa kabel dan RT/RW-Net sebagai jaringan komputer swadaya masyarakat untuk menyebarkan internet murah, serta penerapan Open BTS[1][2]</p><p>Ia memulai pendidikan akademis di ITB pada jurusan Teknik Elektro pada tahun 1981 dan lulus dengan predikat wisudawan terbaik, kemudian melanjutkan studi ke Kanada dengan beasiswa dari PAUME.</p><p>Ia juga aktif menulis dalam bidang teknologi informasi media, seminar, konferensi nasional maupun internasional dan percaya filosofi copyleft (sumber terbuka), banyak tulisannya dipublikasi secara gratis di internet.[1][3][4] Sebagai pakar teknologi Onno hanya menggunakan netbook dan telepon seluler Android merek lokal.[1].</p><p>Pada bulan November 2020, ia menerima penghargaan Postel Service Award dari Internet Society. Postel Service Award diberikan kepada Onno karena telah memberikan kontribusi luar biasa bagi perkembangan teknologi Internet di Indonesia.[5]</p>', '2021-04-02 22:20:53'),
(5, 'Ricky Elson', 'tutors_1617402687_Ricky Elson.jpg', '<p>Ricky Elson (lahir di Padang, Sumatra Barat, 11 Juni 1980; umur 40 tahun) adalah seorang teknokrat Indonesia yang ahli dalam teknologi motor penggerak listrik. Ia yang merancang bangun mobil listrik Selo bersama Danet Suryatama yang merancang bangun Tucuxi dianggap sebagai pelopor mobil listrik nasional.[1][2][3]</p><p>Ricky menempuh pendidikan tinggi teknologinya di Jepang, kemudian bekerja di sebuah perusahaan di negeri sakura itu. Selama 14 tahun di sana, Ricky telah menemukan belasan teknologi motor penggerak listrik yang sudah dipatenkan di Jepang.[4]</p><p>Tertarik dengan kemampuan Ricky untuk pengembangan teknologi mobil listrik, Menteri Negara Badan Usaha Milik Negara (BUMN), Dahlan Iskan meminta Ricky dan beberapa praktisi pengembang teknologi mobil listrik lainnya untuk bersinergi bersama Kementerian Riset dan Teknologi Indonesia, lembaga penelitian, beberapa universitas dan lembaga pemerintahan terkait, demi mempercepat pengembangan mobil listrik Indonesia. Bahkan Dahlan Iskan rela menghibahkan gajinya sebagai menteri kepada Ricky.[5]</p><p>Sebelum kuliah ke Jepang, Ricky Elson menamatkan sekolah menengahnya di SMA Negeri 5 Padang pada tahun 1998.[6]</p><p>Di pertengahan tahun 2013, Ricky dan timnya bekerja menyelesaikan beberapa purwarupa mobil listrik yang diberi nama Selo dan Gendhis yang digunakan pada KTT APEC yang telah dilaksanakan pada Oktober 2013 di Denpasar, Bali.[7] Namun kemudian proyek mobil listrik nasional itu menghadapi hambatan, karena peraturannya tidak segera keluar. Lelah menunggu kepastian tentang proyek tersebut yang tak kunjung jelas statusnya, ia kemudian kembali ke perusahaan tempat ia semula bekerja di Jepang.[1]</p><p>Kabar terakhir dari tokoh ini, ia telah kembali ke Indonesia dan pada kisaran 2011-2012 ia menggagas sebuah pusat riset yang ia namakan Lentera Angin Nusantara, bertempat di Dusun Lembur Tengah, Desa Ciheras, Kecamatan Cipatujah, Kabupaten Tasikmalaya, Jawa Barat.[8] [9] [10]</p>', '2021-04-02 22:31:27'),
(6, 'Adi Wirawan', 'tutors_1617402809_path4362-14.png', '<p>Adi Wirawan<br></p>', '2021-04-02 22:33:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_sd`
--
ALTER TABLE `daftar_sd`
  ADD PRIMARY KEY (`NPSN`);

--
-- Indexes for table `daftar_smp`
--
ALTER TABLE `daftar_smp`
  ADD PRIMARY KEY (`NPSN`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_smp`
--
ALTER TABLE `daftar_smp`
  MODIFY `NPSN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70013955;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
