<?php
session_start();

include "../koneksi.php";
if (isset($_SESSION['usernameadmin'])&&(isset($_SESSION['passadmin']))){

  ?>
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

    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="../assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    
    <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="../assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../assets/vendors/google-code-prettify/src/prettify.js"></script>

    <script src="../assets/js/jquery.mask.min.js"></script>

    <!-- PNotify -->
    <script src="../assets/vendors/pnotify/dist/pnotify.js"></script>
    <script src="../assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <script src="../assets/vendors/select2/dist/js/select2.min.js"></script>

        <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
        <script src="assets/js/jquery.mask.min.js"></script>

    <script type="text/javascript">
      function notiferror(pesane){
       new PNotify({
        title: 'Terjadi Kesalahan!',
        text: pesane,
        type: 'error',
        styling: 'bootstrap3'
      });
     }

     function notifsukses(pesans){
       new PNotify({
        title: 'Berhasil!',
        text: pesans,
        type: 'success',
        styling: 'bootstrap3'
      }); 
     }
   </script>

 </head>

 <body class="nav-md">
  <!--validasi session-->

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="?hal=home" class="site_title" align="center"><img src='../logo satu1.png' width="85%"></a>
          </div>

          <div class="clearfix"></div>
          <div class="profile">
            <div class="profile_pic">
            <img src='images/user.png' class='img-circle profile_img'>
            </div>
            <div class="profile_info">
              <span>Selamat Datang,</span>
              <h2><?php echo $_SESSION['namaadmin'];?></h2>
            </div>
          </div>
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>&nbsp;</h3>
              <ul class="nav side-menu">
                <?php
                if ($_SESSION['aksesadmin']=='Admin') {
                  ?>
                  <li><a href="?hal=home"><i class="fa fa-home"></i>Beranda </a></li>
                  <li><a href="?hal=dataadmin"><i class="fa fa-book"></i>Data Admin </a></li>
                  <li><a href="?hal=datapelanggan"><i class="fa fa-book"></i>Data Pelanggan </a></li>
                  <li><a href="?hal=datakategori"><i class="fa fa-book"></i>Data Kategori </a></li>
                  <li><a href="?hal=dataproduk"><i class="fa fa-book"></i>Data Produk </a></li>
                  <?php
                    $sqlpem = "SELECT * FROM tb_pembayaran WHERE read_pembayaran='0' ORDER BY id_pembayaran DESC";
                    $resultpem = $mysqli->query($sqlpem);
                    $jumdatapem = mysqli_num_rows($resultpem);

                    if ($jumdatapem==0){
                      ?>
                      <li><a href="?hal=datapembayaran"><i class="fa fa-book"></i>Data Pembayaran</b></a></li>
                    <?php
                    }else{
                    ?>
                    <li><a href="?hal=datapembayaran"><i class="fa fa-book"></i>Data Pembayaran <b><?php echo "($jumdatapem)";?></b></a></li>
                    <?php
                    }

                    $sqlpes = "SELECT * FROM tb_pesanan WHERE read_pemesanan='0' ORDER BY id_pemesanan DESC";
                    $resultpes = $mysqli->query($sqlpes);
                    $jumdatapes = mysqli_num_rows($resultpes);

                    if ($jumdatapes==0){
                      ?>
                  <li><a href="?hal=datapesanan"><i class="fa fa-book"></i>Data Pemesanan </a></li>
                  <?php
                    }else{
                    ?>
                    <li><a href="?hal=datapesanan"><i class="fa fa-book"></i>Data Pemesanan <b><?php echo "($jumdatapes)";?></b></a></li>
                    <?php
                    }
                    ?>
                  <li><a href="#"><i class="fa fa-book"></i>Laporan<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="?hal=laporanpenjualan"><i class="fa fa-book"></i>Laporan Penjualan </a></li>
                      <li><a href="?hal=laporanunpackage"><i class="fa fa-book"></i>Laporan Unpackage Order </a></li>
                      <li><a href="?hal=laporanunreceived"><i class="fa fa-book"></i>Laporan Not Received</a></li>
                    </ul>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['namaadmin'];?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item ubah-password"  href="#" data-toggle="modal" data-target="#ubah-pass" > Ubah Password</a>
                  <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Keluar</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <?php
      include "konten.php";
      ?>

      <footer>
        <div class="pull-right">
          Happy Shopping Satu &copy; 2021
        </div>
        <div class="clearfix"></div>
      </footer>
    </div>

    <!-- Modal untuk tambah ubah anggota -->
    <div class="modal fade bs-example-modal-lg" id="ubah-pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title judulmodal" id="myModalLabel">Ubah Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>

          <div class="modal-body">
            <form data-toggle="validator" method="POST">
              <div  class="col-md-12 col-sm-12 col-xs-12">

                <div class="form-group">
                  <label class="control-label">Nama</label>
                  <input type="text" id="namauser" name="namauser" value="<?php echo $_SESSION['namaadmin']; ?>" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="control-label">Username</label>
                  <input type="text" id="usernameid" name="usernameid" value="<?php echo $_SESSION['usernameadmin']; ?>" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="control-label">Password Lama</label>
                  <input type="hidden" id="passme" name="passme" value="<?php echo $_SESSION['passadmin'];?>" class="form-control" required />
                  <input type="password" id="passlama" name="passlama" class="form-control" required />
                </div>
                <div class="form-group">
                  <label class="control-label">Password Baru</label>
                  <input type="password" id="passbaru" name="passbaru" class="form-control" required />
                </div>
                <div class="form-group">
                  <label class="control-label">Konfirmasi Password</label>
                  <input type="password" id="cfpass" name="cfpass" class="form-control" required />
                </div>
                <div class="form-group">
                  <button type="submit" class="btn pass-submit btn-success">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
     function load_ubah_pass(){
      $(".judulpass").html('Ubah Password');
      $('#passlama').val('');
      $('#passbaru').val('');
      $('#cfpass').val('');
    }

    $(document).ready(function(){
      load_ubah_pass();

      /* tampil tambah data */
      $(document).on('click', '.ubah-password', function(e) {
        e.preventDefault();
        load_ubah_pass();
      });

      /* simpan data */
      $(".pass-submit").click(function(e){
        e.preventDefault();
        var namauser = $("#ubah-pass").find("input[name='namauser']").val();
        var usernameid = $("#ubah-pass").find("input[name='usernameid']").val();
        var passme = $("#ubah-pass").find("input[name='passme']").val();
        var passlama = $("#ubah-pass").find("input[name='passlama']").val();
        var passbaru = $("#ubah-pass").find("input[name='passbaru']").val();
        var cfpass = $("#ubah-pass").find("input[name='cfpass']").val();

        if(namauser == '' && usernameid == '' && passlama == '' && passbaru == '' && cfpass == ''){

          notiferror('Ada data kosong');
        }else if (passme != passlama) {
          notiferror('Password lama salah');
        }else if (passbaru != cfpass) {
          notiferror('Konfirmasi password salah');
        }else{
          $.ajax({
            dataType: 'json',
            type:'POST',
            url: 'aksipass.php',
            data:{namauser:namauser,usernameid:usernameid,passbaru:passbaru}
          }).done(function(data){
            load_ubah_pass();
            $(".modal").modal('hide');
            notifsukses('Berhasil ubah password');

          });
        }
      });

    });

  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $( '.uang' ).mask('000,000,000,000,000', {reverse: true});
    })

    function rubahuang(angka){
     var reverse = angka.toString().split('').reverse().join(''),
     ribuan = reverse.match(/\d{1,3}/g);
     ribuan = ribuan.join(',').split('').reverse().join('');
     return ribuan;
   }
 </script>

 <script type="text/javascript">
  function validasi_ubah() {
    var $jpass = document.getElementById('passlama').value;
    var $jpassbaru = document.getElementById('passbaru').value;
    var $jcpass = document.getElementById('cfpass').value;

    if ($jpass == "aaaa") {
      notiferror('Terdapat data kosong, lengkapi data!!!');
    } else {
      formubahpass();
      return;
    }
  }

  function formubahpass() {
    document.getElementById("formubahpass").submit();
    return (true);
  }
</script>

<script src="../assets/build/js/custom.min.js"></script>

<!-- Datatables -->
<script>
  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#datatable-buttons").length) {
        $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [
          ],
          responsive: true
        });
      }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();

    $('#datatable').dataTable();

    $('#datatable-keytable').DataTable({
      keys: true
    });

    $('#datatable-responsive').DataTable();

    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });

    $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });

    var $datatable = $('#datatable-checkbox');

    $datatable.dataTable({
      'order': [[ 1, 'asc' ]],
      'columnDefs': [
      { orderable: false, targets: [0] }
      ]
    });
    $datatable.on('draw.dt', function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_flat-green'
      });
    });

    TableManageButtons.init();
  });
</script>
<!-- /Datatables -->

<!-- Select2 -->
<script>
  $(document).ready(function() {
    $(".select2_single").select2({
      placeholder: "",
      allowClear: true,
      dropdownParent: $(".all-modal")
    });

    $(".select2_tambah").select2({
      placeholder: "",
      allowClear: true
    });
    $(".select2_group").select2({});
    $(".select2_multiple").select2({
      maximumSelectionLength: 100,
      placeholder: "With Max Selection limit 4",
      allowClear: true
    });
  });
</script>
<!-- /Select2 -->

<script>
  $(function() {
    $(document).on('click', '.ubah-record', function(e) {
      e.preventDefault();
      $("#modalubah").modal('show');
      $.post('ubahpass.php', {
        id: $(this).attr('data-id')
      },
      function(html) {
        $(".modal-body").html(html);
      }
      );
    });
  });
</script>

<script src="../assets/js/highcharts.js" type="text/javascript"></script>

</body>
</html>
<?php
}
?>