<?php
$conn = mysqli_connect("localhost", "root", "", "crud");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


//Function untuk tabel member
function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $email = htmlspecialchars($data["email"]);
    $nomor_hp = htmlspecialchars($data["nomor_hp"]);

    $query = "INSERT INTO member VALUES
                ('','$nama','$nik','$tanggal_lahir','$email','$nomor_hp')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($kode_member) {
    global $conn;
    mysqli_query($conn, "DELETE FROM member WHERE kode_member = $kode_member");
    return mysqli_affected_rows($conn);
}

function update($data) {
    global $conn;

    $kode_member = $data["kode_member"];
    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $email = htmlspecialchars($data["email"]);
    $nomor_hp = htmlspecialchars($data["nomor_hp"]);

    $query = "UPDATE member SET
                nama = '$nama',
                nik = '$nik',
                tanggal_lahir = '$tanggal_lahir',
                email = '$email',
                nomor_hp = '$nomor_hp'
                WHERE kode_member = $kode_member
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
//Function untuk tabel penerbangan
function tambah_penerbangan($data) {
    global $conn;

    $waktu_depart = htmlspecialchars($data["waktu_depart"]);
    $waktu_arrive = htmlspecialchars($data["waktu_arrive"]);
    $tanggal_depart = htmlspecialchars($data["tanggal_depart"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $sisa_kursi = htmlspecialchars($data["sisa_kursi"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $query = "INSERT INTO penerbangan VALUES
                ('','$waktu_depart','$waktu_arrive','$tanggal_depart','$kelas','$sisa_kursi','$keterangan')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_penerbangan($kode_penerbangan) {
    global $conn;
    mysqli_query($conn, "DELETE FROM penerbangan WHERE kode_penerbangan = $kode_penerbangan");
    return mysqli_affected_rows($conn);
}

function update_penerbangan($data) {
    global $conn;

    $kode_penerbangan = $data["kode_penerbangan"];
    $waktu_depart = htmlspecialchars($data["waktu_depart"]);
    $waktu_arrive = htmlspecialchars($data["waktu_arrive"]);
    $tanggal_depart = htmlspecialchars($data["tanggal_depart"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $sisa_kursi = htmlspecialchars($data["sisa_kursi"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $query = "UPDATE penerbangan SET
                waktu_depart = '$waktu_depart',
                waktu_arrive = '$waktu_arrive',
                tanggal_depart = '$tanggal_depart',
                kelas = '$kelas',
                sisa_kursi = '$sisa_kursi',
                keterangan = '$keterangan'
                WHERE kode_penerbangan = $kode_penerbangan
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Function untuk tabel transaksi
function tambah_transaksi($data) {
    global $conn;

    $kode_member = $data["kode_member"];
    $kode_penerbangan = $data["kode_penerbangan"];
    $tanggal_order = htmlspecialchars($data["tanggal_order"]);
    $seat = htmlspecialchars($data["seat"]);
    $bagasi = htmlspecialchars($data["bagasi"]);
    $jenis_pembayaran = htmlspecialchars($data["jenis_pembayaran"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO pesanan VALUES
                ('', '$kode_member', '$kode_penerbangan', '$tanggal_order', '$seat','$bagasi','$jenis_pembayaran','$harga')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_transaksi($kode_pesanan) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pesanan WHERE kode_pesanan = $kode_pesanan");
    return mysqli_affected_rows($conn);
}

function update_transaksi($data) {
    global $conn;

    $kode_pesanan = $data["kode_pesanan"];
    $kode_member = $data["kode_member"];
    $kode_penerbangan = $data["kode_penerbangan"];
    $tanggal_order = htmlspecialchars($data["tanggal_order"]);
    $seat = htmlspecialchars($data["seat"]);
    $bagasi = htmlspecialchars($data["bagasi"]);
    $jenis_pembayaran = htmlspecialchars($data["jenis_pembayaran"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE pesanan SET
                kode_member = '$kode_member',
                kode_penerbangan = '$kode_penerbangan',
                tanggal_order = '$tanggal_order',
                seat = '$seat',
                bagasi = '$bagasi',
                jenis_pembayaran = '$jenis_pembayaran',
                harga = '$harga'
                WHERE kode_pesanan = $kode_pesanan
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>