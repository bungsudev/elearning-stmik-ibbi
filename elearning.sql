-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2019 pada 22.00
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblabsensi`
--

CREATE TABLE `tblabsensi` (
  `idabsensi` int(11) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `kelas` enum('P1','P2','M1') NOT NULL,
  `nim` varchar(10) NOT NULL,
  `namamhs` varchar(50) NOT NULL,
  `kelompok` int(11) NOT NULL,
  `a1` enum('Hadir','Tidak') DEFAULT NULL,
  `a2` enum('Hadir','Tidak') DEFAULT NULL,
  `a3` enum('Hadir','Tidak') DEFAULT NULL,
  `a4` enum('Hadir','Tidak') DEFAULT NULL,
  `a5` enum('Hadir','Tidak') DEFAULT NULL,
  `a6` enum('Hadir','Tidak') DEFAULT NULL,
  `a7` enum('Hadir','Tidak') DEFAULT NULL,
  `a8` enum('Hadir','Tidak') DEFAULT NULL,
  `a9` enum('Hadir','Tidak') DEFAULT NULL,
  `a10` enum('Hadir','Tidak') DEFAULT NULL,
  `a11` enum('Hadir','Tidak') DEFAULT NULL,
  `a12` enum('Hadir','Tidak') DEFAULT NULL,
  `a13` enum('Hadir','Tidak') DEFAULT NULL,
  `a14` enum('Hadir','Tidak') DEFAULT NULL,
  `a15` enum('Hadir','Tidak') DEFAULT NULL,
  `a16` enum('Hadir','Tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblabsensi`
--

INSERT INTO `tblabsensi` (`idabsensi`, `kodemk`, `kelas`, `nim`, `namamhs`, `kelompok`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`) VALUES
(154, 'MK1', 'P1', '1513121453', 'FADLY KHOIR', 1, 'Hadir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'MK1', 'P1', '1513121462', 'RICKY DHARMAWAN', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'MK1', 'P1', '1513121464', 'DICKY J.O. PANJAITAN', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'MK1', 'P1', '1513121526', 'TIOFANI GULTOM', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'MK1', 'P1', '1513121452', 'SONI PRIBADI', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'MK1', 'P1', '1513121471', 'KIREN HARIHARAN', 2, NULL, NULL, NULL, 'Hadir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'MK1', 'P1', '1513121486', 'MURSAL', 2, NULL, NULL, NULL, 'Hadir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'MK1', 'P1', '1513121502', 'YUSUF HIA', 2, NULL, NULL, NULL, 'Hadir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'MK1', 'P1', '1513121497', 'AL AZMI', 2, 'Hadir', 'Hadir', NULL, 'Hadir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'MK2', 'P1', '1513121472', 'KENNYPAL SINGH', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'MK2', 'P1', '1513121481', 'INDRA ALFIAN PURBA', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'MK2', 'P1', '1513121499', 'REUNOUARD RIZKI H', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'MK2', 'P1', '1513121454', 'JAN HEPPY MANALU', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE `tbladmin` (
  `idadmin` int(11) NOT NULL,
  `namaadmin` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `status` enum('admin','dosen') NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbladmin`
--

INSERT INTO `tbladmin` (`idadmin`, `namaadmin`, `alamat`, `email`, `tanggallahir`, `agama`, `jekel`, `telepon`, `status`, `password`) VALUES
(123456, 'Admin', 'Medan, Sumatera Utara', 'admin@gmmail.com', '1990-04-05', 'Lainnya', 'L', '06141222', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(107098601, 'Dr. Hartono, S.Kom., M.Kom., IPM', 'Medan,Sumatra utara', 'hartono@gmail.com', '1980-01-01', 'Buddha', 'L', '061123123', 'dosen', 'e10adc3949ba59abbe56e057f20f883e'),
(112097201, 'Sukiman, S.T., M.T., IPM', 'Medan, Sumatra Utara', 'sukman@gmail.com', '1980-01-01', 'Buddha', 'L', '06111111', 'dosen', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldiskusi`
--

CREATE TABLE `tbldiskusi` (
  `iddiskusi` int(11) NOT NULL,
  `idmateri` int(11) NOT NULL,
  `userid` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `komentar` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbldiskusi`
--

INSERT INTO `tbldiskusi` (`iddiskusi`, `idmateri`, `userid`, `nama`, `komentar`, `tanggal`) VALUES
(85, 153, '112097201', 'Sukiman, S.T., M.T., IPM', '<p>Mohon jawab Tugas untuk absensi Anda,&nbsp; terimakasih</p>\r\n', '2019-08-04 13:32:54'),
(87, 153, '1513121497', 'AL AZMI', '<blockquote><strong>Sukiman, S.T., M.T., IPM </strong>:\r\n<p>Mohon jawab Tugas untuk absensi Anda,&nbsp; terimakasih</p>\r\n</blockquote>\r\n\r\n<p>Baik, Sir..</p>\r\n', '2019-08-04 13:43:02'),
(88, 153, '1513121497', 'AL AZMI', '<p>Menurut saya,&nbsp;pengertian teknologi&nbsp;adalah&nbsp;ilmu pengetahuan yang mempelajari tentang keterampilan dalam menciptakan alat, metode pengolahan, dan ekstraksi benda, untuk membantu menyelesaikan berbagai permasalahan dan pekerjaan manusia sehari-hari.</p>\r\n\r\n<p>Adapun aspeknya dapat dijelaskan pada gambar berikut:</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/Aspek%2BDasar%2BSistem%2BKomputerisasi.jpg\" style=\"height:300px; width:400px\" /></p>\r\n', '2019-08-04 13:45:52'),
(93, 153, '1513121453', 'FADLY KHOIR', '<p>Fungsi dari&nbsp;<strong>teknologi informasi</strong>&nbsp;adalah menangkap, mengolah, menghasilkan, menyimpan dan mencari kembali data. Dan&nbsp;<strong>peranan</strong>&nbsp;dari&nbsp;<strong>teknologi informasi</strong>adalah fungsi operasional, fungsi monitoring and control, fungsi planning and decision dan fungsi communication.</p>\r\n\r\n<p>Lebih lengkapnya sebagai berikut :&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/peranan.jpg\" style=\"height:375px; width:500px\" /></p>\r\n', '2019-08-11 02:57:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldosen`
--

CREATE TABLE `tbldosen` (
  `iddosen` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblgambar`
--

CREATE TABLE `tblgambar` (
  `idgambar` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `file` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblgambar`
--

INSERT INTO `tblgambar` (`idgambar`, `nim`, `file`) VALUES
(46, '123456', '123456.jpg'),
(94, '1513121453', '1513121453.jpg'),
(95, '1513121462', '1513121462.jpg'),
(96, '1513121464', '1513121464.jpg'),
(97, '1513121526', '1513121526.jpg'),
(98, '1513121452', '1513121452.jpg'),
(99, '1513121471', '1513121471.jpg'),
(100, '1513121486', '1513121486.jpg'),
(101, '1513121502', '1513121502.jpg'),
(107, '1513121497', '1513121497.jpg'),
(108, '1513121472', '1513121472.jpg'),
(109, '1513121481', '1513121481.jpg'),
(110, '1513121499', '1513121499.jpg'),
(111, '1513121454', '1513121454.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmahasiswa`
--

CREATE TABLE `tblmahasiswa` (
  `nim` varchar(10) NOT NULL,
  `namamhs` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Lainnya') NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `kelas` enum('P1','P2','M1') NOT NULL,
  `password` varchar(100) NOT NULL,
  `file` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmahasiswa`
--

INSERT INTO `tblmahasiswa` (`nim`, `namamhs`, `alamat`, `email`, `tanggallahir`, `agama`, `jekel`, `telepon`, `prodi`, `semester`, `kelas`, `password`, `file`) VALUES
('1513121452', 'SONI PRIBADI', 'Desa Sidomulyo Dusun V Kec. Sibiru-biru', 'sonipribadi1995@gmail.com', '1996-09-09', 'Islam', 'L', '082384928052', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121453', 'FADLY KHOIR', 'P.Brandan/Jl.Irian Barat/Gg.Keleng/Depan Masjid Nurul Iman', 'fadlykhoir5@gmail.com', '1996-05-07', 'Islam', 'L', '081269335855', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121454', 'JAN HEPPY MANALU', 'JL.Ngalengko GG.Saudara no.51', 'janheppy1997@gmail.com', '1996-12-11', 'Kristen', 'L', '082285583294', 'SI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121462', 'RICKY DHARMAWAN', 'Jln. Stasiun Kp.lalang', 'rickyeljavier226@gmail.com', '1997-06-07', 'Islam', 'L', '081360874849', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121464', 'DICKY J.O. PANJAITAN', 'Jl. Garuda (Aksara) No. 49 B', 'dickypanjaitan1@gmail.com', '1996-12-11', 'Kristen', 'L', '082277389864', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121471', 'KIREN HARIHARAN', 'Jl. S.parman lorong baru no 1', 'hariharankiren@gmail.com', '1996-05-11', 'Hindu', 'L', '082273651680', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121472', 'KENNYPAL SINGH', 'Jln. Hindu no 21', 'kennypalsinghbhuller@gmail.com', '1996-01-01', 'Lainnya', 'L', '082276401114', 'SI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121481', 'INDRA ALFIAN PURBA', 'Dolok sanggul', 'alpurba6@gmail.com', '1996-06-18', 'Kristen', 'L', '082274555990', 'SI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121486', 'MURSAL', 'Desa Lango Kec.Pante Ceureumen Kab. Aceh Barat', 'murshal888@gmail.com', '1996-01-01', 'Islam', 'L', '082273462756', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121497', 'AL AZMI', 'Jl. Marelan raya, Psr.5 Gg.Jala IX Lor. Cempaka', 'amialazmi@gmail.com', '1996-07-11', 'Islam', 'P', '081774124643', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121499', 'REUNOUARD RIZKI H', 'Jl.Yayasan Perumahan Tata Alam Asri no. D30', 'renorizki46@gmail.com', '1996-01-01', 'Kristen', 'L', '082239856330', 'SI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121502', 'YUSUF HIA', 'JL. PLATINA 1 GG IMPRES TUAN KADI TITIPAPAN', 'yusuf.hia7@gmail.com', '1996-06-12', 'Kristen', 'L', '085261572617', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('1513121526', 'TIOFANI GULTOM', 'Jln. menteng 7 gg buntu no 5', 'tiog33@yahoo.co.id', '1997-01-05', 'Kristen', 'P', '06113123', 'TI', '1', 'P1', 'e10adc3949ba59abbe56e057f20f883e', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmatakuliah`
--

CREATE TABLE `tblmatakuliah` (
  `kodemk` varchar(20) NOT NULL,
  `namamk` varchar(50) NOT NULL,
  `iddosen` int(11) NOT NULL,
  `namadosen` varchar(50) NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmatakuliah`
--

INSERT INTO `tblmatakuliah` (`kodemk`, `namamk`, `iddosen`, `namadosen`, `prodi`, `semester`) VALUES
('MK1', 'Pengantar Informatika', 112097201, 'Sukiman, S.T., M.T., IPM', 'TI', '1'),
('MK2', 'Pengantar Teknologi Informatika', 107098601, 'Dr. Hartono, S.Kom., M.Kom., IPM', 'SI', '1'),
('MK3', 'Paket Program Niaga II', 112097201, 'Sukiman, S.T., M.T., IPM', 'TI', '2'),
('MK4', 'Paket Program Niaga II', 112097201, 'Sukiman, S.T., M.T., IPM', 'SI', '2'),
('MK5', 'Analisa Proses Bisnis', 107098601, 'Dr. Hartono, S.Kom., M.Kom., IPM', 'SI', '3'),
('MK6', 'Organisasi dan Arsitektur Komputer', 112097201, 'Sukiman, S.T., M.T., IPM', 'TI', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmatakuliah_sec`
--

CREATE TABLE `tblmatakuliah_sec` (
  `kodemk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmatakuliah_sec`
--

INSERT INTO `tblmatakuliah_sec` (`kodemk`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmateri`
--

CREATE TABLE `tblmateri` (
  `idmateri` int(11) NOT NULL,
  `idpengirim` varchar(25) NOT NULL,
  `namapengirim` varchar(50) NOT NULL,
  `matakuliah` varchar(100) NOT NULL,
  `judulmateri` mediumtext NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `file` longtext NOT NULL,
  `tipe` enum('m','d') DEFAULT NULL,
  `prodi` enum('TI','SI') DEFAULT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `pertemuan` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblmateri`
--

INSERT INTO `tblmateri` (`idmateri`, `idpengirim`, `namapengirim`, `matakuliah`, `judulmateri`, `tanggal`, `file`, `tipe`, `prodi`, `semester`, `pertemuan`) VALUES
(140, '123456', 'Admin', 'MK1', 'Pengantar Informatika', '2019-08-03 20:40:34', 'Pengantar_Informatika.pdf', 'm', 'TI', '1', NULL),
(141, '123456', 'Admin', 'MK1', 'Pemodelan sistem perangkat lunak', '2019-08-03 21:40:34', 'Pemodelan_sistem_perangkat_lunak.pdf', 'm', 'TI', '1', NULL),
(142, '123456', 'Admin', 'MK1', 'Strukturisasi kebutuhan', '2019-08-03 21:41:58', 'Strukturisasi_Kebutuhan.pdf', 'm', 'TI', '1', NULL),
(151, '123456', 'Admin', 'MK1', 'Bagan struktur', '2019-08-03 22:01:48', 'Bagan_Struktur.pdf', 'm', 'TI', '1', NULL),
(153, '112097201', 'Sukiman, S.T., M.T., IPM', 'MK1', 'Perkembangan Komputer', '2019-08-04 03:28:34', '<p style=\"margin-left:160px\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/Drawing1.jpg\" style=\"height:225px; width:500px\" /></p>\r\n\r\n<p>Untuk pertemuan awal ini coba saudara diskusikan materi-materi berikut ini:</p>\r\n\r\n<ul>\r\n	<li>Pengertian Teknologi.</li>\r\n	<li>Jelaskan 3 Aspek Dasar Sistem Komputer!</li>\r\n	<li>Peranan Teknologi Informasi.</li>\r\n</ul>\r\n', 'd', 'TI', '1', '1'),
(154, '112097201', 'Sukiman, S.T., M.T., IPM', 'MK1', 'Dasar Sistem Komputer', '2019-08-04 03:30:10', '<p>Untuk Pertemuan Minggu ke-2&nbsp;coba anda diskusikan mengenai istilah berikut:</p>\r\n\r\n<ol>\r\n	<li>CPU</li>\r\n	<li>ROM</li>\r\n	<li>RAM</li>\r\n	<li>ATM</li>\r\n	<li>PDA</li>\r\n	<li>CT Scan</li>\r\n	<li>Embedded IT System</li>\r\n	<li>Dedicated IT System</li>\r\n</ol>\r\n', 'd', 'TI', '1', '2'),
(155, '112097201', 'Sukiman, S.T., M.T., IPM', 'MK1', 'Piranti Keras dan Cara Merakitnya', '2019-08-04 03:34:13', '<p>Komponen perakit komputer tersedia di pasaran dengan beragam pilihan kualitas dan harga. Dengan merakit sendiri komputer, kita dapat menentukan jenis komponen, kemampuan serta fasilitas dari komputer sesuai kebutuhan.Tahapan dalam perakitan komputer terdiri dari:</p>\r\n\r\n<p>A. Persiapan<br />\r\nB. Perakitan<br />\r\nC. Pengujian<br />\r\nD. Penanganan Masalah</p>\r\n\r\n<p>Coba diskusikan mengenai hal diatas</p>\r\n\r\n<p style=\"margin-left:320px\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/8310727_20160116011919.jpg\" style=\"float:left; height:221px; width:200px\" /></p>\r\n', 'd', 'TI', '1', '3'),
(156, '112097201', 'Sukiman, S.T., M.T., IPM', 'MK1', 'Media Penyimpanan Data Berkinerja Tinggi', '2019-08-04 03:37:14', '<p style=\"margin-left:320px\"><img alt=\"\" src=\"http://localhost/online/assets/ckfinder/userfiles/files/8310727_20160116011919.jpg\" style=\"height:221px; width:200px\" /></p>\r\n\r\n<p>Diskusikan tentang:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;Media Penyimpanan Magnetik (Magnetik Storage Media)</li>\r\n	<li>Media Penyimpanan Optical (Optical Disk)</li>\r\n	<li>Apa kelebihan Unicode terhadap ASCII dan EBCDIC?</li>\r\n	<li>Jelaskan perbedaan ROM dan RAM.</li>\r\n	<li>Apa yang dimaksud dengan embedded computer?</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', 'd', 'TI', '1', '4'),
(157, '123456', 'Admin', 'MK2', 'Pengantar teknologi informatika', '2019-08-03 22:49:45', 'Pengantar_Informatika.pdf', 'm', 'SI', '1', NULL),
(158, '123456', 'Admin', 'MK2', 'Konsep sistem informasi', '2019-08-03 22:50:06', 'Konsep_Sistem_Informasi.pdf', 'm', 'SI', '1', NULL),
(159, '107098601', 'Dr. Hartono, S.Kom., M.Kom., IPM', 'MK2', 'Pengantar Informasi', '2019-08-04 03:51:33', '<p>Terdapat beberapa definisi, antara lain :</p>\r\n\r\n<ol start=\"1\">\r\n	<li>Data yang diolah menjadi bentuk yang lebih berguna dan lebih berarti bagi yang menerimanya.</li>\r\n	<li>Sesuatu yang nyata atau setengah nyata yang dapat mengurangi derajat ketidakpastian tentang suatu keadaan atau kejadian. Sebagai contoh, informasi yang menyatakan bahwa nilai rupiah akan naik, akan mengurangi ketidakpastian mengenai jadi tidaknya sebuah investasi akan dilakukan.</li>\r\n	<li>Data organized to help choose some current or future action or nonaction to fullfill company goals (the choice is called business decision making).</li>\r\n</ol>\r\n\r\n<p>Coba diskusikan</p>\r\n', 'd', 'SI', '1', '1'),
(160, '107098601', 'Dr. Hartono, S.Kom., M.Kom., IPM', 'MK2', 'Pengenalan sistem informasi', '2019-08-04 03:52:33', '<p>Coba diskusikan mengenai pemanfaatan Manajemen dan Model Keputusan!</p>\r\n', 'd', 'SI', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpengumuman`
--

CREATE TABLE `tblpengumuman` (
  `idpengumuman` int(11) NOT NULL,
  `idpengirim` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpengumuman`
--

INSERT INTO `tblpengumuman` (`idpengumuman`, `idpengirim`, `nama`, `isi`, `tanggal`) VALUES
(24, '112097201', 'Sukiman, S.T., M.T., IPM', '<p style=\"text-align:justify\"><span style=\"font-size:22px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>PENGUMUMAN</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:14px\">No. 055/EM/Ka-ST/P/V/2016</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Diberitahukan kepada seluruh Mahasiswa/i STMIK IBBI mulai dari T.A. 2015/2016 ke atas. Untuk mempersiapkan jenjang karir, Mahasiswa disarankan dan wajib menghadiri Seminar Umum/Seminar Pengembangan Profesional (Professional Development Seminar) sekali (1x) dalam satu tahun akademik sesuai dengan jurusan yang diambilnya. Narasumber adalah para ahli yang profesional, handal dan berhasil di bidangnya, sehingga bisa memberikan inspirasi yang berkarakter dan terkini kepada para mahasiswa IBBI.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Seminar Pengembangan ini adalah sarana yang mendukung Mahasiswa IBBI untuk up to date dengan berita dan situasi terkini, berkarakter dan mengaplikasikannya di dunia kerja secara profesional. </span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Adapun Topik Seminar untuk mahasiswa STMIK IBBI adalah yang berhubungan dengan Perangkat Lunak (Software), Perangkat Keras (Hardware) dan Perangkat Pelaksana/Pengguna (Brainware) antara lain: Sistem Informasi, Ilmu Komputer, Multimedia, Desain Grafis, Animasi, Database, Programming, Web, Mobile Application, Open Source, Operating System, Cloud Computing, Networking, Keamanan Komputer, Smart Machines, Perkembangan Teknologi Informasi &amp; Komunikasi terbaru dsbnya. Tujuan mengikuti Seminar ini adalah dalam rangka peningkatan pengetahuan, wawasan, dan informasi baru bagi mahasiswa/i STMIK IBBI. Demikian pengumuman ini disampaikan untuk dipatuhi &amp; dilaksanakan.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Medan, 30 Mei 2016 </span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">STMIK IBBI </span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Ketua, Ir. B. Ricson Simarmata, MSEE, IPM</span></span></p>\r\n', '2019-08-08 11:45:47'),
(25, '123456', 'Admin', '\r\n			<p><strong>Ujian Akhir Semester akan dilaksanakan Sesuai Jadwal UAS pada papan pengumuman.</strong></p>\r\n\r\n			<p>Pakaian : Baju Putih + Celana/Rok Hitam + Sepatu.<br />\r\n			Sifat Ujian : Open Book.</p>\r\n\r\n			<p>Materi dari forum diskusi dan materi online.<br />\r\n			Perhatikan Menu (List) untuk melihat Absensi, Jumlah maksimal tidak kumpul tugas = 4. Bagi mahasiswa yang jumlah Absen &gt; 4, maka Nilai UAS = 0 (Nol).</p>\r\n\r\n			<p>SELAMA KITA MASIH PUNYA TEKAD YANG TERPELIHARA DALAM SEMANGAT, MAKA TIADA KATA TERLAMBAT MEMULAI SEBUAH AWAL YANG BARU!</p>\r\n			', '2019-08-08 12:02:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblriwayatnilai`
--

CREATE TABLE `tblriwayatnilai` (
  `idnilai` int(11) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tipesoal` enum('e','p') NOT NULL,
  `tipetugas` enum('quiz','tugas','uts','kelompok') NOT NULL,
  `idsoal` varchar(50) NOT NULL,
  `nosoal` int(11) NOT NULL,
  `isisoal` longtext NOT NULL,
  `jawabesai` longtext,
  `jawabpilgan` enum('a','b','c','d') DEFAULT NULL,
  `a` longtext,
  `b` longtext,
  `c` longtext,
  `d` longtext,
  `status` enum('proses','belum','selesai') NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `kelompok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblriwayatnilai`
--

INSERT INTO `tblriwayatnilai` (`idnilai`, `kodemk`, `nim`, `nama`, `tipesoal`, `tipetugas`, `idsoal`, `nosoal`, `isisoal`, `jawabesai`, `jawabpilgan`, `a`, `b`, `c`, `d`, `status`, `nilai`, `tanggal`, `kelompok`) VALUES
(218, 'MK1', '1513121497', 'AL AZMI', 'e', 'quiz', '1', 1, 'Sebutkan dan jelaskan 3 fungsi utama sistem operasi!\r\n', '<ol>\r\n	<li style=\"text-align: justify;\">Manajemen Proses&nbsp;: mencakup penyiapan, penjadwalan dan pemantauan proses pada komputer.</li>\r\n	<li style=\"text-align: justify;\">Manajemen Sumber Daya&nbsp;: berkaitan dengan pengendalian terhadap software system dan software application.</li>\r\n	<li style=\"text-align: justify;\">Manajemen Data&nbsp;: berupa pengendalian terhadap data masukan/keluaran.</li>\r\n</ol>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 90, '2019-08-05 22:36:03', NULL),
(219, 'MK1', '1513121497', 'AL AZMI', 'e', 'quiz', '1', 2, 'Apa yang dimaksud dengan peranti peripheral dan jelaskan dua tahap penginstallannya!\r\n', '<p style=\"text-align:justify\">Peranti peripheral&nbsp;yaitu komponen tambahan atau pendukung yang berfungsi untuk mendukung kerja komputer sehingga fungsi kerja komputer menjadi maksimal.</p>\r\n\r\n<p style=\"text-align:justify\">Dua tahap penginstallannya :</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Instalasi secara fisik&nbsp;: meliputi pemasangan peranti peripheral dengan baik dan benar.</li>\r\n	<li style=\"text-align: justify;\">Instalasi secara&nbsp;Software&nbsp;: meliputi pengenalan peripheral terhadap sistem operasi yaitu dengan menginstall driver yang dibutuhkan.</li>\r\n</ol>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 90, '2019-08-05 22:36:03', NULL),
(220, 'MK1', '1513121497', 'AL AZMI', 'e', 'quiz', '1', 3, 'Sebutkan pengelompokan teknologi informasi!\r\n', '<p>Teknologi komunikasi, masukan, keluaran, pemprosesan, perangkat lunak, dan penyimpanan</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 90, '2019-08-05 22:36:03', NULL),
(221, 'MK1', '1513121497', 'AL AZMI', 'e', 'quiz', '1', 4, 'Jelaskan apa yang dimaksud dengan kecerdasan buatan artificial intelligence?\r\n', '<p style=\"text-align:justify\">Artificial intelligence&nbsp;atau kecerdasan buatan adalah suatu pengetahuan yang membuat komputer dapat&nbsp; meniru kecerdasan manusia sehingga diharapkan komputer (atau berupa suatu mesin) dapat melakukan hal-hal yang apabila dikerjakan manusia memerlukan kecerdasan&nbsp; yang mana tujuan dari IA&nbsp; tidak hanya membuat komputer dapat berfikir saja, tetapi bisa melihat, mendengar, berjalan, dan bermain. misalnya melakukan penalaran untuk mencapai suatu kesimpulan atau melakukan translasi dari sutu bahasa manusia ke bahan manusia yang lain.</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 90, '2019-08-05 22:36:03', NULL),
(222, 'MK1', '1513121497', 'AL AZMI', 'e', 'quiz', '1', 5, 'Jelaskan apa yang dimaksud dengan device driver!\r\n', '<p>Device driver&nbsp;adalah program yang berfungsi untuk membantu komputer mengendalikan peranti-peranti peripheral.</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 90, '2019-08-05 22:36:03', NULL),
(223, 'MK1', '1513121497', 'AL AZMI', 'p', 'tugas', '2', 1, '<p>Suatu jaringan komputer yang menghubungkan suatu komputer dengan komputer lain dengan jarak yang terbatas disebut dengan?</p>\r\n', NULL, 'a', 'LAN\r\n', 'WAN\r\n', 'MAN\r\n', 'PAN\r\n', 'proses', 0, '2019-08-05 22:36:03', NULL),
(224, 'MK1', '1513121497', 'AL AZMI', 'p', 'tugas', '2', 2, '<p>Pihak yang meminta layanan disebut?</p>\r\n', NULL, 'b', 'Server\r\n', 'Komputer\r\n', 'Client\r\n', 'Bus\r\n', 'proses', 0, '2019-08-05 22:36:03', NULL),
(225, 'MK1', '1513121497', 'AL AZMI', 'p', 'tugas', '2', 3, '<p>Berdasarkan fungsinya ada berapakah jenis jaringan computer?</p>\r\n', NULL, 'b', '6\r\n', '5\r\n', '3\r\n', '2\r\n', 'proses', 0, '2019-08-05 22:36:03', NULL),
(226, 'MK1', '1513121497', 'AL AZMI', 'p', 'tugas', '2', 4, '<p>&nbsp;Apa yang dimaksud dengan peer to peer?</p>\r\n', NULL, 'c', 'Yaitu jaringan komputer dimana setiap host dapat menjadi server dan juga<br>\r\nmenjadi client secara bersamaan.\r\n', 'Jaringan komputer dengan komputer yang didedikasikan khusus sebagai server.\r\n', 'sebuah sistem yang terdiri atas komputer dan perangkat jaringan lainnya yang bekerja bersama-sama untuk mencapai suatu tujuan yang sama\r\n', 'Merupakan perpaduan beberapa jaringan terpusat sehingga terdapat beberapa komputer server yang saling berhubungan dengan klient membentuk sistem jaringan tertentu.\r\n', 'proses', 0, '2019-08-05 22:36:03', NULL),
(227, 'MK1', '1513121497', 'AL AZMI', 'p', 'tugas', '2', 5, '<p>Apakah yang dimaksud dengan jaringan wan?</p>\r\n', NULL, 'c', 'Jaringan yang mencakup satu kota besar beserta daerah setempat.\r\n', 'Jaringan yang menghubungkan 2 komputer atau lebih dalam cakupan\r\n', 'Merupakan jaringan dengan cakupan seluruh dunia\r\n', 'Merupakan jaringan kampus\r\n', 'proses', 0, '2019-08-05 22:36:03', NULL),
(248, 'MK1', '1513121471', 'KIREN HARIHARAN', 'e', 'kelompok', '4', 1, 'Kelompok 1 : Buat Makalah Mengenai AI\r\n\r\nKelompok 2 : Buat Makalah Mengenai Microcontroller\r\n\r\nKelompok 3 : Buat Makalah Mengenai Teknologi Berkembang 4.0\r\n\r\nKelompok 4 : Buat Makalah Mengenai Logika Fuzzy\r\n', '<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Pengendali mikro</strong>&nbsp;(<a href=\"https://id.wikipedia.org/wiki/Bahasa_Inggris\" style=\"color:#0563c1; text-decoration:underline\" title=\"Bahasa Inggris\"><span style=\"color:blue\">bahasa Inggris</span></a>:&nbsp;<em>microcontroller</em>) adalah sistem mikroprosesor lengkap yang terkandung di dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sirkuit_terpadu\" style=\"color:#0563c1; text-decoration:underline\" title=\"Sirkuit terpadu\"><span style=\"color:blue\">chip</span></a>. Mikrokontroler berbeda dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Mikroprosesor\" style=\"color:#0563c1; text-decoration:underline\" title=\"Mikroprosesor\"><span style=\"color:blue\">mikroprosesor</span></a>&nbsp;serba guna yang digunakan dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Komputer_pribadi\" style=\"color:#0563c1; text-decoration:underline\" title=\"Komputer pribadi\"><span style=\"color:blue\">PC</span></a>, karena di dalam sebuah mikrokontroler umumnya juga telah berisi komponen pendukung sistem minimal mikroprosesor, yakni memori dan antarmuka I/O, sedangkan di dalam mikroprosesor umumnya hanya berisi&nbsp;<a href=\"https://id.wikipedia.org/wiki/CPU\" style=\"color:#0563c1; text-decoration:underline\" title=\"CPU\"><span style=\"color:blue\">CPU</span></a>&nbsp;saja.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sistem komputer dewasa ini paling banyak justru terdapat di dalam peralatan lain, seperti telepon, jam, perangkat rumah tangga, kendaraan, dan bangunan. Sistem&nbsp;<em>embedded</em>biasanya mengandung syarat minimal sebuah sistem mikroprosesor yaitu memori untuk data dan program, serta sistem antarmuka input/output yang sederhana. Antarmuka semacam&nbsp;<em>keyboard</em>, tampilan, disket, atau printer yang umumnya ada pada sebuah komputer pribadi justru tidak ada pada sistem mikrokontroler. Sistem mikrokontroler lebih banyak melakukan pekerjaan-pekerjaan sederhana yang penting seperti mengendalikan motor, saklar, resistor variabel, atau perangkat elektronis lain. Seringkali satu-satunya bentuk antarmuka yang ada pada sebuah sistem mikrokontroler hanyalah sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/LED\" style=\"color:#0563c1; text-decoration:underline\" title=\"LED\"><span style=\"color:blue\">LED</span></a>, bahkan ini pun bisa dihilangkan jika tuntutan konsumsi daya listrik mengharuskan demikian.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:18.0pt\">Mikrokontroler berdasarkan arsitekturnya</span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">CISC (Complex Instruction Set Computing)</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">RISC (Reduced Instruction Set Computing)</span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sesuai dengan namanya masing-masing, maka dapat disimpulkan bahwa CISC mempunyai instruksi lebih banyak daripada RISC. Akan tetapi RISC mempunyai fasilitas internal lebih banyak daripada CISC.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 100, '2019-08-09 20:35:26', 2),
(249, 'MK1', '1513121486', 'MURSAL', 'e', 'kelompok', '4', 1, 'Kelompok 1 : Buat Makalah Mengenai AI\r\n\r\nKelompok 2 : Buat Makalah Mengenai Microcontroller\r\n\r\nKelompok 3 : Buat Makalah Mengenai Teknologi Berkembang 4.0\r\n\r\nKelompok 4 : Buat Makalah Mengenai Logika Fuzzy\r\n', '<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Pengendali mikro</strong>&nbsp;(<a href=\"https://id.wikipedia.org/wiki/Bahasa_Inggris\" style=\"color:#0563c1; text-decoration:underline\" title=\"Bahasa Inggris\"><span style=\"color:blue\">bahasa Inggris</span></a>:&nbsp;<em>microcontroller</em>) adalah sistem mikroprosesor lengkap yang terkandung di dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sirkuit_terpadu\" style=\"color:#0563c1; text-decoration:underline\" title=\"Sirkuit terpadu\"><span style=\"color:blue\">chip</span></a>. Mikrokontroler berbeda dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Mikroprosesor\" style=\"color:#0563c1; text-decoration:underline\" title=\"Mikroprosesor\"><span style=\"color:blue\">mikroprosesor</span></a>&nbsp;serba guna yang digunakan dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Komputer_pribadi\" style=\"color:#0563c1; text-decoration:underline\" title=\"Komputer pribadi\"><span style=\"color:blue\">PC</span></a>, karena di dalam sebuah mikrokontroler umumnya juga telah berisi komponen pendukung sistem minimal mikroprosesor, yakni memori dan antarmuka I/O, sedangkan di dalam mikroprosesor umumnya hanya berisi&nbsp;<a href=\"https://id.wikipedia.org/wiki/CPU\" style=\"color:#0563c1; text-decoration:underline\" title=\"CPU\"><span style=\"color:blue\">CPU</span></a>&nbsp;saja.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sistem komputer dewasa ini paling banyak justru terdapat di dalam peralatan lain, seperti telepon, jam, perangkat rumah tangga, kendaraan, dan bangunan. Sistem&nbsp;<em>embedded</em>biasanya mengandung syarat minimal sebuah sistem mikroprosesor yaitu memori untuk data dan program, serta sistem antarmuka input/output yang sederhana. Antarmuka semacam&nbsp;<em>keyboard</em>, tampilan, disket, atau printer yang umumnya ada pada sebuah komputer pribadi justru tidak ada pada sistem mikrokontroler. Sistem mikrokontroler lebih banyak melakukan pekerjaan-pekerjaan sederhana yang penting seperti mengendalikan motor, saklar, resistor variabel, atau perangkat elektronis lain. Seringkali satu-satunya bentuk antarmuka yang ada pada sebuah sistem mikrokontroler hanyalah sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/LED\" style=\"color:#0563c1; text-decoration:underline\" title=\"LED\"><span style=\"color:blue\">LED</span></a>, bahkan ini pun bisa dihilangkan jika tuntutan konsumsi daya listrik mengharuskan demikian.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:18.0pt\">Mikrokontroler berdasarkan arsitekturnya</span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">CISC (Complex Instruction Set Computing)</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">RISC (Reduced Instruction Set Computing)</span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sesuai dengan namanya masing-masing, maka dapat disimpulkan bahwa CISC mempunyai instruksi lebih banyak daripada RISC. Akan tetapi RISC mempunyai fasilitas internal lebih banyak daripada CISC.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 100, '2019-08-09 20:35:26', 2),
(250, 'MK1', '1513121502', 'YUSUF HIA', 'e', 'kelompok', '4', 1, 'Kelompok 1 : Buat Makalah Mengenai AI\r\n\r\nKelompok 2 : Buat Makalah Mengenai Microcontroller\r\n\r\nKelompok 3 : Buat Makalah Mengenai Teknologi Berkembang 4.0\r\n\r\nKelompok 4 : Buat Makalah Mengenai Logika Fuzzy\r\n', '<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Pengendali mikro</strong>&nbsp;(<a href=\"https://id.wikipedia.org/wiki/Bahasa_Inggris\" style=\"color:#0563c1; text-decoration:underline\" title=\"Bahasa Inggris\"><span style=\"color:blue\">bahasa Inggris</span></a>:&nbsp;<em>microcontroller</em>) adalah sistem mikroprosesor lengkap yang terkandung di dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sirkuit_terpadu\" style=\"color:#0563c1; text-decoration:underline\" title=\"Sirkuit terpadu\"><span style=\"color:blue\">chip</span></a>. Mikrokontroler berbeda dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Mikroprosesor\" style=\"color:#0563c1; text-decoration:underline\" title=\"Mikroprosesor\"><span style=\"color:blue\">mikroprosesor</span></a>&nbsp;serba guna yang digunakan dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Komputer_pribadi\" style=\"color:#0563c1; text-decoration:underline\" title=\"Komputer pribadi\"><span style=\"color:blue\">PC</span></a>, karena di dalam sebuah mikrokontroler umumnya juga telah berisi komponen pendukung sistem minimal mikroprosesor, yakni memori dan antarmuka I/O, sedangkan di dalam mikroprosesor umumnya hanya berisi&nbsp;<a href=\"https://id.wikipedia.org/wiki/CPU\" style=\"color:#0563c1; text-decoration:underline\" title=\"CPU\"><span style=\"color:blue\">CPU</span></a>&nbsp;saja.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sistem komputer dewasa ini paling banyak justru terdapat di dalam peralatan lain, seperti telepon, jam, perangkat rumah tangga, kendaraan, dan bangunan. Sistem&nbsp;<em>embedded</em>biasanya mengandung syarat minimal sebuah sistem mikroprosesor yaitu memori untuk data dan program, serta sistem antarmuka input/output yang sederhana. Antarmuka semacam&nbsp;<em>keyboard</em>, tampilan, disket, atau printer yang umumnya ada pada sebuah komputer pribadi justru tidak ada pada sistem mikrokontroler. Sistem mikrokontroler lebih banyak melakukan pekerjaan-pekerjaan sederhana yang penting seperti mengendalikan motor, saklar, resistor variabel, atau perangkat elektronis lain. Seringkali satu-satunya bentuk antarmuka yang ada pada sebuah sistem mikrokontroler hanyalah sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/LED\" style=\"color:#0563c1; text-decoration:underline\" title=\"LED\"><span style=\"color:blue\">LED</span></a>, bahkan ini pun bisa dihilangkan jika tuntutan konsumsi daya listrik mengharuskan demikian.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:18.0pt\">Mikrokontroler berdasarkan arsitekturnya</span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">CISC (Complex Instruction Set Computing)</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">RISC (Reduced Instruction Set Computing)</span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sesuai dengan namanya masing-masing, maka dapat disimpulkan bahwa CISC mempunyai instruksi lebih banyak daripada RISC. Akan tetapi RISC mempunyai fasilitas internal lebih banyak daripada CISC.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 100, '2019-08-09 20:35:26', 2),
(251, 'MK1', '1513121497', 'AL AZMI', 'e', 'kelompok', '4', 1, 'Kelompok 1 : Buat Makalah Mengenai AI\r\n\r\nKelompok 2 : Buat Makalah Mengenai Microcontroller\r\n\r\nKelompok 3 : Buat Makalah Mengenai Teknologi Berkembang 4.0\r\n\r\nKelompok 4 : Buat Makalah Mengenai Logika Fuzzy\r\n', '<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong>Pengendali mikro</strong>&nbsp;(<a href=\"https://id.wikipedia.org/wiki/Bahasa_Inggris\" style=\"color:#0563c1; text-decoration:underline\" title=\"Bahasa Inggris\"><span style=\"color:blue\">bahasa Inggris</span></a>:&nbsp;<em>microcontroller</em>) adalah sistem mikroprosesor lengkap yang terkandung di dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sirkuit_terpadu\" style=\"color:#0563c1; text-decoration:underline\" title=\"Sirkuit terpadu\"><span style=\"color:blue\">chip</span></a>. Mikrokontroler berbeda dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Mikroprosesor\" style=\"color:#0563c1; text-decoration:underline\" title=\"Mikroprosesor\"><span style=\"color:blue\">mikroprosesor</span></a>&nbsp;serba guna yang digunakan dalam sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Komputer_pribadi\" style=\"color:#0563c1; text-decoration:underline\" title=\"Komputer pribadi\"><span style=\"color:blue\">PC</span></a>, karena di dalam sebuah mikrokontroler umumnya juga telah berisi komponen pendukung sistem minimal mikroprosesor, yakni memori dan antarmuka I/O, sedangkan di dalam mikroprosesor umumnya hanya berisi&nbsp;<a href=\"https://id.wikipedia.org/wiki/CPU\" style=\"color:#0563c1; text-decoration:underline\" title=\"CPU\"><span style=\"color:blue\">CPU</span></a>&nbsp;saja.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sistem komputer dewasa ini paling banyak justru terdapat di dalam peralatan lain, seperti telepon, jam, perangkat rumah tangga, kendaraan, dan bangunan. Sistem&nbsp;<em>embedded</em>biasanya mengandung syarat minimal sebuah sistem mikroprosesor yaitu memori untuk data dan program, serta sistem antarmuka input/output yang sederhana. Antarmuka semacam&nbsp;<em>keyboard</em>, tampilan, disket, atau printer yang umumnya ada pada sebuah komputer pribadi justru tidak ada pada sistem mikrokontroler. Sistem mikrokontroler lebih banyak melakukan pekerjaan-pekerjaan sederhana yang penting seperti mengendalikan motor, saklar, resistor variabel, atau perangkat elektronis lain. Seringkali satu-satunya bentuk antarmuka yang ada pada sebuah sistem mikrokontroler hanyalah sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/LED\" style=\"color:#0563c1; text-decoration:underline\" title=\"LED\"><span style=\"color:blue\">LED</span></a>, bahkan ini pun bisa dihilangkan jika tuntutan konsumsi daya listrik mengharuskan demikian.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:18.0pt\">Mikrokontroler berdasarkan arsitekturnya</span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">CISC (Complex Instruction Set Computing)</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">RISC (Reduced Instruction Set Computing)</span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sesuai dengan namanya masing-masing, maka dapat disimpulkan bahwa CISC mempunyai instruksi lebih banyak daripada RISC. Akan tetapi RISC mempunyai fasilitas internal lebih banyak daripada CISC.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'selesai', 100, '2019-08-09 20:35:26', 2),
(252, 'MK1', '1513121453', 'FADLY KHOIR', 'e', 'quiz', '1', 1, 'Sebutkan dan jelaskan 3 fungsi utama sistem operasi!\r\n', '<ol>\r\n	<li style=\"text-align: justify;\">Mengelola sumber daya terkait dengan pengendalian perangkat lunak sistem/perangkat lunak aplikasi yang sedang dijalankan. Sebagai contoh komponen perangkat keras pada komputer yaitu CPU, memori utama, alat input/output.</li>\r\n	<li style=\"text-align: justify;\">melakukan pengelolaan proses mencakup penyiapan, penjadwalan, dan pemantauan proses program yang sedang dijalankan.</li>\r\n	<li style=\"text-align: justify;\">melakukan pengelolaan data pengendalian terhadap data masukan/keluaran.</li>\r\n</ol>\r\n', NULL, NULL, NULL, NULL, NULL, 'proses', 0, '2019-08-10 21:50:09', NULL),
(253, 'MK1', '1513121453', 'FADLY KHOIR', 'e', 'quiz', '1', 2, 'Apa yang dimaksud dengan peranti peripheral dan jelaskan dua tahap penginstallannya!\r\n', '<p>Printer merupakan alat yang digunakan untuk mencetak keluaran dari proses yang dilakukan oleh komputer baik tulisan maupun grafik secara langsung dengan menggunakan media kertas ataupun yang lainnya. Ada tiga jenis printer yang beredar dipasaran. Dot matrik, Ink Jet, dan Laser Jet. Printer Dot Matrik merupakan printer yang menggunakan pita sebagai alat percetakannya. Ink Jet menggunakan tinta, sedangkan laser jet menggunakan serbuk laser. Sedangkan jenis konektor printer ada dua macam yaitu melalui konektor Paralel Port dan USB Port.</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'proses', 0, '2019-08-10 21:50:09', NULL),
(254, 'MK1', '1513121453', 'FADLY KHOIR', 'e', 'quiz', '1', 3, 'Sebutkan pengelompokan teknologi informasi!\r\n', '<div style=\"text-align:justify\">PENGELOMPOKAN TEKNOLOGI INFORMASI</div>\r\n\r\n<div style=\"text-align:justify\">TeknologiMasukan</div>\r\n\r\n<div style=\"text-align:justify\">Teknologi masukan (input technologi) adalah teknologi yang berhubungan dengan peralatan untuk memasukkan data kedalam system komputer.Contoh: keyboard, mouse.</div>\r\n\r\n<div style=\"text-align:justify\">&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">MesinPemroses</div>\r\n\r\n<div style=\"text-align:justify\">Mesin pemroses lebih dikenal dengan CPU, mikroprosesor atau prosesor. CPU merupakan bagian system komputer yang menjadi pusat pengolah data dengan cara menjalankan program yang mengaturpengolahan tersebut.</div>\r\n', NULL, NULL, NULL, NULL, NULL, 'proses', 0, '2019-08-10 21:50:09', NULL),
(255, 'MK1', '1513121453', 'FADLY KHOIR', 'e', 'quiz', '1', 4, 'Jelaskan apa yang dimaksud dengan kecerdasan buatan artificial intelligence?\r\n', '<p style=\"text-align:justify\">Walaupun AI memiliki konotasi fiksi ilmiah yang kuat, AI membentuk cabang yang sangat penting pada ilmu komputer, berhubungan dengan perilaku, pembelajaran dan adaptasi yang cerdas dalam sebuah mesin. Penelitian dalam AI menyangkut pembuatan mesin dan program komputer untuk mengotomatisasikan tugas-tugas yang membutuhkan perilaku cerdas. Termasuk contohnya adalah pengendalian, perencanaan dan penjadwalan, kemampuan untuk menjawab diagnosa dan pertanyaan pelanggan, serta pengenalan tulisan tangan, suara dan wajah. Hal-hal seperti itu telah menjadi disiplin ilmu tersendiri, yang memusatkan perhatian pada penyediaan solusi masalah kehidupan yang nyata. Sistem AI sekarang ini sering digunakan dalam bidang ekonomi, sains, obat-obatan, teknik dan militer, seperti yang telah dibangun dalam beberapa aplikasi perangkat lunak komputer rumah dan video game.</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'proses', 0, '2019-08-10 21:50:09', NULL),
(256, 'MK1', '1513121453', 'FADLY KHOIR', 'e', 'quiz', '1', 5, 'Jelaskan apa yang dimaksud dengan device driver!\r\n', '<p>Walaupun AI memiliki konotasi fiksi ilmiah yang kuat, AI membentuk cabang yang sangat penting pada ilmu komputer, berhubungan dengan perilaku, pembelajaran dan adaptasi yang cerdas dalam sebuah mesin. Penelitian dalam AI menyangkut pembuatan mesin dan program komputer untuk mengotomatisasikan tugas-tugas yang membutuhkan perilaku cerdas. Termasuk contohnya adalah pengendalian, perencanaan dan penjadwalan, kemampuan untuk menjawab diagnosa dan pertanyaan pelanggan, serta pengenalan tulisan tangan, suara dan wajah. Hal-hal seperti itu telah menjadi disiplin ilmu tersendiri, yang memusatkan perhatian pada penyediaan solusi masalah kehidupan yang nyata. Sistem AI sekarang ini sering digunakan dalam bidang ekonomi, sains, obat-obatan, teknik dan militer, seperti yang telah dibangun dalam beberapa aplikasi perangkat lunak komputer rumah dan video game.</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'proses', 0, '2019-08-10 21:50:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblriwayatsoal`
--

CREATE TABLE `tblriwayatsoal` (
  `idriwayatsoal` int(11) NOT NULL,
  `idsoalriw` int(11) NOT NULL,
  `tipesoal` enum('e','p') NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `namamhs` varchar(50) DEFAULT NULL,
  `tipetugas` enum('quiz','tugas','uts','kelompok') NOT NULL,
  `prodi` enum('TI','SI') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `status` enum('selesai','belum','proses') NOT NULL,
  `tanggal` datetime NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `absensike` varchar(2) DEFAULT NULL,
  `kelompok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblriwayatsoal`
--

INSERT INTO `tblriwayatsoal` (`idriwayatsoal`, `idsoalriw`, `tipesoal`, `kodemk`, `nim`, `namamhs`, `tipetugas`, `prodi`, `semester`, `status`, `tanggal`, `nilai`, `absensike`, `kelompok`) VALUES
(556, 1, 'e', 'MK1', '1513121452', 'SONI PRIBADI', 'quiz', 'TI', '1', 'belum', '2019-08-04 07:38:53', NULL, '1', NULL),
(557, 1, 'e', 'MK1', '1513121453', 'FADLY KHOIR', 'quiz', 'TI', '1', 'proses', '2019-08-04 07:38:53', NULL, '1', NULL),
(558, 1, 'e', 'MK1', '1513121462', 'RICKY DHARMAWAN', 'quiz', 'TI', '1', 'belum', '2019-08-04 07:38:53', NULL, '1', NULL),
(559, 1, 'e', 'MK1', '1513121464', 'DICKY J.O. PANJAITAN', 'quiz', 'TI', '1', 'belum', '2019-08-04 07:38:53', NULL, '1', NULL),
(560, 1, 'e', 'MK1', '1513121471', 'KIREN HARIHARAN', 'quiz', 'TI', '1', 'belum', '2019-08-04 07:38:53', NULL, '1', NULL),
(561, 1, 'e', 'MK1', '1513121486', 'MURSAL', 'quiz', 'TI', '1', 'belum', '2019-08-04 07:38:53', NULL, '1', NULL),
(562, 1, 'e', 'MK1', '1513121497', 'AL AZMI', 'quiz', 'TI', '1', 'selesai', '2019-08-04 07:38:53', 90, '1', NULL),
(563, 1, 'e', 'MK1', '1513121502', 'YUSUF HIA', 'quiz', 'TI', '1', 'belum', '2019-08-04 07:38:53', NULL, '1', NULL),
(564, 1, 'e', 'MK1', '1513121526', 'TIOFANI GULTOM', 'quiz', 'TI', '1', 'belum', '2019-08-04 07:38:53', NULL, '1', NULL),
(565, 2, 'p', 'MK1', '1513121452', 'SONI PRIBADI', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(566, 2, 'p', 'MK1', '1513121453', 'FADLY KHOIR', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(567, 2, 'p', 'MK1', '1513121462', 'RICKY DHARMAWAN', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(568, 2, 'p', 'MK1', '1513121464', 'DICKY J.O. PANJAITAN', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(569, 2, 'p', 'MK1', '1513121471', 'KIREN HARIHARAN', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(570, 2, 'p', 'MK1', '1513121486', 'MURSAL', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(571, 2, 'p', 'MK1', '1513121497', 'AL AZMI', 'tugas', 'TI', '1', 'proses', '2019-08-04 07:42:36', 0, '2', NULL),
(572, 2, 'p', 'MK1', '1513121502', 'YUSUF HIA', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(573, 2, 'p', 'MK1', '1513121526', 'TIOFANI GULTOM', 'tugas', 'TI', '1', 'belum', '2019-08-04 07:42:36', NULL, '2', NULL),
(583, 3, 'e', 'MK1', '1513121452', 'SONI PRIBADI', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(584, 3, 'e', 'MK1', '1513121453', 'FADLY KHOIR', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(585, 3, 'e', 'MK1', '1513121462', 'RICKY DHARMAWAN', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(586, 3, 'e', 'MK1', '1513121464', 'DICKY J.O. PANJAITAN', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(587, 3, 'e', 'MK1', '1513121471', 'KIREN HARIHARAN', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(588, 3, 'e', 'MK1', '1513121486', 'MURSAL', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(589, 3, 'e', 'MK1', '1513121497', 'AL AZMI', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(590, 3, 'e', 'MK1', '1513121502', 'YUSUF HIA', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(591, 3, 'e', 'MK1', '1513121526', 'TIOFANI GULTOM', 'tugas', 'TI', '1', 'belum', '2019-08-04 08:17:09', NULL, '3', NULL),
(592, 4, 'e', 'MK1', '1513121452', 'SONI PRIBADI', 'kelompok', 'TI', '1', 'belum', '2019-08-09 16:27:34', NULL, '4', NULL),
(593, 4, 'e', 'MK1', '1513121453', 'FADLY KHOIR', 'kelompok', 'TI', '1', 'belum', '2019-08-09 16:27:34', NULL, '4', NULL),
(594, 4, 'e', 'MK1', '1513121462', 'RICKY DHARMAWAN', 'kelompok', 'TI', '1', 'belum', '2019-08-09 16:27:34', NULL, '4', NULL),
(595, 4, 'e', 'MK1', '1513121464', 'DICKY J.O. PANJAITAN', 'kelompok', 'TI', '1', 'belum', '2019-08-09 16:27:34', NULL, '4', NULL),
(596, 4, 'e', 'MK1', '1513121471', 'KIREN HARIHARAN', 'kelompok', 'TI', '1', 'selesai', '2019-08-09 16:27:34', 100, '4', 2),
(597, 4, 'e', 'MK1', '1513121486', 'MURSAL', 'kelompok', 'TI', '1', 'selesai', '2019-08-09 16:27:34', 100, '4', 2),
(598, 4, 'e', 'MK1', '1513121497', 'AL AZMI', 'kelompok', 'TI', '1', 'selesai', '2019-08-09 16:27:34', 100, '4', 2),
(599, 4, 'e', 'MK1', '1513121502', 'YUSUF HIA', 'kelompok', 'TI', '1', 'selesai', '2019-08-09 16:27:34', 100, '4', 2),
(600, 4, 'e', 'MK1', '1513121526', 'TIOFANI GULTOM', 'kelompok', 'TI', '1', 'belum', '2019-08-09 16:27:34', NULL, '4', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsoalesai`
--

CREATE TABLE `tblsoalesai` (
  `idesai` int(11) NOT NULL,
  `idsoal` int(11) NOT NULL,
  `noesai` int(11) NOT NULL,
  `matakuliah` text NOT NULL,
  `isiesai` longtext NOT NULL,
  `jawaban` longtext,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblsoalesai`
--

INSERT INTO `tblsoalesai` (`idesai`, `idsoal`, `noesai`, `matakuliah`, `isiesai`, `jawaban`, `tanggal`) VALUES
(383, 1, 1, 'MK1', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Sebutkan dan jelaskan 3 fungsi utama sistem operasi!</span></span></span></span></p>\r\n', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Manajemen Proses</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;: mencakup penyiapan, penjadwalan dan pemantauan proses pada komputer.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Manajemen Sumber Daya</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;: berkaitan dengan pengendalian terhadap software system dan software application.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Manajemen Data</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;: berupa pengendalian terhadap data masukan/keluaran.</span></span></span></span></li>\r\n</ol>\r\n', '2019-08-04 07:38:53'),
(384, 1, 2, 'MK1', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Apa yang dimaksud dengan peranti peripheral dan jelaskan dua tahap penginstallannya!</span></span></span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Peranti peripheral&nbsp;</span></span></strong><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2b2b2b\">yaitu komponen tambahan atau pendukung yang berfungsi untuk mendukung kerja komputer sehingga fungsi kerja komputer menjadi maksimal.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2b2b2b\">Dua tahap penginstallannya :</span></span></span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Instalasi secara fisik</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;: meliputi pemasangan peranti peripheral dengan baik dan benar.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Instalasi secara&nbsp;Software</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;: meliputi pengenalan peripheral terhadap sistem operasi yaitu dengan menginstall driver yang dibutuhkan.</span></span></span></span></li>\r\n</ol>\r\n', '2019-08-04 07:38:53'),
(385, 1, 3, 'MK1', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Sebutkan pengelompokan teknologi informasi!</span></span></span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Peranti peripheral&nbsp;</span></span></strong><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2b2b2b\">yaitu komponen tambahan atau pendukung yang berfungsi untuk mendukung kerja komputer sehingga fungsi kerja komputer menjadi maksimal.</span></span></span></span></p>\r\n', '2019-08-04 07:38:53'),
(386, 1, 4, 'MK1', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Jelaskan apa yang dimaksud dengan kecerdasan buatan artificial intelligence?</span></span></span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Artificial intelligence</span></span></strong><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;atau kecerdasan buatan adalah suatu pengetahuan yang membuat komputer dapat&nbsp; meniru kecerdasan manusia sehingga diharapkan komputer (atau berupa suatu mesin) dapat melakukan hal-hal yang apabila dikerjakan manusia memerlukan kecerdasan&nbsp; yang mana tujuan dari IA&nbsp; tidak hanya membuat komputer dapat berfikir saja, tetapi bisa melihat, mendengar, berjalan, dan bermain. misalnya melakukan penalaran untuk mencapai suatu kesimpulan atau melakukan translasi dari sutu bahasa manusia ke bahan manusia yang lain.</span></span></span></span></p>\r\n', '2019-08-04 07:38:53'),
(387, 1, 5, 'MK1', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Jelaskan apa yang dimaksud dengan device driver!</span></span></span></span></p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Device driver</span></span></strong><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;adalah program yang berfungsi untuk membantu komputer mengendalikan peranti-peranti peripheral.</span></span></span></span></p>\r\n', '2019-08-04 07:38:53'),
(395, 3, 1, 'MK1', '<p>Jelaskan mengenai bahasa pemrograman generasi pertama dan kedua!</p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Bahasa pemrograman generasi pertama</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;adalah bahasa pemrograman yang paling awal diciptakan. Bahasa ini masih sulit untuk dimengerti oleh orang awam, bahkan programmer sekalipun. Bahasa ini sulit karena bahasa pemrograman generasi pertama ini masih berorientasi pada mesin.</span></span></span></span></p>\r\n', '2019-08-04 08:17:09'),
(396, 3, 2, 'MK1', '<p>Mengapa teknologi informasi di perlukan? berikan 4 alasan !</p>\r\n', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Karena TI dapat membantu seseorang untuk berkomunikasi dengan orang lain tanpa biaya dan waktu yang besar.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Karena TI dapat memudahkan kita untuk mengetahui informasi dengan cepat dan tepat.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">TI dapat membantu seseorang dalam berbagai bidang, seperti bidang pendidikan, perbankan, dll.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">TI berfungsi memudahkan pekerjaan dalam medis seperti CT-Scan.</span></span></span></span></li>\r\n</ol>\r\n', '2019-08-04 08:17:09'),
(397, 3, 3, 'MK1', '<p>Apa itu Cyborg? Dan apa itu Fuzzy Logic?</p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Cyborg</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;adalah gabungan antara mesin dan makhluk hidup.</span></span></span></span></p>\r\n\r\n<p><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Logika Fuzzy</span></span></span></strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;atau logika kaburr adalah suatu teknik yang digunakan untuk menangani ketidakpastian pada masalah-masalah yang punya banyak jawaban.</span></span></span></p>\r\n', '2019-08-04 08:17:09'),
(398, 3, 4, 'MK1', '<p>Apa yang dimaksud dengan low level language ?</p>\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Low level language</span></span></strong><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;adalah suatu bahasa program atau suatu tata cara yang dapat digunakan untuk berkomunikasi dengan komputer. Dalam hal ini tata cara yang digunakan masih ber-orientasi dengan mesin, dikarenakan itu low level language juga disebut sebagai bahasa mesin.</span></span></span></span></p>\r\n', '2019-08-04 08:17:09'),
(399, 3, 5, 'MK1', '<p>Apa yang dimaksud dengan jaringan syaraf dan sistem pakar ?</p>\r\n', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Sistem pakar</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;adalah sistem yang meniru kepakaran dalam bidang tertentu dalam menyelesaikan suatu permasalahan.</span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">Jaringan syaraf</span></span></strong><span style=\"font-family:&quot;inherit&quot;,&quot;serif&quot;\"><span style=\"color:#2b2b2b\">&nbsp;adalah suatu bidang AI yang meniru pemrosesan dalam otak manusia yang berbasis pada pengenalan pola.</span></span></span></span></li>\r\n</ol>\r\n', '2019-08-04 08:17:09'),
(400, 4, 1, 'MK1', '<p>Kelompok 1 : Buat Makalah Mengenai AI</p>\r\n\r\n<p>Kelompok 2 : Buat Makalah Mengenai Microcontroller</p>\r\n\r\n<p>Kelompok 3 : Buat Makalah Mengenai Teknologi Berkembang 4.0</p>\r\n\r\n<p>Kelompok 4 : Buat Makalah Mengenai Logika Fuzzy</p>\r\n', '', '2019-08-09 16:27:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsoalpilgan`
--

CREATE TABLE `tblsoalpilgan` (
  `idpilgan` int(11) NOT NULL,
  `idsoalpil` varchar(11) NOT NULL,
  `nopilgan` int(11) NOT NULL,
  `matakuliah` text NOT NULL,
  `isipilgan` longtext NOT NULL,
  `jawabanpilgan` enum('A','B','C','D') NOT NULL,
  `a` longtext NOT NULL,
  `b` longtext NOT NULL,
  `c` longtext NOT NULL,
  `d` longtext NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblsoalpilgan`
--

INSERT INTO `tblsoalpilgan` (`idpilgan`, `idsoalpil`, `nopilgan`, `matakuliah`, `isipilgan`, `jawabanpilgan`, `a`, `b`, `c`, `d`, `tanggal`) VALUES
(179, '2', 1, 'MK1', '<p>Suatu jaringan komputer yang menghubungkan suatu komputer dengan komputer lain dengan jarak yang terbatas disebut dengan?</p>\r\n', 'A', '<p>LAN</p>\r\n', '<p>WAN</p>\r\n', '<p>MAN</p>\r\n', '<p>PAN</p>\r\n', '2019-08-04 07:42:36'),
(180, '2', 2, 'MK1', '<p>Pihak yang meminta layanan disebut?</p>\r\n', 'C', '<p>Server</p>\r\n', '<p>Komputer</p>\r\n', '<p>Client</p>\r\n', '<p>Bus</p>\r\n', '2019-08-04 07:42:36'),
(181, '2', 3, 'MK1', '<p>Berdasarkan fungsinya ada berapakah jenis jaringan computer?</p>\r\n', 'D', '<p>6</p>\r\n', '<p>5</p>\r\n', '<p>3</p>\r\n', '<p>2</p>\r\n', '2019-08-04 07:42:36'),
(182, '2', 4, 'MK1', '<p>&nbsp;Apa yang dimaksud dengan peer to peer?</p>\r\n', 'A', '<p>Yaitu jaringan komputer dimana setiap host dapat menjadi server dan juga<br />\r\nmenjadi client secara bersamaan.</p>\r\n', '<p>Jaringan komputer dengan komputer yang didedikasikan khusus sebagai server.</p>\r\n', '<p>sebuah sistem yang terdiri atas komputer dan perangkat jaringan lainnya yang bekerja bersama-sama untuk mencapai suatu tujuan yang sama</p>\r\n', '<p>Merupakan perpaduan beberapa jaringan terpusat sehingga terdapat beberapa komputer server yang saling berhubungan dengan klient membentuk sistem jaringan tertentu.</p>\r\n', '2019-08-04 07:42:36'),
(183, '2', 5, 'MK1', '<p>Apakah yang dimaksud dengan jaringan wan?</p>\r\n', 'C', '<p>Jaringan yang mencakup satu kota besar beserta daerah setempat.</p>\r\n', '<p>Jaringan yang menghubungkan 2 komputer atau lebih dalam cakupan</p>\r\n', '<p>Merupakan jaringan dengan cakupan seluruh dunia</p>\r\n', '<p>Merupakan jaringan kampus</p>\r\n', '2019-08-04 07:42:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `userid` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('AKD','MHS') NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`userid`, `password`, `status`, `nama`) VALUES
('001', '202cb962ac59075b964b07152d234b70', 'AKD', 'andre');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploaded_images`
--

CREATE TABLE `uploaded_images` (
  `id` int(11) NOT NULL,
  `file_dir` varchar(120) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblabsensi`
--
ALTER TABLE `tblabsensi`
  ADD PRIMARY KEY (`idabsensi`);

--
-- Indeks untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `tbldiskusi`
--
ALTER TABLE `tbldiskusi`
  ADD PRIMARY KEY (`iddiskusi`);

--
-- Indeks untuk tabel `tbldosen`
--
ALTER TABLE `tbldosen`
  ADD PRIMARY KEY (`iddosen`);

--
-- Indeks untuk tabel `tblgambar`
--
ALTER TABLE `tblgambar`
  ADD PRIMARY KEY (`idgambar`);

--
-- Indeks untuk tabel `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tblmatakuliah`
--
ALTER TABLE `tblmatakuliah`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indeks untuk tabel `tblmatakuliah_sec`
--
ALTER TABLE `tblmatakuliah_sec`
  ADD PRIMARY KEY (`kodemk`);

--
-- Indeks untuk tabel `tblmateri`
--
ALTER TABLE `tblmateri`
  ADD PRIMARY KEY (`idmateri`);

--
-- Indeks untuk tabel `tblpengumuman`
--
ALTER TABLE `tblpengumuman`
  ADD PRIMARY KEY (`idpengumuman`);

--
-- Indeks untuk tabel `tblriwayatnilai`
--
ALTER TABLE `tblriwayatnilai`
  ADD PRIMARY KEY (`idnilai`);

--
-- Indeks untuk tabel `tblriwayatsoal`
--
ALTER TABLE `tblriwayatsoal`
  ADD PRIMARY KEY (`idriwayatsoal`);

--
-- Indeks untuk tabel `tblsoalesai`
--
ALTER TABLE `tblsoalesai`
  ADD PRIMARY KEY (`idesai`);

--
-- Indeks untuk tabel `tblsoalpilgan`
--
ALTER TABLE `tblsoalpilgan`
  ADD PRIMARY KEY (`idpilgan`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `uploaded_images`
--
ALTER TABLE `uploaded_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblabsensi`
--
ALTER TABLE `tblabsensi`
  MODIFY `idabsensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112097202;

--
-- AUTO_INCREMENT untuk tabel `tbldiskusi`
--
ALTER TABLE `tbldiskusi`
  MODIFY `iddiskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `tblgambar`
--
ALTER TABLE `tblgambar`
  MODIFY `idgambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `tblmatakuliah_sec`
--
ALTER TABLE `tblmatakuliah_sec`
  MODIFY `kodemk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tblmateri`
--
ALTER TABLE `tblmateri`
  MODIFY `idmateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `tblpengumuman`
--
ALTER TABLE `tblpengumuman`
  MODIFY `idpengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tblriwayatnilai`
--
ALTER TABLE `tblriwayatnilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT untuk tabel `tblriwayatsoal`
--
ALTER TABLE `tblriwayatsoal`
  MODIFY `idriwayatsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT untuk tabel `tblsoalesai`
--
ALTER TABLE `tblsoalesai`
  MODIFY `idesai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT untuk tabel `tblsoalpilgan`
--
ALTER TABLE `tblsoalpilgan`
  MODIFY `idpilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT untuk tabel `uploaded_images`
--
ALTER TABLE `uploaded_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
