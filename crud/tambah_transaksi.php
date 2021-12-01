<?php
require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "crud");

$member = query("SELECT kode_member, nama FROM member");
$penerbangan = query("SELECT kode_penerbangan, keterangan FROM penerbangan");

if(isset($_POST["submit"])){
    
    if(tambah_transaksi($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'transaksi.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'transaksi.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Transaksi</title>
</head>
<body>
    <h1>Tambah Data Transaksi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="kode_member">Member : </label>
                <select id="kode_member" name="kode_member" class='form-control' required="">
                    <?php foreach($member as $row) : ?>
                        <option value=<?= $row["kode_member"];?>><?= $row["nama"];?></option>
                    <?php endforeach; ?>
                </select>
            </li>
            <li>
            <label for="kode_penerbangan">Penerbangan : </label>
                <select id="kode_penerbangan" name="kode_penerbangan" class='form-control' required="">
                    <?php foreach($penerbangan as $row) : ?>
                        <option value=<?= $row["kode_penerbangan"];?>><?= $row["keterangan"];?></option>
                    <?php endforeach; ?>
                </select>
            </li>
            <li>
                <label for="tanggal_order">Tanggal Order : </label>
                <input type="text" name="tanggal_order" id="tanggal_order" required="">
            </li>
            <li>
                <label for="seat">Seat : </label>
                <input type="text" name="seat" id="seat" required="">
            </li>
            <li>
                <label for="bagasi">Bagasi : </label>
                <input type="text" name="bagasi" id="bagasi">
            </li>
            <li>
                <label for="jenis_pembayaran">Jenis Pembayaran : </label>
                <input type="text" name="jenis_pembayaran" id="jenis_pembayaran" required="">
            </li>
            
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" required="">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Transaksi</button>
            </li>
        </ul>
    </form>
</body>
</html>