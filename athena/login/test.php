<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";
?>
<!DOCTYPE HTML>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
	<link rel="stylesheet" href="css/blue/style.css" type="text/css" media="print, projection, screen" />
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="js/docs.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'chartcon',
                type: 'line'
            },
            title: {
                text: 'Peminjaman Selama Tahun <?php echo "$thn_sekarang"; ?>'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Jan <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-01%'")); echo $bjan ;?> )'
				, 'Feb <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-02%'")); echo $bjan ;?> )'
				, 'Mar <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-03%'")); echo $bjan ;?> )'
				, 'Apr <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-04%'")); echo $bjan ;?> )'
				, 'May <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-05%'")); echo $bjan ;?> )'
				, 'Jun <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-06%'")); echo $bjan ;?> )'
				, 'Jul <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-07%'")); echo $bjan ;?> )'
				, 'Aug ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-08%'")); echo $bjan ;?> )'
				, 'Sep <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-09%'")); echo $bjan ;?> )'
				, 'Oct <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-10%'")); echo $bjan ;?> )'
				, 'Nov <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-11%'")); echo $bjan ;?> )'
				, 'Dec <br> ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-12%'")); echo $bjan ;?> )']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Peminjaman'
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'';
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Novel',
                data: [	<?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-01%'")); echo $njan ;?>
					,	<?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-02%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-03%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-04%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-05%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-06%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-07%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-08%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-09%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-10%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-11%'")); echo $njan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'N%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-12%'")); echo $njan ;?>]
            }, {
                name: 'Edukasi',
                data: [<?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-01%'")); echo $ejan ;?>
					,	<?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-02%'")); echo $ejan ;?>
					, <?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-03%'")); echo $ejan ;?>
					, <?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-04%'")); echo $ejan ;?>
					, <?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-05%'")); echo $ejan ;?>
					, <?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-06%'")); echo $ejan ;?>
					, <?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-07%'")); echo $ejan ;?>
					, <?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-08%'")); echo $ejan ;?>
					, <?php $ejan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-09%'")); echo $ejan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-10%'")); echo $ejan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-11%'")); echo $ejan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'E%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-12%'")); echo $ejan ;?>]
            }, {
                name: 'Komik',
                data: [<?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-01%'")); echo $kjan ;?>
					,	<?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-02%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-03%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-04%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-05%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-06%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-07%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-08%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-09%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-10%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-11%'")); echo $kjan ;?>
					, <?php $kjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'K%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-12%'")); echo $kjan ;?>]
            }, {
                name: 'Agama',
                data: [<?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-01%'")); echo $ajan ;?>
					,	<?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-02%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-03%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-04%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-05%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-06%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-07%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-08%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-09%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-10%'")); echo $ajan ;?>
					, <?php $ajan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-11%'")); echo $ajan ;?>
					, <?php $njan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'A%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-12%'")); echo $ajan ;?>]		
            }]
        });
    });
    
});
		</script>
<?php
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='petugas'){
  	$petugasjml = mysql_num_rows(mysql_query("SELECT * FROM petugas"));
 		$bukujml = mysql_num_rows(mysql_query("SELECT * FROM buku"));
 		$bukupnjm = mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_stok = 'Tidak Ada'"));
 		$bukuada = mysql_num_rows(mysql_query("SELECT * FROM buku WHERE buku_stok = 'Ada'"));
		$pdfjml = mysql_num_rows(mysql_query("SELECT * FROM pdf"));
		$flashjml = mysql_num_rows(mysql_query("SELECT * FROM flash"));
		$peminjamjml = mysql_num_rows(mysql_query("SELECT * FROM peminjam"));
  echo "<h2>Home</h2>
          <p align=left>Selamat datang, <b>$_SESSION[namalengkap]</b> , anda berada di System Kontrol Perpustakaan <a href=../index.php target=_blank>Athena</a>. Disini anda dapat menambah data peminjam perpustakaan, mengatur peminjaman dan pengembalian buku buku di Perpustakaan Athena.<br>
          Silahkan pilih menu yang berada di atas untuk mengelola website.<br>
							<center><font color=white><b>Statistik Perpustakaan</b></font><br></center>

<table class=tbcontent>
  <tr>
    <td width=130px>Jumlah Peminjam</td>
    <td width=21px>: <b>$peminjamjml</b></td>
    <td><a href=export_peminjam.php>Export Data Peminjam Ke Excel</a></td>
    <td rowspan='8'>
	<script src='js/highcharts.js'></script>
	<script src='js/exporting.js'></script>
	<div id='chartcon' style='min-width: 620px; height: 320px; margin: 0 auto'></div>
	</td>
  </tr>
  <tr>
    <td> Jumlah Buku </td>
    <td>: <b>$bukujml</b></td>
    <td><a href=export_buku.php>Export Data Buku Ke Excel</a></td>
  </tr>
  <tr>
    <td> Jumlah Buku Yang Dipinjam </td>
    <td colspan='2'>: <b>$bukupnjm</b></td>
  </tr>
  <tr>
    <td> Jumlah Buku Yang Ada </td>
    <td colspan='2'>: <b>$bukuada</b></td>
  </tr>
  <tr>
    <td> Jumlah E-Book PDF</td>
    <td colspan='2'>: <b>$pdfjml</b></td>
  </tr>
  <tr>
    <td> Jumlah E-Book Flash</td>
    <td colspan='2'>: <b>$flashjml</b></td>
  </tr>
  <tr>
    <td> Jumlah Petugas</td>
    <td colspan='2'>: <b>$petugasjml</b></td>
  </tr>
</table>";
  }
  elseif ($_SESSION['leveluser']=='user'){
  echo "<h2>Anda Tidak Punya Hak Disini</h2>";
 	}
?>