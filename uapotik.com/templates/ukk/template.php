<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include "dina_titel.php"; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="lokomedia">
<meta name="author" content="Lukmanul Hakim">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
            $(".btn1").click(function() {
                $("#gb").fadeIn();
				$(".btn2").fadeIn();
				$(".btn1").fadeOut();
            });
		     $(".btn2").click(function() {
             	$("#gb").fadeOut();
				$(".btn2").fadeOut();
				$(".btn1").fadeIn();
            });
		});
    </script>
</head>
<body>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
<link href="<?php echo "$f[folder]/style.css" ?>" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
  function addSmiley(textToAdd){
  document.formshout.pesan.value += textToAdd;
  document.formshout.pesan.focus();
}
</script>
</head>
<body>
<div id="wrapper">
  <div id="container">
  <div id="header">
    <div id="menu">
	<?php
  // RSS
$qrss=mysql_num_rows(mysql_query("select * from modul where nama_modul='RSS' and publish='Y'"));
// Apabila modul RSS diaktifkan Publish=Y, maka tampilkan modul RSS
if ($qrss > 0){
  echo "<a href=rss.xml target=_blank><img class='rss' src=$f[folder]/images/rssku.png border=0 /></a>";
}
?>
      <?php include "topmenu.php"; ?>
    </div>
  </div>
  </div>
  <div id="leftcontent">
    <p>
      <?php include "kiri.php"; ?>
    </p>
  </div>
  <div id="rightcontent">
    <p>
      <?php include "kanan.php"; ?>
    </p>
  </div>
  <div id="clearer">
  </div>
  <div id="footer">Copyright &copy; 2012 by Jalu Wibowo Aji. All Rights Reserved.</div>
</div>
<?php
// Statistik user
$qstatistik=mysql_num_rows(mysql_query("select * from modul where nama_modul='Statistik User' and publish='Y'"));
// Apabila modul Statistik diaktifkan Publish=Y, maka tampilkan modul Statistik
if ($qstatistik > 0){
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "<div class=ol><img src=counter/ol.png><div class=oltext>$pengunjungonline</div></div>";
}
?>
<?php
echo"
<img src=$f[folder]/images/gb.png class='btn1'>
<img src=$f[folder]/images/gb.png class='btn2'>";
?>
<div id="gb"><?php
// Shoutbox
$qshoutbox=mysql_num_rows(mysql_query("select * from modul where nama_modul='Shoutbox' and publish='Y'"));
// Apabila modul poling diaktifkan Publish=Y, maka tampilkan modul Poling
if ($qshoutbox > 0){
  echo "<br /><br /><center><iframe src='shoutbox.php' width=220 height=250 border=1 solid></iframe>";
  echo "<table class=shout width=100% align=center>
        <form name=formshout action=simpanshoutbox.php method=POST>
        <tr><td>Nama</td><td> : <input class=shout type=text name=nama size=21></td></tr>
        <tr><td>Website</td><td> : <input class=shout type=text name=website size=21></td></tr>
        <tr><td valign=top>Pesan</td><td> : <textarea class=shout name='pesan' style='width: 115px; height: 35px;'></textarea></td></tr>";
  ?>
        <tr><td colspan=2>
        <a onClick="addSmiley(':-)')"><img src='smiley/1.gif'></a> 
        <a onClick="addSmiley(':-(')"><img src='smiley/2.gif'></a>
        <a onClick="addSmiley(';-)')"><img src='smiley/3.gif'></a>
        <a onClick="addSmiley(';-D')"><img src='smiley/4.gif'></a>
        <a onClick="addSmiley(';-)')"><img src='smiley/5.gif'></a>
        </td></tr>
  <?php
  echo "<tr><td colspan=2><input class=shout type=submit name=submit value=Kirim><input class=shout type=reset name=reset value=Reset></td></tr>
        </form></table><br />";
}
?></div>
</body>
</html>
