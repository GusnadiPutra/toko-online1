<?php

require 'koneksi.php';

if (isset($_GET['module'])) {
	$module=$_GET['module'];
}else{
	$module=$_POST['module'];
}

if ($module=='login'){
	date_default_timezone_set('Asia/Jakarta');
	$tglkrg   = date("Y-m-d H:i:s");

	$qrysql = "SELECT * FROM tb_pesanan WHERE status_pemesanan='Pesan'";
	$resultsql = $mysqli->query($qrysql);
	$jum = mysqli_num_rows($resultsql);

	if($jum>0){
		while ($datap = $resultsql->fetch_assoc()) {
			$idpesan = $datap['id_pemesanan'];
			$tgltrs = $datap['tgl_pemesanan'];
			$date = date_create($tgltrs);
			date_add($date, date_interval_create_from_date_string('+12 hours'));
			$tgltambah = date_format($date, 'Y-m-d H:i:s');
			if($tgltambah < $tglkrg){

				$sql = "UPDATE tb_pesanan SET status_pemesanan='Batal' WHERE id_pemesanan='$idpesan'";
				$result = $mysqli->query($sql);

				$sql1 = "SELECT * FROM tb_detail WHERE id_pemesanan='$idpesan'";
				$result1 = $mysqli->query($sql1);
				$jumdata1 = mysqli_num_rows($result1);
				if($jumdata1>0){
					while ($data1 = $result1->fetch_assoc()) {
						$idbrg = $data1['id_produk'];
						$qtypsn = $data1['jumlah_produk'];

						$sql2 = "UPDATE tb_dataproduk SET stok=stok+'$qtypsn' WHERE id_produk='$idbrg'";
						$result2 = $mysqli->query($sql2);
					}
				}				
			}
		}
	}


	$sql = "SELECT * FROM tb_pelanggan WHERE username_pelanggan='$_POST[user_name]' AND password_pelanggan='$_POST[user_pass]'";
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	$data['totaldata'] = mysqli_num_rows($result);
	if($data['totaldata'] > 0){
			session_start();
			$_SESSION['iduser'] = $data['id_pelanggan'];
			$_SESSION['namauser'] = $data['nama_pelanggan'];
			$_SESSION['usernameuser'] = $data['username_pelanggan'];
			$_SESSION['passuser'] = $data['password_pelanggan'];
		
		}else{
		$_SESSION['iduser'] = "";
		$_SESSION['namauser'] = "";
		$_SESSION['usernameuser'] = "";
		$_SESSION['passuser'] = "";
		session_start();
		session_destroy();
	}

	echo json_encode($data, JSON_PRETTY_PRINT);

}elseif($module=='daftar'){
	
	$idprovinsi = $_POST['provinsi'];
	$idkabupaten = $_POST['kabupaten'];

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key:b196d8f774cfe20acfdb36858e9d020d"
			),
		));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		if($idprovinsi == $data['rajaongkir']['results'][$i]['province_id']){
			$namaprovinsi = $data['rajaongkir']['results'][$i]['province'];
		}
	}


	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$idprovinsi",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key:b196d8f774cfe20acfdb36858e9d020d"
			),
		));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
	}

	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		if($idkabupaten == $data['rajaongkir']['results'][$i]['city_id']){
			$namakabupaten = $data['rajaongkir']['results'][$i]['city_name'];
		}
	}


	$sql = "SELECT * FROM tb_pelanggan WHERE username_pelanggan='$_POST[username]'";
	$result = $mysqli->query($sql);
	$totdata = mysqli_num_rows($result);
	if($totdata > 0){
		$data['totaldata'] = "0";
	}else{

		$qryid="SELECT RIGHT(id_pelanggan,5) as id_pelanggan FROM tb_pelanggan ORDER BY id_pelanggan DESC LIMIT 1";
		$resultid = $mysqli->query($qryid);
		$jumdataid = mysqli_num_rows($resultid);

		if($jumdataid == 0) {
			$idpengguna = "PLG-00001";
		}else {
			$row=$resultid->fetch_assoc();
			$kdfaktur = $row['id_pelanggan'];

			$idmax = $kdfaktur;
			$idmax++;
			if($idmax < 10){
				$idpengguna = "PLG-0000".$idmax;
			}else if($idmax < 100){
				$idpengguna = "PLG-000".$idmax;
			}else if($idmax < 1000){
				$idpengguna = "PLG-00".$idmax;
			}else if($idmax < 10000){
				$idpengguna = "PLG-0".$idmax;
			}else {
				$idpengguna = "PLG-".$idmax;
			}
		}


			$sql = "INSERT INTO tb_pelanggan VALUES ('$idpengguna','$_POST[nama]','$_POST[notelp]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[alamat]','$_POST[provinsi]','$namaprovinsi','$_POST[kabupaten]','$namakabupaten','$_POST[bank]','$_POST[rek]')";
			$result = $mysqli->query($sql);

			$data['totaldata'] = "1";
		
	}

	echo json_encode($data, JSON_PRETTY_PRINT);


}elseif ($module=='ubahprofil'){
	
	session_start();
	
	$idprovinsi = $_POST['provinsi'];
	$idkabupaten = $_POST['kabupaten'];

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key:b196d8f774cfe20acfdb36858e9d020d"
			),
		));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		if($idprovinsi == $data['rajaongkir']['results'][$i]['province_id']){
			$namaprovinsi = $data['rajaongkir']['results'][$i]['province'];
		}
	}


	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$idprovinsi",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key:b196d8f774cfe20acfdb36858e9d020d"
			),
		));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
	}

	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		if($idkabupaten == $data['rajaongkir']['results'][$i]['city_id']){
			$namakabupaten = $data['rajaongkir']['results'][$i]['city_name'];
		}
	}

	$sql = "SELECT * FROM tb_pelanggan WHERE username_pelanggan='$_SESSION[usernameuser]' AND id_pelanggan!='$_POST[idpel]'";
	$result = $mysqli->query($sql);
	$data['totaldata'] = mysqli_num_rows($result);
	if($data['totaldata'] > 0){

	}
	else{
		$sql2 = "UPDATE tb_pelanggan SET nama_pelanggan='$_POST[nama]', telp_pelanggan='$_POST[telp]', email_pelanggan='$_POST[email]', alamat_pelanggan='$_POST[alamat]', id_provinsi='$_POST[provinsi]', nama_prov='$namaprovinsi', id_kabupaten='$_POST[kabupaten]', nama_kab='$namakabupaten' WHERE id_pelanggan='$_POST[idpel]'";
		$result2 = $mysqli->query($sql2);

	}
	
	$_SESSION['namauser'] = $_POST['nama'];

	echo json_encode($data, JSON_PRETTY_PRINT);

}elseif ($module=='ubahbank'){
	

	$sql = "SELECT * FROM tb_pelanggan WHERE username_pelanggan='$_SESSION[usernameuser]' AND id_pelanggan!='$_POST[idpel]'";
	$result = $mysqli->query($sql);
	$data['totaldata'] = mysqli_num_rows($result);
	if($data['totaldata'] > 0){

	}
	else{
		$sql2 = "UPDATE tb_pelanggan SET bank='$_POST[nm_bank]', rekening='$_POST[rek]' WHERE id_pelanggan='$_POST[idpel]'";
		$result2 = $mysqli->query($sql2);

	}

	echo json_encode($data, JSON_PRETTY_PRINT);

}elseif ($module=='ubahpass'){
	
	session_start();

	$sql = "SELECT * FROM tb_pelanggan WHERE username_pelanggan='$_SESSION[usernameuser]' AND id_pelanggan!='$_POST[idpel]'";
	$result = $mysqli->query($sql);
	$data['totaldata'] = mysqli_num_rows($result);
	if($data['totaldata'] > 0){

	}
	else{
		$sql2 = "UPDATE tb_pelanggan SET username_pelanggan='$_POST[username]', password_pelanggan='$_POST[password]' WHERE id_pelanggan='$_POST[idpel]'";
		$result2 = $mysqli->query($sql2);

	}
		$_SESSION['usernameuser'] 	= $_POST['username'];
		$_SESSION['passuser'] 		= $_POST['password'];

	echo json_encode($data, JSON_PRETTY_PRINT);

}elseif ($module=='logout'){
	
	session_start();

	unset($_SESSION['iduser']);
	unset($_SESSION['namauser']);
	unset($_SESSION['usernameuser']);
	unset($_SESSION['passuser']);

	header('refresh:0;url=index.php?hal=home');

}elseif ($module=='addtemp'){
	$jumlah   = $_POST['jml'];
	session_start();
	
	if ($jumlah==0){
		$jumlah=1;
	}else{
		$jumlah   = $_POST['jml'];
	}
	$sql = "SELECT * FROM tb_keranjang WHERE id_produk='$_GET[idbarang]' AND id_pelanggan='$_SESSION[iduser]'";
	$result = $mysqli->query($sql);
	$tottemp = mysqli_num_rows($result);
	if($tottemp > 0){

	}else{
		$sql = "INSERT INTO tb_keranjang (id_produk, id_pelanggan, jumlah_produk) VALUES ('$_GET[idbarang]','$_SESSION[iduser]','$jumlah')";
		$result = $mysqli->query($sql);
		
	}
	header('Location:index.php?hal=keranjang');

}elseif ($module=='updatetemp'){

	$id       = $_POST['id'];
	$jml_data = count($id);
	$jumlah   = $_POST['jml'];
	$stok   = $_POST['stok'];

	$tstok = 0;
	$cekerror = 0;
	for ($i=1; $i <= $jml_data; $i++){
		if($jumlah[$i] == 0){
			$cekerror = $cekerror + 1;
		}
		elseif($jumlah[$i] > $stok[$i]){
			$cekerror = $cekerror + 2;
			$tstok = $stok[$i];
		}
		else {
			
			$cekerror = $cekerror + 0;
			$sql = "UPDATE tb_keranjang SET jumlah_produk = '$jumlah[$i]' WHERE id_keranjang = '$id[$i]'";
			$result = $mysqli->query($sql);
			
		}
	}

	if($cekerror==0){
		header('Location:index.php?hal=keranjang');	
	}elseif($cekerror==1){
		echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');
		window.location=('index.php?hal=keranjang')</script>";
	}elseif($cekerror==2){
		echo "<script>window.alert('Pemesanan Anda melebihi stok yang ada, stok hanya $tstok!');
		window.location=('index.php?hal=keranjang')</script>";
	}

}elseif ($module=='deletetemp'){

	$sql = "DELETE FROM tb_keranjang WHERE id_keranjang='$_GET[idtemp]'";
	$result = $mysqli->query($sql);

	header('Location:index.php?hal=keranjang');	

}elseif ($module=='saveorder'){

	session_start();

	$idprovinsi = $_POST['provinsi'];
	$idkabupaten = $_POST['kabupaten'];
	$kurir = $_POST['kurir'];
	$layan = $_POST['layan'];
	$hongkir = $_POST['hongkir'];

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key:b196d8f774cfe20acfdb36858e9d020d"
			),
		));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		if($idprovinsi == $data['rajaongkir']['results'][$i]['province_id']){
			$namaprovinsi = $data['rajaongkir']['results'][$i]['province'];
		}
	}


	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$idprovinsi",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key:b196d8f774cfe20acfdb36858e9d020d"
			),
		));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
	}

	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		if($idkabupaten == $data['rajaongkir']['results'][$i]['city_id']){
			$namakabupaten = $data['rajaongkir']['results'][$i]['city_name'];
		}
	}

	$sql = "INSERT INTO tb_pesanan VALUES ('$_POST[idpesan]','$_SESSION[iduser]','$tglkrgfull','$idprovinsi','$namaprovinsi','$idkabupaten','$namakabupaten','$kurir','$layan','$_POST[berat]','$_POST[subtotal]','$hongkir','$_POST[grtotal]','Pesan','0')";
	$result = $mysqli->query($sql);

	$qrydt="SELECT * FROM tb_keranjang a INNER JOIN tb_dataproduk b USING(id_produk) WHERE a.id_pelanggan='$_SESSION[iduser]'";
	$resultdt = $mysqli->query($qrydt);
	$jumdt = mysqli_num_rows($resultdt);

	if($jumdt == 0) {
	}else {
		while ($data = $resultdt->fetch_assoc()) {
			$idbrg = $data['id_produk'];
			$hargabrg = $data['harga'];
			$qtytemp = $data['jumlah_produk'];
			$subtot = $hargabrg * $qtytemp;

			$sql1 = "UPDATE tb_dataproduk SET stok=stok-'$qtytemp' WHERE id_produk='$idbrg'";
			$result1 = $mysqli->query($sql1);

			$sql2 = "INSERT INTO tb_detail (id_produk, id_pemesanan, harga_pesanan, jumlah_produk, sub_total) VALUES ('$idbrg','$_POST[idpesan]','$hargabrg','$qtytemp','$subtot')";
			$result2 = $mysqli->query($sql2);
		}
	}

	$sql3 = "DELETE FROM tb_keranjang WHERE id_pelanggan='$_SESSION[iduser]'";
	$result3 = $mysqli->query($sql3);

	$data['idpesan'] = $_POST['idpesan'];

	echo json_encode($data,JSON_PRETTY_PRINT);

}elseif ($module=='bayar'){
	
	$txtgambar 	= $_FILES['gambar']['name'];

	if($txtgambar!=""){
		$data['totaldata'] = "1";
		$random_digit = rand(0000,9999);
		$new_file = "bukti_".$_POST['idorder']."_".$random_digit.".jpg";
		$phono_path = $_FILES['gambar']['tmp_name'];
		$directory = "image/bukti/".$new_file;
		move_uploaded_file($phono_path,$directory);

		$sql = "INSERT INTO tb_pembayaran (id_pemesanan, tanggal_pembayaran,bukti_transfer, status_pembayaran, read_pembayaran) VALUES ('$_POST[idorder]','$tglkrg','$new_file','Terima','0')";
		$result = $mysqli->query($sql);

		$sql2 = "UPDATE tb_pesanan SET status_pemesanan='Bayar' WHERE id_pemesanan='$_POST[idorder]'";
		$result2 = $mysqli->query($sql2);

	}else{
		$data['totaldata'] = "0";
		$new_file = "-";
	}

	echo json_encode($data, JSON_PRETTY_PRINT);

}
elseif ($module=='updatestatus'){

	session_start();
	$sql = "UPDATE tb_pemesanan SET read_pemesanan = '0' WHERE id_pengguna = '$_SESSION[iduser]' AND read_pemesanan='1'";
	$result = $mysqli->query($sql);

	header("Location:index.php?hal=listorder");

}
elseif ($module=='updateterima'){

	session_start();
	$sql = "UPDATE tb_pesanan SET status_pemesanan = 'Terima' WHERE id_pemesanan = '$_GET[id]'";
	$result = $mysqli->query($sql);

	echo "<script>window.alert('Barang sudah diterima!');
	window.location=('index.php?hal=listorder')</script>";

}elseif ($module=='cariberdasarkan'){
	
	
	$min=$_POST['min_price'];
	$max=$_POST['max_price'];
	$f_ukuran 	= $_POST['size'];
	$f_warna	= $_POST['warna'];

	if(($f_ukuran=="0")&&($f_warna=="0")&&($min=="0")&&($max=="0")){ 
		echo "<script>window.location=('index.php?hal=produk')</script>";
	}else{
		echo "<script>window.location=('index.php?hal=produk&min_price=$min&max_price=$max&idsize=$f_ukuran&idwarna=$f_warna')</script>";
	}
}
?>
