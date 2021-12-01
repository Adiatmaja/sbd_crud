<?php
require 'functions.php';

$kode_penerbangan = $_GET["kode_penerbangan"];

$mem = query("SELECT * FROM penerbangan WHERE kode_penerbangan = $kode_penerbangan")[0];

$conn = mysqli_connect("localhost", "root", "", "crud");

if(isset($_POST["submit"])){
    
    if(update_penerbangan($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'penerbangan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'penerbangan.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data Penerbangan</title>
</head>
<body>
    <h1>Update Data Penerbangan</h1>
    <form action="" method="post">
        <input type="hidden" name="kode_penerbangan" value="<?= $mem["kode_penerbangan"]; ?>">
        <ul>
            <li>
                <label for="waktu_depart">Waktu Depart : </label>
                <input type="text" name="waktu_depart" id="waktu_depart" required value="<?= $mem["waktu_depart"];?>">
            </li>
            <li>
                <label for="waktu_arrive">Waktu Arrive : </label>
                <input type="text" name="waktu_arrive" id="waktu_arrive" required value="<?= $mem["waktu_arrive"];?>">
            </li>
            <li>
                <label for="tanggal_depart">Tanggal Depart : </label>
                <input type="text" name="tanggal_depart" id="tanggal_depart" required value="<?= $mem["tanggal_depart"];?>">
            </li>
            <li>
                <label for="kelas">Kelas : </label>
                <label for="kelas">Kelas : </label>
                <select id="kelas" name="kelas" required="">
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Premium Ekonomi">Premium Ekonomi</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="First Class">First Class</option>
                </select>
            </li>
            <li>
                <label for="sisa_kursi">Sisa Kursi : </label>
                <input type="text" name="sisa_kursi" id="sisa_kursi" required value="<?= $mem["sisa_kursi"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>
</body>
</html>