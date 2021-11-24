<?php
require 'functions.php';

$kode_penerbangan = $_GET["kode_penerbangan"];

if(hapus_penerbangan($kode_penerbangan) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'penerbangan.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'penerbangan.php';
        </script>
    ";
}
?>