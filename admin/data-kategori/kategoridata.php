<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Kategori</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php       
        include '../../koneksi.php';
        $i=1;
        $sql = "SELECT * FROM tb_kategori Order By id_kategori ";
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
                        <?php echo $data['id_kategori']; ?>
                    </td>
                    <td>
                        <?php echo $data['nama_kategori']; ?>
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#crud-kategori"  data-id="<?php echo $data['id_kategori']; ?>" class="edit-kategori btn btn-info btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
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
