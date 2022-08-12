<?php
require '../../koneksi.php';


$module=$_POST['module'];

if ($module=='simpan'){

		$sql = "INSERT INTO tb_kategori VALUES ('$_POST[idkat]','$_POST[nama]')";
		$result = $mysqli->query($sql);

	echo json_encode( JSON_PRETTY_PRINT);
}
elseif ($module=='ubah'){

	$sql = "SELECT * FROM tb_kategori WHERE nama_kategori='$_POST[nama]' AND id_kategori!='$_POST[idkat]'";
	$result = $mysqli->query($sql);
	$data['totaldata'] = mysqli_num_rows($result);
	if($data['totaldata'] > 0){
	}else{

		$sql = "UPDATE tb_kategori SET nama_kategori='$_POST[nama]' WHERE id_kategori='$_POST[idkat]'";
		$result = $mysqli->query($sql);
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
}
?>