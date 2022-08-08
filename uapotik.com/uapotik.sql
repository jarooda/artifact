-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2012 at 10:57 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uapotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(5) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `username`) VALUES
(30, 'Seminar "Membangun Portal Berita ala Detik.com"', 'seminar-membangun-portal-berita-ala-detikcom', 'Seminar ini akan membahas tentang konsep, proses, dan implementasi dalam membangun portal berita sekelas detik.com.<br>', 'Lab. Universitas Atmajaya Yogyakarta', 'HMJ TI (081843092580)', '2009-03-14', '2009-03-14', '2009-01-31', '11.00 s/d 13.00 WIB', 'admin'),
(31, 'Bedah Buku "Membongkar Trik Rahasia Master PHP"', 'bedah-buku-membongkar-trik-rahasia-master-php', 'Acara bedah buku terbaru dari Lukmanul Hakim yang berjudul Membongkar Trik Rahasia Para Master PHP.\r\n', 'Toko Buku Gramedia Sudirman', 'Enda (08192839849)', '2009-10-29', '2009-10-30', '2009-01-31', '08.00 s/d 12.00 WIB', 'joko'),
(29, 'Workshop "3 Hari Menjadi Master PHP"', 'workshop-3-hari-menjadi-master-php', 'Workshop ini bertujuan untuk bla .. bla .. bla<br>', 'Jogja Expo Center', 'Adi (081893274848)', '2009-02-21', '2009-02-23', '2009-01-31', '15.00 s/d Selesai', 'sinto'),
(36, 'Workshop VBA Programming for Excel', 'workshop-vba-programming-for-excel', 'Tes\r\n', 'Lab. Pusat Komputer UII', 'Aci (08189320984)', '2009-10-29', '2009-10-29', '2009-10-26', '09.00 s/d Selesai', 'wiro'),
(38, 'Workshop Kolaborasi PHP dan jQuery', 'workshop-kolaborasi-php-dan-jquery', 'Materinya mengenai cara mengkolaborasikan pemrograman PHP dan jQuery\r\n', 'Hotel Santika Yogyakarta', 'Rendy (08787768768)', '2010-01-15', '2010-01-15', '2010-01-15', '09.00 s/d 16.00 WIB', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(5) NOT NULL AUTO_INCREMENT,
  `jdl_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `gbr_album`, `aktif`) VALUES
(21, 'Kartun', 'kartun', '476928sonic.jpg', 'Y'),
(20, 'Pernikahan', 'pernikahan', '146667nikah.jpg', 'Y'),
(18, 'Bayi', 'bayi', '246551silvestree.jpg', 'Y'),
(12, 'Ilustrator', 'ilustrator', '987701family.jpg', 'Y'),
(19, 'Binatang', 'binatang', '391479burung.jpg', 'Y'),
(17, 'Arsitektur', 'arsitektur', '741638arche090.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(8, 'cucitangan', 'http://google.com', 'banner_cucitangan.jpg', '2012-09-05'),
(9, 'hipertensi', 'http://google.com', 'desain x banner .jpg', '2012-09-05'),
(10, 'loveufull', 'http://google.com', 'banner kesehatan blog 02.jpg', '2012-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `judul_seo`, `headline`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(1, 23, 'jaluffy', 'Resep Obat Batuk Herbal Untuk Anak', 'resep-obat-batuk-herbal-untuk-anak', 'Y', 'Saat anak kita batuk,mungkin akan susah memberinya obat,maka dari itu,gunakan perasan jeruk nipis dan dicampur dengan kecap,pasti anak akan suka.<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>\r\n', 'Kamis', '2012-08-09', '10:07:34', '24small_74batuk.JPG', 23, 'herbal,kesehatan,obat,resep'),
(2, 19, 'jaluffy', 'Musik Baik Bagi Tubuh', 'musik-baik-bagi-tubuh', 'Y', '<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Penelitian menunjukan bahwa musik ber genre blues baik bagi tubuh.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>\r\n', 'Senin', '2012-09-03', '08:23:02', '22small_37small_24michaelheart.jpg', 103, 'kecantikan,kesehatan'),
(14, 2, 'jaluffy', 'ABC Acai Berry (Acai Berry ABC)', 'abc-acai-berry-acai-berry-abc', 'Y', '<p>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">\r\n</strong>\r\n</p>\r\n<div style="padding: 0px; margin: 0px">\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">\r\n<strong style="padding: 0px; margin: 0px">Nama Lain:</strong>\r\n</strong>\r\n</div>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">\r\n<ul style="font-weight: normal; padding: 0px; margin: 0px">\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Acai Berry ABC</li>\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Ba Xi Mei Jian Fei Jiao Nang (&#24052;&#35199;&#33683;&#20943;&#32933;&#33014;&#22218;)</li>\r\n</ul>\r\n<br />\r\n<strong style="padding: 0px; margin: 0px"><strong style="padding: 0px; margin: 0px">Varian Produk:</strong></strong><br />\r\n<ul style="font-weight: normal; padding: 0px; margin: 0px">\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px"><strong style="padding: 0px; margin: 0px">Cherish Acai Berry</strong></li>\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px"><strong style="padding: 0px; margin: 0px">Acai Berry</strong></li>\r\n</ul>\r\n<div>\r\n<br />\r\n</div>\r\nBentuk/Kemasan:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;Kapsul Softgel</span><br />\r\n<br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Produsen:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;M.G.L Corp / M.G.L Health</span>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\n.<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>&nbsp;\r\n</p>\r\n', 'Jumat', '2012-09-07', '01:02:04', '15Abc.jpg', 2, 'herbal,kecantikan,kesehatan,obat'),
(6, 2, 'jaluffy', 'P57 Hoodia', 'p57-hoodia', 'Y', '<p>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Nama Lain:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> P57 Hoodia Cactus Slimming Capsule</span><br />\r\n<br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Bentuk/Kemasan:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> Kapsul Softgel</span><br />\r\n<br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Produsen:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> </span><a style="color: #df0000; text-decoration: none; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px" href="http://www.kelvinhealth.com/">Kelvin (China) Co.,LTD</a><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> (</span><a style="color: #df0000; text-decoration: none; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px" href="http://www.kelvinhealth.com/">Kelvin Health</a><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">)</span>\r\n</p>\r\n<p>\r\n <span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span> \r\n</p>\r\n', 'Rabu', '2012-09-05', '21:58:06', '14Hoodia-P57-450px.jpg', 4, 'herbal,kesehatan,obat,penyakit'),
(7, 2, 'jaluffy', 'Leptin Green Coffee 800', 'leptin-green-coffee-800', 'Y', '<p>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Bentuk/Kemasan:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> Kopi dalam </span><em style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">sachet</em><br />\r\n<br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Produsen:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> Leptin</span><br />\r\n<br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Zat Berbahaya:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> Sibutramine</span>\r\n</p>\r\n<p>\r\n<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span> \r\n</p>\r\n', 'Rabu', '2012-09-05', '22:00:47', '49Leptin+Green+Coffee+800.jpg', 1, 'herbal,kesehatan,obat,penyakit'),
(8, 2, 'jaluffy', 'Lida Daidaihua (Li Da Dai Dai Hua)', 'lida-daidaihua-li-da-dai-dai-hua', 'Y', '<p>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px"><span style="font-weight: normal; padding: 0px; margin: 0px" class="Apple-style-span"><strong style="padding: 0px; margin: 0px">Bentuk/Kemasan:</strong> Kapsul</span></strong><br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px"><span style="font-weight: normal; padding: 0px; margin: 0px" class="Apple-style-span"><br />\r\n</span></strong><br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Produsen:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left"> Kunming Dali Industry & Co (KM Lida)</span>\r\n</p>\r\n<p>\r\n<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span> \r\n</p>\r\n', 'Rabu', '2012-09-05', '22:01:22', '5lida_daidaihua_slimming_capsule.jpg', 2, 'kecantikan,kesehatan,kimiawi,obat'),
(17, 2, 'jaluffy', 'Meizitang Botanical Slimming Soft Gel', 'meizitang-botanical-slimming-soft-gel', 'Y', '<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Nama Lain:</strong><br />\r\n<ul style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Botanical Slimming</li>\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Mei Zi Tang (<span style="font-size: 14px; line-height: 22px; padding: 0px; margin: 0px" class="Apple-style-span">&#32654;&#23039;&#22530;)</span></li>\r\n</ul>\r\n<p>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px"><span style="font-weight: normal; padding: 0px; margin: 0px" class="Apple-style-span"><strong style="padding: 0px; margin: 0px">Bentuk/Kemasan:</strong>&nbsp;Kapsul Softgel</span></strong><br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px"><span style="font-weight: normal; padding: 0px; margin: 0px" class="Apple-style-span"><br />\r\n</span></strong><br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Produsen:&nbsp;</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">M.G.L Corp / M.G.L Health</span>\r\n</p>\r\n<p>\r\n.<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>&nbsp;\r\n</p>\r\n', 'Jumat', '2012-09-07', '01:05:04', '62meizitang.jpg', 10, 'herbal,kecantikan,kesehatan,obat'),
(16, 2, 'jaluffy', 'Fruta Planta', 'fruta-planta', 'Y', '<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Varian Produk:</strong><br />\r\n<ul style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Fruta Bio</li>\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Fruit &amp; Plant</li>\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Fruta Plus (FPlus)</li>\r\n</ul>\r\n<p>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Bentuk/Kemasan:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;Kapsul</span><br />\r\n<br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Produsen:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;GuangZhou Yanxiang Biotechnology Co, Ltd</span>\r\n</p>\r\n<p>\r\n.<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>&nbsp;\r\n</p>\r\n', 'Jumat', '2012-09-07', '01:04:10', '42fruta_plata.jpg', 8, 'kecantikan,kesehatan,kimiawi,obat'),
(15, 2, 'jaluffy', 'Fatloss Slimming Beauty', 'fatloss-slimming-beauty', 'Y', '<div style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold; padding: 0px; margin: 0px">\r\n<strong style="padding: 0px; margin: 0px">Nama Lain:</strong>\r\n</div>\r\n<ul style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Fatloss Slimming</li>\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px">Fatloss Jimpness Beauty</li>\r\n</ul>\r\n<p>\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Bentuk/Kemasan:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;Kapsul</span><br />\r\n<br />\r\n<strong style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Produsen:</strong><span style="color: #444444; font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;-</span>\r\n</p>\r\n<p>\r\n.<span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>&nbsp;\r\n</p>\r\n', 'Jumat', '2012-09-07', '01:03:09', '2Fat_Loss.jpg', 2, 'herbal,kecantikan,kesehatan,obat'),
(12, 2, 'jaluffy', 'Paiyouji', 'paiyouji', 'Y', '<span style="background-color: #ffffff"><strong style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Nama Lain:</strong><br />\r\n<br />\r\n</span>\r\n<ul style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px"><span style="background-color: #ffffff">Pai You Ji (&#25490;&#27833;&#22522;, Penghancur Lemak)</span></li>\r\n	<li style="margin-top: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 50px; list-style-image: url(&#39;http://2.bp.blogspot.com/-EqlCMOhJPsc/Tj65MWnN9XI/AAAAAAAAADg/gQ4ir2UvNrY/s1600/bullet.png&#39;); padding: 0px"><span style="background-color: #ffffff">Paiyouji Plus</span></li>\r\n</ul>\r\n<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; text-align: justify">\r\n<span style="background-color: #ffffff"><br />\r\n<br />\r\n<strong style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Bentuk/Kemasan:</strong><span style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;Teh dalam&nbsp;</span><em style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">sachet</em><br />\r\n<br />\r\n<strong style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; padding: 0px; margin: 0px">Varian Produk:</strong><span style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left">&nbsp;Paiyouji Capsule</span></span>\r\n</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; text-align: justify">\r\n<span style="background-color: #ffffff"><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>&nbsp;</span>\r\n</p>\r\n', 'Jumat', '2012-09-07', '00:51:16', '39100_Paiyouji.jpg', 3, 'kecantikan,kesehatan,kimiawi,obat');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(1, 'Resep Penawar Diare Buatan Rumah', 'resep_penawar_diare_buatan_rumah.docx', '2012-09-13', 1),
(2, 'Resep Obat Batuk Buatan Rumah', 'resep_batuk.docx', '2012-09-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(5) NOT NULL AUTO_INCREMENT,
  `id_album` int(5) NOT NULL,
  `jdl_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(3, 12, 'Duduk di Sofa', 'duduk-di-sofa', 'Sekeluarga sedang duduk di sofa.', '27587family sofa.jpg'),
(4, 12, 'Didepan Rumah', 'didepan-rumah', 'Sekeluarga sedang berada di ladang.', '258819family field.jpg'),
(5, 12, 'Keluarga Bahagia', 'keluarga-bahagia', 'Si anak memperlihatkan lukisan.', '697448family.jpg'),
(7, 19, 'Lebah', 'lebah', 'Lebah besar terbang.', '322906lebah.jpg'),
(8, 17, 'Bangunan Jepang', 'bangunan-jepang', 'Bangunan khas jepang', '370422arche037.jpg'),
(9, 17, 'Candi Merang', 'candi-merang', 'Bangunan candi khas kerajaan', '346527arche014.jpg'),
(10, 18, 'Cukur Janggut', 'cukur-janggut', 'Bayi unik sedang cukur rambut', '892395macho4.jpg'),
(11, 18, 'Push Up', 'push-up', 'Bayi unik sedang melakukan push-up', '991546macho1.jpg'),
(12, 19, 'Kuda Nyengir', 'kuda-nyengir', 'Gini nih kalau kuda lagi nyengir.', '658447kuda.jpg'),
(13, 21, 'Super Mario Bross', 'super-mario-bross', 'Game klasik 3D Mario Bross.', '601318mario bros.jpg'),
(32, 21, 'Naruto', 'naruto', 'Kartun ninja jepang Naruto', '45440naruto.jpg'),
(15, 21, 'Superman', 'superman', 'Superman kecil mau beraksi', '689147superman.jpg'),
(27, 21, 'Sonic', 'sonic', 'Sonic and Friend', '152618sonic.jpg'),
(31, 21, 'Kungfu Panda', 'kungfu-panda', 'Jack Black', '550598panda2.jpg'),
(33, 21, 'Maskot Euro 2008', 'maskot-euro-2008', 'Trix dan Flix di Euro 2008', '816528mascot.jpg'),
(14, 21, 'Harry Potter', 'harry-potter', 'Game Harry Potter', '735687potter.jpg'),
(42, 21, 'Avatar', 'avatar', 'Eng si Gundul Avatar', '874877avatar.jpg'),
(16, 21, 'Shrek', 'shrek', 'Film 3D Shrek 2', '527801shrek06_800.jpg'),
(44, 21, 'Kenshin', 'kenshin', 'Kenshin Himura', '494110himura.jpg'),
(45, 21, 'Sun Goku', 'sun-goku', 'Goku Cilik', '266845goku.JPG'),
(46, 21, 'Virtual Girl', 'virtual-girl', 'Gadis Cantik 3D', '837921Girl.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(2, 'Visi dan Misi', '<p>Kami adalah sebuah apotek yang bertempat di Jl. Rindang Asih no. 26 Ungaran Kab.Semarang</p><p>Kami membuat website dengan harapan membantu masyarakat lebih cepat medapatkan penanganan terhadap suatu penyakit</p><p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px" class="Apple-style-span"><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></span></p><p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px" class="Apple-style-span"><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></span></p><p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px" class="Apple-style-span"><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></span></p><p><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px" class="Apple-style-span"><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="font-family: sans-serif; font-size: 13px; line-height: 19px" class="Apple-style-span">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;</p>', '2010-05-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(13, 'Jalu Wibowo A', 'jaluffy@yahoo.com', 'Contact Us', '', '2012-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(100) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `meta_deskripsi`, `meta_keyword`, `favicon`) VALUES
(1, 'uapotik.com - Apotik Ungaran Terbesar', 'uapotik adalah apotik terbesar dan terlengkap di wilayah kabupaten semarang', 'pharmacy , apotik , obat , ungaran , kabupaten , semarang , jateng , resep', 'favicon.ico');

-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE IF NOT EXISTS `katajelek` (
  `id_jelek` int(11) NOT NULL AUTO_INCREMENT,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_jelek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `ganti`) VALUES
(4, 'sex', 's**'),
(2, 'bajingan', 'b*******'),
(3, 'bangsat', 'b******');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `aktif`) VALUES
(19, 'Gaya Hidup', 'gaya-hidup', 'Y'),
(2, 'Produk', 'produk', 'Y'),
(22, 'Penyakit', 'penyakit', 'Y'),
(23, 'Resep', 'resep', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=81 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`) VALUES
(12, 71, 'Wisnu', 'wisnu.wordpress.com', 'pertamax', '2009-02-02', '08:10:23', 'Y'),
(13, 71, 'Adrian', 'adrian.blogspot.com', 'CR 7 emang idola gua, melesat terus ya prestasinya.', '2009-02-02', '09:06:01', 'Y'),
(15, 79, 'Armen', 'detik.com', 'ahmadinejad emang idolaku', '2009-02-03', '10:05:20', 'Y'),
(17, 74, 'Lukman', 'hakim.com', 'apakah browser google secanggih search enginenya?', '2009-02-21', '10:12:23', 'Y'),
(34, 92, 'Rudi', 'bukulokomedia.com', ' Kalau  tentang  gue,  kapan  dibuat  filmnya  ya?   ', '2009-10-28', '21:21:21', 'Y'),
(22, 77, 'Raihan', 'bukulokomedia.com', 'mas .. tolong kirimin source code proyek lokomedia&nbsp; ke email saya di raihan@gmail.com', '2009-08-25', '16:30:00', 'Y'),
(23, 77, 'Wawan', 'bukulokomedia.com', 'woi .. kunjungin dong website saya di http://bukulokomedia.com, jangan lupa kasih komen dan sarannya ya.', '2009-08-25', '16:31:50', 'Y'),
(36, 93, 'Lukman', 'google.com', 'tes  kata-kata  jelek  sex   ', '2009-11-04', '10:04:26', 'Y'),
(65, 85, 'hilman', 'antonhilman.com', ' emang  sih,  windows  7  lebih  cepat  dibandingkan  vista,  tapi  masih  banyak  bug  bung.   ', '2010-01-15', '04:16:25', 'Y'),
(66, 78, 'ronaldinho', 'ronaldino.com', ' ronaldo  pantas  mendapatkannya  tahun  ini  dan  kayaknya  tahun  depan  masih  menjadi  miliknya.   ', '2010-01-15', '04:18:08', 'Y'),
(67, 99, 'lukman', 'bukulokomedia.com', ' tes   ', '2010-02-11', '02:42:46', 'Y'),
(69, 99, 'fathan', 'bukulokomedia.com', 'keduax', '2010-02-15', '07:44:12', 'Y'),
(70, 99, 'Rianto', 'bukulokomedia.com', ' kok  nggak  ada  yang  pertamax  ..  langsung  keduax  sih.   ', '2010-05-16', '11:33:26', 'Y'),
(72, 99, 'lokomedia', 'bukulokomedia.com', ' test  paging  komentar   ', '2012-01-03', '17:50:14', 'Y'),
(73, 99, 'husada', 'bukulokomedia.com', ' perbaikan  paging  halaman  komentar   ', '2012-01-03', '17:53:03', 'Y'),
(74, 99, 'hendra', 'bukulokomedia.com', ' iya  kemarin  sudah  saya  coba  yang  CMS  Lokomedia  versi  1.5,  paging  komentarnya  masih  error.   ', '2012-01-03', '17:53:59', 'Y'),
(75, 99, 'lukman', 'bukulokomedia.com', ' @  husada  dan  hendra:  terimakasih  atas  perbaikan  bugnya.   ', '2012-01-03', '17:54:41', 'Y'),
(76, 99, 'lokomedia', 'bukulokomedia.com', ' pada  versi  1.5.5,  bug  paging  halaman  komentar  sudah  diperbaiki.   ', '2012-01-03', '17:55:27', 'Y'),
(77, 99, 'hendra', 'bukulokomedia.com', ' paging  halaman  komentar  sudah  berjalan  dengan  baik,  thanks  lokomedia   ', '2012-01-03', '17:56:12', 'Y'),
(78, 99, 'lokomedia', 'bukulokomedia.com', ' test   ', '2012-01-03', '17:57:21', 'Y'),
(79, 99, 'cool', 'bukulokomedia.com', ' cool  man   ', '2012-01-03', '17:57:53', 'Y'),
(80, 1, 'admin', 'uapotik.com', ' asd   ', '2012-09-03', '08:17:52', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_main` int(5) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_main`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `link`, `aktif`) VALUES
(2, 'Home', 'index.php', 'Y'),
(3, 'Profil', '', 'Y'),
(4, 'Agenda', 'semua-agenda.html', 'N'),
(5, 'Berita', 'semua-berita.html', 'N'),
(6, 'Download Resep', 'semua-download.html', 'Y'),
(7, 'Galeri Foto', 'semua-album.html', 'N'),
(8, 'Hubungi Kami', 'hubungi-kami.html', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=68 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', '?module=user', '', '', 'N', 'user', 'Y', 1, ''),
(18, 'Berita', '?module=berita', '', '', 'Y', 'user', 'Y', 6, 'semua-berita.html'),
(19, 'Banner', '?module=banner', '', '', 'Y', 'admin', 'Y', 9, ''),
(10, 'Manajemen Modul', '?module=modul', '', '', 'N', 'admin', 'Y', 2, ''),
(31, 'Kategori', '?module=kategori', '', '', 'Y', 'admin', 'Y', 5, ''),
(34, 'Tag (Label)', '?module=tag', '', '', 'Y', 'admin', 'Y', 7, ''),
(36, 'Download', '?module=download', '', '', 'N', 'admin', 'Y', 11, 'semua-download.html'),
(40, 'Hubungi Kami', '?module=hubungi', '', '', 'Y', 'admin', 'Y', 12, 'hubungi-kami.html'),
(62, 'Shoutbox', '?module=shoutbox', '', '', 'Y', 'admin', 'N', 30, ''),
(45, 'Templates', '?module=templates', '', '', 'N', 'admin', 'Y', 16, ''),
(47, 'RSS', '-', '', '', 'Y', 'admin', 'N', 18, ''),
(63, 'Statistik User', '-', '', '', 'Y', 'admin', 'N', 31, ''),
(52, 'Pencarian', '-', '', '', 'Y', 'admin', 'N', 23, ''),
(54, 'Arsip Berita', '-', '', '', 'Y', 'admin', 'N', 25, ''),
(55, 'Berita Sebelumnya', '-', '', '', 'Y', 'admin', 'N', 26, '');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE IF NOT EXISTS `poling` (
  `id_poling` int(5) NOT NULL AUTO_INCREMENT,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_poling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `status`, `rating`, `aktif`) VALUES
(1, 'Internet Explorer', 'Jawaban', 23, 'Y'),
(2, 'Mozilla Firefox', 'Jawaban', 81, 'Y'),
(3, 'Google Chrome', 'Jawaban', 21, 'Y'),
(4, 'Opera', 'Jawaban', 22, 'Y'),
(8, 'Apa Browser Favorit Anda?', 'Pertanyaan', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE IF NOT EXISTS `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL AUTO_INCREMENT,
  `info` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sekilas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sekilasinfo`
--


-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE IF NOT EXISTS `shoutbox` (
  `id_shoutbox` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `website` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_shoutbox`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `shoutbox`
--

INSERT INTO `shoutbox` (`id_shoutbox`, `nama`, `website`, `pesan`, `tanggal`, `jam`, `aktif`) VALUES
(1, 'lukman', 'lukman.com', 'tes :-) aja ;-D ha ha ha <:D>', '2009-11-02', '00:00:00', 'Y'),
(2, 'hakim', 'hakim.com', 'tes :-) aja ;-D ha ha ha <:D>\r\ndfa\r\nfdas\r\nfdsa\r\nfdasf\r\n:-(', '2009-11-02', '00:00:00', 'Y'),
(3, 'daryono', 'bukulokomedia.com', 'ku tes lagi<br>\r\ntes :-) aja ;-D ha ha ha &lt;:D&gt;<br>\r\nkeren euy<br>\r\n:-(', '2009-11-02', '13:55:00', 'Y'),
(5, 'iin', 'uin-suka.ac.id', 'tes aja euy ;-D boi', '2009-11-03', '11:36:06', 'Y'),
(8, 'jaluffy', 'jaluffy.blogspot.com', 'tes keatas', '2012-09-20', '09:01:10', 'Y'),
(9, 'tes keatas', 'tes keatas', 'tes keatas tes keatas', '2012-09-20', '09:01:19', 'Y'),
(10, '.+6sgdhsd', '15156', '65456465', '2012-09-20', '09:06:49', 'Y'),
(11, 'riza', '', 'gaya :;-D', '2012-09-20', '09:07:23', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.1', '2012-08-09', 94, '1344483065'),
('127.0.0.1', '2012-09-07', 195, '1346964811'),
('127.0.0.1', '2012-09-08', 3, '1347108902'),
('127.0.0.1', '2012-09-11', 32, '1347311566'),
('127.0.0.1', '2012-09-13', 106, '1347511041'),
('127.0.0.1', '2012-09-20', 68, '1348108567'),
('192.168.1.12', '2012-09-20', 16, '1348106844'),
('192.168.1.33', '2012-09-20', 1, '1348107111'),
('192.168.1.27', '2012-09-20', 1, '1348107684');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id_sub` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`) VALUES
(2, 'About Us', 'statis-2-visidanmisi.html', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `tag_seo`, `count`) VALUES
(24, 'Kimiawi', 'kimiawi', 6),
(23, 'Herbal', 'herbal', 11),
(22, 'Resep', 'resep', 3),
(16, 'Obat', 'obat', 24),
(17, 'Penyakit', 'penyakit', 12),
(19, 'Kesehatan', 'kesehatan', 16),
(21, 'Kecantikan', 'kecantikan', 15);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`) VALUES
(1, 'Standar', 'Lukmanul Hakim', 'templates/standar', 'N'),
(2, 'Building', 'Lukmanul Hakim', 'templates/building', 'N'),
(3, 'eL jQuery', 'Lukmanul Hakim', 'templates/eljquery', 'N'),
(4, 'eL jQuery versi 2', 'Lukmanul Hakim', 'templates/eljquery2', 'N'),
(5, 'eL jQuery ala Yahoo', 'Lukmanul Hakim', 'templates/eljquery-yahoo', 'N'),
(7, 'Tugas UKK', 'Jaluffy D. Cross', 'templates/ukk', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('jaluffy', '359d839cc27efe9832104b6986d0f164', 'Jaluffy D. Cross', 'jaluffy@uapotik.com', '085640541373', 'admin', 'N', 'sg7dh9rm68ehqs2e0o8qvp76r4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
