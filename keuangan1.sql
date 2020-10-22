-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 10:58 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `1_pemasukan`
--

CREATE TABLE `1_pemasukan` (
  `id_proyek` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jumlah` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1_pemasukan`
--

INSERT INTO `1_pemasukan` (`id_proyek`, `nama`, `jumlah`) VALUES
(5, "Pabrik Semen Tiga Roda", 80000000),
(6, "Transmart Banyumanik", 13947100),
(7, "Kota Lama", 6500000);

-- --------------------------------------------------------

--
-- Table structure for table `2_sub_pemasukan`
--

CREATE TABLE `2_sub_pemasukan` (
  `id_proyek` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `proyek` varchar(300) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2_sub_pemasukan`
--

INSERT INTO `2_sub_pemasukan` (`id_proyek`, `id_sub`, `proyek`, `keterangan`, `tanggal`, `bulan`, `tahun`, `nominal`) VALUES
(5, 3, "Pabrik Semen Tiga Roda", "Termin 1", "20", "Februari", "2020", 1200000),
(5, 4, "Pabrik Semen Tiga Roda", "Termin 2", "20", "Februari", "2020", 31837400);

-- --------------------------------------------------------

--
-- Table structure for table `3_kantor_keluar`
--

CREATE TABLE `3_kantor_keluar` (
  `id_kantor` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `stat_bayar` enum("Lunas","Belum Lunas","","") NOT NULL,
  `kota` varchar(50) NOT NULL,
  `pengeluaran` int(100) NOT NULL,
  `proyek` varchar(100) DEFAULT NULL,
  `nota` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `3_kantor_keluar`
--

INSERT INTO `3_kantor_keluar` (`id_kantor`, `tanggal`, `bulan`, `tahun`, `keperluan`, `stat_bayar`, `kota`, `pengeluaran`, `proyek`, `nota`) VALUES
(4, "20", "Januari", "2020", "service scanner", "Belum Lunas", "Semarang", 210000, "", "images_(7).jpg"),
(99, "20", "Februari", "2021", "service printer", "Belum Lunas", "Cirebon", 121000, "", "1587960852421.jpg"),
(8687, "20", "Februari", "2021", "print poster", "Belum Lunas", "Semarang", 80000, "", "4-a-3-Jomblang-Cave-by-Zexsen-Xie.jpg");

-- --------------------------------------------------------

--
-- Table structure for table `4_proyek_keluar`
--

CREATE TABLE `4_proyek_keluar` (
  `id_keluar_proyek` int(30) NOT NULL,
  `id_proyek` int(30) NOT NULL,
  `proyek` varchar(100) NOT NULL,
  `uraian` varchar(250) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `nominal` int(100) NOT NULL,
  `nota` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `4_proyek_keluar`
--

INSERT INTO `4_proyek_keluar` (`id_keluar_proyek`, `id_proyek`, `proyek`, `uraian`, `tanggal`, `bulan`, `tahun`, `nominal`, `nota`) VALUES
(16, 5, "Pabrik Semen Tiga Roda", "print surat keputusan", "21", "Maret", "2021", 1200000, "16.jpg"),
(82, 5, "Pabrik Semen Tiga Roda", "studi lapangan salatiga", "25", "Maret", "2020", 3286000, "82.jpg");

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`) VALUES
(1, "nisa", "annisa.kusumawardani04@gmail.com", "annisa");

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1_pemasukan`
--
ALTER TABLE `1_pemasukan`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `2_sub_pemasukan`
--
ALTER TABLE `2_sub_pemasukan`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `2_sub_pemasukan_ibfk_1` (`id_proyek`);

--
-- Indexes for table `3_kantor_keluar`
--
ALTER TABLE `3_kantor_keluar`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indexes for table `4_proyek_keluar`
--
ALTER TABLE `4_proyek_keluar`
  ADD PRIMARY KEY (`id_keluar_proyek`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1_pemasukan`
--
ALTER TABLE `1_pemasukan`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `2_sub_pemasukan`
--
ALTER TABLE `2_sub_pemasukan`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `2_sub_pemasukan`
--
ALTER TABLE `2_sub_pemasukan`
  ADD CONSTRAINT `2_sub_pemasukan_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `1_pemasukan` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `4_proyek_keluar`
--
ALTER TABLE `4_proyek_keluar`
  ADD CONSTRAINT `4_proyek_keluar_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `1_pemasukan` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
