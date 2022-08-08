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

// Input pdf
if ($module=='pdf' AND $act=='input'){
$target="../../../file_pdf/";
$target=$target.basename($_FILES['fupload']['name']);
$pdf=($_FILES['fupload']['name']);
	mysql_query("INSERT INTO pdf(pdf_kode,pdf_judul,kategori_kode,pdf_file
                                ) 
	                       VALUES('$_POST[kode_pdf]',
                                '$_POST[nama_pdf]',
                                '$_POST[kategori]',
								'$pdf')");
								move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
								header('location:../../index.php?module='.$module);
}

// Update pdf
elseif ($module=='pdf' AND $act=='update'){
$target="../../../file_pdf/";
$target=$target.basename($_FILES['fupload']['name']);
$pdf=($_FILES['fupload']['name']);
$cc =($_FILES['fupload']['tmp_name']);
if (empty($cc)){
	mysql_query("UPDATE pdf SET kategori_kode		= '$_POST[kategori]',
                                pdf_judul			= '$_POST[nama_pdf]',
                                kategori_kode		= '$_POST[kategori]'
                        WHERE	pdf_kode			= '$_POST[id]'");
}
else{
	mysql_query("UPDATE pdf SET kategori_kode		= '$_POST[kategori]',
                                pdf_judul			= '$_POST[nama_pdf]',
                                kategori_kode		= '$_POST[kategori]',
								pdf_file				= '$pdf'
                        WHERE	pdf_kode			= '$_POST[id]'");
						move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
}
						header('location:../../index.php?module='.$module);
}

// Delete pdf
 elseif ($module=='pdf' AND $act=='hapus'){
	mysql_query("DELETE FROM pdf WHERE pdf_kode='$_GET[id]'");
						header('location:../../index.php?module='.$module);
}
}
?>
