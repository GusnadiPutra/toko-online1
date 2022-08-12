<?php

include "../../koneksi.php";

$id = $_GET['id'];
$qrydt="SELECT * FROM tb_pembayaran INNER JOIN tb_pesanan USING(id_pemesanan) INNER JOIN tb_pelanggan USING(id_pelanggan) WHERE id_pembayaran='$id' ";
$resultdt = $mysqli->query($qrydt);
$jumdt = mysqli_num_rows($resultdt);

if($jumdt == 0) {
}else {
    $rowcust=$resultdt->fetch_assoc();
    $id_p = $rowcust['id_pemesanan'];
    $nama = $rowcust['nama_pelanggan'];
    $tgl = $rowcust['tgl_pemesanan'];
    $emailcust = $rowcust['email_pelanggan'];
    $telpcust = $rowcust['telp_pelanggan'];
    $alamatpsn = $rowcust['alamat_pelanggan'];
    $provpsn = $rowcust['nama_provinsi'];
    $kabpsn = $rowcust['nama_kabupaten'];
    $namabank = $rowcust['bank'];
    $norekening = $rowcust['rekening'];
    $layananpsn = strtoupper($rowcust['kurir_layanan']);
    $layananharga = $rowcust['jenis_layanan'];
    $beratpsn = $rowcust['total_berat'];
    $hargapsn = $rowcust['total_harga'];
    $ongkirpsn = $rowcust['total_ongkir'];
    $grtotpsn = $rowcust['total_bayar'];
    $statuspsn = $rowcust['status_pemesanan'];
    $buktitransfer = $rowcust['bukti_transfer'];
}
$data = array(
    'idorder'       =>  $idadmin,
    'nama'          =>  $nama,
    'transfer'        =>  $grtotpsn,
    'namabank'         =>  $namabank,
    'norekening'          =>  $norekening);
echo json_encode($data);
?>
<div class="modal fade bs-example-modal-lg" id="lihat-pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title judulmodal" id="myModalLabel">Konfirmasi Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <form method="post" id="form-create" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID </label>
                        <input type="text" id="idorder" name="idorder" class="form-control" readonly="" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jumlah Transfer</label>
                        <input type="text" id="transfer" name="transfer" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Bank</label>
                        <input type="text" id="namabank" name="namabank" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">No Rekening</label>
                        <input type="text" id="norekening" name="norekening" class="form-control" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Bukti Transfer</label>
                        <label class="control-label col-md-8">
        <?php
        if($buktitransfer == "-"){
            echo "-";
        }else{
            ?><a href="../image/bukti/<?php echo $buktitransfer; ?>" target="_blank"><img style="width: 200px; display: block;" 
                    src="../image/bukti/<?php echo $buktitransfer; ?>" alt="image" /></a></label>
            <?php
        }
    
    ?>
                    </div>


                </div>
                <div class="modal-footer">
                    <div  class="col-md-12 col-sm-12 col-xs-12">

                        <input type="submit" id="btnform" name="btnform" class="btn btn-success" value="Bayar">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>

            
        </div>
    </div>
</div>

<script type="text/javascript">
        function load_bayar(){
            $('#idorder').val('<?php echo $id; ?>');
            $('#nama').val('<?php echo $nama; ?>');
            $('#transfer').val('<?php echo "Rp ".number_format($grtotpsn, 2, ',','.');?>');
            $('#namabank').val('<?php echo $namabank; ?>');
            $('#namarek').val('<?php echo $nama; ?>');
            $('#norekening').val('<?php echo $norekening; ?>');
            
        }

        $(document).ready(function(){
        load_bayar();

        /* tampil data ubah */
        $(document).on('click', '.lihat-pembayaran', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'data-pembayaran/lihatpembayaran.php',
                data:"id="+$(this).attr('data-id'),
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                ''       =>  $idadmin,
    ''          =>  $nama,
    ''        =>  $grtotpsn,
    ''         =>  $namabank,
    ''          =>  $norekening,
    ''      =>  $buktitransfer);
                $('#idorder').val(obj.idadmin);
                $('#nama').val(obj.nama);
                $('#transfer').val(obj.alamat);
                $('#namabank').val(obj.email);
                $('#norekening').val(obj.telp);
                $('#username').val(obj.username);
                $('#password').val(obj.password);
                $(".judulmodal").html('Ubah Admin');

                var csimpansubmit = document.getElementById('simpansubmit');
                var cubahsubmit = document.getElementById('ubahsubmit');
                csimpansubmit.style.display = 'none';
                cubahsubmit.style.display = 'block';
            });
        });
    });
        </script>