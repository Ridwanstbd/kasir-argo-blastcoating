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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    
</head>

<body>    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a href="index.php"><img src="img/argo-jaya.png" alt="Argo Jaya" class="ikon" ></a>
            
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
        <h1 class="h3 mb-3 mt-3 text-gray-800">Daftar Pesanan</h1>
        <div class="col-lg-3 col-md-6 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                Jumlah Pesanan </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800 mb-3">0</div>
                            </div>                            
                    </div>
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#pesanan">Tambah Pesanan</button>
                </div>
            </div>
        </div>
            <div class="card p-2">
            <div class="table-responsive">
                  <table class="table">
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
                                p.id_pemesan=hub.id_pemesan");//join
                                $i = 1;
                                
                                while($p=mysqli_fetch_array($getpesanan)){
                                    $idPesanan= $p['id_pesanan'];
                                    $idPemesan= $p['nama']; // pemanggilan nama yang sudah di join
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
                                    <td>
                                        <a class="btn btn-success m-1" href="view.php?idp=<?=$idPesanan; ?>" target="blank" >Tampilkan</a>
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
        <div class="modal" id="pesanan">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pesanan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <select name="pklien" class="form-select mb-1 mt-1" >
                    <option selected>-- Pilih Klien --</option>
                        <?php 
                        $getklien = mysqli_query($conn,"SELECT * FROM tb_klien");

                        while($kl=mysqli_fetch_array($getklien)){
                            $namaklien = $kl['nama'];
                            $idklien = $kl['id_pemesan'];
                            $alamatklien = $kl['alamat'];

                        ?>
                        <option value="<?=$idklien ?>"><?= $namaklien ;?> - <?=$alamatklien ;?></option>
                            <?php
                        };
                        ?>
                        


                    </select>

                    <select class="form-select mb-1 mt-1" name="tstatus" aria-label="Default select example">
                            <option selected>-- Pilih Status --</option>
                            <option value="Dalam Antrian">Dalam Antrian</option>
                            <option value="Sedang Diproses">Sedang Diproses</option>
                            <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    
                    <input class="form-control" type="datetime-local" name="twaktu" placeholder="tambah waktu">
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="tambahpesanan"  class="btn btn-success" >Tambah</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
                
            </div>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>