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
                                                    Waiting Payment</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopAll"> <span id="unpaidInvoices"></span> Invoices</div>
                                            </div>
                                            <div class="col mr-2">
                                                <button class="btn btn-primary" onclick="openUnpaidInvoice()">Detail</button>
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
                                                    Bought Ticket</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopDone"><span id="boughtTicket"></span> Ticket</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-check fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Workshop hadir -->
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="col mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center justify-content-between">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Ticket Category</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopDone"> <span id="totalTicketCategories"></span> Categories</div>
                                            </div>
                                            <div class="col mr-2">
                                                <button class="btn btn-primary" onclick="openTicketCategory()">Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center justify-content-between">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Visitor</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="workshopDone"><span id="totalTicketInVenue"></span> Visitor</div>
                                            </div>
                                            <div class="col mr-2">
                                                <a class="btn btn-primary" href="/Ticketing/Admin/Portal">Open Portal</a>
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
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Sisa Kuota Ticket</div>
                                                <div id="sisaKuota"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <h6 id="headerTicketTable" class="m-0 font-weight-bold text-primary"><span id="invoiceTableTitle"></span></h6>
                                    <div class="mt-4">
                                        <button class="btn btn-primary" onclick="getWaitingInvoice()">Waiting Verification</button>
                                        <button class="btn btn-success" onclick="getVerifiedInvoice()">Verified Ticket</button>
                                    </div>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="ticketTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoiceTableData">
                                    </tbody>
                                </table>
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

    <!-- Invoice Modal-->
    <div class="modal fade" id="invoiceModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice No</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
                    <div class="mt-4">
                        <img style="width: 100%" src="/assets/mandiri.jpg" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-success" href="/Authentication/Logout">Konfirmasi Pembayaran</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice Detail Modal-->
    <div class="modal fade" id="invoiceDetailModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice No. <span id="id_invoice"></span> <span id="invoice_status"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class=" col-lg-6">
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
                        </div>
                        <div class=" col-lg-6">
                            <div><strong>Bukti Pembayaran</strong></div>
                            <div class="mt-2" id="paymentImage"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="confirmPaymentButton"></div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Paid Ticket Modal-->
    <div class="modal fade" id="paidTicketModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice No</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- DataTales Example -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="paidTicketTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123456</td>
                                    <td>20-05-2021</td>
                                    <td>Priya Yudha Swandana</td>
                                    <td>Rp 50.0000</td>
                                    <td><button class="btn btn-danger">Undo</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-success" href="/Authentication/Logout">Konfirmasi Pembayaran</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ticket Modal-->
    <div class="modal fade" id="ticketCategoryModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ticket Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="tickets">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="openAddTicketSubCategory()">Add Sub Category</button>
                    <button class="btn btn-primary" onclick="openAddTicketCategory()">Add Category</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Ticket Category Modal-->
    <div class="modal fade" id="addTicketCategoryModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input class="form-control" type="text" id="nama_kategori" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input class="form-control" type="date" id="tanggal" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Start</label>
                        <input class="form-control" type="time" id="start" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">End</label>
                        <input class="form-control" type="time" id="end" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Kuota</label>
                        <input class="form-control" type="number" id="kuota" name="nama">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="storeCategory()">Add</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Ticket Sub Category Modal-->
    <div class="modal fade" id="addTicketSubCategoryModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Kategori</label>
                        <select class="form-control" name="" id="id_category">
                            <!-- <option value="">Grand Carnival</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sub Kategori</label>
                        <input class="form-control" type="text" id="nama_sub_kategori">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input class="form-control" type="text" id="harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="storeSubCategory()">Add</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Portal Modal-->
    <div class="modal fade" id="portalModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Portal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="portal_form">
                        <div class="form-group">
                            <label for="">ID Ticket</label>
                            <input id="asyu" class="form-control" type="text" autofocus>
                        </div>
                    </form>

                    <div id="ticketBoughtDetailPortal"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" onclick="checkIn()">Check In</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Unpaid Invoice Modal-->
    <div class="modal fade" id="unpaidInvoiceModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unpaid Invoice</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="unpaidInvoiceTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Username</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="unpaidInvoiceData">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

    <script src="/myJs/adminTicketManagement.js?t=17"></script>

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