<?php
require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "crud");

if(isset($_POST["submit"])){
    
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Member</title>
</head>
<body>
    <h1>Tambah Data Member</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required="">
            </li>
            <li>
                <label for="nik">NIK : </label>
                <input type="text" name="nik" id="nik" required="">
            </li>
            <li>
                <label for="tanggal_lahir">TTL : </label>
                <input type="text" name="tanggal_lahir" id="tanggal_lahir" required="">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required="">
            </li>
            <li>
                <label for="nomor_hp">No. HP : </label>
                <input type="text" name="nomor_hp" id="nomor_hp" required="">
            </li>
            <li>
                <button type="submit" name="submit">Tambahkan Data</button>
            </li>
        </ul>
    </form>
</body>
</html>