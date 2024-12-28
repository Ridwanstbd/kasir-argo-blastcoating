<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'db.php';
require_once 'csrf_handler.php';

function klien() {
    global $conn;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle CRUD operations
        if (isset($_POST['tambahklien'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $nama_klien = sanitizeInput($_POST['namaKlien']);
            $no_telepon = sanitizeInput($_POST['noTelepon']);
            $alamat = sanitizeInput($_POST['alamat']);
            
            $stmt = mysqli_prepare($conn, "INSERT INTO tb_klien (nama, no_hp, alamat) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sss", $nama_klien, $no_telepon, $alamat);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: klien.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle edit
        elseif (isset($_POST['ubahklien'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $id_klien = filter_var($_POST['idklien'], FILTER_SANITIZE_NUMBER_INT);
            $nama_klien = sanitizeInput($_POST['namaKlien']);
            $no_telepon = sanitizeInput($_POST['noTelepon']);
            $alamat = sanitizeInput($_POST['alamat']);
            
            $stmt = mysqli_prepare($conn, "UPDATE tb_klien SET nama=?, no_hp=?, alamat=? WHERE id_klien=?");
            mysqli_stmt_bind_param($stmt, "sssi", $nama_klien, $no_telepon, $alamat, $id_klien);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: klien.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle delete
        elseif (isset($_POST['hapusklien'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $id_klien = filter_var($_POST['idklien'], FILTER_SANITIZE_NUMBER_INT);
            
            $stmt = mysqli_prepare($conn, "DELETE FROM tb_klien WHERE id_klien = ?");
            mysqli_stmt_bind_param($stmt, "i", $id_klien);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: klien.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle search
        elseif (isset($_POST['bcari'])) {
            $search = sanitizeInput($_POST['tcari']);
            return "SELECT * FROM tb_klien WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%'";
        }
    }
    
    return "SELECT * FROM tb_klien";
}