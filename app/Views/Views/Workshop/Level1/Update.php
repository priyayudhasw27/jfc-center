<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Workshop - JFC Center</title>

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

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="/Workshop">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Workshop</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

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
                            <div class="text-center text-gray-800 h3">Tambah Workshop</div>
                        </div>
                        <div class="card-body justify-alignment-left">


                            <form class="user" action="/Workshop/Update" method="post">
                                <!-- hidden input -->
                                <input type="hidden" name="id_workshop" value="<?= $workshop->id_workshop; ?>">
                                <input type="hidden" name="id_jadwal" value="<?= $workshop->id_jadwal; ?>">

                                <!-- visible input -->
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Nama Workshop</label>
                                        <input value='<?= $workshop->nama_workshop; ?>' class="form-control" type="text" name="nama_workshop" id="nama_workshop" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Isi nama workshop">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Materi</label>
                                        <input value='<?= $workshop->materi; ?>' class="form-control" type="text" name="materi" id="materi" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Isi materi workshop">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Tanggal</label>
                                        <input value='<?= $workshop->tanggal; ?>' class="form-control" type="date" name="tanggal" id="tanggal" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Waktu Mulai</label>
                                        <input value='<?= $workshop->waktu_mulai; ?>' class="form-control" type="time" name="waktu_mulai" id="waktu_mulai" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Waktu Selesai</label>
                                        <input value='<?= $workshop->waktu_selesai; ?>' class="form-control" type="time" name="waktu_selesai" id="waktu_selesai" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                    <label for="nik" class="font-weight-bold">Venue Workshop</label>
                                        <input class="form-control" type="text" name="venue" id="venue" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" value="<?= $workshop->venue ?>" placeholder="Isi venue workshop">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Dresscode</label>
                                        <input value='<?= $workshop->dresscode; ?>' class="form-control" type="text" name="dresscode" id="dresscode" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')" placeholder="Isi dresscode yang digunakan saat workshop">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Instruktur 1</label>
                                        <select class="form-control" name="id_instruktur[]" id="id_instruktur1">
                                            <option value='<?= $instrukturPengampu[0]->id_instruktur; ?>' selected><?= $instrukturPengampu[0]->nama_instruktur; ?></option>
                                            <?php foreach ($instrukturData as $instrukturItem) : ?>
                                                <option value='<?= $instrukturItem->id_instruktur ?>'><?= $instrukturItem->nama_instruktur ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Instruktur 2</label>
                                        <select class="form-control" name="id_instruktur[]" id="id_instruktur2">
                                            <?php if (isset($instrukturPengampu[1])) { ?>
                                                <option value='<?= $instrukturPengampu[1]->id_instruktur; ?>' selected><?= $instrukturPengampu[1]->nama_instruktur; ?></option>
                                            <?php } else { ?>
                                                <option value='' disabled selected>-pilih instruktur-</option>
                                            <?php }; ?>
                                            <?php foreach ($instrukturData as $instrukturItem) : ?>
                                                <option value='<?= $instrukturItem->id_instruktur ?>'><?= $instrukturItem->nama_instruktur ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-8">
                                        <label for="nik" class="font-weight-bold">Instruktur 3</label>
                                        <select class="form-control" name="id_instruktur[]" id="id_instruktur3">
                                            <?php if (isset($instrukturPengampu[2])) { ?>
                                                <option value='<?= $instrukturPengampu[2]->id_instruktur; ?>' selected><?= $instrukturPengampu[2]->nama_instruktur; ?></option>
                                            <?php } else { ?>
                                                <option value='' disabled selected>-pilih instruktur-</option>
                                            <?php }; ?>
                                            <?php foreach ($instrukturData as $instrukturItem) : ?>
                                                <option value='<?= $instrukturItem->id_instruktur ?>'><?= $instrukturItem->nama_instruktur ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <input class="mt-4 btn btn-primary btn-user btn-block" type="submit">
                                        <a href="javascript:history.back()" class="mt-3 btn btn-secondary btn-user btn-block">Batal</a>
                                    </div>
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