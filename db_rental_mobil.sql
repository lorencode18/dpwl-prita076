-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2026 at 11:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_akun` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `status_akun`) VALUES
('prita@gmail.com', '$2y$10$18Bz8fePSojEHVjh9AoZXOjHKlnvyuq6CN5PfELmI0H2IUc4BzYjy', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `kode_bayar` varchar(20) NOT NULL,
  `tgl_wkt_byr` datetime DEFAULT NULL,
  `ft_byr` varchar(255) DEFAULT NULL,
  `mtode_byr` varchar(30) DEFAULT NULL,
  `jns_byr` varchar(30) DEFAULT NULL,
  `nominal` decimal(12,2) DEFAULT NULL,
  `sttus_byr` varchar(30) DEFAULT NULL,
  `tgl_wkt_ver` datetime DEFAULT NULL,
  `kode_sewa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `kode_denda` varchar(20) NOT NULL,
  `telat_jam` int DEFAULT NULL,
  `tarif_per_jam` decimal(12,2) DEFAULT NULL,
  `kode_kembali` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `kode_kembali` varchar(20) NOT NULL,
  `tgl_wkt_blk` datetime DEFAULT NULL,
  `sts_blk` varchar(30) DEFAULT NULL,
  `ket_blk` text,
  `kode_bayar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `no_plat` varchar(10) NOT NULL,
  `nm_mobil` varchar(100) DEFAULT NULL,
  `nkursi` int DEFAULT NULL,
  `nbagasi` int DEFAULT NULL,
  `jns_mobil` varchar(50) DEFAULT NULL,
  `transmisi` varchar(30) DEFAULT NULL,
  `thn_buat` year DEFAULT NULL,
  `ft_depan` varchar(255) DEFAULT NULL,
  `ft_blkg` varchar(255) DEFAULT NULL,
  `ft_interior` varchar(255) DEFAULT NULL,
  `hrg_hari` decimal(12,2) DEFAULT NULL,
  `cttn_unit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status_unit` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`no_plat`, `nm_mobil`, `nkursi`, `nbagasi`, `jns_mobil`, `transmisi`, `thn_buat`, `ft_depan`, `ft_blkg`, `ft_interior`, `hrg_hari`, `cttn_unit`, `status_unit`) VALUES
('BN 1555 XY', 'Avanza', 8, 1, 'Kijang', 'Automatic', 2026, 'DepanBN 1555 XY.jpg', 'BelakangBN 1555 XY.jpg', 'InteriorBN 1555 XY.jpg', '250000.00', 'baik\r\n', 'Aktif'),
('BN 1888 AB', 'BMW 320i', 2, 1, 'Sport', 'Manual', 2024, 'DepanBN 1888 AB.jpg', 'BelakangBN 1888 AB.jpg', 'InteriorBN 1888 AB.jpg', '800000.00', 'baik', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `user_plg076` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Sandi076` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Nik076` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nm_lngkp076` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp076` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `almt_lngkp076` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ft_ktp076` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ft_sim_a076` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`user_plg076`, `Sandi076`, `Nik076`, `nm_lngkp076`, `no_hp076`, `almt_lngkp076`, `ft_ktp076`, `ft_sim_a076`) VALUES
('Prita076', '123', '990909090', 'Prita Lauren', '08888888', 'Selindung', 'KTPPrita076.jpg', 'SIMPrita076.png');

-- --------------------------------------------------------

--
-- Table structure for table `pilih`
--

CREATE TABLE `pilih` (
  `kode_sewa` varchar(20) NOT NULL,
  `no_plat` varchar(15) DEFAULT NULL,
  `hrg_sewa` decimal(12,2) DEFAULT NULL,
  `n_hari` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `kode_sewa` varchar(20) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `wkt_ambil` datetime DEFAULT NULL,
  `status_sewa` varchar(30) DEFAULT NULL,
  `user_plg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`kode_bayar`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`kode_denda`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`kode_kembali`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`user_plg076`);

--
-- Indexes for table `pilih`
--
ALTER TABLE `pilih`
  ADD PRIMARY KEY (`kode_sewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`kode_sewa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
