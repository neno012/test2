-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 08:04 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `siswa` int(4) NOT NULL,
  `guru` int(4) NOT NULL,
  `mapel` int(4) NOT NULL,
  `nilai` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `tgl`, `siswa`, `guru`, `mapel`, `nilai`) VALUES
(3, '2020-08-14', 2, 2, 1, 8),
(4, '2020-08-14', 2, 2, 2, 7),
(5, '2020-08-14', 2, 2, 2, 8),
(6, '2020-08-14', 4, 2, 3, 5),
(7, '2020-08-14', 4, 2, 3, 9),
(8, '2020-08-14', 4, 2, 3, 10),
(9, '2020-08-14', 4, 2, 3, 10),
(10, '2020-08-14', 4, 2, 3, 10),
(11, '2020-08-14', 4, 2, 3, 10),
(12, '2020-08-14', 4, 2, 3, 10),
(13, '2020-08-14', 4, 2, 3, 10),
(14, '2020-08-14', 4, 2, 3, 10),
(15, '2020-08-14', 4, 2, 3, 10),
(16, '2020-08-14', 4, 2, 3, 10),
(17, '2020-08-15', 5, 2, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `alamat`, `nohp`, `username`, `password`) VALUES
(2, 'mamat ssi', 'surabaya', '085737758423', 'mamat123', '12345'),
(4, 'dadang dudung', 'kediri', '089943445678', 'dadang', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama`) VALUES
(1, 'Bhs Indonesia'),
(2, 'Bhs Inggris'),
(3, 'Matematika'),
(4, 'Fisika'),
(5, 'Kimia'),
(6, 'Biologi');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `alamat`, `nohp`, `tgl`, `mapel`, `level`) VALUES
(2, 'neno', 'surabaya', '085737758427', '1994-12-12', '1,2', 1),
(4, 'budi', 'surabaya', '085737758423', '2001-12-03', '3', 1),
(5, 'joni', 'sidoarjo', '08995656777', '2020-08-10', '4,5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
