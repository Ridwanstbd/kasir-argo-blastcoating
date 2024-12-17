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

    <title>Argo Blast Coating Login</title>
    <link rel="stylesheet" href="assets/css/style.css">

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
                                        <h1 class="h4 text-gray-900 mb-2">Sugeng Rawuh !!</h1>
                                        <h1 class="h6 text-gray-900 mb-4">ten Sistem Kasir Argo Blast Coating</h1>
                                    </div>
                                    <?php if($err){?>
                                        <div id="login-alert" class="alert alert-danger" role="alert">
                                            <ul><?php echo $err ?></ul>
                                        </div>
                                        <?php } ?>
                                    
                                    <form action=""  method="post" class="user">
                                        <div class="form-group mb-2">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="password" name="password"class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="ingataku" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login</button>
                                        <hr>   
                                    </form>                                
                                    <div class="text-center">
                                        <h1 class="h6 text-gray-900 mb-4">Durung nduwe akun? <a href="register.php">klik iki</a></h1>
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

</body>

</html>