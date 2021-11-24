-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 03:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `bandara`
--

CREATE TABLE `bandara` (
  `kode_bandara` int(5) NOT NULL,
  `nama_bandara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bandara`
--

INSERT INTO `bandara` (`kode_bandara`, `nama_bandara`) VALUES
(2, 'Yogyakarta International Airport'),
(3, 'Soekarno-Hatta International Airport');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `kode_tiket` int(5) NOT NULL,
  `kode_pesanan` int(5) NOT NULL,
  `kode_penerbangan` int(5) NOT NULL,
  `seat` varchar(3) NOT NULL,
  `bagasi` int(2) NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`kode_tiket`, `kode_pesanan`, `kode_penerbangan`, `seat`, `bagasi`) VALUES
(1, 1, 2, 'A12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `kode_member` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kode_member`, `nama`, `nik`, `tanggal_lahir`, `email`, `nomor_hp`) VALUES
(1, 'Adiatmaja', '1836274803972846', '1998-11-10', 'adi@pambudi.com', '082393417238'),
(2, 'Pambudi', '3938275018293572', '2002-04-28', 'johannes.baptista@ti.ukdw.ac.id', '087843310420');

-- --------------------------------------------------------

--
-- Table structure for table `penerbangan`
--

CREATE TABLE `penerbangan` (
  `kode_penerbangan` int(5) NOT NULL,
  `waktu_depart` time NOT NULL,
  `waktu_arrive` time NOT NULL,
  `tanggal_depart` date NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `sisa_kursi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbangan`
--

INSERT INTO `penerbangan` (`kode_penerbangan`, `waktu_depart`, `waktu_arrive`, `tanggal_depart`, `kelas`, `sisa_kursi`) VALUES
(2, '17:30:00', '18:30:00', '2021-11-19', 'Bisnis', 56),
(3, '14:30:00', '16:00:00', '2021-11-21', 'Ekonomi', 45),
(5, '22:05:00', '23:35:00', '2021-12-21', 'Bisnis', 33),
(6, '01:40:00', '02:30:00', '2021-01-21', 'Premium Ekonomi', 21);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kode_pesanan` int(5) NOT NULL,
  `kode_member` int(5) NOT NULL,
  `tanggal_order` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jenis_pembayaran` enum('BNI','BRI','BCA','GoPay','OVO','DANA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kode_pesanan`, `kode_member`, `tanggal_order`, `total_bayar`, `jenis_pembayaran`) VALUES
(1, 1, '2021-11-03', 400000, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `kode_rute` int(5) NOT NULL,
  `kode_penerbangan` int(5) NOT NULL,
  `kode_bandara` int(5) NOT NULL,
  `status_bandara` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`kode_rute`, `kode_penerbangan`, `kode_bandara`, `status_bandara`) VALUES
(1, 2, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`kode_bandara`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`kode_tiket`),
  ADD KEY `kode_pesanan_fk` (`kode_pesanan`),
  ADD KEY `kode_penerbangan_fk` (`kode_penerbangan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kode_member`);

--
-- Indexes for table `penerbangan`
--
ALTER TABLE `penerbangan`
  ADD PRIMARY KEY (`kode_penerbangan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD KEY `kode_member_fk` (`kode_member`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`kode_rute`),
  ADD KEY `kode_penerbangan_fk_rute` (`kode_penerbangan`),
  ADD KEY `kode_bandara` (`kode_bandara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bandara`
--
ALTER TABLE `bandara`
  MODIFY `kode_bandara` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `kode_tiket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `kode_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penerbangan`
--
ALTER TABLE `penerbangan`
  MODIFY `kode_penerbangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `kode_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `kode_rute` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `kode_penerbangan_fk` FOREIGN KEY (`kode_penerbangan`) REFERENCES `penerbangan` (`kode_penerbangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kode_pesanan_fk` FOREIGN KEY (`kode_pesanan`) REFERENCES `pesanan` (`kode_pesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `kode_member_fk` FOREIGN KEY (`kode_member`) REFERENCES `member` (`kode_member`);

--
-- Constraints for table `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `kode_bandara` FOREIGN KEY (`kode_bandara`) REFERENCES `bandara` (`kode_bandara`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kode_penerbangan_fk_rute` FOREIGN KEY (`kode_penerbangan`) REFERENCES `penerbangan` (`kode_penerbangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
