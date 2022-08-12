<!-- page content -->
<div class="right_col" role="main">
    <div align="center">
        <h3>Data Pembayaran</h3>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Pembayaran</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bpembelianed dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bukti</th>
                                <th>ID Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Total Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php           
                            $i=1;
                            $sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_pesanan USING(id_pemesanan) INNER JOIN tb_pelanggan WHERE tb_pesanan.id_pelanggan=tb_pelanggan.id_pelanggan ORDER By id_pembayaran DESC";
                            $result = $mysqli->query($sql);
                            $jumdata = mysqli_num_rows($result);
                            if($jumdata>0){
                                while ($data = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo '<a href="../image/bukti/'.$data['bukti_transfer'].'" target="_blank">
                                                            <img src="../image/bukti/'.$data['bukti_transfer'].'" width="100px"/>
                                                        </a>'
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $data['id_pemesanan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['nama_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo "Rp.".number_format($data['total_bayar'], 2, ',','.'); ?>
                                        </td>
                                        <td>
                                            
                                            <?php
                                            if ($data['status_pembayaran']=="Terima"){
                                                echo "<a href='#' data-toggle='modal' data-target='#konfirm-pembayaran'  data-id='$data[id_pembayaran]' class='konfirm-pembayaran btn btn-success btn-sm'><i class='fa fa-check' title='Confirm'></i>Konfirmasi</a>";
                                                echo "<a href='#' data-toggle='modal' data-target='#tolak-pembayaran'  data-id='$data[id_pembayaran]' class='tolak-pembayaran btn btn-danger btn-sm'><i class='fa fa-times' title='Tolak'></i>Tolak</a>";
                                            }else{
                                                echo "<a href='#' data-toggle='modal' data-target='#detail-pembayaran'  data-id='$data[id_pembayaran]' class='detail-pembayaran btn btn-success btn-sm'><i class='fa fa-list' title='Kirim'></i> Detail</a>";
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

<div class="modal fade bs-example-modal-lg" id="konfirm-pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Konfirmasi Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="hidden" id="idpembayaranconfirm" name="idpembayaranconfirm" class="form-control" readonly />
                        </div>
                        <h3 align="center">Anda yakin ingin konfirmasi Pembayaran ini???</h3>
                        <div class="form-group" align="center" style="margin-top: 20px;">
                            <button type="submit" class="btn confirm-submit btn-success">Yakin</button>
                            <button data-dismiss="modal" class="btn btn-danger">Tidak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="tolak-pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Konfirmasi Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="hidden" id="idpembayarancancel" name="idpembayarancancel" class="form-control" readonly />
                        </div>
                        <h3 align="center">Anda yakin ingin menolak Pembayaran ini???</h3>
                        <div class="form-group" align="center" style="margin-top: 20px;">
                            <button type="submit" class="btn cancel-submit btn-success">Yakin</button>
                            <button data-dismiss="modal" class="btn btn-danger">Tidak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk detail pembayaran -->
<div class="modal fade bs-example-modal-xl" id="detail-pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Detail Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body detail-modal">
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){

        $(document).on('click', '.detail-pembayaran', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-pembayaran/datapembayarandetail.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (html) {
                $(".detail-modal").html(html);
            });
        });

        /* tampil modal confrim */
        $(document).on('click', '.konfirm-pembayaran', function(e) {
            e.preventDefault();
            $('#idpembayaranconfirm').val($(this).attr('data-id'));
        });

        /* tampil modal cancel */
        $(document).on('click', '.tolak-pembayaran', function(e) {
            e.preventDefault();
            $('#idpembayarancancel').val($(this).attr('data-id'));
        });

        /* confirm data */
        $(".confirm-submit").click(function(e){
            e.preventDefault();
            var idpembayaranconfirm = $("#konfirm-pembayaran").find("input[name='idpembayaranconfirm']").val();

            $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'data-pembayaran/datapembayarancrud.php',
                data:{module:'confirm', idpembayaranconfirm:idpembayaranconfirm}
            }).done(function(data){
                window.location = "media.php?hal=datapembayaran";
                alert('Pembayaran di terima!')
            });
        });

        /* cancel data */
        $(".cancel-submit").click(function(e){
            e.preventDefault();
            var idpembayarancancel = $("#tolak-pembayaran").find("input[name='idpembayarancancel']").val();

            $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'data-pembayaran/datapembayarancrud.php',
                data:{module:'cancel', idpembayarancancel:idpembayarancancel}
            }).done(function(data){
                window.location = "media.php?hal=datapembayaran";
                alert('Pembayaran di ditolak!')
            });
        });

        /* kirim data */
        $(".kirim-submit").click(function(e){
            e.preventDefault();
            var idpesankirim = $("#kirim-order").find("input[name='idpesankirim']").val();
            var noresi = $("#kirim-order").find("input[name='noresi']").val();
            var tglkirim = $("#kirim-order").find("input[name='tglkirim']").val();

            if(noresi != ''){
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: 'data-pesanan/datapesanancrud.php',
                    data:{module:'kirim', idpesankirim:idpesankirim, noresi:noresi, tglkirim:tglkirim}
                }).done(function(data){
                    window.location = "media.php?hal=datapesanan";
                });
            }else{
                notiferror('No resi masih kosong!!!');
            }
        });

    });
</script>
<!---
<div class="modal fade bs-example-modal-lg" id="lihat-pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Konfirmasi Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form method="post" id="form-create" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID </label>
                        <input type="text" id="idorder" name="idorder" class="form-control" readonly="" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jumlah Transfer</label>
                        <input type="text" id="transfer" name="transfer" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Bank</label>
                        <input type="text" id="namabank" name="namabank" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Rekening</label>
                        <input type="text" id="norekening" name="norekening" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Bukti Transfer</label>
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
</div> --->
