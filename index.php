<!doctype html>
<html class="no-js" lang="">
<?php
    include "koneksi.php";
    session_start();
?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Happy Shopping Satu</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="logo satu.png" >
		<!-- google fonts -->
		<link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="css/pe-icon-7-stroke.min.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!-- Image Zoom CSS
		============================================ -->
        <link rel="stylesheet" href="css/img-zoom/jquery.simpleLens.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="lib/css/nivo-slider.css" type="text/css" />
		<link rel="stylesheet" href="lib/css/preview.css" type="text/css" media="screen" />
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr css -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <script src="assets/front/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
        <script src="assets/js/jquery.mask.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- header section start -->
		<header>
			<div class="header-top" >
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-4">
							<div class="left-header clearfix">
								<ul>
                                    <li><p><i class="fa fa-phone" aria-hidden="true"></i>(+62) 95325701601</p></li>
									<li class="hd-none"><p><i class="fa fa-clock-o" aria-hidden="true"></i>Mon-fri : 9:00-19:00</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-6 col-sm-8">
							<div class="right-header">
                            <?php 
                                if (isset($_SESSION['usernameuser'])&&(isset($_SESSION['passuser']))) {
                                    $usernameuser=$_SESSION['usernameuser'];

                                    $qryinfo = "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '$_SESSION[iduser]' ";
                                    $resultinfo = $mysqli->query($qryinfo);
                                    $juminfo = mysqli_num_rows($resultinfo);

                                    ?>
                                    <ul>
                                        <li>
                                            <a href="#"> Hi, <?php echo $_SESSION['namauser'];?>

                                                <ul class="drop-cart">
                                                    <li><a href="index.php?hal=listorder">Pesanan Saya<div class="pull-right"></li>
                                                    <li><a href="index.php?hal=account">Profil Saya</a></li>
                                                    <li>
                                                        <br><a href="aksi.php?module=logout">Logout</a><br>
                                                    </li>
                                                    <li>

                                                    </li>
                                                </ul>
                                            </a>
                                        </li>
                                    </ul>
                            <?php
                                }else{
                            ?>
								<ul>
									<li ><a href="?hal=daftar"><i class="fa fa-book" style="color: #000;"></i>Register</a></li>
									<li><a href="?hal=login"><i class="fa fa-lock" style="color: #000;"></i>Login</a></li>
								</ul>
                            <?php 
                                } 
                            ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom header-bottom-one" id="sticky-menu" >
				<div class="container relative">
					<div class="row">
						<div class="col-sm-2 col-md-2 col-xs-6">
							<div class="logo">
								<a href="index.php"><img src="logo satu.png" width="60%"  alt="" /></a>
							</div>
						</div>
						<div class="col-sm-10 col-md-10 col-xs-10 static">
							<div class="all-manu-area">
							    <div class="mainmenu clearfix hidden-sm hidden-xs" >
                                    <nav>
                                        <ul>
                                            <li><a href="?hal=home" style="color: #000">Home</a></li>
                                            <li><a href="?hal=produk" style="color: #000">Produk</a></li>
                                            <li><a href="?hal=panduan" style="color: #000">Panduan Belanja</a></li>
                                            <li><a href="?hal=tentang" style="color: #000">Tentang Kami</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- mobile menu start -->
                                <div class="mobile-menu-area hidden-lg hidden-md">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul>
                                                <li><a href="?hal=home" style="color: #000">Home</a></li>
                                                <li><a href="?hal=produk" style="color: #000">Produk</a></li>
                                                <li><a href="?hal=panduan" style="color: #000">Panduan Belanja</a></li>
                                                <li><a href="?hal=tentang" style="color: #000">Tentang Kami</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <!-- mobile menu end -->
                                <div class="right-header re-right-header">
                                    <ul>
                                    <!--
                                        <li class="re-icon tnm"><i class="fa fa-search" aria-hidden="true"></i>
                                        
                                            <form method="get" id="searchform" action="">
                                                <input type="text" value="" name="" id="" placeholder="Search product..." />
                                                <button type=""><i class=""></i></button>
                                            </form>
                                        
                                        </li>
                                        -->
                                        <?php
                                            if (isset($_SESSION['usernameuser'])&&(isset($_SESSION['passuser']))) {
                                            $idksm = $_SESSION['iduser'];
                                            $sqlkeranjang = "SELECT * FROM tb_keranjang a INNER JOIN tb_dataproduk b USING(id_produk) WHERE a.id_pelanggan='$idksm' ORDER By id_keranjang DESC";
                                            $resultkeranjang = $mysqli->query($sqlkeranjang);
                                            $jumdatakeranjang = mysqli_num_rows($resultkeranjang);
                                        ?>
                                        <li><a href="?hal=keranjang"><i class="fa fa-shopping-cart"></i><span class="color1"><?php echo $jumdatakeranjang; ?></span></a>
                                            <ul class="drop-cart">
                                            
                                                <?php
                                                    $idksm = $_SESSION['iduser'];
                                                    $totalsub=0;
                                                    $sqlkeranjang = "SELECT * FROM tb_keranjang a INNER JOIN tb_dataproduk b USING(id_produk) WHERE a.id_pelanggan='$idksm' ORDER By id_keranjang DESC";
                                                    $resultkeranjang = $mysqli->query($sqlkeranjang);
                                                    while ($rowkeranjang = $resultkeranjang->fetch_assoc()) {
                                                        $hargabrg = $rowkeranjang['harga'];
                                                        $jumlah_produk = $rowkeranjang['jumlah_produk'];
                                                        $subtot = $hargabrg * $jumlah_produk;
                                                        $totalsub = $totalsub + $subtot;
                                                ?>
                                                <li>
                                                    <a href="#"><img src="image/barang/<?php echo $rowkeranjang['gambar']; ?>" style="width:25%;" alt="" /></a>
                                                    <div class="add-cart-text">
                                                        <p><a href="#"><?php echo $rowkeranjang['nama_produk']; ?></a></p>
                                                        <span><?php echo $rowkeranjang['jumlah_produk']." barang X ".number_format($rowkeranjang['harga'], 0, ',','.'); ?></span>
                                                        <span>Berat : <?php echo $rowkeranjang['berat']; ?></span>
                                                    </div>
                                                </li>
                                                <?php } ?>

                                                
                                                <li class="total-amount clearfix">
                                                    <span class="floatleft">Total</span>
                                                    <span class="floatright"><strong>= <?php echo "Rp.".number_format($totalsub, 0, ',','.'); ?></strong></span>
                                                </li>
                                                <li>
                                                    <div class="goto text-center">
                                                        <a href="?hal=keranjang"><strong>Lihat Keranjang<i class="pe-7s-angle-right"></i></strong></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                            }else{
                                                ?>
                                                <li><a href="?hal=keranjang"><i class="fa fa-shopping-cart"></i><span class="color1"></span></a>
                                            <?php
                                            }
                                        ?>
                                    </ul>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
        <!-- header section end -->

		<?php
        
        if(!isset($_GET['hal'])){
            if (isset($_SESSION['iduser'])&&(isset($_SESSION['passuser']))){
                include "home.php";
            } else{
                include "home.php";
            } 
        }else{
            include "konten.php";
        }    
        ?> 
        
			<!-- footer-bottom area start -->
			<div class="footer-bottom" style="margin-top:100px;">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<p>&copy; 2021 Happy Shopping Satu</p>
						</div>
					</div>
				</div>
			</div>
			<!-- footer-bottom area end -->
		</footer>
        <!-- footer section end -->

        <script type="text/javascript">
        $(document).ready(function(){
          $( '.uang' ).mask('000,000,000,000,000', {reverse: true});
      })

        function rubahuang(angka){
           var reverse = angka.toString().split('').reverse().join(''),
           ribuan = reverse.match(/\d{1,3}/g);
           ribuan = ribuan.join(',').split('').reverse().join('');
           return ribuan;
       }
   </script>

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
        
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- parallax js -->
        <script src="js/parallax.min.js"></script>
		<!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Img Zoom js -->
		<script src="js/img-zoom/jquery.simpleLens.min.js"></script>
		<!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- jquery.countdown js -->
        <script src="js/jquery.countdown.min.js"></script>
		<!-- Nivo slider js
		============================================ --> 		
		<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="lib/home.js" type="text/javascript"></script>
		<!-- jquery-ui js -->
        <script src="js/jquery-ui.min.js"></script>
		<!-- sticky js -->
        <script src="js/sticky.js"></script>
		<!-- plugins js -->
        <script src="js/plugins.js"></script>
		<!-- main js -->
        <script src="js/main.js"></script>
    </body>
</html>
