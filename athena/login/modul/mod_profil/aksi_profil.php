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

// Update profil
if ($module=='profil' AND $act=='update'){
$target="../../../img_site/";
$target=$target.basename($_FILES['fupload']['name']);
$profil=($_FILES['fupload']['name']);
$cc =($_FILES['fupload']['tmp_name']);
if (empty($cc)){
	mysql_query("UPDATE site SET profil		= '$_POST[profil]',
                                title_ui			= '$_POST[title_ui]',
                                title_lgn		= '$_POST[title_lgn]'
                        WHERE	id			= '$_POST[id]'");
}
else{
	mysql_query("UPDATE site SET profil		= '$_POST[profil]',
                                title_ui			= '$_POST[title_ui]',
                                title_lgn		= '$_POST[title_lgn]',
								foto				= '$profil'
                        WHERE	id			= '$_POST[id]'");
						move_uploaded_file($_FILES['fupload']['tmp_name'], $target);
}
						header('location:../../index.php?module='.$module);
}
}
?>
