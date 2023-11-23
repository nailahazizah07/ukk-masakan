<?php
include "../../conf/conn.php";

if($_POST){
$id     = $_POST['id_masakan'];
$nama   = $_POST['nama_masakan'];
$harga  = $_POST['harga'];
$status = $_POST['status_masakan'];

$query = ("UPDATE masakan SET nama_masakan='$nama',harga='$harga',status_masakan='$status'WHERE id_masakan ='$id'");
if(!mysqli_query($koneksi,"$query")){
die(mysqli_error);
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_masakan"</script>';
}
}
?>