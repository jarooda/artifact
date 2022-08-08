<?php
session_start();
error_reporting(0);
include "config/library.php";
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
	$userlihat = mysql_query("SELECT * FROM peminjam,admin WHERE peminjam.peminjam_nama = admin.nama_lengkap AND peminjam_nama LIKE '%$_SESSION[namalengkap]%'");
	$ul = mysql_fetch_array($userlihat);
	$lht=mysql_query("SELECT * FROM peminjam,peminjaman,detail_pinjam,kartu_pendaftaran,buku WHERE peminjam.peminjam_kode = peminjaman.peminjam_kode && detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode && kartu_pendaftaran.peminjam_kode = peminjam.peminjam_kode && buku.buku_kode = detail_pinjam.buku_kode AND peminjam.peminjam_nama LIKE '%$_SESSION[namalengkap]%' ORDER BY peminjaman.peminjaman_kode");
?>
<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' href='icon.ico' />
<title><?php echo "$title | $ul[peminjam_nama]"; ?></title>
<script>document.documentElement.className = 'js';</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<!-- Force latest IE rendering engine & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="css/jquery.parallax.css" />
	<script src="js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<?php include "header.php"; ?>
<div id="middle">
	<?php include "slide.php"; ?>
<div class="wrapper-content">
<div class="search">
	<?php include "menu_abc.php"; ?>
</div>
<div class="content">
<div class="full">
	<div class="isi-full">
	<div class="judul-full">
	<?php
	echo"$ul[username]";
	?>
	</div>
	<?php
	echo "
	<table border=0 class='user'>
	<tr>
	<td colspan=3><img src='img_peminjam/$ul[peminjam_foto]' width='180' height='260'></td>
	</tr>
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td>$ul[peminjam_nama]</td>
	</tr>
	<tr>
	<td>Alamat</td>
	<td>:</td>
	<td>$ul[peminjam_alamat]</td>
	</tr>
	<tr>
	<td>No. Telp</td>
	<td>:</td>
	<td>$ul[peminjam_telp]</td>
	</tr>
	<tr>
	<td>Email</td>
	<td>:</td>
	<td>$ul[email]</td>
	</tr>
	</table>
	<br>
	<table id='tablesorter-demoview' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjaman</th>
		  <th>Nama Buku</th>
		  <th>Tanggal Peminjaman</th>
		  <th>Tanggal Harus Kembali</th>
		  <th>Tanggal Kembali</th>
		  <th>Denda</th>
		  <th>Status</th>
		  </tr>
		  </thead></body>";
		  $no=1;
	while ($cz=mysql_fetch_array($lht)){
	echo"
	<tr>
	<td>$no</td>
      <td>$cz[peminjaman_kode]</td>
      <td>$cz[buku_judul]</td>
      <td>"; echo tgl_indo(date($cz[peminjaman_tgl])); echo"</td>
      <td>"; echo tgl_indo(date($cz[peminjaman_tgl_hrs_kembali])); echo"</td>
	  <td>"; echo tgl_indo(date($cz[detail_tgl_kembali])); echo"</td>
	  <td>$cz[detail_denda]</td>
	  <td>$cz[detail_status_kembali]</td>
	  </tr>
	";
	 $no++;
	}
	echo "
	  </tbody></table>
	";
	?>
	</div>
	</div>
	<?php include"peraturan.php";?>
</div>
</div>
</div>
<div id="footer">Copyright &copy Jalu Wibowo Aji 2013. All Rights Reserved.</div>
</body>
</html>