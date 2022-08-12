<!-- page content -->
<div class="right_col" role="main">
    <div align="center">
        <h3>Data Pelanggan</h3>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Pelanggan</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php           
                            $i=1;
                            $sql = "SELECT * FROM tb_pelanggan ORDER By id_pelanggan DESC";
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
                                            <?php echo $data['id_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['nama_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['alamat_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['telp_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['email_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['username_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['password_pelanggan']; ?>
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

<div class="modal fade bs-example-modal-lg" id="confirm-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Konfirmasi Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="hidden" id="idpesananconfirm" name="idpesananconfirm" class="form-control" readonly />
                        </div>
                        <h3 align="center">Anda yakin ingin konfirmasi pesanan ini???</h3>
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

<div class="modal fade bs-example-modal-lg" id="cancel-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Batal Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="hidden" id="idpesanancancel" name="idpesanancancel" class="form-control" readonly />
                        </div>
                        <h3 align="center">Anda yakin ingin batalkan pesanan ini???</h3>
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

<div class="modal fade bs-example-modal-lg" id="kirim-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Kirim</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="hidden" id="idpesankirim" name="idpesankirim" class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Resi</label>
                            <input type="text" id="noresi" name="noresi" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Kirim</label>
                            <input type="date" id="tglkirim" name="tglkirim" class="form-control" readonly />
                        </div>
                        <div class="form-group" align="right" style="margin-top: 20px;">
                            <button type="submit" class="btn kirim-submit btn-success">Simpan</button>
                            <button data-dismiss="modal" class="btn btn-danger">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk tambah ubah user -->
<div class="modal fade bs-example-modal-xl" id="detail-pesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Detail Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body detail-modal">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){

        $(document).on('click', '.detail-pesanan', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'pesanan/datapesanandetail.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (html) {
                $(".detail-modal").html(html);
            });
        });

        /* tampil modal confrim */
        $(document).on('click', '.confirm-order', function(e) {
            e.preventDefault();
            $('#idpesananconfirm').val($(this).attr('data-id'));
        });

        /* tampil modal cancel */
        $(document).on('click', '.cancel-order', function(e) {
            e.preventDefault();
            $('#idpesanancancel').val($(this).attr('data-id'));
        });

        /* tampil modal kirim */
        $(document).on('click', '.kirim-order', function(e) {
            e.preventDefault();
            $('#idpesankirim').val($(this).attr('data-id'));
            $('#tglkirim').val('<?php echo $tglkrg; ?>');
        });

        /* confirm data */
        $(".confirm-submit").click(function(e){
            e.preventDefault();
            var idpesananconfirm = $("#confirm-order").find("input[name='idpesananconfirm']").val();

            $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'data-pesanan/datapesanancrud.php',
                data:{module:'confirm', idpesananconfirm:idpesananconfirm}
            }).done(function(data){
                window.location = "media.php?hal=datapesanan";
                alert('Pesanan di proses!')
            });
        });

        /* cancel data */
        $(".cancel-submit").click(function(e){
            e.preventDefault();
            var idpesanancancel = $("#cancel-order").find("input[name='idpesanancancel']").val();

            $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'pesanan/datapesanancrud.php',
                data:{module:'cancel', idpesanancancel:idpesanancancel}
            }).done(function(data){
                window.location = "media.php?hal=datapesanan";
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