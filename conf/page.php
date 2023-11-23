<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda

      //data masakan
    case 'data_masakan':
      include 'pages/masakan/data_masakan.php';
      break;
    case 'tambah_masakan':
      include 'pages/masakan/tambah_masakan.php';
      break;
    case 'ubah_masakan';
      include 'pages/masakan/ubah_masakan.php';
      break;

      //data level
    case 'data_level':
      include 'pages/level/data_level.php';
      break;
    case 'tambah_level':
      include 'pages/level/tambah_level.php';
      break;
    case 'ubah_level';
      include 'pages/level/ubah_level.php';
      break;

      //data user
    case 'data_user':
      include 'pages/user/data_user.php';
      break;
    case 'tambah_user':
      include 'pages/user/tambah_user.php';
      break;
    case 'ubah_user';
      include 'pages/user/ubah_user.php';
      break;

      //data order
    case 'data_order':
      include 'pages/order/data_order.php';
      break;
    case 'tambah_order':
      include 'pages/order/tambah_order.php';
      break;
    case 'ubah_order';
      include 'pages/order/ubah_order.php';
      break;
      
      //data transaksi
    case 'data_transaksi':
      include 'pages/transaksi/data_transaksi.php';
      break;
    case 'tambah_transaksi':
      include 'pages/transaksi/tambah_transaksi.php';
      break;
    case 'ubah_transaksi';
      include 'pages/transaksi/ubah_transaksi.php';
      break;

      //data pesan
    case 'data_pesan':
      include 'pages/pesan/data.php';
      break;
    case 'tambah_pesan':
      include 'pages/pesan/tambah.php';
      break;
    case 'pesan';
      include 'pages/pesan/pesan.php';
      break;

      //data detail order
    case 'data_detail':
      include 'pages/detail/data_detail.php';
      break;
      case 'detail_order':
      include 'pages/detail/detail_order.php';
      break;

  }
} else {
  include "pages/beranda.php";
}
