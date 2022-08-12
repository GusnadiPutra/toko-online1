<!-- page content -->
<div class="right_col" role="main">
    <div align="center">
        <h3>Data Barang</h3>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Barang</h2>
                    <div class="pull-right">
                        <button data-toggle="modal" data-target="#crud-barang" class="add-barang btn btn-success" style="margin-bottom:20px;"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="data-barang">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal untuk tambah ubah barang -->
<div class="modal fade bs-example-modal-lg all-modal" id="crud-barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form method="post" id="form-create" enctype="multipart/form-data">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">ID Barang</label>
                            <input type="text" id="idbarang" name="idbarang" class="form-control" readonly />
                        </div>
                        <div class="form-group ktg-select">
                            <label class="control-label">Kategori</label>
                            <select class="select2_single_2 form-control" id="kategori" name="kategori" style="width: 100% !important;">
                                <option value="0">-- Pilih Kategori --</option>
                                <?php
                                $sqlpkt = "SELECT * FROM tb_kategori Order By nama_kategori ASC";
                                $resultpkt = $mysqli->query($sqlpkt);
                                while ($datapkt = $resultpkt->fetch_assoc()) {
                                    echo "<option value='$datapkt[id_kategori]'>$datapkt[nama_kategori]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Barang</label>
                            <input type="text" id="nama" name="nama" class="form-control" required />
                        </div>

                        <div class="form-group ktg1-select">
                            <label class="control-label">Ukuran Barang</label>
                            <select class="select2_single_2 form-control" id="uk" name="uk" style="width: 100% !important; ">
                                <option value="0">-- Choose Size --</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Warna Barang</label>
                            <input type="text" id="warna" name="warna" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Berat Barang (Gram)</label>
                            <input type="number" id="berat" name="berat" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Harga Barang</label>
                            <input type="text" id="harga" name="harga" class="form-control uang" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stok Barang</label>
                            <input type="text" id="stok" name="stok" class="form-control uang" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
                        </div>

                        <!--gambar sebelum-->
                        <div class="form-group" id="cekubah">
                            <label class="control-label">Gambar Sebelumnya</label>
                            <div class="tgambar">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Upload Gambar (Format : JPEG, JPG, PNG)</label>
                            <input id="gambar" name="gambar" type="file" class="file">
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

<!-- Modal untuk tambah ubah user -->
<div class="modal fade bs-example-modal-lg" id="detail-barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body detail-modal">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /* tampilan load data & bersih data */
    function load_barang(){
        $('#data-barang').load("data-barang/barangdata.php");

        //tampil id barang
        $.ajax({
            url: 'data-barang/barangid.php',
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#idbarang').val(obj.idbarang);
        });

        $('#kategori').val('0').trigger("change");
        $('#nama').val('');
        $('#uk').val('');
        $('#warna').val('');
        $('#berat').val('');
        $('#harga').val('0');
        $('#stok').val('');
        $('#deskripsi').val('');
        $(".judulmodal").html('Tambah Barang');
        $('#btnform').val('Simpan');

        var ccekubah = document.getElementById('cekubah');
        ccekubah.style.display = 'none';
    }

    $(document).ready(function(){
        load_barang();

        $(".select2_single_2").select2({
            placeholder: "",
            allowClear: true,
            dropdownParent: $(".ktg-select")
        });

        $(".select2_single_2").select2({
            placeholder: "",
            allowClear: true,
            dropdownParent: $(".ktg1-select")
        });

        /* tampil tambah data */
        $(document).on('click', '.add-barang', function(e) {
            e.preventDefault();
            load_barang();
        });

        /* tampil data ubah */
        $(document).on('click', '.edit-barang', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-barang/baranggetedit.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                var upgambar = obj.upgambar;
                $('#idbarang').val(obj.idbarang);
                $('#kategori').val(obj.idkat).trigger("change");
                $('#nama').val(obj.namabarang);
                $('#uk').val(obj.uk).trigger("change");
                $('#warna').val(obj.warna);
                $('#berat').val(obj.berat);
                $('#harga').val(rubahuang(obj.harga));
                $('#stok').val(rubahuang(obj.stok));
                $('#deskripsi').val(obj.deskripsi);

                if(upgambar == "-"){
                    $(".tgambar").html('Tidak Upload');
                }else{
                    $(".tgambar").html('<a href="../image/barang/'+upgambar+'" target="_blank"><img style="width: 100%; display: block;" src="../image/barang/'+upgambar+'" alt="image" /></a>');
                }

                $(".judulmodal").html('Ubah barang');
                $('#btnform').val('Ubah');

                var ccekubah = document.getElementById('cekubah');
                ccekubah.style.display = 'block';
            });
        });

        $(document).on('click', '.detail-barang', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-barang/barangdetail.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (html) {
                $(".detail-modal").html(html);
            });
        });

        /* simpan data */
        $('#form-create').on('submit', function(event){
            event.preventDefault();
            var btnform = $("#crud-barang").find("input[name='btnform']").val();
            var idbarang = $("#crud-barang").find("input[name='idbarang']").val();
            var kategori = $("#crud-barang").find("select[name='kategori']").val();
            var nama = $("#crud-barang").find("input[name='nama']").val();
            var uk = $("#crud-barang").find("select[name='uk']").val();
            var warna = $("#crud-barang").find("input[name='warna']").val();
            var berat = $("#crud-barang").find("input[name='berat']").val();
            var harga = $("#crud-barang").find("input[name='harga']").val();
            var stok = $("#crud-barang").find("input[name='stok']").val();
            var deskripsi = $("#crud-barang").find("textarea[name='deskripsi']").val();
            
            var rharga = harga.replace(/,/g, "");

            var gambar = $('#gambar').prop('files')[0];

            var formData = new FormData(this);
            formData.append('gambar', gambar);
            formData.append('idbarang', idbarang);
            formData.append('kategori', kategori);
            formData.append('nama', nama);
            formData.append('uk', uk);
            formData.append('warna', warna);
            formData.append('berat', berat);
            formData.append('harga', rharga);
            formData.append('stok', stok);
            formData.append('deskripsi', deskripsi);

            if (btnform == "Simpan"){
                formData.append('module', 'simpan');
                var notifform = "Berhasil simpan data";
            }

            if(btnform == "Ubah"){
                formData.append('module', 'ubah');
                var notifform = "Berhasil ubah data";
            }

            if(kategori != '0' && nama != '' && uk != '' && warna != '' && berat != '' && harga != '' && harga != '0' && deskripsi != ''){

                $.ajax({
                    url:'data-barang/barangcrud.php',
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