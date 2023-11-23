<?php
include "../../conf/conn.php";

$id    = $_GET['id'];
$query = ("DELETE FROM user WHERE id_user ='$id'");

if(!mysqli_query($koneksi,"$query")){
    die(mysqli_error);
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_user"</script>';
}
?>