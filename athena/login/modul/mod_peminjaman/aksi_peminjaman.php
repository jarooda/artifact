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

// Input peminjaman
if ($module=='peminjaman' AND $act=='input'){
$auto1="Belum Kembali";
$auto2="Tidak Ada";
	mysql_query("INSERT INTO peminjaman(peminjaman_kode,
                                	petugas_kode,
                                	peminjam_kode,
                                	peminjaman_tgl,
									peminjaman_tgl_hrs_kembali
									) 
	                       VALUES('$_POST[peminjaman_kode]',
	                       '$_POST[petugas]',
	                       '$_POST[peminjam]',
	                       '$_POST[pinjam]',
						   '$_POST[harus]')");
						   
	mysql_query("INSERT INTO detail_pinjam(peminjaman_kode,
                                	buku_kode,
                                	detail_tgl_kembali,
									detail_denda,
                                	detail_status_kembali) 
	                       VALUES('$_POST[peminjaman_kode]',
	                       '$_POST[buku]',
	                       '',
	                       '',
						   '$auto1')");
						   
	mysql_query("UPDATE buku SET buku_stok = '$auto2'
                        					WHERE	buku_kode			= '$_POST[buku]'");
						   header('location:../../index.php?module='.$module);
}

// Delete peminjaman
 elseif ($module=='peminjaman' AND $act=='hapus'){
	mysql_query("DELETE FROM peminjaman WHERE peminjaman_kode='$_GET[id]'");
	mysql_query("DELETE FROM detail_pinjam WHERE peminjaman_kode='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>