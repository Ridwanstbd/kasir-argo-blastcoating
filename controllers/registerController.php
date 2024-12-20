<?php
require 'db.php';

function register() {
    global $conn; 

    if (isset($_POST['regist'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repass = $_POST['rpass'];
        $sec_pass = password_hash($password, PASSWORD_BCRYPT);

        if ($password == $repass) {
            $sql2 = "INSERT INTO tb_user (username, email, u_password) VALUES ('$username', '$email', '$sec_pass')";
            $result = mysqli_query($conn, $sql2);
            $_SESSION['regist'] = 'True';
            header('location:login.php');
        } else {
            echo '<script>alert("Password Anda tidak cocok"); window.location.href="register.php";</script>';
        }
    }
}
?>