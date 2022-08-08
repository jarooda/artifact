<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
$module=$_GET[module];
$act=$_GET[act];

// Input berita
if ($module=='berita' AND $act=='input'){
	mysql_query("INSERT INTO berita(id_berita,isi_berita,date) 
	                       VALUES('$_POST[id_berita]','$_POST[nama_berita]','$_POST[date]')");
								header('location:../../index.php?module='.$module);
}

// Update berita
elseif ($module=='berita' AND $act=='update'){
	mysql_query("UPDATE berita SET isi_berita		= '$_POST[nama_berita]'
                        					WHERE	id_berita			= '$_POST[id]'");
						header('location:../../index.php?module='.$module);
}

// Delete berita
 elseif ($module=='berita' AND $act=='hapus'){
	mysql_query("DELETE FROM berita WHERE id_berita='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>
