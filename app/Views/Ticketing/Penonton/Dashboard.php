<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/jfc-center.css" rel="stylesheet">
    <style>
        .main-background {
            background: url("/bootstrap/img/bg-1.jpg");
            background-position: center;
            background-size: cover;
        }
    </style>

    <!-- Custom styles for this page -->
    <link href="/bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


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
                                <span class="mr-2 d-lg-inline text-gray-600 small"><?= $userData['username']; ?></span>
                                <img class="img-profile rounded-circle" style="object-fit: cover;" src="<?= $userData['profilePhoto']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/Profile">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-4 col-md-6 mb-4">
                            <!-- Total Workshop -->
                            <div class="col mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    My Ticket</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopAll">- Ticket</div>
                                            </div>
                                            <div class="col mr-2">
                                                <button class="btn btn-primary" onclick="buyTicket()">Buy Ticket</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Workshop hadir -->
                            <div class="col">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Invoice</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopDone">- </div>
                                            </div>
                                            <div class="col mr-2">
                                                <button class="btn btn-primary" onclick="openInvoice()">Open</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <!-- Total Workshop -->
                            <div class="col mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Ticket Cart</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopAll">- Ticket</div>
                                            </div>
                                            <div class="col mr-2">
                                                <button class="btn btn-primary" onclick="openCart()">Open Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My Ticket</h1>
                    </div>

                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-primary text-uppercase mb-1">
                                            Grand Carnival <p>vip</p>
                                        </div>
                                        <hr>
                                        <div class="mb-0 font-weight-bold text-gray-800">Priya Yudha Swandana</div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                Email : <div class="text-success font-weight-bold">priyayudha.sw27@gmail.com</div>
                                            </div>
                                            <div class="col">
                                                No. HP : <div class="text-danger font-weight-bold">081330374369</div>
                                            </div>
                                        </div>
                                        <button class=" btn btn-primary" onclick='detailTicket()'>Lihat</button>
                                    </div>
                                </div>
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



    <!-- Buy Ticket Modal-->
    <div class="modal fade" id="buyTicketModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buy Ticket</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <h4 class="mb-4">Silahkan isi biodata pemilik ticket</h4>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Hp</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>
                    </div>
                    <div id="tickets" class="mt-4">
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                Grand Carnival
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="">Nomor Hp</label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Reguler</option>
                                                    <option value="">VIP</option>
                                                    <option value="">VVIP</option>
                                                </select>
                                            </div>
                                            <button class=" btn btn-primary"> <i class="fa fa-cart-plus"></i> Tambahkan ke keranjang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                WACI
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="">Nomor Hp</label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Reguler</option>
                                                    <option value="">VIP</option>
                                                    <option value="">VVIP</option>
                                                </select>
                                            </div>
                                            <button class=" btn btn-primary"> <i class="fa fa-cart-plus"></i> Tambahkan ke keranjang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="openCart()"><i class="fa fa-shopping-cart"></i> Check Out</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal-->
    <div class="modal fade" id="cartModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ticket Cart <i class="fa fa-shopping-cart"></i></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="tickets" class="mt-4">
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                Grand Carnival <span>VIP</span>
                                            </div>
                                            <hr>
                                            <p>Priya Yudha Swandana</p>
                                            <p>priyayudha.sw27@gmail.com</p>
                                            <p>081330374369</p>
                                            <button class=" btn btn-primary"> <i class="fa fa-trash"></i> Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                WACI
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="">Nomor Hp</label>
                                                <select class="form-control" name="" id="">
                                                    <option value="">Reguler</option>
                                                    <option value="">VIP</option>
                                                    <option value="">VVIP</option>
                                                </select>
                                            </div>
                                            <button class=" btn btn-primary"> <i class="fa fa-trash"></i> Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <strong>Total : <span>Rp 150.000</span></strong>
                    <button class="btn btn-primary" onclick="openInvoiceDetail()"><i class="fa fa-shopping-cart"></i> Check Out</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice Detail Modal-->
    <div class="modal fade" id="invoiceDetailModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice No</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Priya Yudha Swandana</h4>
                    <strong>20-12-2021</strong>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col">Grand Carnival VIP</div>
                        <div class="col">Rp 70.000</div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">Grand Carnival VIP</div>
                        <div class="col">Rp 70.000</div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">Grand Carnival VIP</div>
                        <div class="col">Rp 70.000</div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col"><strong>Total</strong></div>
                        <div class="col"><strong>Rp 210.000</strong></div>
                    </div>
                    <hr>
                    <div class="text-center">
                        Silahkan melakukan pembayaran dengan cara transfer ke Nomor Rekening :
                    </div>
                    <div class="text-center font-weight-bold">081354968465</div>
                    <div class="text-center">BANK BRI</div>
                    <div class="text-center">Atas Nama Budi Setiawan</div>
                    <hr>
                    <div>Bukti Pembayaran</div>
                    <div style="widht: 100%"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" onclick="uploadPembayaran()"> <i class="fa fa-upload"></i> Upload bukti pembayaran</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice Modal-->
    <div class="modal fade" id="invoiceModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice No</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- DataTales Example -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="invoiceTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123456</td>
                                    <td>20-05-2021</td>
                                    <td>Priya Yudha Swandana</td>
                                    <td>Rp 50.0000</td>
                                    <td>
                                        <p class="text-success">Paid <i class="fa fa-check"></i></p>
                                    </td>
                                    <td><button class="btn btn-primary" onclick="openInvoiceDetail()">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>123456</td>
                                    <td>20-05-2021</td>
                                    <td>Priya Yudha Swandana</td>
                                    <td>Rp 50.0000</td>
                                    <td>
                                        <p class="text-info">Waiting <i class="fa fa-history"></i></p>
                                    </td>
                                    <td><button class="btn btn-primary" onclick="openInvoiceDetail()">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>123456</td>
                                    <td>20-05-2021</td>
                                    <td>Priya Yudha Swandana</td>
                                    <td>Rp 50.0000</td>
                                    <td>
                                        <p class="text-danger">Unpaid <i class="fa fa-times"></i></p>
                                    </td>
                                    <td><button class="btn btn-primary" onclick="openInvoiceDetail()">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Pembayaran Modal-->
    <div class="modal fade" id="uploadPembayaranModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <h4 class="mb-4">Silahkan upload bukti pembayaran</h4>
                        <div class="form-group">
                            <input class="form-control" type="file" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick=""><i class="fa fa-upload"></i> Upload</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ticket Detail Modal-->
    <div class="modal fade" id="ticketDetailModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ticket</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="barcode"></div>
                    <hr>
                    <div class="text-center">
                        <strong> <span>Grand Carnival</span> - <span>VIP</span></strong>
                        <h4>Priya Yudha Swandana</h4>
                        <strong>20-12-2021</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {})



        function buyTicket() {
            $('#buyTicketModal').modal('show');
        }

        function openCart() {
            $('.modal').modal('hide');
            $('#cartModal').modal('show');
        }

        function openInvoiceDetail() {
            $('.modal').modal('hide');
            $('#invoiceDetailModal').modal('show');
        }

        function openInvoice() {
            $('#invoiceModal').modal('show');
        }

        function uploadPembayaran() {
            $('.modal').modal('hide');
            $('#uploadPembayaranModal').modal('show');
        }

        function detailTicket() {
            $('.modal').modal('hide');
            $('#ticketDetailModal').modal('show');
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/bootstrap/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>


</body>

</html>