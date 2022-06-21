-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2022 at 05:26 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int NOT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BCA', '5431-1235-5321-5423', 'Bistir'),
(2, 'BRI', '1235-6890-0876-5421', 'Bistir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruktur`
--

CREATE TABLE `tbl_instruktur` (
  `id_instruktur` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `username_instr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_instr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TTL` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `JK` enum('Male','Female') DEFAULT NULL,
  `honor` varchar(100) DEFAULT NULL,
  `image_instr` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_instr` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_instruktur`
--

INSERT INTO `tbl_instruktur` (`id_instruktur`, `id_user`, `username_instr`, `email_instr`, `TTL`, `no_telp`, `JK`, `honor`, `image_instr`, `deskripsi_instr`) VALUES
(12, 30, 'Robert', 'rahmat@gmail.com', '1997-04-04', '0812', 'Male', '50000', 'img1652808201.jpg', 'sudah berpengalaman selama 12 tahun'),
(16, 31, 'Budi', 'budi@gmail.com', '1990-12-08', '0812', 'Male', '50000', 'img1653313539.jpg', 'halooo saya budi, semoga hari anda menyenangkan...'),
(17, 29, 'jaya', 'pamali@gmail.com', '1999-09-09', '081027654978', 'Male', 'Rp.55,000', 'img1654420571.jpg', 'Hai salam kenal, semoga harimu menyenangkan...'),
(21, 46, 'abdul jaya', 'abdul@gmail.com', '2022-06-07', '0812', 'Male', '50000', 'img1655736133.png', 'saya sudah berpengalaman selama 10 tahun'),
(22, 48, 'jaya instruktur', 'jaya1@gmail.com', '2022-06-13', '0812', 'Male', '50000', 'img1655799710.png', 'sudah berpengalaman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int NOT NULL,
  `id_user_peserta` int DEFAULT NULL,
  `id_user_instruktur` int DEFAULT NULL,
  `id_peserta` int DEFAULT NULL,
  `id_instruktur` int DEFAULT NULL,
  `id_paket` int DEFAULT NULL,
  `kode_jadwal` varchar(255) DEFAULT NULL,
  `tgl_jadwal` varchar(255) DEFAULT NULL,
  `tgl_latihan` varchar(255) DEFAULT NULL,
  `jam_latihan` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `status_jadwal` int DEFAULT NULL,
  `status_bayar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_user_peserta`, `id_user_instruktur`, `id_peserta`, `id_instruktur`, `id_paket`, `kode_jadwal`, `tgl_jadwal`, `tgl_latihan`, `jam_latihan`, `total_bayar`, `atas_nama`, `bank`, `bukti_bayar`, `no_rek`, `status_jadwal`, `status_bayar`) VALUES
(30, 28, 29, 17, 17, 8, '20220605ZIQSU', '2022-06-05', '2022-06-22', '10:00 - 12:00', '550000', 'Gracia', 'BCA', 'img1654431561.png', '1231-1232-1234-1234', 2, 1),
(31, 34, 29, 25, 17, 8, '202206063ORFS', '2022-06-06', '2022-06-29', '10:00 - 12:00', '550000', 'halim', 'BNI', 'img1654500046.png', '123123', 2, 1),
(32, 41, 29, 27, 17, 7, '20220607NHGUM', '2022-06-07', '2022-06-30', '14:00 - 16:00', '450000', 'safasf', 'asasf', 'img1654585694.png', 'sadfasf', 2, 1),
(33, 33, NULL, 19, NULL, 7, '20220614G7TW9', '2022-06-14', '2022-06-22', '14:00 - 16:00', NULL, NULL, NULL, NULL, NULL, 0, 0),
(34, 45, 29, 29, 17, 9, '20220620NUDZC', '2022-06-20', '2022-06-15', '14:00 - 16:00', '650000', 'halim', 'MANDIRI', 'img1655735533.jpg', '123123', 2, 1),
(35, 47, 48, 31, 22, 7, '20220621HJDIQ', '2022-06-21', '2022-06-30', '14:00 - 16:00', '450000', 'halim', 'BCA', 'img1655799371.jpg', '123 123 123', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kantor`
--

CREATE TABLE `tbl_kantor` (
  `id_kantor` int NOT NULL,
  `alamat` varchar(123) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kantor`
--

INSERT INTO `tbl_kantor` (`id_kantor`, `alamat`, `no_telp`, `deskripsi`, `image`) VALUES
(1, 'Jln.Cut Mutia No.1', '081290909876', 'BISTIR merupakan aplikasi pendaftaran online kursus mobil', 'img1654355600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id_mobil` int NOT NULL,
  `nama_mobil` varchar(255) DEFAULT NULL,
  `jenis_mobil` int DEFAULT NULL,
  `no_plat` varchar(50) DEFAULT NULL,
  `no_mesin` varchar(50) DEFAULT NULL,
  `deskripsi_mobil` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_mobil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id_mobil`, `nama_mobil`, `jenis_mobil`, `no_plat`, `no_mesin`, `deskripsi_mobil`, `image_mobil`) VALUES
(5, 'Toyota Avanza', 1, 'BA 1290 IUO', 'JKLI12839KA', '', 'img1652809222.jpg'),
(6, 'Daihatsu Xenia', 1, 'B 1289 KLO', 'JLKFSDAIO094', '', 'img1652809502.jpg'),
(7, 'Suzuki Ertiga', 2, 'B 9208 UIT', 'LKASI097213', 'Mobil siap digunakan', 'img1652809712.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int NOT NULL,
  `id_mobil` int DEFAULT NULL,
  `nama_paket` varchar(100) DEFAULT NULL,
  `byk_pertemuan` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `deskripsi_paket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `id_mobil`, `nama_paket`, `byk_pertemuan`, `harga`, `deskripsi_paket`, `image`) VALUES
(7, 7, 'Paket 1', '8 Pertemuan', '450000', 'Paket ini terdiri dari 8 pertemuan  selamat datang di website kami\r\n', 'img1655181291.jpg'),
(8, 6, 'Paket 2 ', '10 Pertemuan', '550000', 'Paket ini terdiri dari 10 pertemuan', 'img1655181304.jpg'),
(9, 5, 'Paket 3', '12 Pertemuan', '650000', 'Paket ini terdiri dari 12 pertemuan', 'img1655181315.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id_peserta` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `username_peserta` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_peserta` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TTL` varchar(256) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `JK` enum('Male','Female') DEFAULT NULL,
  `image_peserta` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id_peserta`, `id_user`, `username_peserta`, `email_peserta`, `TTL`, `alamat`, `no_telp`, `JK`, `image_peserta`) VALUES
(17, 28, 'joko', 'joko@gmail.com', '1999-12-09', 'Bekasi', '0812', 'Male', 'img1653317014.png'),
(18, 32, 'akun', 'akun@gmail.com', '2022-12-09', 'bekasi', '0812', 'Male', 'img1653384132.png'),
(19, 33, 'coba', 'coba@gmail.com', '1999-12-12', 'bekasi', '0812', 'Female', 'img1653385672.png'),
(20, 35, 'Thania', 'thania@gmail.com', '2022-05-11', 'medan', '0989283', 'Female', 'img1653983395.jpeg'),
(24, NULL, 'sadfas', 'asdfa@gmail.com', '2022-06-17', '2asfas', '1231', 'Male', 'img1654420338.png'),
(25, 34, 'halim', 'halim@gmail.com', '2022-06-23', 'bekasi', '0812', 'Male', 'img1654499910.png'),
(26, 39, 'halim', 'halim090@gmail.com', '2022-06-21', 'bekasi', '0989283', 'Male', 'img1654572609.jpeg'),
(27, 41, 'Surya', 'halimcakra@gmail.com', '2022-06-22', 'bekasi', '081276458663', 'Male', 'img1654585079.jpeg'),
(28, NULL, 'koko', 'koko@yahoo.com', '2022-06-01', 'bekasi', '0812', 'Male', 'img1655184503.jpg'),
(29, 45, 'halim', 'halim90@gmail.com', '2022-06-28', 'bekasi', '0812', 'Male', 'img1655735387.png'),
(31, 47, 'halim cakra', 'halim19@gmail.com', '2022-06-23', 'bekasi', '0812', 'Male', 'img1655799267.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci_jadwal`
--

CREATE TABLE `tbl_rinci_jadwal` (
  `id_rinci` int NOT NULL,
  `kode_jadwal` varchar(255) DEFAULT NULL,
  `id_peserta` int DEFAULT NULL,
  `id_paket` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rinci_jadwal`
--

INSERT INTO `tbl_rinci_jadwal` (`id_rinci`, `kode_jadwal`, `id_peserta`, `id_paket`) VALUES
(34, '20220605ZIQSU', 17, 8),
(35, '202206063ORFS', 25, 8),
(36, '20220607NHGUM', 27, 7),
(37, '20220614G7TW9', 19, 7),
(38, '20220620NUDZC', 29, 9),
(39, '20220621HJDIQ', 31, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  `level_user` int DEFAULT NULL,
  `date_created` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `image`, `password`, `is_active`, `level_user`, `date_created`) VALUES
(2, 'Fery', 'admin@gmail.com', 'img1655798883.png', '12345', 1, 1, 1652624175),
(28, 'Yoko', 'joko@gmail.com', 'img1654242273.jpeg', '12345', 1, 2, 1653316453),
(29, 'jaya', 'pamali@gmail.com', 'img1654319004.jpg', 'shani', 1, 3, 1653317138),
(30, 'Robert', 'robert@gmail.com', 'img1655182053.jpg', '12345', 1, 3, 1653377981),
(31, 'Budi', 'budi@gmail.com', 'default.jpg', '12345', 1, 3, NULL),
(32, 'akun', 'akun@gmail.com', 'default.jpg', '12345', 2, 2, 1653383944),
(33, 'coba', 'coba@gmail.com', 'img1655181419.jpeg', '12345', 1, 2, 1653385610),
(34, 'Peserta', 'peserta@gmail.com', 'img1654333565.jpeg', '12345', 1, 2, 1653447005),
(35, 'thania', 'thania@gmail.com', 'img1654242495.jpg', '12345', 1, 2, 1653982436),
(38, 'jaya', 'jaya@gmail.com', 'default.jpg', '12345', 1, 3, 1654500498),
(39, 'akunbaru', 'akunbaru@gmail.com', 'default.jpg', '12345', 1, 2, 1654568641),
(40, 'markus', 'mas@gmail.com', 'default.jpg', '12345', 1, 2, 1654572903),
(41, 'halim', 'halim@gmail.com', 'default.jpg', '12345', 1, 2, 1654585032),
(42, 'feri', 'feri32@gmail.com', 'img1655182590.png', '12345', 1, 2, 1655182074),
(43, 'user', 'user@gmail.com', 'img1655182655.jpg', '12345', 1, 2, 1655182619),
(44, '123', '123@gmaiil.com', 'default.jpg', '12345', 1, 2, 1655201005),
(45, 'halim', 'halim90@gmail.com', 'default.jpg', '12345', 1, 2, 1655735310),
(46, 'jaya', 'abdul@gmail.com', 'default.jpg', '12345', 1, 3, 1655735953),
(47, 'halim', 'halim1990@gmail.com', 'default.jpg', '12345', 1, 2, 1655799115),
(48, 'jaya', 'jaya1@gmail.com', 'default.jpg', '12345', 1, 3, 1655799520);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_instruktur`
--
ALTER TABLE `tbl_instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_kantor`
--
ALTER TABLE `tbl_kantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `tbl_rinci_jadwal`
--
ALTER TABLE `tbl_rinci_jadwal`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_instruktur`
--
ALTER TABLE `tbl_instruktur`
  MODIFY `id_instruktur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_kantor`
--
ALTER TABLE `tbl_kantor`
  MODIFY `id_kantor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id_mobil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  MODIFY `id_peserta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_rinci_jadwal`
--
ALTER TABLE `tbl_rinci_jadwal`
  MODIFY `id_rinci` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
