<?php
require 'functions.php';

$kode_pesanan = $_GET["kode_pesanan"];

$mem = query("SELECT * FROM pesanan WHERE kode_pesanan = $kode_pesanan")[0];

$member = query("SELECT kode_member, nama FROM member");
$penerbangan = query("SELECT kode_penerbangan, keterangan FROM penerbangan");

$conn = mysqli_connect("localhost", "root", "", "crud");

if(isset($_POST["submit"])){
    
    if(update_transaksi($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'transaksi.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'transaksi.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data Transaksi</title>
</head>
<body>
    <h1>Update Data Transaksi</h1>
    <form action="" method="post">
        <input type="hidden" name="kode_pesanan" value="<?= $mem["kode_pesanan"]; ?>">
        <ul>
        <li>
            <label for="kode_member">Member : </label>
                <select id="kode_member" name="kode_member" class='form-control' required value="<?= $mem["kode_member"];?>">
                    <?php foreach($member as $row) : ?>
                        <option value=<?= $row["kode_member"];?>><?= $row["nama"];?></option>
                    <?php endforeach; ?>
                </select>
            </li>
            <li>
            <label for="kode_penerbangan">Penerbangan : </label>
                <select id="kode_penerbangan" name="kode_penerbangan" class='form-control' required value="<?= $mem["kode_penerbangan"];?>">
                    <?php foreach($penerbangan as $row) : ?>
                        <option value=<?= $row["kode_penerbangan"];?>><?= $row["keterangan"];?></option>
                    <?php endforeach; ?>
                </select>
            </li>
            <li>
                <label for="tanggal_order">Tanggal Order : </label>
                <input type="text" name="tanggal_order" id="tanggal_order" required value="<?= $mem["tanggal_order"];?>">
            </li>
            <li>
                <label for="seat">Seat : </label>
                <input type="text" name="seat" id="seat" required value="<?= $mem["seat"];?>">
            </li>
            <li>
                <label for="bagasi">Bagasi : </label>
                <input type="text" name="bagasi" id="bagasi" required value="<?= $mem["bagasi"];?>">
            </li>
            <li>
                <label for="jenis_pembayaran">Jenis Pembayaran : </label>
                <input type="text" name="jenis_pembayaran" id="jenis_pembayaran" required value="<?= $mem["jenis_pembayaran"];?>">
            </li>
            
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" required value="<?= $mem["harga"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>
</body>
</html>