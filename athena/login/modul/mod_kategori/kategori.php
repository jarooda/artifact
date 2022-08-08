<?php
session_start();?>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 3:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Kategori</h2><table><tr>
  <td>
          <input type=button value='Tambah Kategori' onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">
		  </td>
<td width=860><form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=kategori>
          <div id=paging>Cari Nama : <input type=text name='kata'>
			<input type=submit value=Search name=submit></div>
          </form></td></tr></table><br>";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Kategori</th>
		  <th>Nama Kategori</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 5;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM kategori LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[kategori_kode]</td>
      <td>$r[kategori_nama]</td>
             <td>
			 	<a href=?module=kategori&act=editkategori&id=$r[kategori_kode]><img src='images/edit.png' title='Edit Kategori' width='20' height='20'></a></td><td><a href=\"$aksi?module=kategori&act=hapus&id=$r[kategori_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Kategori' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
    break;
 }
 else{
     echo "<table class=xx>
          <tr>
		  <th>No</th>
		  <th>Kode Kategori</th>
		  <th>Nama Kategori</th>
		  <th colspan=2>Aksi</th>
		  </tr>"; 
		  $p      = new Paging;
		$batas  = 5;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM kategori WHERE kategori_nama LIKE '%$q%' LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[kategori_kode]</td>
      <td>$r[kategori_nama]</td>
             <td>
			 	<a href=?module=kategori&act=editkategori&id=$r[kategori_kode]><img src='images/edit.png' title='Edit Kategori' width='20' height='20'></a></td><td><a href=\"$aksi?module=kategori&act=hapus&id=$r[kategori_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Kategori' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
    break;
 }
  case "tambahkategori":
  $jumlah=mysql_num_rows(mysql_query("select * from kategori"));
  $tambahsatu = $jumlah+1;
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Kategori</h2>
          <form method=POST action='$aksi?module=kategori&act=input'>
          <table class=xx>
          <tr><td>Kode Kategori</td>     <td> : <input type=text name='kode_kategori' value='$tambahsatu' readonly='readonly' size=10></td></tr>
          <tr><td>Nama Kategori</td>     <td> : <input type=text name='nama_kategori' size=30></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE kategori_kode='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Kategori</h2>
          <form method=POST action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value='$r[kategori_kode]'>
          <table class=xx>
          <tr><td>Kode Kategori</td>     <td> : <input type=text name='kode_kategori' value='$r[kategori_kode]'  size=10 disabled></td></tr>
          <tr><td>Nama Kategori</td>     <td> : <input type=text name='nama_kategori' value='$r[kategori_nama]' size=30></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
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
