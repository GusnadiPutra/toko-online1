<?php
if ($_GET['hal']=='home')
{ include "home.php";}
else
if  ($_GET['hal']=='ubahpass')
{ include "ubahpass.php";}
else

if  ($_GET['hal']=='dataadmin')
{ include "data-admin/admin.php";}
else

if  ($_GET['hal']=='datakategori')
{ include "data-kategori/kategori.php";}
else

if  ($_GET['hal']=='dataproduk')
{ include "data-barang/barang.php";}
else

if  ($_GET['hal']=='datapelanggan')
{ include "data-pelanggan/datapelanggan.php";}
else

if  ($_GET['hal']=='datatransaksi')
{ include "transaksi/transaksi.php";}
else

if  ($_GET['hal']=='datatransaksidetail')
{ include "transaksi/transaksidetail.php";}
else

if  ($_GET['hal']=='datapembayaran')
{ include "data-pembayaran/pembayaran.php";}
else

if  ($_GET['hal']=='datapesanan')
{ include "data-pesanan/datapesanan.php";}

if  ($_GET['hal']=='laporanpenjualan')
{ include "laporan/laporanpenjualan.php";}

if  ($_GET['hal']=='laporanunpackage')
{ include "laporan/laporanunpackage.php";}

if  ($_GET['hal']=='laporanunreceived')
{ include "laporan/laporanunreceived.php";}

?>