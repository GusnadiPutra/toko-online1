         
<?php 
include "../../koneksi.php";

$id	= $_GET['id'];
$qrydt="SELECT * FROM tb_pemesanan INNER JOIN tb_pengguna USING(id_pengguna) WHERE id_pemesanan='$id'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $rowcust=$resultdt->fetch_assoc();
    $namabank = $rowcust['nama_bank_pengguna'];
    $atasnama = $rowcust['atas_nama_pengguna'];
    $norekening = $rowcust['no_rekening_pengguna'];
    $nama = $rowcust['nama_pengguna'];
    $tgl = $rowcust['tanggal_pemesanan'];
    $emailcust = $rowcust['email_pengguna'];
    $telpcust = $rowcust['no_hp_pengguna'];
    $alamatpsn = $rowcust['alamat_pengguna'];
    $provpsn = $rowcust['nama_provinsi'];
    $kabpsn = $rowcust['nama_kabupaten'];
    $layananpsn = $rowcust['layanan_kurir'];
    $layananharga = $rowcust['layanan_harga'];
    $beratpsn = $rowcust['total_berat_pemesanan'];
    $hargapsn = $rowcust['total_harga_pemesanan'];
    $ongkirpsn = $rowcust['total_ongkir_pemesanan'];
    $grtotpsn = $rowcust['grand_total_pemesanan'];
    $statuspsn = $rowcust['status_pemesanan'];
}

$qrybyr="SELECT * FROM tb_pembayaran WHERE id_pemesanan='$id'";
$resultbyr = $mysqli->query($qrybyr);
$jumbyr = mysqli_num_rows($resultbyr);
if($jumbyr == 0) {
}else {
    $rowbyr=$resultbyr->fetch_assoc();
    $tgltrf = $rowbyr['tanggal_transfer'];
    $buktitrf = $rowbyr['bukti_transfer'];
}

$qrykirim="SELECT * FROM tb_kirim WHERE id_pemesanan='$id'";
$resultkirim = $mysqli->query($qrykirim);
$jumkirim = mysqli_num_rows($resultkirim);
if($jumkirim == 0) {
}else {
    $rowkirim=$resultkirim->fetch_assoc();
    $tglkirim = $rowkirim['tanggal_kirim'];
    $noresi = $rowkirim['no_resi'];
}


?>

<?php
if($jumkirim == 0) {
}else {
    ?>

    <h2  align="center"><b>NO RESI : <?php echo $noresi; ?></b></h2>
<?php
}
?>
<label class="control-label col-md-4">ID </label>
<label class="control-label col-md-8"><?php echo $id; ?> </label>

<label class="control-label col-md-4">Tanggal </label>
<label class="control-label col-md-8"><?php echo date('d-m-Y, H:i:s', strtotime($tgl)); ?> </label>

<label class="control-label col-md-4">Nama Pembeli </label>
<label class="control-label col-md-8"><?php echo $nama; ?> </label>

<label class="control-label col-md-4">Email Pembeli </label>
<label class="control-label col-md-8"><?php echo $emailcust; ?> </label>

<label class="control-label col-md-4">No HP Pembeli </label>
<label class="control-label col-md-8"><?php echo $telpcust; ?> </label>

<label class="control-label col-md-4">Alamat Pembeli </label>
<label class="control-label col-md-8"><?php echo $alamatpsn; ?> </label>

<label class="control-label col-md-4">Provinsi </label>
<label class="control-label col-md-8"><?php echo $provpsn; ?> </label>

<label class="control-label col-md-4">Kabupaten </label>
<label class="control-label col-md-8"><?php echo $kabpsn; ?> </label>

<label class="control-label col-md-4">Kurir </label>
<label class="control-label col-md-8"><?php echo $layananpsn; ?> </label>

<label class="control-label col-md-4">Status </label>
<label class="control-label col-md-8"><?php echo $statuspsn; ?> </label>

<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Penjual</th>
            <th>Berat/Pcs</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        $sql = "SELECT * FROM tb_pemesanan_detail INNER JOIN (tb_barang INNER JOIN tb_pengguna USING(id_pengguna)) USING(id_barang) WHERE id_pemesanan='$id'";
        $result = $mysqli->query($sql);
        $jumdata = mysqli_num_rows($result);
        if($jumdata>0){
            while ($data = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $i; ?>
                    </td>
                    <td>
                        <?php echo $data['nama_barang']; ?>
                    </td>
                    <td>
                        <?php echo $data['nama_pengguna']; ?>
                    </td>
                    <td>
                        <?php echo $data['berat_barang']." Gram"; ?>
                    </td>
                    <td>
                        <?php echo "Rp.".number_format($data['harga_pemesanan'], 2, ',','.'); ?>
                    </td>
                    <td>
                        <?php echo $data['qty_pemesanan']; ?>
                    </td>
                    <td>
                        <?php echo "Rp.".number_format($data['sub_total_pemesanan'], 2, ',','.'); ?>
                    </td>
                </tr>
                <?php
                $i++;
            }
        } 
        ?>
    </tbody>
</table>
<label class="control-label col-md-4">Sub Total </label>
<label class="control-label col-md-8"><?php echo "Rp.".number_format($hargapsn, 2, ',','.'); ?></label>

<label class="control-label col-md-4">Total Berat </label>
<label class="control-label col-md-8"><?php echo $beratpsn." Gram"; ?> </label>

<label class="control-label col-md-4">Total Ongkir </label>
<label class="control-label col-md-8"><?php echo "Rp.".number_format($ongkirpsn, 2, ',','.'); ?></label>

<label class="control-label col-md-4">Grand Total </label>
<label class="control-label col-md-8"><?php echo "Rp.".number_format($grtotpsn, 2, ',','.'); ?></label>


<?php
if($jumbyr == 0) {
}else {
    ?>
    <h2 style="margin-top:20px;"><b>Pembayaran</b></h2>
    <label class="control-label col-md-4">Nama Bank </label>
    <label class="control-label col-md-8"><?php echo $namabank; ?> </label>
    <label class="control-label col-md-4">ATM Atas Nama </label>
    <label class="control-label col-md-8"><?php echo $atasnama; ?> </label>
    <label class="control-label col-md-4">No Rekening </label>
    <label class="control-label col-md-8"><?php echo $norekening; ?> </label>

    <label class="control-label col-md-4">Tanggal Transfer </label>
    <label class="control-label col-md-8"><?php echo date('d-m-Y', strtotime($tgltrf)); ?> </label>

    <label class="control-label col-md-4">Bukti Transfer</label>
    <label class="control-label col-md-8">
        <?php
        if($buktitrf == "-"){
            echo "-";
        }else{
            ?><a href="../image/bukti/<?php echo $buktitrf; ?>" target="_blank"><img style="width: 200px; display: block;" src="../image/bukti/<?php echo $buktitrf; ?>" alt="image" /></a></label>
            <?php
        }
    }
    ?>
</div>  

<div class="modal-footer">

</div>