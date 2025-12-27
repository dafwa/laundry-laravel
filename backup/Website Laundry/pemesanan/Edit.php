<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link rel="stylesheet" href="../css/style-proses.css">
</head>

<body>

    <center>
        <?php
        include __DIR__.'/koneksi.php';
        $id = $_GET['id'];
        $sql = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan = '$id'");
        if (mysqli_num_rows($sql) == 0) {
            header("location:./index.php");
        } else {
            $row = mysqli_fetch_assoc($sql); // Mengambil baris data dari hasil query
        }
        ?>
        <form class="" action="./Edit_proses.php" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $row['id_pemesanan']; ?>">
            <table border="1">
                <tr>
                    <td>ID Pemesan</td>
                    <td>
                        <input type="text" name="id_pemesanan" value="<?php echo $row['id_pemesanan']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td>
                        <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jenis Layanan</td>
                    <td>
                        <select name="jenis_layanan" id="layanan">
                            <option value="<?php echo $row['jenis_layanan']; ?>"><?php echo $row['jenis_layanan']; ?></option>
                            <option value="Cuci Kering">Cuci Kering</option>
                            <option value="Cuci Setrika">Cuci Setrika</option>
                            <option value="Cuci Pengharum">Cuci Pengharum</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Delivery</td>
                    <td>
                        <select name="jenis_delivery" id="delivery">
                            <option value="<?php echo $row['jenis_delivery']; ?>"><?php echo $row['jenis_delivery']; ?></option>
                            <option value="Antar">Antar</option>
                            <option value="Antar Jemput">Antar Jemput</option>
                            <option value="Jemput">Jemput</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Harga Total</td>
                    <td>
                        <input type="text" name="harga_total" value="<?php echo $row['harga_total']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Metode Bayar</td>
                    <td>
                        <select name="metode_bayar" id="bayar">
                            <option value="<?php echo $row['metode_bayar']; ?>"><?php echo $row['metode_bayar']; ?></option>
                            <option value="QRIS">QRIS</option>
                            <option value="DANA">DANA</option>
                            <option value="COD">COD</option>
                            <option value="M-Bank">M-Bank</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" class="btn-submit" value="Update">
                        <button class="btn-back"><a href="index.php" style="text-decoration: none; color: white;">Kembali</a></button>
                    </td>
                </tr>
            </table>
        </form>
    </center>

</body>

</html>
