<head>
  <script src="script.js"></script>
  <style>
    @media print {
      body * {
        visibility: hidden;
      }

      table {
        visibility: visible;
      }

      .hide-on-print {
        visibility: hidden;
      }
    }
  </style>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA TRANSAKSI
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA TRANSAKSI</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=tambah_transaksi" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>Tambah</a>
            <button class="btn btn-info" onclick="printTable();"><i class="glyphicon glyphicon-print"></i>Print</button>

          </div>

          <div class="box-body table-responsive">
            <table id="transaksi" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA USER</th>
                  <th>NO MEJA</th>
                  <th>TANGGAL</th>
                  <th>TOTAL BAYAR</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT transaksi.id_transaksi, user.nama_user, `order`.no_meja, transaksi.tanggal, transaksi.total_bayar FROM transaksi
                  INNER JOIN `order` ON transaksi.id_order = `order`.id_order
                  INNER JOIN user ON transaksi.id_user = user.id_user
                  ORDER BY transaksi.id_transaksi DESC")
                  or die(mysqli_error($koneksi));

                while ($row = mysqli_fetch_array($query)) {
                  $total_bayar = $row['total_bayar'];

                ?>

                  <tr>
                    <td><?php echo $no = $no + 1; ?></td>
                    <td><?php echo $row['nama_user']; ?></td>
                    <td><?php echo $row['no_meja']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></td>
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
    $('#transaksi').DataTable();
  });
</script>
<script>
  function printTable() {
    var printContents = document.querySelector("#transaksi").outerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>