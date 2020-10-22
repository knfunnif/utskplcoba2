-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 10:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kantor_keluar`
--

CREATE TABLE `kantor_keluar` (
  `No` varchar(1000) NOT NULL,
  `Hari` date NOT NULL,
  `Tanggal` date NOT NULL,
  `Keperluan` varchar(200) NOT NULL,
  `stat_bayar` varchar(50) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Pengeluaran` int(100) NOT NULL,
  `Total_Pengeluaran` int(100) NOT NULL,
  `Proyek` varchar(100) DEFAULT NULL,
  `Nota` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `No` int(10) NOT NULL,
  `Nama` varchar(300) NOT NULL,
  `Jumlah` int(100) NOT NULL,
  `Total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proyek_keluar`
--

CREATE TABLE `proyek_keluar` (
  `No` varchar(1000) NOT NULL,
  `Bulan` date NOT NULL,
  `Tanggal` date NOT NULL,
  `Jumlah` int(100) NOT NULL,
  `Total` int(100) NOT NULL,
  `Nota` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `password`) VALUES
(1, "admin", "admin@gmail.com", "adminkece"),
(0, "", "", "");
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
