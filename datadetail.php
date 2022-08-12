<?php 
include "koneksi.php";

if(isset($_POST['id'])){
$id = $_POST['id'];

$qrydt="SELECT * FROM tb_dataproduk INNER JOIN tb_kategori USING(id_kategori) WHERE id_produk='$id'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $row=$resultdt->fetch_assoc();
    $idbarang = $row['id_produk'];
    $namakat = $row['nama_kategori'];
    $namabarang = $row['nama_produk'];
    $berat = $row['berat'];
    $harga = $row['harga'];
    $stokbrg = $row['stok'];
    $deskripsi = $row['deskripsi'];
    $upgambar = $row['gambar'];
}

?>

<!-- quick view start -->
<div class="col-xs-12">
	<div class="d-table">
		<div class="d-tablecell">
			<div class="modal-dialog">
				<div class="main-view modal-content">
					<div class="modal-footer" data-dismiss="modal">
						<span>x</span>
					</div>
						<div class="row">
							<div class="col-xs-12 col-sm-5">
								<div class="quick-image">
									<div class="single-quick-image tab-content text-center">
										<div class="tab-pane  fade in active" id="sin-pro-1">
											<img src="image/barang/<?php echo $upgambar;?>" alt="" />
										</div>
															
									</div>
								</div>							
							</div>
							
                            <div class="col-xs-12 col-sm-7">
								<div class="quick-right">
									<div class="quick-right-text">
										<h3><strong><?php echo $namabarang;?></strong></h3>
											<div class="amount">
												<h4><?php echo "Rp. ".number_format($harga, 2, ',','.'); ?></h4>
											</div>
											<p><?php echo $deskripsi;?></p>
											<?php 
											if($stokbrg==0){
											}else{
											?>			
												<div class="dse-btn">
													<div class="row">
														<div class="col-sm-12 col-md-6">
                                                            <div class="col-sm-6">
                                                                <div class="por-dse clearfix">
                                                                    <ul>
                                                                        <li class="share-btn qty clearfix"><span>Quantity</span>
                                                                            <form action="aksi.php" method="POST">
                                                                                <div class="plus-minus">
                                                                                    <input type="number" value="1" id="jml" name="jml"  required class="form-control col"  style="width:80px; height:40px;">
                                                                                </div>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>       
                                                            
                                                            <div class="col-sm-6">
																<div class="por-dse add-to">
                                                                    <a href="aksi.php?module=addtemp&idbarang=<?php echo $idbarang;?>" data-toggle="tooltip" data-placement="top" style="width:120px; height:40px; margin-top:30px;">Add to cart</a>
																</div>
															</div>
																
														</div>
													</div>
												</div>
											<?php } ?>
									</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- quick view end -->

<?php } ?>

<script type="text/javascript">

    $( document ).ready(function() {
        $('#jml').change(function(){
 
        var jumlah = $('#jml').val();
        
        $.ajax({
        type : 'POST',
        url : 'aksi.php',
        data : 'jumlah_produk =' + jumlah,
        success: function (data) { }
        });
	});
</script>