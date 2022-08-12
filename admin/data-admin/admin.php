<!-- page content -->
<div class="right_col" role="main">
    <div align="center">
        <h3>Data Admin</h3>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Data Admin</h2>
                    <div class="pull-right">
                        <button data-toggle="modal" data-target="#crud-admin" class="add-user btn btn-success" style="margin-bottom:20px;"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="data-admin">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal untuk tambah ubah user -->
<div class="modal fade bs-example-modal-lg all-modal" id="crud-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Tambah Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form data-toggle="validator" method="POST">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">ID Admin</label>
                            <input type="text" id="idadmin" name="idadmin" class="form-control" readonly />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control" require></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telp</label>
                            <input type="text" id="telp" name="telp" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required />
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
    function load_admin(){
        $('#data-admin').load("data-admin/admindata.php");

        //tampil id user
        $.ajax({
            url: 'data-admin/adminid.php',
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#idadmin').val(obj.idadmin);
        });

        $('#nama').val('');
        $('#alamat').val('');
        $('#telp').val('');
        $('#email').val('');
        $('#username').val('');
        $('#password').val('');
        $(".judulmodal").html('Tambah Admin');
        var csimpansubmit = document.getElementById('simpansubmit');
        var cubahsubmit = document.getElementById('ubahsubmit');
        csimpansubmit.style.display = 'block';
        cubahsubmit.style.display = 'none';
    }

    $(document).ready(function(){
        load_admin();

        /* tampil tambah data */
        $(document).on('click', '.add-user', function(e) {
            e.preventDefault();
            load_admin();
        });

        /* tampil data ubah */
        $(document).on('click', '.edit-admin', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-admin/admingetedit.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#idadmin').val(obj.idadmin);
                $('#nama').val(obj.nama);
                $('#alamat').val(obj.alamat);
                $('#email').val(obj.email);
                $('#telp').val(obj.telp);
                $('#username').val(obj.username);
                $('#password').val(obj.password);
                $(".judulmodal").html('Ubah Admin');

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
            var idadmin = $("#crud-admin").find("input[name='idadmin']").val();
            var nama = $("#crud-admin").find("input[name='nama']").val();
            var alamat = $("#crud-admin").find("textarea[name='alamat']").val();
            var telp = $("#crud-admin").find("input[name='telp']").val();
            var email = $("#crud-admin").find("input[name='email']").val();
            var username = $("#crud-admin").find("input[name='username']").val();
            var password = $("#crud-admin").find("input[name='password']").val();

            if(nama != '' && alamat != '' &&email != '' && telp != '' && username != '' && password != '' ){
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