<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
error_reporting(0);
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
	<script language="javascript">
function vali(form){
  if (form.kata.value == ""){
    alert("Masukkan Setidaknya 1 Huruf !!!");
    form.kata.focus();
    return (false);
  }
  return (true);
}
</script>
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
	
<?php
switch($_POST[def]){
  // Tampil User
  default:
?>
<div class="full">
	<div class="isi-full">
	<div class="judul-full">
	PENCARIAN
	</div>
	<?php 
	echo "<form method=post action='$_SERVER[PHP_SELF]' onSubmit='return vali(this)'>
          <input type=hidden value=buku>
          <div id=paging>
		  Cari Judul : <input type=text name='kata'>
		  Kategori : <select name='kategori'>
            <option value=0 selected>-</option>";
            $x=mysql_query("SELECT * FROM kategori");
            while($t=mysql_fetch_array($x)){
              echo "<option value=$t[kategori_kode]>$t[kategori_nama]</option>";
            }
    echo "</select>
	Penerbit : <select name='penerbit'>
            <option value=0 selected>-</option>";
            $x=mysql_query("SELECT * FROM penerbit");
            while($t=mysql_fetch_array($x)){
              echo "<option value=$t[penerbit_kode]>$t[penerbit_nama]</option>";
            }
    echo "</select>
		<input type=submit value=Search>
		  </div>
			
          </form>"; 
		  ?>
		  <?php if (empty($_POST['kata'])){    ?>
	<div class="judul-full">
	BUKU
	</div>
	<div class="judul-full">
	E-BOOK PDF
	</div>
	<div class="judul-full">
	E-BOOK FLASH
	</div>
	</div>
	</div>
<?php 
break;}
else {
		$q = $_POST['kata'];
		$k = $_POST['kategori'];
		$p = $_POST['penerbit'];
		if ($p > 0 && $k > 0){
		$boko = mysql_query("SELECT * FROM buku WHERE kategori_kode LIKE '%$k%' AND penerbit_kode LIKE '%$p%' AND buku_judul LIKE '%$q%' ORDER BY buku_judul");
		}
		else if ($p > 0 && $k == 0){
		$boko = mysql_query("SELECT * FROM buku WHERE penerbit_kode LIKE '%$p%' AND buku_judul LIKE '%$q%' ORDER BY buku_judul");
		}
		else if ($p == 0 && $k > 0){
		$boko = mysql_query("SELECT * FROM buku WHERE kategori_kode LIKE '%$k%' AND buku_judul LIKE '%$q%' ORDER BY buku_judul");
		$pedeef = mysql_query("SELECT * FROM pdf WHERE kategori_kode LIKE '%$k%' AND pdf_judul LIKE '%$q%' ORDER BY pdf_judul");
		$flush = mysql_query("SELECT * FROM flash WHERE kategori_kode LIKE '%$k%' AND flash_judul LIKE '%$q%' ORDER BY flash_judul");
		}
		else if ($p == 0 && $k == 0){
		$boko = mysql_query("SELECT * FROM buku WHERE buku_judul LIKE '%$q%' ORDER BY buku_judul");
		$pedeef = mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE '%$q%' ORDER BY pdf_judul");
		$flush = mysql_query("SELECT * FROM flash WHERE flash_judul LIKE '%$q%' ORDER BY flash_judul");
		}
?>
<div class="judul-full">
	BUKU
	</div>
	<?php
	$jmlb = mysql_num_rows($boko);
	if($jmlb > 0){
	while ($bc = mysql_fetch_array($boko)){
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
	$jmlp = mysql_num_rows($pedeef);
	if($jmlp > 0){
	while ($pc = mysql_fetch_array($pedeef)){
	echo "
	<ul>
		<li><a href='file_pdf/$pc[pdf_file]' tarpost=_blank>$pc[pdf_judul]</a></li>
	</ul>";
	}
	}
	else {echo "MAAF, E-BOOK PDF BELUM ADA";}
	?>
	<div class="judul-full">
	E-BOOK FLASH
	</div>
	<?php
	$jmlf = mysql_num_rows($flush);
	if($jmlf > 0){
	while ($fc = mysql_fetch_array($flush)){
	echo "
	<ul>
		<li><a href='file_flash/$fc[flash_kode]/' tarpost=_blank>$fc[flash_judul]</a></li>
	</ul>";
	}
	}
	else {echo "MAAF, E-BOOK FLASH BELUM ADA";}
	?>
	</div>
	</div>
<?php break; }} ?>
	<?php include"peraturan.php";?>
</div>
</div>
</div>
<div id="footer">Copyright &copy Jalu Wibowo Aji 2013. All Rights Reserved.</div>
</body>
</html>