<?php
session_start();
require '../../koneksi.php';


$module=$_POST['module'];

if ($module=='confirm'){


	$sql = "UPDATE tb_pesanan SET status_pemesanan='Proses' WHERE id_pemesanan='$_POST[idpesananconfirm]'";
	$result = $mysqli->query($sql);

	echo json_encode(JSON_PRETTY_PRINT);
}
elseif ($module=='cancel'){

	$sql = "UPDATE tb_pemesanan SET status_pemesanan='Batal', read_pemesanan='1' WHERE id_pemesanan='$_POST[idpesanancancel]'";
	$result = $mysqli->query($sql);

	$sql1 = "SELECT * FROM tb_pemesanan_detail WHERE id_pemesanan='$_POST[idpesanancancel]'";
	$result1 = $mysqli->query($sql1);
	$jumdata1 = mysqli_num_rows($result1);
	if($jumdata1>0){
		while ($data1 = $result1->fetch_assoc()) {
			$idbrg = $data1['id_barang'];
			$qtypsn = $data1['qty_pemesanan'];

			$sql2 = "UPDATE tb_barang SET stok_barang=stok_barang+'$qtypsn' WHERE id_barang='$idbrg'";
			$result2 = $mysqli->query($sql2);
		}
	}

	echo json_encode(JSON_PRETTY_PRINT);
}
elseif ($module=='kirim'){

	$sql = "UPDATE tb_pesanan SET status_pemesanan='Kirim' WHERE id_pemesanan='$_POST[idpesankirim]'";
	$result = $mysqli->query($sql);

	$sql2 = "INSERT INTO tb_kirim (id_pemesanan, tanggal_kirim, no_resi) VALUES ('$_POST[idpesankirim]','$_POST[tglkirim]','$_POST[noresi]')";
	$result2 = $mysqli->query($sql2);
	
	echo json_encode(JSON_PRETTY_PRINT);
}
?>