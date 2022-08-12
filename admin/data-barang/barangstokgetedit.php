<?php
include "../../koneksi.php";

$idstok = $_GET['id'];

$qrydt="SELECT * FROM tb_stok_masuk INNER JOIN tb_barang USING(id_barang) WHERE id_stok_masuk='$idstok'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $row=$resultdt->fetch_assoc();
    $qtystok = $row['qty_stok_masuk'];
    $idbarang = $row['id_barang'];
    $namabarang = $row['nama_barang'];
}

$data = array(
            'idstok'      =>  $idstok,
            'idbarang'      =>  $idbarang,
            'namabarang'      =>  $namabarang,
            'qtystok'      =>  $qtystok);
echo json_encode($data);
?>