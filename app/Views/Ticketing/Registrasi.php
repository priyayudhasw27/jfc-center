<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrasi - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/jfc-center.css" rel="stylesheet">



</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">

                        <!-- Header -->
                        <div class="text-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-3">
                                    <img style="width: 100%;" src="/bootstrap/img/logo-black.png" alt="">
                                </div>
                            </div>
                            <hr>
                            <h1 class="h6 font-weight-bold text-gray-500 mb-3">Registrasi</h1>
                            <h1 class="h6 font-weight-bold text-gray-600 mb-5">Harap isi data sesuai KTP</h1>
                        </div>
                        <!-- End Header -->


                        <!-- FORM -->
                        <form id="registrationForm"class="user" action="/Ticketing/Registrasi/Save" method="post">

                            <!-- BIODATA -->
                            <div class="form-group row">
                                <!-- Nama lengkap -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input required type="text" class="form-control" name="nama_penonton" id="nama_lengkap" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Nama Lengkap">
                                    <div id="nameAlert"></div>
                                </div>
                                <!-- Jenis Kelamin -->
                                <div class="col-sm-6">
                                    <select required class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki - laki">Laki - laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Nomor Hp -->
                            <br>
                            <div class="form-group">
                                <input required type="number" class="form-control" name="nomor_hp" id="nomor_hp" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Nomor HP">
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <input required type="text" class="form-control" name="email" id="email" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Email">
                                <div id="emailAlert"></div>
                            </div>
                            <!-- Alamat -->
                            <div class="form-group">
                                <input required type="text" class="form-control" name="alamat" id="alamat" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Alamat">
                                <div id="alamatAlert"></div>
                            </div>
                            

                            <hr class="mt-4 mb-4">
                            <!-- USER Data -->
                            <div class="text-center">
                                <h3 class="h5 text-gray-900 mb-4">Pilih Username dan Password untuk akun anda</h3>
                            </div>
                            <!-- Username -->
                            <div class="form-group">
                                <input required type="text" class="form-control" name="username" id="username" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Username">
                                <div id="usernameAlert"></div>
                            </div>
                            <div class="form-group row">
                                <!-- Password -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input required type="password" class="form-control" name="password" id="password" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Password">
                                </div>
                                <!-- Confirm Password -->
                                <div class="col-sm-6">
                                    <input required type="password" class="form-control" name="confirmPassword" id="confirmPassword" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Konfirmasi Password"> <br>
                                    <div id="passwordAlert"></div>
                                </div>
                            </div>



                            <!-- Submit Button -->
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input required type="submit" class="btn btn-block btn-primary btn-user" value="Daftar">
                                </div>
                            </div>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/Login">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- custom script -->
    <script>

        // 
        // 
        // DOCUMENT READY FUNCTION =====================================
        $(document).ready(function(e) {
        })


        // 
        // Validation RegExp ================================================
        // Validasi nama lengkap ===========================
        $('#nama_lengkap').change(function(e) {
            var rule = /^[a-zA-Z ]+$/;
            var value = document.getElementById('nama_lengkap').value;
            if (!value.match(rule)) {
                document.getElementById('nameAlert').innerHTML = '<div class="text-danger"><i class="fa fas fa-exclamation-triangle"></i> Nama harus berupa huruf</div>';
            } else {
                document.getElementById('nameAlert').innerHTML = "";
            }
        })
        // Validasi Email ===========================
        $('#email').change(function(e) {
            var rule = /^([a-zA-Z0-9_\.-]+)@([\a-z\.-]+)\.([a-z\.]{2,6})+$/;
            var value = document.getElementById('email').value;
            if (!value.match(rule)) {
                document.getElementById('emailAlert').innerHTML = '<div class="text-danger"><i class="fa fas fa-exclamation-triangle"></i> Format email tidak benar</div>';
            } else {
                document.getElementById('emailAlert').innerHTML = "";
            }
        })
        // Validasi Alamat ===========================
        $('#alamat').change(function(e) {
            var rule = /^[a-zA-Z0-9.-/, ]+$/;
            var value = document.getElementById('alamat').value;
            if (!value.match(rule)) {
                document.getElementById('alamatAlert').innerHTML = '<div class="text-danger"><i class="fa fas fa-exclamation-triangle"></i> Alamat tidak valid</div>';
            } else {
                document.getElementById('alamatAlert').innerHTML = "";
            }
        })
        // Validasi Asal ===========================
        $('#asal').change(function(e) {
            var rule = /^[a-zA-Z0-9.-/ ]+$/;
            var value = document.getElementById('asal').value;
            if (!value.match(rule)) {
                document.getElementById('asalAlert').innerHTML = '<div class="text-danger"><i class="fa fas fa-exclamation-triangle"></i> Input melebihi 50 karakter</div>';
            } else {
                document.getElementById('asalAlert').innerHTML = "";
            }
        })
        // Validasi username ===========================
        var z = $('#username');
        z.change(function(e) {
            $.ajax({
                type: 'POST',
                url: '/Registrasi/ValidateUsername',
                data: {
                    action: 'validate',
                    username: z.val(),
                },
                dataType: 'json',
                success: function(data) {
                    if (data == 'fail') {
                        document.getElementById('usernameAlert').innerHTML = '<div class="text-danger"><i class="fa fas fa-exclamation-triangle"></i> Username sudah digunakan, mohon gunakan yang lain</div>'
                    } else {
                        document.getElementById('usernameAlert').innerHTML = ""
                    }
                }
            })
        })
        // Validasi password ===========================
        var password = $('#password');
        var confirmPassword = $('#confirmPassword');
        confirmPassword.change(function(e) {
            if (confirmPassword.val() == password.val()) {
                document.getElementById('passwordAlert').innerHTML = '';
            } else {
                document.getElementById('passwordAlert').innerHTML = '<div class="text-danger"><i class="fa fas fa-exclamation-triangle"></i> Password tidak sama</div>';
            }
        })

    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bootstrap/js/sb-admin-2.min.js"></script>

</body>

</html>