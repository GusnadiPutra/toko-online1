
<!-- page content -->

                    <table id="datatable-responsive" class="table table-striped table-bpembelianed dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bukti</th>
                                <th>ID Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Total Pembayaran</th>
                                <th>Bank</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php           
                            include '../../koneksi.php';
                            $i=1;
                            $sql = "SELECT * FROM tb_pembayaran INNER JOIN tb_pesanan USING(id_pemesanan) INNER JOIN tb_pelanggan WHERE tb_pesanan.id_pelanggan=tb_pelanggan.id_pelanggan ORDER By id_pembayaran DESC";
                            $result = $mysqli->query($sql);
                            $jumdata = mysqli_num_rows($result);
                            if($jumdata>0){
                                while ($data = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo '<a href="../image/bukti/'.$data['bukti_transfer'].'" target="_blank">
                                                            <img src="../image/bukti/'.$data['bukti_transfer'].'" width="100px"/>
                                                        </a>'
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $data['id_pemesanan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['nama_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo "Rp.".number_format($data['total_bayar'], 2, ',','.'); ?>
                                        </td>
                                        <td>
                                            <?php echo $data['bank']; ?>
                                        </td>
                                        <td>
                                            
                                            <?php
                                            if ($data['status_pembayaran']=="Terima"){
                                                echo "<a href='#' data-toggle='modal' data-target='#lihat-pembayaran'  data-id='$data[id_pembayaran]' class='lihat-pembayaran btn btn-success btn-sm'><i class='fa fa-eye ' title='Lihat'></i> Lihat</a>";
                                                }else{
                                                echo "<a href='#' data-toggle='modal' data-target='#detail-pembayaran'  data-id='$data[id_pembayaran]' class='detail-pembayaran btn btn-success btn-sm'><i class='fa fa-list' title='Detail'></i> Detail</a>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } 
                            ?>
                        </tbody>
                    </table>



<!-- Datatables -->
<script>
    $(document).ready(function() {
        $('#datatable-responsive').DataTable();

    });
</script>
<!-- /Datatables -->