<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Leader - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/jfc-center.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="align-items-center justify-content-center" href="/Dashboard">
                <div class="row p-2 justify-content-center">
                    <div class="col-sm-7">
                        <img style="width: 100%;" src="/bootstrap/img/logo-white.png" alt="">
                    </div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Approval Request -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ApprovalRequestCollapse" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-check-double"></i>
                    <span>Approval Request</span>
                </a>
                <div id="ApprovalRequestCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/ApprovalRequest/MovingPeserta">Moving Peserta</a>
                    </div>
                </div>
            </li>

            <!-- Peserta -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pesertaCollapse" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Peserta</span>
                </a>
                <div id="pesertaCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kategori Event</h6>
                        <a class="collapse-item" href="/Peserta/DaftarPeserta/GC">Grand Carnival</a>
                        <a class="collapse-item" href="/Peserta/DaftarPeserta/WA">WACI </a>
                        <a class="collapse-item" href="/Peserta/DaftarPeserta/AW">ArtWear</a>
                        <a class="collapse-item" href="/Peserta/DaftarPeserta/PE">Pets Carnival</a>
                        <a class="collapse-item" href="/Peserta/DaftarPeserta/WK">WKC</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/Workshop">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Workshop</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/Instruktur">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Instruktur</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/Operator">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Operator</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="/Leader">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Leader</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $userData['username'] ?></span>
                                <img class="img-profile rounded-circle" style="object-fit: cover;" src="<?= $userData['profilePhoto']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4 mt-4 border-left-primary">
                        <div class="card-header py-3">
                            <div class="text-center text-gray-800 h3">Tambah Leader</div>
                        </div>
                        <div class="card-body justify-alignment-left">

                            <form class="user" action="/Leader/Save" method="post">
                                <!-- BIODATA -->
                                <div class="form-group row">
                                    <!-- Nama lengkap -->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="text" class="form-control" name="nama_leader" id="nama_lengkap" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Nama Lengkap">
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
                                <div class="form-group row">
                                    <!-- Email -->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="text" class="form-control" name="email" id="email" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Email">
                                        <div id="emailAlert"></div>
                                    </div>
                                    <!-- Nomor Hp -->
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" name="nomor_hp" id="nomor_hp" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Nomor HP"><br>
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="form-group">
                                    <input required type="text" class="form-control" name="alamat" id="alamat" oninvalid="this.setCustomValidity('Wajib diisi')" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Alamat">
                                    <div id="alamatAlert"></div>
                                </div>
                                <div class="form-group row">
                                    <!-- Provinsi -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input required type="text" class="form-control" name="provinsi" id="provinsi" oninvalid="this.setCustomValidity('Wajib diisi')" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Provinsi">
                                        <div id="alamatAlert"></div>
                                    </div>
                                    <!-- Kabupaten -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input required type="text" class="form-control" name="kabupaten" id="kabupaten" oninvalid="this.setCustomValidity('Wajib diisi')" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Kabupaten">
                                        <div id="alamatAlert"></div>
                                    </div>
                                    <!-- Kecamatan -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input required type="text" class="form-control" name="kecamatan" id="kecamatan" oninvalid="this.setCustomValidity('Wajib diisi')" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Kecamatan">
                                        <div id="alamatAlert"></div>
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
                                    <select required class="form-control" id="kategori" name="id_kategori">
                                        <option value="">-Pilih Tema Event-</option>
                                        <?php foreach ($kategori as $kategoriItem) : ?>
                                            <option value=<?= $kategoriItem->id_kategori ?>><?= $kategoriItem->nama_kategori ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <!-- Sub Kategori -->
                                <div class="form-group">
                                    <select class="form-control" id="subKategori" name="id_sub_kategori">
                                        <option value="">-Pilih Defile-</option>
                                        <?php foreach ($subKategori as $subKategoriItem) : ?>
                                            <option value=<?= $subKategoriItem->id_sub_kategori ?>><?= $subKategoriItem->nama_sub_kategori ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                                <!-- USER Data -->
                                <br>
                                <!-- Username -->
                                <div class="form-group">
                                    <input required type="text" class="form-control" name="username" id="username" oninvalid="this.setCustomValidity('Wajib diisi')" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Username">
                                    <div id="usernameAlert"></div>
                                </div>
                                <div class="form-group row">
                                    <!-- Password -->
                                    <div required class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" name="password" id="password" oninvalid="this.setCustomValidity('Wajib diisi')" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Password">
                                    </div>
                                    <!-- Confirm Password -->
                                    <div required class="col-sm-6">
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" oninvalid="this.setCustomValidity('Wajib diisi')" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Konfirmasi Password"> <br>
                                        <div id="passwordAlert"></div>
                                    </div>
                                </div>

                                <div class="form-group col-md-5">
                                    <input type="submit" class="btn btn-block btn-primary btn-user" value="Tambah">
                                    <a href="javascript:history.back()" class="mt-3 btn btn-block btn-secondary btn-user">Batal</a>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- row -->
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SkyKey2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik Logout untuk keluar dari akun anda</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/Authentication/Logout">Logout</a>
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
            $('#keterangan').hide().prop('required', false);
            $('#subKategori').hide().prop('required', false);
        })
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
            var rule = /^[a-zA-Z.0-9/ ]{3,50}$/;
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

        // Penentuan kolom sub kategori ==============================================
        $('#kategori').change(function(e) {
            var kategori = $('#kategori option:selected').val();
            // Menampilkan Sub Kategori Grand Carnival ===========================
            if (kategori == 'GC') {
                $('#subKategori').show().prop('required', true);
            }
            // Menampilkan Sub Kategori WACI ===========================
            if (kategori == 'WA') {
                $('#subKategori').hide().prop('required', false)
            }
            // Menampilkan Sub Kategori WKC ===========================
            if (kategori == 'WK') {
                $('#subKategori').show().prop('required', true);
            }
            // Menampilkan Kolom deskripsi PET =========================
            if (kategori == 'PE') {
                $('#subKategori').hide().prop('required', false);
            }
            // Menampilkan Kolom deskripsi AW ==========================
            if (kategori == 'AW') {
                $('#subKategori').hide().prop('required', false);
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