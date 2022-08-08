<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
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
	
<div class="full">
	<div class="isi-full">
	<div class="judul-full">
	BUKU
	</div>
	<?php
	$bukucari = mysql_query("SELECT * FROM buku WHERE kategori_kode LIKE '$_GET[kat]%' ORDER BY buku_judul");
	$jmlb = mysql_num_rows($bukucari);
	if($jmlb > 0){
	while ($bc = mysql_fetch_array($bukucari)){
	echo "
	<ul>
		<li><a href=buku.php?id=$bc[buku_kode]>$bc[buku_judul]</a></li>
	</ul>";
	}
	}
	else {echo "MAAF, BUKU BELUM ADA";}
	?>
	<div class="judul-full">
	E-BOOK PDF
	</div>
	<?php
	$pdfcari = mysql_query("SELECT * FROM pdf WHERE kategori_kode LIKE '$_GET[kat]%' ORDER BY pdf_judul");
	$jmlp = mysql_num_rows($pdfcari);
	if($jmlp > 0){
	while ($pc = mysql_fetch_array($pdfcari)){
	echo "
	<ul>
		<li><a href='file_pdf/$pc[pdf_file]' target=_blank>$pc[pdf_judul]</a></li>
	</ul>";
	}
	}
	else {echo "MAAF, E-BOOK PDF BELUM ADA";}
	?>
	<div class="judul-full">
	E-BOOK FLASH
	</div>
	<?php
	$flashcari = mysql_query("SELECT * FROM flash WHERE kategori_kode LIKE '$_GET[kat]%' ORDER BY flash_judul");
	$jmlf = mysql_num_rows($flashcari);
	if($jmlf > 0){
	while ($fc = mysql_fetch_array($flashcari)){
	echo "
	<ul>
		<li><a href='file_flash/$fc[flash_kode]/' target=_blank>$fc[flash_judul]</a></li>
	</ul>";
	}
	}
	else {echo "MAAF, E-BOOK FLASH BELUM ADA";}
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