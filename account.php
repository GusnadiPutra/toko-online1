
<?php



if (isset($_SESSION['usernameuser'])&&(isset($_SESSION['passuser']))) {

        $sql = "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$_SESSION[iduser]' ";
        $result = $mysqli->query($sql);
        $jumdata = mysqli_num_rows($result);

        $row=$result->fetch_assoc();
    	$id         = $row['id_pelanggan'];
		$nama       = $row['nama_pelanggan'];
		$telp       = $row['telp_pelanggan'];
		$email      = $row['email_pelanggan'];
		$alamat     = $row['alamat_pelanggan'];
        $bank       = $row['bank'];
		$rek        = $row['rekening'];
		$username   = $row['username_pelanggan'];
		$password_pel   = $row['password_pelanggan'];

        $prov_id    = $row['id_provinsi'];
        $kab_id     = $row['id_kabupaten'];

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

 
$curl2 = curl_init();
curl_setopt_array($curl2, array(
 CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$prov_id",
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
 
$response2 = curl_exec($curl2);
$err2 = curl_error($curl2);
 
?>
<!-- pages-title-start -->
		<section class="contact-img-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="con-text">
                            <h2 class="page-title">My Account</h2>
                            <p><a href="?hal=home">Home</a> | My Account</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- pages-title-end -->

		<!-- my account content section start -->
		<section class="collapse_area coll2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12" style=margin-top:-30px>
                        <div class="check">
                        </div>
                        <div class="faq-accordion">
                            <div class="panel-group pas7" id="accordion" role="tablist" aria-multiselectable="true">
                                
                                <div class="panel panel-default" id="edit-user">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="collapsed method" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Edit your account information <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" >
                                        <div class="row">
                                            <div class="easy2">
                                                <h2>My Account Information</h2>

                                                <form class="form-horizontal" method="POST" id="form-ubah" enctype="multipart/form-data">
                                                    <fieldset>
                                                        <legend>Your Personal Details</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Nama </label>
                                                            <div class="col-sm-10">
															<input type="hidden" id="idpel" name="idpel" class="form-control" value="<?php echo $id;?>" required/>
                                                                <input class="form-control" type="text" id="nama" name="nama" value="<?php echo $nama;?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Telephone</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" id="telp" name="telp" value="<?php echo $telp;?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">E-Mail</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" id="email" name="email" value="<?php echo $email;?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Alamat</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" id="alamat" name="alamat" value="<?php echo $alamat;?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Povinsi</label>
                                                            <div class="col-sm-10">
                                                            <select class="form-control" name="provinsi" id="provinsi">
                                                                <option>Pilih Provinsi</option>
                                                                <?php 
                                                                $data = json_decode($response, true);
                                                                for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                                                    if($prov_id == $data['rajaongkir']['results'][$i]['province_id']){
                                                                        $selekk = "selected";
                                                                    }else{
                                                                        $selekk = "";
                                                                    }
                                                                echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."' ".$selekk."> ".$data['rajaongkir']['results'][$i]['province']."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Kabupaten</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" id="kabupaten" name="kabupaten">
                                                                <?php 
                                                                $data2 = json_decode($response2, true);
                                                                for ($i2=0; $i2 < count($data2['rajaongkir']['results']); $i2++) {
                                                                    if($kab_id == $data2['rajaongkir']['results'][$i2]['city_id']){
                                                                        $selekk2 = "selected";
                                                                    }else{
                                                                        $selekk2 = "";
                                                                    }
                                                                echo "<option value='".$data2['rajaongkir']['results'][$i2]['city_id']."' ".$selekk2."> ".$data2['rajaongkir']['results'][$i2]['city_name']."</option>";
                                                                }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <div class="buttons clearfix">
                                                        <div class="pull-right">
														<input type="submit" id="btnubah" name="btnubah" class="btn btn-default ce5" value="Ubah Data">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default" id="edit-bank">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Edit your bank account information  <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                        <div class="easy2">
                                            <h2>My Bank Account Information</h2>
                                                <form class="form-horizontal" method="POST" id="form-bank" enctype="multipart/form-data">
                                                    <fieldset>
                                                        <legend>Your Personal Details</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Nama Bank </label>
                                                            <div class="col-sm-10">
															    <input type="hidden" id="idpel" name="idpel" class="form-control" value="<?php echo $id;?>" required/>
                                                                <input class="form-control" type="text" id="nm_bank" name="nm_bank" value="<?php echo $bank;?>" required/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Nomor Rekening</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" id="rek" name="rek" value="<?php echo $rek;?>" required/>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <div class="buttons clearfix">
                                                        <div class="pull-right">
														<input type="submit" class="btn btn-default ce5" value="Ubah Data">
                                                        </div>
                                                    </div>

                                                </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default" id="ganti-pass">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Change Your Username & Password  <i class="fa fa-caret-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                        <div class="row">
                                            <div class="easy2">
                                                <h2>Change Username/Password</h2>
                                                <form class="form-horizontal" method="POST" id="form-pass" enctype="multipart/form-data">
                                                    <fieldset>
                                                        <legend>Your Username/Password</legend>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="hidden" id="idpel" name="idpel" class="form-control" value="<?php echo $id;?>" required/>
                                                                <input class="form-control" type="text"  id="username" name="username" value="<?php echo $username;?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password Lama</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="hidden" id="pass" name="pass" value="<?php echo $password_pel;?>">
                                                                <input class="form-control" type="password" id="passlama" name="passlama" placeholder="password lama">
                                                            </div>
                                                        </div>
														<div class="form-group required">
                                                            <label class="col-sm-2 control-label">Password Baru</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="password" id="password" name="password" placeholder="password baru">
                                                            </div>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label class="col-sm-2 control-label">Confirm Password</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="password" id="conpass" name="conpass" placeholder="password confirm">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="buttons clearfix">
                                                        <div class="pull-right">
														<input type="submit"  class="btn btn-default ce5" value="Ganti Password">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- my account  content section end -->
<script type="text/javascript">

    $( document ).ready(function() {

        $('#provinsi').change(function(){
 
        //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
        var prov = $('#provinsi').val();
        
        $.ajax({
        type    : 'GET',
        url     : 'cek_kabupaten.php',
        data    : 'prov_id=' + prov,
        success: function (data) {
        
        //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
        $("#kabupaten").html(data);
        }
        });
        });

        
        $('#form-ubah').on('submit', function(event){
            event.preventDefault();
            var idpel       = $("#edit-user").find("input[name='idpel']").val();
            var nama        = $("#edit-user").find("input[name='nama']").val();
            var telp        = $("#edit-user").find("input[name='telp']").val();
            var email       = $("#edit-user").find("input[name='email']").val();
            var alamat      = $("#edit-user").find("input[name='alamat']").val();
            var prov        = $("#edit-user").find("input[name='provinsi']").val();
            var kab         = $("#edit-user").find("input[name='kabupaten']").val();

            var formData = new FormData(this);
            formData.append('module', 'ubahprofil');
            formData.append('idpel', idpel);
            formData.append('nama', nama);
            formData.append('telp', telp);
            formData.append('email', email);
            formData.append('alamat', alamat);
            formData.append('prov', prov);
            formData.append('kab', kab);

            if( idpel != ''  && nama != ''  && email != '' && telp != '' && alamat != '' && prov != '' && kab != ''  ){

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
                        if(cekdata > "0"){
                            alert('Username sudah digunakan!!!');
                        }else{
                            alert('Ubah Data Berhasil!!');
                            window.location = "index.php?hal=account";
                        }
                    }
                })
            }else{
                alert('Terdapat data kosong!!');
            }

        });

        $('#form-bank').on('submit', function(event){
            event.preventDefault();
            var idpel       = $("#edit-bank").find("input[name='idpel']").val();
            var nm_bank     = $("#edit-bank").find("input[name='nm_bank']").val();
            var rek         = $("#edit-bank").find("input[name='rek']").val();

            var formData = new FormData(this);
            formData.append('module', 'ubahbank');
            formData.append('idpel', idpel);
            formData.append('nm_bank', nm_bank);
            formData.append('rek', rek);

            if( idpel != ''  && nm_bank != ''  && rek != ''){

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
                        if(cekdata > "0"){
                            alert('Username sudah digunakan!!!');
                        }else{
                            alert('Ubah Data Berhasil!!');
                            window.location = "index.php?hal=account";
                        }
                    }
                })
            }else{
                alert('Terdapat data kosong!!');
            }

        });

        $('#form-pass').on('submit', function(event){
            event.preventDefault();
            var idpel       = $("#ganti-pass").find("input[name='idpel']").val();
            var username    = $("#ganti-pass").find("input[name='username']").val();
            var passlama    = $("#ganti-pass").find("input[name='passlama']").val();
            var pass        = $("#ganti-pass").find("input[name='pass']").val();
            var password    = $("#ganti-pass").find("input[name='password']").val();
            var conpass     = $("#ganti-pass").find("input[name='conpass']").val();

            var formData = new FormData(this);
            formData.append('module', 'ubahpass');
            formData.append('idpel', idpel);
            formData.append('username', username);
            formData.append('passlama', passlama);
            formData.append('pass', pass);
            formData.append('password', password);
            formData.append('conpass', conpass);

            if(passlama!=pass){
                alert('Password Lama Salah');
            }else if(password!=conpass){
                alert('Konfirmasi Password Salah');
            }else if( idpel != '' && username != '' && pass != '' && passlama != '' && password != '' && conpass != ''){

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
                        if(cekdata > "0"){
                            alert('Username sudah digunakan!!!');
                        }else{
                            alert('Ubah Data Berhasil!!');
                            window.location = "index.php?hal=account";
                        }
                    }
                })
            }else{
                alert('Terdapat data kosong!!');
            }

        });


    });
</script>

 <?php } ?>       
