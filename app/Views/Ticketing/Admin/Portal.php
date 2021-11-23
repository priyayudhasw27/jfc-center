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
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-4 align-items-center mb-4">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h4>Portal</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" id="portal_form">
                                        <div class="form-group">
                                            <label for="">ID Ticket</label>
                                            <input id="asyu" class="form-control" type="text" autofocus>
                                        </div>
                                    </form>

                                    <div id="ticketBoughtDetailPortal"></div>
                                    <div class="mt-2">
                                        <button class="btn btn-success" onclick="checkIn()">Check In</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="m-0 font-weight-bold text-primary"><span id="totalVisitor"></span> Visitor</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="visitorTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    <th>Event</th>
                                                    <th>Tanggal</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody id="visitorTableData">
                                            </tbody>
                                        </table>
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

    <script>
        $(document).ready(function() {
            countTicketInVenue('#totalVisitor');
            getVisitorData();
            $('#visitorTable').DataTable();
        })

        $('#portal_form').submit(function(e) {
            e.preventDefault()
        })

        let onlyDateOpt = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };

        $('#asyu').keyup(function() {
            $.ajax({
                type: 'get',
                url: '/Ticketing/Admin/Ticket/GetBoughtTicketDetail',
                data: {
                    id_ticket_bought: $('#asyu').val(),
                },
                dataType: 'json',
                success: function(data) {
                    let inVenueText
                    let statusText
                    if (data.status == 'unpaid') {
                        statusText = `<div class="text-danger"><i class="fa fa-times"></i>Ticket Unpaid</div>`
                    } else if (data.status == 'waiting') {
                        statusText = `<div class="text-info"><i class="fa fa-history"></i> Waiting Payment</div>`
                    } else if (data.status == 'verified') {
                        statusText = `<div class="text-success"><i class="fa fa-check"></i> Ticket Verified!</div>`
                    }

                    data.in_venue == 'yes' ? inVenueText = `<div class="text-danger"><i class="fa fa-times"></i> Sudah Check In</div>` : inVenueText = '';

                    $('#ticketBoughtDetailPortal').html(
                        `
                <div class="text-center"><img src="` + data.bar_code + `"></div>
                <hr>
                <div class="text-center">
                    <strong>` + data.nama_category + ` - ` + data.nama_sub_category + `</strong>
                    <h4>` + data.nama + `</h4>
                    <p class="text-primary">` + data.location + `</p>
                    ` + statusText + `
                    ` + inVenueText + `
                </div>
                `
                    );
                }
            })
        })

        function checkIn() {
            $.ajax({
                type: 'post',
                url: '/Ticketing/Admin/Ticket/CheckIn',
                data: {
                    id_ticket_bought: $('#asyu').val(),
                },
                dataType: 'json',
                success: function(data) {
                    $('#asyu').val('');
                    $('#asyu').focus();
                    countTicketInVenue('#totalVisitor')
                    getVisitorData()
                    alert('Berhasil')
                }
            })
        }

        function countTicketInVenue(where) {
            $.ajax({
                type: 'get',
                url: '/Ticketing/Admin/Ticket/CountTicketInVenue',
                dataType: 'json',
                success: function(data) {
                    $(where).text(data);
                }
            })
        }

        function getVisitorData() {
            $.ajax({
                type: 'get',
                url: '/Ticketing/Admin/Ticket/GetTicketInVenue',
                dataType: 'json',
                success: function(data) {
                    $('#visitorTableData').empty()
                    $.each(data, function(index, value) {
                        let date = new Date(value.tanggal).toLocaleDateString('id-ID', onlyDateOpt)
                        $('#visitorTableData').append(
                            `
                            <tr>
                            <td>` + (index + 1) + `</td>
                                <td>` + value.username + `</td>
                                <td>` + value.nama_lengkap + `</td>
                                <td>` + value.event + `</td>
                                <td>` + date + `</td>
                                <td>` + value.waktu + `</td>
                            </tr>
                            `
                        )
                    })
                }
            })
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