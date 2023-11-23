<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      PESANAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA MASAKAN</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <?php require_once 'kantong.php'; ?>
          </div>
          <div class="box-body table-responsive">
            <table id="masakan" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NAMA MASAKAN</th>
                  <th>HARGA</th>
                  <th>PEMBELIAN</th>
                  <th>PESAN</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "conf/conn.php";
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM masakan ORDER BY id_masakan DESC");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <form method="POST" action="javascript:void(0);" onsubmit="return false;">
                      <input type="hidden" name="id_masakan" value="<?= $row['id_masakan']; ?>">
                      <td><?php echo $no = $no + 1; ?></td>
                      <td><?php echo $row['nama_masakan']; ?></td>
                      <td><?php echo $row['harga']; ?></td>
                      <td>
                        <div class="quantity">
                          <button class="btn btn-sm btn-default" onclick="kurangi(this)">-</button>
                          <input class="form-control" id="pembelian_<?php echo $row['id_masakan']; ?>" value="1" min="1">
                          <button class="btn btn-sm btn-default" onclick="tambah(this)">+</button>
                        </div>
                      </td>
                      <td>
                        <?php
                        // Tambahkan kondisi untuk memeriksa status masakan
                        if ($row['status_masakan'] == 'Tersedia') {
                        ?>
                          <button class="btn btn-primary" type="button" onclick="showShoppingCart(<?php echo $row['id_masakan']; ?>)">
                            <i class="fa fa-shopping-cart"></i> Tambah Pesanan
                          </button>
                        <?php
                        } else {
                          // Makanan tidak tersedia, tampilkan pesan atau nonaktifkan tombol
                        ?>
                          <button class="btn btn-secondary" type="button" disabled>
                            Menu Tidak Tersedia Untuk Sementara
                          </button>
                        <?php
                        }
                        ?>
                      </td>
                    </form>
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
  <!-- /.content-wrapper -->
  <!-- ... (bagian sebelunya) ... -->
  <!-- Javascript Datatable -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#masakan').DataTable();
    });

    function tambah(element) {
      var input = $(element).parent().find('.form-control');
      input.val(parseInt(input.val()) + 1);
    }

    function kurangi(element) {
      var input = $(element).parent().find('.form-control');
      var currentValue = parseInt(input.val());

      if (currentValue > 1) {
        input.val(currentValue - 1);
      }
    }

    function showShoppingCart(idMasakan) {
      var pembelianValue = document.getElementById('pembelian_' + idMasakan).value;

      // Jika jumlah pembelian telah diisi, langsung submit formulir pesan
      if (pembelianValue !== "") {
        submitForm(idMasakan);
      }
    }

    function submitForm(idMasakan) {
      var jumlahPembelian = document.getElementById('pembelian_' + idMasakan).value;
      // Lakukan sesuatu dengan jumlahPembelian sebelum formulir pesan
      // Contoh: Validasi atau tindakan lainnya

      // Lanjutkan ke formulir pesan
      var form = document.createElement('form');
      form.method = 'POST';
      form.action = 'index.php?page=data_pesan';

      var inputIdMasakan = document.createElement('input');
      inputIdMasakan.type = 'hidden';
      inputIdMasakan.name = 'id_masakan';
      inputIdMasakan.value = idMasakan;

      var inputPembelian = document.createElement('input');
      inputPembelian.type = 'hidden';
      inputPembelian.name = 'pembelian';
      inputPembelian.value = jumlahPembelian;

      form.appendChild(inputIdMasakan);
      form.appendChild(inputPembelian);

      document.body.appendChild(form);
      form.submit();
    }
  </script>
</div>