<?php
require 'functions.php';
$penerbangan = query("SELECT * FROM penerbangan");
?>

<!DOCTYPE html>
<html>
<head>
<title>CRUD Tugas 2</title>
</head>
<body>

<h1>Daftar Penerbangan</h1>

<table border = "1" cellpadding = "10" cellspacing = "0">

<tr>
    <th>Aksi</th>
    <th>Kode Penerbangan</th>
    <th>Waktu Depart</th>
    <th>Waktu Arrive</th>
    <th>Tanggal Depart</th>
    <th>Kelas</th>
    <th>Sisa Kursi</th>
</tr>
<?php foreach($penerbangan as $row) : ?>
<tr>
    <td>
        <a href="update_penerbangan.php?kode_penerbangan=<?= $row["kode_penerbangan"];?>">Update</a>
        <a href="hapus_penerbangan.php?kode_penerbangan=<?= $row["kode_penerbangan"];?>" onclick="return confirm('Apakah anda ingin mengapus data?')">Delete</a>
    </td>
    <td><?= $row["kode_penerbangan"];?></td>
    <td><?= $row["waktu_depart"];?></td>
    <td><?= $row["waktu_arrive"];?></td>
    <td><?= $row["tanggal_depart"];?></td>
    <td><?= $row["kelas"];?></td>
    <td><?= $row["sisa_kursi"];?></td>
</tr>
<?php endforeach; ?>

</table>
<a href="tambah_penerbangan.php">Tambah Data Penerbangan</a>
<br>
<a href="index.php">Menuju Data Member</a>
<br>
<a href="trans.php">Menuju Transaksi</a>

</body>
</html>