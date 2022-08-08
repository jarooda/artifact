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

$aksi="modul/mod_penerbit/aksi_penerbit.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Penerbit</h2><table><tr>
  <td><input type=button value='Tambah Penerbit' onclick=\"window.location.href='?module=penerbit&act=tambahpenerbit';\"></td>
  <td width=860>
<form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=penerbit>
          <div id=paging>Cari Nama : <input type=text name='kata'>
			<input type=submit value=Search name=submit></div>
          </form>
          </td></tr></table><br>";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Penerbit</th>
		  <th>Nama Penerbit</th>
		  <th>Alamat Penerbit</th>
		  <th>Telepon Penerbit</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 5;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM penerbit LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[penerbit_kode]</td>
      <td>$r[penerbit_nama]</td>
					<td>$r[penerbit_alamat]</td>
					<td>$r[penerbit_telp]</td>
             <td>
			 	<a href=?module=penerbit&act=editpenerbit&id=$r[penerbit_kode]><img src='images/edit.png' title='Edit Penerbit' width='20' height='20'></a></td><td><a href=\"$aksi?module=penerbit&act=hapus&id=$r[penerbit_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Penerbit' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM penerbit"));
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
		  <th>Kode Penerbit</th>
		  <th>Nama Penerbit</th>
		  <th>Alamat Penerbit</th>
		  <th>Telepon Penerbit</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 5;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM penerbit WHERE penerbit_nama LIKE '%$q%' LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[penerbit_kode]</td>
      <td>$r[penerbit_nama]</td>
					<td>$r[penerbit_alamat]</td>
					<td>$r[penerbit_telp]</td>
             <td>
			 	<a href=?module=penerbit&act=editpenerbit&id=$r[penerbit_kode]><img src='images/edit.png' title='Edit Penerbit' width='20' height='20'></a></td><td><a href=\"$aksi?module=penerbit&act=hapus&id=$r[penerbit_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Penerbit' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM penerbit"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
    break;
    break;
 }
  case "tambahpenerbit":
  $jumlah=mysql_num_rows(mysql_query("select * from penerbit"));
  $tambahsatu = $jumlah+1;
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Penerbit</h2>
          <form method=POST action='$aksi?module=penerbit&act=input'>
          <table class=xx>
          <tr><td>Kode Penerbit</td>     <td> : <input type=text name='kode_penerbit' value='$tambahsatu' readonly='readonly' size=10></td></tr>
          <tr><td>Nama Penerbit</td>     <td> : <input type=text name='nama_penerbit' size=30></td></tr>
          <tr><td>Alamat Penerbit</td>     <td> : <input type=text name='alamat_penerbit' size=30></td></tr>
          <tr><td>Telepon Penerbit</td>     <td> : <input type=number maxlength='11' name='telp_penerbit' size=11></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editpenerbit":
    $edit=mysql_query("SELECT * FROM penerbit WHERE penerbit_kode='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Penerbit</h2>
          <form method=POST action=$aksi?module=penerbit&act=update>
          <input type=hidden name=id value='$r[penerbit_kode]'>
          <table class=xx>
          <tr><td>Kode Penerbit</td>     <td> : <input type=text name='kode_penerbit' value='$r[penerbit_kode]'  size=10 disabled></td></tr>
          <tr><td>Nama Penerbit</td>     <td> : <input type=text name='nama_penerbit' value='$r[penerbit_nama]' size=30></td></tr>
          <tr><td>Alamat Penerbit</td>     <td> : <input type=text name='alamat_penerbit' value='$r[penerbit_alamat]' size=30></td></tr>
          <tr><td>Telepon Penerbit</td>     <td> : <input  type=number maxlength='11' name='telp_penerbit' value='$r[penerbit_telp]' size=11></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
    break;  
}
}
?>
