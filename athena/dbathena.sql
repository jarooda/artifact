-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2013 at 02:39 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbathena`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_lengkap` varchar(25) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `no_telp` varchar(12) CHARACTER SET latin1 NOT NULL,
  `level` varchar(20) CHARACTER SET latin1 NOT NULL,
  `blokir` enum('Y','N') CHARACTER SET latin1 NOT NULL DEFAULT 'N',
  `kd` varchar(6) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `kd`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'jajal@gmail.com', '081239870033', 'admin', 'N', 'A0001'),
('jalu', '0b0176c84dfb4641757bd0ec6f068d8c', 'Jalu Wibowo', 'jajal@yahoo.co.id', '083798801234', 'petugas', 'N', 'T0001'),
('x', '9dd4e461268c8034f5c8564e155c67a6', 'XaXa', 'XaXa@XaXa.com', '085640541373', 'petugas', 'N', 'T0002'),
('udin', '6bec9c852847242e384a4d5ac0962ba0', 'Udin', 'udin@udin.com', '0123456789', 'user', 'N', 'U0001'),
('ardian', '46632a526b980b41478ca6078fb02c28', 'Ardian', 'ardian@yahoo.com', '0818181818', 'user', 'N', 'U0002'),
('sulem', '4bce433567091f9fcc68e236c966bb45', 'Galih', 'sulem@galih.com', '088888888', 'user', 'N', 'U0003'),
('elita', 'f95c24c42b0f2ea683727cc47cde3ad2', 'Elita', 'epheral@gmail.com', '083838383838', 'user', 'N', 'U0004'),
('diofazka', '441954f08c2bb46ea74355497a655f7f', 'El Maru', 'aztecboyzonic@yahoo.com', '08181818181', 'user', 'N', 'U0005'),
('ana', '276b6c4692e78d4799c12ada515bc3e4', 'Octaviana', 'octo@rocketmail.com', '09090990909', 'user', 'N', 'U0006'),
('dama', '38ef675b5792e94e47517177a14a8cf9', 'Dama', 'mbahe@gmail.com', '08686868689', 'user', 'N', 'U0007'),
('shichibukawa', 'ded3d0299c47566fbf51621ace258e95', 'Hendra', 'sichibukawa@rpl.com', '0', 'user', 'N', 'U0008');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` varchar(5) NOT NULL,
  `isi_berita` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `isi_berita`, `date`) VALUES
('1', 'Penambahan 10 komputer untuk sistem informasi di Perpustakaan Athena.', '2013-02-24'),
('2', 'Pengangkatan petugas baru, selamat datang XaXa.', '2013-02-24'),
('3', 'Masuknya buku baru untuk bulan Maret.', '2013-02-24'),
('4', '2 hari lagi adalah hari presentasi sistem informasi Perpustakaan Athena, fight buat Jalu Wibowo !', '2013-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `buku_kode` varchar(10) NOT NULL,
  `kategori_kode` varchar(10) NOT NULL,
  `penerbit_kode` varchar(10) NOT NULL,
  `buku_judul` varchar(100) NOT NULL,
  `buku_jumhal` int(5) NOT NULL,
  `buku_diskripsi` varchar(10000) NOT NULL,
  `buku_pengarang` varchar(30) NOT NULL,
  `buku_tahun_terbit` int(4) NOT NULL,
  `buku_stok` enum('Ada','Tidak Ada') NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `kolom` int(3) NOT NULL,
  PRIMARY KEY (`buku_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_kode`, `kategori_kode`, `penerbit_kode`, `buku_judul`, `buku_jumhal`, `buku_diskripsi`, `buku_pengarang`, `buku_tahun_terbit`, `buku_stok`, `gambar`, `kolom`) VALUES
('N0001', '1', '1', 'Percy Jackson & the Olympians : The Lightning Thief', 500, '"You shall go west and face the god who has turned find what was stolen and see it safely returned you shall be betrayed by the one who calls you a friend and fail to save what matters most in the end"', 'Rick Riordan', 2005, 'Ada', 'pjao_lt.jpg', 1),
('K0001', '3', '5', 'One Piece Volume 64', 100, 'Luffy,manusia pemakan buah setan Gomu Gomu No Mi yang mempunyai kekuatan seperti karet,berjuang menjadi raja bajak laut.', 'Eichiro Oda', 2012, 'Ada', '2220837-64_super.jpg', 1),
('N0002', '1', '1', 'Percy Jackson & the Olympians : The Sea of Monsters', 500, 'You shall sail the iron ship with warriors of bone, You shall find what you seek and make it your own, But despair for your life entombed within stone, And fail without friends, to fly home alone.', 'Rick Riordan', 2006, 'Ada', 'pjao_tsom.jpg', 1),
('N0003', '1', '1', 'Percy Jackson & the Olympians : The Titan Curse', 500, 'You shall sail the iron ship with warriors of bone, You shall find what you seek and make it your own, But despair for your life entombed within stone, And fail without friends, to fly home alone.', 'Rick Riordan', 2007, 'Ada', 'pjao_ttc.jpg', 1),
('N0004', '1', '1', 'Percy Jackson & the Olympians : The Battle of the Labyrinth', 500, 'You shall delve in the darkness of the endless maze, The dead, the traitor and the lost one raise', 'Rick Riordan', 2008, 'Ada', 'pjao_tbol.jpg', 1),
('N0005', '1', '1', 'Percy Jackson & the Olympians : The Last Olympian', 500, 'A half-blood of the eldest gods Shall reach sixteen against all odds And see the world in endless', 'Rick Riordan', 2009, 'Ada', 'pjao_tlo.jpg', 1),
('K0002', '3', '5', 'One Piece Volume 65', 100, 'Luffy,manusia pemakan buah setan Gomu Gomu No Mi yang mempunyai kekuatan seperti karet,berjuang menjadi raja bajak laut.', 'Eichiro Oda', 2012, 'Ada', '2220838-65_super.jpg', 1),
('K0003', '3', '5', 'One Piece Volume 66', 100, 'Luffy,manusia pemakan buah setan Gomu Gomu No Mi yang mempunyai kekuatan seperti karet,berjuang menjadi raja bajak laut.', 'Eichiro Oda', 2012, 'Ada', '2361727-66_super.jpg', 1),
('K0004', '3', '5', 'One Piece Volume 67', 100, 'Luffy,manusia pemakan buah setan Gomu Gomu No Mi yang mempunyai kekuatan seperti karet,berjuang menjadi raja bajak laut.', 'Eichiro Oda', 2013, 'Ada', '2541686-67_super.jpg', 1),
('K0005', '3', '5', 'One Piece Volume 68', 100, 'Luffy,manusia pemakan buah setan Gomu Gomu No Mi yang mempunyai kekuatan seperti karet,berjuang menjadi raja bajak laut.', 'Eichiro Oda', 2013, 'Ada', '2712803-one_piece_v_68_super.jpg', 1),
('N0006', '1', '14', 'Sword Art Online Volume 1', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2008, 'Ada', '419px-Sword_Art_Online_Vol_01_cover.jpg', 1),
('N0007', '1', '14', 'Sword Art Online Volume 2', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2008, 'Ada', 'Sword_Art_Online_Vol_02_-_cover.jpg', 1),
('N0008', '1', '14', 'Sword Art Online Volume 3', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2008, 'Ada', '420px-Sword_Art_Online_Vol_03_-_001.jpg', 1),
('N0009', '1', '14', 'Sword Art Online Volume 4', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2008, 'Ada', '423px-Sword_Art_Online_4_-_001.jpg', 1),
('N0010', '1', '14', 'Sword Art Online Volume 5', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2009, 'Ada', 'Sword_Art_Online_Vol_05_-_cover.jpeg', 1),
('N0011', '1', '14', 'Sword Art Online Volume 6', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2009, 'Ada', 'Sword_Art_Online_Vol_06_cover.jpeg', 2),
('N0012', '1', '14', 'Sword Art Online Volume 7', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2010, 'Ada', '412px-Sword_Art_Online_Vol_07_-001.jpeg', 2),
('N0013', '1', '14', 'Sword Art Online Volume 8', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2010, 'Ada', 'Sword_Art_Online_Vol_08_-_cover.jpg', 2),
('N0014', '1', '14', 'Sword Art Online Volume 9', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2011, 'Ada', '416px-Sword_Art_Online_Vol_09_-_001.jpg', 2),
('N0015', '1', '14', 'Sword Art Online Volume 10', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2011, 'Ada', '402px-Sword_Art_Online_Vol_10_-_001.jpg', 2),
('N0016', '1', '14', 'Sword Art Online Volume 11', 50, 'Game Over sama dengan kematian. Temukan jalan keluar dari dunia VRMMORPG Sword Art Online.', 'Reki Kawahara', 2012, 'Ada', '420px-Sword_Art_Online_Vol_11_cover.png', 2),
('A0001', '4', '15', 'Orang Islam Harus Kaya', 100, 'Perlukah muslim menjadi kaya ? apakah untuk bersedekah tidak perlu uang ? apakah pergi haji tidak perlu uang ?', 'Rachmat Ramadhan al-Banjari', 2011, 'Ada', 'Orang_islam_hrs_kaya_ok.jpg', 1),
('E0001', '2', '2', 'Lets Speak English', 75, 'Peradaban barat mulai menguasai ! mari kita kuasai juga bahasa mereka dengan Lets Speak English !!!', 'Imam Baehaqi', 2009, 'Tidak Ada', 'LETS SPEAK ENGLISH.jpg', 1),
('A0002', '4', '10', 'Misteri Shalat Subuh', 100, 'Siapa sering ketinggalan shalat subuh ? pasti anda akan menyesal setelah membaca buku ini.', 'Dr. Raghib As-Sirjani', 2011, 'Ada', '9593_misteri_shalat_subuh.jpg', 1),
('E0002', '2', '8', 'Lautan Olimpiade Matematika SMP', 100, 'Olimpiade Matematika adalah suatu ajang bergengsi. Raih kesempatan untuk menang dengan berlatih dengan buku ini', 'M. Sugeng, S.Si, S.Pd', 2008, 'Ada', 'Lautan_Olimpiade_mat.jpg', 1),
('P0001', '5', '12', 'Da Vinci Code', 500, 'Bahasa pemrograman baru yaitu Da Vinci Code (DVC). Merupakan bahasa fiktif karangan Jalu Wibowo Aji.', 'Da Vinci', 2009, 'Tidak Ada', 'DaVinciCode.jpg', 1),
('N0017', '1', '8', 'Refrain', 700, 'Refrain, novel bagus, bagus sekali, sekali baca pasti ketagihan, recommended.', 'Emlyn Chand', 2012, 'Tidak Ada', 'refrain.jpg', 2),
('A0003', '4', '3', 'Islamku Islam Anda Islam Kita', 300, 'Islam itu untuk siapa saja, saya , anda dan kita. Baca buku ini dan rasakan perbedaannya', 'Abdurrahman Wahid', 2008, 'Ada', 'buku-islam.jpg', 1),
('N0018', '1', '9', 'Negeri 5 Menara', 600, 'Negeri yang mereka impikan adalah negeri dengan menara yang berbeda. Temukan arti dari persahabatan mereka disini', 'A. Fuadi', 2010, 'Ada', '5_menara_ps_gm_contrast2.jpg', 2),
('N0019', '1', '5', 'Ini Rahasia', 300, 'Ini Rahasia, tetapi kenapa dibuat novel ? entahlah, yang pasti ini adalah rahasia :)', 'Netty Virgiantiny', 2012, 'Tidak Ada', '8844172.jpg', 2),
('A0004', '4', '10', 'Syarah Hadist Arbain', 250, 'Penjelasan 42 hadist TERPENTING dalam ISLAM !!!', 'Syaikh Muhammad', 2011, 'Tidak Ada', '1352763817_455605941_1-Gambar--Buku-syarah-hadits-arbain-penjelas-kandungan-hadits-arbain.jpg', 1),
('N0020', '1', '4', 'Forgiven', 600, 'Dimaafkan = Forgiven , Dimaafkan = Forgiven , Dimaafkan = Forgiven , Dimaafkan = Forgiven', 'Janet Fox', 2012, 'Tidak Ada', 'ForgivenFINALadjusted-1.jpg', 2),
('E0003', '2', '6', 'Matematika Praktis ala Om Son', 100, 'Om Son Strikes Again ! Baca Matematika Praktis Segera !!!', 'Om Son', 2011, 'Tidak Ada', 'omson.jpg', 1),
('N0021', '1', '9', 'Dan Hujan Pun Berhenti', 100, 'Habis hujan terbitlah pelangi. Peribahasa ngawur tapi itu benar adanya.', 'Farida Susanti', 2012, 'Tidak Ada', 'danhujanpunberhenti.jpg', 3),
('E0004', '2', '12', 'English For Islamic Studies', 200, 'Islam adalah agama universal, maka dibutuhkan pula bahasa yang universal, English For Islamic Studies hadir dengan pemahaman yang sangat gampang', 'Stain Jember', 2009, 'Ada', 'book-inggris-11.jpg', 1),
('N0022', '1', '13', 'The Wind Up Girl', 350, 'The Wind Up Girl = Cewek Angin Atas (?) baca dulu sajalah.', 'Paolo Bacigalupi', 2011, 'Ada', 'the-windup-girl-by-paolo-bacigalupi.jpg', 3),
('N0023', '1', '11', 'Laskar Pelangi', 350, 'Laskar Pelangi~ takkan terikat waktu~ #np Nidji - Laskar Pelangi', 'Andrea Hirata', 2010, 'Ada', 'laskar-pelangi1.jpg', 3),
('E0005', '2', '7', 'KAMUS ISTILAH TATA BAHASA INGGRIS', 500, 'KAMUS ISTILAH TATA BAHASA INGGRIS katanya sih lengkap. PRAKTIS DAN LENGKAP UNTUK SEMUA KALANGAN', 'M. Solahudin', 2008, 'Tidak Ada', 'KAMUS ISTILAH TATA BHS INGGRIS.jpg', 1),
('A0005', '4', '10', 'Adab Akhlak Pencari Ilmu', 120, 'Adab terhadap diri sendiri, orangtua, guru, keluarga, famili, dan masyarakat. Beberapa kesalahan penuntut ilmu', 'Yazid bin Abdul Qadar Lawas', 2012, 'Tidak Ada', 'akhlak-adab-menuntut-ilmu.jpg', 1),
('N0024', '1', '2', 'Ketika Cinta Bertasbih', 250, 'Cinta pun bisa bertasbih ! siapa yang menyangka ? maka baca buku ini sampai selesai', 'Habbiburahman El Shirazy', 2011, 'Ada', 'ksb2.jpg', 3),
('E0006', '2', '5', 'What I Talk About When I Talk About Running', 200, 'What I Talk About When I Talk About Running ? Apa Yang Aku Bicarakan Saat Berlari ? Entahlah~', 'Haruki Murakami', 2013, 'Ada', 'running.JPG', 1),
('E0007', '2', '15', 'Buku Pintar Menguasai Internet', 100, 'Buku Pintar Menguasai Internet walaupun sebenarnya tidak perlu, ini hanya untuk menambah database', 'Darma Jarot Shenia', 2012, 'Ada', '69827753.png', 1),
('A0006', '4', '10', 'Tata Cara Sholat Menurut Sunah Rasulullah', 140, 'Katanya sih Tata Cara Sholat Menurut Sunah Rasulullah, tapi ya gatau juga isinya~', 'Hafarima', 2013, 'Ada', 'Tata Cara Sholat.jpg', 1),
('A0007', '4', '9', 'Cara Nabi Mendidik Anak', 160, 'Cara Nabi Mendidik Anak sangatlaah keren, patut di praktekan di kehidupan masa kini', 'Cahaya Umat', 2012, 'Ada', 'cara-didik-anak.jpg', 1),
('A0008', '4', '2', 'Doa Doa Yang Terkabul', 205, 'Doa Doa Yang Terkabul, Ciyus Loh ._.', 'M. Irfan El-Firdausy', 2013, 'Tidak Ada', '20121018104505.jpg', 1),
('P0002', '5', '8', 'Python For Kids', 300, 'Bahasa Pemrograman Python bahasa ular biar menyaingi Harry Potter', 'Jason R. Briggs', 2013, 'Ada', 'PythonKids.png', 1),
('E0008', '2', '7', 'Konjugasi Bahasa Perancis', 600, 'Konjugasi Bahasa Perancis, Bahasa Perancis, Bahasa Cinta~', 'Eka M. Ilham', 2013, 'Ada', 'Buku_Pintar_Konj_4d366e552ec69 copy-500x500.jpg', 1),
('E0009', '2', '3', 'Cara Cepat Menulis Jepang', 401, 'Cara Cepat Menulis Jepang, 5 Menit pasti langsung pusing !', 'Enik Darwati', 2013, 'Ada', 'CARA MENULIS JEPANG.jpg', 1),
('A0009', '4', '13', 'Muslim Couple', 350, 'Cocok dibaca saat valentine, padahal valentine haram, wakakakak', 'M.Asraf Ali Tahriy', 2013, 'Tidak Ada', 'a-gift-for-the-muslim-couple-book-islamic-sharia-law.jpg', 1),
('E0010', '2', '1', 'Mahir Berbahasa Jepang Untuk Pemula', 200, 'Mahir Berbahasa Jepang Untuk Pemula, Percaya ? Coba Aja', 'Ucu Fadhilah', 2012, 'Tidak Ada', 'PANDUAN PRAKTIS MAHIR BERBAHASA JEPANG.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE IF NOT EXISTS `detail_pinjam` (
  `peminjaman_kode` int(10) NOT NULL,
  `buku_kode` varchar(10) NOT NULL,
  `detail_tgl_kembali` date NOT NULL,
  `detail_denda` double NOT NULL,
  `detail_status_kembali` enum('Kembali','Belum Kembali') NOT NULL,
  PRIMARY KEY (`peminjaman_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`peminjaman_kode`, `buku_kode`, `detail_tgl_kembali`, `detail_denda`, `detail_status_kembali`) VALUES
(1, 'K0005', '2013-02-28', 0, 'Kembali'),
(2, 'A0001', '2013-02-28', 0, 'Kembali'),
(3, 'N0010', '2013-02-28', 0, 'Kembali'),
(4, 'N0014', '2013-02-28', 0, 'Kembali'),
(5, 'A0001', '2013-03-04', 0, 'Kembali'),
(6, 'A0002', '2013-03-01', 0, 'Kembali'),
(7, 'N0010', '2013-03-03', 0, 'Kembali'),
(8, 'E0001', '2013-03-01', 0, 'Kembali'),
(9, 'E0002', '2013-03-01', 0, 'Kembali'),
(10, 'K0002', '2013-03-03', 0, 'Kembali'),
(11, 'N0004', '2013-03-04', 0, 'Kembali'),
(12, 'N0005', '2013-03-04', 0, 'Kembali'),
(13, 'N0012', '2013-03-04', 0, 'Kembali'),
(14, 'E0001', '2013-03-04', 0, 'Kembali'),
(15, 'K0001', '2013-03-04', 0, 'Kembali'),
(16, 'A0002', '2013-03-04', 0, 'Kembali'),
(17, 'P0001', '0000-00-00', 0, 'Belum Kembali'),
(18, 'N0021', '2013-03-04', 0, 'Kembali'),
(19, 'N0023', '0000-00-00', 0, 'Kembali'),
(20, 'N0017', '0000-00-00', 0, 'Belum Kembali'),
(21, 'N0020', '0000-00-00', 0, 'Belum Kembali'),
(22, 'N0019', '0000-00-00', 0, 'Belum Kembali'),
(23, 'E0004', '2013-03-04', 0, 'Kembali'),
(24, 'N0018', '2013-03-04', 0, 'Kembali'),
(25, 'A0004', '0000-00-00', 0, 'Belum Kembali'),
(26, 'N0013', '2013-03-04', 0, 'Kembali'),
(27, 'N0007', '2013-03-04', 0, 'Kembali'),
(28, 'A0003', '2013-03-04', 0, 'Kembali'),
(29, 'A0005', '0000-00-00', 0, 'Belum Kembali'),
(30, 'E0003', '0000-00-00', 0, 'Belum Kembali'),
(31, 'E0001', '0000-00-00', 0, 'Belum Kembali'),
(32, 'E0005', '0000-00-00', 0, 'Belum Kembali'),
(33, 'N0021', '0000-00-00', 0, 'Belum Kembali'),
(34, 'A0009', '0000-00-00', 0, 'Belum Kembali'),
(35, 'E0010', '0000-00-00', 0, 'Belum Kembali'),
(36, 'A0008', '0000-00-00', 0, 'Belum Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `flash`
--

CREATE TABLE IF NOT EXISTS `flash` (
  `flash_kode` varchar(10) NOT NULL,
  `flash_judul` varchar(50) NOT NULL,
  `kategori_kode` varchar(10) NOT NULL,
  `flash_direktori` varchar(100) NOT NULL,
  PRIMARY KEY (`flash_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flash`
--

INSERT INTO `flash` (`flash_kode`, `flash_judul`, `kategori_kode`, `flash_direktori`) VALUES
('1', 'Flash Page Flip Demo', '2', 'file_flash/1/');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `kartu_pendaftaran` (
  `kartu_barkode` varchar(30) NOT NULL,
  `petugas_kode` varchar(10) NOT NULL,
  `peminjam_kode` varchar(10) NOT NULL,
  `kartu_tgl_pembuatan` date NOT NULL,
  `kartu_tgl_akhir` date NOT NULL,
  `kartu_status_aktif` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`kartu_barkode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_pendaftaran`
--

INSERT INTO `kartu_pendaftaran` (`kartu_barkode`, `petugas_kode`, `peminjam_kode`, `kartu_tgl_pembuatan`, `kartu_tgl_akhir`, `kartu_status_aktif`) VALUES
('ATHENA-U0001-udin', 'T0002', 'U0001', '2013-02-24', '2014-02-24', 'Aktif'),
('ATHENA-U0002-ardian', 'T0002', 'U0002', '2013-02-28', '2014-02-28', 'Aktif'),
('ATHENA-U0003-sulem', 'T0002', 'U0003', '2013-03-01', '2014-03-01', 'Aktif'),
('ATHENA-U0004-elita', 'T0001', 'U0004', '2013-03-04', '2014-03-04', 'Aktif'),
('ATHENA-U0005-diofazka', 'A0001', 'U0005', '2013-03-04', '2014-03-04', 'Aktif'),
('ATHENA-U0006-ana', 'A0001', 'U0006', '2013-03-04', '2014-03-04', 'Aktif'),
('ATHENA-U0007-dama', 'A0001', 'U0007', '2013-03-04', '2014-03-04', 'Aktif'),
('ATHENA-U0008-sichibukawa', 'T0001', 'U0008', '2013-03-04', '2014-03-04', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_kode` varchar(10) NOT NULL,
  `kategori_nama` varchar(15) NOT NULL,
  PRIMARY KEY (`kategori_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_kode`, `kategori_nama`) VALUES
('1', 'Novel'),
('2', 'Edukasi'),
('3', 'Komik'),
('4', 'Agama'),
('5', 'Pemrograman');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `pdf_kode` varchar(10) NOT NULL,
  `pdf_judul` varchar(50) NOT NULL,
  `kategori_kode` varchar(10) NOT NULL,
  `pdf_file` varchar(100) NOT NULL,
  PRIMARY KEY (`pdf_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`pdf_kode`, `pdf_judul`, `kategori_kode`, `pdf_file`) VALUES
('1', 'Project Penjualan Java MySQL', '5', 'project_penjualan_java_mysql.pdf'),
('2', 'Membuat Preloader Flash', '5', 'MEMBUAT PRELOADER.pdf'),
('3', 'Kisi Soal Teori RPL', '2', 'Kisi Soal Teori-Rekayasa-Perangkat-Lunak.pdf'),
('4', 'Dasar Pemrograman Flash Game', '5', 'Dasar-Pemrograman-Flash-Game.pdf'),
('5', 'Percy Jackson & the Olympians : The Last Olympian', '1', 'percy-jackson-and-the-olympians-5-the-last-olympian.pdf'),
('6', 'Flash AS2 Koneksi MySQL', '5', 'kedatabasemenggunakanAdobeFlashdenganActionsScript.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
  `peminjam_kode` varchar(10) NOT NULL,
  `peminjam_nama` varchar(30) NOT NULL,
  `peminjam_alamat` varchar(100) NOT NULL,
  `peminjam_telp` varchar(12) NOT NULL,
  `peminjam_foto` varchar(500) NOT NULL,
  `kd` varchar(6) NOT NULL,
  PRIMARY KEY (`peminjam_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`peminjam_kode`, `peminjam_nama`, `peminjam_alamat`, `peminjam_telp`, `peminjam_foto`, `kd`) VALUES
('U0001', 'Udin Akbar', 'Udin Street', '0123456789', 'IMG_0130.jpg', 'U0001'),
('U0002', 'Ardian Eka Pratama', 'Klepu Street', '0818181818', 'IMG_0107.jpg', 'U0002'),
('U0003', 'Yusuf Galih', 'Karangjati', '088888888', 'IMG_0132.jpg', 'U0003'),
('U0004', 'Elita Putri', 'Karangjati Area', '083838383838', 'IMG_0113.jpg', 'U0004'),
('U0005', 'El Maru', 'Bergas Town', '08181818181', 'IMG_0110.jpg', 'U0005'),
('U0006', 'Octaviana Ayu', 'Langensari Street', '09090990909', 'IMG_0126.jpg', 'U0006'),
('U0007', 'Dama Qoriy', 'Langensari Street', '08686868689', 'IMG_0111.jpg', 'U0007'),
('U0008', 'Hendra Sriwijaya', 'Lupa', '0', 'DSC_0021.jpg', 'U0008');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `peminjaman_kode` int(10) NOT NULL,
  `petugas_kode` varchar(10) NOT NULL,
  `peminjam_kode` varchar(10) NOT NULL,
  `peminjaman_tgl` date NOT NULL,
  `peminjaman_tgl_hrs_kembali` date NOT NULL,
  PRIMARY KEY (`peminjaman_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_kode`, `petugas_kode`, `peminjam_kode`, `peminjaman_tgl`, `peminjaman_tgl_hrs_kembali`) VALUES
(1, 'A0001', 'U0001', '2013-02-24', '2013-03-10'),
(2, 'A0001', 'U0001', '2013-02-24', '2013-03-10'),
(3, 'A0001', 'U0001', '2013-02-24', '2013-03-10'),
(4, 'A0001', 'U0001', '2013-02-24', '2013-03-10'),
(5, 'A0001', 'U0001', '2013-02-28', '2013-03-14'),
(6, 'A0001', 'U0001', '2013-02-28', '2013-03-14'),
(7, 'A0001', 'U0002', '2013-03-01', '2013-03-15'),
(8, 'A0001', 'U0002', '2013-03-01', '2013-03-15'),
(9, 'A0001', 'U0002', '2013-03-01', '2013-03-15'),
(10, 'A0001', 'U0002', '2013-03-01', '2013-03-15'),
(11, 'A0001', 'U0001', '2013-03-01', '2013-03-15'),
(12, 'A0001', 'U0001', '2013-03-01', '2013-03-15'),
(13, 'A0001', 'U0003', '2013-03-01', '2013-03-15'),
(14, 'A0001', 'U0003', '2013-03-01', '2013-03-15'),
(15, 'A0001', 'U0002', '2013-03-01', '2013-03-15'),
(16, 'T0002', 'U0003', '2013-03-01', '2013-03-15'),
(17, 'T0002', 'U0001', '2013-03-03', '2013-03-17'),
(18, 'T0002', 'U0003', '2013-03-04', '2013-03-17'),
(19, 'T0002', 'U0002', '2013-03-04', '2013-03-17'),
(20, 'A0001', 'U0004', '2013-03-04', '2013-03-18'),
(21, 'T0001', 'U0004', '2013-03-04', '2013-03-18'),
(22, 'T0001', 'U0004', '2013-03-04', '2013-03-18'),
(23, 'T0001', 'U0005', '2013-03-04', '2013-03-18'),
(24, 'T0001', 'U0006', '2013-03-04', '2013-03-18'),
(25, 'T0001', 'U0007', '2013-03-04', '2013-03-18'),
(26, 'A0001', 'U0003', '2013-03-04', '2013-03-18'),
(27, 'A0001', 'U0005', '2013-03-04', '2013-03-18'),
(28, 'A0001', 'U0007', '2013-03-04', '2013-03-18'),
(29, 'A0001', 'U0005', '2013-03-04', '2013-03-18'),
(30, 'A0001', 'U0006', '2013-03-04', '2013-03-18'),
(31, 'A0001', 'U0007', '2013-03-04', '2013-03-18'),
(32, 'A0001', 'U0006', '2013-03-04', '2013-03-18'),
(33, 'T0001', 'U0004', '2013-03-04', '2013-03-18'),
(34, 'T0001', 'U0003', '2013-03-04', '2013-03-18'),
(35, 'T0001', 'U0004', '2013-03-04', '2013-03-18'),
(36, 'T0001', 'U0008', '2013-03-04', '2013-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `penerbit_kode` varchar(10) NOT NULL,
  `penerbit_nama` varchar(30) NOT NULL,
  `penerbit_alamat` varchar(200) NOT NULL,
  `penerbit_telp` varchar(12) NOT NULL,
  PRIMARY KEY (`penerbit_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`penerbit_kode`, `penerbit_nama`, `penerbit_alamat`, `penerbit_telp`) VALUES
('1', 'MIZAN PUSTAKA', 'Golden Plaza (Kompleks Golden Truly) Blok G No. 15-16Jl. R.S. Fatmawati, Jakarta 12410', '021-7661724'),
('2', 'Matahati (Fantasi)', 'Plaza Karinda no. B1.17Jl. Karang Tengah No.6Jakarta 12440', '021-7503073'),
('3', 'Penerbit Ufuk Press', 'Jl: warga 23a Pejaten Barat Pasar Minggu JAKSEL 12510', '021-7976587'),
('4', 'Erlangga', 'EDSJl. H. Baping Raya No.100 Ciracas Ps. ReboJakarta Timur 13740', '021-8717006'),
('5', 'Gramedia Kantor Pusat', 'Jl. Palmerah Selatan 22 Lantai IV Jakarta 10270', '021-2601234'),
('6', 'Puspa Swara', 'Wisma hijau, Mekar Sari raya 15 Cimanggis Depok 16952', '021-8729060'),
('7', 'JavaMedia', 'Jalan. Polo Kamboja raya No. 41g Kemandoran1. kebayoran lama Jaksel 12210', '021-68882289'),
('8', 'Kayla Pustaka', 'Ampera Raya Gg: Kancil 15 Ragunan Jaksel 12550', '021-78847301'),
('9', 'Zikrul Hakim', 'Jl: waru no, 20b jaktim. 13220', '021-4754428'),
('10', 'Al Huda', 'Jl. Buncit Raya Kav.35, Pejaten Barat, Jakarta Selatan', '021-7996767'),
('11', 'Pustaka Utama Grafiti', 'Jl. KH. Wahid Hasyim 166A 10250', '021-31902906'),
('12', 'Grasindo', 'Jl. Palmerah Selatan 22-28Jakarta 10270', '021-53696546'),
('13', 'Pustaka Abdi Bangsa', 'Gedung IS Plaza Lt.9 Jl.Pramuka Raya No.151 Jakarta Timur 13120', '021-8560932'),
('14', 'Elex Media', 'Taman Meruya Plaza Blok E/14 No. 38-40, Kompleks Taman Meruya Ilir, Jakarta Barat', '021-5851473'),
('15', 'Pustaka Sufi & Pinkbooks', 'Perum Taman Mayapada Pertamina Blok. G No. 22Purwomartani, Kalasan, Sleman, Yogyakarta', '0274-7407482');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `petugas_kode` varchar(10) NOT NULL,
  `petugas_nama` varchar(25) NOT NULL,
  `kd` varchar(6) NOT NULL,
  PRIMARY KEY (`petugas_kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_kode`, `petugas_nama`, `kd`) VALUES
('A0001', 'Administrator', 'A0001'),
('T0001', 'Jalu Wibowo', 'T0001'),
('T0002', 'XaXa', 'T0002');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id` varchar(1) NOT NULL,
  `profil` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `title_ui` varchar(50) NOT NULL,
  `title_lgn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `profil`, `foto`, `title_ui`, `title_lgn`) VALUES
('1', 'Perpustakaan Athena adalah perpustakaan yang dibentuk oleh LSM Cerdas Bangsa. Dalam rangka mensejahterakan rakyat Indonesia dengan upaya berbagi ilmu dengan cara membuat sebuah perpustakaan. Perpustakaan Athena dibuat dengan gaya Yunani Kuno, Athena sendiri adalah Dewi Kebijakan dari mitologi Yunani. Dan semoga ilmu ilmu yang didapat akan menjadikan pembaca menjadi tidak hanya pintar namun juga bijak.', '320px-Parthenon_night_view.jpg', 'Perpustakaan Athena', 'Sistem Kontrol Perpustakaan Athena');
