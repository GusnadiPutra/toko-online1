<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Shop</h2>
                    <p><a href="#">Home</a> | shop</p>
                </div>
            </div>
        </div>
    </div>
</section>
		<!-- pages-title-end -->
        <section class="pages products-page section-padding-top">
			<div class="container">
				<div class="row">
                    <div class="col-md-4 col-lg-3 col-sm-12">
                        <div class="all-shop-sidebar" style="margin-top:9px;">
                            <div class="top-shop-sidebar">
                                <h3 class="wg-title">Categories</h3>
                            </div>
                            <div class="shop-one">
                                <ul class="product-categories">
                                    <li>
                                        <a href="?hal=produk">All Item</a>
                                    </li> 
                                <?php
                                    $qryjenis = "SELECT * FROM tb_kategori ORDER BY id_kategori ASC";
                                    $resultjenis = $mysqli->query($qryjenis);
                                    while ($rowjenis = $resultjenis->fetch_assoc()) {

                                ?>
                                
                                    <li>
                                        <a href="?hal=produk&id=<?php echo $rowjenis['id_kategori']; ?>"> <?php echo $rowjenis['nama_kategori']; ?></a>
                                    </li>
                                <?php 
                                } 
                                ?>
                                </ul>
                            </div>
<?php
$qryjenis = "SELECT MAX(harga) AS harga_tertinggi, MIN(harga) AS harga_terendah FROM tb_dataproduk";
$resultjenis = $mysqli->query($qryjenis);
while ($rowjenis = $resultjenis->fetch_assoc()) {
    $max=$rowjenis['harga_tertinggi'];
    $min=$rowjenis['harga_terendah'];
}

if(isset($_GET['idsize'])){
    $setfilter = $_GET['idsize'];
}else{
    $setfilter = "";
}

if(isset($_GET['idwarna'])){
    $setfilter1 = $_GET['idwarna'];
}else{
    $setfilter1 = "";
}







    ?>
                        </div>
                        <br>
                            <div class="shop-one re-shop-one">
                                <h3 class="wg-title2">Choose Price</h3>
                                <form id="formcari" data-parsley-validate class="form-horizontal form-label-left" action="aksi.php?module=cariberdasarkan" method="post" name="formcari" target="_self">
                                    <div class="widget shop-filter">
                                        <div class="info_widget">
                                            <div class="price_filter">
                                                <div id="slider-range"></div>
                                                    <div id="amount">
                                                        <input type="text" name="first_price" class="first_price" />
                                                        <input type="text" name="last_price" class="last_price"/>
                                                    </div>
                                                    <div class="form-price-range-filter">
                <input type="" id="min" name="min_price"
                    value="<?php echo $min; ?>">
                <div id="slider-range"></div>
                <input type="" id="max" name="max_price"
                    value="<?php echo $max; ?>">
            </div>
                                                    <div>
                                                        <h3 class="wg-title2">Choose Size</h3>
                                                        <select class="form-control" id="size" name="size">
                                                            <option value="0">-- Choose Size --</option>
                                                            <option value="S" <?php if($setfilter=="S"){ echo "selected";}?> >S</option>
                                                            <option value="M" <?php if($setfilter=="M"){ echo "selected";}?> >M</option>
                                                            <option value="L" <?php if($setfilter=="L"){ echo "selected";}?> >L</option>
                                                            <option value="XL" <?php if($setfilter=="XL"){ echo "selected";}?> >XL</option>
                                                            <option value="XXL" <?php if($setfilter=="XXL"){ echo "selected";}?> >XXL</option>
                                                        </select>
                                                    </div>

                                                <br><div>
                                                        <h3 class="wg-title2">Choose Color</h3>
                                                        <select class="form-control" id="warna" name="warna">
                                                            <option value="0">-- Choose Color --</option>
                                                            <?php
                                                            $qryjenis = "SELECT DISTINCT warna FROM tb_dataproduk  ORDER BY warna ASC";
                                                            $resultjenis = $mysqli->query($qryjenis);
                                                            while ($rowjenis = $resultjenis->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $rowjenis['warna']; ?>" <?php if($setfilter1==$rowjenis['warna']){ echo "selected";} ?> ><?php echo $rowjenis['warna']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <br><div>
                                                        <input type="submit" name="submit" value="Filter Product" class="btn btn-success btn-sm">
                                                    </div>
                                                </div>
                                            </div>							
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <div class="col-md-8 col-lg-9 col-sm-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="features-tab">
                                  <!-- Nav tabs -->
                                    <div class="shop-all-tab"></div>
                                  <!-- Tab panes -->

                                    <div class="tab-content">
                                    
                                        <div role="tabpanel ">
                                            <div class="row">
                                                <div class="shop-tab">
                                                    <!-- single-product start -->
                                                    <?php
                                                    if (isset($_GET['id'])){
                                                        $idd=$_GET['id'];
                                                        
                                                        $qry = "SELECT * FROM tb_dataproduk INNER JOIN tb_kategori WHERE tb_dataproduk.id_kategori=tb_kategori.id_kategori AND tb_kategori.id_kategori='$idd' ORDER BY id_produk ASC";
                                                        $resultjenis = $mysqli->query($qry);
                                                        $cek = mysqli_num_rows($resultjenis);
                                                        
                                                        
                                                    
                                                        if($cek>0){
                                                            while ($row = $resultjenis->fetch_assoc()) {
                                                            $idbarang   = $row['id_produk'];
                                                            $namakat    = $row['nama_kategori'];
                                                            $namabarang = $row['nama_produk'];
                                                            $berat      = $row['berat'];
                                                            $harga      = $row['harga'];
                                                            $stokbrg    = $row['stok'];
                                                            $deskripsi  = $row['deskripsi'];
                                                            $upgambar   = $row['gambar'];
                                                            $stok       = $row['stok'];
                                                        
                                                                ?>
                                                                <div class="col-md-4 col-lg-4 col-sm-6">
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
                                                                                <img src="image/barang/<?php echo $upgambar; ?>" alt="Product Title" />
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-dsc">
                                                                            <h3><a href="#"><?php echo $namabarang; ?></a></h3>
                                                                            <div class="star-price">
                                                                                <span class="price-left"><?php echo "Rp.".number_format($harga, 2, ',','.');  ?></span>
                                                                                <span class="star-right">
                                                                                </span>
                                                                            </div>
                                                                        </div></br></br>
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
                                                    <?php
                                                            }
                                                        }
                                                    }else{

                                                        $qry = "SELECT * FROM tb_dataproduk INNER JOIN tb_kategori WHERE  ukuran='$setfilter' OR warna='$setfilter1' GROUP BY (id_produk) ORDER BY id_produk ASC";
                                                        $resultjenis = $mysqli->query($qry);
                                                        $cek = mysqli_num_rows($resultjenis);
                                                       
                                                                    while ($row = $resultjenis->fetch_assoc()) {
                                                                    $idbarang   = $row['id_produk'];
                                                                    $namakat    = $row['nama_kategori'];
                                                                    $namabarang = $row['nama_produk'];
                                                                    $berat      = $row['berat'];
                                                                    $harga      = $row['harga'];
                                                                    $stokbrg    = $row['stok'];
                                                                    $deskripsi  = $row['deskripsi'];
                                                                    $upgambar   = $row['gambar'];
                                                                    $stok       = $row['stok'];
                                                                
                                                    ?>
                                                    <div class="col-md-4 col-lg-4 col-sm-6">
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
                                                                    <img src="image/barang/<?php echo $upgambar; ?>" alt="Product Title" />
                                                                </a>
                                                            </div>
                                                            <div class="product-dsc">
                                                                <h3><a href="#"><?php echo $namabarang; ?></a></h3>
                                                                <div class="star-price">
                                                                    <span class="price-left"><?php echo "Rp.".number_format($harga, 2, ',','.');  ?></span>
                                                                    <span class="star-right">
                                                                    </span>
                                                                </div>
                                                            </div></br></br>
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
                                                    <?php
                                                        }       
                                                    
                                                }
                                                    
                                                
                                                ?>
                                                    <!-- single-product end -->	
                                                </div>
                                            </div>	
                                        </div>
                                    </div>
                                                </div>
                                            </div>	
                                        </div>
                                    </div>
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </section>

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