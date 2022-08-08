<?php
// class paging untuk halaman administrator
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (Pertama) dan sebelumnya (Sebelumnya)
if($halaman_aktif > 1){
	$Sebelumnya = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1><< Pertama</a> | 
                    <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$Sebelumnya>< Sebelumnya</a> | ";
}
else{ 
	$link_halaman .= "<< Pertama | < Sebelumnya | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 6 ? " ... " : " "); 
for ($i=$halaman_aktif-5; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+6); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+5<$jmlhalaman ? " ... | <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Selanjutnya) dan terakhir (Terakhir) 
if($halaman_aktif < $jmlhalaman){
	$Selanjutnya = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$Selanjutnya>Selanjutnya ></a> | 
                     <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>Terakhir >></a> ";
}
else{
	$link_halaman .= " Selanjutnya > | Terakhir >>";
}
return $link_halaman;
}
}
?>
