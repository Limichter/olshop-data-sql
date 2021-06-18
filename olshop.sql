Michael Julian Peter 07211840000012
Aldy Fahmi Sitohang 07211840000039
Fajri Irfansyah Abdullah 07211840000043
Fathullah Auzan Setyo Laksono 07211840000053

link video : https://intip.in/videoolshop
link ppt : https://intip.in/pptolshop

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 03:21 PM
-- Server version: 10.4.11-MariaDB
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
-- Database: `olshop`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_barang` (IN `barang` VARCHAR(50))  NO SQL
DELETE FROM barang WHERE barang_nama = barang$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_pembelian` (IN `kodepembelian` CHAR(5))  NO SQL
DELETE FROM pembelian WHERE pembelian_kode = kodepembelian$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_pesanan` (IN `beli` CHAR(5), IN `barang` CHAR(5))  NO SQL
DELETE FROM pesanan WHERE pembelian_kode = beli AND barang_kode = barang$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `total_jenisbarang_dibeli` (OUT `jenis_barang` CHAR)  NO SQL
SELECT pembelian_kode, COUNT(pembelian_kode) AS jenis_barang FROM pesanan GROUP by pembelian_kode$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `total_jenisbarang_digudang` (OUT `digudang` CHAR)  NO SQL
SET digudang = (
    SELECT COUNT(barang_kode) FROM barang
    )$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_kode` char(4) NOT NULL,
  `barang_nama` varchar(50) NOT NULL,
  `barang_harga` decimal(10,0) NOT NULL,
  `barang_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_kode`, `barang_nama`, `barang_harga`, `barang_jumlah`) VALUES
('A211', 'Headset', '1000000', 12),
('A212', 'Keyboard', '400000', 99),
('A213', 'Mouse', '200000', 99),
('B211', 'Buku', '3000', 99),
('B212', 'Pensil', '2000', 99),
('B213', 'Penggaris', '5000', 99);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `pembelian_kode` char(5) NOT NULL,
  `pembelian_tanggal` date NOT NULL,
  `pembelian_hargatotal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`pembelian_kode`, `pembelian_tanggal`, `pembelian_hargatotal`) VALUES
('2121', '2019-07-12', '2810000'),
('2122', '2019-08-02', '221000');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pembelian_kode` char(5) NOT NULL,
  `barang_kode` char(5) NOT NULL,
  `pesanan_jumlah` int(11) NOT NULL,
  `pesanan_harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pembelian_kode`, `barang_kode`, `pesanan_jumlah`, `pesanan_harga`) VALUES
('2121', 'A211', 1, '1000000'),
('2121', 'A212', 1, '1400000'),
('2122', 'A213', 1, '200000'),
('2122', 'B211', 2, '6000'),
('2122', 'B213', 3, '15000'),
('2121', 'A211', 3, '10000'),
('2121', 'A211', 1, '1400000');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `penambahan_pembelian` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE pembelian SET pembelian_hargatotal = pembelian_hargatotal + NEW.pesanan_harga
    WHERE pembelian_kode = NEW.pembelian_kode;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengurangan_barang` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE barang SET barang_jumlah = barang_jumlah - NEW.pesanan_jumlah
    WHERE barang_kode = NEW.barang_kode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'michael', '123', 'michael@gmail.com'),
(2, 'andan', 'p4ssw0rd', 'andan@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_kode`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pembelian_kode`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD KEY `pembelian_kode` (`pembelian_kode`),
  ADD KEY `barang_kode` (`barang_kode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesananbarang` FOREIGN KEY (`barang_kode`) REFERENCES `barang` (`barang_kode`),
  ADD CONSTRAINT `pesananpembelian` FOREIGN KEY (`pembelian_kode`) REFERENCES `pembelian` (`pembelian_kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
