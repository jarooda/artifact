<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>
<script type='text/javascript'>
$(function(){
		   $('.loginbox').click(function(){
											$('#box-lgn').fadeToggle();
											});
		   });
</script>
<div id="nav">
	<div class="nav_w">
		<ul id="menu">
			<li><a href="index.php">Beranda</a></li>
			<li><a href="">Buku</a>
				<ul>
					<li><a href="listbuku.php">Buku</a></li>
					<li><a href="listpdf.php">E-Book PDF</a></li>
					<li><a href="listflash.php">E-Book Flash</a></li>
				</ul>
			</li>
			<li><a href="">Kategori</a>
				<ul>
					<?php
					$menukat = mysql_query("SELECT * FROM kategori ORDER BY kategori_nama");
					while ($qmk = mysql_fetch_array($menukat)){
					echo "<li><a href='kat.php?kat=$qmk[kategori_kode]'>$qmk[kategori_nama]</a></li>";
					}
					?>
				</ul>
			</li>
			<li><?php echo "<a href='profil.php'>Profil Perpustakaan</a></li>"; ?>
			
		<div class="sebelah">
			
<?php
    	if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "
	<div id='log_reg'>
            <a class='loginbox'>Login</a>
    </div>
		</div>
		</ul>
	<div id='box-lgn'>
        	<form class='loginbox_out-css' name='login' action='cek_login.php' method='POST' onSubmit='return validasi(this)'>
			<table>
			<tr>
				<td>Username</td>
				<td>: <input type='text' name='username'></td><td colspan=2 valign=middle></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>: <input type='password' name='password'></td>
			</tr>
			<tr>
				<td><input class='sub' type='submit' value='Login'></td>
			</tr>
			</table>
            </form>
    </div>";
}
elseif ($_SESSION['leveluser']=='user'){
	$tampil = mysql_query("SELECT * FROM admin WHERE nama_lengkap LIKE '%$_SESSION[namalengkap]%' ORDER BY username");
	$r=mysql_fetch_array($tampil);
        echo"
		<div id='log_reg'>
            <a class='loginbox' href='user.php?id=$_SESSION[namalengkap]'>Hai, $r[nama_lengkap]</a>
            <a class='regbox' href='logout.php'>Logout</a>
    </div>
		</div>
		</ul>
			";
 }
elseif ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas' ){
	$tampil = mysql_query("SELECT * FROM admin WHERE nama_lengkap LIKE '%$_SESSION[namalengkap]%' ORDER BY username");
	$r=mysql_fetch_array($tampil);
        echo"
		<div id='log_reg'>
            <a class='loginbox' href='login/index.php?module=home'>Hai, $r[nama_lengkap]</a>
            <a class='regbox' href='logout.php'>Logout</a>
    </div>
		</div>
		</ul>
			";
 }
 ?>
</div>
</div>
<div id="header">
</div> 