<?php
    if (empty($_SESSION['username'])) {
        include './koneksi.php';
    }
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
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
                                <td>Action</td>
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
                                <button class="b1" style="margin-right: 15px;">
                               <a href="./Edit.php?id=<?php echo $row['id_pemesanan']; ?>">Edit</a>
                               </button>
                               <button class="b2">
                               <a href="./Delete.php?id=<?php echo $row['id_pemesanan']; ?>">Delete</a>
                               </button>

                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <button class="btn" style="margin-right: 10px;">
                 <a href="../admin.php">Kembali</a>
                 </button>
                 <button class="b3">
                <a href="./Tambah.php">Tambah</a>
                </button>

                </div>
            </div>
        </section>
    </div>
</body>
</html>
