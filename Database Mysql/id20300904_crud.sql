-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 02:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20300904_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `href` varchar(50) DEFAULT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tes` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `designation` varchar(15) NOT NULL,
  `joining_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `href`, `first_name`, `last_name`, `email`, `tes`, `gender`, `designation`, `joining_date`) VALUES
(56, 'id keken.jpg', 'keken', 'Alifia Ilta', 'Demangan', '0', 'Persia; Male; 1,7th', '081327141574', '2023-05-01'),
(57, '', 'Mireng', 'Awaliyatu Khoirunnisa', 'Pelang Margorejo, Dawe, Kudus', '', 'Male, mix, 2 thn', '081227481068', '2023-03-27'),
(58, 'abu.jpg', 'Abu', 'Herly', 'Panjang Rt 4/2', 'cat_steril', 'kucing, Female, 3 thn', '0895422896672', '2023-05-01'),
(59, 'bombom.jpg', 'Bom bom', 'Haris', 'Jepara, Mulyotinggil klaster A4 Mulyoharjo', 'cat_steril', 'Persia, jantan, 12 tahun', '0888 230 7484', '2023-05-01'),
(60, '', 'Ocil', 'Meliya Naelal Husna', 'Gondosari Rt 8/2 Gebog Kudus', '0', 'Kucing, Female', '0819 444 33800', '2023-05-01'),
(69, 'bendot.jpg', 'Bendot', 'Emi Kodrianingsih', 'Gondangmanis, 01/08, Bae, Kudus', '   ', 'kampung, jantan, 1thn 2 bln', '085813058783', '2023-05-08'),
(90, '', 'Copu', 'Lufita', 'Jati Kulon', '', 'persia betina 1 tahun', '0000000000', '2024-07-01'),
(91, '', 'louis', 'Bambang', 'Gebog', '', 'persia jantan 1 tahun', '0000000000', '2024-07-01'),
(92, '', 'reno', 'wagina', 'jepara', '', 'dom jantan 5 bulan', '0000000000', '2024-07-01'),
(93, '', 'brownies', 'nila', 'kajar', '', 'dom jantan 1 tahun', '0000000000', '2024-07-02'),
(94, '', 'muiza', 'Anggit', 'bribik', '', 'dom jantan 2 tahun', '0000000000', '2024-07-02'),
(95, '', 'loreng', 'Arman', 'Gebog', '0', 'dom; betina; 7 bulan', '0000000000', '2024-07-03'),
(96, '', 'kiwi', 'mia', 'jekulo', '', 'dom betina 2', '0000000000', '2024-07-03'),
(97, '', 'jaiput', 'kiki', 'bondosari, gebog', '', 'persia jantan 2 tahun', '0000000000', '2024-07-03'),
(98, '', 'koko', 'atik', 'dawe', '0', 'dom; jantan; 1 tahun', '0000000000', '2024-07-04'),
(99, '', 'rocky', 'puji', 'gebog', '0', 'persia; jantan; 3 tahun', '0000000000', '2024-07-04'),
(100010, 'empty', 'tes', 'tes123', 'dafaffg', '', 'dom; jantan; ', '0000000000', '2024-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `nama` varchar(500) NOT NULL,
  `stock` int(20) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `restock` int(20) NOT NULL,
  `harga_beli` varchar(30) NOT NULL,
  `harga_jual` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`nama`, `stock`, `deskripsi`, `restock`, `harga_beli`, `harga_jual`) VALUES
('', 10013, '', 111, '', 0),
('Acetylcystein', 100, 'Pengencer Dahak', 10, '', 0),
('Advocat', 99, 'Anti-Parasit', 10, 'Rp 15.000/ml', 0),
('Ambroxol', 88, 'Pengencer Dahak', 10, '', 0),
('Amox-Clav', 55, '..anti-biotik', 8, 'Rp 30.000/1tab', 0),
('Anthelcat', 100, 'Anti-Parasit', 10, 'Rp 20.000/tab', 0),
('Bioplasenton', 99, 'obat lain', 10, 'Rp 35.000', 0),
('Caudectomy', 100, 'Operasi dll', 10, 'Rp 600.000', 0),
('Cefadroxil', 31, '..anti-biotik', 10, 'Rp 15.000/1caps', 0),
('Ciprofloxacin', 99, 'anti-biotik', 10, 'Rp 20.000/1tab', 0),
('Clindamycin', 100, 'anti-biotik', 10, 'Rp 10.000/1caps', 0),
('Colopexy', 100, 'Operasi dll', 10, 'Rp 600.000', 0),
('Cukur rambut', 100, 'Operasi dll', 10, 'Rp 10.000 - 100.000', 0),
('Dexamethason', 98, 'obat lain', 10, '', 0),
('Diazepam', 100, 'obat lain', 10, '', 0),
('Doxycycline', 55, '..anti-biotik', 10, 'Rp 10.000/1caps', 0),
('Drontal', 100, 'Anti-Parasit', 10, 'Rp 25.000/tab', 0),
('Enbatic', 99, 'obat lain', 10, 'Rp 5.000', 0),
('Entrostop', 100, 'obat lain', 10, '', 0),
('Enukleasi', 100, 'Operasi dll', 10, 'Rp 600.000', 0),
('F3', 100, 'Vaksib', 10, 'Rp 190.000', 0),
('F4', 100, 'Vaksib', 10, 'Rp 210.000', 0),
('FLUTD - Flushing', 100, 'Operasi dll', 10, 'Rp 250.000', 0),
('FLUTD - Kateter', 100, 'Operasi dll', 10, 'Rp 500.000', 0),
('Glucosamin', 100, 'obat lain', 10, '', 0),
('Infus', 99, 'Operasi dll', 10, 'Rp 60.000', 0),
('Infus iv (include all in)', 100, 'injeksi', 10, 'Rp 60.000', 0),
('Infus sc', 100, 'injeksi', 10, 'Rp 20.000/100ml', 0),
('Infus set', 100, 'Operasi dll', 10, 'Rp 10.000', 0),
('Inj. Antibiotik', 100, 'injeksi', 10, 'Rp 10.000/ml', 0),
('Inj. Antihistamin', 99, 'injeksi', 10, 'Rp 10.000/ml', 0),
('Inj. Antipiretik', 100, 'injeksi', 10, 'Rp 15.000/ml', 0),
('Inj. Hematodin', 100, 'injeksi', 10, 'Rp 15.000/ml', 0),
('Inj. Ivermectin', 100, 'injeksi', 10, 'Rp 30.000/ml', 0),
('Inj. Ketamin - Xylazin', 100, 'injeksi', 10, 'Rp 100.000/ml', 0),
('Inj. Oksitosin', 100, 'injeksi', 10, 'Rp 50.000/ml', 0),
('Inj. Tramadol', 100, 'injeksi', 10, 'Rp 50.000/ml', 0),
('Inj. Vit', 99, 'injeksi', 10, 'Rp 10.000/ml', 0),
('Inj. Vit K', 100, 'injeksi', 10, 'Rp 15.000/ml', 0),
('Itraconazol', 43, '..anti-fungal', 1000, 'Rp 30.000/1caps', 0),
('IV cath', 100, 'Operasi dll', 10, 'Rp 10.000', 0),
('Kaolin-pectin sirup', 100, 'Anti-Diare', 10, 'Rp 15.000/15ml', 0),
('Kaolin-pectin tablet', 100, 'Anti-Diare', 10, 'Rp 3.000/tab', 0),
('Kastrasi (Operasi, Ab, Salep)', 100, 'Steril', 10, 'Rp 400.000', 0),
('Kejibeling/Nefrolit', 93, 'obat lain', 10, '', 0),
('Ketoconazol', 95, 'anti-fungal', 10, '', 0),
('Konsultasi', 100, 'jasa', 10, 'Rp 50.000', 0),
('Loperamid', 100, 'Anti-Diare', 10, 'Rp 3.000/tab', 0),
('Methisoprinol', 100, 'obat lain', 10, '', 0),
('Methylprednisolon', 94, 'obat lain', 10, '', 0),
('Metronidazol', 99, 'anti-biotik', 10, 'Rp 10.000/1tab', 0),
('NaCl', 100, 'Operasi dll', 10, 'Rp 20.000', 0),
('Norit', 100, 'Anti-Diare', 10, 'Rp 2.000/tab', 0),
('OH (Operasi, Ab, salep, ranap 1 hari)', 100, 'Steril', 10, 'Rp 600.000', 0),
('Ondansentron', 99, 'obat lain', 10, '', 0),
('Partus Normal', 100, 'Partus', 10, 'Rp 250.000-350.000', 0),
('Phenobarbital', 100, 'obat lain', 10, '', 0),
('Prolaps Ani (Anastesi Lokal)', 100, 'Operasi dll', 10, 'Rp 250.000', 0),
('Prolaps Ani (Anestesi Total)', 100, 'Operasi dll', 10, 'Rp 300.000', 0),
('Prolaps Uteri (Anastesi Total)', 100, 'Operasi dll', 10, 'Rp 350.000', 0),
('Rawat Inap', 100, 'Operasi dll', 10, 'Rp 50.000 - Rp 100.000', 0),
('RC Babycat Ins', 100, 'Pakan dll', 10, 'Rp 20.000', 0),
('RC GI 2kg', 100, 'Pakan dll', 10, 'Rp 460.000', 0),
('RC GI 400gr', 100, 'Pakan dll', 10, 'Rp 98.000', 0),
('RC GI Kitten 185 gr', 100, 'Pakan dll', 10, 'Rp 55.000', 0),
('RC GI Kitten 400 gr', 100, 'Pakan dll', 10, 'Rp 110.000', 0),
('RC pouch', 100, 'Pakan dll', 10, 'Rp 30.000', 0),
('RC Recovery', 100, 'Pakan dll', 10, 'Rp 55.000', 0),
('RC Renal', 100, 'Pakan dll', 10, 'Rp 110.000', 0),
('RC Skin n Coat 1.5kg', 100, 'Pakan dll', 10, 'Rp 300.000', 0),
('RC Skin n Coat 400gr', 100, 'Pakan dll', 10, 'Rp 91.000', 0),
('RC Urinary 1.5kg', 100, 'Pakan dll', 10, 'Rp 330.000', 0),
('RC Urinary 400gr', 100, 'Pakan dll', 10, 'Rp 96.000', 0),
('Sesar', 100, 'Partus', 10, 'Rp 800.000-1.000.000', 0),
('Simparica', 100, 'Anti-Parasit', 10, 'Rp 50.000/kapsul', 0),
('Sucralfat', 100, 'obat lain', 10, '', 0),
('Tetes Mata', 99, 'obat lain', 10, 'Rp 25.000', 0),
('Tetes Telinga', 100, 'obat lain', 10, 'Rp 25.000', 0),
('Tramadol', 99, 'obat lain', 10, '', 0),
('Tutup pakan kaleng', 100, 'Pakan dll', 10, 'Rp 10.000', 0),
('Vitamin Imun', 97, 'obat lain', 10, 'Rp 15.000/botol', 0),
('Vitamin Nafsu Makan', 96, 'obat lain', 10, 'Rp 15.000/botol', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_expiredate`
--

CREATE TABLE `inventory_expiredate` (
  `id` int(11) NOT NULL,
  `exdate` date NOT NULL,
  `nama` varchar(500) NOT NULL,
  `exstock` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_expiredate`
--

INSERT INTO `inventory_expiredate` (`id`, `exdate`, `nama`, `exstock`) VALUES
(16, '2002-01-15', 'Doxycycline', 3),
(17, '2002-01-15', 'Ambroxol', 10),
(18, '2002-01-15', 'Vitamin Nafsu Makan', 1),
(19, '2002-01-15', 'Vitamin Imun', 1),
(20, '2002-01-15', 'Dexamethason', 1),
(21, '2002-01-15', 'Ciprofloxacin', 1),
(22, '2002-01-15', 'Kejibeling/Nefrolit', 7),
(23, '2002-01-15', 'Methylprednisolon', 5),
(24, '2002-01-15', 'Doxycycline', 1),
(25, '2002-01-15', 'Ondansentron', 1),
(26, '2002-01-15', 'Tramadol', 1),
(27, '2002-01-15', 'Inj. Antihistamin', 1),
(28, '2002-01-15', 'Inj. Vit', 1),
(29, '2002-01-15', 'Doxycycline', 1),
(30, '2002-01-15', 'Dexamethason', 1),
(31, '2002-01-15', 'Doxycycline', 1),
(32, '2002-01-15', 'Methylprednisolon', 1),
(33, '2002-01-15', 'Vitamin Imun', 1),
(34, '2002-01-15', 'Infus', 1),
(35, '2002-01-15', 'Tetes Mata', 1),
(36, '2002-01-15', 'Amox-Clav', 1),
(37, '2002-01-15', 'Vitamin Nafsu Makan', 1),
(38, '2002-01-15', 'Ambroxol', 1),
(39, '2002-01-15', 'Doxycycline', 1),
(40, '2002-01-15', 'Vitamin Imun', 1),
(41, '2002-01-15', 'Vitamin Nafsu Makan', 1),
(42, '2002-01-15', 'Enbatic', 1),
(43, '2002-01-15', 'Bioplasenton', 1),
(44, '2002-01-15', 'Amox-Clav', 1),
(45, '2002-01-15', 'Vitamin Nafsu Makan', 1),
(46, '2002-01-15', 'Ambroxol', 1),
(47, '2002-01-15', 'Advocat', 1),
(48, '2002-01-15', 'Itraconazol', 1),
(49, '2002-01-15', 'Doxycycline', 1),
(50, '2002-01-15', 'Ketoconazol', 1),
(52, '2002-01-15', 'Vitamin Imun', 4),
(53, '2002-01-15', 'Vitamin Imun', 3);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `ket_keluar` varchar(500) DEFAULT NULL,
  `tot_keluar` int(50) DEFAULT NULL,
  `ket_masuk` varchar(500) DEFAULT NULL,
  `tot_masuk` int(50) DEFAULT NULL,
  `jumlah_saldo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id`, `tanggal`, `ket_keluar`, `tot_keluar`, `ket_masuk`, `tot_masuk`, `jumlah_saldo`) VALUES
(2, '2024-08-19', 'obat a', 2000000, NULL, NULL, 8000000),
(3, '2024-08-01', NULL, NULL, 'modal', 10000000, 10000000),
(4, '0000-00-00', NULL, NULL, '0', 0, 0),
(5, '0000-00-00', NULL, NULL, '0', 0, 0),
(6, '2002-01-01', NULL, NULL, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mr`
--

CREATE TABLE `mr` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Anamnesa` varchar(500) NOT NULL,
  `Examination` varchar(500) NOT NULL,
  `diagnosa` varchar(500) NOT NULL,
  `Prognosa` varchar(500) DEFAULT NULL,
  `Therapy` varchar(500) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `dokter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mr`
--

INSERT INTO `mr` (`id`, `date`, `Anamnesa`, `Examination`, `diagnosa`, `Prognosa`, `Therapy`, `first_name`, `kondisi`, `dokter`) VALUES
(39, '2023-05-01', 'Sehat; mau steril; puasa 6 jam', 'testis turun 1; testis ke 2 di inguinal', 'crytorchidism', NULL, 'Castration <br>inj/ ketamin cc 0,35 <br>xylazin cc 0,35 <br> s.i.m.im <br>R/doxycyclin tab I <br> m.f.l.a caps X <br>s2 dd caps I ', 'keken', 'mr.jpg', 'digita'),
(40, '2023-05-01', 'gigi berkarang, mulut bau', 'karang gigi', 'karang gigi', NULL, 'scalling', 'keken', 'mr2 keken.jpg', 'digita'),
(46, '2023-03-27', 'Muntah; Lemas; tidak nafsu makan', 'VU distensi; Hallotossis; Dehidrasi; Pesakitan', 'FLUTD', NULL, 'kateter <br>infus NaCl <br>R/CIPROFLOXACIN HCl mg500 TABI <br>mfla.capsXVI <br>S2 dd capsI <br>R/Kejibeling TABV <br>S1 dd TABI<br> SI Urinary S/O', 'Mireng', '', 'digita'),
(47, '2023-05-08', 'Sehat; tidak birahi; mau steril', 'sehat', 'Ovariohisterektomy', NULL, 'OH <br>Infus NaCl <br>Ketamin cc0.3 <br>si.mm.im <br>SI XILAZIN cc0.3<br>R/Doxycycline Hyclate mg100 mfla caps VII<br>S2 dd caps I', 'Abu', 'abu mr.jpg', 'digita'),
(48, '2023-04-25', '1 minggu lalu dipasang kateter namun setelah itu kesadaran menurun tidak mau makan dan minum', 'Halotosis; ginjal membengkak; VU kosong; dehidrasi; <br>\r\nhasil pemeriksaan lab : <br>\r\n1. Creatingin meningkat(3.9 mg/dL) <br>\r\n2. BUN meningkat (>130 mg/dL)<br>\r\n3. AST meningkat (50U/L)', 'gagal ginjal', NULL, 'infus NaCl/ vitamin biosan TP (dirujuk ke klinik hewan mulya kudus)', 'Bom bom', '', 'digita'),
(49, '2023-04-24', 'Sehat; tidak birahi; mau steril', 'sehat', 'Ovariohisterektomy', NULL, 'OH\r\nInfus NaCl\r\nKetamin cc0.3\r\nsi.mm.im\r\nSI XILAZIN cc0.3\r\nR/Doxycycline Hyclate mg100 mfla caps VII\r\nS2 dd caps I', 'Ocil', 'ocil mr.jpg', 'digita'),
(50, '2023-05-08', 'sehat, mau steril', 'sehat', 'kastrasi', NULL, 'inj/ ketamin cc 0,35\r\nxylazin cc 0,35\r\ns.i.m.im\r\nR/doxycyclin tab I\r\nm.f.l.a caps X\r\ns2 dd caps I', 'Bendot', 'bendot mr.jpg', 'digita'),
(61, '2024-07-01', 'Pilek, kuning, muntah, tidak mau makan 1 hari', 'Pilek, kuning', 'Flu cat ', 'fausta', 'disuntik dan minum obat###Doxycycline = 3/15 ; Ambroxol = 10/15 ; Vitamin Nafsu Makan = 1/ ; Vitamin Imun = 1/ ; Dexamethason = 1/ ; ', 'Copu', '', 'digita'),
(62, '2024-07-25', 'Tidak bisa Kencing', 'Distensi VU', 'VLUTD', 'Fausta', 'Kateter###Ciprofloxacin = 1/ ; Kejibeling/Nefrolit = 7/ ; Methylprednisolon = 5/ ; ', 'louis', '', 'digita'),
(63, '2024-07-01', 'Tidak mau makan, ngiler', 'Ginggivitis', 'calici virus', 'Dubius', 'infus, minum obat###Doxycycline = 1/ ; Ondansentron = 1/ ; Tramadol = 1/ ; ', 'reno', '', 'digita'),
(64, '2024-07-25', 'mau makan minum, -1 hari ngiler', 'hypersalifasi, kalkulus di gigi, suhu 37.9 C', 'ginggifitis kalisi virus', 'fausta', 'suntik, obat###Inj. Antihistamin = 1/ ; Inj. Vit = 1/ ; Doxycycline = 1/ ; Dexamethason = 1/ ; ', 'brownies', '', 'digita'),
(65, '2024-07-25', 'mata keluar air, mau makan', 'mata bengkak kemerahan', 'infeksi mata', 'fausta', 'obat tetes dan minum obat###Doxycycline = 1/ ; Methylprednisolon = 1/ ; Vitamin Imun = 1/ ; ', 'muiza', '', 'digita'),
(66, '2024-07-25', 'lemas', 'kurus, malnutrisi, dehidrasi', 'parasit darah', 'infausta', 'infus###Infus = 1/ ; ', 'loreng', '', 'digita'),
(67, '2024-07-25', 'pilek', 'pilek', 'pilek', 'fausta', '###Tetes Mata = 1/ ; Amox-Clav = 1/ ; Vitamin Nafsu Makan = 1/ ; Ambroxol = 1/ ; ', 'kiwi', '', 'digita'),
(68, '2024-07-25', 'luka terbuka', 'luka terbuka', 'luka terbuka', 'fausta', 'obat###Doxycycline = 1/ ; Vitamin Imun = 1/ ; Vitamin Nafsu Makan = 1/ ; Enbatic = 1/ ; Bioplasenton = 1/ ; ', 'jaiput', '', 'digita'),
(69, '2024-07-26', 'batuk', 'batuk, pilek ', 'batuk, pilek', 'fausta', 'obat###Amox-Clav = 1/ ; Vitamin Nafsu Makan = 1/ ; Ambroxol = 1/ ; ', 'koko', '', 'digita'),
(70, '2024-07-25', 'telinga bawah merah', 'jamur', 'jamur, kutu', 'fausta', '###Advocat = 1/ ; Itraconazol = 1/ ; ', 'rocky', '', 'digita'),
(81, '2024-08-17', 'adf', 'sddsg', 'rgre', 'Qdfsgfrew', 'suntik###Itraconazol = 1/ ; Cefadroxil = 1/ ; Amox-Clav = 1/ ; ', 'tes', 'download.jpg', 'digita'),
(82, '2024-08-17', '', '', '', '', '###Ketoconazol = 1/ ; Metronidazol = 1/ ; Doxycycline = 1/ ; ', 'tes', '', 'digita');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `href` varchar(50) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tes` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `designation` varchar(15) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `dokter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `href`, `first_name`, `last_name`, `email`, `tes`, `gender`, `designation`, `joining_date`, `dokter`) VALUES
(100013, '', 'Rio', 'Iqbal', 'Kudus', '123', 'kucing Persia; Jantan; 7 tahun; rambut lebat', '0895384207858', '0000-00-00', ''),
(100019, '', 'tes', 'alghani', 'kudus', '123', 'kucing BSH(British Short Hair); Betina; 3 bulan; ', '0895384207858', '0000-00-00', ''),
(100021, '', 'moli', 'rosyid', 'dawe', '123', 'kucing Persia; Betina; 2 tahun; rambut lebat', '0895384207858', '0000-00-00', ''),
(100022, '', 'oreio', 'fachri', 'jekulo', '123', 'kucing Dom; Jantan; 1 tahun; ', '0895384207858', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_ditolak`
--

CREATE TABLE `reservasi_ditolak` (
  `id` int(11) NOT NULL,
  `href` varchar(50) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tes` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `designation` varchar(15) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `dokter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_ver`
--

CREATE TABLE `reservasi_ver` (
  `id` int(11) NOT NULL,
  `href` varchar(50) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tes` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `designation` varchar(15) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `dokter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi_ver`
--

INSERT INTO `reservasi_ver` (`id`, `href`, `first_name`, `last_name`, `email`, `tes`, `gender`, `designation`, `joining_date`, `dokter`) VALUES
(100019, 'jam 4 sore', 'tes', 'Alghani', 'alghani.iqbal@gmail.com', '123', '; ; ; ', '0895384207858', '2024-09-07', 'drh Ariq'),
(100021, 'jam 8 malam', 'moli', 'rosyid', 'dawe', '123', 'kucing Persia; Betina; 2 tahun; rambut lebat', '0895384207858', '2024-08-23', 'drh Digita'),
(100022, 'jam 7 malam', 'oreio', 'fachri', 'jekulo', '123', 'kucing Dom; Jantan; 1 tahun; ', '0895384207858', '2024-08-23', 'drh Digita');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id`, `sn`, `price`) VALUES
(27, 'cat_steril', 0),
(29, 'check_up', 0),
(30, 'gigi_berkarang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `therapy` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `fn`, `jumlah`, `price`) VALUES
(21, 'wiskas', 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('Digit', 'rt4/1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `first_name` (`first_name`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `inventory_expiredate`
--
ALTER TABLE `inventory_expiredate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_namaObat` (`nama`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mr`
--
ALTER TABLE `mr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_name` (`first_name`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `first_name` (`first_name`);

--
-- Indexes for table `reservasi_ditolak`
--
ALTER TABLE `reservasi_ditolak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi_ver`
--
ALTER TABLE `reservasi_ver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100011;

--
-- AUTO_INCREMENT for table `inventory_expiredate`
--
ALTER TABLE `inventory_expiredate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mr`
--
ALTER TABLE `mr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100023;

--
-- AUTO_INCREMENT for table `reservasi_ditolak`
--
ALTER TABLE `reservasi_ditolak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100020;

--
-- AUTO_INCREMENT for table `reservasi_ver`
--
ALTER TABLE `reservasi_ver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100023;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_expiredate`
--
ALTER TABLE `inventory_expiredate`
  ADD CONSTRAINT `FK_namaObat` FOREIGN KEY (`nama`) REFERENCES `inventory` (`nama`);

--
-- Constraints for table `mr`
--
ALTER TABLE `mr`
  ADD CONSTRAINT `mr_ibfk_1` FOREIGN KEY (`first_name`) REFERENCES `employees` (`first_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
