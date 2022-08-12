<?php
 $asal = $_POST['asal'];
 $id_kabupaten = $_POST['kab_id'];
 $kurir = $_POST['kurir'];
 $berat = $_POST['berat'];
 $layanan = $_POST['layanan'];
 
 $curl = curl_init();
 curl_setopt_array($curl, array(
 CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
 CURLOPT_HTTPHEADER => array(
 "content-type: application/x-www-form-urlencoded",
 "key:b196d8f774cfe20acfdb36858e9d020d"
 ),
 ));
 $response = curl_exec($curl);
 $err = curl_error($curl);
 curl_close($curl);
 if ($err) {
 echo "cURL Error #:" . $err;
 } else {
 $data = json_decode($response, true);
 }
 ?>
 <?php
 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
 	if($data['rajaongkir']['results'][$k]['costs'][$l]['service'] == $layanan){
 		$clayan = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
 		$charga = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
 	}
}
}
$data = array(
            'clayan'      =>  $clayan,
            'charga'      =>  $charga);
 echo json_encode($data);
 ?>