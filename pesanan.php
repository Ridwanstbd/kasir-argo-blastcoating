<?php
    session_start();
    
    
    require 'controllers/db.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    require 'controllers/pesananController.php';

    tambahPesanan();
?>
<!-- pesanan.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">

    <title>Argo Blast Coating</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>    
    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php"><img src="assets/img/argo-jaya.png" alt="Argo Jaya" class="ikon"></a>
            
            <button class="nav-toggle" type="button" id="navToggle">
                <span class="nav-icon"></span>
            </button>

            <div class="nav-menu" id="navbarTogglerDemo01">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a class="nav-link" href="pesanan.php">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="barang.php">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="klien.php">Klien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="controllers/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Daftar Pesanan</h1>
        
        <div class="summary-card">
            <div class="card">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Jumlah Pesanan</div>
                        <div class="card-value">0</div>
                    </div>
                    <button type="button" class="add-button" data-modal-target="#pesanan">Tambah Pesanan</button>
                </div>
            </div>
        </div>

        <div class="data-card">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Waktu</th>
                            <th>Nama Klien</th>
                            <th>Status</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>                                            
                        </tr>
                    </thead>                                
                    <tbody>
                        <?php 
                        $getpesanan = mysqli_query($conn,"SELECT * FROM tb_pesanan p, tb_klien hub WHERE 
                        p.id_pemesan=hub.id_pemesan");
                        $i = 1;
                        
                        while($p=mysqli_fetch_array($getpesanan)){
                            $idPesanan= $p['id_pesanan'];
                            $idPemesan= $p['nama'];
                            $alamatkl= $p['alamat'];
                            $waktuPesan = $p['waktu_pesan'];
                            $status = $p['kstatus'];                                 
                        ?>
                        <tr>
                            <td><?=$idPesanan ?></td>
                            <td><?=$waktuPesan ?></td>
                            <td><?=$idPemesan ?> - <?=$alamatkl ?></td>
                            <td><?=$status ?></td>
                            <td>Jumlah</td>
                            <td class="action-cell">
                                <a class="view-btn" href="view.php?idp=<?=$idPesanan; ?>" target="blank">Tampilkan</a>
                                <a class="delete-btn" href="#">Hapus</a>
                            </td>
                        </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <span class="copyright">Copyright &copy; Argo Blast Coating 2023</span>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal" id="pesanan">
        <div class="modal-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pesanan</h4>
                    <button type="button" class="modal-close" data-modal-close>&times;</button>
                </div>

                <form method="post">
                    <div class="modal-body">
                        <select name="pklien" class="form-input">
                            <option selected>-- Pilih Klien --</option>
                            <?php 
                            $getklien = mysqli_query($conn,"SELECT * FROM tb_klien");
                            while($kl=mysqli_fetch_array($getklien)){
                                $namaklien = $kl['nama'];
                                $idklien = $kl['id_pemesan'];
                                $alamatklien = $kl['alamat'];
                            ?>
                            <option value="<?=$idklien ?>"><?=$namaklien;?> - <?=$alamatklien;?></option>
                            <?php }; ?>
                        </select>

                        <select class="form-input" name="tstatus">
                            <option selected>-- Pilih Status --</option>
                            <option value="Dalam Antrian">Dalam Antrian</option>
                            <option value="Sedang Diproses">Sedang Diproses</option>
                            <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                        
                        <input type="datetime-local" name="twaktu" class="form-input" placeholder="tambah waktu">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="tambahpesanan" class="submit-btn">Tambah</button>
                        <button type="button" class="cancel-btn" data-modal-close>Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>