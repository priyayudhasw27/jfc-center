<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/jfc-center.css" rel="stylesheet">

    <style>

    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">

                            <!-- Header -->
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    <div class="col-sm-3">
                                        <img style="width: 100%;" src="/bootstrap/img/logo-black.png" alt="">
                                    </div>
                                </div>
                                <hr>
                                <h1 class="h6 font-weight-bold text-gray-600 mb-4">Login</h1>
                            </div>
                            <!-- End Header -->

                            <div><?= $errorMessage ?></div>
                            <form class="user" action="/Authentication/Login" method="post">
                                <!-- Username -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="username" required oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Username">
                                    <div id="usernameAlert"></div>
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" required oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Password"> <br>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                            </form>
                            <hr>
                            <div class="text-center">
                                <!--Belum punya akun? <a class="small" href="/Registrasi">Klik di sini untuk mendaftar</a>-->
                                Belum punya akun? <a class="small" href="/Ticketing/Registrasi">Klik di sini untuk mendaftar</a>
                            </div>
                            <div>
                                <a class="btn btn-success btn-user btn-block mt-4" href="/Ticketing/Registrasi">Buy Tickets Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bootstrap/js/sb-admin-2.min.js"></script>

</body>

</html>