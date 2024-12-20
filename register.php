<?php
    
    require 'controllers/db.php';
    require 'controllers/registerController.php';
    $err = '';
    register();
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


    <title>Argo Blast Coating Daftar</title>
    <link rel="stylesheet" href="assets/css/auth.css">

</head>

<body class="bg-dark">
    <div class="container">
        <!-- Outer Row -->
        <div class="content-center">
            <div class="card shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="mb-2">Daftar Akun, Rumiyin...</h1>
                                    <h4 class="mb-4">ten Sistem Argo Blast Coating</h4>
                                </div>
                                <?php if($err){?>
                                    <div id="login-alert" class="alert alert-danger" role="alert">
                                        <ul><?php echo $err ?></ul>
                                    </div>
                                    <?php } ?>
                                
                                <form action=""  method="post" class="user">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user mb-2"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user mb-2" id="exampleInputEmail"
                                        placeholder="Alamat Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"class="form-control form-control-user mb-2"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                    <input type="password" name="rpass" class="form-control form-control-user mb-2"
                                        id="exampleRepeatPassword" placeholder="Ulangi Password" required>
                                    </div>
                                    
                                    <button type="submit" name="regist" class="btn btn-primary btn-user btn-block">
                                        Daftar</button>
                                    <hr>   
                                </form>                                
                                <div class="text-center">
                                    <h4 class="mb-4">wes nduwe akun? <a href="login.php">klik iki</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>