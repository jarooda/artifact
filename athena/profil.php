<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
$profil = mysql_fetch_array(mysql_query("SELECT * FROM site WHERE id = 1"));
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
	PROFIL PERPUSTAKAAN
	</div>
	<?php echo"<table><tr><td><img src='img_site/$profil[foto]' width=200 height=120></td><td> $profil[profil]</td></tr></table>";  ?>
	</div>
	</div>
	<?php include"peraturan.php";?>
</div>
</div>
</div>
<div id="footer">Copyright &copy Jalu Wibowo Aji 2013. All Rights Reserved.</div>
</body>
</html>