<?php
if (isset($_SESSION['usernameuser'])&&(isset($_SESSION['passuser']))) {

 //Get Data Kabupaten
 $curl = curl_init();
 curl_setopt_array($curl, array(
     CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => array(
         "key:b196d8f774cfe20acfdb36858e9d020d"
         ),
     ));

 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);
 echo "<input type='hidden' value='152' class=\"form-control\" name='asal' id='asal'>";

 //Get Data Kabupaten
 //-----------------------------------------------------------------------------

 //Get Data Provinsi
 $curl = curl_init();

 curl_setopt_array($curl, array(
     CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => array(
         "key:b196d8f774cfe20acfdb36858e9d020d"
         ),
     ));

 $response = curl_exec($curl);
 $err = curl_error($curl);

 //Get Data Provinsi

 ?>
 <section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Keranjang Saya</h2>
                    <p><a href="?hal=home">Beranda</a> |Keranjang Saya</p>
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

                    <div class="wc-proceed-to-checkout" style="float:left; margin-top:-30px; margin-bottom:30px;">
                            <p class="return-to-shop">
                              <a class="btn btn-primary ce5" href="index.php?hal=produk">Belanja Lagi</a>
                              <button data-toggle="modal" data-target="#crud-order" class="add-order btn btn-primary ce5"> Check Out</button>
                          </p>
                    </div>

                        <div class="cart-form table-responsive">
                            <table id="shopping-cart-table" class="data-table cart-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <form method="post" action="aksi.php?module=updatetemp">
                                        <?php
                                        $idksm = $_SESSION['iduser'];
                                        $i=1;
                                        $sql = "SELECT * FROM tb_keranjang a INNER JOIN tb_dataproduk b USING(id_produk) WHERE a.id_pelanggan='$idksm' ORDER By id_keranjang DESC";
                                        $result = $mysqli->query($sql);
                                        $jumdata = mysqli_num_rows($result);
                                        if($jumdata>0){
                                            while ($data = $result->fetch_assoc()) {
                                                $idtemp = $data['id_keranjang'];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>

                                                        <?php 
                                                        if($data['gambar']=="-"){
                                                            echo "No Upload";
                                                        }else{
                                                            echo '<a href="image/barang/'.$data['gambar'].'" target="_blank"><img src="image/barang/'.$data['gambar'].'" width="100px"/></a>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['nama_produk']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['stok']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "Rp.".number_format($data['harga'], 0, ',','.'); ?>
                                                    </td>
                                                    <td> 
                                                        <input type="number" id="jml" name="jml[<?php echo $i; ?>]"  required class="form-control col"  style="width:80px;" value="<?php echo $data['jumlah_produk']; ?>" onchange="this.form.submit()"/>
                                                        <input type="hidden" name="id[<?php echo $i; ?>]" value="<?php echo $idtemp; ?>">
                                                        <input type="hidden" name="stok[<?php echo $i; ?>]" value="<?php echo $data['stok']; ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo "Rp.".number_format($data['harga'] * $data['jumlah_produk'], 2, ',','.'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="aksi.php?module=deletetemp&idtemp=<?php echo $idtemp; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </form>
                                </tbody>
                            </table>
                        </div>

                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</section> 

<!-- Modal untuk tambah ubah user -->
<div class="modal fade bs-example-modal-lg all-modal" id="crud-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Pesan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <form id="formlogin" data-parsley-validate class="form-horizontal form-label-left" action="aksi.php" method="post" name="formlogin">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">No Pemesanan</label>
                            <input type="text" id="idpesan" name="idpesan" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Povinsi</label>
                            <input type="hidden" id="provinsi" name="provinsi" class="form-control" readonly="" />
                            <input type="text" id="nmprovinsi" name="nmprovinsi" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kabupaten</label>
                            <input type="hidden" id="kabupaten" name="kabupaten" class="form-control" readonly="" />
                            <input type="text" id="nmkabupaten" name="nmkabupaten" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Layanan Jasa</label>
                            <select class="form-control" name="kurir" id="kurir" onchange="isi_ongkir()">
                                <option value="0">Pilih Jasa</option>
                                <option value="cod">COD</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS INDONESIA</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Berat (Gram)</label>
                            <input class="form-control" type="number" name="berat" id="berat" readonly="">
                        </div>

                        <div class="form-group" id="tampillayanan">
                            <label class="control-label">Layanan & Harga</label>
                            
                            <select class="form-control" name="layanan" id="layanan" onchange="isi_harga()">
                                <option value="0">Pilih Layanan & Harga</option>
                            </select>
                            <input class="form-control" type="hidden" name="layan" id="layan" required>
                            <input class="form-control" type="hidden" name="hongkir" id="hongkir" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sub Total</label>
                            <input type="text" id="subtotal" name="subtotal" class="form-control" readonly="" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Total Ongkir</label>
                            <input type="text" id="totongkir" name="totongkir" class="form-control uang" readonly="" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Grand Total</label>
                            <input type="text" id="grtotal" name="grtotal" class="form-control uang" readonly="" />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div  class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn order-submit btn-success">Bayar Pesanan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

function load_order(){
        $.ajax({
            url: 'keranjangtampilid.php',
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#idpesan').val(obj.idpesan);
            $('#nama').val(obj.namacs);
            $('#alamat').val(obj.alamatcs);
            $('#provinsi').val(obj.id_prov);
            $('#nmprovinsi').val(obj.prov);
            $('#kabupaten').val(obj.id_kab);
            $('#nmkabupaten').val(obj.kab);
            $('#berat').val(obj.totalberat);
            $('#subtotal').val(rubahuang(obj.totalsub));
            $('#grtotal').val(rubahuang(obj.totalsub));
        });
    }


    $(document).ready(function(){
        $('#provinsi').change(function(){
            var prov = $('#provinsi').val();

            $.ajax({
                type : 'GET',
                url : 'cek_kabupaten.php',
                data : 'prov_id=' + prov,
                success: function (data) {

                 $("#kabupaten").html(data);
             }
         });
        });

    });

    function isi_ongkir(){

        var asal = $('#asal').val();
        var kab = $('#kabupaten').val();
        var kurir = $('#kurir').val();
        var berat = $('#berat').val();

        if(kurir == "cod"){

            var ctampillayanan = document.getElementById('tampillayanan');
            ctampillayanan.style.display = 'none';

            $('#layan').val('-');
            $('#hongkir').val(0);
            $('#totongkir').val(0);
        }else{
            var ctampillayanan = document.getElementById('tampillayanan');
            ctampillayanan.style.display = 'block';
            $.ajax({
                type : 'POST',
                url : 'cek_layanan.php',
                data : {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                success: function (data) {
                    $("#layanan").html(data);
                }
            });
            return isi_harga();
        }
    }

    function isi_harga(){

        var asal = $('#asal').val();
        var kab = $('#kabupaten').val();
        var kurir = $('#kurir').val();
        var berat = $('#berat').val();
        var layanan = $('#layanan').val();

        $.ajax({
            type : 'POST',
            url : 'cek_harga.php',
            data : {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat, 'layanan' : layanan},
            success: function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#layan').val(obj.clayan);
                $('#hongkir').val(obj.charga);
                $('#totongkir').val(rubahuang(obj.charga));

                return hitung_total();
            }
        });
    }

    function hitung_total(){
        var subtotal = $("#crud-order").find("input[name='subtotal']").val();
        var totongkir = $("#crud-order").find("input[name='totongkir']").val();
        var rtotongkir = totongkir.replace(/,/g, "");
        var rsubtotal = subtotal.replace(/,/g, "");

        var hsubtotal = parseInt(rsubtotal);
        var htotongkir = parseInt(rtotongkir);
        if (isNaN (hsubtotal))
            hsubtotal=0.0;
        if (isNaN (htotongkir))
            htotongkir=0.0;

        var hgrtotal = 0;
        hgrtotal = hsubtotal + htotongkir;

        $('#grtotal').val(rubahuang(hgrtotal));
    }

    $(document).ready(function(){
        load_order();

        /* tampil tambah data */
        $(document).on('click', '.add-order', function(e) {
            e.preventDefault();
            load_order();

        });

        /* simpan data */
        $(".order-submit").click(function(e){
            e.preventDefault();
            var form_action = $("#crud-order").find("form").attr("action");
            var idpesan = $("#crud-order").find("input[name='idpesan']").val();
            var provinsi = $("#crud-order").find("input[name='provinsi']").val();
            var kabupaten = $("#crud-order").find("input[name='kabupaten']").val();
            var kurir = $("#crud-order").find("select[name='kurir']").val();
            var berat = $("#crud-order").find("input[name='berat']").val();
            var layan = $("#crud-order").find("input[name='layan']").val();
            var hongkir = $("#crud-order").find("input[name='hongkir']").val();
            var subtotal = $("#crud-order").find("input[name='subtotal']").val();
            var grtotal = $("#crud-order").find("input[name='grtotal']").val();

            if(provinsi != '' && provinsi != '0' && grtotal != '' && grtotal != '0'){
                var rsubtotal = subtotal.replace(/,/g, "");
                var rgrtotal = grtotal.replace(/,/g, "");
                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: form_action,
                    data:{module:"saveorder", idpesan:idpesan, provinsi:provinsi, kabupaten:kabupaten, kurir:kurir, berat:berat, layan:layan, hongkir:hongkir, subtotal:rsubtotal, grtotal:rgrtotal}
                }).done(function(data){
                    tidpesan = data.idpesan;
                    alert('Pesanan Berhasil!!!');
                    window.location = "index.php?hal=myorder&id=" + tidpesan;
                });
            }else{
                alert('Terdapat data kosong!!!');
            }
        });

    });
</script>


<?php
}else{
    echo "<script>window.alert('You must login first!');
    window.location=('index.php?hal=login')</script>";
}
?>