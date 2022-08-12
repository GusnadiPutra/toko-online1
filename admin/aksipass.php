<?php
session_start();
include "../koneksi.php";

$sql = "UPDATE tb_admin SET nama_admin='$_POST[namaadmin]', username_admin='$_POST[usernameid]', password_admin='$_POST[passbaru]' WHERE id_admin='$_SESSION[idadmin]'";
$result = $mysqli->query($sql);

$_SESSION['usernameadmin'] = $_POST['usernameid'];
$_SESSION['namaadmin'] = $_POST['namaadmin'];
$_SESSION['passadmin'] = $_POST['passbaru'];

echo json_encode(JSON_PRETTY_PRINT);
?>