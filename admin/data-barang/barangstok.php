<?php
$idbarang = $_GET['id'];


$qrydt="SELECT * FROM tb_barang WHERE id_barang='$idbarang'";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt > 0) {
    $row=$resultdt->fetch_assoc();
    $idkat = $row['id_kategori'];
    $namabarang = $row['nama_barang'];
    $berat = $row['berat_barang'];
    $stoksebelum = $row['stok_barang'];
    $deskripsi = $row['deskripsi_barang'];
    $upgambar = $row['gambar_barang'];


    ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div align="center">
            <h3>Stok Barang <?php echo $namabarang; ?></h3>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Stok Masuk</h2>
                        <div class="pull-right">
                            <button data-toggle="modal" data-target="#crud-barang" class="add-barang btn btn-success" style="margin-bottom:20px;"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="data-barang">
                    </div>
                </div>
                <a href="?hal=databarang" class="btn btn-primary" style="margin-bottom:20px;"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>

        </div>
    </div>

    <!-- Modal untuk tambah ubah barang -->
    <div class="modal fade bs-example-modal-lg all-modal" id="crud-barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title judulmodal" id="myModalLabel">Tambah Stok Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <form method="post" id="form-create" enctype="multipart/form-data">
                        <div  class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">ID Barang</label>
                                <input type="text" id="idbarang" name="idbarang" class="form-control" readonly />
                                <input type="hidden" id="iddetail" name="iddetail" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Barang</label>
                                <input type="text" id="nama" name="nama" class="form-control" required readonly="" />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Stok Masuk</label>
                                <input type="hidden" id="stoksebelum" name="stoksebelum" class="form-control" required />
                                <input type="number" id="stokmasuk" name="stokmasuk" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="btnform" name="btnform" class="btn btn-success" value="Simpan">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk tambah ubah barang -->
    <div class="modal fade bs-example-modal-lg" id="delete-barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus barang</h4>
                </div>

                <div class="modal-body">
                    <form data-toggle="validator" method="POST">
                        <div  class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">ID barang</label>
                                <input type="hidden" id="idbarangdel" name="idbarangdel" class="form-control" readonly />
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
        function load_barang(){
            $('#data-barang').load("barang/barangstokdata.php?id=<?php echo $idbarang; ?>");

            $('#iddetail').val('');
            $('#idbarang').val('<?php echo $idbarang; ?>');
            $('#nama').val('<?php echo $namabarang; ?>');
            $('#stoksebelum').val('0');
            $('#stokmasuk').val('0');
            $(".judulmodal").html('Tambah Stok Masuk');
            $('#btnform').val('Simpan');

        }

        $(document).ready(function(){
            load_barang();

            /* tampil tambah data */
            $(document).on('click', '.add-barang', function(e) {
                e.preventDefault();
                load_barang();
            });

            /* tampil data ubah */
            $(document).on('click', '.edit-barang', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'barang/barangstokgetedit.php',
                    data:"id="+$(this).attr('data-id'),
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#iddetail').val(obj.idstok);
                    $('#idbarang').val(obj.idbarang);
                    $('#nama').val(obj.namabarang);
                    $('#stoksebelum').val(obj.qtystok);
                    $('#stokmasuk').val(obj.qtystok);

                    $(".judulmodal").html('Ubah Stok Masuk');
                    $('#btnform').val('Ubah');
                });
            });

            /* tampil modal delete */
            $(document).on('click', '.delete-barang', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'barang/baranggetedit.php',
                    data:"id="+$(this).attr('data-id'),
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#idbarangdel').val(obj.idbarang);
                });
            });

            /* simpan data */
            $('#form-create').on('submit', function(event){
                event.preventDefault();
                var btnform = $("#crud-barang").find("input[name='btnform']").val();
                var iddetail = $("#crud-barang").find("input[name='iddetail']").val();
                var idbarang = $("#crud-barang").find("input[name='idbarang']").val();
                var nama = $("#crud-barang").find("input[name='nama']").val();
                var stoksebelum = $("#crud-barang").find("input[name='stoksebelum']").val();
                var stokmasuk = $("#crud-barang").find("input[name='stokmasuk']").val();

                var formData = new FormData(this);
                formData.append('iddetail', iddetail);
                formData.append('idbarang', idbarang);
                formData.append('nama', nama);
                formData.append('stoksebelum', stoksebelum);
                formData.append('stokmasuk', stokmasuk);

                if (btnform == "Simpan"){
                    formData.append('module', 'simpanstok');
                    var notifform = "Berhasil simpan data";
                }

                if(btnform == "Ubah"){
                    formData.append('module', 'ubahstok');
                    var notifform = "Berhasil ubah data";
                }

                if(stokmasuk != '0' && stokmasuk != ''){

                    $.ajax({
                        url:'barang/barangcrud.php',
                        method:"POST",
                        data:formData,
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data){
                            load_barang();
                            document.getElementById("form-create").reset();
                            $(".modal").modal('hide');
                            notifsukses(notifform);
                        }
                    })
                }else{
                    notiferror('Terdapat data kosong!!!');
                }
            });


            /* hapus data */
            $(".delete-submit").click(function(e){
                e.preventDefault();
                var idbarangdel = $("#delete-barang").find("input[name='idbarangdel']").val();

                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: 'barang/barangcrud.php',
                    data:{module:'hapus', idbarangdel:idbarangdel}
                }).done(function(data){
                    load_barang()
                    $(".modal").modal('hide');
                    notifsukses('Berhasil hapus data');
                });
            });
        });
    </script>
    <?php
}
?>