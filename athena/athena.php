<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' href='icon.ico' />
<title><?php echo $title ?></title>
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
	
	<div class="sepertiga">
	<div class="isi-sepertiga">
	<div class="judul-sepertiga">
	BERITA
	</div>
	<?php
	$berita = mysql_query("SELECT * FROM berita ORDER BY date DESC LIMIT 0,3");
	while ($bri = mysql_fetch_array($berita)){
	echo "
	<div class='search'>
	$bri[isi_berita]
	<p align='right'><font size=1>
	"; echo tgl_indo(date($bri[date]));
	echo "</font></p>
	</div>
	";
	}
	?>
	</div>
	</div>
	<div class="sepertiga">
	<div class="isi-sepertiga">
	<div class="judul-sepertiga">
	BUKU TERBARU
	</div>
	<?php
	$bukubaru = mysql_query("SELECT * FROM buku ORDER BY buku_tahun_terbit DESC LIMIT 0,10");
	while ($bb = mysql_fetch_array($bukubaru)){
	echo "
	<ul>
		<li><a href=buku.php?id=$bb[buku_kode]>$bb[buku_judul]</a></li>
	</ul>";
	}
	echo "<p align='right'><font size=1><a href=listbuku.php>Selengkapnya...</a></font></p>";
	?>
	</div>
	</div>
	<div class="sepertiga">
	<div class="isi-sepertiga">
	<div class="judul-sepertiga">
	E-BOOK PDF
	</div>
	<?php
	$pdfbaru = mysql_query("SELECT * FROM pdf ORDER BY pdf_judul DESC LIMIT 0,4");
	while ($pb = mysql_fetch_array($pdfbaru)){
	echo "
	<ul>
		<li><a href='file_pdf/$pb[pdf_file]' target=_blank>$pb[pdf_judul]</a></li>
	</ul>";
	}
	echo "<p align='right'><font size=1><a href=listpdf.php>Selengkapnya...</a></font></p>";
	?>
	<div class="judul-sepertiga">
	E-BOOK FLASH
	</div>
	<?php
	$flashbaru = mysql_query("SELECT * FROM flash ORDER BY flash_judul DESC LIMIT 0,4");
	while ($fb = mysql_fetch_array($flashbaru)){
	echo "
	<ul>
		<li><a href='file_flash/$fb[flash_kode]/' target=_blank>$fb[flash_judul]</a></li>
	</ul>";
	}
	echo "<p align='right'><font size=1><a href=listflash.php>Selengkapnya...</a></font></p>";
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