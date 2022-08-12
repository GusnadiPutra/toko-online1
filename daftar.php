<?php 
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


<!-- pages-title-start -->
<section class="contact-img-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="con-text">
                            <h2 class="page-title">Register</h2>
                            <p><a href="?hal=home">Beranda</a> |Register</p>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- pages-title-end -->

<section style="margin-top: 50px;">
    <div class="container">
        <div class="col-sm-2">
        </div>

        <div class="col-sm-8">
            <div class="panel panel-default" id="daftar-user">
                <div class="easy2">
                    
                    <form method="post" id="form-create" enctype="multipart/form-data">
                        <fieldset>
                            <!--Username-->
                            <div class="form-group required">
                                <label class="col-sm-12">Username <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required/>
                                </div>
                            </div>

                            <!--Password-->
                            <div class="form-group required">
                                <label class="col-sm-12">Password <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required/>
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-12">Nama <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required/>
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-12">Email <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required/>
                                </div>
                            </div>


                            <div class="form-group required">
                                <label class="col-sm-12">No Telp <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <input type="number" id="notelp" name="notelp" class="form-control" placeholder="Masukkan no telp" required/>
                                </div>
                            </div>

                            <!--alamat-->
                            <div class="form-group required">
                                <label class="col-sm-12">Alamat <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat" required/>
                                </div>
                            </div>

                            <div class="form-group required">
                                <label for="provinsi" class="col-sm-12">Provinsi <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="provinsi" id="provinsi">
                                        <option>Pilih Provinsi</option>
                                        <?php 
                                        $data = json_decode($response, true);
                                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                        echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group required">
                                <label for="kabupaten" class="col-sm-12">Kabupaten <span class="required">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="kabupaten" name="kabupaten"></select>
                                </div>
                            </div>
                            
                                <div class="form-group required">
                                    <label class="col-sm-12">Bank <span class="required">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" id="bank" name="bank" class="form-control" placeholder="Masukkan nama" required/>
                                    </div>
                                </div>

                                <div class="form-group required">
                                    <label class="col-sm-12">No. Rekening <span class="required">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="number" id="rek" name="rek" class="form-control" placeholder="Masukkan no rekening" required/>
                                    </div>
                                </div>
                            

                        </fieldset>

                        <div class="buttons clearfix" style="margin-top: 20px;">
                            <div class="pull-left">
                                <div class="col-sm-12">
                                Sudah punya akun? <a href="?hal=login">Login</a>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="col-sm-12">
                                    <input class="btn btn-danger" type="reset" value="  Batal  ">

                                    <input type="submit" id="btnform" name="btnform" class="btn btn-success" value="Daftar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
        </div>

    </div>
</section>

<script type="text/javascript">

    $( document ).ready(function() {
        $('#provinsi').change(function(){
 
        //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
        var prov = $('#provinsi').val();
        
        $.ajax({
        type : 'GET',
        url : 'cek_kabupaten.php',
        data : 'prov_id=' + prov,
        success: function (data) {
        
        //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
        $("#kabupaten").html(data);
        }
        });
        });

        

        

        $('#form-create').on('submit', function(event){
            event.preventDefault();
            var nama = $("#daftar-user").find("input[name='nama']").val();
            var email = $("#daftar-user").find("input[name='email']").val();
            var notelp = $("#daftar-user").find("input[name='notelp']").val();
            var username = $("#daftar-user").find("input[name='username']").val();
            var password = $("#daftar-user").find("input[name='password']").val();
            var alamat = $("#daftar-user").find("input[name='alamat']").val();
            var prov = $("#daftar-user").find("input[name='provinsi']").val();
            var kab = $("#daftar-user").find("input[name='kabupaten']").val();
            var nmbank = $("#daftar-user").find("input[name='bank']").val();
            var norek = $("#daftar-user").find("input[name='rek']").val();

            var formData = new FormData(this);
            formData.append('module', 'daftar');
            formData.append('nama', nama);
            formData.append('email', email);
            formData.append('notelp', notelp);
            formData.append('username', username);
            formData.append('password', password);
            formData.append('alamat', alamat);
            formData.append('prov', prov);
            formData.append('kab', kab);
            formData.append('nmbank', nmbank);
            formData.append('norek', norek);

            if(username != '' && password != '' && nama != ''  && email != '' && notelp != '' && alamat != '' && prov != '' && kab != '' && nmbank != ''&& rek != '' ){

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
                            alert('Username sudah digunakan!!!');
                        }else if(cekdata == "1"){
                            alert('Pendaftaran berhasil!!');
                            window.location = "index.php?hal=login";
                        }
                    }
                })
            }else{
                alert('Terdapat data kosong!!');
            }

        });

    });
</script>