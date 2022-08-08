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

// Input kategori
if ($module=='kategori' AND $act=='input'){
	mysql_query("INSERT INTO kategori(kategori_kode,
                                	kategori_nama) 
	                       VALUES('$_POST[kode_kategori]',
                               '$_POST[nama_kategori]')");
								header('location:../../index.php?module='.$module);
}

// Update kategori
elseif ($module=='kategori' AND $act=='update'){
	mysql_query("UPDATE kategori SET kategori_nama		= '$_POST[nama_kategori]'
                        					WHERE	kategori_kode			= '$_POST[id]'");
						header('location:../../index.php?module='.$module);
}

// Delete kategori
 elseif ($module=='kategori' AND $act=='hapus'){
	mysql_query("DELETE FROM kategori WHERE kategori_kode='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>