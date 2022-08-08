<?php
session_start();?>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 8:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
<?php
$aksi="modul/mod_kartu_pendaftaran/aksi_kartu_pendaftaran.php";
$ambilexp=mysql_query("SELECT * FROM kartu_pendaftaran");
$lihatexp=mysql_fetch_array($ambilexp);
if($lihatexp[kartu_status_aktif] == "Aktif") {
   mysql_query("UPDATE kartu_pendaftaran SET kartu_status_aktif	= 'Tidak Aktif' WHERE kartu_tgl_akhir < NOW()");
}
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  // Tampil User
  echo "<h2>Kartu Pendaftaran</h2>
<form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=kartu_pendaftaran>
          <div id=paging>Cari Peminjam : <input type=text name='kata'>
			<input type=submit value=Search name=submit></div>
          </form><br>";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjam</th>
		  <th>Kartu Barkode</th>
		  <th>Nama Petugas</th>
		  <th>Nama Peminjam</th>
		  <th>Tanggal Pembuatan</th>
		  <th>Masa Berlaku</th>
			 <th>Status</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM kartu_pendaftaran,petugas,peminjam
      WHERE kartu_pendaftaran.petugas_kode = petugas.petugas_kode && kartu_pendaftaran.peminjam_kode = peminjam.peminjam_kode ORDER BY kartu_pendaftaran.kartu_barkode ASC LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[peminjam_kode]</td>
      <td>$r[kartu_barkode]</td>
      <td>$r[petugas_nama]</td>
      <td>$r[peminjam_nama]</td>
      <td>"; echo tgl_indo(date($r[kartu_tgl_pembuatan])); echo"</td>
      <td>"; echo tgl_indo(date($r[kartu_tgl_akhir])); echo"</td>
      <td>$r[kartu_status_aktif]</td>
             <td>"; ?>
				<a href="javascript:;" onclick="MM_openBrWindow(' <?php echo" print/print.php?id=$r[peminjam_kode]','Print Kartu Pendaftaran' "; ?>,'  width=322,height=189')"><img src='images/print.png' title='Print' width='20' height='20'></a>
			 <?php
			 echo" </td>
				
				<td><a href=\"$aksi?module=kartu_pendaftaran&act=hapus&id=$r[peminjam_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Peminjam' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kartu_pendaftaran"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
 else{
     echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kartu Barkode</th>
		  <th>Nama Petugas</th>
		  <th>Nama Peminjam</th>
		  <th>Tanggal Pembuatan</th>
		  <th>Masa Berlaku</th>
			 <th>Status</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM kartu_pendaftaran,petugas,peminjam
      WHERE kartu_pendaftaran.petugas_kode = petugas.petugas_kode && kartu_pendaftaran.peminjam_kode = peminjam.peminjam_kode AND kartu_pendaftaran.kartu_barkode LIKE '%$q%' ORDER BY kartu_pendaftaran.kartu_barkode ASC LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[kartu_barkode]</td>
      <td>$r[petugas_nama]</td>
      <td>$r[peminjam_nama]</td>
      <td>"; echo tgl_indo(date($r[kartu_tgl_pembuatan])); echo"</td>
      <td>"; echo tgl_indo(date($r[kartu_tgl_akhir])); echo"</td>
      <td>$r[kartu_status_aktif]</td>
             <td>"; ?>
				<a href="javascript:;" onclick="MM_openBrWindow(' <?php echo" print/print.php?id=$r[peminjam_kode]','Print Kartu Pendaftaran' "; ?>,'  width=322,height=189')"><img src='images/print.png' title='Print' width='20' height='20'></a>
			 <?php
			 echo" </td>
				
				<td><a href=\"$aksi?module=kartu_pendaftaran&act=hapus&id=$r[peminjam_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Kartu Pendaftaran' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kartu_pendaftaran"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Peminjam</h2>
          <form method=POST action='$aksi?module=kartu_pendaftaran&act=input' enctype='multipart/form-data'>
          <table class=xx>
		  <tr>
    <td>Kode Peminjam</td>
    <td> : <input type=text name='kode_peminjam' ></td>
    <td><center>Foto Peminjam</center></td>
  </tr>
  <tr><td>Nama Petugas</td>";
            $x=mysql_query("SELECT * FROM petugas WHERE petugas_nama LIKE '%$_SESSION[namalengkap]%'");
            $t=mysql_fetch_array($x);
              echo "<td> : <input type=text readonly='readonly' value='$t[petugas_nama]' size=15></td>
			  <input type=hidden name='petugas' readonly='readonly' value='$t[petugas_kode]' size=10>";
    echo "
    <td rowspan='9'><input type='file' name='fupload' /></td>
	</tr>
  <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr>
  <tr>
    <td>Nama Peminjam</td>
    <td> : <input type=text name='nama_peminjam' size=30></td>
  </tr>
    <tr>
    <td>Alamat Peminjam</td>
    <td> <textarea name='alamat'></textarea></td>
  </tr>
  <tr><td>E-mail</td>     <td> : <input type=text name='email'></td></tr>
    <tr>
    <td>Telepon Peminjam</td>
    <td> : <input  type=number name='telp' size=15></td>
  </tr>
  <tr><td>Tanggal Pembuatan</td>     <td> : <input type=text readonly='readonly' value='"; echo tgl_indo(date($tgl_sekarang)); echo "' size=15><input type='hidden' name='awal' value='$tgl_sekarang'></td></tr>";
$now = strtotime(date("Y-m-d"));
//Add one day to today
$date = date('Y-m-j', strtotime('+1 year', $now));
		  echo"
          <tr><td>Masa Berlaku</td>     <td> : <input type=text readonly='readonly' value='"; echo tgl_indo(date($date)); echo "' size=15><input type='hidden' name='exp' value='$date'></td></tr>
          <tr><td colspan=3><p align=right><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></p></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
}
?>
