<?php
require 'db.php'; 

function tambahBarang() {
    global $conn; 

    if (isset($_POST['tambahbarang'])) {
        $isNamaBarang = $_POST['nama_barang'];
        $isLayanan = $_POST['layanan'];
        $isHarga = $_POST['harga'];
        $isKetBarang = $_POST['keterangan'];

        $insert = mysqli_query($conn, "INSERT INTO tb_barang (nama_barang, layanan, harga, keterangan) VALUES ('$isNamaBarang', '$isLayanan', '$isHarga', '$isKetBarang')");

        if ($insert) {
            header('location:barang.php');
        } else {
            echo '<script>alert("Gagal Menambah!!!"); window.location.href="barang.php";</script>';
        }
    }
}
?>