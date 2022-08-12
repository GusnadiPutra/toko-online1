<?php
include "../../koneksi.php";

$qryid="SELECT RIGHT(id_produk,5) as id_produk FROM tb_dataproduk ORDER BY id_produk DESC LIMIT 1";
$resultid = $mysqli->query($qryid);
$jumdataid = mysqli_num_rows($resultid);

if($jumdataid == 0) {
    $idbarang = "BRG-00001";
}else {
    $row=$resultid->fetch_assoc();
    $kdfaktur = $row['id_produk'];

    $idmax = $kdfaktur;
    $idmax++;
    if($idmax < 10){
        $idbarang = "BRG-0000".$idmax;
    }else if($idmax < 100){
        $idbarang = "BRG-000".$idmax;
    }else if($idmax < 1000){
        $idbarang = "BRG-00".$idmax;
    }else if($idmax < 10000){
        $idbarang = "BRG-0".$idmax;
    }else {
        $idbarang = "BRG-".$idmax;
    }
}
$data = array(
    'idbarang'      =>  $idbarang);
echo json_encode($data);
?>