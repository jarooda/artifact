<?php               
echo "<ul>";
   $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");

   while($r=mysql_fetch_array($main)){
     echo "<li><a href='$r[link]'>$r[nama_menu]</a>
             <ul>";
          $sub=mysql_query("SELECT * FROM submenu, mainmenu  
                            WHERE submenu.id_main=mainmenu.id_main 
                            AND submenu.id_main=$r[id_main]");
	        while($w=mysql_fetch_array($sub)){
              echo "<li><a href='$w[link_sub]'>&#187; $w[nama_sub]</a></li>";
	         }
	       echo "</ul>
            </li>";
  }        
  // Form Pencarian
$qcari=mysql_num_rows(mysql_query("select * from modul where nama_modul='Pencarian' and publish='Y'"));
// Apabila modul Pencarian diaktifkan Publish=Y, maka tampilkan modul Pencarian
if ($qcari > 0){
  echo "<form class='pencarian' method=POST action='hasil-pencarian.html'>    
        <input name=kata type=text size=17 maxlength=50 />
        <input type=submit value=Go />
        </form> ";
}

echo "</ul>";
?>
