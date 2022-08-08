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

// Input penerbit
if ($module=='penerbit' AND $act=='input'){
	mysql_query("INSERT INTO penerbit(penerbit_kode,
                                	penerbit_nama,
                                	penerbit_alamat,
                                	penerbit_telp) 
	                       VALUES('$_POST[kode_penerbit]',
	                       							'$_POST[nama_penerbit]',
	                       							'$_POST[alamat_penerbit]',
                               '$_POST[telp_penerbit]')");
								header('location:../../index.php?module='.$module);
}

// Update penerbit
elseif ($module=='penerbit' AND $act=='update'){
	mysql_query("UPDATE penerbit SET penerbit_nama		= '$_POST[nama_penerbit]',
	penerbit_alamat		= '$_POST[alamat_penerbit]',
	penerbit_telp		= '$_POST[telp_penerbit]'
                        					WHERE	penerbit_kode			= '$_POST[id]'");
						header('location:../../index.php?module='.$module);
}

// Delete penerbit
 elseif ($module=='penerbit' AND $act=='hapus'){
	mysql_query("DELETE FROM penerbit WHERE penerbit_kode='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>