<?php
session_start();?>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 5:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil User
  default:
    $edit=mysql_query("SELECT * FROM site");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Profil</h2>
          <form method=POST action=$aksi?module=profil&act=update enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id]'>
          <table class=xx>
          <tr><td>Judul Sistem Informasi</td><td> : </td><td><input type=text name='title_ui' value='$r[title_ui]'  size=30></td><td><p align=center>Foto</p></td></tr>
		  <tr><td>Judul Sistem Informasi Petugas</td><td> : </td><td><input type=text name='title_lgn' value='$r[title_lgn]'  size=30></td><td><input type='file' name='fupload' /></td></tr>
		  <tr><td>Profil</td><td> : </td><td><textarea name='profil'>$r[profil]</textarea></td><td><img src='../img_site/$r[foto]' width=200 height=120></td></tr>
          <tr><td colspan=3><p align=center><input type=submit value=Simpan></p></tr>
          </table></form>";     
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
    break;
}
}
?>