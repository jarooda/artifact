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

$aksi="modul/mod_flash/aksi_flash.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Flash</h2>
  <table><tr>
  <td><input type=button value='Tambah Flash' onclick=\"window.location.href='?module=flash&act=tambahflash';\"></td>
  <td width=860><form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=flash>
          <div id=paging>Cari Judul : <input type=text name='kata'><input type=submit value=Search name=submit></div>
			
          </form></td></tr>
		  </table><br>
  ";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Flash</th>
		  <th>Judul Flash</th>
		  <th>Kategori</th>
		  <th>File</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>";
		  $p      = new Paging;
		$batas  = 8;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM flash,kategori WHERE kategori.kategori_kode = flash.kategori_kode ORDER BY flash.flash_kode LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[flash_kode]</td>
             <td>$r[flash_judul]</td>
			 <td>$r[kategori_nama]</td>
		     <td><a href='../file_flash/$r[flash_kode]/' target=_blank>$r[flash_direktori]</a></td>
             <td>
			 	<a href=?module=flash&act=editflash&id=$r[flash_kode]><img src='images/edit.png' title='Edit Flash' width='20' height='20'></a>
			 </td>
			 <td>
				<a href=\"$aksi?module=flash&act=hapus&id=$r[flash_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Flash' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM flash"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
    break;
 }
 else{
     echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Flash</th>
		  <th>Judul Flash</th>
		  <th>Kategori</th>
		  <th>File</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		$p      = new Paging;
		$batas  = 8;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM flash,kategori WHERE kategori.kategori_kode = flash.kategori_kode AND flash.flash_judul LIKE '%$q%' ORDER BY flash.flash_kode LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[flash_kode]</td>
             <td>$r[flash_judul]</td>
			 <td>$r[kategori_nama]</td>
		     <td><a href='../file_flash/$r[flash_kode]/' target=_blank>$r[flash_direktori]</a></td>
             <td>
			 	<a href=?module=flash&act=editflash&id=$r[flash_kode]><img src='images/edit.png' title='Edit Flash' width='20' height='20'></a>
			 </td>
			 <td>
				<a href=\"$aksi?module=flash&act=hapus&id=$r[flash_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Flash' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE '%$q%'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
    break;
 }
  case "tambahflash":
	$ps = mysql_num_rows(mysql_query("select * from flash")) + 1;
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Flash</h2>
          <form method=POST action='$aksi?module=flash&act=input' enctype='multipart/form-data'>
          <table class=xx>
		  
		  <tr><td>Kode Flash</td>     <td> : <input type=text name='kode_flash' value='$ps' readonly=readonly size=10></td></tr>
          <tr><td>Judul Flash</td>     <td> : <input type=text name='nama_flash' size=30></td></tr>
    <tr><td>Kategori</td>
    <td> : <select name='kategori'>
            <option value=0 selected>-</option>";
            $x=mysql_query("SELECT * FROM kategori");
            while($t=mysql_fetch_array($x)){
              echo "<option value=$t[kategori_kode]>$t[kategori_nama]</option>";
            }
    echo "</select></td></tr>
	<tr><td colspan=2>Untuk menambah E-Book Flash,letakan folder E-Book di direktori ";?>"file_flash/"<?php echo",pastikan Kode Flash dan nama folder sama.</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editflash":
    $edit=mysql_query("SELECT * FROM flash,kategori WHERE kategori.kategori_kode = flash.kategori_kode AND flash.flash_kode='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Flash</h2>
          <form method=POST action=$aksi?module=flash&act=update enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[flash_kode]'>
          <table class=xx>
		  <tr><td>Kode Flash</td>     <td> : <input type=text name='kode_flash' value='$r[flash_kode]' readonly='readonly' size=10></td></tr>
          <tr><td>Judul Flash</td>     <td> : <input type=text name='nama_flash' value='$r[flash_judul]' size=30></td></tr>
    <tr><td>Kategori</td>
    <td> : <select name='kategori'>";
		$x=mysql_query("select * from kategori");
		echo"
		<option value='$r[kategori_kode]'>$r[kategori_nama]</option>";
		while ($muncul=mysql_fetch_array($x)){
		echo "<option value='$muncul[kategori_kode]'>$muncul[kategori_nama]</option>";}
		echo "
        </select></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
    break;
}
}
?>