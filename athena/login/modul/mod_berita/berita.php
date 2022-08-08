<?php
session_start();?>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 4:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Berita</h2>
  <table><tr>
  <td><input type=button value='Tambah Berita' onclick=\"window.location.href='?module=berita&act=tambahberita';\"></td>
  <td width=860><form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=berita>
          <div id=paging>Cari Judul : <input type=text name='kata'><input type=submit></div>
			
          </form></td></tr>
		  </table><br>
  ";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>ID</th>
		  <th>Berita</th>
		  <th>Tanggal</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>";
		  $p      = new Paging;
		$batas  = 8;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas' ){
      $tampil = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[id_berita]</td>
             <td>$r[isi_berita]</td>
			 <td>"; echo tgl_indo(date($r[date])); echo"</td>
             <td>
			 	<a href=?module=berita&act=editberita&id=$r[id_berita]><img src='images/edit.png' title='Edit Berita' width='20' height='20'></a>
			 </td>
			 <td>
				<a href=\"$aksi?module=berita&act=hapus&id=$r[id_berita]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Berita' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
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
		  <th>ID</th>
		  <th>Berita</th>
		  <th>Tanggal</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		$p      = new Paging;
		$batas  = 8;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM berita WHERE isi_berita LIKE '%$q%' ORDER BY date DESC LIMIT $posisi,$batas");
      
    }
	
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[id_berita]</td>
             <td>$r[isi_berita]</td>
			 <td>"; echo tgl_indo(date($r[date])); echo"</td>
             <td>
			 	<a href=?module=berita&act=editberita&id=$r[id_berita]><img src='images/edit.png' title='Edit Berita' width='20' height='20'></a>
			 </td>
			 <td>
				<a href=\"$aksi?module=berita&act=hapus&id=$r[id_berita]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Berita' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE berita_judul LIKE '%$q%'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
    break;
 }
  case "tambahberita":
  $jumlah=mysql_num_rows(mysql_query("select * from berita"));
  $tambahsatu = $jumlah+1;
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Berita</h2>
          <form method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
          <table class=xx>
		  <tr><td>ID Berita</td>     <td> : <input type=text name='id_berita' value='$tambahsatu' readonly=readonly size=10></td></tr>
          <tr><td>Judul Berita</td>     <td> : <textarea name='nama_berita'></textarea></td></tr>
		  <input type=hidden value=$tgl_sekarang name=date>
          <tr><td>Tanggal</td>     <td> : <input type=text value='"; echo tgl_indo(date($tgl_sekarang)); echo "' readonly=readonly size=30></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editberita":
    $edit=mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Berita</h2>
          <form method=POST action=$aksi?module=berita&act=update enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id_berita]'>
          <table class=xx>
		  
		  <tr><td>ID Berita</td>     <td> : <input type=text name='id_berita' value='$r[id_berita]' readonly=readonly size=10></td></tr>
          <tr><td>Judul Berita</td>     <td> : <textarea name='nama_berita'>$r[isi_berita]</textarea></td></tr>
          <tr><td>Tanggal</td>     <td> : <input type=text value='"; echo tgl_indo(date($r[date])); echo "' name='date' readonly=readonly size=30></td></tr>
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