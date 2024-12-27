<!-- pesananController.php -->
<?php
require 'db.php';

function tambahPesanan() {
    global $conn; 

    if (isset($_POST['tambahpesanan'])) {
        $isIdKlien = $_POST['pklien'];
        $isStatus = $_POST['tstatus'];
        $isWaktu = $_POST['twaktu'];

        $insert = mysqli_query($conn, "INSERT INTO tb_pesanan (id_pemesan, waktu_pesan, kstatus) VALUES ('$isIdKlien', '$isWaktu', '$isStatus')");

        if ($insert) {
            header('location:pesanan.php');
        } else {
            echo '<script>alert("Gagal Menambah!!!"); window.location.href="pesanan.php";</script>';
        }
    }
}
?>