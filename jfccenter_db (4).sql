-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2021 pada 00.31
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jfccenter_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `jabatan_jfc` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jenis_kelamin`, `email`, `nomor_hp`, `jabatan_jfc`, `username`) VALUES
('adm_269905', 'admin', 'Laki - laki', 'admin@gmail.com', '081330374369', 'admin', 'admin'),
('adm_540843', 'Budi Setiawan', 'Laki - laki', 'movearrow@gmail.com', '081330277025', 'President JFC', 'bsetiawan'),
('adm_819725', 'Hendy Rendrawan', 'Laki - laki', 'hendyrendrawan@gmail.com', '08123455679', 'Secretary of BOED JFC', 'hrendrawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `direktorat`
--

CREATE TABLE `direktorat` (
  `id_direktorat` varchar(10) NOT NULL,
  `nama_direktorat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `direktorat`
--

INSERT INTO `direktorat` (`id_direktorat`, `nama_direktorat`) VALUES
('dir1', 'Recruitment'),
('dir2', 'Workshop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` varchar(10) NOT NULL,
  `nama_instruktur` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `prestasi` varchar(200) NOT NULL,
  `username` varchar(15) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kabupaten` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `nama_instruktur`, `jenis_kelamin`, `email`, `nomor_hp`, `alamat`, `asal`, `prestasi`, `username`, `kecamatan`, `kabupaten`, `provinsi`) VALUES
('tut_497639', 'Kevin Vito Rajabbi', 'Laki - laki', 'kevinvitor1901@gmail.com', '089610412941', 'Jl. Dr. Soebandi 140 Jember', 'Universitas Jember', 'Unique costume betawi\r\nBest perform korea\r\nBest costume minahasa\r\nTop 7 dynand faruz awards\r\nTop 5 instructor', 'kevinvitor', 'Patrang', 'Jember', 'Jawa Timur'),
('tut_513644', 'Ainul Rochman Rosyid', 'Laki - laki', 'ayiexrosyid@gmail.com', '082332541229', 'Jl.Manggar gg.niaga 16 jember', 'Umum', '1. Unique Costume Senior Spain defile JFC 2004\r\n2. Best Dancer Group JFC 2005\r\n3. Best Costume Senior Roots Defile JFC 2008\r\n4. Best Mayoret JFC 2008\r\n5. Best Defile JFC 2008\r\n6. Best Performance  Sen', 'ayiexrosyid', 'Patrang', 'Jember', 'Jawa Timur'),
('tut_618557', 'Heri Fari', 'Laki - laki', 'heriyanto040197@gmail.com', '085732388387', 'Jl. Aipmoegiman Koncer Kidul', 'Umum', '-pemuda pelopor 2019\r\n-Best costume defile Mahabarata\r\n-best costume defile paradise\r\n-best costume defile betawi\r\n-best costume defile babylonia\r\n-best costume defile mongolia\r\n-roadshow nasional\r\n-r', 'herifari97', 'Tenggarang', 'Bondowoso', 'Jawa Timur'),
('tut_641035', 'Muhammad Irhamni Afendi', 'Laki - laki', 'irhamniafendi@gmail.com', '082233743046', 'Jl. Wijaya Kusuma No.39 Tanggul Kulon ', 'Umum', '- Ru2 Best Makeup 2018\r\n- Top 3 Best Artwear 2018 \r\n- Best Instruktur 2019\r\n- Top 4 JFC award 2017 \r\n- Top 4 JFC award 2018 \r\n- Top 3 Dynand Fariz Award \r\n- Best Costum 2016 Hortus \r\n- unique Costume ', 'IrhamniAfendi', 'Tanggul ', 'Jember', 'Jawa Timur'),
('tut_668099', 'Bayu Firmansyah', 'Laki - laki', 'bfirman19@gmail.com', '089659212306', 'Jln Kertabumi II No 133', 'Smkn 01 Jember', '- best perform\r\n- unique costume\r\n- 5st RU JFC AWARD', 'bayuyabayu97', 'Kaliwates', 'Jember', 'Jawa Timur'),
('tut_721755', 'Dhaniel Mohtar', 'Laki - laki', 'dhaniel704@gmail.com', '08976338648', 'Kalisat', 'Freelance', '.best makeup JFC\r\n.best accecories\r\n.best costume defile bttrfly junior\r\n.best costume defile tsunami\r\n.best performance defile persia\r\n.best perfomance defile borobudur\r\n.best performnce defile reog\r', 'dhaniel.mh', 'Kalisat', 'Jember', 'Jawa Timur'),
('tut_722502', 'Aisyah Nurul Isnainy', 'Perempuan', 'aisyahaaila015@gmail.com', '085655062053', 'Perum Villa Indah Tegal Besar Blok B 7 ', 'SMKN 03 Jember', '•top 7 dynanfariz award 2019\r\n•unique kostum defile minahasa 2019\r\n•top 2 best model JFC 2018', 'aisyahisnainy', 'Kaliwates', 'Jember', 'Jawa Timur'),
('tut_796853', 'Ahmad Saroni Yahya', 'Laki - laki', 'rparero@gmail.com', '082232694223', 'Jl. Raya Bondoyudo No. 46', 'Umum', 'best dancer, best makeup, best performance, unique costume', 'ronieparero', 'Sumberbaru', 'Jember', 'Jawa Timur'),
('tut_811465', 'Rahmah Naufal Bafadhal', 'Perempuan', 'rahmabafadhal99@gmail.com', '0882417453175', 'Jl. Trunojoyo II No.4', 'Universitas Muhammadiyah Jember', '1. Best Performance Defile Saudi Arabia 2018\r\n2. Top 3 Leader 2019\r\n3. Top 3 Dynand Fariz Award 2019', 'rahmabafadhal', 'Kepatihan', 'Jember', 'Jawa Timur'),
('tut_856717', 'Vicky Setiawan Juni', 'Laki - laki', 'vickysetiawanjuni.1995@gmail.com', '087884547319', 'Desa Tutul', 'Ma Baitul Arqom', 'best perform,best kostum, best makeup, best mayoret, 1st Runner up JFC AWARD', 'VICKYSJ', 'Balung', 'Jember', 'Jawa Timur'),
('tut_954252', 'Achmad Bayu Hadi', 'Laki - laki', 'masbayuabata@gmail.com', '085244561109', 'Kol.Sugiono, Gang Garuda 93. Kel.Kademangan, RT.10/RW.2', 'PT. BHARATA MEGA CIPTA (BHARATA GROUP)', '-1st RU Fashion Collage Competition 2016 Spark Fashion Academy Jakarta\r\n-Creative team JFC 2011 - 2015\r\n-Best Performance JFC Senior Tambora\r\n- Runner up 2 JFC Mayoret', 'abatabayu', 'Bondowoso', 'Bondowoso', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kuota`) VALUES
('AW', 'ArtWear Carnival', 70),
('GC', 'Grand Carnival', 50),
('PE', 'Pets Carnival', 60),
('WA', 'WACI', 50),
('WK', 'World Kids Carnival', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran_instruktur`
--

CREATE TABLE `kehadiran_instruktur` (
  `id_kehadiran` varchar(10) NOT NULL,
  `id_instruktur` varchar(10) NOT NULL,
  `id_workshop` varchar(10) NOT NULL,
  `inclass` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran_peserta`
--

CREATE TABLE `kehadiran_peserta` (
  `id_kehadiran` varchar(10) NOT NULL,
  `id_peserta` varchar(10) NOT NULL,
  `id_workshop` varchar(10) NOT NULL,
  `inclass` int(1) NOT NULL,
  `keterlambatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keikutsertaan`
--

CREATE TABLE `keikutsertaan` (
  `id_keikutsertaan` varchar(10) NOT NULL,
  `id_peserta` varchar(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `id_sub_kategori` varchar(10) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keikutsertaan`
--

INSERT INTO `keikutsertaan` (`id_keikutsertaan`, `id_peserta`, `id_kategori`, `id_sub_kategori`, `keterangan`, `created_at`) VALUES
('ke_1202', 'jfc_3292', 'WK', 'sk_1004', '', '2021-06-29'),
('ke_1311', 'jfc_2646', 'GC', 'sk_1001', NULL, '2021-06-27'),
('ke_1327', 'jfc_9558', 'GC', 'sk_1203', NULL, '2021-06-27'),
('ke_1585', 'jfc_2351', 'GC', 'sk_1001', '', '2021-06-27'),
('ke_2285', 'jfc_9811', 'GC', 'sk_1203', '', '2021-08-25'),
('ke_2286', 'jfc_6105', 'WK', 'sk_1003', NULL, '2021-06-27'),
('ke_3134', 'jfc_7834', 'GC', 'sk_1206', NULL, '2021-06-27'),
('ke_3328', 'jfc_6542', 'GC', 'sk_1003', NULL, '2021-06-27'),
('ke_3559', 'jfc_1724', 'AW', NULL, 'designer dan model', '2021-06-27'),
('ke_3753', 'jfc_4139', 'WK', 'sk_1000', '', '2021-08-25'),
('ke_3784', 'jfc_3180', 'WK', 'sk_1003', NULL, '2021-06-27'),
('ke_3837', 'jfc_3435', 'WK', 'sk_1003', NULL, '2021-06-27'),
('ke_4115', 'jfc_369', 'GC', 'sk_1000', NULL, '2021-06-27'),
('ke_4246', 'jfc_6705', 'AW', NULL, 'Desainer and model', '2021-06-27'),
('ke_4696', 'jfc_8616', 'GC', 'sk_1009', '', '2021-08-26'),
('ke_4734', 'jfc_2501', 'GC', 'sk_1206', NULL, '2021-06-27'),
('ke_5022', 'jfc_3537', 'GC', 'sk_1001', NULL, '2021-06-27'),
('ke_5078', 'jfc_4919', 'GC', 'sk_1001', NULL, '2021-06-27'),
('ke_5959', 'jfc_9980', 'GC', 'sk_1203', NULL, '2021-06-27'),
('ke_6482', 'jfc_6094', 'GC', 'sk_1206', NULL, '2021-06-27'),
('ke_702', 'jfc_5565', 'AW', NULL, 'Model', '2021-06-27'),
('ke_7221', 'jfc_1578', 'WK', 'sk_1004', '', '2021-06-29'),
('ke_7346', 'jfc_3453', 'GC', 'sk_1001', NULL, '2021-06-27'),
('ke_7433', 'jfc_8519', 'GC', 'sk_1008', NULL, '2021-06-27'),
('ke_767', 'jfc_5968', 'GC', 'sk_1000', 'Dove merpati', '2021-06-27'),
('ke_7740', 'jfc_3025', 'AW', NULL, 'Ronie Parero', '2021-06-27'),
('ke_7798', 'jfc_7258', 'GC', 'sk_1000', NULL, '2021-06-27'),
('ke_7971', 'jfc_1298', 'GC', 'sk_1001', NULL, '2021-06-27'),
('ke_8133', 'jfc_1061', 'AW', NULL, 'desainer dan model', '2021-06-27'),
('ke_8517', 'jfc_6481', 'GC', 'sk_1001', NULL, '2021-06-27'),
('ke_8530', 'jfc_5433', 'GC', 'sk_1008', '', '2021-08-25'),
('ke_861', 'jfc_8747', 'AW', NULL, 'Nike', '2021-08-18'),
('ke_864', 'jfc_2817', 'GC', 'sk_1003', NULL, '2021-06-27'),
('ke_8862', 'jfc_3933', 'GC', 'sk_1206', NULL, '2021-06-27'),
('ke_888', 'jfc_526', 'GC', 'sk_1001', NULL, '2021-06-27'),
('ke_9361', 'jfc_988', 'GC', 'sk_1203', '', '2021-08-25'),
('ke_9486', 'jfc_460', 'GC', 'sk_1008', '', '2021-08-25'),
('ke_9513', 'jfc_2826', 'GC', 'sk_1003', NULL, '2021-06-27'),
('ke_9601', 'jfc_9829', 'GC', 'sk_1004', NULL, '2021-06-27'),
('ke_9803', 'jfc_9189', 'GC', 'sk_1000', '', '2021-06-27'),
('ke_983', 'jfc_1532', 'GC', 'sk_1001', NULL, '2021-06-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `leader`
--

CREATE TABLE `leader` (
  `id_leader` varchar(10) NOT NULL,
  `nama_leader` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `id_sub_kategori` varchar(15) DEFAULT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kabupaten` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` varchar(10) NOT NULL,
  `keterengan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `keterengan`) VALUES
('0', 'peserta'),
('1', 'operator'),
('100', 'superadmin'),
('2', 'instruktur'),
('3', 'leader'),
('4', 'penonton'),
('5', 'admin_ticket'),
('99', 'admin'),
('id_level', 'keterengan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `moving_peserta`
--

CREATE TABLE `moving_peserta` (
  `id_moving` varchar(10) NOT NULL,
  `id_peserta` varchar(10) NOT NULL,
  `id_sub_kategori_1` varchar(10) NOT NULL,
  `id_sub_kategori_2` varchar(10) NOT NULL,
  `username_leader` varchar(15) NOT NULL,
  `username_admin` varchar(15) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `approved_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` varchar(10) NOT NULL,
  `nama_operator` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `id_direktorat` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kabupaten` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `nama_operator`, `jenis_kelamin`, `email`, `nomor_hp`, `alamat`, `asal`, `id_direktorat`, `username`, `kecamatan`, `kabupaten`, `provinsi`) VALUES
('opt_6803', 'Fefi Nurdiana Widjayanti, S.P., M.P.', 'Perempuan', 'fefidiana1@gmail.com', '082143267879', 'Jl. Ciliwung I/72 RT 01 RW 25', 'Event Director Training and Education ', 'dir2', 'fefinurdiana', 'Patrang', 'Jember', 'Jawa Timur'),
('opt_905', 'opworkshop', 'Laki - laki', 'priyayudha.sw27@gmail.com', '3', 'Jl. jember', 'Politeknik Negeri Jember', 'dir2', 'opworkshop', 'Tanggul', 'Jember', 'Jawa Timur'),
('opt_9994', 'OP Recruitment', 'Laki - laki', 'priyayudha.sw27@gmail.com', '081330374369', 'Jember', 'Politeknik Negeri Jember', 'dir1', 'opregistrasi', 'Sumbersari', 'Jember', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penonton`
--

CREATE TABLE `penonton` (
  `id_penonton` varchar(30) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penonton`
--

INSERT INTO `penonton` (`id_penonton`, `nama_lengkap`, `jenis_kelamin`, `email`, `nomor_hp`, `alamat`, `username`, `created_at`) VALUES
('audience_4650', 'Priya Yudha Swandana', 'Laki - laki', 'priyayudha.sw27@gmail.com', '081330374369', 'perum. pondok tanggul asri B.5', 'dana', '2021-10-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` varchar(10) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `created_at` date NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kabupaten` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `prestasi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama_peserta`, `jenis_kelamin`, `tanggal_lahir`, `email`, `nomor_hp`, `alamat`, `asal`, `username`, `created_at`, `kecamatan`, `kabupaten`, `provinsi`, `prestasi`) VALUES
('jfc_1061', 'alfiah dwi rofilah', 'Perempuan', '2003-08-13', 'fiahfakih@gmail.com', '085854515060', 'sukosari lor', 'smk 2 bondowoso', 'alfiahdwir', '2021-06-26', 'sukosari', 'bondowoso ', 'jawa timur', NULL),
('jfc_1298', 'Muhammad Zainul Abidin', 'Laki - laki', '2001-02-05', 'muhammadzainul584@gmail.com', '085755348592', 'Sidomulyo', 'Mandala', 'Zainul', '2021-06-26', 'Silo', 'Jember', 'Jawa timur', NULL),
('jfc_1532', 'Nadia Dewi', 'Perempuan', '1999-12-03', 'nadiaddewi2@gmail.com', '089514836865', 'Komplek bumi Cibiru raya blok A no 17', 'Institut Seni Budaya Indonesia', 'Nadiadewi', '2021-06-26', 'Cileunyi', 'Bandung', 'Jawa barat', NULL),
('jfc_1578', 'Nisrina Nur Fatimah Nasution', 'Perempuan', '2010-08-12', 'fefpi12@gmail.com', '083852105417', 'Jl. Ciliwung No. 11 RT. 002 RW. 025 Jember', 'SD Muhammadiyah 1 Jember', 'NINA NASUTION', '2021-06-29', 'Kec. Patrang', 'Kab. Jember', 'Prov. Jawa Timur', NULL),
('jfc_1724', 'fairuz salsabil febitiarani', 'Perempuan', '2004-02-15', 'fairuzsalsabilf@gmail.com', '083851114085', 'jln diponegoro no 94', 'smk 2 bondowoso ', 'fairuzsalsabilf', '2021-06-26', 'bondowoso', 'bondowoy', 'jawa timur', NULL),
('jfc_2351', 'Ahmad Rhys Mubarok', 'Laki - laki', '1989-10-28', 'ahmadmubarok886@gmail.com', '082257197607', 'Jln kartini no. 2', 'Umum', 'Mubarok886', '2021-06-26', 'Umbulsari', 'Jember', 'Jawa timur', NULL),
('jfc_2501', 'Luthfia zahrona', 'Perempuan', '2000-02-09', 'zahronaluthfia@gmail.com', '0881023436020', 'Kramat sentiong gang mesjid No.102E', 'ISBI ', 'Luthfia Zahrona', '2021-06-26', 'Senen', 'Kramat', 'Jakarta pusat', NULL),
('jfc_2646', 'Najwa Yufentina Nurdianti', 'Perempuan', '2006-12-26', 'yunaaajwa@gmail.com', '085755734409', 'Jl.Nusa Infah gang 5 no 151', 'Smpn 04 jember ', 'Najwayufentina', '2021-06-26', 'Patrang', 'Jembet', 'Jawa Timur', NULL),
('jfc_2817', 'Vira Renada', 'Perempuan', '2000-10-21', 'virarennada@gmail.com', '085798258463', 'Jl.Cijagra No.95 RT/03 RW/09', 'Institut Seni Budaya Indonesia Bandung', 'vrennada', '2021-06-26', 'Bojongsoang', 'Bandung', 'Jawa Barat', NULL),
('jfc_2826', 'Aulya arlinta dwi yulyaputri', 'Perempuan', '2012-07-09', 'alintaputri2018@gmail.com', '082145565520', 'Jl diponegoro 4/17 jember', 'Mima kh shidiq ', 'Arlinta', '2021-06-26', 'Kaliwates', 'Jember', 'Jawa timur', NULL),
('jfc_3025', 'Khairana Naura Azkiyah', 'Perempuan', '2013-12-03', 'nuriel_85@yahoo.co.id', '08978197110', 'Rambipuji', 'TK Tunas Rimba Rambipuji', 'Naura', '2021-06-26', 'Rambipuji', 'Jember', 'Jawa Timur', NULL),
('jfc_3180', 'Riska alfiatul nikma', 'Perempuan', '2013-01-14', 'iinlukman14@gmail.com', '082245215449', 'Prum Bumi Tegal Besar blok DI 26', 'Mi Al Barokah An NuR ', 'Riska', '2021-06-26', 'Kaliwates', 'JEMBER', 'JAWA Timur', NULL),
('jfc_3292', 'Nadira Mirza Ziva Nasution', 'Perempuan', '2014-05-02', 'fefpi12@gmail.com', '083852105417', 'Jl. Ciliwung No. 11 RT. 002 RW. 025 Jember', 'SDN Jember Lor 3 Jember', 'ZIVA NASUTION', '2021-06-29', 'Kec. Patrang', 'Kab. Jember', 'Prov. Jawa Timur', NULL),
('jfc_3435', 'Nia agustin', 'Perempuan', '1981-08-31', 'agustinnia936@gmail.com', '087720571303', 'Jl teratai no 45', 'Riadus sholihin', 'Tifani', '2021-06-26', 'Patrang', 'Jember', 'Jawa timur', NULL),
('jfc_3453', 'Rafli diaz batubara', 'Laki - laki', '2011-07-21', 'liliksuryanijember211@gmail.com', '085231803580', 'Kasiyan timur', 'SDI Baitul izzi full day', 'Rafli', '2021-06-26', 'Puger', 'Jember', 'Jawa timur', NULL),
('jfc_3537', 'Imam Agus Saili', 'Laki - laki', '1989-04-05', 'say.forbidden@gmail.com', '082231920168', 'Jalan pahlawan', 'Umum', 'sayzetzu', '2021-06-26', 'Sukowono', 'Jember', 'Jawa Timur', NULL),
('jfc_369', 'Tanya Rosa Ajeng T H', 'Perempuan', '1999-04-21', 'tanyarosa0@gmail.com', '085703731488', 'Kp. Podok Ds. Pasirlangu ', 'ISBI Bandung', 'Taniaajeng', '2021-06-26', 'Cisarua', 'Bandung barat', 'Jawa barat', NULL),
('jfc_3933', 'Vanesa febriyanti', 'Perempuan', '2005-02-08', 'Vanesaferi87@gmail.com', '085748427173', 'Jln nangka 6 no 69 perumnas Patrang ', 'Smk. Dr soebandi Jember ', 'Vanesa', '2021-06-26', 'Patrang ', 'Jember ', 'Jawa timur ', NULL),
('jfc_4139', 'M Tristan Zaki', 'Laki - laki', '2012-02-04', 'maryamhasan032@gmail.com', '082333703116', 'Jalan basuki rahmat', 'MI AL AZHAR', 'M Tristan Zaki', '2021-08-25', 'Sumbersari', 'Jember', 'Jawa Timur', NULL),
('jfc_460', 'Abdul Syukur', 'Laki - laki', '1984-03-12', 'new.asykur@gmail.com', '089654750321', 'Jl.KH.Wahid Hasyim Gg.Sawo Rt002 Rt06 no.12 Kreo-Cipadu', 'Umum', 'ASYKUR', '2021-08-25', 'Larangan', '.', 'Banten', NULL),
('jfc_4919', 'Muhammad Zainul Abidin', 'Laki - laki', '2001-02-05', 'muhammadzainul584@gmail.com', '085755348592', 'Sidomulyo', 'Mandala', 'Zainul', '2021-06-26', 'Silo', 'Jember', 'Jawa timur', NULL),
('jfc_526', 'Muhammad Zainul Abidin', 'Laki - laki', '2001-02-05', 'muhammadzainul584@gmail.com', '085755348592', 'Sidomulyo', 'Mandala', 'Zainul', '2021-06-26', 'Silo', 'Jember', 'Jawa timur', NULL),
('jfc_5433', 'Coba', 'Laki - laki', '1999-10-05', 'priyayudha.sw27@gmail.com', '081330374369', 'tes', 'Wirausaha', 'tes', '2021-08-25', 'Tanggul', 'Kjh', 'Lkjh', NULL),
('jfc_5565', 'Febiola Safira', 'Perempuan', '2007-02-01', 'febiollasafira123@gmail.com', '085648818798', 'Jalan M Seruji No.18', 'SMP Negeri 1 Ambulu', 'Febiolasafira', '2021-06-26', 'Ambulu', 'Kab. Jember', 'Surabaya', NULL),
('jfc_5968', 'Clarissa dwi alex sandra widyanto', 'Perempuan', '2009-10-31', 'putriisabella160503@gmail.com', '087753820622', 'jln kahuripan 28 blok DA 05', 'al azhar', 'Clarissa31', '2021-06-26', 'sumbersari', 'jember', 'jawa timur', NULL),
('jfc_6094', 'Vanesa febriyanti', 'Perempuan', '2005-02-08', 'Vanesaferi87@gmail.com', '085748427173', 'Jln. Nangka 6 no. 69 perumnas Patrang ', 'Smk. Dr soebandi Jember ', 'Vanesa febriyan', '2021-06-26', 'Patrang ', 'Jember ', 'Jawa Timur ', NULL),
('jfc_6105', 'Zahra Amira  nazwa ilmia husna', 'Perempuan', '2012-03-28', 'Tinnekekey@gmail.com', '085232341802', 'Jl Kaliurang 100 jember', 'SD Kepatihan 03', 'Wewek', '2021-06-26', 'Sumbersari', 'Jember', 'Jawa timur', NULL),
('jfc_6481', 'Wawan supriyadi', 'Laki - laki', '1998-01-25', 'supriyadiwawan612@gmail.com', '08595965613', 'Peji mangar', 'Akademi kesehatan Rustida Krikilan Banyuwangi', 'Wawansupriyadi', '2021-06-26', 'Mumbulsari', 'Jember', 'Jawa timur', NULL),
('jfc_6542', 'Christianius Reggy Pradana', 'Laki - laki', '1996-12-15', 'Ctian7045@gmail.com', '085746182776', 'Rejoagung', 'Umum', 'ReggyPradana', '2021-06-26', 'Semboro', 'Jember', 'Jawa Timur', NULL),
('jfc_6705', 'Ika Nia Nurfadilah', 'Perempuan', '2003-07-10', 'ikanianurfadilah@gmail.com', '085258775193', 'Pakuniran', 'SMKN 02 Bondowoso', 'Ikanianf', '2021-06-26', 'Maesan', 'Bondowoso', 'Jawa timur', NULL),
('jfc_7258', 'DAFID SEPTYAN NUR FADHOLI', 'Laki - laki', '1995-09-25', 'dafidseptyan.25@gmail.com', '082328828266', 'Jalan saliwiryo pranowo kotakulon bondowoso', 'Universitas negeri surabaya', 'DaveDove', '2021-06-26', 'Bondowoso', 'Bondowoso', 'Jawa timur', NULL),
('jfc_7834', 'Devita Aprilia', 'Perempuan', '2002-04-15', 'devita15aprilia@gmail.com', '089515620989', 'Sukamakmur', 'Umum', 'Devita Aprilia', '2021-06-26', 'ajung', 'jember', 'jawa timur', NULL),
('jfc_8519', 'Heppy yuniar ariani hidayat', 'Perempuan', '2005-03-02', 'heppyrodojokandar@gmail.com', '081237401345', 'Sumber kejayan, mayang, jember, jawatimur, KAB. JEMBER, MAYANG, JAWA TIMUR, ', 'Sma Negeri 1 pakusari', 'Heppy yuniar', '2021-06-26', 'Mayang', 'Jember', 'Jawa Timur', NULL),
('jfc_8616', 'Apni Liani', 'Perempuan', '1999-04-07', 'apnil81@gmail.com', '085846124188', 'jl cial pasir', 'Institut Seni Budaya Indonesia', 'ApniLiani', '2021-08-26', 'Cikole', 'Cisarua', 'Jawabarat', NULL),
('jfc_8747', 'Ni', 'Laki - laki', '1989-11-11', 'brootest1@gmail.com', '076765544', '15 RE', 'Syh', 'Naigoss', '2021-08-18', 'B', 'Mars', 'Paris', NULL),
('jfc_9189', 'Moch Dicky wahyudi', 'Laki - laki', '2000-01-22', 'dickywahyudi2215@gamil.com', '0881037090714', 'BTN Senapahan no.72 Banjar anyar', 'Universitas Ngurah Rai', 'Real_dicky', '2021-06-27', 'Kediri', 'Tabanan', 'Bali', NULL),
('jfc_9558', 'Nurwulan', 'Perempuan', '2000-05-06', 'nurwulanyehet@gmail.com', '083822512501', 'Jl. Terusan pesantren No.42', 'ISBI Bandung ', 'Nurwulan ', '2021-06-26', 'Arcamanik', 'Kota Bandung ', 'Jawa barat', NULL),
('jfc_9811', 'Adinda Dwi Salva Salsa Billa', 'Perempuan', '2004-05-25', 'adinda25524@gmail.com', '0895110048107', 'Jl.dewi sartikah no.35', 'Smk Modern Al-rifa’ie', 'Adinda', '2021-08-25', 'Kota Batu', 'Kota Batu', 'Jawa Timur', NULL),
('jfc_9829', 'Muhammad Rizal Sidiq', 'Laki - laki', '2000-07-05', 'muhammadrizalsidiq05@gmail.com', '0895395633999', 'Komplek Soreang Indah Blok O No 25', 'Institut Seni Budaya Indonesia Bandung', 'rizalsidiq05', '2021-06-26', 'Soreang', 'Bandung', 'Jawa Barat', NULL),
('jfc_988', 'Diana Andiany', 'Perempuan', '1971-10-13', 'fw_eventorganizer@yahoo.com', '083806473449', 'Bukit Golf Reverside Cluster Orchid Blok EE 20 No.1', 'Perorangan', 'dianaa123', '2021-08-25', 'Gunung Putri', 'Bogor', 'Jawa Barat', NULL),
('jfc_9980', 'Yusta Christian A P', 'Perempuan', '1997-05-01', 'Uutaa.aatuu@gmail.com', '082113856511', 'Jalan joyotakan', 'Isbi', 'Uta_utaa', '2021-06-26', 'Joyotgan', 'Surakarta', 'Jawa tengah', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_roadshow`
--

CREATE TABLE `peserta_roadshow` (
  `id` varchar(30) NOT NULL,
  `id_peserta` varchar(10) NOT NULL,
  `id_roadshow` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roadshow`
--

CREATE TABLE `roadshow` (
  `id_roadshow` varchar(30) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_usage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` varchar(15) NOT NULL,
  `nama_sub_kategori` varchar(100) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`, `id_kategori`, `kuota`) VALUES
('sk_1000', 'Dove', 'GC', 80),
('sk_1001', 'Dragonfly', 'GC', 121),
('sk_1003', 'Unicorn', 'GC', 70),
('sk_1004', 'Bees', 'GC', 123),
('sk_1008', 'Komodo', 'GC', 80),
('sk_1009', 'Sea Dragon', 'GC', 90),
('sk_1203', 'Flamingo', 'GC', 100),
('sk_1205', 'Elephant', 'GC', 40),
('sk_1206', 'Lion', 'GC', 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_bought`
--

CREATE TABLE `ticket_bought` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_ticket_sub` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `bar_code` varchar(100) DEFAULT NULL,
  `status` enum('unpaid','waiting','verified') NOT NULL,
  `in_venue` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ticket_bought`
--

INSERT INTO `ticket_bought` (`id`, `username`, `id_ticket_sub`, `nama`, `email`, `no_hp`, `bar_code`, `status`, `in_venue`) VALUES
(87016, 'penonton', 11, 'Priya Yudha Swandana', 'priyayudha.sw27@gmail.com', '081330374369', '/assets/boughtTicket/87016.jpg', 'verified', 'no'),
(714784, 'penonton', 13, 'Yoni ArgoIndustri', 'Yoni@mail.com', '081330374369', '/assets/boughtTicket/714784.jpg', 'verified', 'no'),
(999079, 'penonton', 11, 'asdf', 'asdf', 'asdf', NULL, 'unpaid', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_cart`
--

CREATE TABLE `ticket_cart` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_ticket_sub` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_category`
--

CREATE TABLE `ticket_category` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `start` time NOT NULL DEFAULT current_timestamp(),
  `end` time NOT NULL DEFAULT current_timestamp(),
  `kuota` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `location_link` varchar(200) NOT NULL,
  `status` enum('available','unavailable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ticket_category`
--

INSERT INTO `ticket_category` (`id`, `nama`, `tanggal`, `start`, `end`, `kuota`, `location`, `location_link`, `status`) VALUES
(8, 'Grand Carnival', '2021-11-21', '19:00:00', '21:00:00', 50, 'Cempaka Hill Hotel Jember, Jalan Cempaka, Kedawung Kidul, Gebang, Kabupaten Jember, Jawa Timur ', 'https://www.google.com/maps/place/Cempaka+Hill+Hotel+Jember/@-8.1582802,113.6811356,17z/data=!3m1!4b1!4m8!3m7!1s0x2dd6946c2b9cd255:0x285d1af738aae4c5!5m2!4m1!1i2!8m2!3d-8.1582851!4d113.6833326', 'available'),
(11, 'Artwear', '2021-11-20', '19:00:00', '21:00:00', 50, 'Cempaka Hill Hotel Jember, Jalan Cempaka, Kedawung Kidul, Gebang, Kabupaten Jember, Jawa Timur ', 'https://www.google.com/maps/place/Cempaka+Hill+Hotel+Jember/@-8.1582802,113.6811356,17z/data=!3m1!4b1!4m8!3m7!1s0x2dd6946c2b9cd255:0x285d1af738aae4c5!5m2!4m1!1i2!8m2!3d-8.1582851!4d113.6833326', 'available'),
(12, 'World Kids Carnival', '2021-11-21', '10:00:00', '12:00:00', 50, 'Cempaka Hill Hotel Jember, Jalan Cempaka, Kedawung Kidul, Gebang, Kabupaten Jember, Jawa Timur ', 'https://www.google.com/maps/place/Cempaka+Hill+Hotel+Jember/@-8.1582802,113.6811356,17z/data=!3m1!4b1!4m8!3m7!1s0x2dd6946c2b9cd255:0x285d1af738aae4c5!5m2!4m1!1i2!8m2!3d-8.1582851!4d113.6833326', 'available'),
(13, 'WACI & Pet', '2021-11-20', '14:00:00', '16:00:00', 50, 'Cempaka Hill Hotel Jember, Jalan Cempaka, Kedawung Kidul, Gebang, Kabupaten Jember, Jawa Timur ', 'https://www.google.com/maps/place/Cempaka+Hill+Hotel+Jember/@-8.1582802,113.6811356,17z/data=!3m1!4b1!4m8!3m7!1s0x2dd6946c2b9cd255:0x285d1af738aae4c5!5m2!4m1!1i2!8m2!3d-8.1582851!4d113.6833326', 'available');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_invoice`
--

CREATE TABLE `ticket_invoice` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `total` double NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `expired_date` datetime DEFAULT current_timestamp(),
  `status` enum('unpaid','waiting','verified','expired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ticket_invoice`
--

INSERT INTO `ticket_invoice` (`id`, `username`, `total`, `created_at`, `expired_date`, `status`) VALUES
(10807, 'penonton', 300000, '2021-11-02', NULL, 'verified'),
(486483, 'penonton', 250000, '2021-11-02', '2021-11-02 16:01:44', 'unpaid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_invoice_detail`
--

CREATE TABLE `ticket_invoice_detail` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_ticket_bought` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ticket_invoice_detail`
--

INSERT INTO `ticket_invoice_detail` (`id`, `id_invoice`, `id_ticket_bought`) VALUES
(12, 10807, 87016),
(13, 10807, 714784),
(14, 486483, 999079);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_payment`
--

CREATE TABLE `ticket_payment` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ticket_payment`
--

INSERT INTO `ticket_payment` (`id`, `id_invoice`, `username`, `bukti_pembayaran`, `created_at`) VALUES
(5, 10807, 'penonton', '10807.jpg', '2021-11-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_sub_category`
--

CREATE TABLE `ticket_sub_category` (
  `id` int(11) NOT NULL,
  `id_ticket_category` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ticket_sub_category`
--

INSERT INTO `ticket_sub_category` (`id`, `id_ticket_category`, `nama`, `harga`) VALUES
(11, 8, 'Reguler', 250000),
(12, 11, 'Reguler', 50000),
(13, 12, 'Reguler', 50000),
(14, 13, 'Reguler', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads`
--

CREATE TABLE `uploads` (
  `id_uploads` varchar(10) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  `username` varchar(10) NOT NULL,
  `id_usage` varchar(10) NOT NULL,
  `uploaded_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uploads`
--

INSERT INTO `uploads` (`id_uploads`, `filepath`, `username`, `id_usage`, `uploaded_at`) VALUES
('up2170', 'jfc_460-3283-profile.jpg', 'ASYKUR', 'usg_0211', '2021-08-25'),
('up2254', 'jfc_8616-8741-profile.jpg', 'ApniLiani', 'usg_0211', '2021-08-26'),
('up5807', 'jfc_5433-1465-profile.jpg', 'tes', 'usg_0211', '2021-08-25'),
('up7078', 'jfc_8747-6920-profile.jpg', 'Naigoss', 'usg_0211', '2021-08-18'),
('up8418', 'jfc_9811-4190-profile.jpg', 'Adinda', 'usg_0211', '2021-08-25'),
('up954', 'jfc_988-2784-profile.jpg', 'dianaa123', 'usg_0211', '2021-08-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads_usage`
--

CREATE TABLE `uploads_usage` (
  `id_usage` varchar(10) NOT NULL,
  `nama_usage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uploads_usage`
--

INSERT INTO `uploads_usage` (`id_usage`, `nama_usage`) VALUES
('usg_0111', 'Presentasi 1'),
('usg_0112', 'Presentasi 2'),
('usg_0211', 'profile photos'),
('usg_0241', 'Grand Juri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_level` varchar(10) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `id_level`, `hash`, `active`) VALUES
('abatabayu', 'fd51a43205d104621e883df6762ba5ca', '2', '1fbb07d26f141739d698fcc06414150a', 1),
('Adinda', '7ccd1e5df2aa33358a4ca560e553e075', '0', '996cdd35d126889733a67ea92cf3f441', 1),
('admin', '202cb962ac59075b964b07152d234b70', '99', 'f2113c214550aae64dd7aa638e5fdadc', 1),
('aisyahisnainy', '421a72d74ec6b61e94c7fc5c5d6df9e9', '2', '70684b7c06386d1c6b529b01846e94d7', 1),
('alfiahdwir', '2e10442466d1bffaf28292ccbd29c47a', '0', '314b7d1e44da70630ce8ba8a98eec2e5', 1),
('ApniLiani', '3b4adf15a0b8f89ba3a0bc9f0c9fbbef', '0', '2330eebe9457880f80d0734635e7ad87', 1),
('Arlinta', '5df92a063159c66714bf8ee027b6b5e9', '0', '03483631f203869275b944efd4e7df3d', 1),
('ASYKUR', 'f0898af949a373e72a4f6a34b4de9090', '0', 'd29b9fae0c579a98b896c38c98476a79', 1),
('ayiexrosyid', 'b8e4ff66aabe5da0b6ea43bef4db3c6a', '2', '2873dc93faae56742ee4b4d5283a08d1', 1),
('bayuyabayu97', '7ffdc4b920856018a93f7d8e2aa9b1b1', '2', '29292c3d93ed8a0538a883aefe0e3811', 1),
('bsetiawan', 'a65fe5a5e0a4e4677a65a87f1a405adb', '99', 'c08d8852e72ba14b1adf94f428ef27ee', 1),
('Clarissa31', '23aec3ce66176b74c37791baacfb9897', '0', '91d45833f1bb553dba905882423bb585', 1),
('dana', '21cb4e4be93c09542ffa73b2b5cb95ea', '4', '5b3e06b6ceff91fa6b6ddbb7584f758c', 1),
('DaveDove', '0b893a2e6f95a1a55d0b74502138ceaf', '0', 'f700a61b916849d02e396a4dd5bfe482', 1),
('Devita Aprilia', 'fbe5cd107a1fbe0fb374dcd2049c6984', '0', '0b8b877be00ded4c465f519c7d2ea02d', 1),
('dhaniel.mh', 'b0c176850577bde31e6655341804fe34', '2', 'bf4cbdf5d6a51e0f3e6bad0d3d897045', 1),
('dianaa123', 'd40260eddf4daf4248d5dac53e8d7030', '0', '1fc0e4cbb6345ae5bbb65375b514b6ab', 1),
('fairuzsalsabilf', 'f2bd7dc6067b2405367420d79f2b436f', '0', '8f9e346a3388f2cf74512758d05760b5', 1),
('Febiolasafira', 'ca1b97376c72183ac9ffa795d5f89c6b', '0', 'aacca98df4579ac503f104a358b1a207', 1),
('fefinurdiana', 'aa1695af70185cb8fc9d1e2c35215b55', '1', '73071337085938380729f148d301ae6a', 1),
('Heppy yuniar', '6156d4ed63e5cfd8ab4d84d2bc7287fc', '0', 'b2ec131f5c28ad08c1438d52350215d4', 1),
('herifari97', 'a8a17509035304337e44fed1e830a027', '2', '86940658d0ad7d9c249a120366b809c6', 1),
('hrendrawan', '8091841c1f5f3e1b506e95a331d61bb7', '99', '562af0574c682df3376cae30440c8d00', 1),
('Ikanianf', '42a3c317501fc2e4d0868b9d2f817014', '0', '84a9dcf790755dbabdeae6bb8ed4eeb1', 1),
('IrhamniAfendi', '216b3aba1d99d7f32d4c39f965222d93', '2', 'a93ca7e61eeefc850ef3bf75ef15f608', 1),
('kevinvitor', 'af39c017ceea5c4ef3ae569c6931824b', '2', '49d644cc987580d75856508865b79983', 1),
('Luthfia Zahrona', 'd001730ced94baa5263c92ef01964181', '0', 'fbd8d940541a06fc7ae60b2514b838dc', 1),
('M Tristan Zaki', '81dc9bdb52d04dc20036dbd8313ed055', '0', 'a4dac83a7e66f0532677cc5743f45bbb', 1),
('Mubarok886', '594049bbfa49029c65d9d931256d7495', '0', '0f3b2e7e06f8f92fd81671444a494204', 1),
('Nadiadewi', '7f23e1f81f50e7ce3e0cba8a7bd05e4a', '0', '9ad311fe17f25eb0e8528ea9bffa3ca2', 1),
('Naigoss', 'ac746dc69ea6fb43f9071b73cd4adbfb', '0', 'b8aeb52d88505752b4084226f003c372', 1),
('Najwayufentina', '57caec48b513094d664909c0a79ed278', '0', '185964375da044520f9915ebac852ba9', 1),
('Naura', '610b1ef8195b341dd60a8fbadda254de', '0', '5403727e777d9ce322109228bcaa60dc', 1),
('NINA NASUTION', '7544fff0c9a52ba66033c8f0cfa7a833', '0', '07ac663f3af8df8d1ff76d42febd6383', 1),
('Nurwulan ', '93f170332dbae27b52f454b79278a1b6', '0', 'edbb908892ac9a829dcf0965466d5f03', 1),
('opregistrasi', '202cb962ac59075b964b07152d234b70', '1', 'c28edf3308f57c2cdce5ad77ced02c26', 1),
('opworkshop', '202cb962ac59075b964b07152d234b70', '1', '2ff5cdb2a2672a7650a056fa58b5a04d', 1),
('penonton', '66a72b61af3ec6f2b0217372d3afe39b', '4', '', 1),
('Rafli', '054a3c3033e8f672358b1e159aecc7a7', '0', '7459698435543cf1d625c2c4907c38e1', 1),
('rahmabafadhal', '898e9eb3f1f12e8ac459887369140ad5', '2', 'e04ac0521cb7203fba6e860965ebe790', 1),
('Real_dicky', 'cca2da244b386bc38d782386169e918b', '0', '4e9a471892b8ca4693caa2868fb79d40', 1),
('ReggyPradana', 'f6e17251c856aef1df5d5e5afbc82214', '0', '9f092fe283f6eb37a7e79456d7b9921a', 1),
('Riska', 'fb059ad1c514876b15b3ec40df1acdac', '0', 'ac6386ef4762e2d62372c06532b32234', 1),
('rizalsidiq05', '0b93e6d8ca0bd6002566de49efe97989', '0', 'ee64d573f5dedd4e363669719ef0a540', 1),
('ronieparero', '99b91a4c94d4fd948f814d43d1bdfb49', '2', '57bb206dfbf706e31008f6e370feee4e', 1),
('sayzetzu', '7e52f6340e93da7024463f794107bd70', '0', 'b2f6820e995fc310df55691b720ba8a7', 1),
('skykey', '38035389e1d3c0a9fbb59d3dfdc969b6', '100', '38035389e1d3c0a9fbb59d3dfdc969b6', 1),
('Taniaajeng', 'ea497dba13a91ff6b5921a497270dba0', '0', '58c6702d4c3476052192f0ee9c23ecdb', 1),
('tes', '28b662d883b6d76fd96e4ddc5e9ba780', '0', '43c7e7e4038ffccfea745c444a6df8bb', 1),
('ticketing', 'db9a2e45863fea9bfeb21bca18fa3767', '5', '', 1),
('Tifani', 'fd185573b961b03fb8925f58f367d50d', '0', '1f3502c1fc7104acef4d51917557c1ed', 1),
('Uta_utaa', '75e70023474beffe5848b58eb9acc874', '0', '15784b256ccc27d9c93d364b34fa00c0', 1),
('Vanesa', '14cff2cc07e691f569af152dca89960d', '0', 'c9918f17c6df890ab73bf8e90480f3c0', 1),
('Vanesa febriyan', '38b94e27537bb5598b345bec6d2a8ad1', '0', '1b98586508bb93617855b47bf34fb79b', 1),
('VICKYSJ', '1dec692e1cd4e2cf836dcbfab8f8883e', '2', 'b8adb4eecdce4d10e991fb868d78cc89', 1),
('vrennada', '0f98366849aaa603e8034ace47550595', '0', '1a777999d743385d36edb66a0d74af63', 1),
('Wawansupriyadi', '1f10d26360bc8b8d3a3c5863985fe303', '0', 'd832802e418ea6b11b6a75bf4495e43e', 1),
('Wewek', 'beca2f0a7e4a11e9df511e082048c087', '0', 'b924eb6d015f4a3e02a5504d3ecdea0d', 1),
('Zainul', '83073bdcbecde1c5faed4de060fb4923', '0', '1e2de1933c5dc2953b6c9d4562d39f2e', 1),
('ZIVA NASUTION', '7544fff0c9a52ba66033c8f0cfa7a833', '0', 'f398ead4f74f3af1d5e035cc23360f0c', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `workshop`
--

CREATE TABLE `workshop` (
  `id_workshop` varchar(10) NOT NULL,
  `nama_workshop` varchar(50) NOT NULL,
  `materi` varchar(500) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `dresscode` varchar(25) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `kategori_event` (`username`);

--
-- Indeks untuk tabel `direktorat`
--
ALTER TABLE `direktorat`
  ADD PRIMARY KEY (`id_direktorat`);

--
-- Indeks untuk tabel `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kehadiran_instruktur`
--
ALTER TABLE `kehadiran_instruktur`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `nomor_peserta` (`id_instruktur`),
  ADD KEY `id_workshop` (`id_workshop`);

--
-- Indeks untuk tabel `kehadiran_peserta`
--
ALTER TABLE `kehadiran_peserta`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `nomor_peserta` (`id_peserta`),
  ADD KEY `id_workshop` (`id_workshop`);

--
-- Indeks untuk tabel `keikutsertaan`
--
ALTER TABLE `keikutsertaan`
  ADD PRIMARY KEY (`id_keikutsertaan`),
  ADD KEY `id_peserta` (`id_peserta`,`id_kategori`,`id_sub_kategori`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_sub_kategori` (`id_sub_kategori`);

--
-- Indeks untuk tabel `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id_leader`),
  ADD KEY `kategori_event` (`username`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_sub_kategori` (`id_sub_kategori`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `moving_peserta`
--
ALTER TABLE `moving_peserta`
  ADD PRIMARY KEY (`id_moving`),
  ADD KEY `id_peserta` (`id_peserta`,`id_sub_kategori_1`,`id_sub_kategori_2`,`username_leader`,`username_admin`),
  ADD KEY `id_sub_kategori_1` (`id_sub_kategori_1`),
  ADD KEY `id_sub_kategori_2` (`id_sub_kategori_2`),
  ADD KEY `username_leader` (`username_leader`),
  ADD KEY `username_admin` (`username_admin`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `kategori_event` (`id_direktorat`,`username`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `penonton`
--
ALTER TABLE `penonton`
  ADD PRIMARY KEY (`id_penonton`),
  ADD KEY `kategori_event` (`username`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `kategori_event` (`username`);

--
-- Indeks untuk tabel `peserta_roadshow`
--
ALTER TABLE `peserta_roadshow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_roadshow` (`id_roadshow`);

--
-- Indeks untuk tabel `roadshow`
--
ALTER TABLE `roadshow`
  ADD PRIMARY KEY (`id_roadshow`),
  ADD KEY `id_usage` (`id_usage`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `ticket_bought`
--
ALTER TABLE `ticket_bought`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `id_ticket_sub` (`id_ticket_sub`);

--
-- Indeks untuk tabel `ticket_cart`
--
ALTER TABLE `ticket_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `id_ticket_sub` (`id_ticket_sub`);

--
-- Indeks untuk tabel `ticket_category`
--
ALTER TABLE `ticket_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ticket_invoice`
--
ALTER TABLE `ticket_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `ticket_invoice_detail`
--
ALTER TABLE `ticket_invoice_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_ticket_bought` (`id_ticket_bought`);

--
-- Indeks untuk tabel `ticket_payment`
--
ALTER TABLE `ticket_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `ticket_sub_category`
--
ALTER TABLE `ticket_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket_category` (`id_ticket_category`);

--
-- Indeks untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id_uploads`),
  ADD KEY `id_usage` (`id_usage`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `uploads_usage`
--
ALTER TABLE `uploads_usage`
  ADD PRIMARY KEY (`id_usage`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id_workshop`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ticket_cart`
--
ALTER TABLE `ticket_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `ticket_category`
--
ALTER TABLE `ticket_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ticket_invoice_detail`
--
ALTER TABLE `ticket_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ticket_payment`
--
ALTER TABLE `ticket_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ticket_sub_category`
--
ALTER TABLE `ticket_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `instruktur`
--
ALTER TABLE `instruktur`
  ADD CONSTRAINT `instruktur_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadiran_instruktur`
--
ALTER TABLE `kehadiran_instruktur`
  ADD CONSTRAINT `kehadiran_instruktur_ibfk_1` FOREIGN KEY (`id_instruktur`) REFERENCES `instruktur` (`id_instruktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_instruktur_ibfk_2` FOREIGN KEY (`id_workshop`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadiran_peserta`
--
ALTER TABLE `kehadiran_peserta`
  ADD CONSTRAINT `kehadiran_peserta_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_peserta_ibfk_2` FOREIGN KEY (`id_workshop`) REFERENCES `workshop` (`id_workshop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keikutsertaan`
--
ALTER TABLE `keikutsertaan`
  ADD CONSTRAINT `keikutsertaan_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keikutsertaan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keikutsertaan_ibfk_3` FOREIGN KEY (`id_sub_kategori`) REFERENCES `sub_kategori` (`id_sub_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `leader`
--
ALTER TABLE `leader`
  ADD CONSTRAINT `leader_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leader_ibfk_2` FOREIGN KEY (`id_sub_kategori`) REFERENCES `sub_kategori` (`id_sub_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leader_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `moving_peserta`
--
ALTER TABLE `moving_peserta`
  ADD CONSTRAINT `moving_peserta_ibfk_1` FOREIGN KEY (`id_sub_kategori_1`) REFERENCES `sub_kategori` (`id_sub_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moving_peserta_ibfk_2` FOREIGN KEY (`id_sub_kategori_2`) REFERENCES `sub_kategori` (`id_sub_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moving_peserta_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moving_peserta_ibfk_4` FOREIGN KEY (`username_leader`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moving_peserta_ibfk_5` FOREIGN KEY (`username_admin`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_direktorat`) REFERENCES `direktorat` (`id_direktorat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operator_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peserta_roadshow`
--
ALTER TABLE `peserta_roadshow`
  ADD CONSTRAINT `peserta_roadshow_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_roadshow_ibfk_2` FOREIGN KEY (`id_roadshow`) REFERENCES `roadshow` (`id_roadshow`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket_bought`
--
ALTER TABLE `ticket_bought`
  ADD CONSTRAINT `ticket_bought_ibfk_1` FOREIGN KEY (`id_ticket_sub`) REFERENCES `ticket_sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_bought_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket_cart`
--
ALTER TABLE `ticket_cart`
  ADD CONSTRAINT `ticket_cart_ibfk_1` FOREIGN KEY (`id_ticket_sub`) REFERENCES `ticket_sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_cart_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket_invoice`
--
ALTER TABLE `ticket_invoice`
  ADD CONSTRAINT `ticket_invoice_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket_invoice_detail`
--
ALTER TABLE `ticket_invoice_detail`
  ADD CONSTRAINT `ticket_invoice_detail_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `ticket_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_invoice_detail_ibfk_2` FOREIGN KEY (`id_ticket_bought`) REFERENCES `ticket_bought` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket_payment`
--
ALTER TABLE `ticket_payment`
  ADD CONSTRAINT `ticket_payment_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `ticket_invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_payment_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket_sub_category`
--
ALTER TABLE `ticket_sub_category`
  ADD CONSTRAINT `ticket_sub_category_ibfk_1` FOREIGN KEY (`id_ticket_category`) REFERENCES `ticket_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`id_usage`) REFERENCES `uploads_usage` (`id_usage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
