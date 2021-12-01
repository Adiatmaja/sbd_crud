<?php
require 'functions.php';

$kode_pesanan = $_GET["kode_pesanan"];

if(hapus_transaksi($kode_pesanan) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'transaksi.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'transaksi.php';
        </script>
    ";
}
?>