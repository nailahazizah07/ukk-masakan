<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA USER RESTO MUAK
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA USER RESTO MUAK</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=tambah_user" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          </div>

          <div class="box-body table-responsive">
            <table id="user" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>NAMA USER</th>
                  <th>NAMA LEVEL</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>

                <?php
                include "conf/conn.php";
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT user.*, level.nama_level FROM user 
                inner join level on user.id_level=level.id_level
                 ORDER BY user.id_user DESC")
                  or die(mysqli_error($koneksi));
                while ($row = mysqli_fetch_array($query)) {
                ?>

                  <tr>
                    <td><?php echo $no = $no + 1; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['nama_user']; ?></td>
                    <td><?php echo $row['nama_level']; ?></td>
                    <td>
                      <a href="index.php?page=ubah_user&id=<?= $row['id_user']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="pages/user/hapus_user.php?id=<?= $row['id_user']; ?>" class="btn btn-danger" role="button" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <i class="glyphicon glyphicon-trash"></i>
                    </td>
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
    $('#masakan').DataTable();
  });
</script>