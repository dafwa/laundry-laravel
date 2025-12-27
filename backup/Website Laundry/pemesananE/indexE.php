<?php
    session_start();
    $koneksi = mysqli_connect('localhost','root','','db_laundry');
    if (empty($_SESSION['username'])) {
        include 'koneksi.php';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="../css/style4.css">
</head>
<body>

    <div class="content">
        <section class="section">
            <div class="box">
                <div class="box-container">
                    <h3>Pemesanan </h3>
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>

            <div class="section-content">
                <div class="box-content pasien">
                    <table border="1">
                        <thead>
                            <tr align="center" style="background-color:#2980B9;">
                                <td>Id Pemesanan</td>
                                <td>Nama</td>
                                <td>Jenis Layanan</td>
                                <td>Jenis Delivery</td>
                                <td>Harga Total</td>
                                <td>Metode Bayar</td>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require __DIR__. '/koneksi.php';
                            $sql = mysqli_query($koneksi, "SELECT * FROM pemesanan");
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id_pemesanan'] ?></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['jenis_layanan'] ?></td>
                                <td><?php echo $row['jenis_delivery'] ?></td>
                                <td><?php echo $row['harga_total'] ?></td>
                                <td><?php echo $row['metode_bayar'] ?></td>
                                <td>
                       

                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <button class="btn" style="margin-right: 10px;">
                 <a href="../employee.php">Kembali</a>
                 </button>
              

                </div>
            </div>
        </section>
    </div>
</body>
</html>
