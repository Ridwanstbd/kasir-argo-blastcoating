<?php
require 'db.php'; 

function login() {
    global $conn; 
    $err = ''; 
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
        $hitung = mysqli_num_rows($check);
        $user = mysqli_fetch_assoc($check);
        
        if ($hitung > 0) {
            if (password_verify($password, $user['u_password'])) {
                $_SESSION['login'] = 'True';
                header('Location: pesanan.php');
                exit();
            } else {
                $err = "Password Anda salah";
            }
        } else {
            $err = "Username atau password Anda salah";
        }
    }

    // Kembalikan pesan kesalahan jika ada
    return $err;
}
?>