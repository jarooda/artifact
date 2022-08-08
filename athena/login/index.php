<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title_lgn ?></title>
<link rel='shortcut icon' href='icon.ico' />
<script language="JavaScript">
function target_popup(form) {
    window.open('kembali/kembali.php', 'formpopup', 'width=600,height=375,resizeable,scrollbars');
    form.target = 'formpopup';
}
</script>

<script language="JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
window.open(theURL,winName,features);
}
//-->
</script>
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
function val(form){
  if (form.pmnjm.value == ""){
    alert("Anda belum mengisikan Kode Peminjam.");
    form.pmnjm.focus();
    return (false);
  }
  if (form.bk.value == ""){
    alert("Anda belum mengisikan Kode Buku.");
    form.bk.focus();
    return (false);
  }
  return (true);
}
</script>

<title><?php echo "$title_lgn"; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
<h1 class="head"><?php echo "$title_lgn"; ?></h1>
<div id="content">
<!-- Ini Isi -->
  <?php
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "
  <div id=login_frm>
  <center><form name='login' action='cek_login.php' method='POST' onSubmit='return validasi(this)'>
  <table>
<tr><td>Username</td><td>: <input type='text' name='username' width='100' autofocus></td></tr>
<tr><td>Password</td><td>: <input type='password' name='password'></td></tr>
<tr><td rowspan='2' colspan='2'><center><input type='submit' value='Login'></center></td></tr>
</table>
  </form>
  </center></div>";
?>
<?php }
else{ ?>
<!-- Ini Menu -->

<div id="kembali">
<form name='kembali'  onsubmit="target_popup(this)" action="kembali/kembali.php" method='POST'>
	<table>
		<tr>
			<td colspan=2><b>PENGEMBALIAN</b></td>
		</tr>
		<tr>
			<td>Kode Peminjam : <input type="text" name="pmnjm"></td>
			<td>Kode Buku : <input type="text" name="bk"></td>
		</tr>
		<tr>
			<td colspan=2><input type="submit" onclick="" value="Tampilkan !"></td>
		</tr>
	</table>
</form>
</div>

<?php if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){ ?>
<ul id="menu">
	<li><a href="?module=home">Beranda</a></li>
	<li>
		<a href="">Pegawai</a>
		<ul>
			<li><a href="?module=admin">Admin</a></li>
			<li><a href="?module=petugas">Petugas</a></li>
		</ul>
	</li>
	<li>
		<a href="">Pengunjung</a>
		<ul>
			<li><a href="?module=peminjam">Peminjam</a></li>
			<li><a href="?module=kartu_pendaftaran">Kartu Pendaftaran</a></li>
			<li><a href="?module=peminjaman">Peminjaman</a></li>
			<li><a href="?module=detail_pinjam">Detail Pinjam</a></li>
		</ul>
	</li>
	<li>
		<a href="">Buku</a>
		<ul>
			<li><a href="?module=buku">Buku</a></li>
			<li><a href="?module=kategori">Kategori</a></li>
			<li><a href="?module=penerbit">Penerbit</a></li>
		</ul>
	</li>
	<li>
		<a href="">E-BOOK</a>
		<ul>
			<li><a href="?module=pdf">PDF</a></li>
			<li><a href="?module=flash">FLASH</a></li>
		</ul>
	</li>
	<li>
		<a href="">LAIN-LAIN</a>
		<ul>
			<li><a href="?module=profil">PROFIL</a></li>
			<li><a href="?module=berita">BERITA</a></li>
		</ul>
	</li>
	<li><a href="logout.php">Keluar</a></li>
</ul>
<?php } 
else { ?>
<ul id="menu">
	<li><a href="?module=home">Beranda</a></li>
	<li><a href="logout.php">Keluar</a></li>
</ul>
<?php }

include "content.php"; ?>

  </div>
<?php
}
?>
			<div id="footer">Copyright &copy Jalu Wibowo Aji 2013. All Rights Reserved.</div>
  </div>
</body>
</html>
