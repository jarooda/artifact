<?php
error_reporting(0);
include("../config/koneksi.php");
$select = "SELECT buku_kode,buku_judul,kategori_nama,buku_pengarang,penerbit_nama,buku_tahun_terbit,buku_stok FROM buku,kategori,penerbit WHERE kategori.kategori_kode = buku.kategori_kode && penerbit.penerbit_kode = buku.penerbit_kode ORDER BY buku.buku_kode";
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
header("Content-Disposition: attachment; filename=buku_".$tanggal.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>