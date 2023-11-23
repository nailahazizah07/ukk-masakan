<?php
include "../../conf/conn.php";

if ($_POST) {
    $id_user = $_POST['id_user'];
    $id_order = $_POST['id_order'];
    $id_detail_order = $_POST['id_detail_order'];

    // Update status detail_order menjadi 'selesai diproses'
    $updateDetailOrder = "UPDATE detail_order SET keterangan = 'selesai diproses' WHERE id_detail_order = '$id_detail_order'";
    if (!mysqli_query($koneksi, $updateDetailOrder)) {
        die(mysqli_error($koneksi));
    }

    // Cek apakah masih ada detail_order yang sedang diproses untuk order tersebut
    $queryCekDetailOrder = "SELECT COUNT(*) AS count FROM detail_order WHERE id_order = '$id_order' AND keterangan = 'diproses'";
    $resultCekDetailOrder = mysqli_query($koneksi, $queryCekDetailOrder);
    $rowCekDetailOrder = mysqli_fetch_assoc($resultCekDetailOrder);
    $countDetailOrder = $rowCekDetailOrder['count'];

    if ($countDetailOrder == 0) {
        // Jika tidak ada detail_order yang sedang diproses, update status order menjadi 'selesai diproses'
        $updateOrder = "UPDATE `order` SET keterangan = 'selesai diproses' WHERE id_order = '$id_order'";
        if (!mysqli_query($koneksi, $updateOrder)) {
            die(mysqli_error($koneksi));
        }

        // Ambil informasi tambahan yang diperlukan dari tabel `order` atau tabel lain sesuai kebutuhan
        $queryOrderInfo = "SELECT * FROM `order` WHERE id_order = '$id_order'";
        $resultOrderInfo = mysqli_query($koneksi, $queryOrderInfo);
        $rowOrderInfo = mysqli_fetch_assoc($resultOrderInfo);

        // Ambil total bayar dari tabel detail_order
        $queryTotalBayar = "SELECT SUM(total) AS total_bayar FROM detail_order WHERE id_order = '$id_order'";
        $resultTotalBayar = mysqli_query($koneksi, $queryTotalBayar);
        $rowTotalBayar = mysqli_fetch_assoc($resultTotalBayar);
        $total_bayar_detail_order = $rowTotalBayar['total_bayar'];

        // Masukkan data ke tabel transaksi
        $insertTransaksi = "INSERT INTO transaksi(id_user, id_order, tanggal, total_bayar) VALUES ('$id_user', '$id_order', NOW(), '$total_bayar_detail_order')";
        if (!mysqli_query($koneksi, $insertTransaksi)) {
            die(mysqli_error($koneksi));
        }
    }

    // Proses transaksi lainnya sesuai kebutuhan Anda
    // ...

    // Redirect ke halaman yang sesuai setelah proses selesai
    header('Location: ../../index.php?page=data_transaksi');
} else {
    // Redirect ke halaman lain jika POST tidak ada
    header('Location: ../../index.php?page=tambah_transaksi');
}
