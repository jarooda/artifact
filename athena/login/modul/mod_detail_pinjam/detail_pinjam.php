<?php
session_start();
?>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 7:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_detail_pinjam/aksi_detail_pinjam.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Detail Pinjam</h2>
<form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=detail_pinjam>
          <div id=paging>Cari Kode Detail Pinjam : <input type=text name='kata'>
			<input type=submit value=Search name=submit></div>
          </form><br>
          ";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjaman</th>
		  <th>Kode Peminjam</th>
		  <th>Kode Buku</th>
		  <th>Judul Buku</th>
		  <th>Tanggal Kembali</th>
		  <th>Denda</th>
		  <th>Status</th>
		  <th colspan=2>Aksi</th>
		  </tr>
		  </thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM detail_pinjam,buku,peminjaman
      WHERE detail_pinjam.buku_kode = buku.buku_kode && detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[peminjaman_kode]</td>
	  <td>$r[peminjam_kode]</td>
      <td>$r[buku_kode]</td>
	  <td>$r[buku_judul]</td>
      <td>"; echo tgl_indo(date($r[detail_tgl_kembali])); echo"</td>
      <td>$r[detail_denda]</td>
      <td>$r[detail_status_kembali]</td>
             <td>
			 	<a href=?module=detail_pinjam&act=editdetail_pinjam&id=$r[peminjaman_kode]><img src='images/edit.png' title='Edit Detail Pinjam' width='20' height='20'></a></td><td><a href=\"$aksi?module=detail_pinjam&act=hapus&id=$r[peminjaman_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Detail Pinjam' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam"));
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
		  <th>Kode Peminjam</th>
		  <th>Kode Buku</th>
		  <th>Judul Buku</th>
		  <th>Tanggal Kembali</th>
		  <th>Denda</th>
		  <th>Status</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead></tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM detail_pinjam,buku,peminjaman
      WHERE detail_pinjam.buku_kode = buku.buku_kode && detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.peminjaman_kode LIKE '%$q%' LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
      <td>$r[peminjaman_kode]</td>
	  <td>$r[peminjam_kode]</td>
      <td>$r[buku_kode]</td>
	  <td>$r[buku_judul]</td>
      <td>"; echo tgl_indo(date($r[detail_tgl_kembali])); echo"</td>
      <td>$r[detail_denda]</td>
      <td>$r[detail_status_kembali]</td>
             <td>
			 	<a href=?module=detail_pinjam&act=editdetail_pinjam&id=$r[peminjaman_kode]><img src='images/edit.png' title='Edit Detail Pinjam' width='20' height='20'></a></td><td><a href=\"$aksi?module=detail_pinjam&act=hapus&id=$r[peminjaman_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Detail Pinjam' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
  $jumlah=mysql_num_rows(mysql_query("select * from peminjaman"));
  $tambahsatu = $jumlah+1;
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Peminjaman</h2>
          <form method=POST action='modul/mod_peminjaman/aksi_peminjaman.php?module=peminjaman&act=input' enctype='multipart/form-data'>
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
 case "editdetail_pinjam":
    $edit=mysql_query("SELECT * FROM detail_pinjam,buku,peminjaman
      WHERE detail_pinjam.buku_kode = buku.buku_kode && detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.peminjaman_kode='$_GET[id]'");
    $r=mysql_fetch_array($edit);

$tgl1 = $r[peminjaman_tgl_hrs_kembali];
$tgl2 = date("Y-m-d");
$p1 = explode("-", $tgl1);
$date1 = $p1[2];
$month1 = $p1[1];
$year1 = $p1[0];
$p2 = explode("-", $tgl2);
$date2 = $p2[2];
$month2 = $p2[1];
$year2 = $p2[0];
$jd1 = GregorianToJD($month1, $date1, $year1);
$jd2 = GregorianToJD($month2, $date2, $year2);
$selisih = $jd2 - $jd1;
 
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Detail Pinjam</h2>
          <form method=POST action=$aksi?module=detail_pinjam&act=update>
          <input type=hidden name=id value='$r[peminjaman_kode]'>
		  <input type=hidden name=buku value='$r[buku_kode]'>
          <table class=xx>
          <tr><td>Kode Detail Pinjam</td>     <td> : <input type=text name='peminjaman_kode' value='$r[peminjaman_kode]' size=10 disabled></td></tr>
		  <tr><td>Tanggal Harus Kembali</td>     <td> : <input type=text readonly='readonly' value='"; echo tgl_indo(date($tgl1)); echo "' size=15></td></tr>";
		  if ($tgl1 < $tgl_sekarang){
		  $denda = $selisih * 500;
		  }
		  else{$denda = 0;}
		  if ($r[detail_status_kembali] == 'Kembali'){echo "
		  <tr><td>Tanggal Pengembalian</td>     <td> : <input type=text readonly='readonly' value='"; echo tgl_indo(date($r[detail_tgl_kembali])); echo "' size=15><input type='hidden' name='pinjam' value='$r[detail_tgl_kembali]'></td></tr>
		  <tr><td>Denda</td>     <td> : <input type=text value=$r[detail_denda] name='denda' size=15></td></tr>";}
		  else {echo "
		  <tr><td>Tanggal Pengembalian</td>     <td> : <input type=text readonly='readonly' value='"; echo tgl_indo(date($tgl_sekarang)); echo "' size=15><input type='hidden' name='kembali' value='$tgl_sekarang'></td></tr>
		  <tr><td>Denda</td>     <td> : <input type=text value=$denda name='denda' size=15></td></tr>";}
		  echo "
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
