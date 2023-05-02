-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 01:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minafood`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `nomor_hp` int(11) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `prioritas` enum('Utama','Samping') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `nama_penerima`, `nomor_hp`, `kota`, `alamat`, `kode_pos`, `prioritas`) VALUES
(1, 2, 'ada', 2, 'ada', 'Alamat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beli_langsung`
--

CREATE TABLE `beli_langsung` (
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`) VALUES
(1, 'Predator', '2023-04-30 15:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL DEFAULT 1,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `no_fax` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `maps_iframe` text NOT NULL,
  `livechat_api` text NOT NULL,
  `whatsapp_number` varchar(30) NOT NULL,
  `facebook_url` varchar(200) NOT NULL,
  `instagram_url` varchar(200) NOT NULL,
  `twitter_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `no_telp`, `no_fax`, `email`, `maps_iframe`, `livechat_api`, `whatsapp_number`, `facebook_url`, `instagram_url`, `twitter_url`) VALUES
(1, 'Jl. Kokrosono No.70, Bulu Lor, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50179', '(024)111', '', 'kontak@smk-pws.sch.id', '', '', '08112881800', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_pembayaran` varchar(50) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `id_alamat` int(11) DEFAULT NULL,
  `status` enum('Telah Dikonfirmasi','Belum Dikonfirmasi') DEFAULT 'Belum Dikonfirmasi',
  `bukti_pembayaran` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `detail_waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kode_pembayaran`, `id_produk`, `id_user`, `jumlah`, `subtotal`, `id_alamat`, `status`, `bukti_pembayaran`, `date`, `detail_waktu`) VALUES
(1, '230502FIF2F23J', 1, 2, 1, NULL, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:12:21'),
(3, '2305022WBBTRRT', 1, 2, 1, NULL, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:19:05'),
(4, '23050299N23F8X', 1, 2, 1, NULL, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:19:08'),
(5, '2305025CGRJJTQ', 1, 2, 1, NULL, NULL, 'Belum Dikonfirmasi', 'Screenshot_(56).png', '2023-05-02', '2023-05-02 18:26:28'),
(6, '230502SL7U4WBO', 1, 2, 1, NULL, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:30:13'),
(7, '230502NWUB87G4', 1, 2, 1, NULL, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:30:59'),
(8, '23050280WM8LVM', 1, 2, 2, NULL, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:32:11'),
(9, '230502LH33FTUQ', 1, 2, 1, NULL, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:32:55'),
(10, '230502C1JJGZJZ', 1, 2, 1, NULL, 0, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:34:57'),
(11, '230502HREN5CG8', 1, 2, 1, NULL, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:35:09'),
(12, '230502S8LC5QXC', 1, 2, 1, 250000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:39:05'),
(13, '2305027UA1NH5X', 1, 2, 2, 500000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 18:39:19'),
(14, '2305025STLOORB', 1, 2, 1, 250000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:01:09'),
(15, '230502LQ1A9VAL', 1, 2, 1, 250000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:08:15'),
(16, '230502JRORMC0U', 1, 2, 1, 250000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:08:54'),
(17, '2305024M9292IR', 2, 2, NULL, 0, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:14:44'),
(18, '230502HWAQ9YJC', 3, 2, NULL, 0, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:15:14'),
(19, '230502KO5O1C31', 4, 2, NULL, 0, NULL, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:16:27'),
(20, '23050204VENWDY', 1, 2, 1, 250000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:16:54'),
(21, '230502LK37RGCQ', 1, 2, 1, 250000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:19:09'),
(22, '230502ROQYCP8B', 1, 2, 2, 500000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:20:39'),
(23, '230502ZBNR1GYW', 1, 2, 1, 250000, 1, 'Belum Dikonfirmasi', NULL, '2023-05-02', '2023-05-02 19:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(30) DEFAULT NULL,
  `nama_produk` varchar(30) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `id_tipe`, `harga`, `stok`, `deskripsi`, `foto`, `created_at`) VALUES
(1, 'PDK-LWBISRV', 'Piranha', 1, 2, 250000, 2, 'Contoh Deskripsi', 'piranha.jpg', '2023-04-30 18:21:40'),
(2, 'PDK-ADADADA', 'Piranha ke 2', 1, 2, 250000, NULL, '<p><em><strong>Contoh</strong></em><strong><em> Desk</em>ripsi<s> ada egege</s></strong></p>\r\n', '', '2023-04-30 18:21:40'),
(3, 'PDK-022EGWJ', 'Ikan Lele', 1, 2, 20000, NULL, 'ada', '', '2023-05-01 09:05:37'),
(4, 'PDK-4HUC2UE', 'tes', 1, 1, 20000, NULL, '<p>tes</p>\r\n', NULL, '2023-05-02 06:38:26'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02 08:10:07'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02 08:14:01'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02 08:14:05'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02 08:15:31'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02 08:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `nama_tipe`, `created_at`) VALUES
(1, 'Tipe', '2023-04-30 15:49:27'),
(2, 'Tipe2', '2023-04-30 19:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `role`, `foto`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$iyU4JEh/Dp2K/KC8pRN.UeCc1zuTsY7CdFxCxaHHmFTC6dtppb5Ni', 'Admin', NULL),
(2, 'ada', 'ada@ada.com', '$2y$12$xlS4vuGOJCcysYmZ/FKEf.1MnKW0jqACCpoTwWBREXq8s1mHgiaFC', 'User', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
