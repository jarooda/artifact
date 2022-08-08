<ul class="abc">
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'A%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'A%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'A%'")) == 0) { ?>
	<li class="ka">A</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=A>A</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'B%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'B%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'B%'")) == 0) { ?>
	<li class="ka">B</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=B>B</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'C%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'C%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'C%'")) == 0) { ?>
	<li class="ka">C</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=C>C</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'D%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'D%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'D%'")) == 0) { ?>
	<li class="ka">D</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=D>D</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'E%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'E%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'E%'")) == 0) { ?>
	<li class="ka">E</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=E>E</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'F%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'F%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'F%'")) == 0) { ?>
	<li class="ka">F</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=F>F</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'G%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'G%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'G%'")) == 0) { ?>
	<li class="ka">G</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=G>G</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'H%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'H%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'H%'")) == 0) { ?>
	<li class="ka">H</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=H>H</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'I%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'I%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'I%'")) == 0) { ?>
	<li class="ka">I</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=I>I</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'J%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'J%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'J%'")) == 0) { ?>
	<li class="ka">J</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=J>J</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'K%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'K%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'K%'")) == 0) { ?>
	<li class="ka">K</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=K>K</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'L%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'L%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'L%'")) == 0) { ?>
	<li class="ka">L</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=L>L</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'M%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'M%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'M%'")) == 0) { ?>
	<li class="ka">M</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=M>M</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'N%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'N%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'N%'")) == 0) { ?>
	<li class="ka">N</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=N>N</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'O%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'O%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'O%'")) == 0) { ?>
	<li class="ka">O</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=O>O</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'P%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'P%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'P%'")) == 0) { ?>
	<li class="ka">P</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=P>P</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'Q%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'Q%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'Q%'")) == 0) { ?>
	<li class="ka">Q</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=Q>Q</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'R%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'R%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'R%'")) == 0) { ?>
	<li class="ka">R</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=R>R</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'S%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'S%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'S%'")) == 0) { ?>
	<li class="ka">S</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=S>S</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'T%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'T%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'T%'")) == 0) { ?>
	<li class="ka">T</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=T>T</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'U%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'U%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'U%'")) == 0) { ?>
	<li class="ka">U</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=U>U</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'V%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'V%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'V%'")) == 0) { ?>
	<li class="ka">V</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=V>V</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'W%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'W%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'W%'")) == 0) { ?>
	<li class="ka">W</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=W>W</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'X%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'X%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'X%'")) == 0) { ?>
	<li class="ka">X</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=X>X</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'Y%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'Y%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'Y%'")) == 0) { ?>
	<li class="ka">Y</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=Y>Y</a></li><?php } ?>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_judul LIKE 'Z%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM pdf WHERE pdf_judul LIKE 'Z%'")) == 0 &&
	mysql_num_rows(mysql_query("SELECT * FROM flash WHERE flash_judul LIKE 'Z%'")) == 0) { ?>
	<li class="ka">Z</li>
	<?php } else { ?><li class="ka"><a href=cari.php?id=Z>Z</a></li><?php } ?>
	<li class="ac"><a href=advanced_search.php>Pencarian Lebih Lanjut >></a></li>
</ul>