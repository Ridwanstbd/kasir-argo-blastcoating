<?php
    require 'controllers/loginController.php';
    require 'controllers/klienController.php';
    tambahKlien();
    requireLogin();
?>
<!-- klien.php -->
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Daftar Data Klien</h1>
        
        <div class="summary-card">
            <div class="card">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Jumlah Klien</div>
                        <div class="card-value">0</div>
                    </div>
                    <button type="button" class="add-button" data-modal-target="#pemesan">Tambah Data Klien</button>
                </div>
            </div>
        </div>

        <div class="data-card">
            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Klien</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>                                            
                        </tr>
                    </thead>                                
                    <tbody>
                        <?php
                        $getklien = mysqli_query($conn,"SELECT * FROM tb_klien");
                        $noklien = 1;
                        
                        while($hub=mysqli_fetch_array($getklien)){
                            $namaklien = $hub['nama'];
                            $nomortelepon = $hub['no_hp'];
                            $alamat = $hub['alamat'];
                        ?>
                        <tr>
                            <td><?=$noklien++?></td>
                            <td><?=$namaklien?></td>
                            <td><?=$nomortelepon?></td>
                            <td><?=$alamat?></td>                                           
                            <td class="action-cell">
                                <a class="view-btn" href="#">Ubah</a>
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
    <div class="modal" id="pemesan">
        <div class="modal-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Klien</h4>
                    <button type="button" class="modal-close" data-modal-close>&times;</button>
                </div>

                <form method="post">
                    <div class="modal-body">
                        <input type="text" name="namaKlien" placeholder="Nama Klien" class="form-input" required>
                        <input type="num" name="noTelepon" placeholder="Nomor Telepon" class="form-input" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-input" required>                    
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="tambahklien" class="submit-btn">Tambah</button>
                        <button type="button" class="cancel-btn" data-modal-close>Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>