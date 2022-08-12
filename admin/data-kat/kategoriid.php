<?php
include "../../koneksi.php";

$qryid="SELECT RIGHT(id_kategori,3) as id_kategori FROM tb_kategori ORDER BY id_kategori DESC LIMIT 1";
$resultid = $mysqli->query($qryid);
$jumdataid = mysqli_num_rows($resultid);

if($jumdataid == 0) {
    $idkategori = "KTG-001";
}else {
    $row=$resultid->fetch_assoc();
    $kdfaktur = $row['id_kategori'];

    $idmax = $kdfaktur;
    $idmax++;
    if($idmax < 10){
        $idkategori = "KTG-00".$idmax;
    }else if($idmax < 100){
        $idkategori = "KTG-0".$idmax;
    }else {
        $idkategori = "KTG-".$idmax;
    }
}
$data = array(
    'idkategori'      =>  $idkategori);
echo json_encode($data);
?>