         
<?php 
include "../../koneksi.php";

$id	= $_GET['id'];
$qrydt="SELECT * FROM tb_pembayaran INNER JOIN tb_pesanan USING(id_pemesanan) INNER JOIN tb_pelanggan WHERE id_pembayaran='$id' AND tb_pesanan.id_pelanggan=tb_pelanggan.id_pelanggan  ORDER By id_pembayaran DESC";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $rowcust=$resultdt->fetch_assoc();
    $idpembayaran = $rowcust['id_pemesanan'];
    $namapelanggan = $rowcust['nama_pelanggan'];
    $email = $rowcust['email_pelanggan'];
    $telp = $rowcust['telp_pelanggan'];
    $tgltransfer = $rowcust['tanggal_pembayaran'];
    $alamat = $rowcust['alamat_pelanggan'];
    $statuspembayaran = $rowcust['status_pembayaran'];
    $subtotal = $rowcust['total_harga'];
    $totalongkir = $rowcust['total_ongkir'];
    $totalbayar = $rowcust['total_bayar'];
    $buktitransfer = $rowcust['bukti_transfer'];
    
}

?>
<h2 style="margin-top:20px;"><b>Pembayaran</b></h2>
<label class="control-label col-md-4">ID Pesanan</label>
<label class="control-label col-md-8"><?php echo $idpembayaran; ?> </label>

<label class="control-label col-md-4">Nama Pembeli </label>
<label class="control-label col-md-8"><?php echo $namapelanggan; ?> </label>

<label class="control-label col-md-4">Email Pembeli </label>
<label class="control-label col-md-8"><?php echo $email; ?> </label>

<label class="control-label col-md-4">No HP Pembeli </label>
<label class="control-label col-md-8"><?php echo $telp; ?> </label>

<label class="control-label col-md-4">Alamat Pembeli </label>
<label class="control-label col-md-8"><?php echo $alamat; ?> </label>

<label class="control-label col-md-4">Sub Total </label>
<label class="control-label col-md-8"><?php echo "Rp.".number_format($subtotal, 2, ',','.'); ?></label>

<label class="control-label col-md-4">Total Ongkir </label>
<label class="control-label col-md-8"><?php echo "Rp.".number_format($totalongkir, 2, ',','.'); ?></label>

<label class="control-label col-md-4">Grand Total </label>
<label class="control-label col-md-8"><?php echo "Rp.".number_format($totalbayar, 2, ',','.'); ?></label>

<label class="control-label col-md-4">Tanggal Transfer </label>
<label class="control-label col-md-8"><?php echo date('d-m-Y', strtotime($tgltransfer)); ?> </label>


<label class="control-label col-md-4">Bukti Transfer</label>
    <label class="control-label col-md-8">
        <?php
        if($buktitransfer == "-"){
            echo "-";
        }else{
            ?><a href="../image/bukti/<?php echo $buktitransfer; ?>" target="_blank"><img style="width: 200px; display: block;" 
                    src="../image/bukti/<?php echo $buktitransfer; ?>" alt="image" /></a></label>
            <?php
        }
    
    ?>
</div>  

<label class="control-label col-md-4"><b>Status Pembayaran</b></label>
<label class="control-label col-md-8"><u><b><?php echo $statuspembayaran; ?></b></u> </label> 

<div class="modal-footer">

</div>