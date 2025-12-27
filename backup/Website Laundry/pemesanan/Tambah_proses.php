<?php
include __DIR__.'/koneksi.php';

$id_pemesanan = $_POST['id_pemesanan'];
$nama = $_POST['nama'];
$jenis_layanan = $_POST['jenis_layanan'];
$jenis_delivery = $_POST['jenis_delivery'];
$harga_total = $_POST['harga_total'];
$metode_bayar = $_POST['metode_bayar'];

// sql
$sql =  "INSERT INTO pemesanan(id_pemesanan, nama, jenis_layanan, jenis_delivery, harga_total, metode_bayar) VALUES ('$id_pemesanan','$nama', '$jenis_layanan', '$jenis_delivery', '$harga_total', '$metode_bayar')";

if ($koneksi->query($sql) === true) {
    header("location:./index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
$koneksi->close();
?>
