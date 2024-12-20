<?php
require 'db.php';

function tambahKlien() {
    global $conn; 

    if (isset($_POST['tambahklien'])) {
        $isNamaKlien = $_POST['namaKlien'];
        $isNoHp = $_POST['noTelepon'];
        $isAlamat = $_POST['alamat'];

        $insert = mysqli_query($conn, "INSERT INTO tb_klien (nama, no_hp, alamat) VALUES ('$isNamaKlien', '$isNoHp', '$isAlamat')");

        if ($insert) {
            header('location:klien.php');
        } else {
            echo '<script>alert("Gagal Menambah!!!"); window.location.href="klien.php";</script>';
        }
    }
}
?>