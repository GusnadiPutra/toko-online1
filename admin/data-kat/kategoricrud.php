<?php
require '../../koneksi.php';


$module=$_POST['module'];

if ($module=='simpan'){

		$sql = "INSERT INTO tb_admin VALUES ('$_POST[idadmin]','$_POST[nama]','$_POST[alamat]','$_POST[email]','$_POST[telp]','$_POST[username]','$_POST[password]')";
		$result = $mysqli->query($sql);

	echo json_encode( JSON_PRETTY_PRINT);
}
elseif ($module=='ubah'){

	$sql = "SELECT * FROM tb_admin WHERE username_admin='$_POST[username]' AND id_admin!='$_POST[idadmin]'";
	$result = $mysqli->query($sql);
	$data['totaldata'] = mysqli_num_rows($result);
	if($data['totaldata'] > 0){
	}else{

		$sql = "UPDATE tb_admin SET nama_admin='$_POST[nama]', alamat_admin='$_POST[alamat]', email_admin='$_POST[email]', telp_admin='$_POST[telp]', username_admin='$_POST[username]', password_admin='$_POST[password]' WHERE id_admin='$_POST[idadmin]'";
		$result = $mysqli->query($sql);
	}
	echo json_encode($data,JSON_PRETTY_PRINT);
}
?>