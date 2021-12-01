<?php
require 'functions.php';

$kode_pesanan = $_GET["kode_pesanan"];

$row = query("SELECT pesanan.kode_pesanan, member.kode_member, member.nama, pesanan.tanggal_order, penerbangan.kode_penerbangan, bandara.nama_bandara, penerbangan.tanggal_depart, penerbangan.waktu_depart, penerbangan.waktu_arrive, penerbangan.kelas FROM pesanan
            INNER JOIN member ON pesanan.kode_member = member.kode_member
            INNER JOIN penerbangan ON pesanan.kode_penerbangan = penerbangan.kode_penerbangan
            INNER JOIN rute ON penerbangan.kode_penerbangan = rute.kode_penerbangan
            INNER JOIN bandara ON rute.kode_bandara = bandara.kode_bandara
            WHERE kode_pesanan = $kode_pesanan")[0];
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
    <th>Kode Pesanan</th>
    <th>Kode Member</th>
    <th>Nama</th>
    <th>Tanggal Order</th>
</tr>
<tr>
    <td><?= $row["kode_pesanan"];?></td>
    <td><?= $row["kode_member"];?></td>
    <td><?= $row["nama"];?></td>
    <td><?= $row["tanggal_order"];?></td>
</tr>
</table>
<br>
<table border = "1" cellpadding = "10" cellspacing = "0">
<tr>
    <th>Kode Penerbangan</th>
    <th>Tujuan</th>
    <th>Tanggal Keberangkatan</th>
    <th>Waktu Keberangkatan</th>
    <th>Waktu Kedatangan</th>
    <th>Kelas</th>
</tr>
<tr>
    <td><?= $row["kode_penerbangan"];?></td>
    <td><?= $row["nama_bandara"];?></td>
    <td><?= $row["tanggal_depart"];?></td>
    <td><?= $row["waktu_depart"];?></td>
    <td><?= $row["waktu_arrive"];?></td>
    <td><?= $row["kelas"];?></td>
</tr>
</table>
<br>
<a href="transaksi.php">Kembali Menuju Transaksi</a>

</body>
</html>