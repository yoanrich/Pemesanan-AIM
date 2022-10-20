-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 06:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_angkasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemasukan_barang`
--

CREATE TABLE `detail_pemasukan_barang` (
  `d_pemasukan_id` int(11) NOT NULL,
  `d_pemasukan_nofak` varchar(15) DEFAULT NULL,
  `d_pemasukan_id_barang` varchar(15) DEFAULT NULL,
  `d_pemasukan_barang_nama` varchar(150) NOT NULL,
  `d_pemasukan_harga` double DEFAULT NULL,
  `d_pemasukan_jumlah` int(11) DEFAULT NULL,
  `d_pemasukan_total` double DEFAULT NULL,
  `d_pemasukan_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pemasukan_barang`
--

INSERT INTO `detail_pemasukan_barang` (`d_pemasukan_id`, `d_pemasukan_nofak`, `d_pemasukan_id_barang`, `d_pemasukan_barang_nama`, `d_pemasukan_harga`, `d_pemasukan_jumlah`, `d_pemasukan_total`, `d_pemasukan_kode`) VALUES
(1, '1', 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 2, 60000, 'BL300919000001'),
(2, '1', 'BR002', 'Pomade', 300000, 2, 600000, 'BL300919000001'),
(3, '1', 'BR003', 'Bycreeam', 20000, 2, 40000, 'BL300919000001'),
(4, '12', 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 1, 30000, 'BL011019000002'),
(5, '13', 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 1, 30000, 'BL011019000003');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan_barang`
--

CREATE TABLE `detail_penjualan_barang` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_barang_id` varchar(15) NOT NULL,
  `d_jual_barang_nama` varchar(150) NOT NULL,
  `d_jual_harga` double NOT NULL,
  `d_jual_jumlah` int(11) NOT NULL,
  `d_jual_total` double NOT NULL,
  `d_jual_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_penjualan_barang`
--

INSERT INTO `detail_penjualan_barang` (`d_jual_id`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_harga`, `d_jual_jumlah`, `d_jual_total`, `d_jual_kode`) VALUES
(1, 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 2, 60000, 'TR021019000001'),
(2, 'BR002', 'Pomade', 400000, 1, 400000, 'TR021019000001');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `nama_jasa` varchar(100) NOT NULL,
  `harga_jasa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama_jasa`, `harga_jasa`) VALUES
(1, 'Cukur Dewasa', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_barang`
--

CREATE TABLE `pemasukan_barang` (
  `p_barang_nofak` varchar(15) DEFAULT NULL,
  `p_barang_tanggal` date DEFAULT NULL,
  `p_barang_user_id` int(11) DEFAULT NULL,
  `p_barang_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemasukan_barang`
--

INSERT INTO `pemasukan_barang` (`p_barang_nofak`, `p_barang_tanggal`, `p_barang_user_id`, `p_barang_kode`) VALUES
('12', '2019-10-03', NULL, 'BL011019000002'),
('13', '2018-10-04', NULL, 'BL011019000003'),
('1', '2019-09-04', NULL, 'BL300919000001');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_barang`, `nama_barang`, `jml_barang`, `harga_beli`, `harga_jual`) VALUES
('BR001', 'Gatsby Wake Up Get Sleep', 28, 30000, 30000),
('BR002', 'Pomade', 10, 400000, 400000),
('BR003', 'Bycreeam', 18, 20000, 30000),
('BR004', 'Insto', 12, 12000, 15000),
('BR005', 'Masako', 12, 1500, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `jual_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_kode`) VALUES
(1, '2019-10-02 04:56:56', 460000, 500000, 40000, 'TR021019000001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nama`) VALUES
(2, 'alfi', 'alfi', 'Admin', 'Alfisyah'),
(3, 'Feggy', 'Feggy', 'Kasir', 'Feggy Nurreza'),
(4, 'nizar', 'nizar', 'Kasir', 'Hafidz NIzar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemasukan_barang`
--
ALTER TABLE `detail_pemasukan_barang`
  ADD PRIMARY KEY (`d_pemasukan_id`),
  ADD KEY `detail_pemasukan_barang_ibfk_1` (`d_pemasukan_kode`),
  ADD KEY `detail_pemasukan_barang_ibfk_2` (`d_pemasukan_id_barang`),
  ADD KEY `detail_pemasukan_barang_ibfk_3` (`d_pemasukan_nofak`);

--
-- Indexes for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `detail_penjualan_barang_ibfk_1` (`d_jual_barang_id`),
  ADD KEY `detail_penjualan_barang_ibfk_2` (`d_jual_kode`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `pemasukan_barang`
--
ALTER TABLE `pemasukan_barang`
  ADD PRIMARY KEY (`p_barang_kode`),
  ADD KEY `pemasukan_barang_ibfk_1` (`p_barang_user_id`),
  ADD KEY `id_barang` (`p_barang_kode`) USING BTREE,
  ADD KEY `p_barang_nofak` (`p_barang_nofak`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`jual_kode`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`jual_kode`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemasukan_barang`
--
ALTER TABLE `detail_pemasukan_barang`
  MODIFY `d_pemasukan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemasukan_barang`
--
ALTER TABLE `detail_pemasukan_barang`
  ADD CONSTRAINT `detail_pemasukan_barang_ibfk_1` FOREIGN KEY (`d_pemasukan_kode`) REFERENCES `pemasukan_barang` (`p_barang_kode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemasukan_barang_ibfk_2` FOREIGN KEY (`d_pemasukan_id_barang`) REFERENCES `stock` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemasukan_barang_ibfk_3` FOREIGN KEY (`d_pemasukan_nofak`) REFERENCES `pemasukan_barang` (`p_barang_nofak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  ADD CONSTRAINT `detail_penjualan_barang_ibfk_1` FOREIGN KEY (`d_jual_barang_id`) REFERENCES `stock` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_barang_ibfk_2` FOREIGN KEY (`d_jual_kode`) REFERENCES `transaksi` (`jual_kode`) ON UPDATE CASCADE;

--
-- Constraints for table `pemasukan_barang`
--
ALTER TABLE `pemasukan_barang`
  ADD CONSTRAINT `pemasukan_barang_ibfk_1` FOREIGN KEY (`p_barang_user_id`) REFERENCES `user` (`id_user`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
