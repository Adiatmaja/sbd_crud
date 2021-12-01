<?php
require 'functions.php';
$transaksi = query("SELECT * FROM pesanan INNER JOIN detail_pesanan ON ");
?>

<!DOCTYPE html>
<html>
<head>
<title>CRUD Tugas 2</title>
</head>
<body>

<h1>Daftar Transaksi</h1>

<table border = "1" cellpadding = "10" cellspacing = "0">

<tr>
    <th>Aksi</th>
    <th>Kode Pesanan</th>
    <th>Kode Member</th>
    <th>Kode Penerbangan</th>
    <th>Tanggal Order</th>
    <th>Seat</th>
    <th>Bagasi</th>
    <th>Total Bayar</th>
    <th>Jenis Pembayaran</th>
</tr>
<?php foreach($transaksi as $row) : ?>
<tr>
    <td>
        <a href="update_transaksi.php?kode_pesanan=<?= $row["kode_pesanan"];?>">Update</a>
        <a href="hapus_transaksi.php?kode_pesanan=<?= $row["kode_pesanan"];?>" onclick="return confirm('Apakah anda ingin mengapus data?')">Delete</a>
    </td>
    <td><?= $row["kode_pesanan"];?></td>
    <td><?= $row["kode_member"];?></td>
    <td><?= $row["kode_penerbangan"];?></td>
    <td><?= $row["tanggal_order"];?></td>
    <td><?= $row["seat"];?></td>
    <td><?= $row["bagasi"];?></td>
    <td><?= $row["total_bayar"];?></td>
    <td><?= $row["jenis_pembayaran"];?></td>
</tr>
<?php endforeach; ?>

</table>
<a href="tambah_transaksi.php">Tambah Transaksi</a>
<br>
<a href="index.php">Menuju Tabel Member</a>
<br>
<a href="penerbangan.php">Menuju Tabel Penerbangan</a>

</body>
</html>