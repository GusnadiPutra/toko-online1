<?php
include "../../koneksi.php";

$idbarang = $_GET['id'];

$qrydt="SELECT * FROM tb_dataproduk WHERE id_produk='$idbarang'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $row=$resultdt->fetch_assoc();
    $idkat = $row['id_kategori'];
    $namabarang = $row['nama_produk'];
    $berat = $row['berat'];
    $harga = $row['harga'];
    $deskripsi = $row['deskripsi'];
    $uk = $row['ukuran'];
    $warna = $row['warna'];
    $stok = $row['stok'];
    $upgambar = $row['gambar'];
}

$data = array(
            'idbarang'      =>  $idbarang,
            'idkat'         =>  $idkat,
            'namabarang'    =>  $namabarang,
            'berat'         =>  $berat,
            'harga'         =>  $harga,
            'deskripsi'     =>  $deskripsi,
            'uk'          =>  $uk,
            'warna'         =>  $warna,
            'stok'          =>  $stok,
            'upgambar'      =>  $upgambar);
echo json_encode($data);
?>