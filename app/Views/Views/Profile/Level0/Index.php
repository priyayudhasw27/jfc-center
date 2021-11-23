<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrasi - JFC Center</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/jfc-center.css" rel="stylesheet">



</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 card o-hidden border-0 shadow-lg my-5 p-3">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="text-gray-800 h4">
                            <a href="javascript:history.back()" class="text-gray-600" onclick="goBack()"><i class="fa fa-arrow-left"></i></a>
                            <?= $pesertaData->nama_peserta ?>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 mb-3 mb-sm-3">
                        <div class="col-5">
                            <img id="preview" style="width: 100%; aspect-ratio: 1/1; object-fit: cover; border-radius: 100%" src="<?= $userData['profilePhoto'] ?>">
                        </div>
                        <div class="col-5">
                            <img id="preview" style="width: 100%; aspect-ratio: 1/1; " src="/assets/qrcode/<?= $pesertaData->id_peserta ?>.png">
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="col">
                        <div class="text-gray-800 font-weight-bold mt-2 ">Username</div>
                        <div class="text-gray-800"><?= $pesertaData->username ?></div>
                        <div class="text-gray-800 font-weight-bold mt-2 ">Jenis Kelamin</div>
                        <div class="text-gray-800"><?= $pesertaData->jenis_kelamin ?></div>
                        <div class="text-gray-800 font-weight-bold mt-2 ">Tanggal Lahir</div>
                        <div class="text-gray-800"><?= date('d-m-Y', strtotime($pesertaData->tanggal_lahir)) ?></div>
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