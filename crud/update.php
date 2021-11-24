<?php
require 'functions.php';

$kode_member = $_GET["kode_member"];

$mem = query("SELECT * FROM member WHERE kode_member = $kode_member")[0];

$conn = mysqli_connect("localhost", "root", "", "crud");

if(isset($_POST["submit"])){
    
    if(update($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data Member</title>
</head>
<body>
    <h1>Update Data Member</h1>
    <form action="" method="post">
        <input type="hidden" name="kode_member" value="<?= $mem["kode_member"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mem["nama"];?>">
            </li>
            <li>
                <label for="nik">NIK : </label>
                <input type="text" name="nik" id="nik" required value="<?= $mem["nik"];?>">
            </li>
            <li>
                <label for="tanggal_lahir">TTL : </label>
                <input type="text" name="tanggal_lahir" id="tanggal_lahir" required value="<?= $mem["tanggal_lahir"];?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $mem["email"];?>">
            </li>
            <li>
                <label for="nomor_hp">No. HP : </label>
                <input type="text" name="nomor_hp" id="nomor_hp" required value="<?= $mem["nomor_hp"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>
</body>
</html>