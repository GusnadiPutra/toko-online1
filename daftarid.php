<?php
require "koneksi.php";

$qryid="SELECT RIGHT(id_pelanggan,5) as id_pelanggan FROM tb_pelanggan ORDER BY id_pelanggan DESC LIMIT 1";
$resultid = $mysqli->query($qryid);
$jumdataid = mysqli_num_rows($resultid);

if($jumdataid == 0) {
    $idpengguna = "PGN-00001";
}else {
    $row=$resultid->fetch_assoc();
    $kdfaktur = $row['id_pelanggan'];

    $idmax = $kdfaktur;
    $idmax++;
    if($idmax < 10){
        $idpengguna = "PGN-0000".$idmax;
    }else if($idmax < 100){
        $idpengguna = "PGN-000".$idmax;
    }else if($idmax < 1000){
        $idpengguna = "PGN-00".$idmax;
    }else if($idmax < 10000){
        $idpengguna = "PGN-0".$idmax;
    }else {
        $idpengguna = "PGN-".$idmax;
    }
}
$data = array(
    'idpengguna'      =>  $idpengguna);
echo json_encode($data);
?>