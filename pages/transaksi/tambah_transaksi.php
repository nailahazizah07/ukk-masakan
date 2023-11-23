<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      PILIH PELANGGAN </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">PILIH PELANGGAN</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" action="pages/transaksi/tambah_transaksi_proses.php">
            <div class="box-body">
              <div class="form-group">
                <label>PILIH</label>
                <input type="text" name="id_order" id="id_order" class="form-control pencarian">
              </div>
              <input type="hidden" name="id_user" id="id_user" class="form-control pencarian" placeholder="Pilih Pelanggan" readonly required>
              <input type="hidden" name="id_detail_order" id="id_detail_order" class="form-control pencarian">

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DATA DETAIL ORDER</h4>
      </div>
      <div class="modal-body">
        <table id="produk" class="table table-bordered">
          <thead>
            <tr>
              <th>NO MEJA</th>
              <th>NAMA USER</th>
              <th>TOTAL BAYAR</th>
            </tr>
          </thead>
          <tbody>

            <?php
            include "conf/conn.php";
            $query = mysqli_query($koneksi, "SELECT detail_order.qty, masakan.nama_masakan, `order`.no_meja, user.nama_user, SUM(detail_order.total) AS total_bayar, detail_order.keterangan, detail_order.id_detail_order, detail_order.id_order, `order`.id_order, user.id_user
            FROM detail_order
            INNER JOIN masakan ON detail_order.id_masakan = masakan.id_masakan
            INNER JOIN `order` ON detail_order.id_order = `order`.id_order
            INNER JOIN user ON `order`.id_user = user.id_user
            WHERE detail_order.keterangan = 'diproses'  
            GROUP BY `order`.no_meja, user.nama_user, `order`.id_order
            ORDER BY `order`.id_order DESC")
              or die(mysqli_error($koneksi));

            while ($row = mysqli_fetch_array($query)) {
              $no_meja = $row['no_meja'];
              $nama_user = $row['nama_user'];
              $total_bayar = $row['total_bayar'];
            ?>
              <tr class="pilih" data-id_user="<?php echo $row['id_user']; ?>" data-id_order="<?php echo $row['id_order']; ?>" data-id_detail_order="<?php echo $row['id_detail_order']; ?>">
                <td><?php echo $no_meja; ?></td>
                <td><?php echo $nama_user; ?></td>
                <td>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></td>
                <td>
              </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /.box -->
</div>
</div>
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".pencarian").focusin(function() {
      $("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
    });
    $('#produk').DataTable();
  });
  $(document).on('click', '.pilih', function(e) {
    document.getElementById("id_user").value = $(this).attr('data-id_user');
    document.getElementById("id_order").value = $(this).attr('data-id_order');
    document.getElementById("id_detail_order").value = $(this).attr('data-id_detail_order');
    $('#myModal').modal('hide');
  });
</script>
<!-- /.content-wrapper -->