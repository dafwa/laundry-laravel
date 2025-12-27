<?php
include_once __DIR__.'/koneksi.php';

$id = $_POST['id'];
$id_pemesanan = $_POST['id_pemesanan'];
$nama = $_POST['nama'];
$jenis_layanan = $_POST['jenis_layanan'];
$jenis_delivery = $_POST['jenis_delivery'];
$harga_total = $_POST['harga_total'];
$metode_bayar = $_POST['metode_bayar'];

$sql = "UPDATE pemesanan SET id_pemesanan = '$id_pemesanan', nama = '$nama', jenis_layanan = '$jenis_layanan', jenis_delivery = '$jenis_delivery', harga_total = '$harga_total', metode_bayar = '$metode_bayar' WHERE id_pemesanan = '$id'";

if ($koneksi->query($sql) === true) {
    header("location:./index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
