<?php
include '../koneksi.php';

$tahungrf = $_GET['tahungrafik'];

?>

<div id="grafikline" style="min-width: 200px; height: 100%; margin: 0 auto"></div>

<script src="../assets/js/highcharts.js" type="text/javascript"></script>

<script type="text/javascript">

  <?php 
  $totjual = 0;
  $totklr = 0;
  $awal = 1;
  for ($i= 1; $i <= 12; $i++)
  {

    $sqljual = "SELECT IFNULL(SUM(grand_total_penjualan),0) AS grand_total_penjualan FROM tb_penjualan WHERE MONTH(tanggal_penjualan) = '$i' AND YEAR(tanggal_penjualan) = '$tahungrf'";
    $resultjual = $mysqli->query($sqljual);
    $datajual = $resultjual->fetch_assoc();
    $totaljual = $datajual['grand_total_penjualan'];

    $sqlklr = "SELECT IFNULL(SUM(grand_total_pembelian),0) AS grand_total_pembelian FROM tb_pembelian WHERE MONTH(tanggal_pembelian) = '$i' AND YEAR(tanggal_pembelian) = '$tahungrf'";
    $resultklr = $mysqli->query($sqlklr);
    $dataklr = $resultklr->fetch_assoc();
    $totalkeluar = $dataklr['grand_total_pembelian'];

    if ($awal == 1){
      $totjual = $totaljual;
      $totklr = $totalkeluar;
    }elseif($awal > 1){
      $totjual = $totjual.",".$totaljual;
      $totklr = $totklr.",".$totalkeluar;
    }
    $awal++;
  }
  ?>


  $(function () {
    $('#grafikline').highcharts({
      title: {
        text: 'Data',
            x: -20 //center
          },
          subtitle: {
            text: 'Tahun <?php echo $tahungrf;?>',
            x: -20
          },
          credits: {
           enabled: false
         },
         xAxis: {
           title: {
            text: 'Bulan'
          },
          categories: ['1','2','3','4','5','6','7','8','9','10','11','12']
        },
        yAxis: {
          title: {
            text: 'Jumlah'
          },
          labels: {
            formatter:function(){
              return(this.value/1000000)+" Jt";
            }
          },
          plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
          }]
        },
        tooltip: {
          valueSuffix: ''
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle',
          borderWidth: 0
        },
        series: [
        {
         name: "<?php echo "Data Penjualan";?>",
         data: [<?php echo $totjual;?>]
       },{
         name: "<?php echo "Data Pembelian";?>",
         data: [<?php echo $totklr;?>]
       }
       ]
     });
  });
</script>