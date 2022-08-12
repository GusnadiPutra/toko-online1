
<!-- slider-section-start -->
<section class="slider-main-area">
            <div class="main-slider an-si">
                <div class="bend niceties preview-2 hm-ver-1">
                    <div id="ensign-nivoslider-2" class="slides">	
                        <img src="slide1.jpg" alt="" title="#slider-direction-1"  />
                        <img src="slide2.jpg" alt="" title="#slider-direction-2"  />
                        <img src="slide3.jpg" alt="" title="#slider-direction-3"  />
                    </div>
                    <!-- direction 1 -->
                    <div id="slider-direction-1" class="t-cn slider-direction Builder">
                        <div class="slide-all">
                            
                        </div>
                    </div>
                    <div id="slider-direction-2" class="t-cn slider-direction Builder">
                        <div class="slide-all slide2">
                           
                        </div>
                    </div>
                    <div id="slider-direction-3" class="t-cn slider-direction Builder">
                        <div class="slide-all slide3">
                            
                        </div>
                    </div>
			    </div>
            </div>
        </section>
		<!-- slider section end -->
        
        <!-- new-products section start -->
		<section class="featured-products single-products section-padding-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="section-title">
							<h3>PRODUCTS</h3>
							<div class="section-icon">
                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            </div>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-xs-12">
						<div class="product-tab nav nav-tabs">
							<ul>                                        
								<li class="active"><a data-toggle="tab" href="#allproduk">All Products</a></li>
                        <?php
                            $qryjenis = "SELECT * FROM tb_kategori ORDER BY id_kategori ASC";
                            $resultjenis = $mysqli->query($qryjenis);
                            while ($rowjenis = $resultjenis->fetch_assoc()) {
                        ?>
								<li><a data-toggle="tab" href="#<?php echo $rowjenis['nama_kategori']; ?>"><?php echo $rowjenis['nama_kategori']; ?></a></li>
                        <?php
                            }
                        ?>
							</ul>
						</div>
					</div>
				</div>

                
                <div class="row tab-content">
					<div class="tab-pane  fade in active" id="allproduk">
						<div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
                        <?php
                        $qry = "SELECT * FROM tb_dataproduk ORDER BY nama_produk ";
                        $resultjenis = $mysqli->query($qry);
                            while ($row = $resultjenis->fetch_assoc()) {
                                $idbarang = $row['id_produk'];
                                $namabarang = $row['nama_produk'];
                                $berat = $row['berat'];
                                $harga = $row['harga'];
                                $stokbrg = $row['stok'];
                                $deskripsi = $row['deskripsi'];
                                $upgambar = $row['gambar'];
                                $stok       = $row['stok'];
                    ?>
							<div class="col-xs-12">
								<div class="single-product">
                                    <div class="product-img">
                                    <?php if($stok==0){
                                                                    ?>
                                                                <div class="pro-type">
                                                                    <span>sold out</span>
                                                                </div>
                                                                <?php }else{
                                                                    ?>
                                                                    <div class="pro-type">
                                                                        
                                                                    </div>
                                                                <?php } ?>
                                        <a href="#">
                                            <img src="image/barang/<?php echo $upgambar;?>" alt="Product Title" /> 
                                            <img class="secondary-image" alt="Product Title" src="image/barang/<?php echo $upgambar;?>">   
                                        </a>
                                    </div>
                                    <div class="product-dsc">
                                        <h3><a href="#"><?php echo $namabarang; ?></a></h3>
                                        <div class="star-price">
                                            <span class="price-left"><?php echo "Rp.".number_format($harga, 2, ',','.'); ?></span>
                                            <span class="star-right">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="actions-btn">
                                                                <a data-original-title="Lihat Detail" data-toggle="modal" data-trigger="hover" data-target="#quick-view" data-placement="top" href="#" class="detail-record las4" data-id="<?php echo $idbarang;?>"><i class="fa fa-eye"></i></a>
                                                                <?php if($stok==0){
                                                                    ?>
                                                                <?php }else{ ?>
                                                                <a href="aksi.php?module=addtemp&idbarang=<?php echo $idbarang;?>" data-toggle="tooltip" data-placement="top" title="Tambah Keranjang"><i class="fa fa-shopping-cart"></i></a>
                                                                <?php } ?>
                                                            </div>
                                </div>
							</div>
                            <?php } ?>
						</div>
                    </div>	
               
					<!-- all shop product end -->

                    <?php
                    
                        $qry = "SELECT * FROM tb_dataproduk INNER JOIN tb_kategori WHERE tb_dataproduk.id_kategori=tb_kategori.id_kategori AND tb_dataproduk.stok>0 ORDER BY tb_dataproduk.id_kategori ASC";
                        $resultjenis = $mysqli->query($qry);
                        $cek = mysqli_num_rows($resultjenis);
                        if($cek>0){
                                while ($row = $resultjenis->fetch_assoc()) {
                                $idbarang = $row['id_produk'];
                                $namakat = $row['nama_kategori'];
                                $namabarang = $row['nama_produk'];
                                $berat = $row['berat'];
                                $harga = $row['harga'];
                                $stokbrg = $row['stok'];
                                $deskripsi = $row['deskripsi'];
                                $upgambar = $row['gambar'];
                                
                    ?>
					<div class="tab-pane  fade in" id="<?php echo $namakat; ?>">
						<div id="tab-carousel-2" class="owl-carousel product-slider owl-theme">
							<div class="col-xs-12">
								<div class="single-product">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="image/barang/<?php echo $upgambar;?>" alt="Product Title" /> 
                                            <img class="secondary-image" alt="Product Title" src="image/barang/<?php echo $upgambar;?>">   
                                        </a>
                                    </div>
                                    <div class="product-dsc">
                                        <h3><a href="#"><?php echo $namabarang; ?></a></h3>
                                        <div class="star-price">
                                            <span class="price-left"><?php echo "Rp.".number_format($harga, 2, ',','.'); ?></span>
                                        </div>
                                    </div>
                                    <div class="actions-btn">
                                        <a data-placement="top" data-target="#quick-view" data-trigger="hover" data-toggle="modal" class="detail-record las4" data-id="<?php echo $idbarang;?>" data-original-title="Quick View"><i class="fa fa-eye"></i></a>
                                        <a href="aksi.php?module=addtemp&idbarang=<?php echo $idbarang;?>" data-toggle="tooltip" data-placement="top" title="Tambah Keranjang"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
							</div>
						</div>
                    </div>
                    <?php 
                        }
                    }
                    ?>
                </div>
			</div>
		</section>
        <br>
        <br>
		<!-- new-products section end -->
    <!-- quick view start -->
    <div class="quick-view modal fade in" id="quick-view">
        <div class="container">
            <div class="row">
                <div id="view-gallery" class="owl-carousel product-slider owl-theme">
                    <div class="modal-body">
                        <!-- single-product item end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- quick view end -->

<script src="js/jquery-1.9.1.min.js"></script>

<script>
    $(function() {
        $(document).on('click', '.detail-record', function(e) {
            e.preventDefault();
            $("#quick-view").modal('show');
            $.post('datadetail.php', {
                id: $(this).attr('data-id')
            },
            function(html) {
                $(".modal-body").html(html);
            }
            );
        });
    });
</script>