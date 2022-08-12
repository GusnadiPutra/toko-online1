<?php

if(isset($_POST['btnpreview'])){
  $tahungrf = $_POST['tahungrf'];
} else {
  $tahungrf = date("Y");
}

$sqlproduk = "SELECT * FROM tb_dataproduk ";
$resultproduk = $mysqli->query($sqlproduk);
$jumdataproduk = mysqli_num_rows($resultproduk);

$sqlpesanan = "SELECT * FROM tb_pesanan ";
$resultpesanan = $mysqli->query($sqlpesanan);
$jumdatapesanan = mysqli_num_rows($resultpesanan);

$sqlpembayaran = "SELECT * FROM tb_pembayaran ";
$resultpembayaran = $mysqli->query($sqlpembayaran);
$jumdatapembayaran = mysqli_num_rows($resultpembayaran);

$sqlpelanggan = "SELECT * FROM tb_pelanggan ";
$resultpelanggan = $mysqli->query($sqlpelanggan);
$jumdatapelanggan = mysqli_num_rows($resultpelanggan);

'$sqlpsn = "SELECT SUM(grand_total_pemesanan) as totalpesan FROM tb_pemesanan";
$resultpsn = $mysqli->query($sqlpsn);
$jumdatapsn = mysqli_num_rows($resultpsn);
$datapsn = $resultpsn->fetch_assoc();
$totpsn = $datapsn["totalpesan"]; '

?><!-- page content -->
<div class="right_col" role="main">

  <div class="row top_tiles">

    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="tile-stats" align="center" style="padding: 30px 0; background-color: #2d23f3; color: white">
      <div class="count"><?php echo $jumdataproduk; ?></div>
        <h3 style="color: white;">Produk</h3>
      </div>
    </div>

    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="tile-stats" align="center" style="padding: 30px 0; background-color: #4c8ea7; color: white">
        <div class="count"><?php echo $jumdatapesanan; ?></div>
        <h3 style="color: white;">Order</h3>
      </div>
    </div>

  </div>

  <div class="row top_tiles">

      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats" align="center" style="padding: 30px 0; background-color: #2dd331; color: white">
            <div class="count"><?php echo $jumdatapembayaran; ?></div>
              <h3 style="color: white;">Pembayaran</h3>
          </div>
      </div>

          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats" align="center" style="padding: 30px 0; background-color: #2dd331; color: white">
              <div class="count"><?php echo $jumdatapelanggan; ?></div>
                <h3 style="color: white;">Pelanggan</h3>
              
            </div>
          </div>

  </div>

</div>

