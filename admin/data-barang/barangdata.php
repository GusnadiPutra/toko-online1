<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>ID Barang</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php       
    
        include '../../koneksi.php';
        $i=1;
        
        $sql = "SELECT * FROM tb_dataproduk INNER JOIN tb_kategori USING(id_kategori)  Order By id_produk ";
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
                        <?php 
                        if($data['gambar']=="-"){
                            echo "No Upload";
                        }else{
                            echo '<a href="../image/barang/'.$data['gambar'].'" target="_blank">
                                    <img src="../image/barang/'.$data['gambar'].'" width="100px"/>
                                </a>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $data['id_produk']; ?>
                    </td>
                    <td>
                        <?php echo $data['nama_kategori']; ?>
                    </td>
                    <td>
                        <?php echo $data['nama_produk']; ?>
                    </td>
                    <td>
                        <?php echo "Rp.".number_format($data['harga'], 2, ',','.'); ?>
                    </td>
                    <td>
                        <?php echo $data['stok']; ?>
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#crud-barang"  data-id="<?php echo $data['id_produk']; ?>" class="edit-barang btn btn-info btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
                    <a href="#" data-toggle="modal" data-target="#detail-barang" data-id="<?php echo $data['id_produk']; ?>" class="detail-barang btn btn-primary btn-sm"><i class="fa fa-bars" title="Detail"></i> Detail</a>
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
