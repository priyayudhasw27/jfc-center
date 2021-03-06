<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Instruktur - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

            <!-- Users -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usersCollapse" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="usersCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengguna Sistem</h6>
                        <a class="collapse-item" href="/Admin">Admin</a>
                        <a class="collapse-item" href="/Operator">Operator</a>
                        <a class="collapse-item active" href="/Instruktur">Instruktur</a>
                        <a class="collapse-item" href="/Leader">Leader</a>
                    </div>
                </div>
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
                            <div class="text-center text-gray-800 h3">Tambah Instruktur</div>
                        </div>
                        <div class="card-body justify-alignment-left">

                            <form id="form" class="user" action="/Instruktur/Update" method="post">

                                <!-- hidden input -->
                                <input type="hidden" name="id_instruktur" value="<?= $instrukturData->id_instruktur ?>">
                                <input type="hidden" name="username" value="<?= $instrukturData->username ?>">

                                <!-- BIODATA -->
                                <div class="form-group row">
                                    <!-- Nama lengkap -->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- <div class="font-weight-bold">Nama Lengkap</div> -->
                                        <label class="font-weight-bold">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama_instruktur" id="nama_lengkap" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Nama Lengkap" value="<?= $instrukturData->nama_instruktur ?>">
                                        <div id="nameAlert"></div>
                                    </div>
                                    <!-- Jenis Kelamin -->
                                    <div class="col-sm-6">
                                        <label class="font-weight-bold">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="<?= $instrukturData->jenis_kelamin ?>" selected><?= $instrukturData->jenis_kelamin ?></option>
                                            <option value="Laki - laki">Laki - laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- Email -->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="font-weight-bold">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Email" value="<?= $instrukturData->email ?>">
                                        <div id="emailAlert"></div>
                                    </div>
                                    <!-- Nomor Hp -->
                                    <div class="col-sm-6">
                                        <label class="font-weight-bold">Nomor HP</label>
                                        <input type="number" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor HP" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" value="<?= $instrukturData->nomor_hp ?>"><br>
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="form-group">
                                    <label class="font-weight-bold">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" oninvalid="this.setCustomValidity('Wajib diisi')" placeholder="Alamat" oninput="this.setCustomValidity('')" value="<?= $instrukturData->alamat ?>">
                                    <div id="alamatAlert"></div>
                                </div>
                                <div class="form-group row">
                                    <!-- Kecamatan -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="font-weight-bold">Kecamatan</label>
                                        <input required type="text" class="form-control" name="kecamatan" id="kecamatan" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Kecamatan" value="<?= $instrukturData->kecamatan ?>">
                                        <div id="kecamatanAlert"></div>
                                    </div>
                                    <!-- Kabupaten -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="font-weight-bold">Kabupaten</label>
                                        <input required type="text" class="form-control" name="kabupaten" id="kabupaten" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Kabupaten" value="<?= $instrukturData->kabupaten ?>">
                                        <div id="kabupatenAlert"></div>
                                    </div>
                                    <!-- Provinsi -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="font-weight-bold">Provinsi</label>
                                        <input required type="text" class="form-control" name="provinsi" id="provinsi" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Provinsi" value="<?= $instrukturData->provinsi ?>">
                                        <div id="provinsiAlert"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <!-- Asal -->
                                    <label class="font-weight-bold">Asal</label>
                                    <input type="text" class="form-control" name="asal" id="asal" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Asal Sekolah/Instansi">
                                    <div id="asalAlert"></div>
                                </div>

                                <!-- Prestasi -->
                                <div class="form-group">
                                    <textarea required class="form-control" name="prestasi" id="prestasi" form="form" cols="30" rows="10" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Tuliskan prestasi yang pernah anda raih"></textarea>
                                </div>


                                <!-- USER Data -->
                                <br>
                                <div class="form-group row">
                                    <!-- Password -->
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="font-weight-bold">password</label>
                                        <input type="password" class="form-control" name="password" id="password" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Password" value="<?= $instrukturData->password ?>">
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="col-sm-6">
                                        <label class="font-weight-bold">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Konfirmasi Password" value="<?= $instrukturData->password ?>"> <br>
                                        <div id="passwordAlert"></div>
                                    </div>
                                </div>

                                <div class="form-group col-md-5">
                                    <input type="submit" class="btn btn-block btn-primary btn-user" value="Simpan">
                                    <a href="javascript:history.back()" class="btn btn-secondary btn-block btn-user mt-3">Batal</a>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- /.container-fluid -->

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
                        <span aria-hidden="true">??</span>
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



    <!-- Bootstrap core JavaScript-->
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bootstrap/js/sb-admin-2.min.js"></script>


</body>

</html>