<!-- page content -->
<div class="right_col" role="main">

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Laporan UnPackage Order</h3>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <?php
  $tglkrg = date("Y-m-d");
  ?>                

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <form method='post'>
        <div class="x_panel">
          <div class="x_title">
            <h2>Periode</h2>

            <div class="clearfix"></div>
          </div>

          <div class="x_content" id="lap-transaksi">

            <div class="form-group">
              <div class="col-md-4" style="margin-bottom:8px;">
                <label class="control-label">Dari Tanggal <span class="required">*</span></label>
                <input type="date" id="daritgl" name="daritgl" value="<?php echo $tglkrg; ?>"  required class="form-control"/>
              </div> 

              <div class="col-md-4" style="margin-bottom:8px;">
                <label class="control-label">Sampai Tanggal <span class="required">*</span></label>
                <input type="date" id="sampetgl" name="sampetgl" value="<?php echo $tglkrg; ?>"  required class="form-control"/>
              </div> 

              <div class="col-md-4" style="margin-bottom:8px;">

              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn cek-submit btn-primary">Cetak</button>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    $(".cek-submit").click(function(e){
      e.preventDefault();
      var daritgl = $("#lap-transaksi").find("input[name='daritgl']").val();
      var sampetgl = $("#lap-transaksi").find("input[name='sampetgl']").val();
      var cdaritgl = new Date(document.getElementById('daritgl').value);
      var csampetgl = new Date(document.getElementById('sampetgl').value);
      if(cdaritgl > csampetgl){
        notiferror('Format tanggal salah, dari tanggal tidak boleh melebihi sampai tanggal');
      }else{
        $.ajax({
          url: '../cetak/laporanunpackage.php',
          data: "daritgl="+daritgl+"&sampetgl="+sampetgl+"&cekawal=1",
        }).success(function (data) {
          var json = data,
          obj = JSON.parse(json);
          var cekdata = obj.totjum;
          if(cekdata == 0){
            notiferror('Data kosong pada periode tersebut');
          }else{
            window.open('../cetak/laporanunpackage.php?daritgl='+obj.daritgl+'&sampetgl='+obj.sampetgl+'&cekawal=0');
          }
        });
      }
      
    });

  });
</script>
