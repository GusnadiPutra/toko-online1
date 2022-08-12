<?php
session_start();
include "koneksi.php";

$idksm = $_SESSION['iduser'];

$qryid="SELECT RIGHT(id_pemesanan,5) as id_pemesanan FROM tb_pesanan ORDER BY id_pemesanan DESC LIMIT 1";
$resultid = $mysqli->query($qryid);
$jumdataid = mysqli_num_rows($resultid);

if($jumdataid == 0) {
    $idpesan = "PSN-00001";
}else {
    $row=$resultid->fetch_assoc();
    $kdfaktur = $row['id_pemesanan'];

    $idmax = $kdfaktur;
    $idmax++;
    if($idmax < 10){
        $idpesan = "PSN-0000".$idmax;
    }else if($idmax < 100){
        $idpesan = "PSN-000".$idmax;
    }else if($idmax < 1000){
        $idpesan = "PSN-00".$idmax;
    }else if($idmax < 10000){
        $idpesan = "PSN-0".$idmax;
    }else {
        $idpesan = "PSN-".$idmax;
    }
}


$sql = "SELECT * FROM (tb_keranjang a INNER JOIN tb_pelanggan c USING(id_pelanggan)) INNER JOIN tb_dataproduk b USING(id_produk) WHERE a.id_pelanggan='$idksm' ORDER By id_keranjang DESC";
$result = $mysqli->query($sql);
$jumdata = mysqli_num_rows($result);
$totalberat = 0;
$totalsub = 0;
if($jumdata>0){
    while ($data = $result->fetch_assoc()) {
        $namacs = $data['nama_pelanggan'];
        $alamatcs = $data['alamat_pelanggan'];
        $id_prov = $data['id_provinsi'];
        $prov = $data['nama_prov'];
        $id_kab = $data['id_kabupaten'];
        $kab = $data['nama_kab'];
        $beratbrg = $data['berat'];
        $hargabrg = $data['harga'];
        $jumlah_produk = $data['jumlah_produk'];
        $subtot = $hargabrg * $jumlah_produk;
        $totalberat = $totalberat + ($beratbrg * $jumlah_produk);
        $totalsub = $totalsub + $subtot;
    }
}
$data = array(
    'idpesan'     =>  $idpesan,
    'namacs'      =>  $namacs,
    'alamatcs'    =>  $alamatcs,
    'id_prov'     =>  $id_prov,
    'prov'        =>  $prov,
    'id_kab'      =>  $id_kab,
    'kab'         =>  $kab,
    'berat'       =>  $beratbrg,
    'hrgbrg'      =>  $hargabrg,
    'totalberat'  =>  $totalberat,
    'totalsub'    =>  $totalsub);
echo json_encode($data);
?>