<?php
$query = mysqli_query($koneksi,"SELECT * FROM masakan WHERE id_masakan='".$_GET['id']."'")
or die(mysqli_error($koneksi));
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH MENU MASAKAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH MENU MASAKAN</li>
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
            <form role="form" method="post" action="pages/masakan/ubah_masakan_proses.php">
              <div class="box-body">
                <input type="hidden" name="id_masakan" value="<?php echo $row['id_masakan']; ?>">
                <div class="form-group">
                  <label>NAMA MASAKAN</label>
                  <input type="text" name="nama_masakan" class="form-control" placeholder="Nama Masakan" value="<?php echo $row['nama_masakan']; ?>" required>
                </div>
                <div class="form-group">
                  <label>HARGA MASAKAN</label>
                  <input type="number" name="harga" class="form-control" placeholder="Harga Masakan" value="<?php echo $row['harga']; ?>" required>
                </div>
                <div class="form-group">
                  <label>STATUS MASAKAN</label>
                  <select class="form-control" name="status_masakan">
                  <option value="<?php echo $row['status_masakan']; ?>">- <?php echo $row['status_masakan']; ?> -</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
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
<!-- /.content-wrapper -->