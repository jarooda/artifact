<?php
mysql_connect("fdb3.biz.nf","athena","athena") or die("Koneksi gagal");
mysql_select_db("1529578_dbathena") or die("Database tidak bisa dibuka");
$sitetampil = mysql_fetch_array(mysql_query("SELECT * FROM site WHERE id = 1"));
$title = $sitetampil[title_ui];
$title_lgn = $sitetampil[title_lgn];
?>