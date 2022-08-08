<?php
error_reporting(0);
include "../../config/koneksi.php";

$auto1="Kembali";
$auto2="Ada";
	mysql_query("UPDATE detail_pinjam SET detail_tgl_kembali		= '$_POST[kembali]',
detail_denda	= '$_POST[denda]',
detail_status_kembali	= '$auto1'
                        					WHERE	peminjaman_kode			= '$_POST[id]'");
											
	mysql_query("UPDATE buku SET buku_stok = '$auto2'
                        					WHERE	buku_kode			= '$_POST[buku]'");
?>
	<script type="text/javascript">
		alert("Berhasil Dikembalikan ! ");
		window.close()
	</script>