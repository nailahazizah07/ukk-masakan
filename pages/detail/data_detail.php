<?php
//*include "conf/conn.php";
$query = mysqli_query($koneksi, "SELECT detail_order.qty, masakan.nama_masakan, `order`.no_meja, user.nama_user, SUM(detail_order.total) AS total_bayar, detail_order.keterangan, detail_order.id_detail_order, detail_order.id_order
FROM detail_order
INNER JOIN masakan ON detail_order.id_masakan = masakan.id_masakan
INNER JOIN `order` ON detail_order.id_order = `order`.id_order
INNER JOIN user ON `order`.id_user = user.id_user
GROUP BY `order`.no_meja, user.nama_user, `order`.id_order
ORDER BY `order`.id_order DESC")
    or die(mysqli_error($koneksi));
//*
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DATA DETAIL ORDER
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">DATA DETAIL ORDER</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <a href="index.php?page=tambah_order" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>Tambah</a>
                    </div>

                    <div class="box-body table-responsive">
                        <table id="order" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NO MEJA</th>
                                    <th>NAMA USER</th>
                                    <th>TOTAL</th>
                                    <th>KETERANGAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                $no_meja = $row['no_meja'];
                                $nama_user = $row['nama_user'];
                                $total_bayar = $row['total_bayar'];

                            ?>
                                <tr>
                                    <td><?php echo $no = $no + 1; ?></td>
                                    <td><?php echo $no_meja; ?></td>
                                    <td><?php echo $nama_user; ?></td>
                                    <td>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
                                    <td>
                                        <a href="index.php?page=detail_order&id_order=<?= $row['id_order']; ?>>" class="btn btn-info" role="button" title="Detail Data"><i class="glyphicon glyphicon-list"></i></a>
                                        <a href="pages/detail/hapus_detail.php?id=<?= $row['id_order']; ?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php }

                            ?>
                            </tbody>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#order').DataTable();
    });
</script>