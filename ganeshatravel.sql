-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 11:57 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ganeshatravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `namaPegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`username`, `password`, `jenis`, `namaPegawai`) VALUES
('adminAndi', '1111', 'Admin', 'Andi'),
('foBudi', '2222', 'Front Officer', 'Budi'),
('foChaca', '3333', 'Front Officer', 'Chaca');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `namaPelanggan` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaPelanggan`, `alamat`, `telepon`) VALUES
(1, 'Andi', 'jalan meja', 81249342343),
(2, 'Bibi', 'jalan kanan', 83242455335),
(3, 'cisa', 'jalan merapi', 83566246244),
(4, 'dodi', 'jalan kuningan', 86534682234),
(5, 'nove', 'tubis', 81232424),
(6, 'nove', 'tubis', 812354436),
(7, 'nove', 'tubis', 812354436),
(8, 'bibi', 'pdg', 8123321),
(9, 'veby', 'padang', 12423),
(10, 'hue', 'jalan', 8124124),
(11, 'vey', 'jkenf', 1234124),
(12, 'nanana', 'jalan ninini', 887554443),
(13, 'prav', '123123', 123124),
(14, 'nove', 'edqw', 12312312),
(15, 'peb', 'yfcyucyucu', 12363876);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `idReservasi` int(11) NOT NULL,
  `waktuReservasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggalPerjalanan` date NOT NULL,
  `waktuPerjalanan` time NOT NULL,
  `nomorSeat` int(11) NOT NULL,
  `namaPelanggan` varchar(32) NOT NULL,
  `asalTujuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`idReservasi`, `waktuReservasi`, `tanggalPerjalanan`, `waktuPerjalanan`, `nomorSeat`, `namaPelanggan`, `asalTujuan`) VALUES
(1, '2016-12-02 10:07:49', '2016-12-02', '08:00:00', 3, 'veve', 'Bandung - Jakarta'),
(2, '2016-12-02 06:33:21', '2016-12-05', '12:00:00', 2, 'kiki', 'Jakarta - Depok'),
(3, '2016-12-02 06:33:21', '2016-12-06', '08:00:00', 6, 'vita', 'Bekasi - Bandung'),
(4, '2016-12-02 06:33:21', '2016-12-10', '16:00:00', 4, 'pebi', 'Tangerang - Bogor'),
(5, '2016-12-02 08:12:28', '2016-12-22', '08:00:00', 1, 'nove', 'Bandung - Tangerang'),
(7, '2016-12-02 09:51:46', '2016-12-16', '08:00:00', 8, 'nove', 'Jakarta - Bandung'),
(8, '2016-12-02 08:28:06', '2016-12-14', '10:00:00', 4, 'bibi', 'Bandung - Jakarta'),
(9, '2016-12-02 08:29:59', '2016-12-08', '06:00:00', 6, 'veby', 'Bandung - Jakarta'),
(10, '2016-12-02 08:38:22', '2016-12-14', '06:00:00', 4, 'hue', 'Bandung - Jakarta'),
(12, '2016-12-02 08:47:39', '2016-12-16', '14:00:00', 7, 'nanana', 'Depok - Bogor'),
(13, '2016-12-02 10:32:03', '2016-12-03', '06:00:00', 1, 'prav', 'Bandung - Jakarta'),
(14, '2016-12-02 10:32:22', '2016-12-03', '06:00:00', 2, 'nove', 'Bandung - Jakarta'),
(15, '2016-12-02 10:32:52', '2016-12-03', '06:00:00', 3, 'peb', 'Bandung - Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `idRute` int(11) NOT NULL,
  `asalTujuan` varchar(32) NOT NULL,
  `waktu` time NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`idRute`, `asalTujuan`, `waktu`, `harga`) VALUES
(1, 'Bandung - Jakarta', '06:00:00', 100000),
(2, 'Bandung - Jakarta', '08:00:00', 100000),
(3, 'Bandung - Jakarta', '10:00:00', 100000),
(4, 'Bandung - Jakarta', '12:00:00', 100000),
(5, 'Bandung - Jakarta', '14:00:00', 100000),
(6, 'Bandung - Jakarta', '16:00:00', 100000),
(7, 'Bandung - Bekasi', '06:00:00', 90000),
(8, 'Bandung - Bekasi', '08:00:00', 90000),
(9, 'Bandung - Bekasi', '10:00:00', 90000),
(10, 'Bandung - Bekasi', '12:00:00', 90000),
(11, 'Bandung - Bekasi', '14:00:00', 90000),
(12, 'Bandung - Bekasi', '16:00:00', 90000),
(13, 'Bandung - Bogor', '06:00:00', 80000),
(14, 'Bandung - Bogor', '08:00:00', 80000),
(15, 'Bandung - Bogor', '10:00:00', 80000),
(16, 'Bandung - Bogor', '12:00:00', 80000),
(17, 'Bandung - Bogor', '14:00:00', 80000),
(18, 'Bandung - Bogor', '16:00:00', 80000),
(19, 'Bandung - Depok', '06:00:00', 85000),
(20, 'Bandung - Depok', '08:00:00', 85000),
(21, 'Bandung - Depok', '10:00:00', 85000),
(22, 'Bandung - Depok', '12:00:00', 85000),
(23, 'Bandung - Depok', '14:00:00', 85000),
(24, 'Bandung - Depok', '16:00:00', 85000),
(25, 'Bandung - Tangerang', '06:00:00', 110000),
(26, 'Bandung - Tangerang', '08:00:00', 110000),
(27, 'Bandung - Tangerang', '10:00:00', 110000),
(28, 'Bandung - Tangerang', '12:00:00', 110000),
(29, 'Bandung - Tangerang', '14:00:00', 110000),
(30, 'Bandung - Tangerang', '16:00:00', 110000),
(31, 'Bekasi - Jakarta', '06:00:00', 40000),
(32, 'Bekasi - Jakarta', '08:00:00', 40000),
(33, 'Bekasi - Jakarta', '10:00:00', 40000),
(34, 'Bekasi - Jakarta', '12:00:00', 40000),
(35, 'Bekasi - Jakarta', '14:00:00', 40000),
(36, 'Bekasi - Jakarta', '16:00:00', 40000),
(37, 'Bekasi - Bandung', '06:00:00', 90000),
(38, 'Bekasi - Bandung', '08:00:00', 90000),
(39, 'Bekasi - Bandung', '10:00:00', 90000),
(40, 'Bekasi - Bandung', '12:00:00', 90000),
(41, 'Bekasi - Bandung', '14:00:00', 90000),
(42, 'Bekasi - Bandung', '16:00:00', 90000),
(43, 'Bekasi - Bogor', '06:00:00', 60000),
(44, 'Bekasi - Bogor', '08:00:00', 60000),
(45, 'Bekasi - Bogor', '10:00:00', 60000),
(46, 'Bekasi - Bogor', '12:00:00', 60000),
(47, 'Bekasi - Bogor', '14:00:00', 60000),
(48, 'Bekasi - Bogor', '16:00:00', 60000),
(49, 'Bekasi - Depok', '06:00:00', 50000),
(50, 'Bekasi - Depok', '08:00:00', 50000),
(51, 'Bekasi - Depok', '10:00:00', 50000),
(52, 'Bekasi - Depok', '12:00:00', 50000),
(53, 'Bekasi - Depok', '14:00:00', 50000),
(54, 'Bekasi - Depok', '16:00:00', 50000),
(55, 'Bekasi - Tangerang', '06:00:00', 60000),
(56, 'Bekasi - Tangerang', '08:00:00', 60000),
(57, 'Bekasi - Tangerang', '10:00:00', 60000),
(58, 'Bekasi - Tangerang', '12:00:00', 60000),
(59, 'Bekasi - Tangerang', '14:00:00', 6000),
(60, 'Bekasi - Tangerang', '16:00:00', 60000),
(61, 'Bogor - Jakarta', '06:00:00', 60000),
(62, 'Bogor - Jakarta', '08:00:00', 60000),
(63, 'Bogor - Jakarta', '10:00:00', 60000),
(64, 'Bogor - Jakarta', '12:00:00', 60000),
(65, 'Bogor - Jakarta', '14:00:00', 60000),
(66, 'Bogor - Jakarta', '16:00:00', 60000),
(67, 'Bogor - Depok', '06:00:00', 50000),
(68, 'Bogor - Depok', '08:00:00', 50000),
(69, 'Bogor - Depok', '10:00:00', 50000),
(70, 'Bogor - Depok', '12:00:00', 50000),
(71, 'Bogor - Depok', '14:00:00', 50000),
(72, 'Bogor - Depok', '16:00:00', 50000),
(74, 'Bogor - Tangerang', '08:00:00', 60000),
(75, 'Bogor - Tangerang', '10:00:00', 60000),
(76, 'Bogor - Tangerang', '12:00:00', 60000),
(77, 'Bogor - Tangerang', '14:00:00', 60000),
(78, 'Bogor - Tangerang', '16:00:00', 60000),
(79, 'Bogor - Bekasi', '06:00:00', 60000),
(80, 'Bogor - Bekasi', '08:00:00', 60000),
(81, 'Bogor - Bekasi', '10:00:00', 60000),
(82, 'Bogor - Bekasi', '12:00:00', 60000),
(83, 'Bogor - Bekasi', '14:00:00', 60000),
(84, 'Bogor - Bekasi', '16:00:00', 60000),
(85, 'Bogor - Bandung', '06:00:00', 80000),
(86, 'Bogor - Bandung', '08:00:00', 80000),
(87, 'Bogor - Bandung', '10:00:00', 80000),
(88, 'Bogor - Bandung', '12:00:00', 80000),
(89, 'Bogor - Bandung', '14:00:00', 80000),
(90, 'Bogor - Bandung', '16:00:00', 80000),
(91, 'Depok - Jakarta', '06:00:00', 0),
(92, 'Depok - Jakarta', '08:00:00', 50000),
(93, 'Depok - Jakarta', '10:00:00', 50000),
(94, 'Depok - Jakarta', '12:00:00', 50000),
(95, 'Depok - Jakarta', '14:00:00', 50000),
(96, 'Depok - Jakarta', '16:00:00', 50000),
(97, 'Depok - Bogor', '06:00:00', 50000),
(98, 'Depok - Bogor', '08:00:00', 50000),
(99, 'Depok - Bogor', '10:00:00', 50000),
(100, 'Depok - Bogor', '12:00:00', 50000),
(101, 'Depok - Bogor', '14:00:00', 50000),
(102, 'Depok - Bogor', '16:00:00', 50000),
(103, 'Depok - Tangerang', '06:00:00', 60000),
(104, 'Depok - Tangerang', '08:00:00', 60000),
(105, 'Depok - Tangerang', '10:00:00', 60000),
(106, 'Depok - Tangerang', '12:00:00', 60000),
(107, 'Depok - Tangerang', '14:00:00', 60000),
(108, 'Depok - Tangerang', '16:00:00', 60000),
(109, 'Depok - Bekasi', '06:00:00', 60000),
(110, 'Depok - Bekasi', '08:00:00', 60000),
(111, 'Depok - Bekasi', '10:00:00', 60000),
(112, 'Depok - Bekasi', '12:00:00', 60000),
(113, 'Depok - Bekasi', '14:00:00', 60000),
(114, 'Depok - Bekasi', '16:00:00', 60000),
(115, 'Depok - Bandung', '06:00:00', 85000),
(116, 'Depok - Bandung', '08:00:00', 85000),
(117, 'Depok - Bandung', '10:00:00', 85000),
(118, 'Depok - Bandung', '12:00:00', 85000),
(119, 'Depok - Bandung', '14:00:00', 85000),
(120, 'Depok - Bandung', '16:00:00', 85000),
(121, 'Jakarta - Bogor', '06:00:00', 60000),
(122, 'Jakarta - Bogor', '08:00:00', 60000),
(123, 'Jakarta - Bogor', '10:00:00', 60000),
(124, 'Jakarta - Bogor', '12:00:00', 60000),
(125, 'Jakarta - Bogor', '14:00:00', 60000),
(126, 'Jakarta - Bogor', '16:00:00', 60000),
(127, 'Jakarta - Depok', '06:00:00', 50000),
(128, 'Jakarta - Depok', '08:00:00', 50000),
(129, 'Jakarta - Depok', '10:00:00', 50000),
(130, 'Jakarta - Depok', '12:00:00', 50000),
(131, 'Jakarta - Depok', '14:00:00', 50000),
(132, 'Jakarta - Depok', '16:00:00', 50000),
(133, 'Jakarta - Tangerang', '06:00:00', 45000),
(134, 'Jakarta - Tangerang', '08:00:00', 45000),
(135, 'Jakarta - Tangerang', '10:00:00', 45000),
(136, 'Jakarta - Tangerang', '12:00:00', 45000),
(137, 'Jakarta - Tangerang', '14:00:00', 45000),
(138, 'Jakarta - Tangerang', '16:00:00', 45000),
(139, 'Jakarta - Bekasi', '06:00:00', 40000),
(140, 'Jakarta - Bekasi', '08:00:00', 40000),
(141, 'Jakarta - Bekasi', '10:00:00', 40000),
(142, 'Jakarta - Bekasi', '12:00:00', 40000),
(143, 'Jakarta - Bekasi', '14:00:00', 40000),
(144, 'Jakarta - Bekasi', '16:00:00', 40000),
(145, 'Jakarta - Bandung', '06:00:00', 100000),
(146, 'Jakarta - Bandung', '08:00:00', 100000),
(147, 'Jakarta - Bandung', '10:00:00', 100000),
(148, 'Jakarta - Bandung', '12:00:00', 100000),
(149, 'Jakarta - Bandung', '14:00:00', 100000),
(150, 'Jakarta - Bandung', '16:00:00', 100000),
(151, 'Tangerang - Jakarta', '06:00:00', 45000),
(152, 'Tangerang - Jakarta', '08:00:00', 45000),
(153, 'Tangerang - Jakarta', '10:00:00', 45000),
(154, 'Tangerang - Jakarta', '12:00:00', 45000),
(155, 'Tangerang - Jakarta', '14:00:00', 45000),
(156, 'Tangerang - Jakarta', '16:00:00', 45000),
(157, 'Tangerang - Bogor', '06:00:00', 60000),
(158, 'Tangerang - Bogor', '08:00:00', 60000),
(159, 'Tangerang - Bogor', '10:00:00', 60000),
(160, 'Tangerang - Bogor', '12:00:00', 60000),
(161, 'Tangerang - Bogor', '14:00:00', 60000),
(162, 'Tangerang - Bogor', '16:00:00', 60000),
(163, 'Tangerang - Depok', '06:00:00', 50000),
(164, 'Tangerang - Depok', '08:00:00', 50000),
(165, 'Tangerang - Depok', '10:00:00', 50000),
(166, 'Tangerang - Depok', '12:00:00', 50000),
(167, 'Tangerang - Depok', '14:00:00', 50000),
(168, 'Tangerang - Depok', '16:00:00', 50000),
(169, 'Tangerang - Bekasi', '06:00:00', 50000),
(170, 'Tangerang - Bekasi', '08:00:00', 50000),
(171, 'Tangerang - Bekasi', '10:00:00', 50000),
(172, 'Tangerang - Bekasi', '12:00:00', 50000),
(173, 'Tangerang - Bekasi', '14:00:00', 50000),
(174, 'Tangerang - Bekasi', '16:00:00', 50000),
(175, 'Tangerang - Bandung', '06:00:00', 110000),
(176, 'Tangerang - Bandung', '08:00:00', 110000),
(177, 'Tangerang - Bandung', '10:00:00', 110000),
(178, 'Tangerang - Bandung', '12:00:00', 110000),
(179, 'Tangerang - Bandung', '14:00:00', 110000),
(180, 'Tangerang - Bandung', '16:00:00', 110000),
(181, 'Bogor - Tangerang', '06:00:00', 60000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`idReservasi`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`idRute`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `idReservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `idRute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
