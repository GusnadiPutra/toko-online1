<?php
//lanjutkan session yang sudah dibuat sebelumnya
session_start();
 
//hapus session yang sudah dibuat
unset($_SESSION['idadmin']);
unset($_SESSION['namaadmin']);
unset($_SESSION['usernameadmin']);
unset($_SESSION['passadmin']);
unset($_SESSION['aksesadmin']);

//redirect ke halaman login
header('refresh:0;url=index.php');
?>