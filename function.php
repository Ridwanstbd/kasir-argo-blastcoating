<?php
session_start();


//menghubungkan ke basis data pesan_db
$isHostDb = 'localhost';
$isUserDb = 'root';
$isPassDb = '';
$isNameDb = 'argo-blastcoating';
$conn =mysqli_connect($isHostDb,$isUserDb,$isPassDb,$isNameDb);
// function login start
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sec_pass = password_hash($password, PASSWORD_BCRYPT);
    $ingataku = $_POST['ingataku'];
    
    $check = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username'");
    $hitung = mysqli_num_rows($check);
    $checkpass = password_verify($password,$sec_pass);
    
        if($hitung>0){
            // berhasil login
            if ($checkpass>0){;
            $_SESSION['login'] = 'True';
            header('location:pesanan.php');}
            else{
                echo '
            <script>alert("password anda salah")
            window.location.href=login.php
            </script>';
            }
        }else{
            //gagal login
            echo '
            <script>alert("username atau password anda salah")
            window.location.href=login.php
            </script>';
            
        }
        
    }
// function login end
// function regist strat
if(isset($_POST['regist'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repass = $_POST['rpass'];
    $sec_pass = password_hash($password, PASSWORD_BCRYPT);
    
    if($password == $repass){
        $sql2 = "INSERT INTO tb_user (username,email,u_password) VALUES ('$username','$email','$sec_pass')";
        $result = mysqli_query($conn,$sql2);
        $_SESSION['regist'] = 'True';
        header('location:login.php');
    }else{
        echo '
            <script>alert("password anda tidak cocok")
            window.location.href=register.php
            </script>';
    }

} 
// function regist end
// function tambah barang end
if(isset($_POST['tambahbarang'])){
    $isNamaBarang = $_POST['nama_barang'];
    $isLayanan = $_POST['layanan'];
    $isHarga = $_POST['harga'];
    $isKetBarang = $_POST['keterangan'];

    $insert = mysqli_query($conn,"INSERT INTO tb_barang (nama_barang,layanan,harga,keterangan) VALUES ('$isNamaBarang','$isLayanan','$isHarga','$isKetBarang')");

    if($insert){
        header(
            'location:barang.php'
        );
    }else{
        echo '
            <script>alert("Gagal Menambah!!!")
            window.location.href=barang.php
            </script>';
    }

}
// function tambah barang end   
if(isset($_POST['tambahklien'])){
    $isNamaKlien = $_POST['namaKlien'];
    $isNoHp = $_POST['noTelepon'];
    $isAlamat = $_POST['alamat'];

    $insert = mysqli_query($conn,"INSERT INTO tb_klien (nama,no_hp,alamat) VALUES ('$isNamaKlien','$isNoHp','$isAlamat')");

    if($insert){
        header(
            'location:klien.php'
        );
    }else{
        echo '
            <script>alert("Gagal Menambah!!!")
            window.location.href=barang.php
            </script>';
    }
}   
if(isset($_POST['tambahpesanan'])){
    $isIdKlien = $_POST['pklien'];
    $isStatus = $_POST['tstatus'];
    $isWaktu = $_POST['twaktu'];

    $insert = mysqli_query($conn,"INSERT INTO tb_pesanan (id_pemesan,waktu_pesan,kstatus) VALUES ('$isIdKlien','$isWaktu','$isStatus')");

    if($insert){
        header(
            'location:pesanan.php'
        );
    }else{
        echo '
            <script>alert("Gagal Menambah!!!")
            window.location.href=pesanan.php
            </script>';
    }
}
   
?>