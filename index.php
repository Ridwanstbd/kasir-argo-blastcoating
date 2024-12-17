<?php 
    require 'function.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Argo Blast Coating</title>
</head>
<body class="index" >
    <!-- hero section start -->
    <section class="hero">
    </section>
    <section class="introduce" >
        <main class="content">
            <h1>Mesin Classicmu Kotor? Yuk di Restorasi aja..</h1>
            <p>Vapour Blasting & Powder Coating solusinya...</p>
        </main>
    </section>
    <!-- hero section end -->
    <!-- button floating -->
    <div class="btn-cek-pesan" >
        <a id="hrg" href="#harga">Cek Harga</a>
        <a id="psn" href="https://wa.wizard.id/9c9fa8" target="blank" >Pesan Sekarang</a>
    </div>
    <!-- button floating -->
    <!-- testimoni -->
    <section class="testimoni">
        <h2>Hasil <span>Restorasi</span> Kami</h2>
        <p>Berikut ini Hasil Restorasi Mesin Klien Kami</p>

        <div class="row">
            <div class="menu" >
                <div class="col">
                    <img src="assets/img/1.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/2.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/3.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/4.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/5.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/6.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/7.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/8.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/9.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/10.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/11.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/12.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/13.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/14.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/15.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/16.png" alt="">
                </div>
                <div class="col">
                    <img src="assets/img/17.png" alt="">
                </div>
            </div>
            
        </div>
    </section>
    <!-- testimoni -->
    <!-- Daftar harga -->

    <section class="daftar-harga" id="harga" >
        <main class="card">
            <h2 class="judul">
                Daftar Harga
            </h2>
            <p>
                Silakan cek harga di tabel sesuai dengan barang yang akan direstorasi
            </p>
        </main>
        <table class="tb-view" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Layanan</th>
                        <th>Harga</th>                    
                    </tr>
                </thead>                                
                <tbody>
                <?php 
                    $getbarang = mysqli_query($conn,"SELECT * FROM tb_barang");
                    $i = 1;
                                
                    while($p=mysqli_fetch_array($getbarang)){
                    $namabarang = $p['nama_barang'];
                    $layanan = $p['layanan'];
                    $harga = $p['harga'];
                    ?>
                    <tr>
                    <td><?=$i++ ?></td>
                    <td><?=$namabarang ?></td>
                    <td><?=$layanan ?></td>
                    <td><?=$harga ?></td>
                    </tr>
                    <?php
                    };

                ?>
                </tbody>
        </table>
    </section>

    <!-- Daftar harga -->
    <!-- footer -->

    <footer >
        <div class="ft">
           <div class="ft-cpy">
             <span>Copyright &copy; Argo Blast Coating 2023</span>
            </div>
        </div>
    </footer>

    <!-- footer -->
</body>
</html>