<?php
error_reporting(0);
include("../config/koneksi.php");
$select = "SELECT peminjam.peminjam_kode,peminjam_nama,peminjam_alamat,peminjam_telp,kartu_barkode,kartu_status_aktif FROM peminjam,kartu_pendaftaran WHERE kartu_pendaftaran.peminjam_kode = peminjam.peminjam_kode ORDER BY peminjam.peminjam_kode";
$export = mysql_query($select);
$fields = mysql_num_fields($export);
for ($i = 0; $i < $fields; $i++) {
$header .= mysql_field_name($export, $i) . "\t";
}
while($row = mysql_fetch_row($export)) {
$line = '';
foreach($row as $value) {
if ((!isset($value)) OR ($value == "")) {
$value = "\t";
} else {
$value = str_replace('"', '""', $value);
$value = '"' . $value . '"' . "\t";
}
$line .= $value;
}
$data .= trim($line)."\n";
}
$data = str_replace("\r","",$data);
if ($data == "") {
$data = "n(0) record found!\n";
}
$tanggal=date("dmY");
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=peminjam_".$tanggal.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>