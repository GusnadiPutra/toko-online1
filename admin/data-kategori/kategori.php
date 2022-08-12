<!-- page content -->
<div class="right_col" role="main">
    <div align="center">
        <h3>Data Kategori</h3>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Data Kategori</h2>
                    <div class="pull-right">
                        <button data-toggle="modal" data-target="#crud-kategori" class="add-user btn btn-success" style="margin-bottom:20px;"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="data-kategori">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal untuk tambah ubah user -->
<div class="modal fade bs-example-modal-lg all-modal" id="crud-kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">ID Kategori</label>
                            <input type="text" id="idkat" name="idkat" class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" required />
                        </div>
                        <div class="form-group" id="simpansubmit">
                            <button type="submit" class="btn create-submit btn-success">Simpan</button>
                        </div>
                        <div class="form-group" id="ubahsubmit" style="display: none;">
                            <button type="submit" class="btn update-submit btn-success">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk tambah ubah user -->
<div class="modal fade bs-example-modal-lg" id="delete-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Admin</h4>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">ID Admin</label>
                            <input type="hidden" id="iduserdel" name="iduserdel" class="form-control" readonly />
                        </div>
                        <h3 align="center">Yakin ingin hapus data???</h3>
                        <div class="form-group" align="center" style="margin-top: 20px;">
                            <button data-dismiss="modal" class="btn btn-danger">Tidak</button>
                            <button type="submit" class="btn delete-submit btn-success">Yakin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /* tampilan load data & bersih data */
    function load_kategori(){
        $('#data-kategori').load("data-kategori/kategoridata.php");

        //tampil id user
        $.ajax({
            url: 'data-kategori/kategoriid.php',
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#idkat').val(obj.idkat);
        });

        $('#nama').val('');
        $(".judulmodal").html('Tambah Kategori');
        var csimpansubmit = document.getElementById('simpansubmit');
        var cubahsubmit = document.getElementById('ubahsubmit');
        csimpansubmit.style.display = 'block';
        cubahsubmit.style.display = 'none';
    }

    $(document).ready(function(){
        load_kategori();

        /* tampil tambah data */
        $(document).on('click', '.add-user', function(e) {
            e.preventDefault();
            load_kategori();
        });

        /* tampil data ubah */
        $(document).on('click', '.edit-kategori', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-kategori/kategorigetedit.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#idkat').val(obj.idkat);
                $('#nama').val(obj.nama);
                $(".judulmodal").html('Ubah Kategori');

                var csimpansubmit = document.getElementById('simpansubmit');
                var cubahsubmit = document.getElementById('ubahsubmit');
                csimpansubmit.style.display = 'none';
                cubahsubmit.style.display = 'block';
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
            var idkat = $("#crud-kategori").find("input[name='idkat']").val();
            var nama = $("#crud-kategori").find("input[name='nama']").val();

            if(nama != '' ){
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: 'data-kategori/kategoricrud.php',
                    data:{module:'simpan', idkat:idkat, nama:nama}
                }).done(function(data){
                    cekdata = data.totaldata;
                    if(cekdata > 0){

                        notiferror('Data sudah digunakan!!!');
                    }else{
                        load_kategori();
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
            var idkat = $("#crud-kategori").find("input[name='idkat']").val();
            var nama = $("#crud-kategori").find("input[name='nama']").val();

            if(nama != ''  ){
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: 'data-kategori/kategoricrud.php',
                    data:{module:'ubah', idkat:idkat, nama:nama}
                }).done(function(data){
                    cekdata = data.totaldata;
                    if(cekdata > 0){
                        notiferror('Data sudah digunakan!!!');
                    }else{
                        load_kategori();
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
                load_kategori()
                $(".modal").modal('hide');
                notifsukses('Berhasil hapus data');
            });
        });
    });
</script>