<!-- pages-title-start -->
		<section class="contact-img-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="con-text">
                            <h2 class="page-title">Login</h2>
                            <p><a href="?hal=home">Home</a> | Login</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- pages-title-end -->




<!-- login content section start -->
<section>
	<div class="container" style="margin-top: 50px;">
		<div class="col-sm-2">
		</div>

		<div class="col-sm-8">
			<div class="panel panel-default" id="login-user">
				<div class="easy2">
					<form id="formlogin" data-parsley-validate class="form-horizontal form-label-left" action="aksi.php" method="post" name="formlogin">
						<fieldset>
							<!--Username-->
							<div class="form-group required">
								<label class="col-sm-12">Username <span class="required">*</span></label>
								<div class="col-sm-12">
									<input type="text" id="username" name="username" class="form-control" placeholder="Enter username here" required/>
								</div>
							</div>

							<!--Password-->
							<div class="form-group required">
								<label class="col-sm-12">Password <span class="required">*</span></label>
								<div class="col-sm-12">
									<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password here" required/>
								</div>
							</div>

						</fieldset>

						<div class="buttons clearfix">
							<div class="pull-left">
								Belum punya akun? <a href="index.php?hal=daftar">Daftar</a>
							</div>
							<div class="pull-right">
								<button type="submit" class="btn login-submit btn-success">Login</button>
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
		<!-- login  content section end -->

		<script type="text/javascript">
	$( document ).ready(function() {

		/* tambah user */
		$(".login-submit").click(function(e){
			e.preventDefault();
			var form_action = $("#login-user").find("form").attr("action");
			var user_name = $("#login-user").find("input[name='username']").val();
			var user_pass = $("#login-user").find("input[name='password']").val();
			if(user_name != '' && user_pass != ''){
				$.ajax({
					dataType: 'json',
					type:'POST',
					url: form_action,
					data:{module:"login", user_name:user_name, user_pass:user_pass}
				}).done(function(data){
					cekdata = data.totaldata;
					if(cekdata > 0){
							alert('Sukses Login');
							window.location = "index.php?hal=home";
						
					}else{
						alert('Username atau password salah!!!');
					}
				});

			}else{
				alert('Terdapat data kosong');
			}


		});

	});
</script>