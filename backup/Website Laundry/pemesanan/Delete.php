<?php
require __DIR__.'/koneksi.php';

// Validasi id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID tidak valid.";
    exit;
}

$id = $_GET['id'];

// Persiapkan pernyataan DELETE
$sql = "DELETE FROM pemesanan WHERE id_pemesanan = ?";

// Persiapkan dan jalankan pernyataan menggunakan prepared statement
if ($stmt = $koneksi->prepare($sql)) {
    // Bind parameter
    $stmt->bind_param("i", $id);

    // Jalankan pernyataan
    if ($stmt->execute()) {
        header("location:./index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Tutup pernyataan
    $stmt->close();
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
?>
