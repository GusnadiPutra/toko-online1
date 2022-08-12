-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 05:37 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shoppingsatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `telp_admin` varchar(15) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `alamat_admin`, `email_admin`, `telp_admin`, `username_admin`, `password_admin`) VALUES
('ADM-001', 'Komang', 'Bali', 'komang@gmail.com', '081999888777', 'komang', 'komang'),
('ADM-002', 'Tyas', 'Jl. Tukad Petanu No.9', 'tyas@gmail.com', '0895325701601', 'tyas', 'tyas'),
('ADM-003', 'widy', 'Jl. Tukad Petanu, No.9, Sidakarya, Denpasar Selatan', 'widy@gmail.com', '087654328765', 'widy', 'widy'),
('ADM-004', 'Huda Aji', 'Jl. Kembang Kepah No.9, Gatsu Timur, Bali', 'hudaaji@gmail.com', '08212345682', 'hudaji', 'hudaji'),
('ADM-005', 'Caren Elysia', 'Jl. Kembang Kepah No. 9, Gatsu Timur', 'carenely1@gmail.com', '0895325701602', 'caren', 'carenely');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataproduk`
--

CREATE TABLE `tb_dataproduk` (
  `id_produk` varchar(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `stok` int(20) NOT NULL,
  `berat` int(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dataproduk`
--

INSERT INTO `tb_dataproduk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `deskripsi`, `ukuran`, `warna`, `stok`, `berat`, `gambar`) VALUES
('BRG-00001', 'KTG-001', 'Gamis Mayuu', 185000, 'Bahan Ceruty, All fit to M-XL', 'M', 'Merah', 1, 500, 'BRG-00001_8059.jpg'),
('BRG-00002', 'KTG-002', 'One Set Manise', 165000, 'Bahan Tory Bruch, All size fit to XL', '', 'Merah', 0, 455, 'BRG-00002_4975.jpg'),
('BRG-00003', 'KTG-001', 'Gamis Manal', 240000, 'Bahan Jet-Black dikombinasikan dengan ceruty motif import dan fulling dan ada kombinasi dari wollycrape.\nBusui friendly. Fit to Xl', 'M', 'Merah', 1, 480, 'BRG-00003_1620.jpg'),
('BRG-00004', 'KTG-004', 'Mukenah Adiba', 270000, 'Bahan katun premium', 'L', 'Merah', 0, 600, 'BRG-00004_996.jpg'),
('BRG-00005', 'KTG-005', 'Tasya Dress Pesta', 285000, 'Bahan brookat import, full furing mix tile prancis.\nLD 110 cm.\nFit to XL.', 'L', 'Hitam', 0, 570, 'BRG-00005_3570.jpg'),
('BRG-00006', 'KTG-002', 'Momo Set Amuba', 200000, 'Bahan Rayon Uniqlo.\nCelana Kulot pinggang karet.\nLD 114 cm.\nFit to XL.\nBusui friendly dan wudhu friendly.', '', 'Hitam', 31, 350, 'BRG-00006_5156.jpg'),
('BRG-00007', 'KTG-002', 'Bohemian Set Salur', 200000, 'Bahan Rayon Viscose mix Zara.\nLD 114 cm fit to XL.\nCelana Joger pinggang full Karet.\nBusui friendly dan wudhu friendly', 'L', 'Hitam', 10, 400, 'BRG-00007_2185.jpg'),
('BRG-00008', 'KTG-005', 'Fatima Dress', 225000, 'Bahan brokat import mix tile jepang.\nFull furing.\nLD 106 cm fit to XL.', '', 'Belang', 25, 500, 'BRG-00008_8579.jpg'),
('BRG-00009', 'KTG-005', 'Maharani Dress', 200000, 'Bahan brokat mix tile.\nFull furing, dihias mutiara import.\nLD 106 cm fit to XL standar.', '', 'Belang', 35, 700, 'BRG-00009_7924.jpg'),
('BRG-00010', 'KTG-002', 'Vinara Line Blue', 200000, 'Bahan rayon uniqlo, celana kulot full karet pinggang.\nLD 107 cm.\nBusui friendly', '', 'Belang', 13, 300, 'BRG-00010_190.jpg'),
('BRG-00011', 'KTG-001', 'New Maxi Tasya', 250000, 'Bahan scuba premium mix ceruty, cardy lepas.\nLD 110 cm fit to XL.', '', 'Biru', 23, 360, 'BRG-00011_352.jpg'),
('BRG-00012', 'KTG-003', 'Bergo Sally', 50000, 'Bahan Ceruty', '', 'Kuning', 23, 100, 'BRG-00012_3663.jpg'),
('BRG-00013', 'KTG-006', 'Kemeja Garis Hitam', 129000, 'Bahan Katun, LD 100 cm', '', 'Saru', 27, 270, 'BRG-00013_9555.jpg'),
('BRG-00014', 'KTG-007', 'Azara Koko', 185000, 'Bahan Katun, LD 100cm', '', 'Bebas', 9, 350, 'BRG-00014_8423.jpg'),
('BRG-00015', 'KTG-006', 'asdfgh', 150000, 'Brumbun', '', 'tuy', 1, 1000, 'BRG-00015_5116.jpg'),
('BRG-00016', 'KTG-007', 'rety', 10000, 'r', '', 'sdfgh', 4, 1000, 'BRG-00016_6234.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id_detail` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) NOT NULL,
  `harga_pesanan` bigint(50) NOT NULL,
  `jumlah_produk` int(20) NOT NULL,
  `sub_total` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `id_produk`, `id_pemesanan`, `harga_pesanan`, `jumlah_produk`, `sub_total`) VALUES
(1, 'BRG-00001', 'PSN-00001', 185000, 1, 185000),
(2, 'BRG-00003', 'PSN-00002', 240000, 3, 720000),
(3, 'BRG-00001', 'PSN-00003', 185000, 1, 185000),
(4, 'BRG-00005', 'PSN-00004', 285000, 3, 855000),
(5, 'BRG-00002', 'PSN-00005', 165000, 1, 165000),
(6, 'BRG-00010', 'PSN-00005', 200000, 1, 200000),
(7, 'BRG-00011', 'PSN-00006', 250000, 2, 500000),
(8, 'BRG-00007', 'PSN-00007', 200000, 1, 200000),
(9, 'BRG-00012', 'PSN-00008', 50000, 1, 50000),
(10, 'BRG-00004', 'PSN-00009', 270000, 1, 270000),
(11, 'BRG-00003', 'PSN-00010', 240000, 1, 240000),
(12, 'BRG-00001', 'PSN-00011', 185000, 2, 370000),
(13, 'BRG-00014', 'PSN-00012', 185000, 1, 185000),
(14, 'BRG-00012', 'PSN-00013', 50000, 1, 50000),
(15, 'BRG-00001', 'PSN-00014', 185000, 1, 185000),
(16, 'BRG-00011', 'PSN-00015', 250000, 1, 250000),
(17, 'BRG-00001', 'PSN-00016', 185000, 1, 185000),
(18, 'BRG-00012', 'PSN-00017', 50000, 1, 50000),
(19, 'BRG-00001', 'PSN-00018', 185000, 1, 185000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG-001', 'Gamis'),
('KTG-002', 'One Set Celana'),
('KTG-003', 'Jilbab'),
('KTG-004', 'Mukenah'),
('KTG-005', 'Dress Brokat'),
('KTG-006', 'Atasan Wanita'),
('KTG-007', 'Baju Koko');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_produk`, `id_pelanggan`, `jumlah_produk`) VALUES
(2, 'BRG-00003', '', 1),
(6, 'BRG-00008', '', 1),
(17, 'BRG-00014', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kirim`
--

CREATE TABLE `tb_kirim` (
  `id_kirim` int(11) NOT NULL,
  `id_pemesanan` varchar(10) NOT NULL,
  `tanggal_kirim` datetime NOT NULL,
  `no_resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kirim`
--

INSERT INTO `tb_kirim` (`id_kirim`, `id_pemesanan`, `tanggal_kirim`, `no_resi`) VALUES
(1, 'PSN-00001', '2021-06-04 00:00:00', 'JN654321890'),
(2, 'PSN-00003', '2021-06-05 00:00:00', 'JN87654336789'),
(3, 'PSN-00006', '2021-06-02 00:00:00', 'JT89743215'),
(4, 'PSN-00008', '2021-07-03 00:00:00', 'JN123897643'),
(5, 'PSN-00009', '2021-07-03 00:00:00', 'JN2365417899'),
(6, 'PSN-00012', '2021-07-22 00:00:00', 'ejkrtyui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_ongkir` varchar(10) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `tarif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telp_pelanggan` varchar(20) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `username_pelanggan` varchar(30) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_prov` varchar(50) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kab` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telp_pelanggan`, `email_pelanggan`, `username_pelanggan`, `password_pelanggan`, `alamat_pelanggan`, `id_provinsi`, `nama_prov`, `id_kabupaten`, `nama_kab`, `bank`, `rekening`) VALUES
('PLG-00001', 'User', 'user@gmail.com', '081888777666', 'user', 'user', 'Jln User', 1, 'Bali', 94, 'Buleleng', 'BNI', '8987646432679'),
('PLG-00002', 'Aristha Widya Purwaningtyas', 'aristha130399@gmail.', '0895325701601', 'aristha', 'aris', 'tukad petanu gg. boxer no.9', 1, 'Bali', 114, 'Denpasar', 'BNI', '0239947347'),
('PLG-00003', 'renata krisna', '089765654345', 'renkris@gmail.com', 'renata', 'renata', 'sesetan', 1, 'Bali', 114, 'Denpasar', 'BCA', '14534789'),
('PLG-00004', 'argyanti', '089765897543', 'arg@gmail.com', 'argy', 'argy', 'mataram', 22, 'Nusa Tenggara Barat (NTB)', 276, 'Mataram', 'BRI', '765894312'),
('PLG-00005', 'nityan tari', '087657890431', 'nity@gmail.com', 'nityan', 'nityan', 'btn griya pagutan indah jl. pantai senggigi no.69', 22, 'Nusa Tenggara Barat (NTB)', 276, 'Mataram', 'BNI', '162785678'),
('PLG-00006', 'Komang Wira W.', '087657888902', 'wira13@gmaol.com', 'wira', 'wira', 'btn griya pagutan indah jl. pantai senggigi no.69', 22, 'Nusa Tenggara Barat (NTB)', 276, 'Mataram', 'BRI', '380973219087'),
('PLG-00007', 'Lina Herlina', '087890234645', 'lina12@gmail.com', 'lina', 'lina12', 'Jalan Kasuari no.41, Peguyangan', 1, 'Bali', 114, 'Denpasar', 'BRI', '65890326789');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_pemesanan` varchar(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `read_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pemesanan`, `tanggal_pembayaran`, `bukti_transfer`, `status_pembayaran`, `read_pembayaran`) VALUES
(1, 'PSN-00001', '2021-06-04', 'bukti_PSN-00001_5091.jpg', 'Confirm', 1),
(2, 'PSN-00003', '2021-06-05', 'bukti_PSN-00003_2154.jpg', 'Confirm', 1),
(3, 'PSN-00004', '2021-06-05', 'bukti_PSN-00004_3060.jpg', 'Confirm', 1),
(4, 'PSN-00005', '2021-06-05', 'bukti_PSN-00005_2430.jpg', 'Confirm', 1),
(5, 'PSN-00006', '2021-06-02', 'bukti_PSN-00006_868.jpg', 'Confirm', 1),
(6, 'PSN-00008', '2021-07-03', 'bukti_PSN-00008_5242.jpg', 'Confirm', 1),
(7, 'PSN-00009', '2021-07-03', 'bukti_PSN-00009_6175.jpg', 'Confirm', 1),
(8, 'PSN-00012', '2021-07-22', 'bukti_PSN-00012_851.jpg', 'Confirm', 1),
(9, 'PSN-00013', '2021-07-22', 'bukti_PSN-00013_6416.jpg', 'Confirm', 1),
(10, 'PSN-00014', '2021-07-22', 'bukti_PSN-00014_5550.jpg', 'Confirm', 1),
(11, 'PSN-00015', '2021-07-22', 'bukti_PSN-00015_6763.jpg', 'Confirm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pemesanan` varchar(10) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `id_provinsi` varchar(10) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  `id_kabupaten` varchar(10) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `kurir_layanan` varchar(50) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `total_harga` bigint(50) NOT NULL,
  `total_ongkir` bigint(50) NOT NULL,
  `total_bayar` bigint(50) NOT NULL,
  `status_pemesanan` varchar(20) NOT NULL,
  `read_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pemesanan`, `id_pelanggan`, `tgl_pemesanan`, `id_provinsi`, `nama_provinsi`, `id_kabupaten`, `nama_kabupaten`, `kurir_layanan`, `jenis_layanan`, `total_berat`, `total_harga`, `total_ongkir`, `total_bayar`, `status_pemesanan`, `read_pemesanan`) VALUES
('PSN-00001', 'PLG-00002', '2021-06-04 00:00:00', '1', 'Bali', '114', 'Denpasar', 'jne', 'OKE', 500, 185000, 24000, 209000, 'Terima', 0),
('PSN-00002', 'PLG-00002', '2021-06-04 00:00:00', '1', 'Bali', '114', 'Denpasar', 'tiki', 'ECO', 1440, 720000, 46000, 766000, 'Batal', 0),
('PSN-00003', 'PLG-00002', '2021-06-05 00:00:00', '1', 'Bali', '114', 'Denpasar', 'jne', 'REG', 500, 185000, 28000, 213000, 'Kirim', 0),
('PSN-00004', 'PLG-00003', '2021-06-05 00:00:00', '1', 'Bali', '114', 'Denpasar', 'jne', 'OKE', 1710, 855000, 48000, 903000, 'Proses', 0),
('PSN-00005', 'PLG-00004', '2021-06-05 00:00:00', '22', 'Nusa Tenggara Barat (NTB)', '276', 'Mataram', 'jne', 'OKE', 755, 365000, 32000, 397000, 'Proses', 0),
('PSN-00006', 'PLG-00002', '2021-06-02 00:00:00', '1', 'Bali', '114', 'Denpasar', 'cod', '-', 720, 500000, 0, 500000, 'Kirim', 0),
('PSN-00007', 'PLG-00003', '2021-06-02 00:00:00', '1', 'Bali', '114', 'Denpasar', 'pos', 'Paket Kilat Khusus', 400, 200000, 27000, 227000, 'Batal', 0),
('PSN-00008', 'PLG-00002', '2021-07-03 00:00:00', '1', 'Bali', '114', 'Denpasar', 'jne', 'OKE', 100, 50000, 24000, 74000, 'Terima', 0),
('PSN-00009', 'PLG-00007', '2021-07-03 00:00:00', '1', 'Bali', '114', 'Denpasar', 'jne', 'REG', 600, 270000, 28000, 298000, 'Terima', 0),
('PSN-00010', 'PLG-00007', '2021-07-03 00:00:00', '1', 'Bali', '114', 'Denpasar', 'tiki', 'REG', 480, 240000, 27000, 267000, 'Batal', 0),
('PSN-00011', 'PLG-00001', '2021-07-21 00:00:00', '1', 'Bali', '94', 'Buleleng', 'jne', 'REG', 1000, 370000, 36000, 406000, 'Batal', 0),
('PSN-00012', 'PLG-00001', '2021-07-22 00:00:00', '1', 'Bali', '94', 'Buleleng', 'jne', 'REG', 350, 185000, 36000, 221000, 'Kirim', 1),
('PSN-00013', 'PLG-00001', '2021-07-22 00:00:00', '1', 'Bali', '94', 'Buleleng', 'cod', '-', 100, 50000, 0, 50000, 'Proses', 1),
('PSN-00014', 'PLG-00001', '2021-07-22 00:00:00', '1', 'Bali', '94', 'Buleleng', 'cod', '-', 500, 185000, 0, 185000, 'Proses', 1),
('PSN-00015', 'PLG-00001', '2021-07-22 00:33:30', '1', 'Bali', '94', 'Buleleng', 'cod', '-', 360, 250000, 0, 250000, 'Proses', 1),
('PSN-00016', 'PLG-00001', '2021-07-22 00:37:58', '1', 'Bali', '94', 'Buleleng', 'cod', '-', 500, 185000, 0, 185000, 'Batal', 0),
('PSN-00017', 'PLG-00001', '2021-07-22 00:00:00', '1', 'Bali', '94', 'Buleleng', 'jne', 'OKE', 100, 50000, 31000, 81000, 'Batal', 0),
('PSN-00018', 'PLG-00001', '2021-07-23 06:58:00', '1', 'Bali', '94', 'Buleleng', 'cod', '-', 500, 185000, 0, 185000, 'Pesan', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_dataproduk`
--
ALTER TABLE `tb_dataproduk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_kirim`
--
ALTER TABLE `tb_kirim`
  ADD PRIMARY KEY (`id_kirim`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_kirim`
--
ALTER TABLE `tb_kirim`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
