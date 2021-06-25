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
                        <form id="registrationForm" enctype="multipart/form-data" class="user" action="/Registrasi/Save" method="post">

                            <!-- BIODATA -->
                            <div class="form-group row">
                                <!-- Nama lengkap -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input required type="text" class="form-control" name="nama_peserta" id="nama_lengkap" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Nama Lengkap">
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
                            <div class="mb-3">
                                Tanggal Lahir
                            </div>
                            <div class="form-group">
                                <input required type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Tanggal Lahir">
                            </div>
                            <!-- Nomor Hp -->
                            <br>
                            <div class="form-group">
                                <input required type="number" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor HP">
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <input required type="text" class="form-control" name="email" id="email" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Email">
                                <div id="emailAlert"></div>
                            </div>
                            <!-- Alamat -->
                            <div class="form-group">
                                <input required type="text" class="form-control" name="alamat" id="alamat" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Alamat">
                                <div id="alamatAlert"></div>
                            </div>
                            <div class="form-group row">
                                <!-- Kecamatan -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input required type="text" class="form-control" name="kecamatan" id="kecamatan" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Kecamatan">
                                    <div id="kecamatanAlert"></div>
                                </div>
                                <!-- Kabupaten -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input required type="text" class="form-control" name="kabupaten" id="kabupaten" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Kabupaten">
                                    <div id="kabupatenAlert"></div>
                                </div>
                                <!-- Provinsi -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input required type="text" class="form-control" name="provinsi" id="provinsi" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Provinsi">
                                    <div id="provinsiAlert"></div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <!-- Asal -->
                                <input required type="text" class="form-control" name="asal" id="asal" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Asal Sekolah/Instansi">
                                <div id="asalAlert"></div>
                            </div>



                            <!-- Kategori Event -->
                            <div class="form-group">
                                <select required class="form-control" id="kategori" name="id_kategori">
                                    <option value="">-Pilih Kategori Event-</option>
                                    <?php foreach ($kategori as $kategoriItem) : ?>
                                        <option value=<?= $kategoriItem->id_kategori ?>><?= $kategoriItem->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- Sub Kategori -->
                            <div class="form-group">
                                <select class="form-control" id="subKategori" name="id_sub_kategori">
                                    <option value="">-Pilih Sub Kategori-</option>
                                    <?php foreach ($subKategori as $subKategoriItem) : ?>
                                        <option value=<?= $subKategoriItem->id_sub_kategori ?>><?= $subKategoriItem->nama_sub_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- Keterangan -->
                            <div class="form-group">
                                <input required type="text" class="form-control" name="keterangan" id="keterangan" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Keterangan (Optional)">
                            </div>
                            <br>
                            <!-- Prestasi -->
                            <div class="form-group">
                                <textarea required class="form-control" name="prestasi" id="prestasi" form="registrationForm" cols="30" rows="10" placeholder="Tuliskan prestasi yang pernah anda raih"></textarea>
                            </div>
                            <hr class="mt-4 mb-4">
                            <!-- Profil Photos -->
                            <div class="form-group row d-flex">
                                <div class="col-5 mb-3 mb-sm-3">
                                    <img id="preview" style="width: 100%; aspect-ratio: 1/1; object-fit: cover; border-radius: 100%" src="/bootstrap/img/blank-profile.png">
                                </div>
                                <div class="col-5 mb-3 mb-sm-3">
                                    <div class="h6 font-weight-bold">Pilih foto profil</div>
                                    <input required onchange="readURL(this);" type="file" name="profilePhoto" id="profilePhoto">
                                </div>
                            </div>





                            <hr class="mt-4 mb-4">
                            <!-- USER Data -->
                            <div class="text-center">
                                <h3 class="h5 text-gray-900 mb-4">Pilih Username dan Password untuk akun anda</h3>
                            </div>
                            <!-- Username -->
                            <div class="form-group">
                                <input required type="text" class="form-control" name="username" id="username" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Username">
                                <div id="usernameAlert"></div>
                            </div>
                            <div class="form-group row">
                                <!-- Password -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input required type="password" class="form-control" name="password" id="password" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Password">
                                </div>
                                <!-- Confirm Password -->
                                <div class="col-sm-6">
                                    <input required type="password" class="form-control" name="confirmPassword" id="confirmPassword" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Konfirmasi Password"> <br>
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
        // Menampilkan pilihan foto profil
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // 
        // 
        // DOCUMENT READY FUNCTION =====================================
        $(document).ready(function(e) {
            $('#keterangan').hide().prop('required', false);
            $('#subKategori').hide().prop('required', false);
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
            var rule = /^[a-zA-Z0-9.-/ ]+$/;
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


        // Registrasi Wizard ==============================================
        // 
        // Penentuan kolom sub kategori ==============================================
        $('#kategori').change(function(e) {
            var kategori = $('#kategori option:selected').val();
            // Menampilkan Sub Kategori Grand Carnival ===========================
            if (kategori == 'GC') {
                $('#instruksi').text('Silahkan pilih defile yang ingin anda ikuti');
                $('#keterangan').hide().prop('required', false);
                $('#subKategori').show().prop('required', true);
            }
            // Menampilkan Sub Kategori WACI ===========================
            if (kategori == 'WA') {
                $('#instruksi').text('Silahkan isi asal kontingen anda');
                $('#keterangan').attr('placeholder', 'Contoh: Jawa Timur, Sumatera Barat, Wakatobi, Surabaya, Jakarta');
                $('#subKategori').hide().prop('required', false)
                $('#keterangan').show().prop('required', true);
            }
            // Menampilkan Sub Kategori WKC ===========================
            if (kategori == 'WK') {
                $('#instruksi').text('Silahkan pilih defile yang ingin anda ikuti');
                $('#keterangan').hide().prop('required', false);
                $('#subKategori').show().prop('required', true);
            }
            // Menampilkan Kolom deskripsi PET =========================
            if (kategori == 'PE') {
                $('#instruksi').text('Silahkan isi jenis hewan apa yang anda ikuti');
                $('#keterangan').attr('placeholder', 'Isikan jenis hewan yang anda ikutkan');
                $('#subKategori').hide().prop('required', false);
                $('#keterangan').show().prop('required', true);
            }
            // Menampilkan Kolom deskripsi AW ==========================
            if (kategori == 'AW') {
                $('#instruksi').text('Silahkan isi ');
                $('#keterangan').attr('placeholder', 'Designer/model');
                $('#subKategori').hide().prop('required', false);
                $('#keterangan').show().prop('required', true);
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