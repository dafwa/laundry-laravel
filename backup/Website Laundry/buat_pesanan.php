<?php
include 'connect.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi data POST
    $layanan = isset($_POST['layanan']) ? $_POST['layanan'] : null;
    $delivery = isset($_POST['delivery']) ? $_POST['delivery'] : null;
    $harga_per_kg = isset($_POST['harga_per_kg']) ? $_POST['harga_per_kg'] : null;
    $berat = isset($_POST['berat']) ? $_POST['berat'] : null;
    $metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : null;

    if (!$layanan || !$harga_per_kg || !$berat || !$metode_pembayaran || !$delivery) {
      die('<h1>Data tidak lengkap!</h1><p>Mohon lengkapi formulir.</p>');
    }
  

    // Hitung total
    $total = $berat * $harga_per_kg;

    $siapa = $_SESSION['userweb']; 

    // Tampilkan detail pesanan
   echo "<!DOCTYPE html>
   <html>
   <head>
   <link rel='stylesheet' href='css/style-pesanan.css'>
   <link rel='preconnect' href='https://fonts.googleapis.com'>
   <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
   <link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap' rel='stylesheet'>
   </head>
     <body>
       <div class='detail-container'>
              <h2>DETAIL PESANAN $siapa</h2>
              <table>
                  <tr>
                      <th>NO</th>
                      <th>PESANAN</th>
                      <th>HASIL</th>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>LAYANAN</td>
                      <td>$layanan</td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>DELIVERY</td>
                      <td>$delivery</td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>BERAT</td>
                      <td>$berat KG</td>
                  </tr>
                  <tr>
                      <td>4</td>
                      <td>HARGA/KG</td>
                      <td>Rp " . number_format($harga_per_kg, 0, ',', '.') . "</td>
                  </tr>
                  <tr>
                      <td>5</td>
                      <td>TOTAL</td>
                      <td>Rp " . number_format($total, 0, ',', '.') . "</td>
                  </tr>
                  <tr>
                      <td>6</td>
                      <td>METODE PEMBAYARAN</td>
                      <td>$metode_pembayaran</td>
                  </tr>
              </table>
              <br>
              <a href='buat_pesanan.php?layanan=$layanan&harga=$harga_per_kg' class='btn-back'>Kembali</a>
              <a href='tambah_pesanan.php?siapa=$siapa&layanan=$layanan&delivery=$delivery&total=$total&metode_pembayaran=$metode_pembayaran&berat=$berat&harga_per_kg=$harga_per_kg' class='btn-back'>Tambahkan Pesanan</a>
            </div>
     </body>
   </html>";

    exit;
}

// Default nilai
$layanan = isset($_GET['layanan']) ? $_GET['layanan'] : 'default';
$harga_per_kg = isset($_GET['harga']) ? $_GET['harga'] : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Pesanan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style-pesanan.css">
</head>
<body>
  <div class="form-container">
    <h2>Buat Pesanan <?php echo $layanan; ?></h2>
    <form action="buat_pesanan.php" method="post">
      <input type="hidden" name="layanan" value="<?= $layanan ?>">
      <input type="hidden" name="harga_per_kg" value="<?= $harga_per_kg ?>">

      <!-- Input Berat -->
      <label for="berat">Masukkan Berat Cucian Anda (Kg):</label>
      <input type="number" id="berat" name="berat" placeholder="0" step="0.01" required>

      <!-- Delivery Options -->
      <h3>Delivery</h3>
      <div class="delivery-options">
        <label>
        <input type="radio" name="delivery" value="Antar" required>
          <img src="img/antar.jpeg" alt="Antar">
          <br>Antar
        </label>
        <label>
        <input type="radio" name="delivery" value="Antar Jemput">
          <img src="img/antar-jemput.jpeg" alt="Antar Jemput">
          <br>Antar Jemput
        </label>
        <label>
        <input type="radio" name="delivery" value="Jemput">
          <img src="img/jemput.jpeg" alt="Jemput">
          <br>Jemput
        </label>
      </div>

      <!-- Payment Options -->
      <h3>Payment</h3>
      <div class="payment-options">
        <label>
          <input type="radio" name="metode_pembayaran" value="QRIS" required>
          <img src="img/gambar.qris.png" alt="QRIS">
          <br>QRIS
        </label>
        <label>
          <input type="radio" name="metode_pembayaran" value="DANA">
          <img src="img/gambar.dana.jpg" alt="DANA">
          <br>DANA
        </label>
        <label>
          <input type="radio" name="metode_pembayaran" value="COD">
          <img src="img/ilustrasi-cod.jpg" alt="COD">
          <br>COD
        </label>
        <label>
          <input type="radio" name="metode_pembayaran" value="M-Bank">
          <img src="img/gambar.mbank.png" alt="M-Bank">
          <br>M-Bank
        </label>
      </div>

      <!-- Submit Button -->
      <input class="btn-submit" type="submit" name="submit" value="Buat Pesanan" /> 
    </form>
  </div>
</body>
</html>

