<?php
session_start();
error_reporting(0);
include "../../config/fungsi_indotgl.php";
include ("../../config/koneksi.php");

$ro = mysql_query("SELECT * FROM peminjam,kartu_pendaftaran WHERE peminjam.peminjam_kode  = kartu_pendaftaran.peminjam_kode  AND peminjam.peminjam_kode LIKE '$_GET[id]'");
$kyo = mysql_fetch_array($ro);

include "qrlib.php";
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
	
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'H';

    $matrixPointSize = 3;
  
    QRcode::png($kyo[kartu_barkode], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
?>
<style type=text/css>
body{
	font-family: Tahoma;
  text-align: center; 
	background-repeat:repeat-xy;
	margin:0 auto;
  background-image: url(../images/main-bg.png);
  color:#FFFFFF;
}
table {
	font-family: Tahoma; 
	font-size: 8pt;
	width: auto;
}
</style>
<body onLoad="window.print()" onmousemove="window.close()">
<table cellpadding="0" cellspacing="0">
  <tr>
    <td background="../images/header.png" width="322" height="71">&nbsp;</td>
  </tr>
  <tr>
    <td background="../images/body.png" width="322" height="89"><table width="322" cellpadding="0" cellspacing="0" align="center">
      <tr>
        <td width="87"><?php echo '<img height="87" width="87" src="'.$PNG_WEB_DIR.basename($filename).'" />'; ?></td>
        <td width="160" align="center"><?php echo "<b>$kyo[peminjam_nama]</b><br><hr width='140'><br>Masa Berlaku<br>"; echo tgl_indo(date($kyo[kartu_tgl_akhir])); ?></td>
        <td width="66" align="right"><?php echo"<img src='../../img_peminjam/$kyo[peminjam_foto]' width='66' height='89'>"; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td background="../images/footer.png" width="322" height="29">&nbsp;</td>
  </tr>
</table>
</body>