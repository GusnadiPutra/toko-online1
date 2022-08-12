<?php
include "../../koneksi.php";

$qryid="SELECT RIGHT(id_kategori,3) as id_kategori FROM tb_kategori ORDER BY id_kategori DESC LIMIT 1";
$resultid = $mysqli->query($qryid);
$jumdataid = mysqli_num_rows($resultid);

if($jumdataid == 0) {
    $iduser = "KTG-001";
}else {
    $row=$resultid->fetch_assoc();
    $kdfaktur = $row['id_kategori'];

    $idmax = $kdfaktur;
    $idmax++;
    if($idmax < 10){
        $iduser = "KTG-00".$idmax;
    }else if($idmax < 100){
        $iduser = "KTG-0".$idmax;
    }else {
        $iduser = "KTG-".$idmax;
    }
}
$data = array(
    'idkat'      =>  $iduser);
echo json_encode($data);
?>