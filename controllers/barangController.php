<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'db.php';
require_once 'csrf_handler.php';

function barang() {
    global $conn;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle CRUD operations
        if (isset($_POST['tambahbarang'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $nama_barang = sanitizeInput($_POST['nama_barang']);
            $layanan = sanitizeInput($_POST['layanan']);
            $harga = filter_var($_POST['harga'], FILTER_SANITIZE_NUMBER_INT);
            $keterangan = sanitizeInput($_POST['keterangan']);
            
            $stmt = mysqli_prepare($conn, "INSERT INTO tb_barang (nama_barang, layanan, harga, keterangan) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssds", $nama_barang, $layanan, $harga, $keterangan);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: barang.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle edit
        elseif (isset($_POST['ubahbarang'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $id_barang = filter_var($_POST['idbarang'], FILTER_SANITIZE_NUMBER_INT);
            $nama_barang = sanitizeInput($_POST['nama_barang']);
            $layanan = sanitizeInput($_POST['layanan']);
            $harga = filter_var($_POST['harga'], FILTER_SANITIZE_NUMBER_INT);
            $keterangan = sanitizeInput($_POST['keterangan']);
            
            $stmt = mysqli_prepare($conn, "UPDATE tb_barang SET nama_barang=?, layanan=?, harga=?, keterangan=? WHERE id_barang=?");
            mysqli_stmt_bind_param($stmt, "ssdsi", $nama_barang, $layanan, $harga, $keterangan, $id_barang);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: barang.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle delete
        elseif (isset($_POST['hapusbarang'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $id_barang = filter_var($_POST['idbarang'], FILTER_SANITIZE_NUMBER_INT);
            
            $stmt = mysqli_prepare($conn, "DELETE FROM tb_barang WHERE id_barang = ?");
            mysqli_stmt_bind_param($stmt, "i", $id_barang);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: barang.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle search
        elseif (isset($_POST['bcari'])) {
            $search = sanitizeInput($_POST['tcari']);
            return "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$search%' OR layanan LIKE '%$search%'";
        }
    }
    
    return "SELECT * FROM tb_barang";
}
?>