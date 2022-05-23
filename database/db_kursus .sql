-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2022 at 10:25 PM
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
  `honor` int DEFAULT NULL,
  `image_instr` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi_instr` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_instruktur`
--

INSERT INTO `tbl_instruktur` (`id_instruktur`, `id_user`, `username_instr`, `email_instr`, `TTL`, `no_telp`, `JK`, `honor`, `image_instr`, `deskripsi_instr`) VALUES
(12, 20, 'Rahmat', 'rahmat@gmail.com', '1997-04-04', '0812', 'Male', 50000, 'img1652808201.jpg', 'sudah berpengalaman selama 12 tahun'),
(16, NULL, 'Joko', 'joko@gmail.com', '1990-12-08', '0812', 'Male', 50000, 'img1653313539.jpg', 'halooo saya joko, semoga hari anda menyenangkan...'),
(17, 29, 'Pamali', 'pamali@gmail.com', '1999-09-09', '0812', 'Male', 50000, 'img1653317261.png', 'Hai');

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
(21, 28, 29, 17, 17, 9, '20220523PBXAC', '1653317040', '2022-12-12', '21:01', '650000', 'Joko', 'BCA', 'img1653317365.jpg', '1234-1234-1234-1234', 2, 1);

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
(7, 7, 'Paket 1', '8 Pertemuan', '450000', 'Paket ini terdiri dari 8 pertemuan  selamat datang di website kami\r\n', 'img1652716932.png'),
(8, 6, 'Paket 2 ', '10 Pertemuan', '550000', 'Paket ini terdiri dari 10 pertemuan', 'img1652715207.jpeg'),
(9, 5, 'Paket 3', '12 Pertemuan', '650000', 'Paket ini terdiri dari 12 pertemuan', 'img1652715259.jpeg');

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
(17, 28, 'joko', 'joko@gmail.com', '1999-12-09', 'Bekasi', '0812', 'Male', 'img1653317014.png');

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
(25, '20220523PBXAC', 17, 9);

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
(2, 'Feri', 'admin@gmail.com', 'img1652896114.jpg', 'shaniindira', 1, 1, 1652624175),
(28, 'joko', 'joko@gmail.com', 'default.jpg', '12345', 1, 2, 1653316453),
(29, 'Pamali', 'pamali@gmail.com', 'default.jpg', '12345', 1, 3, 1653317138);

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
  MODIFY `id_instruktur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id_mobil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  MODIFY `id_peserta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_rinci_jadwal`
--
ALTER TABLE `tbl_rinci_jadwal`
  MODIFY `id_rinci` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
