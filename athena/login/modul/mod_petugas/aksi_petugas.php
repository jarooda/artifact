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
$def = "petugas";
// Input petugas
if ($module=='petugas' AND $act=='input'){
  $pass=md5($_POST[password]);
 mysql_query("INSERT INTO admin(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
								 level,
								 kd)
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
								'$def',
								'$_POST[petugas]')");
mysql_query("INSERT INTO petugas(petugas_kode,
                                	petugas_nama,
									kd) 
	                       VALUES('$_POST[petugas]',
                               '$_POST[nama]',
							   '$_POST[petugas]')");
  header('location:../../index.php?module='.$module);
}

// Update petugas
elseif ($module=='petugas' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE admin SET nama_lengkap   = '$_POST[nama]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  kd    = '$_POST[id]'");
	mysql_query("UPDATE petugas SET petugas_nama		= '$_POST[nama]'
                        					WHERE	kd			= '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE admin SET password       = '$pass',
                                 nama_lengkap    = '$_POST[nama]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE kd    = '$_POST[id]'");
	mysql_query("UPDATE petugas SET petugas_nama		= '$_POST[nama]'
                        					WHERE	kd			= '$_POST[id]'");
  }
  header('location:../../index.php?module='.$module);
}
// Delete petugas
 elseif ($module=='petugas' AND $act=='hapus'){
	mysql_query("DELETE FROM petugas WHERE kd='$_GET[id]'");
	mysql_query("DELETE FROM admin WHERE kd='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>