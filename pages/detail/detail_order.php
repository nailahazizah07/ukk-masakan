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
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body">
            <?php
            include "conf/conn.php";

            if (isset($_GET['id_order'])) {
              $id_order = $_GET['id_order'];
              // $keterangan = $_GET['keterangan'];

              // Fetch the order details using $no_meja and $keterangan
              $query = mysqli_query($koneksi, "SELECT user.nama_user, detail_order.qty, masakan.nama_masakan, masakan.harga, detail_order.id_order
              FROM detail_order
              INNER JOIN masakan ON detail_order.id_masakan = masakan.id_masakan
              INNER JOIN `order` ON detail_order.id_order = `order`.id_order
              INNER JOIN user ON `order`.id_user = user.id_user
              WHERE detail_order.id_order = '$id_order'")
                or die(mysqli_error($koneksi));

              // Initialize variables to store order details
              $nama_user = "";
              $order_items = array();

              if ($row = mysqli_fetch_array($query)) {
                // Get common order details
                $nama_user = $row['nama_user'];

                // Loop through the results to collect dish details
                do {
                  $order_items[] = array(
                    'nama_masakan' => $row['nama_masakan'],
                    'harga' => $row['harga'],
                    'qty' => $row['qty'],
                    'total' => $row['harga'] * $row['qty']
                  );
                } while ($row = mysqli_fetch_array($query));
              }

              // Display the fetched data in a table
              echo "<table class='table table-bordered table-hover'>";
              echo "<thead>";
              echo "<tr>";
              echo "<th>Nama Masakan</th>";
              echo "<th>Harga</th>";
              echo "<th>Qty</th>";
              echo "<th>Total</th>";
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";

              foreach ($order_items as $item) {
                echo "<tr>";
                echo "<td>" . $item['nama_masakan'] . "</td>";
                echo "<td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>";
                echo "<td>" . $item['qty'] . "</td>";
                echo "<td>Rp " . number_format($item['total'], 0, ',', '.') . "</td>";
                echo "</tr>";
              }

              echo "</tbody>";
              echo "</table>";
            } else {
              echo "Invalid request.";
            }
            ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</div>