<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA ORDERAN RESTO
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA ORDERAN</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=data_pesan" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>Tambah</a>
          </div>

          <div class="box-body table-responsive">
            <table id="order" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NO MEJA</th>
                  <th>TANGGAL</th>
                  <th>NAMA USER</th>
                  <th>STATUS ORDERAN</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT `order`.*, user.nama_user FROM `order`
                INNER JOIN user ON `order`.id_user = user.id_user
                ORDER BY `order`.id_order DESC")
                  or die(mysqli_error($koneksi));

                while ($row = mysqli_fetch_array($query)) {
                ?>

                  <tr>
                    <td><?php echo $no = $no + 1; ?></td>
                    <td><?php echo $row['no_meja']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['nama_user']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                  </tr>

                <?php } ?>

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