<?php
include "../../koneksi.php";

$qryid="SELECT RIGHT(id_admin,3) as id_admin FROM tb_admin ORDER BY id_admin DESC LIMIT 1";
$resultid = $mysqli->query($qryid);
$jumdataid = mysqli_num_rows($resultid);

if($jumdataid == 0) {
    $iduser = "ADM-001";
}else {
    $row=$resultid->fetch_assoc();
    $kdfaktur = $row['id_admin'];

    $idmax = $kdfaktur;
    $idmax++;
    if($idmax < 10){
        $iduser = "ADM-00".$idmax;
    }else if($idmax < 100){
        $iduser = "ADM-0".$idmax;
    }else {
        $iduser = "ADM-".$idmax;
    }
}
$data = array(
    'idadmin'      =>  $iduser);
echo json_encode($data);
?>