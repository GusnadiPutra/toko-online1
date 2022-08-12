<?php
require '../../koneksi.php';


$module=$_POST['module'];

if ($module=='simpan'){

	$txtgambar		= $_FILES['gambar']['name'];
	

	if($txtgambar!=""){
		$random_digit = rand(0000,9999);
		$new_file = $_POST['idbarang']."_".$random_digit.".jpg";
		$phono_path = $_FILES['gambar']['tmp_name'];
		$directory = "../../image/barang/".$new_file;
		move_uploaded_file($phono_path,$directory);
	}else{
		$new_file = "-";
	}

	$sql = "INSERT INTO tb_dataproduk VALUES ('$_POST[idbarang]','$_POST[kategori]','$_POST[nama]','$_POST[harga]','$_POST[deskripsi]', '$_POST[uk]','$_POST[warna]','$_POST[stok]','$_POST[berat]','$new_file')";
	$result = $mysqli->query($sql);

	echo json_encode(JSON_PRETTY_PRINT);
}
elseif ($module=='ubah'){

	session_start();
	$txtgambar		= $_FILES['gambar']['name'];
	$idpgn = $_SESSION['iduser'];

	if($txtgambar!=""){
		$random_digit = rand(0000,9999);
		$new_file = $_POST['idbarang']."_".$random_digit.".jpg";
		$phono_path = $_FILES['gambar']['tmp_name'];
		$directory = "../../image/barang/".$new_file;
		move_uploaded_file($phono_path,$directory);

		$sql = "UPDATE tb_dataproduk SET id_kategori='$_POST[kategori]', nama_produk='$_POST[nama]',  harga='$_POST[harga]', deskripsi='$_POST[deskripsi]', ukuran='$_POST[uk]', warna='$_POST[warna]', stok='$_POST[stok]', berat='$_POST[berat]', gambar='$new_file' WHERE id_produk='$_POST[idbarang]'";
		$result = $mysqli->query($sql);

	}else{
		$new_file = "-";
		$sql = "UPDATE tb_dataproduk SET id_kategori='$_POST[kategori]', nama_produk='$_POST[nama]', harga='$_POST[harga]', deskripsi='$_POST[deskripsi]', ukuran='$_POST[uk]', warna='$_POST[warna]', stok='$_POST[stok]', berat='$_POST[berat]' WHERE id_produk='$_POST[idbarang]'";
		$result = $mysqli->query($sql);

	}

	echo json_encode(JSON_PRETTY_PRINT);
}
elseif ($module=='simpanstok'){

	$sql = "INSERT INTO tb_stok_masuk (id_barang, tanggal_stok_masuk, qty_stok_masuk) VALUES ('$_POST[idbarang]','$tglkrg','$_POST[stokmasuk]')";
	$result = $mysqli->query($sql);

	$sql2 = "UPDATE tb_barang SET stok_barang=stok_barang+'$_POST[stokmasuk]' WHERE id_barang='$_POST[idbarang]'";
	$result2 = $mysqli->query($sql2);

	echo json_encode(JSON_PRETTY_PRINT);
	}
elseif ($module=='ubahstok'){

	$sql = "UPDATE tb_stok_masuk SET qty_stok_masuk='$_POST[stokmasuk]' WHERE id_stok_masuk='$_POST[iddetail]'";
	$result = $mysqli->query($sql);

	$sql2 = "UPDATE tb_barang SET stok_barang=stok_barang-'$_POST[stoksebelum]'+'$_POST[stokmasuk]' WHERE id_barang='$_POST[idbarang]'";
	$result2 = $mysqli->query($sql2);

	echo json_encode(JSON_PRETTY_PRINT);
}
?>