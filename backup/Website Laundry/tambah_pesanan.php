<?php 
    include 'connect.php';
    session_start();

    $siapa = $_SESSION['userweb'];
    $layanan = $_GET['layanan'];
    $delivery = $_GET['delivery'];
    $total = $_GET['total'];
    $metode_pembayaran = $_GET['metode_pembayaran'];
    
    $berat = $_GET['berat'];
    $harga_per_kg = $_GET['harga_per_kg'];

    // Simpan info pesanan
    $folder = 'pesanan';
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }
    $filename = "$folder/pesanan_" . time() . ".txt";
    $content = "Pemesan: $siapa\nLayanan: $layanan\nBerat: $berat kg\nHarga per kg: Rp $harga_per_kg\nTotal: Rp $total\nMetode Pembayaran: $metode_pembayaran";
    file_put_contents($filename, $content);

    $tambah_pesanan = "INSERT INTO pemesanan(nama, jenis_layanan, jenis_delivery, harga_total, metode_bayar) VALUES ('$siapa','$layanan','$delivery','$total','$metode_pembayaran')";

    if($mysqli->query($tambah_pesanan) === true) {
        $message = "Pesanan anda sudah ditambahkan!";
        header("Location: index.php?alert=" . urlencode($message));
    } else {
        echo "Error: " . $tambah_pesanan . "<br>" . $mysqli->error;
    }
?>