<?php
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "db_shoppingsatu");
define("DB_HOST", "localhost");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

date_default_timezone_set('Asia/Jakarta');
$tglkrg = date("Y-m-d");
$tglkrgfull = date("Y-m-d H:i:s");
$jamkrg = date("H:i:s");
$bulankrg = date("m");
$tahunkrg = date("Y");
?>