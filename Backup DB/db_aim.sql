-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2022 at 04:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemasukan_barang`
--

CREATE TABLE `detail_pemasukan_barang` (
  `d_pemasukan_id` int(11) NOT NULL,
  `d_pemasukan_id_barang` varchar(15) DEFAULT NULL,
  `d_pemasukan_nofak` varchar(255) NOT NULL,
  `d_pemasukan_barang_nama` varchar(150) NOT NULL,
  `d_pemasukan_jenis_barang` varchar(255) NOT NULL,
  `d_pemasukan_harga_beli` double DEFAULT NULL,
  `d_pemasukan_harga_jual` double DEFAULT NULL,
  `d_pemasukan_jumlah` int(11) DEFAULT NULL,
  `d_pemasukan_total` double DEFAULT NULL,
  `d_pemasukan_kode` varchar(15) DEFAULT NULL,
  `d_pemasukan_username` varchar(255) NOT NULL,
  `d_pemasukan_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pemasukan_barang`
--

INSERT INTO `detail_pemasukan_barang` (`d_pemasukan_id`, `d_pemasukan_id_barang`, `d_pemasukan_nofak`, `d_pemasukan_barang_nama`, `d_pemasukan_jenis_barang`, `d_pemasukan_harga_beli`, `d_pemasukan_harga_jual`, `d_pemasukan_jumlah`, `d_pemasukan_total`, `d_pemasukan_kode`, `d_pemasukan_username`, `d_pemasukan_user`) VALUES
(32, 'BR060', '1234567890', 'Sosis Lagi', 'Tests', 12000, 14000, 10, 120000, 'BL040522000001', 'alfi', 'Alfisyah'),
(33, 'BR002', '1234567890', 'Diabetes', 'Tests', 12000, 14000, 3, 42000, 'BL040522000001', 'alfi', 'Alfisyah'),
(34, 'BR004', '1234567890', 'Salmonella', 'Tests', 13000, 19000, 12, 228000, 'BL040522000001', 'alfi', 'Alfisyah'),
(35, 'BR061', '1234567890', 'Sosis', 'Tests', 12000, 19000, 12, 144000, 'BL040522000001', 'alfi', 'Alfisyah'),
(36, 'BR006', '1234567890', 'Drugtest', 'Tests', 23000, 28000, 12, 336000, 'BL040522000001', 'alfi', 'Alfisyah'),
(37, 'BR017', '1234567890', 'Syphilis', 'Tests', 13000, 18000, 12, 216000, 'BL040522000001', 'alfi', 'Alfisyah'),
(38, 'BR006', '1234567890', 'Drugtest', 'Tests', 5000, 10000, 12, 60000, 'BL040522000002', 'alfi', 'Alfisyah'),
(39, 'BR017', '1234567890', 'Syphilis', 'Tests', 13000, 18000, 12, 216000, 'BL040522000002', 'alfi', 'Alfisyah'),
(40, 'BR001', '0987654321', 'Anemia', 'Tests', 80000, 90000, 10, 900000, 'BL060522000003', 'alfi', 'Alfisyah'),
(41, 'BR001', '0987654321', 'Anemia', 'Tests', 80000, 100000, 6, 480000, 'BL060522000004', 'alfi', 'Alfisyah');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan_barang`
--

CREATE TABLE `detail_penjualan_barang` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_barang_id` varchar(15) NOT NULL,
  `d_jual_barang_nama` varchar(150) NOT NULL,
  `d_jual_jenis_barang` varchar(255) NOT NULL,
  `d_jual_harga` double NOT NULL,
  `d_jual_jumlah` int(11) NOT NULL,
  `d_jual_total` double NOT NULL,
  `d_jual_kode` varchar(15) NOT NULL,
  `d_jual_catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_penjualan_barang`
--

INSERT INTO `detail_penjualan_barang` (`d_jual_id`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_jenis_barang`, `d_jual_harga`, `d_jual_jumlah`, `d_jual_total`, `d_jual_kode`, `d_jual_catatan`) VALUES
(77, 'BR004', 'Salmonella', 'Tests', 15000, 2, 30000, 'TR110622000001', ''),
(78, 'BR005', 'Cardiac', 'Tests', 2000, 2, 4000, 'TR110622000001', ''),
(79, 'BR004', 'Salmonella', 'Tests', 15000, 2, 30000, 'TR110622000002', ''),
(80, 'BR003', 'Hematology', 'Tests', 30000, 1, 30000, 'TR110622000003', ''),
(81, 'BR003', 'Hematology', 'Tests', 30000, 1, 30000, 'TR110622000004', ''),
(82, 'BR004', 'Salmonella', 'Tests', 15000, 3, 45000, 'TR110622000005', '');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` bigint(20) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL,
  `harga_jual` double NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_barang`
--

CREATE TABLE `pemasukan_barang` (
  `p_barang_tanggal` date DEFAULT current_timestamp(),
  `p_barang_total` int(11) DEFAULT NULL,
  `p_barang_kode` varchar(15) NOT NULL,
  `p_barang_username` varchar(255) NOT NULL,
  `p_barang_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemasukan_barang`
--

INSERT INTO `pemasukan_barang` (`p_barang_tanggal`, `p_barang_total`, `p_barang_kode`, `p_barang_username`, `p_barang_user`) VALUES
('2022-05-06', 1086000, 'BL040522000001', 'alfi', 'Alfisyah'),
('2021-12-06', 10000, 'BL040522000002', 'alfi', 'Alfisyah'),
('2022-05-06', 900000, 'BL060522000003', 'alfi', 'Alfisyah'),
('2022-05-06', 480000, 'BL060522000004', 'alfi', 'Alfisyah');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_barang_temp`
--

CREATE TABLE `pemasukan_barang_temp` (
  `d_pemasukan_id` int(11) NOT NULL,
  `d_pemasukan_nofak` varchar(15) DEFAULT NULL,
  `d_pemasukan_id_barang` varchar(15) DEFAULT NULL,
  `d_pemasukan_barang_nama` varchar(150) NOT NULL,
  `d_pemasukan_jenis_barang` varchar(255) NOT NULL,
  `d_pemasukan_harga_jual` double DEFAULT NULL,
  `d_pemasukan_harga_beli` double DEFAULT NULL,
  `d_pemasukan_jumlah` int(11) DEFAULT NULL,
  `d_pemasukan_total` double DEFAULT NULL,
  `d_pemasukan_username` varchar(255) NOT NULL,
  `d_pemasukan_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemasukan_barang_temp`
--

INSERT INTO `pemasukan_barang_temp` (`d_pemasukan_id`, `d_pemasukan_nofak`, `d_pemasukan_id_barang`, `d_pemasukan_barang_nama`, `d_pemasukan_jenis_barang`, `d_pemasukan_harga_jual`, `d_pemasukan_harga_beli`, `d_pemasukan_jumlah`, `d_pemasukan_total`, `d_pemasukan_username`, `d_pemasukan_user`) VALUES
(33, '909838202121', 'BR005', 'Cardiac', 'Tests', 16000, 12000, 12, 144000, 'deddy_admin2', 'Deddy Cahyadi S');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_barang`, `nama_barang`, `jenis_barang`, `jml_barang`, `harga_beli`, `harga_jual`) VALUES
('BR001', 'Anemia', 'Tests', 14, 80000, 100000),
('BR002', 'Diabetes', 'Tests', 9, 12000, 400000),
('BR003', 'Hematology', 'Tests', 4, 30000, 30000),
('BR004', 'Salmonella', 'Tests', 36, 13000, 15000),
('BR005', 'Cardiac', 'Tests', 6, 2000, 2000),
('BR006', 'Drugtest', 'Tests', 44, 23000, 28000),
('BR007', 'Durable', 'Tests', 12, 20000, 40000),
('BR008', 'Ginjal', 'Tests', 12, 20000, 40000),
('BR009', 'Hepa', 'Tests', 12, 20000, 40000),
('BR010', 'HIV Test', 'Tests', 12, 100000, 150000),
('BR011', 'Inflamasi', 'Tests', 12, 20000, 40000),
('BR012', 'Klimklin', 'Tests', 12, 20000, 40000),
('BR013', 'Lemak', 'Tests', 12, 20000, 40000),
('BR014', 'Pregna', 'Tests', 12, 20000, 40000),
('BR015', 'Protein', 'Tests', 12, 20000, 40000),
('BR016', 'Dengue', 'Tests', 12, 20000, 40000),
('BR017', 'Syphilis', 'Tests', 48, 13000, 18000),
('BR018', 'TB Test', 'Tests', 12, 20000, 40000),
('BR019', 'Thyroid', 'Tests', 12, 20000, 40000),
('BR020', 'Torch', 'Tests', 12, 20000, 40000),
('BR021', 'Urine', 'Tests', 12, 20000, 40000),
('BR022', 'Oncology', 'Tests', 12, 20000, 40000),
('BR023', 'Blood Grouping', 'Tests', 12, 20000, 40000),
('BR024', 'Electrolyte Kimia Klinik', 'Tests', 12, 20000, 40000),
('BR025', 'Electrolyte Reagent', 'Tests', 12, 20000, 40000),
('BR026', 'Other Reagent', 'Tests', 12, 20000, 40000),
('BR027', 'MULTISURE Dengue Ab/Ag Rapid Test', 'MP-Biomedicals', 12, 20000, 40000),
('BR028', 'ASSURE H. Pylori Rapid Test', 'MP-Biomedicals', 12, 20000, 40000),
('BR029', 'MULTISURE HCV Antibody Assay Rapid Test', 'MP-Biomedicals', 12, 20000, 40000),
('BR030', 'AFP', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR031', 'CA-125', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR032', 'CA 15-3', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR033', '19-9', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR034', 'CEA', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR035', 'PSA', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR036', 'CRP', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR037', 'CK-MB', 'Rapid-Q-Veda-Lab', 12, 20000, 25000),
('BR038', 'D-Dimer', 'Rapid-Q-Veda-Lab', 10, 15000, 20000),
('BR039', 'HS-CRP', 'Rapid-Q-Veda-Lab', 12, 30000, 45000),
('BR040', 'Troponin I', 'Rapid-Q-Veda-Lab', 13, 45000, 60000),
('BR041', 'FERRITIN', 'Rapid-Q-Veda-Lab', 16, 45000, 60000),
('BR042', 'HS-TSH', 'Rapid-Q-Veda-Lab', 20, 20000, 35000),
('BR043', 'T3', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR044', 'T4', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR045', 'TSH', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR046', 'U-TSH', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR047', 'IgE', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR048', 'HbA1C', 'Rapid-Q-Veda-Lab', 12, 20000, 40000),
('BR049', 'PCT', 'Rapid-Q-Veda-Lab', 12, 20000, 25000),
('BR050', 'β-HCG', 'Rapid-Q-Veda-Lab', 10, 15000, 20000),
('BR051', 'Microalbumin', 'Rapid-Q-Veda-Lab', 12, 30000, 45000),
('BR052', 'ASSURE Rapid Test Reader', 'Instruments', 18, 2000000, 2500000),
('BR053', 'Clinical Chemistry (Automatic & Semi-Automatic)', 'Instruments', 15, 5000000, 6500000),
('BR054', 'Controls', 'Instruments', 30, 1500000, 2000000),
('BR055', 'Calibrators', 'Instruments', 10, 900000, 1250000),
('BR056', 'Easy Readers+', 'Instruments', 15, 2500000, 3000000),
('BR057', 'Hematology', 'Instruments', 14, 3000000, 4000000),
('BR058', 'Urinalysis Reader', 'Instruments', 21, 4500000, 5500000),
('BR059', 'ELISA', 'Instruments', 14, 3500000, 4000000),
('BR060', 'Sosis Lagi', 'Tests', 30, 12000, 14000),
('BR061', 'Sosis', 'Tests', 36, 12000, 19000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `jual_tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `jual_total` double DEFAULT NULL,
  `jual_diskon` double NOT NULL,
  `jual_total_diskon` double NOT NULL,
  `jual_kode` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `step` varchar(30) NOT NULL,
  `order_by_marketing` tinyint(1) NOT NULL,
  `username_marketing` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jual_tanggal`, `jual_total`, `jual_diskon`, `jual_total_diskon`, `jual_kode`, `username`, `nama`, `nama_instansi`, `alamat`, `step`, `order_by_marketing`, `username_marketing`) VALUES
(57, '2022-06-11 06:48:53', 34000, 0, 34000, 'TR110622000001', 'rs_elisabeth', 'Bramantyo Wiguna', 'RSU Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 'Pesanan Selesai', 0, '-'),
(58, '2022-06-11 06:51:30', 30000, 0, 30000, 'TR110622000002', 'rs_margono_ceyi', 'Ceyii Shelly Oktivia', 'RS Margono Purwokerto', 'Jl. Dr. Gumbreg No.1, Kebontebu, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146', 'Pesanan Dikirim', 1, 'Harry Pratama Ramadhan'),
(59, '2022-06-11 08:40:29', 30000, 0, 30000, 'TR110622000003', 'rs_elisabeth', 'Bramantyo Wiguna', 'RSU Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 'Pesanan Selesai', 0, '-'),
(60, '2022-06-11 09:49:18', 30000, 0, 30000, 'TR110622000004', 'rs_elisabeth', 'Bramantyo Wiguna', 'RSU Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', 'Belum Dibayar', 0, '-'),
(61, '2022-06-11 09:49:51', 45000, 12, 39600, 'TR110622000005', 'rs_margono_ceyi', 'Ceyii Shelly Oktivia', 'RS Margono Purwokerto', 'Jl. Dr. Gumbreg No.1, Kebontebu, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146', 'Pesanan Selesai', 1, 'Harry Pratama Ramadhan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL DEFAULT '',
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nama`, `nama_instansi`, `alamat`, `no_hp`, `profile_pic`) VALUES
(2, 'alfi', 'alfi', 'Admin', 'Alfisyah', 'Akurat Intan Madya', '', '085726549382', 'uploads/alfisyah.jpg'),
(4, 'harrypratama', 'marketing_1390', 'Marketing', 'Harry Pratama Ramadhan', 'Akurat Intan Madya', '', '087654212821', 'uploads/harry_pratama.jpg'),
(5, 'rs_elisabeth', 'elisabeth2309', 'Mitra', 'Bramantyo Wiguna', 'RSU Elisabeth Purwokerto', 'Jalan Dokter Angka No. 40 Sokanegara, Sitapen, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116', '089789678456', 'uploads/bramantyo.jpg'),
(8, 'rs_margono_ceyi', 'rs_margono9802', 'Mitra', 'Ceyii Shelly Oktivia', 'RS Margono Purwokerto', 'Jl. Dr. Gumbreg No.1, Kebontebu, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146', '089723457681', 'uploads/1643626675.png'),
(11, 'deddy_timur', 'cahyadi2110', 'Marketing', 'Deddy Cahyadi Sunjoyo', 'RS Bunda Purwokerto Timur', 'Jl. Pramuka No.250, Pertabatan, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147', '081122334466', 'uploads/1655040684.png'),
(12, 'isyana_sarasvati23', 'sarasvati_jih1098', 'Mitra', 'Isyana Sarasvati', 'RS \'JIH\' Purwokerto', 'Jl. KH. Ahmad Dahlan, Dusun III, Dukuhwaluh, Kec. Kembaran, Kabupaten Banyumas, Jawa Tengah 53182', '087282908123', 'uploads/1655041033.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemasukan_barang`
--
ALTER TABLE `detail_pemasukan_barang`
  ADD PRIMARY KEY (`d_pemasukan_id`),
  ADD KEY `detail_pemasukan_barang_ibfk_1` (`d_pemasukan_kode`);

--
-- Indexes for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `detail_penjualan_barang_ibfk_1` (`d_jual_barang_id`),
  ADD KEY `detail_penjualan_barang_ibfk_2` (`d_jual_kode`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pemasukan_barang`
--
ALTER TABLE `pemasukan_barang`
  ADD PRIMARY KEY (`p_barang_kode`),
  ADD KEY `pemasukan_barang_ibfk_1` (`p_barang_total`),
  ADD KEY `id_barang` (`p_barang_kode`) USING BTREE;

--
-- Indexes for table `pemasukan_barang_temp`
--
ALTER TABLE `pemasukan_barang_temp`
  ADD PRIMARY KEY (`d_pemasukan_id`),
  ADD KEY `detail_pemasukan_barang_ibfk_2` (`d_pemasukan_id_barang`),
  ADD KEY `detail_pemasukan_barang_ibfk_3` (`d_pemasukan_nofak`);

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
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pemasukan_barang`
--
ALTER TABLE `detail_pemasukan_barang`
  MODIFY `d_pemasukan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pemasukan_barang_temp`
--
ALTER TABLE `pemasukan_barang_temp`
  MODIFY `d_pemasukan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemasukan_barang`
--
ALTER TABLE `detail_pemasukan_barang`
  ADD CONSTRAINT `detail_pemasukan_barang_ibfk_1` FOREIGN KEY (`d_pemasukan_kode`) REFERENCES `pemasukan_barang` (`p_barang_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  ADD CONSTRAINT `detail_penjualan_barang_ibfk_1` FOREIGN KEY (`d_jual_barang_id`) REFERENCES `stock` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_barang_ibfk_2` FOREIGN KEY (`d_jual_kode`) REFERENCES `transaksi` (`jual_kode`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
