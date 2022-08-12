<?php
if ($_GET['hal']=='home')
{ include "home.php";}

else
if ($_GET['hal']=='login')
{ include "login.php";}

else
if ($_GET['hal']=='daftar')
{ include "daftar.php";}

else
if ($_GET['hal']=='produk')
{ include "produk.php";}

else
if ($_GET['hal']=='panduan')
{ include "panduan.php";}

else
if ($_GET['hal']=='tentang')
{ include "tentang.php";}

else
if ($_GET['hal']=='account')
{ include "account.php";}

else
if ($_GET['hal']=='keranjang')
{ include "keranjang.php";}

else
if ($_GET['hal']=='myorder')
{ include "myorder.php";}

else
if ($_GET['hal']=='listorder')
{ include "listorder.php";}

?>