<?php
require('function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Argo Blast Coating Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>

<body class="bg-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-10 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Daftar Akun, Rumiyin...</h1>
                                        <h1 class="h6 text-gray-900 mb-4">ten Sistem Kasir Argo Blast Coating</h1>
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
                                        <h1 class="h6 text-gray-900 mb-4">wes nduwe akun? <a href="login.php">klik iki</a></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>