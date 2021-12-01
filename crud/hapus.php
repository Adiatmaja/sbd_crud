<?php
require 'functions.php';

$kode_member = $_GET["kode_member"];

if(hapus($kode_member) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'index.php';
        </script>
    ";
}
?>