<!DOCTYPE HTML>
<?php 
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";
include "chart.php";
?>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="css/blue/style.css" type="text/css" media="print, projection, screen" />
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<?php

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
  	$petugasjml = mysql_num_rows(mysql_query("SELECT * FROM petugas"));
 		$bukujml = mysql_num_rows(mysql_query("SELECT * FROM buku"));
 		$bukupnjm = mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_stok = 'Tidak Ada'"));
 		$bukuada = mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_stok = 'Ada'"));
		$pdfjml = mysql_num_rows(mysql_query("SELECT * FROM pdf"));
		$flashjml = mysql_num_rows(mysql_query("SELECT * FROM flash"));
		$peminjamjml = mysql_num_rows(mysql_query("SELECT * FROM peminjam"));
		$pmnjmnjml = mysql_num_rows(mysql_query("SELECT * FROM peminjaman"));
  echo "<h2>Home</h2>
          <p align=left>Selamat datang, <b>$_SESSION[namalengkap]</b> , anda berada di System Kontrol Perpustakaan <a href=../index.php target=_blank>Athena</a>. Disini anda dapat menambah data peminjam perpustakaan, mengatur peminjaman dan pengembalian buku buku di Perpustakaan Athena.<br>
          Silahkan pilih menu yang berada di atas untuk mengelola website.<br>
							<center><font color=white><b>Statistik Perpustakaan</b></font><br><br><br></center>

<table class=tbcontent>
  <tr>
    <td width=130px>Jumlah Peminjam</td>
    <td width=21px>: <b>$peminjamjml</b></td>
    <td><a href=export_peminjam.php>Export Data Peminjam Ke Excel</a></td>
  </tr>
  <tr>
    <td> Jumlah Peminjaman </td>
    <td>: <b>$pmnjmnjml</b></td>
    <td><a href=export_peminjaman.php>Export Data Peminjaman Ke Excel</a></td>
  </tr>
  <tr>
    <td> Jumlah Buku </td>
    <td>: <b>$bukujml</b></td>
    <td><a href=export_buku.php>Export Data Buku Ke Excel</a></td>
  </tr>
  <tr>
    <td> Jumlah Buku Yang Dipinjam </td>
    <td colspan='2'>: <b>$bukupnjm</b></td>
  </tr>
  <tr>
    <td> Jumlah Buku Yang Ada </td>
    <td colspan='2'>: <b>$bukuada</b></td>
  </tr>
  <tr>
    <td> Jumlah E-Book PDF</td>
    <td colspan='2'>: <b>$pdfjml</b></td>
  </tr>
  <tr>
    <td> Jumlah E-Book Flash</td>
    <td colspan='2'>: <b>$flashjml</b></td>
  </tr>
  <tr>
    <td> Jumlah Petugas</td>
    <td colspan='2'>: <b>$petugasjml</b></td>
  </tr>
</table>
<br>
	<script src='js/highcharts.js'></script>
	<script src='js/exporting.js'></script>
	<div id='chartcon' style='min-width: 620px; height: 320px; margin: 0 auto'></div>";
  }
  elseif ($_SESSION['leveluser']=='user'){
  echo "<br>
	<script src='js/highcharts.js'></script>
	<script src='js/exporting.js'></script>
	<div id='chartcon' style='min-width: 620px; height: 320px; margin: 0 auto'></div><h2>Anda Tidak Punya Hak Disini</h2>";
 	}
}

// Bagian Admin
elseif ($_GET['module']=='admin'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_admin/admin.php";
  }
}

// Buku
elseif ($_GET['module']=='buku'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_buku/buku.php";
  }
}

// Detail Pinjam
elseif ($_GET['module']=='detail_pinjam'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_detail_pinjam/detail_pinjam.php";
  }
}

// Kartu Pendaftaran
elseif ($_GET['module']=='kartu_pendaftaran'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_kartu_pendaftaran/kartu_pendaftaran.php";
  }
}

// Kategori
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_kategori/kategori.php";
  }
}

// Peminjam
elseif ($_GET['module']=='peminjam'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_peminjam/peminjam.php";
  }
}

// Peminjaman
elseif ($_GET['module']=='peminjaman'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_peminjaman/peminjaman.php";
  }
}

// Penerbit
elseif ($_GET['module']=='penerbit'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_penerbit/penerbit.php";
  }
}

// Buku
elseif ($_GET['module']=='petugas'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_petugas/petugas.php";
  }
}

// Pdf
elseif ($_GET['module']=='pdf'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_pdf/pdf.php";
  }
}

// Flash
elseif ($_GET['module']=='flash'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_flash/flash.php";
  }
}

// Berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_berita/berita.php";
  }
}

// Profil
elseif ($_GET['module']=='profil'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_profil/profil.php";
  }
}

// Pengembalian
elseif ($_GET['module']=='kembali'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
    include "modul/mod_kembali/kembali.php";
  }
}
// Apabila modul tidak ditemukan
else{
  echo "<br>
	<script src='js/highcharts.js'></script>
	<script src='js/exporting.js'></script>
	<div id='chartcon' style='min-width: 620px; height: 320px; margin: 0 auto'></div><h2>Anda Tidak Punya Hak Disini</h2>";
}
?>