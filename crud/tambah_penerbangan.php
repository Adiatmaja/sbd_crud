<?php
require 'functions.php';
$conn = mysqli_connect("localhost", "root", "", "crud");

if(isset($_POST["submit"])){
    
    if(tambah_penerbangan($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'penerbangan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'penerbangan.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Penerbangan</title>
</head>
<body>
    <h1>Tambah Data Penerbangan</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="waktu_depart">Waktu Depart : </label>
                <input type="text" name="waktu_depart" id="waktu_depart" required="">
            </li>
            <li>
                <label for="waktu_arrive">Waktu Arrive : </label>
                <input type="text" name="waktu_arrive" id="waktu_arrive" required="">
            </li>
            <li>
                <label for="tanggal_depart">Tanggal Depart : </label>
                <input type="text" name="tanggal_depart" id="tanggal_depart" required="">
            </li>
            <li>
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
                <input type="text" name="sisa_kursi" id="sisa_kursi" required="">
            </li>
            <li>
                <label for="keterangan">Keterangan : </label>
                <input type="text" name="keterangan" id="keterangan" required="">
            </li>
            <li>
                <button type="submit" name="submit">Tambahkan Data</button>
            </li>
        </ul>
    </form>
</body>
</html>