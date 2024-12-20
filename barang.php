<?php

    require 'controllers/db.php';
    require 'controllers/barangController.php';

    tambahBarang();
?>
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
    <style>
        /* Modal Styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal.active {
            display: flex;
        }

        .modal-wrapper {
            background-color: white;
            width: 100%;
            max-width: 500px;
            border-radius: 5px;
            position: relative;
        }

        .modal-content {
            position: relative;
        }

        .modal-header {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            padding: 15px;
        }

        .modal-footer {
            padding: 15px;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .modal-close {
            border: none;
            background: none;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0;
            color: #666;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .submit-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancel-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Navbar toggle styles */
        .nav-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
        }

        @media (max-width: 768px) {
            .nav-toggle {
                display: block;
            }

            .nav-menu {
                display: none;
                width: 100%;
            }

            .nav-menu.active {
                display: block;
            }

            .nav-list {
                flex-direction: column;
            }
        }
    </style>
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
                    </li <li class="nav-item">
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
        <h1 class="page-title">Daftar Barang</h1>
        
        <div class="summary-card">
            <div class="card">
                <div class="card-content">
                    <div class="card-info">
                        <div class="card-label">Jumlah Barang</div>
                        <div class="card-value">0</div>
                    </div>
                    <button type="button" class="add-button" data-modal-target="#barang">Tambah Barang</button>
                </div>
            </div>
        </div>

        <div class="data-card">
            <div class="search-section">
                <form method="post">
                    <div class="search-group">
                        <input type="text" name="tcari" class="search-input" placeholder="Masukan Barang !!">
                        <button class="search-btn" type="submit" name="bcari">Cari</button>
                        <button class="reset-btn" type="submit" name="breset">Reset</button>
                    </div>
                </form>
            </div>

            <div class="table-wrapper">
                <table class="data-table">
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
                            $idbarang = $p['id_barang']; // Ambil ID barang
                            $namabarang = $p['nama_barang'];
                            $layanan = $p['layanan'];
                            $harga = $p['harga'];
                            $keterangan = $p['keterangan'];
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$namabarang?></td>
                            <td><?=$layanan?></td>
                            <td><?=$harga?></td>
                            <td><?=$keterangan?></td>
                            <td class="action-cell">
                                <a class="view-btn" href="#" onclick="openEditModal('<?=$idbarang?>', '<?=$namabarang?>', '<?=$layanan?>', '<?=$harga?>', '<?=$keterangan?>')">Ubah</a>
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
    <div class="modal" id="barang">
        <div class="modal-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="modal-close" data-modal-close>&times;</button>
                </div>

                <form method="post">
                    <div class="modal-body">
                        <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-input" required>
                        <input type="text" name="layanan" placeholder="Layanan" class="form-input" required>
                        <input type="number" name="harga" placeholder="Harga" class="form-input" required>
                        <input type="text" name="keterangan" placeholder="Isi Keterangan" class="form-input">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="tambahbarang" class="submit-btn">Tambah</button>
                        <button type="button" class="cancel-btn" data-modal-close>Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="editBarang">
        <div class="modal-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Barang</ <button type="button" class="modal-close" data-modal-close>&times;</button>
                </div>

                <form method="post">
                    <div class="modal-body">
                        <input type="hidden" name="idbarang" id="edit_idbarang">
                        <input type="text" name="nama_barang" id="edit_nama_barang" placeholder="Nama Barang" class="form-input" required>
                        <input type="text" name="layanan" id="edit_layanan" placeholder="Layanan" class="form-input" required>
                        <input type="number" name="harga" id="edit_harga" placeholder="Harga" class="form-input" required>
                        <input type="text" name="keterangan" id="edit_keterangan" placeholder="Isi Keterangan" class="form-input">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="ubahbarang" class="submit-btn">Simpan</button>
                        <button type="button" class="cancel-btn" data-modal-close>Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButtons = document.querySelectorAll('[data-modal-target]');
            const closeModalButtons = document.querySelectorAll('[data-modal-close]');

            openModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.querySelector(button.dataset.modalTarget);
                    openModal(modal);
                });
            });
            window.openEditModal = function(id, nama, layanan, harga, keterangan) {
                const modal = document.querySelector('#editBarang');
                document.getElementById('edit_idbarang').value = id;
                document.getElementById('edit_nama_barang').value = nama;
                document.getElementById('edit_layanan').value = layanan;
                document.getElementById('edit_harga').value = harga;
                document.getElementById('edit_keterangan').value = keterangan;
                
                modal.classList.add('active');
            }

            closeModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('.modal');
                    closeModal(modal);
                });
            });

            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('modal')) {
                    closeModal(e.target);
                }
            });

            function openModal(modal) {
                if (modal == null) return;
                modal.classList.add('active');
            }

            function closeModal(modal) {
                if (modal == null) return;
                modal.classList.remove('active');
            }

            const navToggle = document.getElementById('navToggle');
            const navMenu = document.getElementById('navbarTogglerDemo01');

            if (navToggle && navMenu) {
                navToggle.addEventListener('click', () => {
                    navMenu.classList.toggle('active');
                    navToggle.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>