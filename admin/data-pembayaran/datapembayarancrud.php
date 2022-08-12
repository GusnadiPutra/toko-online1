<?php
session_start();
require '../../koneksi.php';


$module=$_POST['module'];

if ($module=='confirm'){


	$sql = "UPDATE tb_pembayaran SET status_pembayaran='Confirm', read_pembayaran='1' WHERE id_pembayaran='$_POST[idpembayaranconfirm]'";
	$result = $mysqli->query($sql);

	echo json_encode(JSON_PRETTY_PRINT);
}
elseif ($module=='cancel'){

	$sql = "UPDATE tb_pembayaran SET status_pembayaran='Tolak' WHERE id_pembayaran='$_POST[idpembayarancancel]'";
	$result = $mysqli->query($sql);

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