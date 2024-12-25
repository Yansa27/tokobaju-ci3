-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 10:18 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcbrandstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_orders`
--

CREATE TABLE `custom_orders` (
  `id` int(11) NOT NULL,
  `jenis_kain` varchar(100) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `size` enum('S','M','L','XL') NOT NULL,
  `jenis_sarung` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Pending','Diterima','Ditolak') DEFAULT 'Pending',
  `catatan` text,
  `foto_baju` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_orders`
--

INSERT INTO `custom_orders` (`id`, `jenis_kain`, `warna`, `size`, `jenis_sarung`, `jumlah`, `status`, `catatan`, `foto_baju`, `created_at`, `updated_at`) VALUES
(1, 'Sutra', '', 'S', 'sarung', 1, 'Ditolak', 'Ditolak', '6767d13c38817.png', '2024-12-22 15:43:40', '2024-12-22 20:51:30'),
(2, 'Sutra', 'Milo', 'M', 'sarung', 1, 'Pending', NULL, '6767d85c1ad55.png', '2024-12-22 16:14:04', '2024-12-22 16:34:48'),
(3, 'Sutra', 'Hitam', 'S', 'sarung', 100, 'Pending', NULL, '6767d988f4111.png', '2024-12-22 16:19:05', '2024-12-22 16:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(18, 'Kategori 1'),
(19, 'kategori 2'),
(21, 'teskategori');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `idbeli` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tanggaltransfer` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `idbeli`, `nama`, `tanggaltransfer`, `tanggal`, `bukti`) VALUES
(1, 25, 'Juliansa', '2024-12-21', '2024-12-21 19:51:08', 'bukti_25_1734807068.png'),
(2, 26, 'udin', '2024-12-21', '2024-12-21 23:12:12', 'bukti_26_1734819132.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idbeli` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `id` int(11) NOT NULL,
  `tanggalbeli` date NOT NULL,
  `totalbeli` text NOT NULL,
  `alamatpengiriman` text NOT NULL,
  `totalberat` varchar(255) NOT NULL,
  `statusbeli` text NOT NULL,
  `waktu` datetime NOT NULL,
  `metodepengiriman` text NOT NULL,
  `provinsi` text NOT NULL,
  `kota` text NOT NULL,
  `metodepembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idbeli`, `notransaksi`, `id`, `tanggalbeli`, `totalbeli`, `alamatpengiriman`, `totalberat`, `statusbeli`, `waktu`, `metodepengiriman`, `provinsi`, `kota`, `metodepembayaran`) VALUES
(16, '#TP20240706114426', 14, '2024-07-06', '91000', 'Jl s supriadi gang 2a, sukun malang', '500', 'Belum Bayar', '2024-07-06 11:44:26', 'Reguler', 'Kalimantan Timur', 'Berau', 'Transfer'),
(17, '#TP20240706114454', 14, '2024-07-06', '120000', 'Jl s supriadi gang 2a, sukun malang', '500', 'Belum di Konfirmasi', '2024-07-06 11:44:54', 'Reguler', 'Maluku Utara', 'Tidore Kepulauan', 'COD'),
(18, '#TP20241120042826', 14, '2024-11-20', '120000', 'Jl s supriadi gang 2a, sukun malang', '500', 'Belum Bayar', '2024-11-20 16:28:26', 'Reguler', 'Sumatera Selatan', 'Banyuasin', 'Transfer'),
(25, '#TP20241221062535', 13, '2024-12-21', '120000', 'jakarta', '500', 'Pesanan Sedang Di Proses', '2024-12-21 18:25:35', '', 'Sumatera Selatan', 'Palembang', 'Transfer'),
(26, '#TP20241221111149', 13, '2024-12-21', '240000', 'jakarta', '1000', 'Pesanan Sedang Di Proses', '2024-12-21 23:11:49', '', 'Sumatera Selatan', 'Palembang', 'Transfer'),
(27, '#TP20241222111453', 13, '2024-12-22', '95000', 'jakarta', '500', 'Belum Bayar', '2024-12-22 11:14:53', '', 'Sumatera Selatan', 'Palembang', 'Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `pembelianproduk`
--

CREATE TABLE `pembelianproduk` (
  `idbeli_produk` int(11) NOT NULL,
  `idbeli` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `nama` text NOT NULL,
  `harga` text NOT NULL,
  `subharga` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelianproduk`
--

INSERT INTO `pembelianproduk` (`idbeli_produk`, `idbeli`, `idproduk`, `nama`, `harga`, `subharga`, `jumlah`) VALUES
(18, 16, 49, 'Kitty Dress', '91000', '91000', '1'),
(19, 17, 48, 'Mecca Set', '120000', '120000', '1'),
(20, 18, 48, 'Mecca Set', '120000', '120000', '1'),
(23, 25, 48, 'Mecca Set', '120000', '120000', '1'),
(24, 26, 48, 'Mecca Set', '120000', '240000', '2'),
(25, 27, 46, 'Daster Gamis adek', '95000', '95000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '082269262728', 'Palembang', 'Admin'),
(13, 'udin', 'udin@gmail.com', 'udin1', '0812239494', 'jakarta', 'Pelanggan'),
(14, 'Fahrul Adib', 'penjahit@gmail.com', '123', '085646485283', 'Jl s supriadi gang 2a, sukun malang', 'Penjahit'),
(15, 'Penjahit', 'penjahit@gmail.com', 'admin', '085156390652', 'Penjahit', ''),
(16, 'tespenjahit', 'tespenjahit@gmail.com', 'admin', '085156390652', 'tespenjahit', 'Penjahit');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `namaproduk` text NOT NULL,
  `hargaproduk` text NOT NULL,
  `stokproduk` text NOT NULL,
  `fotoproduk` text NOT NULL,
  `deskripsiproduk` text NOT NULL,
  `beratproduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `id_kategori`, `namaproduk`, `hargaproduk`, `stokproduk`, `fotoproduk`, `deskripsiproduk`, `beratproduk`) VALUES
(46, 18, 'Daster Gamis adek', '95000', '10', 'produk10.jpg', '<p>Daster Gamis</p>\r\n', '500'),
(47, 18, 'Mona Set', '105000', '5', 'produk11.jpg', '<p>Mona Set</p>\r\n', '500'),
(48, 19, 'Mecca Set', '120000', '5', 'produk12.jpg', '<p>Mecca Set</p>\r\n', '500'),
(49, 19, 'Kitty Dress', '91000', '5', 'produk13.jpg', '<p>Kitty Dress</p>\r\n', '500'),
(50, 18, 'Mohammad Qudsi HM - Gulukmanjung Bluto Sumenep', '3000', '10', 'Screenshot_(40).png', '<p>ksaklsjlak</p>\r\n', '10');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `idulasan` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `nama_pengulas` varchar(255) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`idulasan`, `idproduk`, `nama_pengulas`, `ulasan`, `rating`, `tanggal`) VALUES
(5, 49, 'Fahrul Adib', 'bagus', 4, '2024-10-22 00:00:00'),
(6, 49, 'Fahrul Adib', 'keren', 3, '2024-01-10 00:00:00'),
(7, 49, 'Fahrul Adib', 'manteb', 5, '1900-01-10 08:59:32'),
(8, 49, 'Fahrul Adib', 'asdasd', 1, '0000-00-00 00:00:00'),
(9, 48, 'Fahrul Adib', 'Bagus banget ini', 4, '2024-10-22 16:44:42'),
(10, 47, 'Fahrul Adib', 'Jelek', 1, '2024-10-22 16:45:05'),
(11, 49, 'Fahrul Adib', 'ajib', 4, '2024-10-22 16:46:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_orders`
--
ALTER TABLE `custom_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `idbeli` (`idbeli`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idbeli`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pembelianproduk`
--
ALTER TABLE `pembelianproduk`
  ADD PRIMARY KEY (`idbeli_produk`),
  ADD KEY `idbeli` (`idbeli`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`idulasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_orders`
--
ALTER TABLE `custom_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembelianproduk`
--
ALTER TABLE `pembelianproduk`
  MODIFY `idbeli_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `idulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idbeli`) REFERENCES `pembelian` (`idbeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelianproduk`
--
ALTER TABLE `pembelianproduk`
  ADD CONSTRAINT `pembelianproduk_ibfk_1` FOREIGN KEY (`idbeli`) REFERENCES `pembelian` (`idbeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelianproduk_ibfk_2` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
