<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Galeri - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            margin: 5px;
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Dashboard">
                <div class="sidebar-brand-text mx-3">JFC Center</div>
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

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/Workshop">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Workshop</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="/Galeri">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Galeri</span></a>
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
                    <h1 class="h3 mb-2 text-gray-800">Galeri</h1>
                    <div class="h5">Anda dapat mengupload foto untuk Presentasi, Grand Juri dan Roadshow di halaman ini.</div>
                    <div class="mb-4 font-weight-bold">Album roadshow akan muncul ketika anda ikut serta dalam sebuah roadshow.</div>
                    <div class="mb-4 btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload Foto</div>


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

    <!-- Upload Modal-->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="/Upload/Store" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <div class="mb-2 text-info"><i class="fa fa-info-circle"></i> Maksimal sebanyak 3 foto! Max. 300 Kb</div>
                        </div>
                        <div class="form-group">
                            <input id="userFile" type="file" name="userFile">
                            <div class="text-danger" id="fileAlert"></div>
                        </div>
                        <div class="form-group">
                            Upload gambar ke album:
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_usage" id="pilihUsage">
                                <?php foreach ($usageData as $usageItem) : ?>
                                    <option value=<?= $usageItem->id_usage ?>><?= $usageItem->nama_usage ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="text-danger" id="maksimalAlert"></div>
                        </div>
                        <div class="form-group">
                            <div><input type="submit" class="btn btn-primary" id="submitUploadButton" value="Upload"></div>
                        </div>
                    </form>
                </div>
                <!-- End of Modal Body -->

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
                    id_usage: 'usg_0241'
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
                    id_usage: 'usg_0111'
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
                    id_usage: 'usg_0112'
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

        // Check size image
        $('#userFile').bind('change', function() {
            var size = this.files[0].size / 1024 / 1024
            if (size > 0.5) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'File gambar harus dibawah 500Kb',
                })
            }
        });

        // Get total uploaded photo
        $('#pilihUsage').change(function(e) {
            $.ajax({
                type: 'post',
                url: 'Upload/GetTotal',
                data: {
                    action: 'getTotal',
                    id_usage: $('#pilihUsage option:selected').val(),
                },
                dataType: 'json',
                success: function(data) {
                    if (data >= 3) {
                        $('#maksimalAlert').html('<div class=" mt-1"><i class ="fa fa-exclamation-triangle"></i> Anda sudah mengupload 3 foto</div>')
                        $('#submitUploadButton').prop('disabled', true);
                    }else{
                        $('#maksimalAlert').html('');
                        $('#submitUploadButton').prop('disabled', false);
                    }
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