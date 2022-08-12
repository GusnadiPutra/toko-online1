<?php
require '../koneksi.php';

$sql = "SELECT * FROM tb_admin WHERE username_admin='$_POST[user_name]' AND password_admin='$_POST[user_pass]'";
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();
$data['totaldata'] = mysqli_num_rows($result);
if($data['totaldata'] > 0){
	session_start();
	$_SESSION['idadmin'] = $data['id_admin'];
	$_SESSION['namaadmin'] = $data['nama_admin'];
	$_SESSION['usernameadmin'] = $data['username_admin'];
	$_SESSION['passadmin'] = $data['password_admin'];
	$_SESSION['aksesadmin'] = "Admin";
}else{
	$_SESSION['idadmin'] = "";
	$_SESSION['namaadmin'] = "";
	$_SESSION['usernameadmin'] = "";
	$_SESSION['passadmin'] = "";
	$_SESSION['aksesadmin'] = "";
	session_start();
	session_destroy();
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>