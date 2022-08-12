<?php
include "../../koneksi.php";

$id = $_GET['id'];

$qrydt="SELECT * FROM tb_pembayaran INNER JOIN tb_pesanan USING(id_pemesanan) INNER JOIN tb_pelanggan WHERE id_pembayaran='$id' AND tb_pesanan.id_pelanggan=tb_pelanggan.id_pelanggan ";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $row=$resultdt->fetch_assoc();
    $idp = $row['id_pemesanan'];
    $namapelanggan = $row['nama_pelanggan'];
    $bank = $row['bank'];
    $norek = $row['rekening'];
    $email = $row['email_pelanggan'];
    $telp = $row['telp_pelanggan'];
    $tgltransfer = $row['tanggal_pembayaran'];
    $alamat = $row['alamat_pelanggan'];
    $statuspembayaran = $row['status_pembayaran'];
    $layananpsn = $row['kurir_layanan'];
    $layananharga = $row['jenis_layanan'];
    $beratpsn = $row['total_berat'];
    $hargapsn = $row['total_harga'];
    $ongkirpsn = $row['total_ongkir'];
    $grtotpsn = $row['total_bayar'];
    $statuspsn = $row['status_pemesanan'];
    $buktitransfer = $row['bukti_transfer'];
}

$data = array(
            'idpembayaranconfirm'    =>  $id,
            'idorder'           =>  $idp,
            'nama'              =>  $namapelanggan,
            'transfer'          =>  $grtotpsn,
            'namabank'          =>  $bank,
            'norekening'        =>  $norek,
            'bukti'             =>  $buktitransfer);
echo json_encode($data);
?>