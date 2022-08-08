<?php
error_reporting(0);
include("../config/koneksi.php");
$select = "SELECT peminjaman.peminjaman_kode,petugas.petugas_nama,peminjam.peminjam_nama,buku.buku_kode,buku.buku_judul,peminjaman.peminjaman_tgl,peminjaman.peminjaman_tgl_hrs_kembali,detail_pinjam.detail_tgl_kembali,detail_pinjam.detail_denda,detail_pinjam.detail_status_kembali
 FROM peminjaman,buku,petugas,detail_pinjam,peminjam WHERE peminjaman.peminjam_kode = peminjam.peminjam_kode AND peminjaman.peminjaman_kode = detail_pinjam.peminjaman_kode AND peminjaman.petugas_kode = petugas.petugas_kode AND buku.buku_kode = detail_pinjam.buku_kode ORDER BY peminjaman.peminjaman_kode ASC";
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
header("Content-Disposition: attachment; filename=peminjaman_".$tanggal.".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
?>