         
<?php 
include "../../koneksi.php";

$id	= $_GET['id'];
$qrydt="SELECT * FROM tb_dataproduk INNER JOIN tb_kategori USING(id_kategori) WHERE id_produk='$id'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $row=$resultdt->fetch_assoc();
    $idkat = $row['id_kategori'];
    $namakat = $row['nama_kategori'];
    $namabarang = $row['nama_produk'];
    $berat = $row['berat'];
    $harga = $row['harga'];
    $stokbrg = $row['stok'];
    $deskripsi = $row['deskripsi'];
    $upgambar = $row['gambar'];
}

?>

<label class="control-label col-md-4" style="margin-top:20px;">ID </label>
<label class="control-label col-md-8 " style="margin-top:20px;"><?php echo $id; ?> </label>

<label class="control-label col-md-4">Kategori </label>
<label class="control-label col-md-8"><?php echo $namakat; ?> </label>

<label class="control-label col-md-4">Nama Barang </label>
<label class="control-label col-md-8"><?php echo $namabarang; ?> </label>

<label class="control-label col-md-4">Berat </label>
<label class="control-label col-md-8"><?php echo $berat." Gram"; ?> </label>

<label class="control-label col-md-4">Harga Barang </label>
<label class="control-label col-md-8"><?php echo "Rp.".number_format($harga, 2, ',','.'); ?></label>

<label class="control-label col-md-4">Stok Barang </label>
<label class="control-label col-md-8"><?php echo $stokbrg; ?> </label>

<label class="control-label col-md-4">Deskripsi </label>
<label class="control-label col-md-8"><?php echo nl2br($deskripsi); ?> </label>

<label class="control-label col-md-4">Gambar </label>
<label class="control-label col-md-8">
    <?php
    if($upgambar=="-"){
        echo "No Upload";
    }else{
        echo '<a href="../image/barang/'.$upgambar.'" target="_blank"><img src="../image/barang/'.$upgambar.'" width="100px"/></a>';
    }
    ?></label>


    <div class="modal-footer">

    </div>