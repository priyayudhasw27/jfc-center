<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/sb-admin-2.css" rel="stylesheet">



</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0" id="formation">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <form class="user" action="/Registrasi/Save" method="post">
                                <!-- STEP 1 ========================================== -->
                                <div id="step1">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan melakukan registrasi!</h1>
                                        <hr>
                                        <h1 class="h6 text-gray-700 mb-4">Harap diisi dengan identitas asli</h1>
                                    </div>
                                    <!-- BIODATA -->
                                    <div class="form-group row">
                                        <!-- Nama lengkap -->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control" name="nama_peserta" id="nama_lengkap" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Nama Lengkap">
                                            <div id="nameAlert"></div>
                                        </div>
                                        <!-- Jenis Kelamin -->
                                        <div class="col-sm-6">
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
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
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Tanggal Lahir">
                                    </div>
                                    <!-- Nomor Hp -->
                                    <br>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor HP">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Email">
                                        <div id="emailAlert"></div>
                                    </div>
                                    <!-- Alamat -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="alamat" id="alamat" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Alamat">
                                        <div id="alamatAlert"></div>
                                    </div>
                                    <div class="form-group row">
                                        <!-- Provinsi -->
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <select name="provinsi" class="form-control" id="pilihProvinsi">
                                                <option value="">-pilih provinsi-</option>
                                                <?php foreach ($provinsi as $provinsiItem) : ?>
                                                    <option value="<?= $provinsiItem->id_provinsi ?>"><?= $provinsiItem->nama_provinsi ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <!-- Kabupaten -->
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <select name="kabupaten" class="form-control" id="pilihKabupaten">
                                                <option value="">-pilih kabupaten-</option>
                                            </select>
                                        </div>
                                        <!-- Kecamatan -->
                                        <div class="col-sm-4">
                                            <select name="kecamatan" class="form-control" id="pilihKecamatan">
                                                <option value="">-pilih kecamatan-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <!-- Asal -->
                                        <input type="text" class="form-control" name="asal" id="asal" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Asal Sekolah/Instansi">
                                        <div id="asalAlert"></div>
                                    </div>
                                    <!-- Kategori Event -->
                                    <div class="form-group">
                                        <select class="form-control" id="kategori" name="id_kategori">
                                            <option value="">-Pilih Kategori Event-</option>
                                            <?php foreach ($kategori as $kategoriItem) : ?>
                                                <option value=<?= $kategoriItem->id_kategori ?>><?= $kategoriItem->nama_kategori ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="row justify-content-end p-2">
                                        <!-- Next Button -->
                                        <div class="">
                                            <div class="btn btn-user btn-primary" id="step2Button">Selanjutnya</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- STEP 2 ========================================== -->
                                <div id="step2">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan melakukan registrasi!</h1>
                                        <hr>
                                        <h1 id="instruksi" class="h6 text-gray-700 mb-4">Pilih Kategori Event ingin Anda ikuti</h1>
                                    </div>


                                    <!-- Sub Kategori -->
                                    <div class="form-group">
                                        <select hidden class="form-control" id="subKategori" name="id_sub_kategori">
                                            <option value="">-Pilih Sub Kategori-</option>
                                            <?php foreach ($subKategori as $subKategoriItem) : ?>
                                                <option value=<?= $subKategoriItem->id_sub_kategori ?>><?= $subKategoriItem->nama_sub_kategori ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="form-group">
                                        <input hidden type="text" class="form-control" name="keterangan" id="keterangan" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Keterangan (Optional)">
                                    </div>


                                    <div class="row justify-content-between p-2">
                                        <!-- Back Button -->
                                        <div class="">
                                            <div class="btn btn-user btn-danger" id="step1Button">Kembali</div>
                                        </div>
                                        <!-- Next Button -->
                                        <div class="">
                                            <div class="btn btn-user btn-primary" id="step3Button">Selanjutnya</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- STEP 3 ========================================== -->
                                <div id="step3">
                                    <!-- USER Data -->
                                    <div class="text-center">
                                        <h3 class="h5 text-gray-900 mb-4">Pilih Username dan Password untuk akun anda</h3>
                                    </div>
                                    <!-- Username -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" id="username" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Username">
                                        <div id="usernameAlert"></div>
                                    </div>
                                    <div class="form-group row">
                                        <!-- Password -->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control" name="password" id="password" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Password"> <br>
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Konfirmasi Password"> <br>
                                            <div id="passwordAlert"></div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-between p-2">
                                        <!-- Back Button -->
                                        <div class="">
                                            <div class="btn btn-user btn-primary" id="step2Button2">Kembali</div>
                                        </div>
                                        <!-- Next Button -->
                                        <div class="">
                                            <input type="submit" class="btn btn-success btn-user" value="Daftar">
                                        </div>
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

    </div>

    <!-- custom script -->
    <script>
        // 
        // 
        // 
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

        // 
        // 
        // 
        // Get Kecamatan, Kabupaten via Provinsi ================================================
        var x = $('#pilihKabupaten');
        var y = $('#pilihKecamatan');
        // Get Kabupaten ===========================
        $('#pilihProvinsi').change(function(e) {
            var a = $('#pilihProvinsi option:selected').val();
            $.ajax({
                type: 'POST',
                url: '/Registrasi/getKabupaten',
                data: {
                    action: 'getKabupaten',
                    idProvinsi: a
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data.Kabupaten)
                    x.empty();
                    y.empty();
                    x.append($("<option></option>").attr("value", null).text('-pilih kabupaten-'));
                    y.append($("<option></option>").attr("value", null).text('-pilih kecamatan-'));
                    // mengisi option dengan kabupaten
                    $.each(data.kabupaten, function(key, value) {
                        x.append($("<option></option>")
                            .attr("value", value.id_kabupaten).text(value.nama_kabupaten));
                    });
                },
            });
        });
        // Get Kecamatan ===========================
        $('#pilihKabupaten').change(function(e) {
            var b = $('#pilihKabupaten option:selected').val();
            $.ajax({
                type: 'POST',
                url: '/Registrasi/getKecamatan',
                data: {
                    action: 'getKecamatan',
                    idKabupaten: b
                },
                dataType: 'json',
                success: function(data) {
                    y.empty();
                    y.append($("<option></option>").attr("value", null).text('-pilih kecamatan-'));
                    // mengisi option dengan kecamatan
                    $.each(data.kecamatan, function(key, value) {
                        y.append($("<option></option>")
                            .attr("value", value.id_kecamatan).text(value.nama_kecamatan));
                    });
                },
            });
        });
        // 
        // 
        // 
        // Registrasi Wizard ==============================================
        $(document).ready(function(e) {
            $('#step2, #step3, #keteranganForm').hide();
        })
        $('#step1Button').click(function(e) {
            $('#step2').hide();
            $('#step3').hide();
            $('#step1').show();
        })
        $('#step2Button').click(function(e) {

            $('#step3').hide();
            $('#step1').hide();
            $('#step2').show();
        })
        $('#step2Button2').click(function(e) {

            $('#step3').hide();
            $('#step1').hide();
            $('#step2').show();
        })
        $('#step3Button').click(function(e) {
            $('#step1').hide();
            $('#step2').hide();
            $('#step3').show();
        })
        // 
        // 
        // 
        // Penentuan kolom sub kategori ==============================================
        $('#kategori').change(function(e) {
            var kategori = $('#kategori option:selected').val();
            // Menampilkan Sub Kategori Grand Carnival ===========================
            if (kategori == 'GC') {
                $('#instruksi').text('Silahkan pilih defile yang ingin anda ikuti');
                $('#keterangan').attr('hidden', true);
                $('#subKategori').removeAttr('hidden');
            }
            // Menampilkan Sub Kategori WACI ===========================
            if (kategori == 'WA') {
                $('#instruksi').text('Silahkan isi asal kontingen anda');
                $('#keterangan').attr('placeholder', 'Contoh: Jawa Timur, Sumatera Barat, Wakatobi, Surabaya, Jakarta');
                $('#subKategori').attr('hidden', true);
                $('#keterangan').removeAttr('hidden');
            }
            // Menampilkan Sub Kategori WKCI ===========================
            if (kategori == 'WK') {
                $('#instruksi').text('Silahkan pilih defile yang ingin anda ikuti');
                $('#keterangan').attr('hidden', true);
                $('#subKategori').removeAttr('hidden');
            }
            // Menampilkan Kolom deskripsi PET =========================
            if (kategori == 'PE') {
                $('#instruksi').text('Silahkan isi jenis hewan apa yang anda ikuti');
                $('#keterangan').attr('placeholder', 'Isikan jenis hewan yang anda ikutkan');
                $('#subKategori').attr('hidden', true);
                $('#keterangan').removeAttr('hidden');
            }
            // Menampilkan Kolom deskripsi AW ==========================
            if (kategori == 'AW') {
                $('#instruksi').text('Silahkan isi ');
                $('#keterangan').attr('placeholder', 'Designer/model');
                $('#subKategori').attr('hidden', true);
                $('#keterangan').removeAttr('hidden');
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