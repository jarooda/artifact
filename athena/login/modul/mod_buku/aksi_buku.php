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

// Input buku
if ($module=='buku' AND $act=='input'){
$auto="Ada";
$target="../../../img_buku/";
$target=$target.basename($_FILES['fupload']['name']);
$pic=($_FILES['fupload']['name']);
	mysql_query("INSERT INTO buku(buku_kode,
                                kategori_kode,
                                penerbit_kode,
                                buku_judul, 
                                buku_jumhal,
								buku_diskripsi,
								buku_pengarang,
								buku_tahun_terbit,
								buku_stok,
								gambar,
								kolom)
	                       VALUES('$_POST[kode_buku]',
                                '$_POST[kategori]',
                                '$_POST[penerbit]',
                                '$_POST[judul_buku]',
                                '$_POST[halaman]',
								'$_POST[deskripsi]',
								'$_POST[pengarang]',
								'$_POST[terbit]',
								'$auto',
								'$pic',
								'$_POST[kolom]')");
								move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
								header('location:../../index.php?module='.$module);
}

// Update buku
elseif ($module=='buku' AND $act=='update'){
$target="../../../img_buku/";
$target=$target.basename($_FILES['fupload']['name']);
$pic=($_FILES['fupload']['name']);
$cc =($_FILES['fupload']['tmp_name']);
if (empty($cc)){
	mysql_query("UPDATE buku SET kategori_kode		= '$_POST[kategori]',
                                penerbit_kode		= '$_POST[penerbit]',  
                                buku_judul			= '$_POST[judul_buku]',
								buku_jumhal			= '$_POST[halaman]',
								buku_diskripsi		= '$_POST[deskripsi]',
								buku_pengarang		= '$_POST[pengarang]',
								buku_tahun_terbit	= '$_POST[terbit]',
								buku_stok			= '$_POST[stok]',
									kolom = '$_POST[kolom]'
                        WHERE	buku_kode			= '$_POST[id]'");
}
else{
	mysql_query("UPDATE buku SET kategori_kode		= '$_POST[kategori]',
                                penerbit_kode		= '$_POST[penerbit]',  
                                buku_judul			= '$_POST[judul_buku]',
								buku_jumhal			= '$_POST[halaman]',
								buku_diskripsi		= '$_POST[deskripsi]',
								buku_pengarang		= '$_POST[pengarang]',
								buku_tahun_terbit	= '$_POST[terbit]',
								buku_stok			= '$_POST[stok]' ,
								gambar				= '$pic',
								kolom = '$_POST[kolom]'
                        WHERE	buku_kode			= '$_POST[id]'");
						move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
}
						header('location:../../index.php?module='.$module);
}

// Delete buku
 elseif ($module=='buku' AND $act=='hapus'){
$target="../../../img_buku/";
	mysql_query("DELETE FROM buku WHERE buku_kode='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>
