<?php
session_start();
?>
<script>
function ldt()
{
alert("<?php
		  $mfa1 = mysql_fetch_array(mysql_query("select * from kategori,buku where buku.kategori_kode = kategori.kategori_kode AND  buku.kategori_kode = 1 order by buku.buku_kode DESC"));
		  echo"Kode terakhir dari $mfa1[kategori_nama] adalah $mfa1[buku_kode]";
?>\n<?php
		  $mfa2 = mysql_fetch_array(mysql_query("select * from kategori,buku where buku.kategori_kode = kategori.kategori_kode AND  buku.kategori_kode = 2 order by buku.buku_kode DESC"));
		  echo"Kode terakhir dari $mfa2[kategori_nama] adalah $mfa2[buku_kode]";
?>\n<?php
		  $mfa3 = mysql_fetch_array(mysql_query("select * from kategori,buku where buku.kategori_kode = kategori.kategori_kode AND  buku.kategori_kode = 3 order by buku.buku_kode DESC"));
		  echo"Kode terakhir dari $mfa3[kategori_nama] adalah $mfa3[buku_kode]";
?>\n<?php
		  $mfa4 = mysql_fetch_array(mysql_query("select * from kategori,buku where buku.kategori_kode = kategori.kategori_kode AND  buku.kategori_kode = 4 order by buku.buku_kode DESC"));
		  echo"Kode terakhir dari $mfa4[kategori_nama] adalah $mfa4[buku_kode]";
?>\n<?php
		  $mfa5 = mysql_fetch_array(mysql_query("select * from kategori,buku where buku.kategori_kode = kategori.kategori_kode AND  buku.kategori_kode = 5 order by buku.buku_kode DESC"));
		  echo"Kode terakhir dari $mfa5[kategori_nama] adalah $mfa5[buku_kode]";
?>\n");
}
</script>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 8:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_buku/aksi_buku.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Buku</h2>
  <form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=buku>
          <div id=paging>Cari Judul : <input type=text name='kata'><input type=submit value=Search name=submit></div>
			
          </form><br>
  ";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Buku</th>
		  <th>Judul Buku</th>
		  <th>Kategori</th>
		  <th>Pengarang</th>
		  <th>Penerbit</th>
		  <th>Tahun Terbit</th>
		  <th>Kolom</th>
		  <th>Tersedia</th>
		  <th colspan=2>Aksi</th>
		  </tr>
		  </thead>
		  <tbody>";
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM buku,kategori,penerbit WHERE kategori.kategori_kode = buku.kategori_kode && penerbit.penerbit_kode = buku.penerbit_kode ORDER BY buku.buku_kode LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[buku_kode]</td>
             <td>$r[buku_judul]</td>
			 <td>$r[kategori_nama]</td>
		     <td>$r[buku_pengarang]</td>
		     <td>$r[penerbit_nama]</td>
		     <td>$r[buku_tahun_terbit]</td>
			 <td>$r[kolom]</td>
			 <td>$r[buku_stok]</td>
             <td>
			 	<a href=?module=buku&act=editbuku&id=$r[buku_kode]><img src='images/edit.png' width='20' height='20' title='Edit Buku'></a></td><td><a href=\"$aksi?module=buku&act=hapus&id=$r[buku_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' width='20' height='20' title='Hapus Buku'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM buku"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
 else{
     echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Buku</th>
		  <th>Judul Buku</th>
		  <th>Kategori</th>
		  <th>Pengarang</th>
		  <th>Penerbit</th>
		  <th>Tahun Terbit</th>
		  <th>Kolom</th>
		  <th>Tersedia</th>
		  <th colspan=2>Aksi</th>
		  </tr>
		  </thead>
		  <tbody>"; 
		$p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM buku,kategori,penerbit WHERE kategori.kategori_kode = buku.kategori_kode && penerbit.penerbit_kode = buku.penerbit_kode AND buku.buku_judul LIKE '%$q%' ORDER BY buku.buku_kode LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[buku_kode]</td>
             <td>$r[buku_judul]</td>
			 <td>$r[kategori_nama]</td>
		     <td>$r[buku_pengarang]</td>
		     <td>$r[penerbit_nama]</td>
		     <td>$r[buku_tahun_terbit]</td>
			 <td>$r[kolom]</td>
			 <td>$r[buku_stok]</td>
             <td>
			 	<a href=?module=buku&act=editbuku&id=$r[buku_kode]><img src='images/edit.png' width='20' height='20' title='Edit Buku'></a></td><td><a href=\"$aksi?module=buku&act=hapus&id=$r[buku_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' width='20' height='20' title='Hapus Buku'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE '%$q%'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Buku <input type=button value='Lihat Data Terakhir' onclick='ldt()'></h2>
          <form method=POST action='$aksi?module=buku&act=input' enctype='multipart/form-data'>
          <table class=xx>
		  
		  <tr>
    <td>Kode Buku</td>
    <td> : <input type=text name='kode_buku' size=10></td>
    <td>Judul Buku</td>
    <td colspan=3> : <input type=text name='judul_buku' size=50></td>
  </tr>
		  <tr>
    <td>Jumlah Halaman</td>
    <td> : <input type=number name='halaman' size=5></td>
    <td>Pengarang</td>
    <td> : <input type=text name='pengarang' size=20></td>
	<td>Kolom</td>
    <td> : <select name='kolom'>
            <option value=1 selected>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
			</select>
	</td>
  </tr>
  <tr>
  <td>Penerbit</td>
    <td> : <select name='penerbit'>
            <option value=0 selected>-</option>";
            $x=mysql_query("SELECT * FROM penerbit");
            while($t=mysql_fetch_array($x)){
              echo "<option value=$t[penerbit_kode]>$t[penerbit_nama]</option>";
            }
    echo "</select></td>
    <td>Kategori</td>
    <td> : <select name='kategori'>
            <option value=0 selected>-</option>";
            $x=mysql_query("SELECT * FROM kategori");
            while($t=mysql_fetch_array($x)){
              echo "<option value=$t[kategori_kode]>$t[kategori_nama]</option>";
            }
    echo "</select></td>
  </tr>
  <tr>
    <td rowspan='2'>Deskripsi</td>
    <td rowspan='2'><textarea name='deskripsi'></textarea></td>
    <td>Tahun Terbit</td>
    <td> : <input type=number maxlength='4' name='terbit' size=10></td>
  </tr>
  <tr>
  
    <td>Image</td>
    <td><input type='file' name='fupload'/></td>
  </tr>
   
          <tr><td colspan=5><p align=right><input type=submit value=Simpan>
                            <input type=reset value=Ulangi></p></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editbuku":
    $edit=mysql_query("SELECT * FROM buku,kategori,penerbit WHERE kategori.kategori_kode = buku.kategori_kode && penerbit.penerbit_kode = buku.penerbit_kode AND buku.buku_kode='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Buku</h2>
          <form method=POST action=$aksi?module=buku&act=update enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[buku_kode]'>
          <table class=xx>
		  <tr>
    <td>Kode Buku</td>
    <td> : <input type=text name='kode_buku'  value='$r[buku_kode]'  size=10 disabled></td>
    <td>Judul Buku</td>
    <td colspan=3> : <input type=text name='judul_buku' value='$r[buku_judul]' size=50></td>
    <td><center>Image</center></td>
  </tr>
		  <tr>
    <td>Jumlah Halaman</td>
    <td> : <input type=number name='halaman' value='$r[buku_jumhal]'  size=5></td>
    <td>Pengarang</td>
    <td> : <input type=text name='pengarang' value='$r[buku_pengarang]' size=20></td><td>Kolom</td>
    <td> : <select name='kolom'>
            <option value=$r[kolom] selected>$r[kolom]</option>
			<option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
			</select>
	</td>
    <td rowspan='6'><center><img width='200' height='250' src='../img_buku/$r[gambar]'><br><input type='file' name='fupload' /></center></td>
  </tr>
  <tr>
    <td>Penerbit</td>
    <td> :  <select name='penerbit'>";
		$x=mysql_query("select * from penerbit");
		echo"
		<option value='$r[penerbit_kode]'>$r[penerbit_nama]</option>";
		while ($muncul=mysql_fetch_array($x)){
		echo "<option value='$muncul[penerbit_kode]'>$muncul[penerbit_nama]</option>";}
		echo "
        </select></td>
    <td>Kategori</td>
    <td> : <select name='kategori'>";
		$x=mysql_query("select * from kategori");
		echo"
		<option value='$r[kategori_kode]'>$r[kategori_nama]</option>";
		while ($muncul=mysql_fetch_array($x)){
		echo "<option value='$muncul[kategori_kode]'>$muncul[kategori_nama]</option>";}
		echo "
        </select></td>
  </tr>
  <tr>
    <td rowspan=2>Deskripsi</td>
    <td rowspan=2><textarea name='deskripsi'>$r[buku_diskripsi]</textarea></td>
    <td>Tahun Terbit</td>
    <td> : <input type=number maxlength='4' name='terbit' value='$r[buku_tahun_terbit]' size=10></td>
  </tr>
  <tr>";
  if ($r[buku_stok]=='Ada'){
      echo "<td>Tersedia</td>     <td> : <select name='stok'>
            <option value='Ada' selected>Ada</option>
			<option value='Tidak Ada'>Tidak Ada</option>
</select>			</td>";
    }
    else{
      echo "<td>Tersedia</td>     <td> : <select name='stok'>
            <option value='Ada'>Ada</option>
			<option value='Tidak Ada' selected>Tidak Ada</option>
</select></td>";
}
  echo"
  </tr>
          <tr><td colspan=4><p align=center><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></p></td></tr>
          </table></form>";     
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
    break;
}
}
?>
