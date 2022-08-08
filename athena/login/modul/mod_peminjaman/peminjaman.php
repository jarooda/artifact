<?php
session_start();?>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 6:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_peminjaman/aksi_peminjaman.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Peminjaman</h2>
<form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=peminjaman>
          <div id=paging>Cari Kode Peminjaman : <input type=text name='kata'>
			<input type=submit value=Search name=submit></div>
          </form><br>";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjaman</th>
		  <th>Nama Petugas</th>
		  <th>Nama Peminjam</th>
		  <th>Tanggal Peminjaman</th>
		  <th>Tanggal Harus Kembali</th>
		  <th>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM peminjaman,petugas,peminjam
      WHERE peminjaman.petugas_kode = petugas.petugas_kode && peminjaman.peminjam_kode = peminjam.peminjam_kode LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[peminjaman_kode]</td>
      <td>$r[petugas_nama]</td>
      <td>$r[peminjam_nama]</td>
      <td>"; echo tgl_indo(date($r[peminjaman_tgl])); echo"</td>
      <td>"; echo tgl_indo(date($r[peminjaman_tgl_hrs_kembali])); echo"</td>
             <td><a href=\"$aksi?module=peminjaman&act=hapus&id=$r[peminjaman_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Peminjaman' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM peminjaman"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
 else{
     echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjaman</th>
		  <th>Nama Petugas</th>
		  <th>Nama Peminjam</th>
		  <th>Tanggal Peminjaman</th>
		  <th>Tanggal Harus Kembali</th>
		  <th>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM peminjaman,petugas,peminjam
      WHERE peminjaman.petugas_kode = petugas.petugas_kode && peminjaman.peminjam_kode = peminjam.peminjam_kode AND peminjaman.peminjaman_kode LIKE '%$q%' LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[peminjaman_kode]</td>
      <td>$r[petugas_nama]</td>
      <td>$r[peminjam_nama]</td>
      <td>"; echo tgl_indo(date($r[peminjaman_tgl])); echo"</td>
      <td>"; echo tgl_indo(date($r[peminjaman_tgl_hrs_kembali])); echo"</td>
             <td><a href=\"$aksi?module=peminjaman&act=hapus&id=$r[peminjaman_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Peminjaman' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM peminjaman"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
  $jumlah=mysql_num_rows(mysql_query("select * from peminjaman"));
  $tambahsatu = $jumlah+1;
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Peminjaman</h2>
          <form method=POST action='$aksi?module=peminjaman&act=input' enctype='multipart/form-data'>
          <table class=xx>
          <tr><td>Kode Peminjaman</td>     <td> : <input type=text name='peminjaman_kode' value='$tambahsatu' readonly='readonly' size=10></td></tr>
          <tr><td>Nama Petugas</td>";
            $x=mysql_query("SELECT * FROM petugas WHERE petugas_nama LIKE '%$_SESSION[namalengkap]%'");
            $t=mysql_fetch_array($x);
              echo "<td> : <input type=text readonly='readonly' value='$t[petugas_nama]' size=15></td>
			  <input type=hidden name='petugas' readonly='readonly' value='$t[petugas_kode]' size=10>";
    echo "</tr>
	<tr><td>Kode Peminjam</td>     <td> : <input type=text name='peminjam' size=10></td></tr>
	<tr><td>Kode Buku</td>     <td> : <input type=text name='buku' size=10></td></tr>
          <tr><td>Tanggal Peminjaman</td>     <td> : <input type=text readonly='readonly' value='"; echo tgl_indo(date($tgl_sekarang)); echo "' size=15><input type='hidden' name='pinjam' value='$tgl_sekarang'></td></tr>";
$now = strtotime(date("Y-m-d"));
//Add one day to today
$date = date('Y-m-j', strtotime('+14 day', $now));
		  echo"
		  <tr><td>Tanggal Harus Kembali</td>     <td> : <input type=text readonly='readonly' value='"; echo tgl_indo(date($date)); echo "' size=15><input type='hidden' name='harus' value='$date'></td></tr>
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
