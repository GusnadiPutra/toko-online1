<?php
include "../../koneksi.php";

$idkat = $_GET['id'];

$qrydt="SELECT * FROM tb_kategori WHERE id_kategori='$idkat'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $row=$resultdt->fetch_assoc();
    $nama = $row['nama_kategori'];
}

$data = array(
            'idkat'       =>  $idkat,
            'nama'          =>  $nama);
echo json_encode($data);
?>