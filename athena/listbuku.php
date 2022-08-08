<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/class_paging.php";
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
	$bukulihat = mysql_query("SELECT * FROM buku,kategori,penerbit WHERE kategori.kategori_kode = buku.kategori_kode && penerbit.penerbit_kode = buku.penerbit_kode ORDER BY buku.buku_judul LIMIT $posisi,$batas");
?>
<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' href='icon.ico' />
<title><?php echo "$title"; ?></title>
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
	<?php
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM buku"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<div class='judul-full'><div id=paging>$linkHalaman</div></div>";
	while ($bl = mysql_fetch_array($bukulihat)){
	echo"
	<div class='judul-full'><a href=buku.php?id=$bl[buku_kode]>$bl[buku_judul]</a> ($bl[buku_tahun_terbit])";
	?>
	</div>
	<?php
	echo "
	<table border=0 width=100>
	<tr>
	<td rowspan=5><a href=buku.php?id=$bl[buku_kode]><img src='img_buku/$bl[gambar]' width='95' height='130'></a></td>
	<td width=125>Nama Pengarang</td>
	<td>:</td>
	<td>$bl[buku_pengarang]</td>
	</tr>
	<tr>
	<td>Nama Penerbit</td>
	<td>:</td>
	<td>$bl[penerbit_nama]</td>
	</tr>
	<tr>
	<td>Kategori</td>
	<td>:</td>
	<td>$bl[kategori_nama]</td>
	</tr>
	<tr>
	<td>Deskripsi</td>
	<td>:</td>
	<td>$bl[buku_diskripsi] ($bl[buku_jumhal] Halaman)</td>
	</tr>
	</table>
	";
	}
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM buku"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<div class='judul-full'><div id=paging>$linkHalaman</div></div>";
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