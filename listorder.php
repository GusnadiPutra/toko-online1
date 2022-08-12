<?php
if (isset($_SESSION['usernameuser'])&&(isset($_SESSION['passuser']))) {

    ?>
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Pesanan Saya</h2>
                    <p><a href="#">Home</a> | Pesanan Saya</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section>
        <div class="container">
            <div class="checkout-area">   
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="cart-form table-responsive">
                                <table id="shopping-cart-table" class="data-table cart-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Grand Total</th>
                                            <th>Status</th>
                                            <th>No RESI</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php           
                                        $i=1;
                                        $sql = "SELECT * FROM tb_pesanan WHERE id_pelanggan='$_SESSION[iduser]' ORDER By id_pemesanan DESC";
                                        $result = $mysqli->query($sql);
                                        $jumdata = mysqli_num_rows($result);
                                        if($jumdata>0){
                                            while ($data = $result->fetch_assoc()) {
                                                $idpesanan = $data['id_pemesanan'];

                                                $sqlkrm = "SELECT * FROM tb_kirim WHERE id_pemesanan='$idpesanan'";
                                                $resultkrm = $mysqli->query($sqlkrm);
                                                $jumdatakrm = mysqli_num_rows($resultkrm);
                                                if($jumdatakrm>0){
                                                    $datakrm = $resultkrm->fetch_assoc();
                                                    $noresi = $datakrm['no_resi'];
                                                }else{
                                                    $noresi = "-";
                                                }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['id_pemesanan']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date('d-m-Y, H:i:s', strtotime($data['tgl_pemesanan'])); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "Rp.".number_format($data['total_bayar'], 2, ',','.'); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['status_pemesanan']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $noresi; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($data['status_pemesanan']=="Pesan"){
                                                            ?>
                                                            <a href="index.php?hal=myorder&id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-success btn-sm"><i class="fa fa-dollar" title="Detail"></i> Bayar</a>
                                                        <?php
                                                        }elseif($data['status_pemesanan']=="Kirim"){
                                                            ?>
                                                            <a href="aksi.php?module=updateterima&id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-success btn-sm"><i class="fa fa-check" title="Terima Barang"></i> Terima</a>
                                                            <a href="index.php?hal=myorder&id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-bars" title="Detail"></i> Detail</a>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <a href="index.php?hal=myorder&id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-bars" title="Detail"></i> Detail</a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
<br>

    <?php
}else{
    echo "<script>window.alert('You must login first!');
    window.location=('index.php?hal=login')</script>";
}
?>