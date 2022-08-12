<?php
session_start();
include "../koneksi.php";

$cekawal = $_GET['cekawal'];
$daritgl = $_GET['daritgl'];
$sampetgl = $_GET['sampetgl'];

$sqlord = "SELECT * FROM (tb_pesanan a INNER JOIN (tb_detail c INNER JOIN tb_dataproduk d USING(id_produk)) USING(id_pemesanan)) 
			INNER JOIN tb_pelanggan b ON a.id_pelanggan=b.id_pelanggan 
			WHERE date(a.tgl_pemesanan) 
			BETWEEN '2021-04-01' AND '2021-04-28' AND b.id_pelanggan='PLG-00001' 
			AND (status_pemesanan='Konfirmasi' OR status_pemesanan='Kirim' OR status_pemesanan='Terima') 
			ORDER BY id_pemesanan ASC";
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


	$judul = "LAPORAN DATA PENJUALAN" ;
	$header = array (
		array("label"=>"No", "length"=>10, "align"=>"C"),
		array("label"=>"ID", "length"=>30, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>22, "align"=>"C"),
		array("label"=>"Pembeli", "length"=>55, "align"=>"C"),
		array("label"=>"Nama Barang", "length"=>70, "align"=>"C"),
		array("label"=>"Harga", "length"=>30, "align"=>"C"),
		array("label"=>"Qty", "length"=>30, "align"=>"C"),
		array("label"=>"Total", "length"=>40, "align"=>"C"),
		array("label"=>"Status", "length"=>30, "align"=>"C"));
	require("../fpdf/fpdf.php");

	$pdf = new FPDF('L','mm',array(210,337));
	$pdf->AddPage();
	$pdf->image($file='logo.jpg' ,$x='10',$y='10',$w=80,$h=25,$type='jpg',$link='logo.jpg');
	$pdf->SetFont('Times','B','18');
	$pdf->Ln();
	$pdf->Cell(0,5, '', '0', 1, 'C');
	$pdf->Cell(0,5, 'Happy Shopping Satu', '0', 1, 'C');
	$pdf->SetFont('Times','B','12');
	$pdf->Cell(0,7, 'Thamrin, Lantai 3a Blok H15 No. 06, Jakarta Pusat Tanah Abang, DKI Jakarta', '0', 1, 'C');
	$pdf->SetLineWidth(1);
	$pdf->SetLineWidth(1);
	$pdf->Line(10,35,327,35);
	$pdf->SetLineWidth(0);
	$pdf->Line(10,36,327,36);
	$pdf->Ln();
	$pdf->SetFont('Times','B','16');
	$pdf->Cell(0,20, $judul, '0', 1, 'C');
#buat header tabel
	$pdf->SetFont('Times','B','12');
	$pdf->Cell(0,8, 'Dari Tanggal : '.date('d-m-Y', strtotime($daritgl)), '0', 1, 'L');
	$pdf->Cell(0,8, 'Sampai Tanggal : '.date('d-m-Y', strtotime($sampetgl)), '0', 1, 'L');
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
		$hargabrg = $row['harga'];
		$qtypesan = $row['jumlah_produk'];
		$subtot = $row['sub_total'];
		$status = $row['status_pemesanan'];
		$totalall = $totalall + $subtot;

		$pdf->Cell(10,7, $no, 1, '0', 'C');
		$pdf->Cell(30,7, $idpesan, 1, '0', 'C');
		$pdf->Cell(22,7, date('d-m-Y', strtotime($tanggal)), 1, '0', 'C');
		$pdf->Cell(55,7, $namapbl, 1, '0', 'C');
		$pdf->Cell(70,7, $namabrg, 1, '0', 'C');
		$pdf->Cell(30,7, "Rp.".number_format($hargabrg, 2, ',','.'), 1, '0', 'R');
		$pdf->Cell(30,7, $qtypesan, 1, '0', 'C');
		$pdf->Cell(40,7, "Rp.".number_format($subtot, 2, ',','.'), 1, '0', 'L');
		$pdf->Cell(30,7, $status, 1, '0', 'C');

		$pdf->Ln();
	}
	$pdf->SetFont('Times','B','14');
	$pdf->Cell('247',9,'Total Penjualan' ,1,'0','C');
	$pdf->Cell('70',9,"Rp.".number_format($totalall, 2, ',','.') ,1,'0','L');
	$pdf->Ln();
	$pdf->Output();
}
?>
