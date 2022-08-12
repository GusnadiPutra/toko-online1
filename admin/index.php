<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Happy Shopping Satu</title>
    <link rel="shortcut icon" type="image/x-icon" href="../logo satu.png" >

    <!-- Bootstrap -->
     <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">


    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    
</head>

<body class="login">
  <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content" id="login-user">
            <image src="../logo satu.png" width=100%>
                <form id="formlogin" data-parsley-validate class="form-horizontal form-label-left" action="login.php" method="post" name="formlogin">
                  <h1>Login Sistem</h1>
                  <div>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="" />
                </div>
                <div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="" />
                </div>
                <div >
                    <button type="reset" class="btn btn-danger">Batal</button>
                    <button type="submit" class="btn login-submit btn-success">Login</button>
                </div>

                <div class="clearfix"></div>

            </form>
        </section>
    </div>

</div>
</div>
</body>
</html>
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
                data:{user_name:user_name, user_pass:user_pass}
            }).done(function(data){
                cekdata = data.totaldata;
                if(cekdata > 0){
                    alert('Success!!!')
                    window.location = "media.php?hal=home";
                }else{
                    alert('Username atau password salah')
                }
            });
        }else{
            alert('Ada data yang kosong')
        }


    });

});
</script>