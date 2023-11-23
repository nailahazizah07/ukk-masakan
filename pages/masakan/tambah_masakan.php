<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH MENU MASAKAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH MENU MASAKAN</li>
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
            <form role="form" method="post" action="pages/masakan/tambah_masakan_proses.php">
              <div class="box-body">
                <div class="form-group">
                  <label>NAMA MASAKAN</label>
                  <input type="text" name="nama_masakan" class="form-control" placeholder="Nama Masakan" required>
                </div>
                <div class="form-group">
                  <label>HARGA MASAKAN</label>
                  <input type="number" name="harga" class="form-control" placeholder="Harga Masakan" required>
                </div>
                <div class="form-group">
                  <label>STATUS</label>
                  <select class="form-control" name="status_masakan">
                    <option value="">- Pilih Status Masakan -</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                  </select>
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