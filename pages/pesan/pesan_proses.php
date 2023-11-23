<?php
session_start();
include "../../conf/conn.php";

if ($_POST) {
    // Ambil data dari formulir
    $no_meja = $_POST['no_meja'];
    $id_user = $_POST['id_user'];
    $tanggal = $_POST['tanggal'];
    $total_bayar = $_POST['total_bayar'];

    // Buat pesanan baru
    $insertOrderQuery = mysqli_query($koneksi, "INSERT INTO `order` (no_meja, id_user, tanggal, keterangan) VALUES ('$no_meja', '$id_user', '$tanggal', 'masih dalam proses')");


    if ($insertOrderQuery) {
        // Dapatkan ID pesanan yang baru dibuat
        $id_order = mysqli_insert_id($koneksi);

        // Ambil data dari keranjang belanja
        $cart = unserialize(serialize($_SESSION['kantong_belanja']));

        // Insert data ke dalam tabel 'detail_order' untuk setiap item dalam keranjang
        foreach ($cart as $item) {
            $id_masakan = $item['id_masakan'];
            $qty = $item['pembelian'];
            $harga = $item['harga'];
            $subtotal = $harga * $qty;

            // Insert data ke dalam tabel 'detail_order'
            $insertDetailOrderQuery = mysqli_query($koneksi, "INSERT INTO `detail_order` (id_order, id_masakan, qty, total, keterangan) VALUES ('$id_order', '$id_masakan', '$qty', '$subtotal', 'diproses')");

            if (!$insertDetailOrderQuery) {
                die(mysqli_error($koneksi));
            }
        }

        // Clear keranjang belanja
        unset($_SESSION['kantong_belanja']);

        // Redirect ke halaman yang sesuai
        header('Location: ../../index.php?page=data_order');
    } else {
        echo "<script>alert('Gagal membuat pesanan. Silakan coba lagi.'); window.location.href = '../../index.php?page=data_pesan';</script>";
    }
} else {
    echo "Akses tidak sah";
}
