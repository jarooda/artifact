<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/class_paging.php";
		  $p      = new Paging;
		$batas  = 8;
		$posisi = $p->cariPosisi($batas);
	$pdflihat = mysql_query("SELECT * FROM pdf ORDER BY pdf_judul LIMIT $posisi,$batas");
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
	echo"
	<div class='judul-full'>E-BOOk PDF
	</div>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pdf"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<div class='judul-full'><div id=paging>$linkHalaman</div></div>";
	while ($pc = mysql_fetch_array($pdflihat)){
	?>
	<?php
	echo "
	<ul>
		<li><a href='file_pdf/$pc[pdf_file]' target=_blank>$pc[pdf_judul]</a></li>
	</ul>
	";
	}
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pdf"));
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