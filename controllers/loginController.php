<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'db.php';
require 'csrf_handler.php';

function login() {
    global $conn;
    $err = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        if (!isset($_POST['csrf_token']) || !validateCSRFToken($_POST['csrf_token'])) {
            return "Invalid request";
        }

        // Sanitize inputs
        $username = sanitizeInput($_POST['username']);
        $password = $_POST['password']; 

        // Prepare the SQL statement
        $stmt = mysqli_prepare($conn, "SELECT * FROM tb_user WHERE username = ?");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                
                if (password_verify($password, $user['u_password'])) {
                    $_SESSION['login'] = 'True';
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    
                    // Refresh CSRF token after login
                    refreshCSRFToken();
                    
                    header('Location: pesanan.php');
                    exit();
                } else {
                    $err = "Password Anda salah";
                }
            } else {
                $err = "Username atau password Anda salah";
            }
            
            mysqli_stmt_close($stmt);
        } else {
            $err = "Database error";
        }
    }

    return $err;
}
function isLoggedIn() {
    return isset($_SESSION['login']) && $_SESSION['login'] === 'True';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}
?>