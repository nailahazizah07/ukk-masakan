<?php
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='".$_GET['id']."'")
or die(mysqli_error($koneksi));
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH USER RESTO
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH USER RESTO</li>
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
            <form role="form" method="post" action="pages/user/ubah_user_proses.php">
              <div class="box-body">
                <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                <div class="form-group">
                  <label>USERNAME</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
                </div>
                <div class="form-group">
                  <label>PASSWORD</label>
                  <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                </div>
                <div class="form-group">
                  <label>NAMA USER</label>
                  <input type="text" name="nama_user" class="form-control" value="<?php echo $row['nama_user']; ?>" required>
                </div>
                <div class="form-group">
                  <label>ID LEVEL</label>
                  <input type="text" name="id_level" id=id_level class="form-control pencarian" value="<?php echo $row['id_level']; ?>" required>
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
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" datadismiss="modal">&times;</button>
<h4 class="modal-title">DATA LEVEL USER</h4>
</div>
<div class="modal-body">
<table id="level" class="table table-bordered">
<thead>
<tr>
<th>NO</th>
<th>NAMA LEVEL</th>
</tr>
</thead>
<tbody>
<?php
include "conf/conn.php";
$no=0;
$query=mysqli_query($koneksi,
"SELECT * FROM level ORDER BY id_level DESC");
while ($row=mysqli_fetch_array($query))
{
?>
<tr class="pilih" data-id_level="<?php echo $row['id_level'];?>">
<td><?php echo $row['id_level']; //echo $no=$no+1;?></td>
<td><?php echo $row['nama_level'];?></td>
</tr>
<?php } ?>
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
$(document).ready(function(){
$(".pencarian").focusin(function() {
$("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
});
$('#level').DataTable();
});
$(document).on('click', '.pilih', function (e) {
document.getElementById("id_level").value = $(this).attr('data-id_level');
$('#myModal').modal('hide');
});
</script>->