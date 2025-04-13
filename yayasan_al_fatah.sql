-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 13, 2025 at 03:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfatah`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_anak`
--

CREATE TABLE `data_anak` (
  `id_anak` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `tingkat_sekolah` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `bisa_membaca` enum('Ya','Belum') DEFAULT NULL,
  `pengalaman_tpa` enum('Ya','Tidak') DEFAULT NULL,
  `hafalan` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_anak`
--

INSERT INTO `data_anak` (`id_anak`, `id_user`, `nama_anak`, `tingkat_sekolah`, `jenis_kelamin`, `bisa_membaca`, `pengalaman_tpa`, `hafalan`, `created_at`) VALUES
(2, 13, 'ppy', 'tk', 'Laki-laki', 'Ya', 'Ya', 'yyyy', '2025-04-11 09:38:01'),
(3, 14, 'anak ipat', 'baru lahir', 'Perempuan', 'Ya', 'Ya', 'juz buah', '2025-04-11 09:45:50'),
(4, 15, 'fff', 'haas', 'Laki-laki', 'Belum', 'Ya', 'asdqqa', '2025-04-12 05:34:37'),
(5, 16, 'sad', 'fc', 'Laki-laki', 'Belum', 'Ya', 'EDCFS', '2025-04-12 05:46:16'),
(11, 24, 'kudanil', 'baru lahir', 'Laki-laki', 'Belum', 'Tidak', 'Yasin', '2025-04-13 14:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `mapel` varchar(100) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('aktif','tidak aktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `nip`, `mapel`, `alamat`, `email`, `no_telp`, `created_at`, `status`) VALUES
(1, 'Susilo, S.Pd.,', '20250001', 'olahraga', 'Desa Balungan', 'susilo123@gmail.com', '089', '2025-04-12 15:30:20', 'aktif'),
(2, 'bambang, S.Pd.,', '20250002', 'olahraga', 'Desa Muncang', 'bambang123@gmail.com', '0989', '2025-04-12 15:30:20', 'aktif'),
(3, 'endah, S.Pd.,', '20250003', 'bahasa', 'Desa Gedeg', 'endah123@gmail.com', '0897', '2025-04-12 15:30:20', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_anak` int NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah_bayar` decimal(10,2) DEFAULT NULL,
  `status` enum('Pending','Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_anak`, `keterangan`, `tgl_bayar`, `jumlah_bayar`, `status`) VALUES
(2, 14, 3, 'Infaq Masjid', '2025-04-13', '150000.00', 'Lunas'),
(3, 15, 4, 'Infaq Masjid', '2025-04-13', '150000.00', 'Lunas'),
(4, 14, 3, 'Infaq Masjid', '2025-04-13', '150000.00', 'Lunas'),
(8, 24, 11, 'Infaq Masjid', '2025-04-14', '150000.00', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `alamat` text,
  `no_telp_wali` varchar(20) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `nama_wali`, `alamat`, `no_telp_wali`, `role`, `created_at`) VALUES
(13, 'ff@gmail.com', '$2y$10$CESsWhaGauwHUrA8BHTQC.Hxd9c.lBf/RRr4WIALE/xNXWd90Bbxi', 'ff', 'ff', '099', 'user', '2025-04-11 08:38:58'),
(14, 'shandika@gmail.com', '$2y$10$XcKl8ZsWHxrzkKvjCAtvfujTIpcxrAFI85ovS3Smy54LAFy4Kn7aO', 'swali', 'salamat', '0999', 'user', '2025-04-11 09:43:27'),
(15, 'far@gmail.com', '$2y$10$J20iLSR/rtjnTFULZ3zZ3OYDUmMn/4obGGbdn2h3.pw.eZYLWXpJ.', 'far', 'far', '099', 'user', '2025-04-12 05:34:14'),
(16, 'frr@gmail.com', '$2y$10$ccbYDXK5T81Re7H/t0Gr0u.mFN1ZrN8dKhujyE3EgnVpsEcJdydbW', 'frr', 'sdc', '098', 'user', '2025-04-12 05:45:53'),
(19, 'harapanmulya@gmail.com', '$2y$10$7dzLKR98vVTifwEjNAggiep1AoONWUU.2/KFmQzm8f7R3enrpSf..', NULL, NULL, NULL, 'admin', '2025-04-12 20:46:46'),
(21, 'ipat1@gmail.com', '$2y$10$p6lzxbgU9ocDGTXw.Q9onu0.Iz40w520ZqRdCzTip6xCgAtErZ31C', 'waliipat1', 'desaipat1', '081', 'user', '2025-04-13 13:51:31'),
(22, 'ipat2@gmail.com', '$2y$10$xlQBlAnRnc/JuqqXC.nef.SvPWj5EaMfNQyL4M4OWcGawNLQko7Qa', 'ipat2wali', 'ipat2alamat', '082', 'user', '2025-04-13 13:52:57'),
(23, 'ipat3@gmail.com', '$2y$10$HXb1DlBuQeKCDV1IB4N9aOU2eD8Ahm0YGBJedO1zR5GgEILI79/De', 'ipat3wali', 'ipat3alamat', '083', 'user', '2025-04-13 13:54:52'),
(24, 'ipet123@gmail.com', '$2y$10$E0FU7.Ypuf0Xh7qRmdv74e/LFyjLD0EautR8AIoCr3EnAKRb8C1Q6', 'wali ipet', 'alamat ipet', '0987', 'user', '2025-04-13 14:27:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_anak`
--
ALTER TABLE `data_anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_anak` (`id_anak`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_anak`
--
ALTER TABLE `data_anak`
  MODIFY `id_anak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_anak`
--
ALTER TABLE `data_anak`
  ADD CONSTRAINT `data_anak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_anak`) REFERENCES `data_anak` (`id_anak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
