<?php
     
// Status YM (Yahoo Messenger)   -> Hasilnya akan terlihat kalau sudah di online-kan di Internet   
// O iya, jangan lupa ganti alamat YM iin.suka dengan alamat YM Anda (bisa lebih dari satu)
$qym=mysql_num_rows(mysql_query("select * from modul where nama_modul='YM' and publish='Y'"));
// Apabila modul YM diaktifkan Publish=Y, maka tampilkan modul YM
if ($qym > 0){
  echo "<p align=center><a href='ymsgr:sendIM?iin.suka'>
		    <img src='http://opi.yahoo.com/online?u=iin.suka&amp;m=g&amp;t=9' border='0'></a></p>";
}

// Form indeks berita
$qindeks=mysql_num_rows(mysql_query("select * from modul where nama_modul='Indeks Berita' and publish='Y'"));
// Apabila modul YM diaktifkan Publish=Y, maka tampilkan modul YM
if ($qindeks > 0){
  echo "<hr color=#e0cb91 noshade=noshade />
        Indeks Berita<br /><br />
        <form method=POST action='indeks-berita.html'>";    
        combotgl(1,31,'tanggal',$tgl_skrg);
  echo " / ";
        combobln(1,12,'bulan',$bln_sekarang);
  echo " / ";
        combothn(2000,$thn_sekarang,'tahun',$thn_sekarang);
  echo "<br /><input type=submit value=Go /></form>";
}


// Kalender
$qkalender=mysql_num_rows(mysql_query("select * from modul where nama_modul='Kalender' and publish='Y'"));
// Apabila modul Kalender diaktifkan Publish=Y, maka tampilkan modul Kalender
if ($qkalender > 0){
  echo "<hr color=#e0cb91 noshade=noshade />
        Kalender<p align=center>";

  $tgl_skrg=date("d");
  $bln_skrg=date("n");
  $thn_skrg=date("Y");

  echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg); 

  echo "</p><br />";
}

// Menu Kategori
$qkategori=mysql_num_rows(mysql_query("select * from modul where nama_modul='Kategori' and publish='Y'"));
// Apabila modul Kategori diaktifkan Publish=Y, maka tampilkan modul Kategori
if ($qkategori > 0){
  echo "<div id=widgetjudul><h4>Kategori</h4><br /></div>";

  $kategori=mysql_query("select nama_kategori, kategori.id_kategori, kategori_seo,  
                         count(berita.id_kategori) as jml 
                         from kategori left join berita 
                         on berita.id_kategori=kategori.id_kategori 
                         where kategori.aktif='Y'  
                         group by nama_kategori");
  while($k=mysql_fetch_array($kategori)){
    echo "<div id=widgetisi><span class=kategori>&bull; <a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></span><br /></div>";
  }
  echo "<div id=widgetbawah></div>";
}
// Arsip Berita
$qarsip=mysql_num_rows(mysql_query("select * from modul where nama_modul='Arsip Berita' and publish='Y'"));
// Apabila modul Arsip Berita diaktifkan Publish=Y, maka tampilkan modul Arsip Berita
if ($qarsip > 0){
  echo "<div id=widgetisi><div id=widgetjudul><h4>Arsip</h4><br /></div>
        <div id=widgetisi><ul>";
  include "arsipberita.php";
  echo "</ul></div>";
   echo "<div id=widgetbawah></div></div>";
}

// Polling
$qpoling=mysql_num_rows(mysql_query("select * from modul where nama_modul='Poling' and publish='Y'"));
// Apabila modul poling diaktifkan Publish=Y, maka tampilkan modul Poling
if ($qpoling > 0){
  echo "<hr color=#e0cb91 noshade=noshade />
        Poling<br /><br />";

  $tanya=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
  $t=mysql_fetch_array($tanya);

  echo "<b>$t[pilihan]</b> <br /><br />";

  echo "<form method=POST action='hasil-poling.html'>";

  $poling=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  while ($p=mysql_fetch_array($poling)){
    echo "<input type=radio name=pilihan value='$p[id_poling]' />$p[pilihan]<br />";
  }
  echo "<p align=center><input type=submit value=Vote /></p>
        </form>
        <p align=center><a href=lihat-poling.html>Lihat Hasil Poling</a></p>";
}

// Banner
$qbanner=mysql_num_rows(mysql_query("select * from modul where nama_modul='Banner' and publish='Y'"));
// Apabila modul banner diaktifkan Publish=Y, maka tampilkan modul Banner max 4 buah
if ($qbanner > 0){
  echo "<hr color=#e0cb91 noshade=noshade />";
  $banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT 4");
  while($b=mysql_fetch_array($banner)){
    echo "<p align=center><a href=$b[url] target='_blank' title='$b[judul]'><img src='foto_banner/$b[gambar]' border=0></a></p>";
  }
} 
?>
<style>
.tr_judul {
  font-weight : bold;
  text-align : center;
  background : #d0d0d0;
}
.tr_terang {
  text-align : center;
  background : #f0f0f0;
}
.tabel_data {
  background : #d0d0d0;
  color : #000000;
}
</style>
