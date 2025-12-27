<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
    <link rel="stylesheet" href="../css/style-proses.css">
</head>

<body>

    <center>
        <form class="" action="./tambah_proses.php" method="post">
            <table border="1">
                <tr>
                    <td>ID Pemesanan</td>
                    <td>
                        <input type="text" name="id_pemesanan">
                    </td>
                </tr>
                <tr>
                    <td>Nama </td>
                    <td>
                        <input type="text" name="nama">
                    </td>
                </tr>
                <tr>
                    <td>Jenis Layanan</td>
                    <td>
                        <input type="radio" name="jenis_layanan" id="cucik" value="Cuci Kering" />
                        <label for="cucik">Cuci Kering</label>
                        <input type="radio" name="jenis_layanan" id="cucis" value="Cuci Setrika" />
                        <label for="cucis">Cuci Setrika</label>
                        <input type="radio" name="jenis_layanan" id="cucip" value="Cuci Pengharum" />
                        <label for="cucip">Cuci Pengharum</label>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Delivery</td>
                    <td>
                        <input type="radio" name="jenis_delivery" id="antar" value="Antar" />
                        <label for="antar">Antar</label>
                        <input type="radio" name="jenis_delivery" id="antarjemput" value="Antar Jemput" />
                        <label for="antarjemput">Antar Jemput</label>
                        <input type="radio" name="jenis_delivery" id="jemput" value="Jemput" />
                        <label for="jemput">Jemput</label>
                    </td>
                </tr>
                <tr>
                    <td>Harga Total</td>
                    <td>
                        <input type="text" name="harga_total">
                    </td>
                </tr>
                <tr>
                    <td>Metode Bayar</td>
                    <td>
                        <input type="radio" name="metode_bayar" id="qris" value="QRIS" />
                        <label for="qris">QRIS</label>
                        <input type="radio" name="metode_bayar" id="dana" value="DANA" />
                        <label for="dana">DANA</label>
                        <input type="radio" name="metode_bayar" id="cod" value="COD" />
                        <label for="cod">COD</label>
                        <input type="radio" name="metode_bayar" id="mbank" value="M-Bank" />
                        <label for="mbank">M-Bank</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" name="submit" class="btn-submit" value="Input">
                        <input type="reset" name="reset" class="btn-reset" value="Clear">
                        <button class="btn-back"><a href="index.php" style="text-decoration: none; color: white;">Kembali</a></button>               
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>
