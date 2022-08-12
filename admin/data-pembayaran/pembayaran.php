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
                    <div class="pull-right"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="data-pembayaran">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal untuk lihat pembayaran -->
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
                        <input type="hidden" id="idpembayaranconfirm" name="idpembayaranconfirm" class="form-control" />
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
                    <div class="form-group" id="cekubah">
                            <label class="control-label">Bukti Transfer</label>
                            <div class="bukti">
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div  class="col-md-12 col-sm-12 col-xs-12">

                        <input type="submit" id="btnform" name="btnform" class="confirm-submit btn btn-success" value="Validasi Pembayaran">
                    </div>
                </div>
            </form>

            
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
    /* tampilan load data & bersih data */
    function load_pembayaran(){
        $('#data-pembayaran').load("data-pembayaran/datapembayaran.php");

    }

    $(document).ready(function(){
        load_pembayaran();

        $(document).on('click', '.detail-pembayaran', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-pembayaran/datapembayarandetail.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (html) {
                $(".detail-modal").html(html);
            });
        });

        /* tampil data lihat */
        $(document).on('click', '.lihat-pembayaran', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-pembayaran/datapembayarangetedit.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                var bukti = obj.bukti;
                $('#idpembayaranconfirm').val(obj.idpembayaranconfirm);
                $('#idorder').val(obj.idorder);
                $('#nama').val(obj.nama);
                $('#transfer').val(rubahuang(obj.transfer));
                $('#namabank').val(obj.namabank);
                $('#norekening').val(obj.norekening);

                if(bukti == "-"){
                    $(".bukti").html('Tidak Upload');
                }else{
                    $(".bukti").html('<a href="../image/bukti/'+bukti+'" target="_blank"><img style="width: 50%; display: block;" src="../image/bukti/'+bukti+'" alt="image" /></a>');
                }

                $(".judulmodal").html('Lihat Pembayaran');
                var csimpansubmit = document.getElementById('simpansubmit');
                var cubahsubmit = document.getElementById('ubahsubmit');

                var ccekubah = document.getElementById('cekubah');
                ccekubah.style.display = 'block';

                csimpansubmit.style.display = 'none';
                cubahsubmit.style.display = 'block';
            });
        });

        /* validasi pembayaran data */
        $(".confirm-submit").click(function(e){
            e.preventDefault();
            var idpembayaranconfirm = $("#lihat-pembayaran").find("input[name='idpembayaranconfirm']").val();

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

        /* tampil modal delete */
        $(document).on('click', '.delete-admin', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-admin/admingetedit.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#iduserdel').val(obj.iduser);
            });
        });

        /* simpan data */
        $(".create-submit").click(function(e){
            e.preventDefault();
            var idadmin = $("#crud-admin").find("input[name='idadmin']").val();
            var nama = $("#crud-admin").find("input[name='nama']").val();
            var alamat = $("#crud-admin").find("textarea[name='alamat']").val();
            var telp = $("#crud-admin").find("input[name='telp']").val();
            var email = $("#crud-admin").find("input[name='email']").val();
            var username = $("#crud-admin").find("input[name='username']").val();
            var password = $("#crud-admin").find("input[name='password']").val();

            if(nama != '' && alamat != '' && telp != '' &&  email != '' && username != '' && password != ''){
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: 'data-admin/admincrud.php',
                    data:{module:'simpan', idadmin:idadmin, nama:nama, alamat:alamat, email:email, telp:telp, username:username, password:password}
                }).done(function(data){
                    cekdata = data.totaldata;
                    if(cekdata > 0){

                        notiferror('Username sudah digunakan!!!');
                    }else{
                        load_admin();
                        $(".modal").modal('hide');
                        notifsukses('Berhasil simpan data');
                    }

                });
            }else{
                notiferror('Ada data kosong');
            }
        });

        /* ubah data */
        $(".update-submit").click(function(e){
            e.preventDefault();
            var idadmin = $("#lihat-pembayaran").find("input[name='idorder']").val();
            var nama = $("#lihat-pembayaran").find("input[name='nama']").val();
            var alamat = $("#lihat-pembayaran").find("input[name='transfer']").val();
            var telp = $("#lihat-pembayaran").find("input[name='namabank']").val();
            var email = $("#lihat-pembayaran").find("input[name='norekening']").val();

            if(nama != '' && alamat != '' &&email != '' && telp != ''  ){
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: 'data-admin/admincrud.php',
                    data:{module:'ubah', idadmin:idadmin, nama:nama, alamat:alamat, email:email, telp:telp, username:username, password:password}
                }).done(function(data){
                    cekdata = data.totaldata;
                    if(cekdata > 0){
                        notiferror('Username sudah digunakan!!!');
                    }else{
                        load_admin();
                        $(".modal").modal('hide');
                        notifsukses('Berhasil ubah data');
                    }

                });
            }else{
                notiferror('Ada data kosong');
            }
        });

        /* hapus data */
        $(".delete-submit").click(function(e){
            e.preventDefault();
            var iduserdel = $("#delete-user").find("input[name='iduserdel']").val();

            $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'user/usercrud.php',
                data:{module:'hapus', iduserdel:iduserdel}
            }).done(function(data){
                load_admin()
                $(".modal").modal('hide');
                notifsukses('Berhasil hapus data');
            });
        });
    });
</script>