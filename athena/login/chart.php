<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/docs.js"></script>
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
                categories: ['Jan  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-01%'")); echo $bjan ;?> )'
				, 'Feb  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-02%'")); echo $bjan ;?> )'
				, 'Mar  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-03%'")); echo $bjan ;?> )'
				, 'Apr  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-04%'")); echo $bjan ;?> )'
				, 'May  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-05%'")); echo $bjan ;?> )'
				, 'Jun  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-06%'")); echo $bjan ;?> )'
				, 'Jul  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-07%'")); echo $bjan ;?> )'
				, 'Aug  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-08%'")); echo $bjan ;?> )'
				, 'Sep  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-09%'")); echo $bjan ;?> )'
				, 'Oct  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-10%'")); echo $bjan ;?> )'
				, 'Nov  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-11%'")); echo $bjan ;?> )'
				, 'Dec  ( <?php $bjan = mysql_num_rows(mysql_query("SELECT * FROM peminjaman WHERE peminjaman_tgl LIKE '$thn_sekarang-12%'")); echo $bjan ;?> )']
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
            }, {
                name: 'Pemrograman',
                data: [<?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-01%'")); echo $pjan ;?>
					,	<?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-02%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-03%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-04%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-05%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-06%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-07%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-08%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-09%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-10%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-11%'")); echo $pjan ;?>
					, <?php $pjan = mysql_num_rows(mysql_query("SELECT * FROM detail_pinjam,peminjaman WHERE detail_pinjam.peminjaman_kode = peminjaman.peminjaman_kode AND detail_pinjam.buku_kode LIKE 'P%' AND peminjaman.peminjaman_tgl LIKE '$thn_sekarang-12%'")); echo $pjan ;?>]		
            }]
        });
    });
    
});
		</script>