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
$def="user";
$kartu_barkode="ATHENA-$_POST[kode_peminjam]-$_POST[username]";

// Input peminjam
if ($module=='peminjam' AND $act=='input'){
$auto="Aktif";
$target="../../../img_peminjam/";
$target=$target.basename($_FILES['fupload']['name']);
$pic=($_FILES['fupload']['name']);
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
                                '$_POST[nama_peminjam]',
                                '$_POST[email]',
                                '$_POST[telp]',
								'$def',
								'$_POST[kode_peminjam]')");
	mysql_query("INSERT INTO peminjam(peminjam_kode,
                                peminjam_nama,
                                peminjam_alamat,
                                peminjam_telp, 
                                peminjam_foto,
								kd) 
	                       VALUES('$_POST[kode_peminjam]',
                                '$_POST[nama_peminjam]',
                                '$_POST[alamat]',
                                '$_POST[telp]',
                                '$pic',
								'$_POST[kode_peminjam]')");
	mysql_query("INSERT INTO kartu_pendaftaran(kartu_barkode,
                                	petugas_kode,
                                	peminjam_kode,
                                	kartu_tgl_pembuatan,
                                	kartu_tgl_akhir,
                                	kartu_status_aktif) 
	                       VALUES('$kartu_barkode',
	                       '$_POST[petugas]',
	                       '$_POST[kode_peminjam]',
	                       '$_POST[awal]',
	                       '$_POST[exp]',
                               '$auto')");
								move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
								header('location:../../index.php?module='.$module);
}

// Update peminjam
elseif ($module=='peminjam' AND $act=='update'){
$target="../../../img_peminjam/";
$target=$target.basename($_FILES['fupload']['name']);
$pic=($_FILES['fupload']['name']);
$cc =($_FILES['fupload']['tmp_name']);
if (empty($cc)){
	mysql_query("UPDATE peminjam SET peminjam_nama		= '$_POST[nama]',
                                peminjam_alamat		= '$_POST[alamat]',  
                                peminjam_telp			= '$_POST[telp]'
                        WHERE	kd			= '$_POST[id]'");
	if (empty($_POST[password])) {
    mysql_query("UPDATE admin SET nama_lengkap   = '$_POST[nama]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[telp]'  
                           WHERE  kd    = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE admin SET password       = '$pass',
                                 nama_lengkap    = '$_POST[nama]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[telp]'  
                           WHERE kd			     = '$_POST[id]'");
  }
}
else{
	mysql_query("UPDATE peminjam SET peminjam_nama		= '$_POST[nama]',
                                peminjam_alamat		= '$_POST[alamat]',  
                                peminjam_telp			= '$_POST[telp]',
                                peminjam_foto			= '$pic'
                        WHERE	kd			= '$_POST[id]'");
						move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
	if (empty($_POST[password])) {
    mysql_query("UPDATE admin SET nama_lengkap   = '$_POST[nama]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[telp]'  
                           WHERE  kd   = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE admin SET password       = '$pass',
                                 nama_lengkap    = '$_POST[nama]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[telp]'  
                           WHERE nama_lengkap    = '$_POST[id]'");
  }
}
mysql_query("UPDATE kartu_pendaftaran SET petugas_kode		= '$_POST[petugas]'
                        					WHERE	peminjam_kode			= '$_POST[id]'");
						header('location:../../index.php?module='.$module);
}

// Delete peminjam
 elseif ($module=='peminjam' AND $act=='hapus'){
	mysql_query("DELETE FROM peminjam WHERE peminjam_kode='$_GET[id]'");
	mysql_query("DELETE FROM kartu_pendaftaran WHERE peminjam_kode='$_GET[id]'");
	mysql_query("DELETE FROM admin WHERE kd='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>