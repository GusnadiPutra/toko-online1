<?php
if (isset($_SESSION['usernameuser'])&&(isset($_SESSION['passuser']))) {

    $idpel = $_SESSION['iduser'];
    $id = $_GET['id'];
    $qrydt="SELECT * FROM tb_pesanan INNER JOIN tb_pelanggan USING(id_pelanggan) WHERE id_pemesanan='$id'";
    $resultdt = $mysqli->query($qrydt);
    $jumdt = mysqli_num_rows($resultdt);

    if($jumdt == 0) {
    }else {
        $rowcust=$resultdt->fetch_assoc();
        $nama = $rowcust['nama_pelanggan'];
        $tgl = $rowcust['tgl_pemesanan'];
        $emailcust = $rowcust['email_pelanggan'];
        $telpcust = $rowcust['telp_pelanggan'];
        $alamatpsn = $rowcust['alamat_pelanggan'];
        $provpsn = $rowcust['nama_provinsi'];
        $kabpsn = $rowcust['nama_kabupaten'];
        $namabank = $rowcust['bank'];
        $norekening = $rowcust['rekening'];
        $layananpsn = strtoupper($rowcust['kurir_layanan']);
        $layananharga = $rowcust['jenis_layanan'];
        $beratpsn = $rowcust['total_berat'];
        $hargapsn = $rowcust['total_harga'];
        $ongkirpsn = $rowcust['total_ongkir'];
        $grtotpsn = $rowcust['total_bayar'];
        $statuspsn = $rowcust['status_pemesanan'];


        
        
        
    }

    $sqlkrm = "SELECT * FROM tb_kirim WHERE id_pemesanan='$id'";
    $resultkrm = $mysqli->query($sqlkrm);
    $jumdatakrm = mysqli_num_rows($resultkrm);
    if($jumdatakrm>0){
        $datakrm = $resultkrm->fetch_assoc();
        $noresi = $datakrm['no_resi'];
    }else{
        $noresi = "-";
    }
    ?>
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title" style="margin-top:-70px; ">Checkout Pesanan</h2>
                    <p><a href="#">Home</a> | Checkout Pesanan</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section style="margin-top: 50px;">
        <div class="container">

            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="easy2">
                        <h3 align="center"><?php echo $id; ?></h3></br>

                        <div class="cart-form table-responsive">
                          <table id="shopping-cart-table" class="data-table cart-table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Berat/Pcs</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i=1;

                            $sql = "SELECT * FROM tb_detail INNER JOIN tb_pesanan USING(id_pemesanan) INNER JOIN tb_dataproduk USING(id_produk) INNER JOIN tb_pelanggan  WHERE tb_detail.id_pemesanan='$id' AND tb_pelanggan.id_pelanggan='$idpel' ORDER BY tb_pesanan.id_pemesanan='$id' ";
                            $result = $mysqli->query($sql);
                            $jumdata = mysqli_num_rows($result);
                            $totalberat = 0;
                            $totalsub = 0;
                            if($jumdata>0){
                                while ($data = $result->fetch_assoc()) {

                                    $namapenjual = $data['nama_pelanggan'];
                                    $namabrg = $data['nama_produk'];
                                    $beratbrg = $data['berat'];
                                    $hargabrg = $data['harga_pesanan'];
                                    $qtybrg = $data['jumlah_produk'];
                                    $subtot = $data['sub_total'];
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $namabrg; ?></td>
                                        <td><?php echo $beratbrg." Gram"; ?></td>
                                        <td><?php echo "Rp. ".number_format($hargabrg, 2, ',','.');  ?></td>
                                        <td><?php echo $qtybrg; ?></td>
                                        <td><?php echo "Rp ".number_format($subtot, 2, ',','.');  ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }else{

                            }
                            ?>
                        </form>
                    </tbody>
                </table>
            </div>
            <div style="margin-left: 10px; margin-bottom: 20px;">
                <font size="3" align="center">
                    <p><h3>Data Anda</h3></p>
                    <p>Nama Lengkap : <b><?php echo $nama;?></b></p>
                    <p>Tanggal Pesan : <b><?php echo date('d-m-Y H:i:s', strtotime($tgl));?></b></p>
                    <p>Email : <b><?php echo $emailcust;?></b></p>
                    <p>Telepon : <b><?php echo $telpcust;?></b></p>
                    <p>Alamat Tujuan Pengiriman : <b><?php echo $alamatpsn;?></b></p>
                    <p>Berat Barang : <b><?php echo $beratpsn." Gram";?></b></p>
                    <p>Provinsi : <b><?php echo $provpsn;?></b></p>
                    <p>Kabupaten : <b><?php echo $kabpsn;?></b></p>
                    <p>Kurir : <b><?php echo $layananpsn;?></b></p>
                    <p>Layanan : <b><?php echo $layananharga;?></b></p>
                    <p>Sub Total : <b><?php echo "Rp ".number_format($hargapsn, 2, ',','.');?></b></p>
                    <p>Total Ongkir : <b><?php echo "Rp ".number_format($ongkirpsn, 2, ',','.');?></b></p>
                    <p>Grand Total  : <b><?php echo "Rp ".number_format($grtotpsn, 2, ',','.');?></b></p>
                    <p>Status : <b><?php echo $statuspsn;?></b></p>

                    <?php
                    $date = date_create($tgl);
                    date_add($date, date_interval_create_from_date_string('12 hours'));
                    if($statuspsn=="Pesan"){
                        ?>
                        <p align="center"><b>Silahkan melakukan pembayaran sebesar <font size="4">(<?php echo "Rp.".number_format($grtotpsn, 2, ',','.');?>)</font> ke nomor rekening di bawah ini.</br>REK. BCA : </br>42358735</br>Atas Nama : Happy Shopping Satu</b></p>
                        <p align="center"><b>Jika tidak melakukan pembayaran selama 12 jam dari waktu pemesanan, maka pemesanan akan dibatalkan oleh sistem.</b></p>
                        <p align="center"><b>Tanggal Pesanan : <?php echo $tgl; ?></b></p>
                        <br><p align="center"><b>Pesanan batal otomatis pada : <i><?php echo date_format($date, 'd-m-Y / H:i:s'); ?></i> </b></p>

                        <p align="center" style="color:red;"><b>NB: Setelah proses <i>Checkout </i> dan pembayaran,  pesanan tidak bisa dibatalkan.</b></p>

                        <?php
                    }else{
                    }
                    ?>
                </font>
            </div>
            <div align="center">
                <?php
                $sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_pesanan USING(id_pemesanan) WHERE tb_pembayaran.id_pemesanan='$id'";
                $result = $mysqli->query($sql);
                $jumdata = mysqli_num_rows($result);
                if($jumdata>0){
                    while ($data = $result->fetch_assoc()) {

                        
                        $status_p = $data['status_pembayaran'];
                        
                    }

                    if($status_p=="Tolak"){
                        ?>
                        <button data-toggle="modal" data-target="#crud-bayar" class="add-bayar btn btn-primary ce5">Pembayaran</button>
                        <?php
                    }
                }               

                if($statuspsn=="Pesan"){
                    ?>
                    <button data-toggle="modal" data-target="#crud-bayar" class="add-bayar btn btn-primary ce5">Pembayaran</button>
                    <?php
                }else if($statuspsn=="Batal"){
                    ?>
                    <h4>Pesanan anda sudah dibatalkan</h4>
                    <?php
                }else{
                    ?>
                    <h4>Anda sudah melakukan pembayaran</h4>
                    <?php
                }
                ?>
            </div>
            <div align="center">
                <?php
                if($jumdatakrm>0){
                    ?>
                    <h3>NO RESI : <?php echo $noresi; ?> </h3>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>


</div>
</section>

<!-- Modal untuk tambah ubah user -->
<div class="modal fade bs-example-modal-lg all-modal" id="crud-bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form method="post" id="form-create" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID </label>
                        <input type="text" id="idorder" name="idorder" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Bank</label>
                        <input type="text" id="namabank" name="namabank" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Rekening Pengirim</label>
                        <input type="text" id="namarek" name="namarek" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Rekening</label>
                        <input type="text" id="norekening" name="norekening" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload Bukti Transfer</label>
                        <input id="gambar" name="gambar" type="file" class="file">
                    </div>


                </div>
                <div class="modal-footer">
                    <div  class="col-md-12 col-sm-12 col-xs-12">

                        <input type="submit" id="btnform" name="btnform" class="btn btn-success" value="Bayar">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    /* tampilan load data & bersih data */
    function load_bayar(){

        $('#idorder').val('<?php echo $id; ?>');
        $('#namabank').val('<?php echo $namabank; ?>');
        $('#namarek').val('<?php echo $nama; ?>');
        $('#norekening').val('<?php echo $norekening; ?>');
        
    }

    $(document).ready(function(){
        load_bayar();

        /* tampil tambah data */
        $(document).on('click', '.add-bayar', function(e) {
            e.preventDefault();
            load_bayar();
        });

        $('#form-create').on('submit', function(event){
            event.preventDefault();
            var idorder = $("#crud-bayar").find("input[name='idorder']").val();
            var tglbayar = $("#crud-bayar").find("input[name='tglbayar']").val();

            var gambar = $('#gambar').prop('files')[0];

            var formData = new FormData(this);
            formData.append('module', 'bayar');
            formData.append('gambar', gambar);
            formData.append('idorder', idorder);
            formData.append('tglbayar', tglbayar);

            $.ajax({
                url:'aksi.php',
                method:"POST",
                data:formData,
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    cekdata = data.totaldata;
                    if(cekdata == "0"){
                        alert('Upload bukti transfer terlebih dahulu!!!');
                    }else{
                        alert('Pembayaran berhasil!!!');
                        window.location = "index.php?hal=listorder";
                    }
                }
            })

        });


    });
</script>


<?php
}else{
    echo "<script>window.alert('You must login first!');
    window.location=('index.php?hal=login')</script>";
}
?>