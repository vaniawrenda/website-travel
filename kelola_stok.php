<?php
include 'koneksi.php';

$id_booking = $_GET['id_booking'];
$sql = "SELECT * FROM booking INNER JOIN paket ON paket.id_paket = booking.id_paket WHERE id_booking = '$id_booking'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($query);

if ($row['jenis_paket'] == 'open'){
    $sql2 = "UPDATE booking SET stok = stok - $row[jumlah_pesanan] WHERE id_paket = '$row[id_paket]'";
}else{
    $sql2 = "UPDATE booking SET stok = stok - 1 WHERE id_paket = '$row[id_paket]'";
}

$query2 = mysqli_query($koneksi, $sql2);
if ($query2){
    echo "<script> window.location.href = 'detail-booking.php' </script>";
}