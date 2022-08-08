<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/library.php";
$query = mysql_query("SELECT * FROM peminjam,peminjaman,buku,petugas,detail_pinjam WHERE peminjam.peminjam_kode = peminjaman.peminjam_kode AND peminjaman.peminjaman_kode = detail_pinjam.peminjaman_kode AND peminjaman.petugas_kode = petugas.petugas_kode AND buku.buku_kode = detail_pinjam.buku_kode AND detail_pinjam.buku_kode = '$_POST[bk]' AND peminjaman.peminjam_kode = '$_POST[pmnjm]' AND detail_pinjam.detail_status_kembali = 'Belum Kembali'");
$str = mysql_fetch_array($query);
$hit = mysql_num_rows($query);

$tgl1 = $str[peminjaman_tgl_hrs_kembali];
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
if ($tgl1 < $tgl_sekarang){
		  $denda = $selisih * 500;
		  }
		  else{$denda = 0;}
		  
if ($hit > 0){

 ?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<body>
	<center>
	<br>
	<form method=POST action=pengembalian.php>
	<?php
	echo "
	<input type=hidden name=id value='$str[peminjaman_kode]'>
	<input type=hidden name=buku value='$str[buku_kode]'>
	";
	?>
	<table class=xx bgcolor=black>
		<tr>
			<td colspan=4><h3><center>Pengembalian ( Kode Peminjaman = <?php echo "$str[peminjaman_kode]"; ?> )</h3></center></td>
		</tr>
		<tr>
			<td rowspan=10 width=140><img src="../../img_peminjam/<?php echo "$str[peminjam_foto]"; ?>" width=140 height=200><br><br><center>(<?php echo "$str[peminjam_nama]"; ?>)</center></td>
			<td width=110>Tanggal Peminjaman</td>
			<td><?php echo tgl_indo(date($str[peminjaman_tgl])) ; ?></td>
			<td rowspan=10 width=140><img src="../../img_buku/<?php echo "$str[gambar]"; ?>" width=140 height=200><br><br><center>(<?php echo "$str[buku_judul]"; ?>)</center></td>
		</tr>
		<tr>
			<td>Tanggal Harus Kembali</td><td><?php echo tgl_indo(date($str[peminjaman_tgl_hrs_kembali])); ?></td>
		</tr>
		<tr>
			<td>Tanggal Pengembalian</td><td><?php echo tgl_indo(date($tgl_sekarang)); echo " <input type='hidden' name='kembali' value='$tgl_sekarang'>"; ?></td>
		</tr>
		<tr>
			<td>Denda</td><td><?php echo "$denda <input type='hidden' name='denda' value='$denda'>"; ?></td>
		</tr>
		<tr>
			<td colspan=2><center><input type="submit" value="Kembalikan"></center></td>
		</tr>
	</table>
	</form>
	</center>
	</body>
<?php }
else { ?>
	<script type="text/javascript">
		alert("Peminjaman invalid atau sudah kembali ! ");
		window.close()
	</script>
<?php }
?>