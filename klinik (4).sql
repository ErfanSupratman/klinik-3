-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2016 at 09:01 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `No` int(11) NOT NULL,
  `no_RM` varchar(100) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_antrian` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`No`, `no_RM`, `Tanggal`, `status_antrian`) VALUES
(1, '15.0000', '2016-02-16 12:32:12', '1'),
(3, '16.0010', '2016-02-17 12:02:07', '1'),
(4, '16.0013', '2016-02-19 16:46:35', '0'),
(5, '16.0015', '2016-02-19 07:20:15', '1'),
(6, '15.0000', '2016-02-21 10:43:17', '0'),
(7, '15.0000', '2016-02-21 11:00:28', '0'),
(8, '15.0001', '2016-02-21 11:04:10', '0'),
(9, '15.0000', '2016-02-21 11:04:21', '1'),
(10, '15.0000', '2016-02-22 03:01:52', '1'),
(11, '16.', '2016-02-23 01:33:20', '1'),
(12, '15.0000', '2016-02-23 01:49:18', '1'),
(13, '15.0001', '2016-02-23 01:50:20', '1'),
(14, '15.0003', '2016-02-23 01:50:42', '1'),
(15, '15.0000', '2016-02-24 12:21:19', '1'),
(16, '15.0001', '2016-02-24 12:21:20', '1'),
(17, '15.0003', '2016-02-24 12:25:37', '1'),
(18, '16.0011', '2016-02-25 05:21:43', '1'),
(19, '15.0003', '2016-02-25 05:21:46', '1'),
(20, '15.0003', '2016-02-27 06:14:37', '1'),
(21, '15.0003', '2016-02-28 06:41:28', '1'),
(22, '15.0003', '2016-02-29 03:03:23', '1'),
(24, '15.0001', '2016-03-05 01:53:39', '1'),
(25, '15.0000', '2016-03-05 01:57:37', '1'),
(26, '15.0000', '2016-03-05 01:57:51', '1'),
(27, '16.0019', '2016-03-05 01:58:34', '1'),
(28, '16.0021', '2016-03-05 02:12:26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE `apotek` (
  `nomer` int(11) NOT NULL,
  `no_registrasi` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_petugas` varchar(50) NOT NULL,
  `no_RM` varchar(50) NOT NULL,
  `no_listbarang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `no` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no`, `kode_barang`, `nama_barang`, `jenis`, `jumlah`, `harga`) VALUES
(2, '', 'asdsasas', 'adasdas', 11, 0),
(4, NULL, 'baru lagi', '12', 12000, 0),
(5, NULL, 'baru', '12', 12222, 0),
(6, NULL, 'baru saja', 'nah ', 1111, 1111),
(7, NULL, 'go', 'go', 12, 11111);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `no_diagnosa` int(11) NOT NULL,
  `kode_diagnosa` varchar(50) DEFAULT NULL,
  `nama_diagnosa` varchar(50) NOT NULL,
  `keterangan_diagnosa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`no_diagnosa`, `kode_diagnosa`, `nama_diagnosa`, `keterangan_diagnosa`) VALUES
(2, NULL, 'nikah', 'biar gak galau');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `hak_akses_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `hak_akses_user`) VALUES
(1, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses_user`
--

CREATE TABLE `hak_akses_user` (
  `id_hau` int(11) NOT NULL,
  `id_hak_akses` int(11) NOT NULL,
  `hak_akses_user` varchar(30) NOT NULL,
  `nama_menu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_periksa`
--

CREATE TABLE `hasil_periksa` (
  `no` int(11) NOT NULL,
  `no_RM` varchar(100) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `haid` date NOT NULL,
  `no_diagnosa` varchar(50) NOT NULL,
  `no_terapi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status_obat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_periksa`
--

INSERT INTO `hasil_periksa` (`no`, `no_RM`, `tanggal_periksa`, `haid`, `no_diagnosa`, `no_terapi`, `keterangan`, `status_obat`) VALUES
(1, '', '2016-02-23', '2016-02-10', '', '', 'sSA', ''),
(2, '', '2016-02-23', '2016-02-11', '', '', 'aeaewqe', ''),
(3, '', '2016-02-23', '2016-02-24', '', '', 'xcv', ''),
(4, '', '2016-02-23', '2016-02-18', '', '', 'asdfghjk', ''),
(5, '', '2016-02-23', '2016-02-16', '', '', 'asdasdsa', ''),
(6, '', '2016-02-23', '2016-02-04', '', '', 'sadasd', ''),
(7, '', '2016-02-23', '2016-02-10', '2', '2', 'zdfsfsdfdsfds', ''),
(8, '', '2016-02-23', '2016-02-14', '2', '2', 'aSAADA', ''),
(9, '', '2016-02-23', '2016-02-18', '2', '2', 'aaaaaaaaaaaaaaa', ''),
(10, '15.0000', '2016-02-23', '2016-02-11', '2', '2', 'asasas', ''),
(11, '0', '2016-02-23', '2016-02-18', '2', '2', 'sasas', ''),
(12, '15.0001', '2016-02-23', '2016-02-10', '2', '2', 'as', ''),
(14, '15.0003', '2016-02-23', '2016-02-10', '2', '2', '', ''),
(15, '15.0003', '2016-02-23', '2016-02-18', '2', '2', '', ''),
(16, '15.0003', '2016-02-23', '2016-02-12', '2', '2', '', ''),
(17, '15.0003', '2016-02-23', '2016-02-18', '2', '2', 'asasxas', ''),
(18, '15.0003', '2016-02-23', '2016-02-12', '2', '2', 'asasa', ''),
(19, '15.0003', '2016-02-23', '2016-02-12', '2', '2', 'asasa', ''),
(20, '15.0003', '2016-02-23', '2016-02-12', '2', '2', 'asasa', ''),
(21, '15.0003', '2016-02-23', '2016-02-12', '2', '2', 'asasa', 'ya'),
(22, '15.0003', '2016-02-24', '2016-02-18', '2', '2', 'asasa', 'tidak'),
(23, '15.0003', '2016-02-27', '2016-02-12', '2', '2', 'sdadasda', 'ya'),
(24, '15.0003', '2016-02-27', '2016-02-19', '2', '2', 'adsad', 'ya'),
(25, '15.0003', '2016-02-27', '2016-02-19', '2', '2', 'asdadsad', 'ya'),
(26, '15.0003', '2016-02-27', '0000-00-00', '', '', '', ''),
(27, '15.0003', '2016-02-27', '0000-00-00', '', '', '', ''),
(28, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'asdsada', 'ya'),
(29, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsadad', 'ya'),
(30, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'asdadadsa', 'tidak'),
(31, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'asdadad', 'ya'),
(32, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsadad', 'ya'),
(33, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adsadsad', 'ya'),
(34, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'adsad', 'ya'),
(35, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adsada', 'ya'),
(36, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'sfdsff', 'ya'),
(37, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adsadad', 'ya'),
(38, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'asdadadsadsadasd', 'ya'),
(39, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'asdad', 'ya'),
(40, '15.0003', '2016-02-28', '2016-02-26', '2', '2', 'asdadd', 'ya'),
(41, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'ewfewtret', 'ya'),
(42, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'fsdf', 'ya'),
(43, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'asdadsd', 'ya'),
(44, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'ertetet', 'ya'),
(45, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'asdads', 'ya'),
(46, '15.0003', '2016-02-28', '2016-02-10', '2', '2', 'asaasasss', 'ya'),
(47, '15.0003', '2016-02-28', '2016-02-09', '2', '2', 'asdadads', 'ya'),
(48, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'sdfsfsf', 'ya'),
(49, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'asd', 'ya'),
(50, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'asdad', 'ya'),
(51, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'sdfsdf', 'ya'),
(52, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adsad', 'ya'),
(53, '15.0003', '2016-02-28', '2016-02-26', '2', '2', 'adasd', 'ya'),
(54, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'sfdsfsf', 'ya'),
(55, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'asdad', 'ya'),
(56, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'adsads', 'ya'),
(57, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adasd', 'ya'),
(58, '15.0003', '2016-02-28', '2016-02-12', '2', '2', 'sdfsdfsfdsfdsfdsfdsf', 'ya'),
(59, '15.0003', '2016-02-28', '2016-02-24', '2', '2', 'asdasdsadasd', 'ya'),
(60, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'asdasd', 'ya'),
(61, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsad', 'ya'),
(62, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'adasdsad', 'ya'),
(63, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'asdsadadsadsad', 'ya'),
(64, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'adsadasdsadasd', 'ya'),
(65, '15.0003', '2016-02-28', '2016-02-26', '2', '2', 'adasdasd', 'ya'),
(66, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'adasdad', 'ya'),
(67, '15.0003', '2016-02-28', '2016-02-26', '2', '2', 'adsadasd', 'ya'),
(68, '15.0003', '2016-02-28', '2016-02-24', '2', '2', 'adasdasd', 'ya'),
(69, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adsad', 'ya'),
(70, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'adsad', 'ya'),
(71, '15.0003', '2016-02-28', '2016-02-04', '2', '2', 'adsadasd', 'ya'),
(72, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'adasdsad', 'ya'),
(73, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adsadsad', 'ya'),
(74, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'adasdad', 'ya'),
(75, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsadsad', 'ya'),
(76, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adasdadasd', 'ya'),
(77, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adasd', 'ya'),
(78, '15.0003', '2016-02-28', '2016-02-24', '2', '2', 'adsadas', 'ya'),
(79, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'dsfsfdsf', 'ya'),
(80, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adsadsd', 'ya'),
(81, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'adsad', 'ya'),
(82, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsad', 'ya'),
(83, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsads', 'ya'),
(84, '15.0003', '2016-02-28', '2016-02-03', '2', '2', 'adasdd', 'ya'),
(85, '15.0003', '2016-02-28', '2016-02-04', '2', '2', 'sfsdfsd', 'ya'),
(86, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'adasdasd', 'ya'),
(87, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'adsadasd', 'ya'),
(88, '15.0003', '2016-02-28', '2016-02-04', '2', '2', 'fdsfsdf', 'ya'),
(89, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'sfdsfsdf', 'ya'),
(90, '15.0003', '2016-02-28', '2016-02-26', '2', '2', 'adasdsad', 'ya'),
(91, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'dgfdgd', 'ya'),
(92, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'adasdsad', 'ya'),
(93, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'fsdfdsfd', 'ya'),
(94, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'dgfdg', 'ya'),
(95, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'dgfdgdfg', 'ya'),
(96, '15.0003', '2016-02-28', '2016-02-26', '2', '2', 'sfsfdsf', 'ya'),
(97, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'sfdsfsdfd', 'ya'),
(98, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsads', 'ya'),
(99, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'adsadasdasdasd', 'ya'),
(100, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'sdfsdfdsf', 'ya'),
(101, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'sfdsfsdf', 'ya'),
(102, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'sadasdad', 'ya'),
(103, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'sdfsdff', 'ya'),
(104, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'etertert', 'ya'),
(105, '15.0003', '2016-02-28', '2016-02-10', '2', '2', 'sfdsffd', 'ya'),
(106, '15.0003', '2016-02-28', '2016-02-12', '2', '2', 'adsad', 'ya'),
(107, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'adasdasd', 'ya'),
(108, '15.0003', '2016-02-28', '2016-02-05', '2', '2', 'sfsdfds', 'ya'),
(109, '15.0003', '2016-02-28', '2016-02-23', '2', '2', 'adsad', 'ya'),
(110, '15.0003', '2016-02-28', '2016-02-05', '2', '2', 'dgdgfdg', 'ya'),
(111, '15.0003', '2016-02-28', '2016-02-05', '2', '2', 'adasdasd', 'ya'),
(112, '15.0003', '2016-02-28', '2016-02-24', '2', '2', 'sfdsfsdsfsf', 'ya'),
(113, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'sdfsfdsfsf', 'ya'),
(114, '15.0003', '2016-02-28', '2016-02-05', '2', '2', 'adsadas', 'ya'),
(115, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'xvxcvvc', 'ya'),
(116, '15.0003', '2016-02-28', '2016-02-03', '2', '2', 'adsadasdsad', 'ya'),
(117, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adsad', 'ya'),
(118, '15.0003', '2016-02-28', '2016-02-04', '2', '2', 'sfdsfdf', 'ya'),
(119, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'sfsfsdf', 'ya'),
(120, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'sfdsfsdf', 'ya'),
(121, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'adsadads', 'ya'),
(122, '15.0003', '2016-02-28', '2016-02-05', '2', '2', 'adadsad', 'ya'),
(123, '15.0003', '2016-02-28', '2016-02-16', '2', '2', 'etretret', 'ya'),
(124, '15.0003', '2016-02-28', '2016-02-03', '2', '2', 'sfsfsdfsf', 'ya'),
(125, '15.0003', '2016-02-28', '2016-02-20', '2', '2', 'fgdgfdg', 'ya'),
(126, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'dgdf', 'ya'),
(127, '15.0003', '2016-02-28', '2016-02-20', '2', '2', 'dgfdgf', 'ya'),
(128, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'sfdsfsf', 'ya'),
(129, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'adadsad', 'ya'),
(130, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'sfsdf', 'ya'),
(131, '15.0003', '2016-02-28', '2016-02-04', '2', '2', 'adsadsd', 'ya'),
(132, '15.0003', '2016-02-28', '2016-02-10', '2', '2', 'sfsfdsf', 'ya'),
(133, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'sfsfdf', 'ya'),
(134, '15.0003', '2016-02-28', '2016-02-16', '2', '2', 'sfsfdf', 'ya'),
(135, '15.0003', '2016-02-28', '2016-02-18', '2', '2', 'sfdsfdf', 'ya'),
(136, '15.0003', '2016-02-28', '2016-02-04', '2', '2', 'sfsfdsf', 'ya'),
(137, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'asdsa', 'ya'),
(138, '15.0003', '2016-02-28', '2016-02-17', '2', '2', 'adadsad', 'ya'),
(139, '15.0003', '2016-02-28', '2016-02-12', '2', '2', 'adsads', 'ya'),
(140, '15.0003', '2016-02-28', '2016-02-10', '2', '2', 'adadsad', 'ya'),
(141, '15.0003', '2016-02-28', '2016-02-25', '2', '2', 'sfsfsdf', 'ya'),
(142, '15.0003', '2016-02-28', '2016-02-11', '2', '2', 'sfsdfsfd', 'ya'),
(143, '15.0003', '2016-02-28', '2016-02-19', '2', '2', 'dgdgdfg', 'ya'),
(144, '15.0003', '2016-02-28', '2016-02-12', '2', '2', 'adasdasd', 'ya'),
(145, '15.0003', '2016-02-29', '2016-02-16', '2', '2', 'vbcvbc', 'tidak'),
(146, '15.0003', '2016-02-29', '2016-02-02', '2', '2', 'adsadasda', 'ya'),
(147, '15.0003', '2016-02-29', '2016-02-03', '2', '2', 'asdsadad', 'ya'),
(148, '15.0003', '2016-03-05', '2016-02-28', '2', '2', '', 'ya'),
(149, '15.0001', '2016-03-05', '2016-03-05', '2', '2', '', 'ya'),
(150, '15', '2016-03-05', '2016-03-15', '2', '2', '', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `list_barang`
--

CREATE TABLE `list_barang` (
  `id_list_barang` int(11) NOT NULL,
  `id_hasil_periksa` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jumlah_barang1` int(11) NOT NULL,
  `jumlah_barang2` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_barang`
--

INSERT INTO `list_barang` (`id_list_barang`, `id_hasil_periksa`, `id_barang`, `jumlah_barang1`, `jumlah_barang2`, `harga`) VALUES
(1, '146', '5', 12, 0, NULL),
(2, '146', '7', 22, 0, NULL),
(3, '147', '2', 12, 0, NULL),
(4, '149', '2', 0, 0, NULL),
(5, '149', '2', 14, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nomer` int(11) NOT NULL,
  `no_RM` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `hp` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nomer`, `no_RM`, `nama`, `tgl_lahir`, `alamat`, `telp`, `hp`, `status`) VALUES
(1, '15.0000', 'as', '1994-05-11', 'asd', '', 'asd', '1'),
(2, '15.0001', 'qwe', '0000-00-00', 'qwe', NULL, 'qwe', '1'),
(3, '15.0002', 'zxc', '0000-00-00', 'zxc', NULL, 'zxc', '1'),
(4, '15.0003', 'dfg', '2000-05-04', 'dfg', NULL, 'asd', '1'),
(5, '16.0010', 'asdds', '2016-02-16', 'asdsad', 'asdsad', NULL, '1'),
(8, '16.0011', 'assdasd', '2016-02-19', 'asdsad', 'asdsadsa', NULL, '1'),
(13, '16.', 'asdasd', '2016-02-01', 'asdsad', 'asdsad', NULL, '1'),
(15, '16.0013', 'asdsd', '2016-02-01', 'sadsad', 'sadsad', NULL, '1'),
(16, '16.0015', 'asdasd', '2016-02-07', 'asdsadasd', 'sadsadsad', NULL, '1'),
(17, '16.0016', 'sadsad', '2016-02-11', 'asdsa', 'sadasdasdasd', NULL, '1'),
(18, '16.0017', 'raga', '2016-02-02', 'asd', 'asd', NULL, '1'),
(19, '16.0018', 'raga', '2016-02-10', 'ngganteng', 'asd', NULL, '1'),
(20, '16.0019', 'dewi', '1973-12-29', 'abc', '123456', NULL, '1'),
(21, '16.0020', 'eva', '1980-05-20', 'sby', '123456', NULL, '1'),
(22, '16.0021', 'bebe', '1980-03-20', 'bebe', '123456', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `no_petugas` int(11) NOT NULL,
  `id_petugas` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `kode_petugas` varchar(50) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `posisi_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terapi`
--

CREATE TABLE `terapi` (
  `no_terapi` int(11) NOT NULL,
  `kode_terapi` varchar(50) DEFAULT NULL,
  `nama_terapi` varchar(50) NOT NULL,
  `harga_terapi` int(11) NOT NULL,
  `keterangan_terapi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terapi`
--

INSERT INTO `terapi` (`no_terapi`, `kode_terapi`, `nama_terapi`, `harga_terapi`, `keterangan_terapi`) VALUES
(2, NULL, 'nikah', 10000000, 'emmmmmmm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `hak_akses_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`nomer`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`no_diagnosa`),
  ADD UNIQUE KEY `kode_diagnosa` (`kode_diagnosa`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `hak_akses_user`
--
ALTER TABLE `hak_akses_user`
  ADD PRIMARY KEY (`id_hau`);

--
-- Indexes for table `hasil_periksa`
--
ALTER TABLE `hasil_periksa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `list_barang`
--
ALTER TABLE `list_barang`
  ADD PRIMARY KEY (`id_list_barang`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nomer`),
  ADD UNIQUE KEY `No_RM` (`no_RM`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`no_petugas`),
  ADD UNIQUE KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `terapi`
--
ALTER TABLE `terapi`
  ADD PRIMARY KEY (`no_terapi`),
  ADD UNIQUE KEY `kode_terapi` (`kode_terapi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `apotek`
--
ALTER TABLE `apotek`
  MODIFY `nomer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `no_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hak_akses_user`
--
ALTER TABLE `hak_akses_user`
  MODIFY `id_hau` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hasil_periksa`
--
ALTER TABLE `hasil_periksa`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `list_barang`
--
ALTER TABLE `list_barang`
  MODIFY `id_list_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `nomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `no_petugas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terapi`
--
ALTER TABLE `terapi`
  MODIFY `no_terapi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
