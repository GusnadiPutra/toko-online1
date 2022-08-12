<?php
include "../../koneksi.php";

$idadmin = $_GET['id'];

$qrydt="SELECT * FROM tb_admin WHERE id_admin='$idadmin'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $row=$resultdt->fetch_assoc();
    $nama = $row['nama_admin'];
    $alamat = $row['alamat_admin'];
    $email = $row['email_admin'];
    $telp = $row['telp_admin'];
    $username = $row['username_admin'];
    $password = $row['password_admin'];
}

$data = array(
            'idadmin'       =>  $idadmin,
            'nama'          =>  $nama,
            'alamat'        =>  $alamat,
            'email'         =>  $email,
            'telp'          =>  $telp,
            'username'      =>  $username,
            'password'      =>  $password);
echo json_encode($data);
?>