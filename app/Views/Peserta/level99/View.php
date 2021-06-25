<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peserta - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/jfc-center.css" rel="stylesheet">

    <style>
        .thumbnail {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }
    </style>

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
                    <i class="fas fa-fw fa-users"></i>
                    <span>Approval Request</span>
                </a>
                <div id="ApprovalRequestCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/ApprovalRequest/MovingPeserta">Moving Peserta</a>
                    </div>
                </div>
            </li>

            <!-- Peserta -->
            <li class="nav-item active">
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
                        <a class="collapse-item" href="/Peserta/DaftarPeserta/WK">WKCI</a>
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
            <li class="nav-item">
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-end mb-4">
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/Peserta">Peserta</a></li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:history.back()" class="text-gray-600 h5" onclick="goBack()"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-end">
                                        <a href="/Peserta/Delete/<?= $userData['username'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> Hapus Peserta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Nama Peserta</div>
                                    <div class="text-gray-800"><?= $pesertaData->nama_peserta ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Jenis Kelamin</div>
                                    <div class="text-gray-800"><?= $pesertaData->jenis_kelamin ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Email</div>
                                    <div class="text-gray-800"><?= $pesertaData->email ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Nomor HP</div>
                                    <div class="text-gray-800"><?= $pesertaData->nomor_hp ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Kategori Event</div>
                                    <div class="text-gray-800"><?= $pesertaData->nama_kategori ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Keterangan</div>
                                    <div class="text-gray-800"><?= $pesertaData->keterangan ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Defile</div>
                                    <div class="text-gray-800"><?= $pesertaData->nama_sub_kategori ?></div>

                                </div>
                                <div class="col">
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Alamat</div>
                                    <div class="text-gray-800"><?= $pesertaData->alamat ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Kecamatan</div>
                                    <div class="text-gray-800"><?= $pesertaData->kecamatan ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Kabupaten</div>
                                    <div class="text-gray-800"><?= $pesertaData->kabupaten ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Provinsi</div>
                                    <div class="text-gray-800"><?= $pesertaData->provinsi ?></div>
                                    <div class="text-gray-800 font-weight-bold mt-2 ">Asal Sekolah / Instansi</div>
                                    <div class="text-gray-800"><?= $pesertaData->asal ?></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- ALBUM Presentasi 1 -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Album Presentasi 1</h6>
                        </div>
                        <div class="card-body">

                            <div class="row" id="presentasi1Album">

                            </div>
                        </div>
                    </div>


                    <!-- ALBUM Presentasi 2 -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Album Presentasi 2</h6>
                        </div>
                        <div class="card-body">

                            <div class="row" id="presentasi2Album">

                            </div>
                        </div>
                    </div>


                    <!-- ALBUM Grand Juri -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Album Grand Juri</h6>
                        </div>
                        <div class="card-body">

                            <div class="row" id="grandJuriAlbum">

                            </div>
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

    <script>
        $(document).ready(function(e) {

            // Grand Juri Photo
            $.ajax({
                type: 'post',
                url: '/Upload/GetPhotos',
                data: {
                    action: 'GetPhotos',
                    id_usage: 'usg_0241',
                    id_peserta: '<?= $pesertaData->id_peserta ?>'
                },
                dataType: 'json',
                success: function(data) {
                    var x = $('#grandJuriAlbum')
                    $.each(data, function(key, value) {
                        x.append('<div class="col-auto"><img class="thumbnail" src="/assets/uploaded/' + value.filepath + '" alt=""></div>')
                    });
                }
            })

            // Presentasi 1 Photo
            $.ajax({
                type: 'post',
                url: '/Upload/GetPhotos',
                data: {
                    action: 'GetPhotos',
                    id_usage: 'usg_0111',
                    id_peserta: '<?= $pesertaData->id_peserta ?>'
                },
                dataType: 'json',
                success: function(data) {
                    var x = $('#presentasi1Album')
                    $.each(data, function(key, value) {
                        x.append('<div class="col-auto"><img class="thumbnail" src="/assets/uploaded/' + value.filepath + '" alt=""></div>')
                    });
                }
            })

            // Presentasi 2 Photo
            $.ajax({
                type: 'post',
                url: '/Upload/GetPhotos',
                data: {
                    action: 'GetPhotos',
                    id_usage: 'usg_0112',
                    id_peserta: '<?= $pesertaData->id_peserta ?>'
                },
                dataType: 'json',
                success: function(data) {
                    var x = $('#presentasi2Album')
                    $.each(data, function(key, value) {
                        x.append('<div class="col-auto"><img class="thumbnail" src="/assets/uploaded/' + value.filepath + '" alt=""></div>')
                    });
                }
            })
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