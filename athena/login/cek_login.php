<?php
error_reporting(0);
include "../config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Injection not allowed !";
}
else{
$login=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($ketemu > 0){
  session_start();

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
  $_SESSION[petugaskode]  = $r[petugas_kode];
  $_SESSION[kd]  		  = $r[kd];
  header('location:index.php?module=home');
}
else{
  ?>
<script type="text/javascript">
alert("USERNAME ATAU PASSWORD SALAH",self.history.back());
</script>
  <?php
}
}
?>
