<?php
require 'functions.php';
$member = query("SELECT * FROM member");
?>

<!DOCTYPE html>
<html>
<head>
<title>CRUD Tugas 2</title>
</head>
<body>

<h1>Daftar Member</h1>

<table border = "1" cellpadding = "10" cellspacing = "0">

<tr>
    <th>Aksi</th>
    <th>Kode Member</th>
    <th>Nama</th>
    <th>NIK</th>
    <th>Tanggal Lahir</th>
    <th>Email</th>
    <th>Nomor HP</th>
</tr>
<?php foreach($member as $row) : ?>
<tr>
    <td>
        <a href="update.php?kode_member=<?= $row["kode_member"];?>">Update</a>
        <a href="hapus.php?kode_member=<?= $row["kode_member"];?>" onclick="return confirm('Apakah anda ingin mengapus data?')">Delete</a>
    </td>
    <td><?= $row["kode_member"];?></td>
    <td><?= $row["nama"];?></td>
    <td><?= $row["nik"];?></td>
    <td><?= $row["tanggal_lahir"];?></td>
    <td><?= $row["email"];?></td>
    <td><?= $row["nomor_hp"];?></td>
</tr>
<?php endforeach; ?>

</table>
<a href="tambah.php">Tambah Data Member</a>
<br>
<a href="penerbangan.php">Menuju Tabel Penerbangan</a>
<br>
<a href="transaksi.php">Menuju Transaksi</a>

</body>
</html>