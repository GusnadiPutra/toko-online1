<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Stok Masuk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php       
        session_start();
        include '../../koneksi.php';
        $i=1;
        $idbarang = $_GET['id'];
        $sql = "SELECT * FROM tb_stok_masuk WHERE id_barang='$idbarang' Order By id_stok_masuk DESC";
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
                        <?php echo date('d-m-Y', strtotime($data['tanggal_stok_masuk'])); ?>
                    </td>
                    <td>
                        <?php echo $data['qty_stok_masuk']; ?>
                    </td>
                    <td>
                        <?php
                        if($i == 1){
                            ?>
                            <a href="#" data-toggle="modal" data-target="#crud-barang"  data-id="<?php echo $data['id_stok_masuk']; ?>" class="edit-barang btn btn-info btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
                            <?php
                        }else{
                            ?>
                            <button class="btn btn-info btn-sm" disabled=""><i class="fa fa-pencil"></i> Ubah</button>
                            <?php
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
