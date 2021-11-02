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
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopAll"><span id="totalBoughtTicket"></span> Ticket</div>
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
                                            <div class="col mr-4">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Invoice</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopDone"><span id="totalUnpaidInvoice"></span> Unpaid</div>
                                                <hr>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopDone"><span id="totalWaitingInvoice"></span> Waiting</div>
                                                <hr>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopDone"><span id="totalPaidInvoice"></span> Paid</div>
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
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopAll"> <span id="ticketOnCartDashboard"></span> Ticket</div>
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

                    <div id="myTicket"></div>

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
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buy Ticket</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row">
                            <div class="col-auto align-content-center">
                                <div class="h4 text-info"> <i class="fa fa-info-circle"></i> <span id="ticketOnCart"></span> Ticket dalam keranjang</div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" onclick="openCart()"><i class="fa fa-shopping-cart"></i> Check Out</button>
                            </div>
                        </div>
                        <p class="mb-2 mt-4"><strong>Silahkan isi biodata pemilik ticket</strong></p>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input class="form-control" type="text" name="" id="namaPemesan">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="" id="emailPemesan">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Hp</label>
                            <input class="form-control" type="text" name="" id="nomorHpPemesan">
                        </div>
                    </div>
                    <div class="col">
                        <p class="mb-2 mt-4"><strong>Pilih Ticket anda</strong></p>
                    </div>
                    <div id="tickets" class="mt-4">
                    </div>
                </div>
                <div class="modal-footer">
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
                    <div id="ticketsOnCart" class="mt-4">
                    </div>
                </div>
                <div class="modal-footer">
                    <strong>Total : Rp <span id="priceOnCart"></span></strong>
                    <div id="checkOutButton"></div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Invoice No. <span id="id_invoice"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 id="username_invoice">Priya Yudha Swandana</h4>
                    <strong id="tanggal_invoice">20-12-2021</strong>
                    <hr>
                    <div id="ticket_bought_invoice"></div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col"><strong>Total</strong></div>
                        <div class="col"><strong id="totalPriceInvoice"></strong></div>
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
                    <div style="width: 100%"></div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Invoice</h5>
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
                                    <th>Username</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceTableData">
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
                <form id="registrationForm" enctype="multipart/form-data" class="user" action="/Ticketing/Penonton/Ticket/UploadPayment" method="post">
                    <div class="modal-body">
                        <div class="col">
                            <h4 class="mb-4">Silahkan upload bukti pembayaran</h4>
                            <div class="form-group">
                                <input class="form-control" type="file" name="payment" id="" accept="image/*" capture>
                                <input hidden type="text" id="invoiceId" name="invoiceId">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" onclick=""><i class="fa fa-upload"></i> Upload</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Ticket Detail Modal-->
    <div class="modal fade" id="ticketDetailModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div id="ticketBoughtDetail"></div>
        </div>
    </div>

    <script src="/myJs/penontonTicketManagement.js"></script>

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