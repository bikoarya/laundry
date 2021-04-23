-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 06:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis`
--

CREATE TABLE `t_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jenis`
--

INSERT INTO `t_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Kiloan'),
(2, 'Satuan');

-- --------------------------------------------------------

--
-- Table structure for table `t_member`
--

CREATE TABLE `t_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_member`
--

INSERT INTO `t_member` (`id_member`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(20, 'Budi Setiawan', 'Jl. Diponegoro, Malang', 'Laki-laki', '081259464280'),
(22, 'Rafa Athalah', 'Jl. Tanimbar, Malang', 'Laki-laki', '085385975175');

-- --------------------------------------------------------

--
-- Table structure for table `t_outlet`
--

CREATE TABLE `t_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_outlet`
--

INSERT INTO `t_outlet` (`id_outlet`, `nama_outlet`, `alamat`, `tlp`) VALUES
(1, 'Go Laundry', 'Jl. Tanimbar, Malang', '081259464280'),
(8, 'Laundry\'s', 'Jl. Panglima Sudirman, Turen', '085225865125');

-- --------------------------------------------------------

--
-- Table structure for table `t_paket`
--

CREATE TABLE `t_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_paket`
--

INSERT INTO `t_paket` (`id_paket`, `id_outlet`, `id_jenis`, `nama_paket`, `harga`) VALUES
(8, 1, 1, 'Reguler kiloan', 5000),
(9, 1, 1, 'Express kiloan', 8000),
(21, 1, 2, 'Bed Cover', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Kasir'),
(3, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `berat` int(20) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Baru','Proses','Selesai','Diambil') NOT NULL,
  `status_bayar` enum('Lunas','Belum lunas','','') NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `diskon` double NOT NULL,
  `pajak` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_lengkap`, `username`, `password`, `id_outlet`, `nama_role`) VALUES
(11, 'Administrator', 'admin', '$2y$10$m5zytN/DUtKlKyDwRR8T1uM6YMVYvaKwS9m7ojphM5Fm.AFUKEiGm', 1, 'Admin'),
(12, 'Owner Laundry', 'owner', '$2y$10$0j9IX6FDsVaGWCcU113TIuCNwF53WkpBMteeXnlkaOaBfyOlvSccS', 1, 'Owner'),
(13, 'Go Kasir', 'kasir', '$2y$10$syeTPkgAry3A.JJ56fNqPObkWUDYmX7PBX2rEv49fO6yB4wiU8DZS', 1, 'Kasir'),
(17, 'Biko Arya Maulana', 'bikoarya', '$2y$10$Xe7hTV2kyr0atd08rUYtse2YF74GLKf5F8k8YYLVzShwzWduz95Hu', 8, 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_jenis`
--
ALTER TABLE `t_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `t_member`
--
ALTER TABLE `t_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `t_outlet`
--
ALTER TABLE `t_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `t_paket`
--
ALTER TABLE `t_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_jenis`
--
ALTER TABLE `t_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_member`
--
ALTER TABLE `t_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `t_outlet`
--
ALTER TABLE `t_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_paket`
--
ALTER TABLE `t_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
