-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 06:52 AM
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
-- Database: `db_aim`
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
(5, '13', 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 1, 30000, 'BL011019000003'),
(6, '12121212121', 'BR002', '', 400000, 1, 400000, 'BL241121000004');

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
(24, 'BR002', 'Pomade', 400000, 1, 400000, 'TR181121000001'),
(25, 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 2, 60000, 'TR181121000002'),
(26, 'BR002', 'Pomade', 400000, 1, 400000, 'TR181121000002'),
(27, 'BR003', 'Bycreeam', 30000, 5, 150000, 'TR181121000002'),
(28, 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 1, 30000, 'TR181121000003'),
(29, 'BR005', 'Masako', 2000, 2, 4000, 'TR181121000003'),
(30, 'BR001', 'Gatsby Wake Up Get Sleep', 30000, 1, 30000, 'TR181121000004'),
(31, 'BR003', 'Bycreeam', 30000, 1, 30000, 'TR181121000005');

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
('12121212121', '2021-11-02', NULL, 'BL241121000004'),
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
('', 'Tempe', 0, 20000, 25000),
('BR001', 'Gatsby Wake Up Get Sleep', 4, 30000, 30000),
('BR002', 'Pomade', 4, 400000, 400000),
('BR003', 'Bycreeam', 12, 30000, 30000),
('BR004', 'Insto', 12, 12000, 15000),
('BR005', 'Masako', 10, 2000, 2000);

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
  `jual_kode` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `step` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_kode`, `username`, `nama`, `alamat`, `step`) VALUES
(19, '2021-11-18 05:44:51', 400000, 500000, 100000, 'TR181121000001', 'rs_elisabeth', 'Rumah Sakit Umum Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 'Lunas'),
(20, '2021-11-18 06:10:52', 610000, 700000, 90000, 'TR181121000002', 'rs_elisabeth', 'Rumah Sakit Umum Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 'Lunas'),
(21, '2021-11-18 09:25:45', 34000, 40000, 6000, 'TR181121000003', 'rs_elisabeth', 'Rumah Sakit Umum Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 'Lunas'),
(22, '2021-11-18 10:12:23', 30000, 40000, 10000, 'TR181121000004', 'rs_bunda', 'Rumah Sakit Umum Bunda', 'Jl. Pramuka No.249, Pertabatan, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147', 'Lunas'),
(23, '2021-11-18 15:33:58', 30000, 40000, 10000, 'TR181121000005', 'rs_elisabeth', 'Rumah Sakit Umum Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no.hp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nama`, `alamat`, `no.hp`) VALUES
(2, 'alfi', 'alfi', 'Admin', 'Alfisyah', '', 0),
(3, 'Feggy', 'Feggy', 'Kasir', 'Feggy Nurreza', '', 0),
(4, 'harrypratama', 'marketing_1390', 'Marketing', 'Harry Pratama Ramadhan', '', 0),
(5, 'rs_elisabeth', 'elisabeth2309', 'Mitra', 'RSU Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 0),
(6, 'rs_bunda', 'bunda2290', 'Mitra', 'RSU Bunda Purwokerto', 'Jl. Pramuka No.249, Pertabatan, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147', 0);

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
  MODIFY `d_pemasukan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
