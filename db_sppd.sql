-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2015 at 10:35 
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pkl1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`no` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kode_skpd` varchar(7) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1228 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`no`, `username`, `password`, `kode_skpd`, `level`) VALUES
(1, 'skpd421011', '011tapum', '421.011', 0),
(2, 'skpd421012', '012pemdes', '421.012', 0),
(3, 'skpd421013', '013hukum', '421.013', 0),
(4, 'skpd421014', '014tanah', '421.014', 0),
(5, 'skpd421021', 'ekonomi021', '421.021', 0),
(6, 'skpd421022', 'krjsama022', '421.022', 0),
(7, 'skpd421023', 'ap023', '421.023', 0),
(8, 'skpd421024', 'pde024', '421.024', 0),
(9, 'skpd421031', '031umum', '421.031', 0),
(10, 'skpd421032', '032tu', '421.032', 0),
(11, 'skpd421033', '033humas', '421.033', 0),
(12, 'skpd421034', '034org', '421.034', 0),
(13, 'skpd421041', 'kesra041', '421.041', 0),
(14, 'skpd421042', 'bintal042', '421.042', 0),
(15, 'skpd421050', '050setwan', '421.050', 0),
(16, 'skpd421101', 'pddk101', '421.101', 0),
(17, 'skpd421102', 'pora102', '421.102', 0),
(18, 'skpd421103', 'dinkes103', '421.103', 0),
(19, 'skpd421104', 'sos104', '421.104', 0),
(20, 'skpd421105', '105naker', '421.105', 0),
(21, 'skpd421106', '106hubkomin', '421.106', 0),
(22, 'skpd421107', '107dukcap', '421.107', 0),
(23, 'skpd421108', '108budpar', '421.108', 0),
(24, 'skpd421109', 'bm109', '421.109', 0),
(25, 'skpd421110', 'air110', '421.110', 0),
(26, 'skpd421111', 'cktr111', '421.111', 0),
(27, 'skpd421112', 'umkm112', '421.112', 0),
(28, 'skpd421113', '113indag', '421.113', 0),
(29, 'skpd421114', '114tanbun', '421.114', 0),
(30, 'skpd421115', '115laut', '421.115', 0),
(31, 'skpd421116', '116hut', '421.116', 0),
(32, 'skpd421117', 'esdm117', '421.117', 0),
(33, 'skpd421118', 'keswan118', '421.118', 0),
(34, 'skpd421119', 'ppka119', '421.119', 0),
(35, 'skpd421201', '201inspekt', '421.201', 0),
(36, 'skpd421202', '202bkd', '421.202', 0),
(37, 'skpd421203', '203bappeda', '421.203', 0),
(38, 'skpd421204', '204litbang', '421.204', 0),
(39, 'skpd421205', 'kesbang205', '421.205', 0),
(40, 'skpd421206', 'lingk206', '421.206', 0),
(41, 'skpd421207', 'bkp3207', '421.207', 0),
(42, 'skpd421208', 'bpm208', '421.208', 0),
(43, 'skpd421209', '209diklat', '421.209', 0),
(44, 'skpd421210', '210kbrcn', '421.210', 0),
(45, 'skpd421211', '211perpus', '421.211', 0),
(46, '421060a', '060a', '421.060', 0),
(47, '421050b', '050b', '421.051', 0),
(1227, 'root', 'rootadmin', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
`kd_jabatan` int(10) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`kd_jabatan`, `nama_jabatan`) VALUES
(94, 'Asisten Administrasi'),
(95, 'Asisten Kesejahteraan Rakyat'),
(92, 'Asisten Pemerintahan'),
(113, 'Asisten Perekonomian dan Pembangunan'),
(114, 'Bupati'),
(116, 'Kasubag'),
(112, 'Kepala'),
(91, 'Sekretaris Daerah'),
(111, 'Staff'),
(115, 'Wakil Bupati');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pangkat_gol`
--

CREATE TABLE IF NOT EXISTS `tbl_pangkat_gol` (
`kd_pg` int(10) NOT NULL,
  `nama_pangkat` varchar(50) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `ruang` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_pangkat_gol`
--

INSERT INTO `tbl_pangkat_gol` (`kd_pg`, `nama_pangkat`, `golongan`, `ruang`) VALUES
(1, '', '', ''),
(2, 'Juru Muda', 'I', 'a'),
(3, 'Juru Muda Tingkat I', 'I', 'b'),
(4, 'Juru', 'I', 'c'),
(5, 'Juru Tingkat I', 'I', 'd'),
(6, 'Pengatur Muda', 'II', 'a'),
(7, 'Pengatur Muda Tingkat I', 'II', 'b'),
(8, 'Pengatur', 'II', 'c'),
(9, 'Pengatur Tingkat I', 'II', 'd'),
(10, 'Penata Muda', 'III', 'a'),
(11, 'Penata Muda Tingkat I', 'III', 'b'),
(12, 'Penata', 'III', 'c'),
(13, 'Penata Tingkat I', 'III', 'd'),
(14, 'Pembina', 'IV', 'a'),
(15, 'Pembina Tingkat 1', 'IV', 'b'),
(16, 'Pembina Utama Muda', 'IV', 'c'),
(17, 'Pembina Utama Madya', 'IV', 'd'),
(18, 'Pembina Utama', 'IV', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sdm`
--

CREATE TABLE IF NOT EXISTS `tbl_sdm` (
  `kd_sdm` varchar(30) NOT NULL DEFAULT '',
  `nip` varchar(30) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_jabatan` int(10) NOT NULL,
  `kd_pg` int(10) NOT NULL,
  `kode_skpd` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sdm`
--

INSERT INTO `tbl_sdm` (`kd_sdm`, `nip`, `nama`, `kd_jabatan`, `kd_pg`, `kode_skpd`) VALUES
('0052', '11111', 'Ahmad Riyanto S.pd', 111, 11, '421.024'),
('KON0001', '', 'Ahmad Isrofi, S.kom', 111, 1, '421.024'),
('KON0002', NULL, 'W Bupati Ahaiaiaia', 115, 1, NULL),
('KON0003', '', 'sd', 94, 1, '421.024'),
('PNS0001', '19570830 198209 1 001', 'Dr. ABDUL MALIK, SE, Msi', 91, 16, '421.060'),
('PNS0002', '19570830 198209 1 002', 'Drs. EKO SUWANTO', 92, 13, '421.060'),
('PNS0003', '19570830 198209 2 015', 'NURMAN RAMDANSYAH, SH, M.Hum', 113, 3, '421.060'),
('PNS0004', '19570830 198209 2 005', 'Dra. MADE DEWI AGGRAENI, M.Si', 94, 14, '421.060'),
('PNS0005', '19570830 198209 1 009', 'Drs. PRIHADI WASKITO, MMÂ ', 95, 13, '421.060'),
('PNS0006', '19590814 198112 1 006', 'WAHYUDI, S.Pd,. M.Si', 111, 14, '421.024'),
('PNS0012', '3', 'Ir. DWI SISWAHYUDI, MT', 111, 10, '421.024'),
('PNS0013', '19661230 199503 1 003', 'Ir. HENRY MULIA BAHRUDDIN TANJUNG', 112, 13, '421.024'),
('PNS0037', '19930219 198903  100', 'Andik Setyawann S.kom', 111, 6, '421.024'),
('PNS0038', '948958345', 'Ahmad Isrofi', 112, 2, '421.106'),
('PNS0039', '365', 'Agus R', 111, 10, '421.106'),
('PNS0040', '45', 'aRIF', 112, 8, '421.105'),
('PNS0041', '465575', 'DFVD GH', 111, 2, '421.105'),
('PNS0042', '2398918453485934', 'Sugianto Ardiansyah, S.pd', 112, 3, '421.101'),
('PNS0043', '2434589345', 'KHGFSAJF, S,kom', 111, 5, '421.102'),
('PNS0044', '20569385yu69824', 'kahjfkajknkjnadf', 112, 5, '421.108'),
('PNS0045', '27349283', 'akfjkgaj', 111, 6, '421.108'),
('PNS0047', '938493843', 'Paejan S.kom', 111, 9, '421.034'),
('PNS0048', '8732873278', 'kjsgkjsaf', 112, 11, '421.103'),
('PNS0049', '3434', 'kjbkjgaw', 111, 5, '421.103'),
('PNS0050', '123', 'afd', 112, 3, '421.109'),
('PNS0051', '2321', 'efdr', 111, 15, '421.109'),
('PNS0052', '11', 'Setyawan S.E', 111, 5, '421.011'),
('PNS0053', '121212', 'sssss', 111, 9, '421.024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skpd`
--

CREATE TABLE IF NOT EXISTS `tbl_skpd` (
  `kode_skpd` varchar(7) NOT NULL,
  `nama_skpd` varchar(50) NOT NULL,
  `alamat_skpd` varchar(100) NOT NULL DEFAULT '-',
  `telepon_skpd` varchar(30) NOT NULL DEFAULT '-',
  `email_skpd` varchar(50) NOT NULL DEFAULT '-',
  `website_skpd` varchar(50) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skpd`
--

INSERT INTO `tbl_skpd` (`kode_skpd`, `nama_skpd`, `alamat_skpd`, `telepon_skpd`, `email_skpd`, `website_skpd`) VALUES
('-', '-', '-', '-', '-', '-'),
('421.011', 'Bagian Tata Pemerintahan Umum', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-tapum@malangkab.go.id', 'http://bag-pde.malangkab.go.id'),
('421.012', 'Bagian Tata Pemerintahan Desa', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-tapemdes@malangkab.go.id', 'http://bag-tapum.malangkab.go.id'),
('421.013', 'Bagian Hukum', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-hukum@malangkab.go.id', 'http://bag-tapemdes.malangkab.go.id'),
('421.014', 'Bagian Pertanahan', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-pertanahan@malangkab.go.id', 'http://bag-pertanahan.malangkab.go.id'),
('421.021', 'Bagian Perekonomian', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-ekonomi@malangkab.go.id', 'http://bag-hukum.malangkab.go.id'),
('421.022', 'Bagian Kerjasama', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-kerjasama@malangkab.go.id', 'http://bag-ekonomi.malangkab.go.id'),
('421.023', 'Bagian Administrasi Pembangunan', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-pembangunan@malangkab.go.id', 'http://bag-kerjasama.malangkab.go.id'),
('421.024', 'Bagian Pengelola Data Elektronik', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '(0341) 392029', 'bag-pde@malangkab.go.id', 'http://bag-pembangunan.malangkab.go.id'),
('421.031', 'Bagian Umum dan Protokol', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-umum@malangkab.go.id', 'http://bag-umum.malangkab.go.id'),
('421.032', 'Bagian Tata Usaha', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-tu@malangkab.go.id', 'http://bag-tu.malangkab.go.id'),
('421.033', 'Bagian Hubungan Masyarakat', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-humas@malangkab.go.id', 'http://bag-humas.malangkab.go.id'),
('421.034', 'Bagian Organisasi', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-organisasi@malangkab.go.id', 'http://bag-organisasi.malangkab.go.id'),
('421.041', 'Bagian Kesejahteraan Rakyat', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-kesra@malangkab.go.id', 'http://bag-organisasi.malangkab.go.id'),
('421.042', 'Bagian Bina Mental', 'Jl. Panji No. 158 Kepanjen Kabupaten Malang', '', 'bag-bintal@malangkab.go.id', 'http://bag-bintal.malangkab.go.id'),
('421.050', 'Sekretariat Dewan', '-', '-', '-', '-'),
('421.051', 'Staf Ahli', '-', '-', '-', '-'),
('421.060', 'Sekretariat Daerah', 'Jalan Merdeka Timur No. 3 Malang', '( 0341 ) 326791 - 326793 ', ' sekda@malangkab.go.id', 'http:// www.malangkab.go.id '),
('421.101', 'Dinas Pendidikan', 'Jl.Panarukan No. 1 Kepanjen', '(0341) 393935', 'dispendik@malangkab.go. id', 'http://dispendik.malangkab.go.id'),
('421.102', 'Dinas Pemuda dan olahraga', 'Jl.Trunojoyo Kompleks Stadion Kanjuruhan Kepanjen', '(0341) 399909', 'dispora@malangkab.go.id', 'http://dispora.malangkab.go.id'),
('421.103', 'Dinas Kesehatan', 'Jl. Panji No. 120, Kepanjen', '(0341) 393730', 'dinkes@malangkab.go.id', 'http://dinkes.malangkab.go.id'),
('421.104', 'Dinas Sosial', 'Jl. Majapahit No.5 Malang', '(0341) 362601', 'dinsos@malangkab.go.id', 'http://dinsos.malangkab.go.id'),
('421.105', 'Dinas Tenaga Kerja dan Transmigrasi', 'Jl.Trunojoyo Kav. 3 Kepanjen', '(0341) 393933', 'disnaker@malangkab.go.id', 'http://disnaker.malangkab.go.id'),
('421.106', 'Dinas Perhubungan, Komunikasi dan Informatika', 'Jl.Merdeka Timur No.3 Malang', '(0341) 350888', 'dishub@malangkab.go. Id', 'http://dishub.malangkab.go.id'),
('421.107', 'Dinas Kependudukan dan Catatan Sipil', 'Jl. Panji No119, Kepanjen', '(0341) 394100', 'dispenduk@malangkab.go.id', 'http://dispenduk.malangkab.go.id'),
('421.108', 'Dinas Kebudayaan dan Pariwisata', 'Jl. Raya Singosari, Malang', '(0341) 456644', 'disbudpar@malangkab.go.id', 'http://disbudpar.malangkab.go.id'),
('421.109', 'Dinas Bina Marga', 'Jl. KH.Agus Salim No.7 Malang', '(0341) 361160', 'binamarga@malangkab.go.Id', 'http://binamarga.malangkab.go.id'),
('421.110', 'Dinas Pengairan', 'Jl. Kawi No. 1, Kepanjen', '(0341) 395025', 'pengairan@malangkab.go.id', 'http://pengairan.malangkab.go.id'),
('421.111', 'Dinas Cipta Karya dan Tata Ruang', 'Jl. Trunojoyo kapling 6 Kepanjen Kabupaten Malang', '(0341) 391679 ', 'ciptakarya@malangkab.go.id', 'http://ciptakarya.malangkab.go.id'),
('421.112', 'Dinas Koperasi, Usaha Mikro, Kecil dan Menengah', 'Jl. Trunojoyo Kav. 1, Kepanjen?', '(0341) 393921', 'dinkop@malangkab.go.id', 'http://dinkop.malangkab.go.id'),
('421.113', 'Dinas Perindustrian, Perdagangan dan Pasar', 'Jl. Trunojoyo Kav. 6, Kepanjen', '(0341) 391673', 'disperindag@malangkab.go.id', 'http://disperindag.malangkab.go.id'),
('421.114', 'Dinas Pertanian dan Perkebunan', 'Jl.Sumedang No. 28 Kepanjen', '(0341) 396893', 'distanbun@malangkab.go.id', 'http://distanbun.malangkab.go.id'),
('421.115', 'Dinas Kelautan dan Perikanan', 'Jl. Panji No.119 Kepanjen Malang. Belakang kantor DPRD', '(0341) 399755', 'kelautan@malangkab.go.id', 'http://kelautan.malangkab.go.id'),
('421.116', 'Dinas Kehutanan', 'Jl. Raya Genengan KM. 9,3, Pakisaji Malang', '(0341) 806454', 'kehutanan@malangkab.go.id', 'http://kehutanan.malangkab.go.id'),
('421.117', 'Dinas Energi dan Sumberdaya Mineral', 'Jl. A. Yani Utara No. 384B Malang', '(0341) 408788', 'esdm@malangkab.go.id', 'http://esdm.malangkab.go.id'),
('421.118', 'Dinas Peternakan dan Kesehatan Hewan', 'Jl. Trunojoyo Kav. 4 Kepanjen', '(0341) 393926', 'peternakan@malangkab.go.id', 'http://peternakan.malangkab.go.id'),
('421.119', 'Dinas Pendapatan, Pengelolaan Keuangan dan Aset', 'Jl. KH.Agus Salim No.7 Malang', '(0341) 362372', 'dppka@malangkab.go.id', 'http://dppka.malangkab.go.id'),
('421.201', 'Dinas Inspektorat Kabupaten', '', '', '', ''),
('421.202', 'Badan Kepegawaian Daerah', 'Jl. KH.Agus Salim No.7 Malang', '(0341) 364776', 'bkd@malangkab.go.id', 'http://bkd.malangkab.go.id'),
('421.203', 'Badan Perencanaan Pembangunan', 'Jl. Panji No. 158 Kepanjen', '(0314) 392322', 'bappekab@malangkab.go.id', 'http://bappekab.malangkab.go.id'),
('421.204', 'Badan Penelitian dan Pengembangan', 'Jl.KH Agus Salim No 7 Malang', '(0341) 369390', 'balitbang@malangkab.go.id', 'http://balitbang.malangkab.go.id'),
('421.205', 'Badan Kesatuan Bangsa dan Politik', 'Jl.KH. Agus Salim No.7 Malang', '(0341) 366260', 'bakesbangpol@malangkab.go.id', 'http://bakesbangpol.malangkab.go.id'),
('421.206', 'Badan Lingkungan Hidup', 'Jl. KH Agus Salim No. 7 Malang', '(0341) 393924', 'lh@malangkab.go.id', 'http://lh.malangkab.go.id'),
('421.207', 'Badan Ketahanan Pangan dan Pelaksana Penyuluhan', 'Jl. Raya Karangduren No. 1 Pakisaji - Malang', '(0341) 804423', 'bkp3@malangkab.go.id', 'http://bkp3.malangkab.go.id'),
('421.208', 'Badan Pemberdayaan Masyarakat', 'Jl Merdeka Timur No. 3 Malang', '(0341) 399755', 'bpm@malangkab.go.id', 'http://bpm.malangkab.go.id'),
('421.209', 'Badan Pendidikan dan Pelatihan', 'Jl. Merdeka Timur No. 3 Malang', ' (0341) 393931', 'diklat@malangkab.go.id', 'http://diklat.malangkab.go.id'),
('421.210', 'Badan Keluarga Berencana', 'Jl. Trunojoyo 10 Kepanjen', '(0341) 395294', 'kb@malangkab.go.id', 'http://kb.malangkab.go.id'),
('421.211', 'Badan Perpustakaan dan Arsip Daerah', 'Jl. Panglima Sudirman No. 19 Kepanjen', '(0341) 397789', 'perpustakaan@malangkab.go.id', 'http://perpustakaan.malangkab.go.id'),
('421.214', 'Badan Perumahan', 'Jl. Nusa Barong No. 13 Malang', '(0341) 341894', 'perumahan@malangkab.go.id', 'http://perumahan.malangkab.go.id'),
('421.216', 'Badan Penanggulangan Bencana Daerah', 'Jl. Trunojoyo Kepanjen', '(0341) 392220', 'bpbd@malangkab.go.id', 'http://bpbd.malangkab.go.id'),
('421.302', 'Badan Pelayanan Perizinan Terpadu', 'Jl. Trunojoyo Kav. 6 Kepanjen', '(0341) 396633', 'perizinan@malangkab.go.id', 'http://perizinan.malangkab.go.id');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sppd`
--

CREATE TABLE IF NOT EXISTS `tbl_sppd` (
  `no_surat` varchar(30) NOT NULL,
  `kd_sdm` varchar(30) NOT NULL,
  `pengikut1` varchar(30) DEFAULT NULL,
  `pengikut2` varchar(30) DEFAULT NULL,
  `pengikut3` varchar(30) DEFAULT NULL,
  `uang_saku` int(10) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `lama` varchar(5) NOT NULL,
  `untuk` text NOT NULL,
  `dari` varchar(50) NOT NULL,
  `ke` varchar(50) NOT NULL,
  `transportasi` varchar(50) NOT NULL,
  `atas_beban` varchar(30) DEFAULT NULL,
  `pasal_anggaran` varchar(30) DEFAULT NULL,
  `keterangan` text,
  `pptk` varchar(10) NOT NULL,
  `bendahara_pengeluaran` varchar(10) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `pejabat` varchar(30) NOT NULL,
  `kode_skpd` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sppd`
--

INSERT INTO `tbl_sppd` (`no_surat`, `kd_sdm`, `pengikut1`, `pengikut2`, `pengikut3`, `uang_saku`, `tgl_berangkat`, `tgl_kembali`, `lama`, `untuk`, `dari`, `ke`, `transportasi`, `atas_beban`, `pasal_anggaran`, `keterangan`, `pptk`, `bendahara_pengeluaran`, `tanggal_surat`, `status`, `pejabat`, `kode_skpd`) VALUES
('094/1/421.024/2015', 'PNS0013', '', '', '', 100000, '2015-01-30', '2015-01-31', '2', 'Pakai Surat Dasar (Surat berdasarkan surat balasan). Pakai Surat Dasar (Surat berdasarkan surat balasan). Pakai Surat Dasar (Surat berdasarkan surat balasan).Pakai Surat Dasar (Surat berdasarkan surat balasan).Pakai Surat Dasar (Surat berdasarkan surat balasan).', 'Malang', 'Blitar', 'Mobil', '-', '-', '-', 'PNS0012', '0052', '2015-01-30', 'PNS00133002015', 'PNS0004', '421.024'),
('094/2/421.024/2015', 'PNS0006', 'PNS0037', '', '', 200000, '2015-01-30', '2015-01-31', '2', 'Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).', 'Malang', 'Surabaya', 'Sepeda Motor', '-', '-', '-', '0052', 'PNS0006', '2015-01-30', 'PNS00063002015', 'PNS0013', '421.024'),
('094/4/421.024/2015', '0052', '', '', '', 200000, '2015-01-30', '2015-01-31', '2', 'Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).', 'Malang', 'Surabaya', 'Sepeda Motor', '-', '-', '-', '0052', 'PNS0006', '2015-01-30', '00523002015', 'PNS0013', '421.024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_tugas`
--

CREATE TABLE IF NOT EXISTS `tbl_surat_tugas` (
  `no_surat` varchar(30) NOT NULL,
  `kd_sdm` varchar(30) NOT NULL,
  `pengikut1` varchar(30) DEFAULT NULL,
  `pengikut2` varchar(30) DEFAULT NULL,
  `pengikut3` varchar(30) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` text NOT NULL,
  `dasar` text,
  `pembuka_surat` text,
  `status` varchar(30) NOT NULL,
  `pejabat` varchar(30) DEFAULT NULL,
  `kode_skpd` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_tugas`
--

INSERT INTO `tbl_surat_tugas` (`no_surat`, `kd_sdm`, `pengikut1`, `pengikut2`, `pengikut3`, `tanggal_surat`, `tujuan`, `dasar`, `pembuka_surat`, `status`, `pejabat`, `kode_skpd`) VALUES
('094/1/421.024/2015', 'PNS0013', '', '', '', '2015-01-30', 'Pakai Surat Dasar (Surat berdasarkan surat balasan). Pakai Surat Dasar (Surat berdasarkan surat balasan). Pakai Surat Dasar (Surat berdasarkan surat balasan).Pakai Surat Dasar (Surat berdasarkan surat balasan).Pakai Surat Dasar (Surat berdasarkan surat balasan).', 'Pakai Surat Dasar (Surat berdasarkan surat balasan). Pakai Surat Dasar (Surat berdasarkan surat balasan).', '', 'PNS00133002015', 'PNS0004', '421.024'),
('094/2/421.024/2015', 'PNS0006', 'PNS0037', '', '', '2015-01-30', 'Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).', '', 'Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).', 'PNS00063002015', 'PNS0013', '421.024'),
('094/4/421.024/2015', '0052', '', '', '', '2015-01-30', 'Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).', '', 'Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).', '00523002015', 'PNS0013', '421.024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`no`), ADD UNIQUE KEY `kode_skpd_2` (`kode_skpd`), ADD KEY `kode_skpd` (`kode_skpd`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
 ADD PRIMARY KEY (`kd_jabatan`), ADD UNIQUE KEY `nama_jabatan` (`nama_jabatan`);

--
-- Indexes for table `tbl_pangkat_gol`
--
ALTER TABLE `tbl_pangkat_gol`
 ADD PRIMARY KEY (`kd_pg`);

--
-- Indexes for table `tbl_sdm`
--
ALTER TABLE `tbl_sdm`
 ADD PRIMARY KEY (`kd_sdm`), ADD KEY `kd_jabatan` (`kd_jabatan`), ADD KEY `kd_pg` (`kd_pg`);

--
-- Indexes for table `tbl_skpd`
--
ALTER TABLE `tbl_skpd`
 ADD PRIMARY KEY (`kode_skpd`);

--
-- Indexes for table `tbl_sppd`
--
ALTER TABLE `tbl_sppd`
 ADD PRIMARY KEY (`no_surat`), ADD UNIQUE KEY `status` (`status`), ADD KEY `kd_sdm` (`kd_sdm`), ADD KEY `pejabat` (`pejabat`), ADD KEY `kode_skpd` (`kode_skpd`), ADD KEY `pptk` (`pptk`), ADD KEY `bendahara_pengeluaran` (`bendahara_pengeluaran`);

--
-- Indexes for table `tbl_surat_tugas`
--
ALTER TABLE `tbl_surat_tugas`
 ADD PRIMARY KEY (`no_surat`), ADD UNIQUE KEY `status` (`status`), ADD KEY `kd_sdm` (`kd_sdm`), ADD KEY `pejabat` (`pejabat`), ADD KEY `kode_skpd` (`kode_skpd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1228;
--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
MODIFY `kd_jabatan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `tbl_pangkat_gol`
--
ALTER TABLE `tbl_pangkat_gol`
MODIFY `kd_pg` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`kode_skpd`) REFERENCES `tbl_skpd` (`kode_skpd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sdm`
--
ALTER TABLE `tbl_sdm`
ADD CONSTRAINT `tbl_sdm_ibfk_1` FOREIGN KEY (`kd_jabatan`) REFERENCES `tbl_jabatan` (`kd_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_sdm_ibfk_2` FOREIGN KEY (`kd_pg`) REFERENCES `tbl_pangkat_gol` (`kd_pg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sppd`
--
ALTER TABLE `tbl_sppd`
ADD CONSTRAINT `tbl_sppd_ibfk_1` FOREIGN KEY (`kd_sdm`) REFERENCES `tbl_sdm` (`kd_sdm`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_sppd_ibfk_2` FOREIGN KEY (`pejabat`) REFERENCES `tbl_sdm` (`kd_sdm`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_sppd_ibfk_3` FOREIGN KEY (`kode_skpd`) REFERENCES `tbl_skpd` (`kode_skpd`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_sppd_ibfk_4` FOREIGN KEY (`pptk`) REFERENCES `tbl_sdm` (`kd_sdm`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_sppd_ibfk_5` FOREIGN KEY (`bendahara_pengeluaran`) REFERENCES `tbl_sdm` (`kd_sdm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_surat_tugas`
--
ALTER TABLE `tbl_surat_tugas`
ADD CONSTRAINT `tbl_surat_tugas_ibfk_1` FOREIGN KEY (`kd_sdm`) REFERENCES `tbl_sdm` (`kd_sdm`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_surat_tugas_ibfk_2` FOREIGN KEY (`kd_sdm`) REFERENCES `tbl_sdm` (`kd_sdm`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_surat_tugas_ibfk_3` FOREIGN KEY (`pejabat`) REFERENCES `tbl_sdm` (`kd_sdm`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_surat_tugas_ibfk_4` FOREIGN KEY (`kode_skpd`) REFERENCES `tbl_skpd` (`kode_skpd`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
