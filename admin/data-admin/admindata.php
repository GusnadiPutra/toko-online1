<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Admin</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Email</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php       
        include '../../koneksi.php';
        $i=1;
        $sql = "SELECT * FROM tb_admin Order By id_admin ";
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
                        <?php echo $data['id_admin']; ?>
                    </td>
                    <td>
                        <?php echo $data['nama_admin']; ?>
                    </td>
                    <td>
                        <?php echo $data['alamat_admin']; ?>
                    </td>
                    <td>
                        <?php echo $data['telp_admin']; ?>
                    </td>
                    <td>
                        <?php echo $data['email_admin']; ?>
                    </td>
                    <td>
                        <?php echo $data['username_admin']; ?>
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#crud-admin"  data-id="<?php echo $data['id_admin']; ?>" class="edit-admin btn btn-info btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
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
