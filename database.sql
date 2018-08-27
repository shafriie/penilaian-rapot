-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 28, 2018 at 11:55 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mizuki`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `kode_guru` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`kode_guru`, `username`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `created_on`) VALUES
('NIP-68969726', 'mizuki', 'Mizuki Naruto', 'Laki-laki', 'Pandeglang', '1970-01-09', 'Jln. Kampung Muka Blok C no.13 RT004/RW009 Kec.Pademangan Kel.Ancol', '2018-07-08 11:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `wali_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`) VALUES
(1, '723', 'Endah Suparti, S.Pd22'),
(3, '93', 'Bu Jariasdas'),
(4, '91', 'Endah Sutarjo, S.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matapelajaran`
--

CREATE TABLE `tbl_matapelajaran` (
  `kode_matapelajaran` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matapelajaran`
--

INSERT INTO `tbl_matapelajaran` (`kode_matapelajaran`, `mata_pelajaran`, `kkm`) VALUES
('MP-091123', 'Bahasa Inggris', 90),
('MP-12323', 'Bahasa Indonesia', 100),
('MP-45073', 'PKN', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `NIS` varchar(30) NOT NULL,
  `kelas` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `agama_islam` int(11) NOT NULL,
  `pkn` int(11) NOT NULL,
  `b_indo` int(11) NOT NULL,
  `b_inggris` int(11) NOT NULL,
  `mtk` int(11) NOT NULL,
  `ipa` int(11) NOT NULL,
  `ips` int(11) NOT NULL,
  `seni_budaya` int(11) NOT NULL,
  `penjaskes` int(11) NOT NULL,
  `tik` int(11) NOT NULL,
  `plkj` int(11) NOT NULL,
  `tata_busana` int(11) NOT NULL,
  `NA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `NIS`, `kelas`, `semester`, `agama_islam`, `pkn`, `b_indo`, `b_inggris`, `mtk`, `ipa`, `ips`, `seni_budaya`, `penjaskes`, `tik`, `plkj`, `tata_busana`, `NA`) VALUES
(47, 'NIS-114203558', 72, 'Ganjil', 10, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90),
(48, '1213423', 723, 'Genap', 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90),
(49, '13435532', 93, 'Ganjil', 90, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `NIS` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `agama` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`NIS`, `username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`) VALUES
('121312', 'yusuf', 'Yusuf Ghazali', 'Jakarta Utara', '2014-01-01', 'Laki-laki', 'Islam', 'Jln Kampung Muka Blok C no.13 RT004/RW009 Kec.Pademangan Kel.Ancol'),
('1213423', 'adibah', 'Adibah Choerun Nisa', 'Pandeglang', '2015-12-01', 'Laki-laki', 'Islam', 'Jln Priuk'),
('122112', 'agis', 'Agis Choerun Nisa', 'Pandeglang', '2014-01-01', 'Laki-laki', 'Islam', 'Jln Pademangan Barat'),
('13435532', 'hesti', 'Hesti Novianti', 'Jakarta', '2013-01-01', 'Laki-laki', 'Islam', 'Jln Pademangan'),
('NIS-114203558', 'dayat', 'Hidayat Nurwahid', 'Jakarta Utara', '2018-01-14', 'Laki-laki', 'Islam', 'Pademangan 113');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL COMMENT '1=guru, 2=siswa',
  `ket_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `created_at`, `status`, `ket_status`) VALUES
(78, 'mizuki', '123', '2018-07-08 11:06:14', 1, 'Guru'),
(81, 'dayat', '123456', '2018-07-08 13:31:01', 2, 'Siswa'),
(82, 'kurakura113', '123', '2018-07-27 03:56:25', 2, 'Siswa'),
(83, 'agis', '123', '2018-07-27 13:31:51', 2, 'Siswa'),
(84, 'yusuf', '123', '2018-07-27 13:32:45', 2, 'Siswa'),
(85, 'adibah', '123', '2018-07-27 13:33:55', 2, 'Siswa'),
(86, 'hesti', '123', '2018-07-28 09:39:07', 2, 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`kode_guru`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_matapelajaran`
--
ALTER TABLE `tbl_matapelajaran`
  ADD PRIMARY KEY (`kode_matapelajaran`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`NIS`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
