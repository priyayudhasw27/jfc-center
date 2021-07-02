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

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/Workshop">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Workshop</span></a>
            </li>

            <!-- Galeri -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#galeriCollapse" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Galeri</span>
                </a>
                <div id="galeriCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Galeri Foto</h6>
                        <a class="collapse-item" href="/Galeri/Presentasi1">Presentasi 1</a>
                        <a class="collapse-item active" href="/Galeri/Presentasi2">Presentasi 2</a>
                        <a class="collapse-item" href="/Galeri/GrandJuri">Grand Juri</a>
                        <a class="collapse-item" href="/Galeri/Roadshow">Roadshow</a>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Galeri Presentasi 2</h1>
                    <div class="mb-4">Anda dapat mengupload foto untuk Grand Juri di halaman ini.</div>


                    <?php foreach ($roadshowData as $x => $roadshowItem) : ?>
                        <!-- ALBUM Roadshow -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Album Roadshow <?= $roadshowItem->lokasi ?></h6>
                            </div>
                            <div class="card-body">

                                <!-- Thumbnails container -->
                                <div class="row" id="thumbnails<?= $x ?>"></div>

                            </div>

                            <!-- Button Buka Modal Upload -->
                            <div class="card-footer">
                                <div class="row ml-2">
                                    <div class="btn btn-primary" onclick="openUploadModal('<?= $roadshowItem->id_usage ?>', '<?= $roadshowItem->lokasi ?>')" id="uploadModalButton<?= $x ?>">Upload Foto</div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Get photo collection
                            $.ajax({
                                type: 'post',
                                url: '/Upload/GetPhotos',
                                data: {
                                    action: 'GetPhotos',
                                    id_usage: '<?= $roadshowItem->id_usage ?>',
                                },
                                dataType: 'json',
                                success: function(data) {
                                    var x = $('#thumbnails<?= $x ?>')
                                    $.each(data, function(key, value) {
                                        x.append('<div class="col-auto"><img class="thumbnail" src="/assets/uploaded/' + value.filepath + '" alt="" onclick="openPreviewModal(\'' + value.id_uploads + '\')"></div>')
                                    });
                                }
                            })

                            // Get total uploaded photo
                            $.ajax({
                                type: 'post',
                                url: '/Upload/GetTotal',
                                data: {
                                    action: 'getTotal',
                                    id_usage: '<?= $roadshowItem->id_usage ?>',
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if (data >= 3) {
                                        $('#uploadModalButton<?= $x ?>').attr('onclick', 'maxAlert()').toggleClass('btn-primary btn-secondary');
                                    }
                                }
                            })

                            // Swal untuk sudah mencapai batas maksimal upload foto
                            function maxAlert() {
                                Swal.fire({
                                    title: 'Kesalahan',
                                    text: 'Anda sudah mengupload 3 foto',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                })
                            }
                        </script>

                    <?php endforeach ?>


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
                    <form action="/Upload/Store" enctype="multipart/form-data" method="post" id="uploadForm">
                        <div class="form-group">
                            <div class="mb-2 text-info"><i class="fa fa-info-circle"></i> Maksimal sebanyak 3 foto!</div>
                        </div>
                        <div class="form-group">
                            <input required id="userFile" type="file" name="userFile" oninvalid="this.setCustomValidity('Filih foto terlebih dahulu')" accept="image/jpg, image/jpeg">
                            <div class="text-danger" id="fileAlert"></div>
                        </div>
                        <div class="form-group">
                            <div id="keteranganUpload"></div>
                            <input type="hidden" name="id_usage" id="id_usage">
                        </div>

                        <!-- Hidden input untuk menentukan redirect link setelah upload -->
                        <input type="hidden" name="redirectPage" value="Roadshow">

                        <div class="form-group">
                            <div><input type="submit" class="btn btn-primary" id="submitUploadButton" value="Upload"></div>
                        </div>
                    </form>
                </div>
                <!-- End of Modal Body -->

            </div>
        </div>
    </div>


    <!-- Photo Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="imageLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div id="image"></div>
                </div>
                <!-- End of Modal Body -->

            </div>
        </div>
    </div>


    <script>
        // ========================== Package PENAMPIL FOTO GALERI

        // Open preview Modal dan Get Photo by id uploads
        function openUploadModal(id_usage, lokasi) {
            $('#keteranganUpload').text('Upload foto ke album ' + lokasi);
            $('#id_usage').val(id_usage);
            $('#uploadModal').modal('show');
        }

        // Open preview Modal dan Get Photo by id uploads
        function openPreviewModal(id_uploads) {
            $.ajax({
                type: 'post',
                url: '/Upload/View',
                data: {
                    action: 'GetView',
                    id_uploads: id_uploads,
                },
                dataType: 'json',
                success: function(data) {
                    $('#image').html('<img style="width: 100%" src="/assets/uploaded/' + data.filepath + '" alt="">')
                    $('#imageLabel').text(data.filepath);
                    $('#previewModal').modal('show');
                    $('#deleteButton').click(function(e) {
                        deletePhoto(id_uploads);
                    });
                }
            })
        }

        function deletePhoto(id_uploads) {
            $.ajax({
                type: 'post',
                url: '/Upload/Delete',
                data: {
                    action: 'Delete',
                    id_uploads: id_uploads,
                },
                dataType: 'json',
                success: function(data) {
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Berhasil!',
                    //     text: 'Foto berhasil dihapus',
                    // })
                    console.log(data);
                }
            })
        }



        // ========================== End Package penampil galeri

        // Check size image
        // $('#userFile').bind('change', function() {
        //     var size = this.files[0].size / 1024 / 1024
        //     if (size > 0.5) {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Oops...',
        //             text: 'File gambar harus dibawah 500Kb',
        //         })
        //     }
        // });
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