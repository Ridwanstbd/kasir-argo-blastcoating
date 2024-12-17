<?php
    require 'function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Argo Blast Coating</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a href="index.php"><img src="assets/img/argo-jaya.png" alt="Argo Jaya" class="ikon" ></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pesanan.php">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="barang.php">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="klien.php" >Klien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="logout.php" >Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-3 mt-3 text-gray-800">Daftar Data Klien</h1>
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                Jumlah Klien </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800 mb-3">0</div>
                            </div>                            
                    </div>
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#pemesan">Tambah Data Klien</button>
                </div>
            </div>
        </div>
            <div class="card p-2">
            <div class="table-responsive">
                  <table class="table">
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
                            $namaklien =$hub['nama'];
                            $nomortelepon =$hub['no_hp'];
                            $alamat =$hub['alamat'];

                        ?>

                            <tr>
                                <td><?=$noklien++?></td>
                                <td><?=$namaklien?></td>
                                <td><?=$nomortelepon?></td>
                                <td><?=$alamat?></td>                                           
                                <td>
                                    <a class="btn btn-warning m-1" href="#">Ubah</a>
                                    <a class="btn btn-danger m-1" href="#">Hapus</a>
                                </td>                                           
                            </tr>
                            <?php };?>
                            </tbody>
                  </table>
            </div>
            </div>
                   
        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Argo Blast Coating 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Page Wrapper -->
        
    </div>
    <!-- Container End -->

            <!-- The Modal -->
        <div class="modal" id="pemesan">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Klien</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="namaKlien" placeholder="Nama Klien" class="form-control mb-2"required>
                    <input type="num" name="noTelepon" placeholder="Nomor Telepon" class="form-control mb-2" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="form-control mb-2" required>                    
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="tambahklien"  class="btn btn-success" >Tambah</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
                
            </div>
        </div>
        </div>

</body>

</html>