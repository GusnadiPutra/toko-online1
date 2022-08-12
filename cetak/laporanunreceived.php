<?php
session_start();
include "../koneksi.php";

$cekawal = $_GET['cekawal'];
$daritgl = $_GET['daritgl'];
$sampetgl = $_GET['sampetgl'];

$sqlord = "SELECT * FROM tb_kirim INNER JOIN tb_pesanan a USING (id_pemesanan) 
			INNER JOIN (tb_detail c INNER JOIN tb_dataproduk d USING(id_produk)) USING (id_pemesanan) 
			INNER JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan 
			WHERE date(a.tgl_pemesanan) BETWEEN '$daritgl' AND '$sampetgl'
			AND (status_pemesanan='Kirim') 
			ORDER BY a.id_pemesanan ASC";
			
$resultord = $mysqli->query($sqlord);
$jumord = mysqli_num_rows($resultord);
$totjum = $jumord;

if($cekawal == "1"){

	$data = array(
		'totjum'      =>  $totjum,
		'daritgl'      =>  $daritgl,
		'sampetgl'      =>  $sampetgl);
	echo json_encode($data);

}elseif($cekawal == "0"){


	$judul = "LAPORAN NOT RECEIVED ORDER" ;
	$header = array (
		array("label"=>"No", "length"=>10, "align"=>"C"),
		array("label"=>"ID", "length"=>30, "align"=>"C"),
		array("label"=>"Tanggal Pesanan", "length"=>45, "align"=>"C"),
		array("label"=>"Pembeli", "length"=>61, "align"=>"C"),
		array("label"=>"Nama Barang", "length"=>61, "align"=>"C"),
		array("label"=>"Qty", "length"=>30, "align"=>"C"),
		array("label"=>"Tanggal Kirim", "length"=>45, "align"=>"C"),
		array("label"=>"Status", "length"=>35, "align"=>"C"));
	require("../fpdf/fpdf.php");

	$pdf = new FPDF('L','mm',array(210,337));
	$pdf->AddPage();
	$pdf->image($file='logo.jpg' ,$x='10',$y='10',$w=80,$h=25,$type='jpg',$link='logo.jpg');
	$pdf->SetFont('Times','B','24');
	$pdf->Cell(0,5, $judul, '0', 1, 'C');
	$pdf->SetFont('Times','B','18');
	$pdf->Cell(0,3, '', '0', 1, 'C');
	$pdf->Cell(0,7, 'Happy Shopping Satu', '0', 1, 'C');
	$pdf->SetFont('Times','B','18');
	$pdf->Cell(0,7, 'Periode '.date('d F Y', strtotime($daritgl)). ' - '.date('d F Y', strtotime($sampetgl)), '0', 1, 'C');
	$pdf->SetLineWidth(1);
	$pdf->SetLineWidth(1);
	$pdf->Line(10,35,327,35);
	$pdf->SetLineWidth(0);
	$pdf->Line(10,36,327,36);
	$pdf->Ln();
#buat header tabel
	
	$pdf->Ln();

	$pdf->SetFont('Times','B','12');
	$pdf->SetFillColor(230,230,230);
	foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 10, $kolom['label'], 1, '0', $kolom['align'], true);
	}
	$pdf->Ln();
#tampilkan data tabelnya
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('Times','','11');
	$fill=false;
	$no=0;
	$totalall = 0;
	while ($row = $resultord->fetch_assoc()) {
		$no++;
		$tanggal = $row['tgl_pemesanan'];
		$idpesan = $row['id_pemesanan'];
		$namapbl = $row['nama_pelanggan'];
		$namabrg = $row['nama_produk'];
		$qtypesan = $row['jumlah_produk'];
		$tgl_kirim = $row['tanggal_kirim'];
		$status = $row['status_pemesanan'];

		$pdf->Cell(10,7, $no, 1, '0', 'C');
		$pdf->Cell(30,7, $idpesan, 1, '0', 'C');
		$pdf->Cell(45,7, date('d-m-Y', strtotime($tanggal)), 1, '0', 'C');
		$pdf->Cell(61,7, $namapbl, 1, '0', 'C');
		$pdf->Cell(61,7, $namabrg, 1, '0', 'C');
		$pdf->Cell(30,7, $qtypesan, 1, '0', 'C');
		$pdf->Cell(45,7, $tgl_kirim, 1, '0', 'C');
		$pdf->Cell(35,7, $status, 1, '0', 'C');

		$pdf->Ln();
	}
	$pdf->SetFont('Times','B','14');
	$pdf->Ln();
	$pdf->Output();
}
?>
