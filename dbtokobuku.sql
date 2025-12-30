-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 09:00 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `noisbn` varchar(15) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(7) NOT NULL,
  `harga_jual` int(7) NOT NULL,
  `ppn` int(6) NOT NULL,
  `diskon` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`) VALUES
('3333', 'df', '254sda', 'dasd', 'sdasd', '3654', 20, 2000, 2000, 2, '2'),
('55545', 'qweqw', 'eqwe', 'eqwe', 'qweqw', '654', 20, 2000, 2000, 2, '2'),
('BK1', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 5000, 10000, 2, '2'),
('BK10', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK11', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK12', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK13', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK14', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK15', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK2', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK3', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK4', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2'),
('BK5', 'AKU', 'AKU', 'AKU', 'AKU', '2000', 20, 2000, 10000, 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` varchar(10) NOT NULL,
  `nama_distributor` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
('02111999', 'Ryan Syehan Pratama', 'Jl.Bilal Ujung  Gg. Setia No.7', '081361116199'),
('123566', 'Afgan Syahreza', 'Jl.Bilal Ujung Gg.Setia No.7', '0616615300'),
('3213', 'Adam Levine', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('54686', 'Justin Timberlake', 'Jl.Bilal Ujung Gg.Setia No.7', '0616615300'),
('DST1', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST10', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST11', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST12', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST13', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST14', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST15', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST2', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST3', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '0616615300'),
('DST4', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139'),
('DST5', 'Ryan', 'Jl.Bilal Ujung Gg.Setia No.7', '082161116139');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
('02111999', 'Ryan Syehan', 'Jl.Bilal Ujung  Gg. Setia No.7', '081361116199', 'Master', 'ryan', 'ryan', 'Master'),
('30333', 'admin', 'admin', '54', 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` varchar(10) NOT NULL,
  `id_distributor` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
('2136546', '02111999', '3333', 20, '2017-03-01'),
('63546', '123566', '55545', 20, '0000-00-00'),
('PSK', '02111999', 'BK1', 20, '2017-03-09'),
('PSK10', '02111999', 'BK10', 20, '2017-03-09'),
('PSK11', '02111999', 'BK11', 20, '2017-03-09'),
('PSK12', '02111999', 'BK12', 20, '2017-03-09'),
('PSK13', '02111999', 'BK13', 20, '2017-03-09'),
('PSK14', '3213', 'BK14', 20, '2017-03-09'),
('PSK15', '02111999', 'BK15', 20, '2017-03-09'),
('PSK2', '02111999', 'BK2', 20, '2017-03-09'),
('PSK3', '02111999', 'BK3', 20, '2017-03-09'),
('PSK4', '02111999', 'BK4', 20, '2017-03-09'),
('PSK5', '02111999', 'BK5', 20, '2017-03-09'),
('PSK6', '02111999', 'BK6', 20, '2017-03-09'),
('PSK7', '02111999', 'BK7', 20, '2017-03-09'),
('PSK8', '02111999', 'BK8', 20, '2017-03-09'),
('PSK9', '02111999', 'BK9', 20, '2017-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_kasir` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `id_kasir`, `jumlah`, `total`, `tanggal`) VALUES
('20212', '3333', '02111999', 3, 6000, '2017-03-09'),
('5555', '3333', '02111999', 10, 20000, '2017-03-09'),
('PNJ', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ1', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ10', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ11', '3333', '02111999', 50, 100000, '2017-03-09'),
('PNJ12', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ13', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ14', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ15', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ16', 'BK1', '02111999', 20, 200000, '2017-03-09'),
('PNJ2', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ3', '55545', '30333', 20, 40000, '2017-03-09'),
('PNJ4', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ5', '3333', '02111999', 20, 40000, '2017-03-09'),
('PNJ6', '3333', '02111999', 20, 40000, '2017-03-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD UNIQUE KEY `id_buku` (`id_buku`),
  ADD KEY `id_distributor` (`id_distributor`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `pasok` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
