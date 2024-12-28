<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'db.php';
require_once 'csrf_handler.php';

function pesanan() {
    global $conn;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['ubahpesanan'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $id_pesanan = filter_var($_POST['idpesanan'], FILTER_SANITIZE_NUMBER_INT);
            $status = sanitizeInput($_POST['tstatus']);
            $waktu = sanitizeInput($_POST['twaktu']);
            
            $stmt = mysqli_prepare($conn, "UPDATE tb_pesanan SET kstatus=?, waktu_pesan=? WHERE id_pesanan=?");
            mysqli_stmt_bind_param($stmt, "ssi", $status, $waktu, $id_pesanan);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: pesanan.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle delete
        elseif (isset($_POST['hapuspesanan'])) {
            if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
                return "Invalid request";
            }
            
            $id_pesanan = filter_var($_POST['idpesanan'], FILTER_SANITIZE_NUMBER_INT);
            
            $stmt = mysqli_prepare($conn, "DELETE FROM tb_pesanan WHERE id_pesanan = ?");
            mysqli_stmt_bind_param($stmt, "i", $id_pesanan);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: pesanan.php");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
        
        // Handle search
        elseif (isset($_POST['bcari'])) {
            $search = sanitizeInput($_POST['tcari']);
            return "SELECT p.*, k.nama, k.alamat FROM tb_pesanan p 
                    JOIN tb_klien k ON p.id_pemesan=k.id_pemesan 
                    WHERE k.nama LIKE '%$search%' OR p.kstatus LIKE '%$search%'";
        }
    }
    
    return "SELECT p.*, k.nama, k.alamat FROM tb_pesanan p 
            JOIN tb_klien k ON p.id_pemesan=k.id_pemesan";
}