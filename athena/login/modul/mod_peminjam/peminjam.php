<?php
session_start();?>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0]], headers: { 8:{sorter: false}}, widgets: ['zebra']});
	});	
	</script>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demoview").tablesorter({sortList:[[0,0]],widgets: ['zebra']});
	});	
	</script>
<?php
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_peminjam/aksi_peminjam.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>Peminjam</h2>
<form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=peminjam>
          <div id=paging>Cari Nama Peminjam : <input type=text name='kata'>
			<input type=submit value=Search name=submit></div>
          </form><br>";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjam</th>
		  <th>Username</th>
		  <th>Nama Peminjam</th>
		  <th>Alamat Peminjam</th>
		  <th>Telepon Peminjam</th>
		  <th>Email</th>
		  <th>Blokir</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM peminjam,admin WHERE peminjam.kd = admin.kd LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[peminjam_kode]</td>
			 <td>$r[username]</td>
             <td>$r[peminjam_nama]</td>
			 <td>$r[peminjam_alamat]</td>
		     <td>$r[peminjam_telp]</td>
			 <td>$r[email]</td>
			 <td>$r[blokir]</td>
             <td>
			 	<a href=?module=peminjam&act=editpeminjam&id=$r[peminjam_kode]><img src='images/edit.png' title='Edit Peminjam' width='20' height='20'></a></td><td><a href=\"$aksi?module=peminjam&act=hapus&id=$r[peminjam_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Peminjam' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM peminjam"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
 else{
     echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjam</th>
		  <th>Username</th>
		  <th>Nama Peminjam</th>
		  <th>Alamat Peminjam</th>
		  <th>Telepon Peminjam</th>
		  <th>Email</th>
		  <th>Blokir</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		  $p      = new Paging;
		$batas  = 10;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM peminjam,admin WHERE peminjam.kd = admin.kd AND peminjam_nama LIKE '%$q%' LIMIT $posisi,$batas");
      
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[peminjam_kode]</td>
			 <td>$r[username]</td>
             <td>$r[peminjam_nama]</td>
			 <td>$r[peminjam_alamat]</td>
		     <td>$r[peminjam_telp]</td>
			 <td>$r[email]</td>
			 <td>$r[blokir]</td>
             <td>
			 	<a href=?module=peminjam&act=editpeminjam&id=$r[peminjam_kode]><img src='images/edit.png' title='Edit Peminjam' width='20' height='20'></a></td><td><a href=\"$aksi?module=peminjam&act=hapus&id=$r[peminjam_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus Peminjam' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM peminjam"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
 }
 
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Tambah Peminjam</h2>
          <form method=POST action='$aksi?module=peminjam&act=input' enctype='multipart/form-data'>
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
                            <input type=reset value=Ulangi></p></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editpeminjam":
    $edit=mysql_query("SELECT * FROM peminjam,admin WHERE peminjam.peminjam_nama = admin.nama_lengkap AND peminjam_kode='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$lht=mysql_query("SELECT * FROM peminjam,peminjaman,detail_pinjam,kartu_pendaftaran,buku WHERE peminjam.peminjam_kode = peminjaman.peminjam_kode && 
	detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode && 
	kartu_pendaftaran.peminjam_kode = peminjam.peminjam_kode && 
	buku.buku_kode = detail_pinjam.buku_kode 
	AND peminjam.peminjam_kode='$_GET[id]'");
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit Peminjam</h2>
          <form method=POST action=$aksi?module=peminjam&act=update enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[kd]'>
          <table class=xx>
		  <tr>
    <td>Kode Peminjam</td>
    <td> : <input type=text name='kode_peminjam' value='$r[peminjam_kode]'  size=10  readonly='readonly'></td>
    <td><center>Foto Peminjam</center></td>
  </tr>
  <tr><td>Nama Petugas</td>";
            $x=mysql_query("SELECT * FROM petugas WHERE petugas_nama LIKE '%$_SESSION[namalengkap]%'");
            $t=mysql_fetch_array($x);
              echo "<td> : <input type=text readonly='readonly' value='$t[petugas_nama]' size=15></td>
			  <input type=hidden name='petugas' readonly='readonly' value='$t[petugas_kode]' size=10>";
    echo "
	<td rowspan='9'><center><img width='180' height='280' src='../img_peminjam/$r[peminjam_foto]'><br><input type='file' name='fupload' /></center></td>
	</tr>
          <tr><td>Username</td>     <td> : <input type=text name='username' value='$r[username]'  readonly='readonly'></td>
		  
		  </tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'> </td></tr>
  <tr>
    <td>Nama Peminjam</td>
    <td> : <input type=text name='nama' value='$r[peminjam_nama]' size=30></td>
  </tr>
    <tr>
    <td>Telepon Peminjam</td>
    <td> : <input type=number name='telp' size=15 value='$r[peminjam_telp]' ></td>
  </tr>
    <tr>
    <td>Alamat Peminjam</td>
    <td> <textarea name='alamat'>$r[peminjam_alamat]</textarea></td>
  </tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>";

    if ($r[blokir]=='N'){
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y'> Y   
                                           <input type=radio name='blokir' value='N' checked> N </td></tr>";
    }
    else{
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y' checked> Y  
                                          <input type=radio name='blokir' value='N'> N </td></tr>";
    }
    
    echo "
          <tr><td colspan=2><p align=center>
		  <input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></p></td></tr>
          </table></form>
		  <table id='tablesorter-demoview' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode Peminjaman</th>
		  <th>Nama Buku</th>
		  <th>Tanggal Peminjaman</th>
		  <th>Tanggal Harus Kembali</th>
		  <th>Tanggal Kembali</th>
		  <th>Denda</th>
		  <th>Status</th>
		  </tr>
		  </thead></body>";
		  $no=$posisi+1;
	while ($cz=mysql_fetch_array($lht)){
	echo"
	<tr>
	<td>$no</td>
      <td>$cz[peminjaman_kode]</td>
      <td>$cz[buku_judul]</td>
      <td>"; echo tgl_indo(date($cz[peminjaman_tgl])); echo"</td>
      <td>"; echo tgl_indo(date($cz[kartu_tgl_akhir])); echo"</td>
	  <td>"; echo tgl_indo(date($cz[detail_tgl_kembali])); echo"</td>
	  <td>$cz[detail_denda]</td>
	  <td>$cz[detail_status_kembali]</td>
	  </tr>
	"; $no++;
	}
	echo "
	  </tbody></table>
	";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
    break;
}
}
?>