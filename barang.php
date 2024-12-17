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

    <link rel="stylesheet" href="style.css">


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
        <h1 class="h3 mb-3 mt-3 text-gray-800">Daftar Barang</h1>
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                Jumlah Barang </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800 mb-3">0</div>
                            </div>                            
                    </div>
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#barang">Tambah Barang</button>
                </div>
            </div>
        </div>
            <div class="card p-2">
                <div class="col-md-6">
                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="tcari" class="form-control" placeholder="Masukan Barang !!" >
                            <button class="btn btn-primary" type="bsubmit" name="bcari" >Cari</button>
                            <button class="btn btn-danger" type="breset" name="breset" >Reset</button>
                        </div>
                    </form>
                </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Layanan</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>                                            
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
                                    $keterangan= $p['keterangan'];

                                    ?>
                                <tr>
                                    <td><?=$i++ ?></td>
                                    <td><?=$namabarang ?></td>
                                    <td><?=$layanan ?></td>
                                    <td><?=$harga ?></td>
                                    <td><?=$keterangan ?></td>
                                    <td>
                                        <a class="btn btn-warning m-1" href="#">Ubah</a>
                                        <a class="btn btn-danger m-1" href="#">Hapus</a>
                                    </td>

                                                                                
                                </tr>
                                <?php
                                    };

                                ?>
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
        <div class="modal" id="barang">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control mb-2"required>
                    <input type="text" name="layanan" placeholder="Layanan" class="form-control mb-2" required>
                    <input type="num" name="harga" placeholder="Harga" class="form-control mb-2" required>
                    <input type="text" name="keterangan" placeholder="Isi Keterangan" class="form-control mb-2">   
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="tambahbarang"  class="btn btn-success" >Tambah</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
                
            </div>
        </div>
        </div>

</body>

</html>