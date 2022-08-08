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

$aksi="modul/mod_admin/aksi_admin.php";
switch($_GET[act]){
  // Tampil Admin
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM admin WHERE level = 'admin' OR level = 'petugas'");
      echo "<h2>Admin</h2>";
    }
	elseif ($_SESSION[leveluser]=='petugas'){
      $tampil = mysql_query("SELECT * FROM admin WHERE kd LIKE '%$_SESSION[kd]%'");
      echo "<h2>Admin</h2>";
    }
    else{
      echo "<h2>Anda Tidak Punya Hak Disini</h2>";
    }
    
    echo "<table id='tablesorter-demo' class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
	<thead>
          <tr><th>No</th><th>Username</th><th>Nama Lengkap</th>
		  <th>Email</th><th>No.Telp/HP</th><th>Blokir</th><th>Aksi</th></tr>
		  </thead>
		  <tbody>"; 
    $no=$posisi+1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
		         <td><a href=mailto:$r[email]>$r[email]</a></td>
		         <td>$r[no_telp]</td>
		         <td align=center>$r[blokir]</td>
             <td><a href='?module=admin&act=editadmin&id=$r[nama_lengkap]'><img src='images/edit.png' title='Edit Admin' width='20' height='20'></a></td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    if ($_SESSION[leveluser]=='admin'){
    echo "<h2>Tambah Admin</h2>
          <form method=POST action='$aksi?module=admin&act=input'>
          <table class=xx>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr>
		  <tr><td>Nama</td>     <td> : <input type=text name='nama'></td></tr>
		  <tr><td>Kode Petugas</td>     <td> : <input type=text name='petugas' size=5></td></tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=number name='no_telp' size=20></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=reset value=Ulangi></td></tr>
          </table></form>";
    }
    else{
    }
    break;
    
  case "editadmin":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION[leveluser]=='petugas'){
    $edit=mysql_query("SELECT * FROM admin,petugas WHERE admin.kd = petugas.kd AND petugas.petugas_nama='$_GET[id]'");
    $r=mysql_fetch_array($edit);
    echo "<h2>Edit Admin</h2>
          <form method=POST action=$aksi?module=admin&act=update>
          <input type=hidden name=id value='$r[kd]'>
          <table class=xx>
		  <tr><td>Kode Petugas</td>     <td> : <input type=text name='petugas' value='$r[petugas_kode]' disabled></td></tr>
          <tr><td>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td>Nama</td> <td> : <input type=text name='nama' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=number name='no_telp' size=15 maxlength=12 value='$r[no_telp]' ></td></tr>";

    if ($r[blokir]=='N'){
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y'> Y   
                                           <input type=radio name='blokir' value='N' checked> N </td></tr>";
    }
    else{
      echo "<tr><td>Blokir</td>     <td> : <input type=radio name='blokir' value='Y' checked> Y  
                                          <input type=radio name='blokir' value='N'> N </td></tr>";
    }
    
    echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    else{
    echo "<h2>Anda Tidak Punya Hak Disini</h2>";     
    }
    break;  
}
}
?>
