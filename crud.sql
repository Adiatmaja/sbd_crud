-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 12:20 AM
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
(3, 'Soekarno-Hatta International Airport'),
(4, 'Adisucipto International Airport'),
(5, 'Jenderal Ahmad Yani International Airport'),
(6, 'Adisumarmo International Airport'),
(7, 'Juanda International Airport');

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
  `sisa_kursi` int(2) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbangan`
--

INSERT INTO `penerbangan` (`kode_penerbangan`, `waktu_depart`, `waktu_arrive`, `tanggal_depart`, `kelas`, `sisa_kursi`, `keterangan`) VALUES
(2, '17:30:00', '18:30:00', '2021-11-19', 'Bisnis', 56, 'CGK, 19-11-2021, 17:30 - 18:30'),
(3, '14:30:00', '16:00:00', '2021-11-21', 'Ekonomi', 45, 'YIA, 21-11-2021, 14:30 - 16:00'),
(5, '22:05:00', '23:35:00', '2021-12-21', 'Bisnis', 33, 'JOG, 21-12-2021, 22:05 - 23:35'),
(6, '01:40:00', '02:30:00', '2021-01-21', 'Premium Ekonomi', 21, 'SUB, 21-01-2021, 01:40 - 02:30');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kode_pesanan` int(5) NOT NULL,
  `kode_member` int(5) NOT NULL,
  `kode_penerbangan` int(5) NOT NULL,
  `tanggal_order` date DEFAULT current_timestamp(),
  `seat` varchar(3) NOT NULL,
  `bagasi` int(2) NOT NULL DEFAULT 7,
  `jenis_pembayaran` varchar(25) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kode_pesanan`, `kode_member`, `kode_penerbangan`, `tanggal_order`, `seat`, `bagasi`, `jenis_pembayaran`, `harga`) VALUES
(1, 1, 3, '2021-12-02', 'A13', 7, 'Kartu Kredit', 500000),
(3, 2, 6, '2021-01-17', 'C02', 5, 'Kartu Kredit', 400000);

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
(1, 2, 3, NULL),
(2, 3, 2, NULL),
(3, 5, 4, NULL),
(4, 6, 7, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`kode_bandara`);

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
  ADD KEY `member_fk` (`kode_member`),
  ADD KEY `penerbangan_fk` (`kode_penerbangan`);

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
  MODIFY `kode_bandara` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `kode_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `kode_rute` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `member_fk` FOREIGN KEY (`kode_member`) REFERENCES `member` (`kode_member`),
  ADD CONSTRAINT `penerbangan_fk` FOREIGN KEY (`kode_penerbangan`) REFERENCES `penerbangan` (`kode_penerbangan`);

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
