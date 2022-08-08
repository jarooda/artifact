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

$aksi="modul/mod_pdf/aksi_pdf.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo "<h2>PDF</h2>
  <table><tr>
  <td><input type=button value='Tambah PDF' onclick=\"window.location.href='?module=pdf&act=tambahpdf';\"></td>
  <td width=860><form align=right method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=pdf>
          <div id=paging>Cari Judul : <input type=text name='kata'><input type=submit value=Search name=submit></div>
			
          </form></td></tr>
		  </table><br>
  ";
           if (empty($_GET['kata'])){   

    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr>
		  <th>No</th>
		  <th>Kode PDF</th>
		  <th>Judul PDF</th>
		  <th>Kategori</th>
		  <th>File</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>";
		  $p      = new Paging;
		$batas  = 8;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas' ){
      $tampil = mysql_query("SELECT * FROM pdf,kategori WHERE kategori.kategori_kode = pdf.kategori_kode ORDER BY pdf.pdf_kode LIMIT $posisi,$batas");
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[pdf_kode]</td>
             <td>$r[pdf_judul]</td>
			 <td>$r[kategori_nama]</td>
		     <td><a href='../file_pdf/$r[pdf_file]' target=_blank>$r[pdf_file]</a></td>
             <td>
			 	<a href=?module=pdf&act=editpdf&id=$r[pdf_kode]><img src='images/edit.png' title='Edit PDF' width='20' height='20'></a>
			 </td>
			 <td>
				<a href=\"$aksi?module=pdf&act=hapus&id=$r[pdf_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus PDF' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pdf"));
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
		  <th>Kode PDF</th>
		  <th>Judul PDF</th>
		  <th>Kategori</th>
		  <th>File</th>
		  <th colspan=2>Aksi</th>
		  </tr></thead><tbody>"; 
		$p      = new Paging;
		$batas  = 8;
		$posisi = $p->cariPosisi($batas);
		  if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
		  $q = $_GET['kata'];
      $tampil = mysql_query("SELECT * FROM pdf,kategori WHERE kategori.kategori_kode = pdf.kategori_kode AND pdf.pdf_judul LIKE '%$q%' ORDER BY pdf.pdf_kode LIMIT $posisi,$batas");
      
    }
	
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
	   		 <td>$no</td>
             <td>$r[pdf_kode]</td>
             <td>$r[pdf_judul]</td>
			 <td>$r[kategori_nama]</td>
		     <td><a href='../file_pdf/$r[pdf_file]' target=_blank>$r[pdf_file]</a></td>
             <td>
			 	<a href=?module=pdf&act=editpdf&id=$r[pdf_kode]><img src='images/edit.png' title='Edit PDF' width='20' height='20'></a>
			 </td>
			 <td>
				<a href=\"$aksi?module=pdf&act=hapus&id=$r[pdf_kode]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/hapus.png' title='Hapus PDF' width='20' height='20'></a>
			 </td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE '%$q%'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<br><center><div id=paging>$linkHalaman</div></center><br>";
    break;
 }
  case "tambahpdf":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
	$plussatu = mysql_num_rows(mysql_query("select * from pdf")) + 1;
    echo "<h2>Tambah PDF</h2>
          <form method=POST action='$aksi?module=pdf&act=input' enctype='multipart/form-data'>
          <table class=xx>
		  
		  <tr><td>Kode PDF</td>     <td> : <input type=text name='kode_pdf' value=$plussatu readonly=readonly size=10></td></tr>
          <tr><td>Judul PDF</td>     <td> : <input type=text name='nama_pdf' size=30></td></tr>
    <tr><td>Kategori</td>
    <td> : <select name='kategori'>
            <option value=0 selected>-</option>";
            $x=mysql_query("SELECT * FROM kategori");
            while($t=mysql_fetch_array($x)){
              echo "<option value=$t[kategori_kode]>$t[kategori_nama]</option>";
            }
    echo "</select></td></tr>
		  
    <tr><td>File</td><td><input type='file' name='fupload' /></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editpdf":
    $edit=mysql_query("SELECT * FROM pdf,kategori WHERE kategori.kategori_kode = pdf.kategori_kode AND pdf.pdf_kode='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    echo "<h2>Edit PDF</h2>
          <form method=POST action=$aksi?module=pdf&act=update enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[pdf_kode]'>
          <table class=xx>
		  <tr><td>Kode PDF</td>     <td> : <input type=text name='kode_pdf' value='$r[pdf_kode]' readonly='readonly' size=10></td></tr>
          <tr><td>Judul PDF</td>     <td> : <input type=text name='nama_pdf' value='$r[pdf_judul]' size=30></td></tr>
    <tr><td>Kategori</td>
    <td> : <select name='kategori'>";
		$x=mysql_query("select * from kategori");
		echo"
		<option value='$r[kategori_kode]'>$r[kategori_nama]</option>";
		while ($muncul=mysql_fetch_array($x)){
		echo "<option value='$muncul[kategori_kode]'>$muncul[kategori_nama]</option>";}
		echo "
        </select></td></tr>
		  
    <tr><td>File</td><td><input type=text value='$r[pdf_file]' size=30><input type='file' name='fupload' /></td></tr>
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