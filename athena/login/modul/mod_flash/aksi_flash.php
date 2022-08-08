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

// Input flash
if ($module=='flash' AND $act=='input'){
$folder=$_POST[kode_flash];
$flash="file_flash/$folder/";
	mysql_query("INSERT INTO flash(flash_kode,flash_judul,kategori_kode,flash_direktori
                                ) 
	                       VALUES('$_POST[kode_flash]',
                                '$_POST[nama_flash]',
                                '$_POST[kategori]',
								'$flash')");
								header('location:../../index.php?module='.$module);
}

// Update flash
elseif ($module=='flash' AND $act=='update'){
$folder=$_POST[kode_flash];
$flash="file_flash/$folder/";
	mysql_query("UPDATE flash SET kategori_kode		= '$_POST[kategori]',
                                flash_judul			= '$_POST[nama_flash]',
                                kategori_kode		= '$_POST[kategori]',
								flash_direktori				= '$flash'
                        WHERE	flash_kode			= '$_POST[id]'");
						header('location:../../index.php?module='.$module);
}

// Delete flash
 elseif ($module=='flash' AND $act=='hapus'){
	mysql_query("DELETE FROM flash WHERE flash_kode='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>
