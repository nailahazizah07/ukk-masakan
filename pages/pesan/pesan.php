<?php

if (!empty($_SESSION['kantong_belanja'])) {
?>

  <div class="content-wrapper">
    <section class="content-header">
      <h4>Daftar Pesanan Anda</h4>
      <br>

      <table class="table table-bordered table-hover">
        <thead>
          <tr align="center">
            <th>#</th>
            <th>NAMA MASAKAN</th>
            <th>PEMBELIAN</th>
            <th>HARGA</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_SESSION['kantong_belanja'])) {
            $cart = unserialize(serialize($_SESSION['kantong_belanja']));
            $index = 0;
            $no = 1;
            $total = 0;
            $total_bayar = 0;
            for ($i = 0; $i < count($cart); $i++) {
              $total = $_SESSION['kantong_belanja'][$i]['harga'] *
                $_SESSION['kantong_belanja'][$i]['pembelian'];
              $total_bayar += $total;
          ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= $cart[$i]['nama_masakan']; ?></td>
                <td align="center"><?= $cart[$i]['pembelian']; ?></td>
                <td><?= 'Rp ' . number_format($cart[$i]['harga'], 0, ',', '.') ?></td>
                <td><?= 'Rp ' . number_format($total, 0, ',', '.') ?></td>
              </tr>
            <?php
              $index++;
            }
            ?>
            <tr>

              <?php
              include "conf/conn.php";

              // Ambil nomor meja yang belum dipesan
              $query = mysqli_query($koneksi, "SELECT DISTINCT no_meja FROM `order` WHERE keterangan = 'belum pesan'");
              $nomorMejaArray = [];
              while ($row = mysqli_fetch_assoc($query)) {
                $nomorMejaArray[] = $row['no_meja'];
              }
              ?>
              <td colspan="4" align="right"><strong>Total Bayar</strong></td>
              <td><strong><?= 'Rp ' . number_format($total_bayar, 0, ',', '.') ?></strong></td>
              <td align="center">
              </td>
            </tr>
            <form method="POST" action="pages/pesan/pesan_proses.php">
              <tr>
                <td>Total Belanja</td>
                <td><input class="form-control" type="number" name="total_bayar" id="total" value="<?= $total_bayar; ?>" readonly></td>
              </tr>
              <tr>
                <!-- ... -->
              <tr>
                <td>No Meja</td>
                <td>
                  <select name="no_meja" class="form-control" required>
                    <option value="">Pilih Nomor Meja</option>
                    <?php
                    $no_meja_status = array();

                    $queryOrder = mysqli_query($koneksi, "SELECT no_meja FROM `order` WHERE keterangan = 'masih dalam proses'");
                    while ($row = mysqli_fetch_assoc($queryOrder)) {
                      $no_meja_status[$row['no_meja']] = true;
                    }

                    for ($i = 1; $i <= 20; $i++) {
                      if (!isset($no_meja_status[$i])) {
                        echo "<option value='$i'>$i</option>";
                      }
                    }
                    ?>
                  </select>


              </tr>
              <!-- ... -->

              </tr>
              <tr>
                <td>ID User</td>
                <td>
                  <input type="text" name="id_user" id="id_user" class="form-control" placeholder="User" required readonly>

                  <?php
                  // Menambahkan kode untuk mendapatkan ID user dari sesi
                  $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
                  echo '<script>document.getElementById("id_user").value = "' . $id_user . '";</script>';
                  ?>

                  <input type="hidden" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
                </td>
              </tr>
              </tr>
              <tr>
                <td>Username</td>
                <td>
                  <input type="text" name="username" id="username" class="form-control" pplaceholder="User" required readonly>

                  <?php
                  // Menambahkan kode untuk mendapatkan ID user dari sesi
                  $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                  echo '<script>document.getElementById("username").value = "' . $username . '";</script>';
                  ?>
                </td>
              </tr>
              <td colspan="2" align="right"><button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i>
                  Pesan</button>
              </td>
              </tr>
            </form>
        </tbody>

      </table>
      <br>
      <hr>
  <?php
          }
        }
  ?>
  
    </div>
  </div>
  </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".pencarian").focusin(function() {
        $("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
      });
      $('#produk').DataTable();
    });
    $(document).on('click', '.pilih', function(e) {
      document.getElementById("id_user").value = $(this).attr('data-id_user');
      $('#myModal').modal('hide');
    });
  </script>
  </div>
  </div>
  <!-- /.box -->
  </div>
  </div>
  </section>
  <!-- /.content -->