<?php
require_once 'vendor/autoload.php'; // Atau sesuaikan path ke autoload.php

use Dompdf\Dompdf;

// Inisialisasi objek Dompdf
$dompdf = new Dompdf();

// Konten HTML yang akan dijadikan PDF
$html = '<h1>Laporan Mahasiswa</h1><p>Isi laporan Anda di sini.</p>';

// Memasukkan konten HTML ke dalam DOMPDF
$dompdf->loadHtml($html);

// Menyusun konten menjadi format PDF
$dompdf->setPaper('A4', 'portrait');

// Render PDF (convert HTML menjadi PDF)
$dompdf->render();

// Menyimpan atau menampilkan PDF di browser
$dompdf->stream('laporan_mahasiswa.pdf', array('Attachment' => false));
?>
